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
                aria-current="page">Jenis User</li>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Button trigger modal -->

            <div class="row">
                <div class="col">
                    <button type="button"
                            class="btn btn-success"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        <span><i class="fas fa-user-plus"></i> Tambah Jenis User</span>
                    </button>
                </div>
            </div>

            <div class="card shadow mt-3">
                <div class="card-header bg-success">
                    <h6 class="fw-bold text-light">Keterangan</h6>
                </div>
                <div class="card-body">
                    <div class="accordion"
                         id="keteranganRole">
                        <div class="accordion-item">
                            <h2 class="accordion-header"
                                id="headingOne">
                                <button class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapsePenilaian"
                                        aria-expanded="false"
                                        aria-controls="collapsePenilaian">
                                    Keterangan Role User
                                </button>
                            </h2>
                            <div id="collapsePenilaian"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="headingOne"
                                 data-bs-parent="#keteranganRole">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Level</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>0</td>
                                                    <td>
                                                        <h6 class="fw-bold">Tata Usaha</h6>
                                                        <p>Manajemen Pengguna, Kompetensi, Periode, Dan Role Pengguna
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <h6 class="fw-bold">Guru</h6>
                                                        <p>Menerima Laporan Hasil Penilaian
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>
                                                        <h6 class="fw-bold">Wakil Kepala Sekolah</h6>
                                                        <p>Manajemen Penilaian Guru, Penilaian Kinerja, Laporan Kinerja
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>
                                                        <h6 class="fw-bold">Kepala Sekolah</h6>
                                                        <p>Manajemen Penilaian Guru, Penilaian Kinerja, Laporan Kinerja
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            $btn = "Tambah";
            if (isset($_GET['ubah'])) {
                $id_jenis_user = isset($_GET['id_jenis_user']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id_jenis_user'])) : "";
                $sql = "SELECT * FROM jenis_user WHERE id_jenis_user = $id_jenis_user";
                $q = mysqli_query($con, $sql);
                $data = [];
                while ($row = mysqli_fetch_assoc($q)) {
                    $id_jenis_user = $row['id_jenis_user'];
                    $jabatan = $row['jabatan'];
                    $level = $row['level'];
                    $btn = "Ubah";
                }

            ?>
            <script type="text/javascript">
            $(document).ready(function() {
                $('#exampleModal').modal('show');

                $('#exampleModal').on('hidden.bs.modal', function(e) {
                    document.location = 'index.php?p=mjuser';
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
                <div class="modal-dialog"
                     role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                id="exampleModalLabel">
                                <?php if (isset($_GET['ubah'])) {
                                    echo "Ubah Jenis User | {$jabatan}";
                                } else {
                                    echo "Tambah Jenis User";
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
                                  action="modal/p_jenis_user.php">
                                <input type="hidden"
                                       id="id_jenis_user"
                                       name="id_jenis_user"
                                       value="<?= isset($id_jenis_user) ? $id_jenis_user : ""; ?>">
                                <div class="form-group row">
                                    <label for="jabatan"
                                           class="col-sm-2 control-label">Jabatan<span
                                              class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                               class="form-control"
                                               id="jabatan"
                                               name="jabatan"
                                               value="<?= isset($jabatan) ? $jabatan : ""; ?>"
                                               placeholder="Jabatan"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="level"
                                           class="col-sm-2 control-label">Level<span
                                              class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number"
                                               class="form-control"
                                               id="level"
                                               min="0"
                                               max="3"
                                               name="level"
                                               value="<?= isset($level) ? $level : ""; ?>"
                                               placeholder="Level"
                                               required>
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
            <div class="row">
                <div class="col">
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-center table-hover order-table display w-100"
                               id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col"
                                        class="text-center align-middle">No</th>
                                    <th scope="col"
                                        class="text-center align-middle">Jabatan</th>
                                    <th scope="col"
                                        class="text-center align-middle">Level</th>
                                    <th scope="col"
                                        class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM jenis_user";
                                $q = mysqli_query($con, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($q)) {
                                ?>
                                <tr>
                                    <td><?= ++$i; ?></td>
                                    <td><?= $row['jabatan']; ?></td>
                                    <td><?= $row['level']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm btn_info_jenis_user m-1"
                                                id="<?= $row['id_jenis_user']; ?>"><span><i class="fas fa-search"></i>
                                                Detail</span></button>
                                        <a href="index.php?p=mjuser&ubah=true&id_jenis_user=<?= $row['id_jenis_user']; ?>"
                                           class="btn btn-warning btn-sm m-1"
                                           id="<?= $row['id_jenis_user']; ?>"><span><i class="fas fa-edit">
                                                </i> Ubah</span></a>

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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Detail Jenis User</h5>
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
                        <th>Jabatan</th>
                        <td> : </td>
                        <td id="td_jabatan"> Kepala Sekolah </td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td> : </td>
                        <td id="td_level"> 0 </td>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Hapus Data Jenis User</h5>
                <button type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <form method="post"
                          action="modal/p_jenis_user.php">

                        <input type="hidden"
                               name="id_delete"
                               id="id_delete">
                </button>
            </div>
            <div class="modal-body">
                <br>
                <div class="modal-text">Jenis User Akan Dihapus?</div>
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
    $(".btn_info_jenis_user").click(function() {
        var id = $(this).attr("id");
        var _url = "modal/p_jenis_user.php?id_jenis_user=" + id;
        $.ajax({
            url: _url,
            success: function(result) {
                var res = JSON.parse(result);
                $("#td_jabatan").html(res.jabatan);
                $("#td_level").html(res.level);
            }
        });
        $('.infolengkap').modal('show');
    });
    $(".btn_hapus_jenis_user").click(function() {
        var id = $(this).attr("id");
        $("#id_delete").val(id);
        $('.hapusdata').modal('show');
    });
});
</script>