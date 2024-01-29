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

<?php
if (isset($_GET['setaktif'])) {
    $id_periode = isset($_GET['id_periode']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id_periode'])) : "";
    $sql = "UPDATE periode SET status_periode = 0";
    $up = mysqli_query($con, $sql);
    if ($up) {
        if (mysqli_query($con, "UPDATE periode SET status_periode = 1 WHERE id_periode = $id_periode")) {
            $_SESSION["flash"]["type"] = "success";
            $_SESSION["flash"]["head"] = "Sukses";
            $_SESSION["flash"]["msg"] = "Data berhasil disimpan!";
        }
    }
    $_SESSION["flash"]["type"] = "danger";
    $_SESSION["flash"]["head"] = "Terjadi Kesalahan";
    $_SESSION["flash"]["msg"] = "Data gagal disimpan! " . mysqli_error($con);
    echo "<script>document.location='index.php?p=mperiode';</script>";
}
?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?p=home"><i class="fas fa fa-home text-success"></i></a></li>
            <li class="breadcrumb-item active"
                aria-current="page">Periode</li>
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
                    if ($row['setting'] != '') {
                        $set = explode(';', $row['setting']);
                        $atasan = $set[0];
                        $rekan = $set[1];
                        $diri = $set[2];
                    }
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
                                    echo "Ubah Periode | {$tahun_ajar} - {$semester}";
                                } else {
                                    echo "Tambah Periode";
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
                                  action="modal/p_periode.php">
                                <input type="hidden"
                                       name="id_periode"
                                       <?= isset($id_periode) ? 'value="' . $id_periode . '"' : ""; ?>>
                                <div class="form-group row">
                                    <label for="tahun_ajar"
                                           class="col-sm-3 col-form-label col-form-label-sm">Tahun
                                        Ajaran</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               id="tahun_ajar"
                                               name="tahun_ajar"
                                               value="<?= isset($tahun_ajar) ? $tahun_ajar : ""; ?>"
                                               placeholder="Tahun Ajaran">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="semester"
                                           class="col-sm-3 col-form-label col-form-label-sm">Semester</label>
                                    <div class="col-sm-9">
                                        <select name="semester"
                                                id="semester"
                                                class="form-select form-select-sm">
                                            <option value=""
                                                    selected
                                                    hidden> -- Semester -- </option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                </div>
                                <fieldset>
                                    <legend>Presentase Penilaian</legend>
                                    <div class="form-group row">
                                        <label for="atasan"
                                               class="col-sm-3 col-form-label col-form-label-sm">Presentase
                                            Atasan</label>
                                        <div class="col-sm-9">
                                            <input type="number"
                                                   class="form-control form-control-sm presentase"
                                                   min="0"
                                                   max="100"
                                                   id="atasan"
                                                   name="atasan"
                                                   value="<?= isset($atasan) ? $atasan : ""; ?>"
                                                   placeholder="Presentase Atasan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rekan"
                                               class="col-sm-3 col-form-label col-form-label-sm">Presentase
                                            Rekan Kerja</label>
                                        <div class="col-sm-9">
                                            <input type="number"
                                                   class="form-control form-control-sm presentase"
                                                   min="0"
                                                   max="100"
                                                   id="rekan"
                                                   name="rekan"
                                                   value="<?= isset($rekan) ? $rekan : ""; ?>"
                                                   placeholder="Presentase Rekan Kerja">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="diri"
                                               class="col-sm-3 col-form-label col-form-label-sm">Presentase
                                            Diri Sendiri</label>
                                        <div class="col-sm-9">
                                            <input type="number"
                                                   class="form-control form-control-sm presentase"
                                                   min="0"
                                                   max="100"
                                                   id="diri"
                                                   name="diri"
                                                   value="<?= isset($diri) ? $diri : ""; ?>"
                                                   placeholder="Presentase Diri Sendiri">
                                        </div>
                                    </div>
                                    <fieldset>
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
                    <table class="table text-center order-table display w-100"
                           id="myTable">
                        <thead class="table-success">
                            <tr>
                                <th scope="col"
                                    class="text-center align-middle">No</th>
                                <th scope="col"
                                    class="text-center align-middle">Tahun Ajaran</th>
                                <th scope="col"
                                    class="text-center align-middle">Semester</th>
                                <th scope="col"
                                    class="text-center align-middle">Penilaian</th>
                                <th scope="col"
                                    class="text-center align-middle">Status</th>
                                <th scope="col"
                                    class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM periode";
                            $q = mysqli_query($con, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_array($q)) {
                                $setting = '';
                                if ($row['setting'] != '') {
                                    $set = explode(';', $row['setting']);
                                    $setting = "Atasan = $set[0]% <br>Rekan Kerja = $set[1]% <br>Diri Sendiri = $set[2]%";
                                }

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
                                <td class="text-justify">
                                    <?= $setting; ?>
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
                                    <!-- <a href="index.php?p=mperiode&setaktif=true&id_periode=<?= $row['id_periode']; ?>" class="btn btn-outline-info btn-sm"><span data-feather="check"></span></a> -->
                                    <?php } ?>
                                    <a href="index.php?p=mperiode&ubah=true&id_periode=<?= $row['id_periode']; ?>"
                                       class="btn btn-warning btn-sm"><span><i class="fas fa-edit"> Ubah</i></span></a>
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