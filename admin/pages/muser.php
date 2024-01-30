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
            <li class="breadcrumb-item active"
                aria-current="page">Users</li>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col">
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col">
                        <button type="button"
                                class="btn btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            <span><i class="fas fa-user-plus"></i> Tambah User</span>
                        </button>
                    </div>

                </div>

                <?php
                $btn = "Tambah";
                if (isset($_GET['ubah'])) {
                    $nip = isset($_GET['nip']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['nip'])) : "";
                    $sql = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE a.nip = $nip";
                    $q = mysqli_query($con, $sql);
                    $data = [];
                    while ($row = mysqli_fetch_assoc($q)) {

                        $nip = $row['nip'];
                        $jabatan =  $row['jabatan'];
                        $$jabatan = $row['jabatan'];
                        $id_jenis_user = $row['id_jenis_user'];
                        $password = $row['password'];
                        $nama_guru = $row['nama_guru'];
                        $status_guru = $row['status_guru'];
                        $alamat = $row['alamat'];
                        $tempat_lahir = $row['tempat_lahir'];
                        $tgl_lahir = $row['tgl_lahir'];
                        $jenis_kelamin = $row['jenis_kelamin'];
                        $$row['jenis_kelamin'] = $row['jenis_kelamin'];
                        $status_nikah = $row['status_nikah'];
                        $$row['status_nikah'] = $row['status_nikah'];
                        $no_telp = $row['no_telp'];
                        $btn = "Ubah";
                    }

                ?>
                <script type="text/javascript">
                $(document).ready(function() {
                    $('#exampleModal').modal('show');

                    $('#exampleModal').on('hidden.bs.modal', function(e) {
                        document.location = 'index.php?p=muser';
                    });
                });
                </script>
                <?php
                }
                ?>
                <!-- Modal -->
                <div class="modal fade"
                     id="exampleModal"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg"
                         role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="exampleModalLabel">
                                    <?php if (isset($_GET['ubah'])) {
                                        echo "Ubah User | {$nama_guru}";
                                    } else {
                                        echo "Tambah User";
                                    } ?>
                                </h5>
                                <button type="button"
                                        class="close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form -->
                                <form class="form-horizontal"
                                      method="post"
                                      action="modal/p_user.php">
                                    <div class="form-group row">
                                        <label for="nip"
                                               class="col-sm-2 col-form-label col-form-label-sm">Nip</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control form-control-sm"
                                                   id="nip"
                                                   name="nip"
                                                   <?= isset($nip) ? 'value="' . $nip . '" readonly' : ""; ?>
                                                   placeholder="NIP">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_guru"
                                               class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control form-control-sm"
                                                   id="nama_guru"
                                                   name="nama_guru"
                                                   value="<?= isset($nama_guru) ? $nama_guru : ""; ?>"
                                                   placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control form-control-sm"
                                                   id="password"
                                                   name="password"
                                                   value="<?= isset($password) ? $password : ""; ?>"
                                                   placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="id_jenis_user"
                                               class="col-sm-2 col-form-label col-form-label-sm">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-select form-select-sm"
                                                    id="id_jenis_user"
                                                    name="id_jenis_user">
                                                <?php
                                                $jb = mysqli_query($con, "SELECT * FROM jenis_user");
                                                while ($rj = mysqli_fetch_array($jb)) {
                                                ?>


                                                <?php if (!$_GET['ubah']) {
                                                    ?>
                                                <option value="6"
                                                        selected
                                                        hidden>-- Jabatan --</option>
                                                <?php } else { ?>
                                                <option value="<?= $id_jenis_user ?>"
                                                        selected
                                                        hidden> <?= $jabatan ?></option>
                                                <?php } ?>

                                                <option value="<?= $rj['id_jenis_user'] ?>">
                                                    <?= $rj['jabatan']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status_guru"
                                               class="col-sm-2 col-form-label col-form-label-sm">Status Guru</label>
                                        <div class="col-sm-10">
                                            <select name="status_guru"
                                                    id="status_guru"
                                                    class="form-select form-select-sm">
                                                <?php if (!$_GET['ubah']) {
                                                ?>
                                                <option value=""
                                                        selected
                                                        hidden> -- Status Guru -- </option>
                                                <?php } else { ?>
                                                <option value=""
                                                        selected
                                                        hidden> <?= $status_guru ?></option>
                                                <?php } ?>

                                                <option value="PNS">PNS (Pegawai Negeri Sipil)</option>
                                                <option value="PPPK">PPPK (Pegawai Pemerintah dengan Perjanjian Kerja)
                                                </option>
                                                <option value="GTY">GTY (Guru Tetap Yayasan)</option>
                                                <option value="GTY">GTT (Guru Tidak Tetap)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat"
                                               class="col-sm-2 control-form-label col-form-label-sm">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control form-control-sm"
                                                      id="alamat"
                                                      name="alamat"
                                                      placeholder="Alamat"
                                                      rows="10"><?= isset($alamat) ? $alamat : ""; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tempat_lahir"
                                               class="col-sm-2 control-form-label col-form-label-sm">Tempat
                                            Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control form-control-sm"
                                                   id="tempat_lahir"
                                                   name="tempat_lahir"
                                                   value="<?= isset($tempat_lahir) ? $tempat_lahir : ""; ?>"
                                                   placeholder="Tempat Lahir">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tgl_lahir"
                                               class="col-sm-2 control-form-label col-form-label-sm">Tgl
                                            Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date"
                                                   class="form-control form-control-sm"
                                                   id="tgl_lahir"
                                                   name="tgl_lahir"
                                                   value="<?= isset($tgl_lahir) ? $tgl_lahir : ""; ?>"
                                                   placeholder="Tgl Lahir">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-form-label col-form-label-sm">Jenis
                                            Kelamin</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       name="jenis_kelamin"
                                                       id="jenis_kelamin_l"
                                                       value="L"
                                                       <?= isset($L) ? "checked" : ""; ?>>
                                                <label class="form-check-label"
                                                       for="jenis_kelamin_l">
                                                    Laki-Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       name="jenis_kelamin"
                                                       id="jenis_kelamin_p"
                                                       value="P"
                                                       <?= isset($P) ? "checked" : ""; ?>>
                                                <label class="form-check-label"
                                                       for="jenis_kelamin_p">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-form-label col-form-label-sm">Status
                                            Nikah</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       name="status_nikah"
                                                       id="status_nikah_b"
                                                       value="B"
                                                       <?= isset($B) ? "checked" : ""; ?>>
                                                <label class="form-check-label"
                                                       for="status_nikah_b">
                                                    Belum Menikah
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       name="status_nikah"
                                                       id="status_nikah_n"
                                                       value="N"
                                                       <?= isset($N) ? "checked" : ""; ?>>
                                                <label class="form-check-label"
                                                       for="status_nikah_n">
                                                    Sudah Menikah
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="no_telp"
                                               class="col-sm-2 control-form-label col-form-label-sm">No
                                            Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control form-control-sm"
                                                   id="no_telp"
                                                   name="no_telp"
                                                   value="<?= isset($no_telp) ? $no_telp : ""; ?>"
                                                   placeholder="No Telp">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                <input type="submit"
                                       class="btn btn-success"
                                       value="<?= $btn; ?>"
                                       name="btnSimpan">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-center table-hover order-table display w-100"
                               id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col"
                                        class="text-center align-middle">NIP</th>
                                    <th scope="col"
                                        class="text-center align-middle">Nama</th>
                                    <th scope="col"
                                        class="text-center align-middle">Jabatan</th>
                                    <th scope="col"
                                        class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user";
                                $q = mysqli_query($con, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($q)) {
                                ?>
                                <tr>
                                    <td><?= $row['nip']; ?></td>
                                    <td><?= $row['nama_guru']; ?></td>
                                    <td><?= $row['jabatan']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm btn_info_user m-1"
                                                id="<?= $row['nip']; ?>"><span><i class="fas fa-search"></i>
                                                Detail</span></button>
                                        <a href="index.php?p=muser&ubah=true&nip=<?= $row['nip']; ?>"
                                           class="btn btn-warning btn-sm m-1"
                                           id="<?= $row['nip']; ?>"><span><i class="fas fa-edit"></i> Ubah</span></a>
                                        <button href="#"
                                                class="btn btn-danger btn-sm btn_hapus_user m-1"
                                                id="<?= $row['nip']; ?>"><span><i class="fas fa-trash"></i>
                                                Hapus</span></button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade infolengkap"
     tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Detail User</h5>
                <button type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th width="20%">Nip</th>
                        <td width="5%">:</td>
                        <td id="td_nip">:</td>
                    </tr>

                    <tr>
                        <th>Jabatan</th>
                        <td>:</td>
                        <td id="td_jabatan">:</td>
                    </tr>

                    <tr>
                        <th>Password</th>
                        <td>:</td>
                        <td id="td_password">:</td>
                    </tr>

                    <tr>
                        <th>Nama Guru</th>
                        <td>:</td>
                        <td id="td_nama_guru">:</td>
                    </tr>

                    <tr>
                        <th>Status Guru</th>
                        <td>:</td>
                        <td id="td_status_guru">:</td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td id="td_alamat">:</td>
                    </tr>

                    <tr>
                        <th>Tempat, Tgl Lahir</th>
                        <td>:</td>
                        <td id="td_ttl">:</td>
                    </tr>

                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td id="td_jk">:</td>
                    </tr>

                    <tr>
                        <th>Status Nikah</th>
                        <td>:</td>
                        <td id="td_status_nikah">:</td>
                    </tr>

                    <tr>
                        <th>No Telp</th>
                        <td>:</td>
                        <td id="td_notelp">:</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade hapusdata"
     tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Hapus Data User</h5>

                <button type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <form method="post"
                          action="modal/p_user.php">

                        <input type="hidden"
                               name="id_delete"
                               id="id_delete">
                </button>
            </div>
            <div class="modal-body">
                <br>
                <div class="modal-text">Data User Akan Dihapus?</div>
                <br>
                <div class="modal-footer">
                    <input type="submit"
                           class="btn btn-danger btn_delete"
                           name="btnDelete"
                           value="Hapus">
                    </form>
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $(".btn_info_user").click(function() {
        var id = $(this).attr("id");
        var _url = "modal/p_user.php?nip=" + id;
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
                $("#td_status_nikah").html(res.status_nikah == "B" ? "Belum Nikah" :
                    "Sudah Nikah");
                $("#td_notelp").html(res.no_telp);
            }
        });
        $('.infolengkap').modal('show');
    });
    $(".btn_hapus_user").click(function() {
        var id = $(this).attr("id");
        $("#id_delete").val(id);
        $('.hapusdata').modal('show');
    });
});
</script>