<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dbpk_final';

$con = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function base_url($value = '')
{
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    $root .= $value;
    return $root;
}

function get_tahun_ajar($id = "")
{
    global $con;
    if ($id != '') {
        $sql = "SELECT * FROM periode WHERE id_periode = $id";
    } else {
        $sql = "SELECT * FROM periode WHERE status_periode = 1";
    }
    $q = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($q);
    return $row['tahun_ajar'] . " " . $row['semester'];
}

function get_tahun_ajar_id()
{
    global $con;
    $sql = "SELECT * FROM periode WHERE status_periode = 1";
    $q = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($q);
    return $row['id_periode'];
}

// ... other functions ...

function get_user_login($param)
{
    global $con;
    $nip_user = $_SESSION[md5('user')];
    $user_sql = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE a.nip = '$nip_user'";
    $user_query = mysqli_query($con, $user_sql);
    $user = mysqli_fetch_array($user_query);
    return $user[$param];
}

// ... other functions ...
function get_tot_nilai($nip_user = '', $id_periode = '')
{
    global $con;
    $sql = "SELECT 
					a.id_kompetensi,
					a.nama_kompetensi,
					a.bobot_kompetensi,
					COUNT(b.id_isi) as jml
				FROM jenis_kompetensi a
				JOIN isi_kompetensi b ON a.id_kompetensi = b.id_kompetensi
				GROUP BY a.id_kompetensi";
    $q = mysqli_query($con, $sql);

    $data_kompetensi = [];

    while ($row = mysqli_fetch_array($q)) {
        ${"b_" . $row['nama_kompetensi']} = $row['bobot_kompetensi'];
        ${"jml_" . $row['nama_kompetensi']} = $row['bobot_kompetensi'];
        $data_kompetensi[] = $row;
    }

    $sql = "SELECT * FROM penilai a JOIN penilai_detail b ON a.id_penilai = b.id_penilai WHERE a.nip = '$nip_user' ";
    $q = mysqli_query($con, $sql);
    $id_penilai_detail = '0';
    $i = 0;
    while ($row = mysqli_fetch_array($q)) {
        if ($i == 0) {
            $id_penilai_detail = $row['id_penilai_detail'];
        } else {
            $id_penilai_detail .= ", " . $row['id_penilai_detail'];
        }
        $i++;
    }
    //$id_periode = get_tahun_ajar_id();
    $komp = '';
    foreach ($data_kompetensi as $key => $value) {
        $komp .= "SUM( IF(tbnilai.nama_kompetensi = '$value[nama_kompetensi]', tbnilai.nilai, 0) ) AS '$value[nama_kompetensi]', ";
    }

    $sql = "SELECT 
					tbnilai.nip_penilai,
					tbnilai.penilai,
					tbnilai.level,
					tbnilai.jabatan,
					$komp
					1
				FROM 
				(SELECT 
					a.id_nilai, 
					h.nip as nip_dinilai,
					h.nama_guru as 'dinilai',
					e.nip as nip_penilai, 
					e.nama_guru as 'penilai',
					f.jabatan,
					f.level,
					c.id_kompetensi,
					c.nama_kompetensi,
					c.bobot_kompetensi,
					SUM(a.hasil_nilai) as nilai
				FROM penilaian a 
				JOIN isi_kompetensi b ON a.id_isi = b.id_isi
				JOIN jenis_kompetensi c ON b.id_kompetensi = c.id_kompetensi
				JOIN (penilai_detail d JOIN user e ON d.nip = e.nip JOIN jenis_user f ON f.id_jenis_user = e.id_jenis_user) ON d.id_penilai_detail = a.id_penilai_detail 
				JOIN (penilai g JOIN user h ON g.nip = h.nip ) ON d.id_penilai = g.id_penilai
				WHERE a.id_penilai_detail IN ($id_penilai_detail) AND g.id_periode = $id_periode
				GROUP BY a.id_penilai_detail, c.id_kompetensi
				ORDER BY 4) as tbnilai
				GROUP BY tbnilai.penilai";
    //echo $sql;
    $q = mysqli_query($con, $sql);
    $nno = 0;
    $tot_arr['atasan'] = 0;
    $tot_arr['guru'] = 0;
    $tot_arr['sendiri'] = 0;
    while ($row = mysqli_fetch_array($q)) {
        $tot = 0;
        foreach ($data_kompetensi as $key => $value) {
            $nil = ($row[$value['nama_kompetensi']] / $value['jml']) * 100;

            $tot += $nil * ($value['bobot_kompetensi'] / 100);
        }

        if ($row['level'] == 2 || $row['level'] == 3) {
            $tot_arr['atasan'] += $tot;
        } else if ($row['level'] == 1 && $row['nip_penilai'] != $nip_user) {
            $tot_arr['guru'] += $tot;
        } else {
            $tot_arr['sendiri'] += $tot;
        }
    }

    $sql = "SELECT * FROM periode WHERE id_periode = $id_periode";
    $q = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($q);
    if ($row['setting'] != '') {
        $set = explode(";", $row['setting']);

        $set[0] = $set[0] / 100;
        $set[1] = $set[1] / 100;
        $set[2] = $set[2] / 100;
    } else {
        $set[0] = 0.5;
        $set[1] = 0.3;
        $set[2] = 0.2;
    }


    $ak = ($tot_arr['atasan'] * $set[0]) + ($tot_arr['guru'] * $set[1]) + ($tot_arr['sendiri'] * $set[2]);
    return number_format($ak, 2);
}

