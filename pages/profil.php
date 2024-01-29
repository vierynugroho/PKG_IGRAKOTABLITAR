<?php
$nip_user = $_SESSION[md5('user')]; //'2012091200113504';

$sql = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE a.nip = '$nip_user'";
$q = mysqli_query($con, $sql);
$row = mysqli_fetch_array($q);

?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?p=home"><i class="fas fa fa-home text-success"></i></a></li>
            <li class="breadcrumb-item active"
                aria-current="page">Profile</li>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table fw-bold table-hover">
                        <tr>
                            <th>NIP</th>
                            <td>:</td>

                            <td id="td_ni
							p"><?= $row['nip']; ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>:</td>

                            <td id="td_jabatan"><?= $row['jabatan']; ?></td>
                        </tr>

                        <tr>
                            <th>Password</th>
                            <td>:</td>

                            <td id="td_password"><?= $row['password']; ?></td>
                        </tr>

                        <tr>
                            <th>Nama Guru</th>
                            <td>:</td>

                            <td id="td_nama_guru"><?= $row['nama_guru']; ?></td>
                        </tr>

                        <tr>
                            <th>Status Guru</th>
                            <td>:</td>
                            <td id="td_status_guru"><?= $row['status_guru']; ?></td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td>:</td>

                            <td id="td_alamat">
                                <?= $row['alamat']; ?></td>
                        </tr>

                        <tr>
                            <th>Tempat</th>
                            <td>:</td>

                            <td id="td_ttl"><?= $row['tempat_lahir']; ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>:</td>

                            <td id="td_ttl"><?= $row['tgl_lahir']; ?></td>
                        </tr>

                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>

                            <td id="td_jk"><?php if ($row['jenis_kelamin'] == 'L') {
                                                echo "Laki-Laki";
                                            } else if ($row['jenis_kelamin'] == 'P') {
                                                echo "Perempuan";
                                            }; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Status Nikah</th>
                            <td>:</td>
                            <td id="td_status_nikah"><?php if ($row['status_nikah'] == 'N') {
                                                            echo "Menikah";
                                                        } else if ($row['status_nikah'] == 'B') {
                                                            echo "Belum Menikah";
                                                        }; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>No Telp</th>
                            <td>:</td>

                            <td id="td_notelp">
                                <?= $row['no_telp'];
                                ?>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
var id = $(this).attr("id");
var _url = "admin/modal/p_user.php?nip=" + id;
$.ajax({
    url: _url,
    success: function(result) {
        var res = JSON.parse(result);
        console.log(res);
        $("#td_nip").html(res.nip);
        $("#td_jabatan").html(res.jabatan);
        $("#td_password").html(res.password);
        $("#td_nama_guru").html(res.nama_guru);
        $("#td_status_guru").html(res.status_guru);
        $("#td_alamat").html(res.alamat);
        $("#td_ttl").html(res.tempat_lahir + ", " + res.tgl_lahir);
        $("#td_jk").html(res.jenis_kelamin == "L" ? "Laki-laki" : "Perempuan");
        $("#td_status_nikah").html(res.status_nikah == "B" ? "Belum Nikah" : "Sudah Nikah");
        $("#td_notelp").html(res.no_telp);
    }
})
</script>