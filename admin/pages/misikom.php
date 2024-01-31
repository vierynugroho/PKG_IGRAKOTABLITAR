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
            <li class="breadcrumb-item active" aria-current="page">Isi Kompetensi</li>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12">
                <!-- Button trigger modal -->

                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span><i class="fas fa-plus"></i> Tambah isi Kompetensi</span>
                        </button>
                    </div>

                </div>

                <?php
                $btn = "Tambah";
                if (isset($_GET['ubah'])) {
                    $id_isi = isset($_GET['id_isi']) ? mysqli_real_escape_string($con, htmlspecialchars_decode($_GET['id_isi'])) : "";
                    $sql = "SELECT * FROM isi_kompetensi a JOIN jenis_kompetensi b ON a.id_kompetensi = b.id_kompetensi WHERE a.id_isi = $id_isi ORDER BY b.id_kompetensi ASC";
                    $q = mysqli_query($con, $sql);
                    $data = [];
                    while ($row = mysqli_fetch_assoc($q)) {
                        $id_isi = $row['id_isi'];
                        $id_kompetensi = $row['id_kompetensi'];
                        $$row['id_kompetensi'] = $row['id_kompetensi'];
                        $isi_kompetensi = $row['isi_kompetensi'];
                        $nama_kompetensi = $row['nama_kompetensi'];
                        $btn = "Ubah";
                    }

                ?>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#exampleModal').modal('show');

                            $('#exampleModal').on('hidden.bs.modal', function(e) {
                                document.location = 'index.php?p=misikom';
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
                                        echo "Ubah Isi Kompetensi";
                                    } else {
                                        echo "Tambah Isi Kompetensi";
                                    } ?>
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form -->
                                <form class="form-horizontal" method="post" action="modal/p_isi_kompetensi.php">
                                    <input type="hidden" id="id_isi" name="id_isi" value="<?= isset($id_isi) ? $id_isi : ""; ?>">
                                    <div class="form-group row">
                                        <label for="id_kompetensi" class="col-sm-3 col-form-label col-form-label-sm">Jenis
                                            Kompetensi<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-select form-select-sm" id="id_kompetensi" name="id_kompetensi" required>

                                                <?php if ($_GET['ubah']) { ?>
                                                    <option value="<?= $id_kompetensi ?>" selected hidden> <?= $nama_kompetensi ?> </option>
                                                <?php } else { ?>
                                                    <option value="" selected hidden> -- Jenis Kompetensi -- </option>

                                                <?php
                                                }
                                                $jb = mysqli_query($con, "SELECT * FROM jenis_kompetensi");
                                                while ($rj = mysqli_fetch_array($jb)) {
                                                ?>

                                                    <option value="<?= $rj['id_kompetensi'] ?>" <?= isset($$rj['nama_kompetensi']) ? "selected" : '' ?>>
                                                        <?= $rj['nama_kompetensi']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="isi_kompetensi" class="col-sm-3 control-form-label col-form-label-sm">Isi
                                            Kompetensi<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control form-control-sm" id="editor" name="isi_kompetensi" placeholder="Isi Kompetensi WAJIB di isi" rows="10"><?= isset($isi_kompetensi) ? $isi_kompetensi : ""; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ket" class="col-sm-3 control-form-label col-form-label-sm">Penilai</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm sel-penilai" id="ket" name="ket" readonly>
                                                <option value="0" selected>Kepala Sekolah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row small">
                                        <label for="isi_kompetensi" class="col-sm-3 control-form-label col-form-label-sm text-danger fw-bold">Catatan</label>
                                        <div class="col-sm-9">
                                            <ul class="list-group list-group-numbered">
                                                <li class="list-group-item disabled ">Setiap Menambah Isi Kompetensi,
                                                    Kepala
                                                    Sekolah
                                                    Diharuskan Melakukan
                                                    Penilaian Ulang</li>
                                                <li class="list-group-item disabled ">Isi Kompetensi Wajib Diisi</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <input type="hidden" name="penilai" id="penilai">
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
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col">
                    <hr>
                    <div class="table-responsive">
                        <table class="table text-center table-hover order-table display w-100" id="myTable">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text-center align-middle">No</th>
                                    <th scope="col" class="text-center align-middle">Jenis Kompetensi</th>
                                    <th scope="col" class="text-center align-middle">Isi Kompetensi</th>
                                    <th scope="col" class="text-center align-middle">Penilai</th>
                                    <th scope="col" class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM isi_kompetensi a JOIN jenis_kompetensi b ON a.id_kompetensi = b.id_kompetensi ORDER BY b.id_kompetensi ASC";
                                $q = mysqli_query($con, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($q)) {
                                ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $row['nama_kompetensi']; ?></td>
                                        <td><?= htmlspecialchars_decode($row['isi_kompetensi']); ?></td>
                                        <td><?php
                                            $a = ['Kepala Sekolah', 'Guru', 'Wakil Kepala Sekolah'];
                                            $ret = '';
                                            if ($row['ket'] != '') {
                                                $ket = explode(",", $row['ket']);
                                                $b = [];
                                                foreach ($ket as $k => $v) {
                                                    array_push($b, $a[$v]);
                                                }
                                                $ret = join(", ", $b);
                                            }
                                            echo $ret;
                                            ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm btn_info_misikom m-1" id="<?= $row['id_isi']; ?>"><span><i class="fas fa-search"></i>
                                                    Detail</span></a>
                                            <a href="index.php?p=misikom&ubah=true&id_isi=<?= $row['id_isi']; ?>" class="btn btn-warning btn-sm m-1" id="<?= $row['id_isi']; ?>"><span><i class="fas fa-edit"></i> Ubah</span></a>
                                            <a href="#" class="btn btn-danger btn-sm btn_hapus_misikom m-1" id="<?= $row['id_isi']; ?>"><span><i class="fas fa-trash"></i>
                                                    Hapus</span></a>
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

    <div class="modal fade infolengkap" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Isi Kompetensi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th width="30%">Jenis Kompetensi</th>
                            <td width="5%"> : </td>
                            <td id="td_jenis_kompetensi"></td>
                        </tr>
                        <tr>
                            <th>Isi Kompetensi</th>
                            <td> : </td>
                            <td id="td_isi_kompetensi"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade hapusdata" tabindex="-8" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Isi Kompetensi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <form method="post" action="modal/p_isi_kompetensi.php">

                            <input type="hidden" name="id_delete" id="id_delete">
                    </button>
                </div>
                <div class="modal-body">
                    <br>
                    <div class="modal-body">Data Akan Dihapus</div>
                    <br>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger btn_delete" name="btnDelete" value="Hapus">
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn_info_misikom").click(function() {
                var id = $(this).attr("id");
                var _url = "modal/p_isi_kompetensi.php?id_isi=" + id;
                $.ajax({
                    url: _url,
                    success: function(result) {
                        var res = JSON.parse(result);
                        $("#td_jenis_kompetensi").html(res.nama_kompetensi);
                        $("#td_isi_kompetensi").html(res.isi_kompetensi);
                    }
                });
                $('.infolengkap').modal('show');
            });
            $(".btn_hapus_misikom").click(function() {
                var id = $(this).attr("id");
                $("#id_delete").val(id);
                $('.hapusdata').modal('show');
            });
            $('.sel-penilai').selectpicker();
            $(".sel-penilai").change(function() {
                var a = $(this).val();
                var b = a.join();
                alert($("#penilai").val(b));
                $("#penilai").val(b);
            });
        });


        $('#myTable').on('draw.dt', function() {
            // Perbarui event listener di sini
            $(document).ready(function detail() {
                $(".btn_info_misikom").click(function() {
                    var id = $(this).attr("id");
                    var _url = "modal/p_isi_kompetensi.php?id_isi=" + id;
                    $.ajax({
                        url: _url,
                        success: function(result) {
                            var res = JSON.parse(result);
                            $("#td_jenis_kompetensi").html(res.nama_kompetensi);
                            $("#td_isi_kompetensi").html(res.isi_kompetensi);
                        }
                    });
                    $('.infolengkap').modal('show');
                });
                $(".btn_hapus_misikom").click(function() {
                    var id = $(this).attr("id");
                    $("#id_delete").val(id);
                    $('.hapusdata').modal('show');
                });
                $('.sel-penilai').selectpicker();
                $(".sel-penilai").change(function() {
                    var a = $(this).val();
                    var b = a.join();
                    alert($("#penilai").val(b));
                    $("#penilai").val(b);
                });
            });
        });
    </script>