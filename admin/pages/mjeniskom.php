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
                aria-current="page">Jenis Kompetensi</li>
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
                        <span><i class="fas fa-plus"></i> Tambah Jenis Kompetensi</span>
                    </button>
                </div>
            </div>
            <?php
            $btn = "Tambah";
            if (isset($_GET['ubah'])) {
                $id_kompetensi = isset($_GET['id_kompetensi']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id_kompetensi'])) : "";
                $sql = "SELECT * FROM jenis_kompetensi WHERE id_kompetensi = $id_kompetensi";
                $q = mysqli_query($con, $sql);
                $data = [];
                while ($row = mysqli_fetch_assoc($q)) {
                    $id_kompetensi = $row['id_kompetensi'];
                    $nama_kompetensi = $row['nama_kompetensi'];
                    $bobot_kompetensi = $row['bobot_kompetensi'];
                    $btn = "Ubah";
                }

            ?>
            <script type="text/javascript">
            $(document).ready(function() {
                $('#exampleModal').modal('show');

                $('#exampleModal').on('hidden.bs.modal', function(e) {
                    document.location = 'index.php?p=mjeniskom';
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
                                    echo "Ubah Jenis Kompetensi";
                                } else {
                                    echo "Tambah Jenis Kompetensi";
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
                                  action="modal/p_jenis_kompetensi.php">
                                <input type="hidden"
                                       id="id_kompetensi"
                                       name="id_kompetensi"
                                       <?= isset($id_kompetensi) ? 'value="' . $id_kompetensi . '" readonly' : ""; ?>>
                                <div class="form-group row">
                                    <label for="nama_kompetensi"
                                           class="col-sm-4 col-form-label col-form-label-sm">Jenis
                                        Kompetensi</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                               class="form-control"
                                               id="nama_kompetensi"
                                               name="nama_kompetensi"
                                               value="<?= isset($nama_kompetensi) ? $nama_kompetensi : ""; ?>"
                                               placeholder="Nama Kompetensi">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bobot_kompetensi"
                                           class="col-sm-4 col-form-label col-form-label-sm">Bobot Kompetensi</label>
                                    <div class="col-sm-8">
                                        <input type="number"
                                               class="form-control"
                                               id="bobot_kompetensi"
                                               name="bobot_kompetensi"
                                               value="<?= isset($bobot_kompetensi) ? $bobot_kompetensi : ""; ?>"
                                               placeholder="Bobot Kompetensi">
                                    </div>
                                    <div class="text-muted small">
                                        * Pastikan Bobot Total Maksimal Adalah 100%
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
                        <table class="table text-center table-hover order-table w-100 display"
                               id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col"
                                        class="text-center align-middle">No</th>
                                    <th scope="col"
                                        class="text-center align-middle">Jenis Kompetensi</th>
                                    <th scope="col"
                                        class="text-center align-middle">Bobot (%)</th>
                                    <th scope="col"
                                        class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM jenis_kompetensi";
                                $q = mysqli_query($con, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($q)) {
                                ?>
                                <tr>
                                    <td><?= ++$i; ?></td>
                                    <td><?= $row['nama_kompetensi']; ?></td>
                                    <td><?= $row['bobot_kompetensi']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm btn_info_jenis_kompetensi m-1"
                                                id="<?= $row['id_kompetensi']; ?>"><span><i class="fas fa-search"></i>
                                                Detail</span></button>
                                        <a href="index.php?p=mjeniskom&ubah=true&id_kompetensi=<?= $row['id_kompetensi']; ?>"
                                           class="btn btn-warning btn-sm"
                                           id="<?= $row['id_kompetensi']; ?>"><span><i class="fas fa-edit m-1"></i>
                                                Ubah</span></a>
                                        <button href="#"
                                                class="btn btn-danger btn-sm btn_hapus_jenis_kompetensi m-1"
                                                id="<?= $row['id_kompetensi']; ?>"><span><i class="fas fa-trash"></i>
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



<div class="modal fade infolengkap"
     tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Detail Jenis Kompetensi</h5>
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
                        <th width="30%">Jenis Kompetensi</th>
                        <td width="5%"> : </td>
                        <td id="td_jenis_kompetensi"> </td>
                    </tr>
                    <tr>
                        <th>Bobot</th>
                        <td> : </td>
                        <td id="td_bobot"> 0 </td>
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
                    id="exampleModalLabel">Hapus Data Jenis Kompetensi</h5>
                <button type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <form method="post"
                          action="modal/p_jenis_kompetensi.php">
                        <input type="hidden"
                               name="id_delete"
                               id="id_delete">
                </button>
            </div>
            <div class="modal-body">
                <br>
                <div class="modal-text">
                    <h4>
                        Jenis Kompetensi Akan Dihapus?
                    </h4>
                    <p>Hapus Jenis Kompetensi Juga Akan Menghapus Isi Kompetensi</p>
                </div>
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
    $(".btn_info_jenis_kompetensi").click(function() {
        var id = $(this).attr("id");
        var _url = "modal/p_jenis_kompetensi.php?id_kompetensi=" + id;
        $.ajax({
            url: _url,
            success: function(result) {
                var res = JSON.parse(result);
                console.log(res);
                $("#td_jenis_kompetensi").html(res.nama_kompetensi);
                $("#td_bobot").html(res.bobot_kompetensi);
            }
        });
        $('.infolengkap').modal('show');
    });

    $(".btn_hapus_jenis_kompetensi").click(function() {
        var id = $(this).attr("id");
        $("#id_delete").val(id);
        $('.hapusdata').modal('show');
    });
});
</script>