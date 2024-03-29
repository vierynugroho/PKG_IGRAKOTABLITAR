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
            <li class="breadcrumb-item active" aria-current="page">Periode</li>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Button trigger modal -->


            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span><i class="fas fa-plus-circle"></i> Tambah periode</span>
                    </button>
                </div>
            </div>
            <?php
            $btn = "Tambah";
            if (isset($_GET['ubah'])) {
                $id_periode = isset($_GET['id_periode']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id_periode'])) : "";
                $sql = "SELECT * FROM periode WHERE id_periode = $id_periode";
                $q = mysqli_query($con, $sql);

                $data = [];
                while ($row = mysqli_fetch_assoc($q)) {
                    $id_periode = $row['id_periode'];
                    $tahun_ajar = $row['tahun_ajar'];
                    $semester = $row['semester'];
                    $status_periode = $row['status_periode'];
                    $btn = "Ubah";
                    $setting = $row['setting'];
                }

            ?>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#exampleModal').modal('show');

                        $('#exampleModal').on('hidden.bs.modal', function(e) {
                            document.location = 'index.php?p=mperiode';
                        });
                    });
                </script>
            <?php
            }
            ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <?php if (isset($_GET['ubah'])) {
                                    echo "Ubah Periode | {$tahun_ajar} - {$semester}";
                                } else {
                                    echo "Tambah Periode";
                                } ?>
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- form -->
                            <form class="form-horizontal" method="post" action="modal/p_periode.php">
                                <input type="hidden" name="id_periode" <?= isset($id_periode) ? 'value="' . $id_periode . '"' : ""; ?>>
                                <div class="form-group row">
                                    <label for="tahun_ajar" class="col-sm-3 col-form-label col-form-label-sm">Tahun
                                        Ajaran<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control form-control-sm" id="tahun_ajar" name="tahun_ajar" value="<?= isset($tahun_ajar) ? $tahun_ajar : ""; ?>" placeholder="Tahun Ajaran" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="semester" class="col-sm-3 col-form-label col-form-label-sm">Semester<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="semester" id="semester" class="form-select form-select-sm" required>
                                            <?php
                                            $sql = "SELECT * FROM periode WHERE id_periode = $id_periode";
                                            $q = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_assoc($q);

                                            $semester = $row['semester'];


                                            if ($_GET['ubah']) { ?>
                                                <option value="<?= $semester ?>" selected hidden> <?= $semester ?> </option>
                                            <?php } else { ?>
                                                <option value="" selected hidden> -- Semester -- </option>
                                            <?php } ?>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status_periode" class="col-sm-3 col-form-label col-form-label-sm">Status Periode<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="status_periode" id="status_periode" class="form-select form-select-sm" required>
                                            <?php
                                            $sql = "SELECT * FROM periode WHERE status_periode = $id_periode";
                                            $q = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_assoc($q);

                                            $status = $row['status_periode'];

                                            if ($_GET['ubah']) { ?>
                                                <option value="<?= $status ?>" selected hidden> <?= $status == 1 ? 'Aktif' : 'Tidak Aktif'  ?> </option>
                                            <?php } else { ?>
                                                <option value="" selected hidden> -- status -- </option>
                                            <?php } ?>
                                            <option value="1">Aktif</option>
                                            <option value="0">Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <fieldset>
                                    <h5>Presentase Penilaian</h5>
                                    <div class="form-group row">
                                        <label for="kepalaSekolah" class="col-sm-3 col-form-label col-form-label-sm">Presentase
                                            Kepala Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control form-control-sm presentase" id="kepalaSekolah" name="kepalaSekolah" value="100" placeholder="Presentase Kepala Sekolah" readonly>
                                        </div>
                                    </div>

                                    <fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-success" value="<?= $btn; ?>" name="btnSimpan">
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
                    <table class="table text-center order-table display w-100" id="myTable">
                        <thead class="table-success">
                            <tr>
                                <th scope="col" class="text-center align-middle">No</th>
                                <th scope="col" class="text-center align-middle">Tahun Ajaran</th>
                                <th scope="col" class="text-center align-middle">Semester</th>
                                <th scope="col" class="text-center align-middle">Penilaian</th>
                                <th scope="col" class="text-center align-middle">Status</th>
                                <th scope="col" class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM periode";
                            $q = mysqli_query($con, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_array($q)) {
                            ?>
                                <tr>
                                    <td>
                                        <?= ++$i; ?>
                                    </td>
                                    <td>
                                        <?= $row['tahun_ajar']; ?>
                                    </td>
                                    <td>
                                        <?= $row['semester']; ?>
                                    </td>
                                    <td>
                                        <?= $row['setting']; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status_periode'] == 0) { ?>
                                            <span class="text-danger"><i class="fas fa-times-circle"></i> Tidak Aktif</span>
                                        <?php } else { ?>
                                            <span class="text-success"><i class="fas fa-check-circle"></i> Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status_periode'] == 0) { ?>

                                        <?php } ?>
                                        <a href="index.php?p=mperiode&ubah=true&id_periode=<?= $row['id_periode']; ?>" class="btn btn-warning btn-sm"><span><i class="fas fa-edit"> </i> Ubah</span></a>
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