// TODO add method query
function get_count($table)
{
    global $con;
    $data_sql = "SELECT COUNT(*) FROM $table";
    $data_query = mysqli_query($con, $data_sql);
    $data = mysqli_fetch_array($data_query);
    return $data[0];
}

function get_count_user($jenis_user)
{
    global $con;
    $data_user_sql = "SELECT COUNT(id_jenis_user) FROM user WHERE id_jenis_user = $jenis_user";
    $data_user_query = mysqli_query($con, $data_user_sql);
    $data_user = mysqli_fetch_array($data_user_query);
    return $data_user[0];
}

function get_guru_belum_dinilai()
{
    global $con;
    $id_periode = get_tahun_ajar_id();
    $data_user_sql = "SELECT COUNT(nip) FROM penilai WHERE id_periode = $id_periode";
    $data_user_query = mysqli_query($con, $data_user_sql);
    $data_user = mysqli_fetch_array($data_user_query);
    return $data_user[0];
}

function get_guru_selesai_dinilai()
{
    global $con;
    $id_periode = get_tahun_ajar_id();
    $i = 0;
    $sql = "SELECT
									d.nip,
									d.nama_guru,
									SUM(a.hasil_nilai) as nilai,
									COUNT(a.id_nilai) as jml
								FROM penilaian a
								JOIN penilai_detail b ON a.id_penilai_detail = b.id_penilai_detail
								JOIN penilai c ON b.id_penilai = c.id_penilai
								JOIN user d ON c.nip = d.nip
								WHERE c.id_periode = $id_periode
								GROUP BY d.nip
								HAVING COUNT(a.id_nilai) = (
																SELECT 
																(
																	(SELECT COUNT(*) FROM penilai p
																	JOIN penilai_detail pd ON p.id_penilai = pd.id_penilai
																	WHERE p.nip = d.nip)
																	*
																	(SELECT COUNT(*) FROM isi_kompetensi)
																) as tot
																FROM dual
															)
								ORDER BY nilai DESC";
    $q = mysqli_query($con, $sql);
    $data_selesai = mysqli_num_rows($q);
    return $data_selesai;
}

function penilaian_per_guru($penilai_detail)
{
    global $con;
    $sql = "SELECT * FROM penilai a JOIN penilai_detail b ON a.id_penilai = b.id_penilai JOIN penilaian c ON b.id_penilai_detail = c.id_penilai_detail WHERE b.id_penilai_detail = $penilai_detail";
    //echo $sql; 
    $q = mysqli_query($con, $sql);
    if (mysqli_num_rows($q) > 0) {
        return "<span class='text-success'><i class='fas fa-check-circle'></i> Dinilai</span>";
    } else {
        return "<span class='text-danger'><i class='fas fa-times-circle'></i> Belum Dinilai</span>";
    }
}
