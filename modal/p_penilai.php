<?php
include '../config/koneksi.php';
if (isset($_POST['btnSimpan'])) {
	$btn = $_POST['btnSimpan'];

	$id_penilai = isset($_POST['txt_id_penilai']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['txt_id_penilai'])) : "";
	$penilai = isset($_POST['penilai']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['penilai'])) : "";
	$tahun_ajar = isset($_POST['tahun_ajar']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['tahun_ajar'])) : "";


	$cek = false;
	mysqli_autocommit($con, FALSE);

	if ($btn == "Tambah") {

		$sql = "INSERT INTO penilai ( nip, id_periode) VALUES('$penilai', '$tahun_ajar') ";



		$qq = mysqli_query($con, "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE b.level = 3 ");
		$row = mysqli_fetch_array($qq);
		$nip_kepala = $row['nip'];

		$qq = mysqli_query($con, "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE b.level = 2 ");
		$row = mysqli_fetch_array($qq);
		$nip_wakil = $row['nip'];

		$query = mysqli_query($con, $sql);

		if ($query) {
			$last_id = mysqli_insert_id($con);
			$sql2 = "INSERT INTO penilai_detail ( id_penilai, nip) VALUES ('$last_id', '$nip_kepala')";
			$query2 = mysqli_query($con, $sql2);
			if ($query2) {
				$cek = true;
			}
		}
	} else {
		$qq = "SELECT b.id_penilai_detail FROM penilai a 
				JOIN penilai_detail b ON a.id_penilai = b.id_penilai
				JOIN user c ON b.nip = c.nip
				JOIN jenis_user d ON c.id_jenis_user = d.id_jenis_user
				WHERE a.id_penilai = $id_penilai AND a.nip <> b.nip AND d.level = 1";
		$co = mysqli_query($con, $qq);
		$o = 0;
		$id_pd = "";
		while ($rw = mysqli_fetch_array($co)) {
			if ($o == 0) {
				$id_pd .= $rw['id_penilai_detail'];
			} else {
				$id_pd .= ', ' . $rw['id_penilai_detail'];
			}
			$o++;
		}
	}

	if ($cek) {
		mysqli_commit($con);

		$_SESSION["flash"]["type"] = "success";
		$_SESSION["flash"]["head"] = "Sukses";
		$_SESSION["flash"]["msg"] = "Data berhasil disimpan!";
	} else {
		mysqli_rollback($con);

		$_SESSION["flash"]["type"] = "danger";
		$_SESSION["flash"]["head"] = "Terjadi Kesalahan";
		$_SESSION["flash"]["msg"] = "Data gagal disimpan! ";
	}

	header("location:../index.php?p=memilihpen");
}

if (isset($_POST['id_delete'])) {
	$id_isi = isset($_POST['id_delete']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['id_delete'])) : "";
	$sql = "DELETE  FROM penilai WHERE id_penilai = $id_isi";
	$query = mysqli_query($con, $sql);
	if ($query) {
		$_SESSION["flash"]["type"] = "success";
		$_SESSION["flash"]["head"] = "Sukses";
		$_SESSION["flash"]["msg"] = "Data berhasil dihapus!";
	} else {
		$_SESSION["flash"]["type"] = "danger";
		$_SESSION["flash"]["head"] = "Terjadi Kesalahan";
		$_SESSION["flash"]["msg"] = "Data gagal dihapus! " . mysqli_error($con);
	}
	header("location:../index.php?p=memilihpen");
}

if (isset($_GET['id_penilai'])) {
	$id_penilai = isset($_GET['id_penilai']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id_penilai'])) : "";
	/*$sql = "SELECT 
										a.id_penilai, 
										a.nip, 
										(SELECT nip FROM penilai_detail WHERE id_penilai_detail = b.id_penilai_detail) as 'penilai',
										(SELECT nip FROM penilai_detail WHERE id_penilai_detail = b.id_penilai_detail+1) as 'penilai2',
										(SELECT nip FROM penilai_detail WHERE id_penilai_detail = b.id_penilai_detail+2) as 'penilai3',
										(SELECT nip FROM penilai_detail WHERE id_penilai_detail = b.id_penilai_detail+3) as 'penilai4',
										(SELECT nip FROM penilai_detail WHERE id_penilai_detail = b.id_penilai_detail+4) as 'penilai5',
										(SELECT nip FROM penilai_detail WHERE id_penilai_detail = b.id_penilai_detail+5) as 'penilai6'
									FROM penilai a 
									JOIN penilai_detail b ON a.id_penilai = b.id_penilai
									WHERE a.id_penilai = $id_penilai
									GROUP BY a.id_penilai";*/
	$i = 1;
	$sql = "SELECT a.id_penilai, a.nip, b.nip as 'penilai', d.jabatan, d.level 
				FROM penilai a 
				JOIN penilai_detail b ON a.id_penilai = b.id_penilai
				JOIN user c ON b.nip = c.nip
				JOIN jenis_user d ON c.id_jenis_user = d.id_jenis_user
				WHERE a.id_penilai = $id_penilai AND a.nip <> b.nip AND d.level = 1";
	$q = mysqli_query($con, $sql);
	$data = [];
	while ($row = mysqli_fetch_assoc($q)) {
		$d['id_penilai'] = $row['id_penilai'];
		$d['nip'] = $row['nip'];
		$d['penilai' . $i] = $row['penilai'];
		$i++;
	}
	$data = $d;
	echo json_encode($data);
}