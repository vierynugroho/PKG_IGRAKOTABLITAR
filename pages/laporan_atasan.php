<script>
    (function(document) {
        'use strict';

        var LightTableFilter = (function(Arr) {

            var _input;

            function _onInputEvent(e) {
                _input = e.target;
                var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                Arr.forEach.call(tables, function(table) {
                    Arr.forEach.call(table.tBodies, function(tbody) {
                        Arr.forEach.call(tbody.rows, _filter);
                    });
                });
            }

            function _filter(row) {
                var text = row.textContent.toLowerCase(),
                    val = _input.value.toLowerCase();
                row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
            }

            return {
                init: function() {
                    var inputs = document.getElementsByClassName('form-control');
                    Arr.forEach.call(inputs, function(input) {
                        input.oninput = _onInputEvent;
                    });
                }
            };
        })(Array.prototype);

        document.addEventListener('readystatechange', function() {
            if (document.readyState === 'complete') {
                LightTableFilter.init();
            }
        });

    })(document);
</script>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?p=home"><i class="fas fa fa-home text-success"></i></a></li>
            <?php
            if (isset($_GET['p']) && !isset($_GET['detail'])) {
                echo "<li class='breadcrumb-item active' aria-current='page'>Laporan Penilaian Kinerja </li> ";
            } else if (isset($_GET['p']) && isset($_GET['detail'])) {
                echo "<li class='breadcrumb-item active' aria-current='page'><a href='index.php?p=laporanpen' class='text-success'> Laporan Penilaian Kinerja </a> / Detail</li>";
            }
            ?>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">


        <div class="row">
            <?php if (!isset($_GET['detail'])) : ?>
                <div class="col">
                    <div class="row d-flex justify-content-between">
                        <div class="col d-flex align-items-start  justify-content-start">
                            <a class="btn disabled text-success">Periode
                                <?= get_tahun_ajar(); ?>
                            </a>
                            <hr />
                        </div>
                        <div class="col d-flex align-items-end justify-content-end">
                            <a class="btn btn-success pull-right" target="blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" href="pages/pdf.php"><i class="fas fa-print"></i>
                                Print</a>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table text-center order-table w-100 display" id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center align-middle">No</th>
                                    <th class="text-center align-middle">NIP</th>
                                    <th class="text-center align-middle">Nama</th>
                                    <th class="text-center align-middle">Total Nilai</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                while ($row = mysqli_fetch_array($q)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?= ++$i; ?>
                                        </td>
                                        <td>
                                            <?= $row['nip']; ?>
                                        </td>
                                        <td>
                                            <?= $row['nama_guru']; ?>
                                        </td>
                                        <td>
                                            <?= get_tot_nilai($row['nip'], get_tahun_ajar_id()); ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm" href="index.php?p=laporanpen&detail=<?= $row['nip'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fas fa-search"></i> Detail</a>
                                            <a class="btn btn-outline-danger btn-sm" href="pages/pdf.php?detail=<?= $row['nip'] ?>" target="blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Export Pdf"><i class="fas fa-print"></i> Print</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else :
                $nip_user = $_GET['detail'];
                $id_penilai = isset($_GET['id']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id'])) : "";
                $sql = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE a.nip = '$nip_user' ";
                $q = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($q);
            ?>
                <div class="col" style="margin-bottom:20px; text-align:right;">
                    <a class="btn btn-success btn-sm" target="blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Export PDF" href="pages/pdf.php?detail=<?= $row['nip'] ?>"><i class="fas fa-print"></i>
                        Print</a>
                </div>

                <!-- Detail Penilaian -->
                <table class="table">
                    <tr>
                        <td width="10%"><strong>NIP</strong></td>
                        <td width="1%">:</td>
                        <td>
                            <?= $row['nip']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>:</td>
                        <td>
                            <?= $row['nama_guru']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Jabatan</strong></td>
                        <td>:</td>
                        <td>
                            <?= $row['jabatan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

                <?php
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
                // /*echo '<pre>';
                // //print_r($data_kompetensi);
                // //echo $data_kompetensi[1]['nama_kompetensi'];

                // foreach ($data_kompetensi as $key => $value) {
                // 	echo "$key => $value[nama_kompetensi]";
                // 	echo "SUM( IF(tbnilai.$value[nama_kompetensi] = '$value[nama_kompetensi]', tbnilai.nilai, 0) ) AS '$value[nama_kompetensi]', <br>";
                // }
                // echo '</pre>';*/
                ?>

                <table class="table table-bordered">
                    <thead class="text-center table table-success">
                        <tr>
                            <th rowspan="2" class="align-middle">No</th>
                            <th rowspan="2" class="align-middle">NIP</th>
                            <th rowspan="2" class="align-middle">Nama</th>
                            <th rowspan="2" class="align-middle">Jabatan</th>
                            <th colspan="4">Kompetensi</th>
                            <th rowspan="2">Total</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($data_kompetensi as $key => $value) {
                                echo "<th>$value[nama_kompetensi]</th>";
                            }
                            ?>
                            <!-- <th>Pedagogik</th>
						<th>Kepribadian</th>
						<th>Sosial</th>
						<th>Profesional</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php



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
                        $id_periode = get_tahun_ajar_id();
                        $komp = '';
                        foreach ($data_kompetensi as $key => $value) {
                            $komp .= "SUM( IF(tbnilai.nama_kompetensi = '$value[nama_kompetensi]', tbnilai.nilai, 0) ) AS '$value[nama_kompetensi]', ";
                        }
                        /*
												   SUM( IF(tbnilai.nama_kompetensi = 'Pedagogik', tbnilai.nilai, 0) ) AS 'Pedagogik',
												   SUM( IF(tbnilai.nama_kompetensi = 'Kepribadian', tbnilai.nilai, 0) ) AS 'Kepribadian',
												   SUM( IF(tbnilai.nama_kompetensi = 'Sosial', tbnilai.nilai, 0) ) AS 'Sosial',
												   SUM( IF(tbnilai.nama_kompetensi = 'Profesional', tbnilai.nilai, 0) ) AS 'Profesional'
									   */

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
                        echo "<br>";
                        $tot_arr['atasan'] = 0;
                        // $tot_arr['guru'] = 0;
                        // $tot_arr['sendiri'] = 0;
                        while ($row = mysqli_fetch_array($q)) {
                            echo "<tr>";
                            echo "<td>" . ++$nno . "</td>";
                            echo "<td>$row[nip_penilai]</td>";
                            echo "<td>$row[penilai]</td>";
                            echo "<td>$row[jabatan]</td>";

                            $tot = 0;
                            foreach ($data_kompetensi as $key => $value) {
                                $nil = ($row[$value['nama_kompetensi']] / $value['jml']) * 100;
                                echo "<td>" . number_format($nil, 2) . "</td>";
                                $tot += $nil * ($value['bobot_kompetensi'] / 100);
                            }

                            if ($row['level'] == 2 || $row['level'] == 3) {
                                $tot_arr['atasan'] += $tot;
                            }

                            echo "<td>" . number_format($tot, 2) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="8">Total Nilai Kinerja</th>
                            <th>

                                <?= number_format($tot, 2);
                                ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>

            <?php endif; ?>
        </div>
    </div>
</div>
<?= '<script type="text/javascript">' ?>
$(document).ready(function(){
$('[data-bs-toggle="tooltip"]').tooltip();
});
<?= '</script>' ?>