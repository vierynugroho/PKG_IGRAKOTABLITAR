<script>
(function(document) {
    'use strict';

    var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-bs-table'));
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
                aria-current="page">Memilih Guru Dinilai</li>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <button type="button"
                                class="btn btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                            <i class=" fas fa-user-plus"></i> Tambah Guru Dinilai
                        </button>
                    </div>

                </div>
                <!-- Modal -->
                <div class="modal fade"
                     id="exampleModalCenter"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"
                         role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="exampleModalCenterTitle">Data Penilai</h5>
                                <button type="button"
                                        class="close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            echo '<script>';
                            $i = 0;
                            $sql_guru = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE b.level = 1 AND (SELECT COUNT(*) FROM penilai c WHERE c.nip = a.nip ) = 0";
                            $q = mysqli_query($con, $sql_guru);
                            echo 'var data_guru = [';
                            while ($row = mysqli_fetch_array($q)) {
                                if ($i != 0) {
                                    echo ",";
                                }
                                echo '{ nip : "' . $row['nip'] . '", ';
                                echo ' nama : "' . $row['nama_guru'] . '"}';

                                $i++;
                            }
                            echo '];';

                            $i = 0;
                            $sql_guru = "SELECT * FROM user a JOIN jenis_user b ON a.id_jenis_user = b.id_jenis_user WHERE b.LEVEL = 1 AND (SELECT COUNT(*) FROM penilai_detail c WHERE c.nip = a.nip)<5";
                            $q = mysqli_query($con, $sql_guru);
                            echo 'var data_guru_pen2 = [';
                            while ($row = mysqli_fetch_array($q)) {
                                if ($i != 0) {
                                    echo ",";
                                }
                                echo '{ nip : "' . $row['nip'] . '", ';
                                echo ' nama : "' . $row['nama_guru'] . '"}';

                                $i++;
                            }
                            echo '];';
                            echo '</script>';
                            ?>
                            <div class="modal-body">
                                <form action="modal/p_penilai.php"
                                      method="post">
                                    <input type="hidden"
                                           name="txt_id_penilai"
                                           id="txt_id_penilai"
                                           value="" />
                                    <input type="hidden"
                                           name="tahun_ajar"
                                           value="<?= get_tahun_ajar_id(); ?>" />
                                    <div class="form-group row">
                                        <span class="label-text col-md-6 col-form-label text-md-left">Guru
                                            Dinilai</span>
                                        <div class="col-md-6">
                                            <select name="penilai"
                                                    id="cb_guru_penilai"
                                                    class="form-control"
                                                    required>

                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                <input type="submit"
                                       class="btn btn-success btnSimpan"
                                       name="btnSimpan"
                                       value="Tambah">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="table-responsive">
                        <table class="order-table table display w-100"
                               id="myTable">
                            <thead class="table-success">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Guru Dinilai</th>
                                    <th scope="col">Guru Penilai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $fi = 0;
                                $id_pen = "";
                                $idper = get_tahun_ajar_id();
                                $sql = "SELECT a.*, b.id_penilai_detail, b.nip as 'nip_dinilai', c.nama_guru as 'penilai', d.nama_guru as 'dinilai', e.jabatan FROM penilai a JOIN penilai_detail b ON a.id_penilai = b.id_penilai  JOIN user c ON a.nip = c.nip JOIN user d ON b.nip = d.nip JOIN jenis_user e ON d.id_jenis_user = e.id_jenis_user WHERE a.id_periode = $idper ORDER BY a.nip, e.level DESC";
                                $q = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_array($q)) :
                                ?>

                                <tr>
                                    <td style="vertical-align:middle">
                                        <?= ++$i; ?>
                                    </td>
                                    <td style="vertical-align:middle">
                                        <?= $row['penilai'] . '<br>' . $row['nip']; ?>
                                    </td>
                                    <td>
                                        <?= $row['dinilai'] . '<br>' . $row['nip_dinilai']; ?>
                                    </td>
                                    </td>
                                    <td style="vertical-align:middle">
                                        <button class="btn btn-danger btn-sm btn_hapus_memilih_dinilai"
                                                data-bs-id="<?= $row['id_penilai']; ?>"><i class="fas fa-trash"></i>
                                            Hapus</button>
                                    </td>
                                </tr>

                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade hapusdata_memilih_dinilai"
     tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Hapus Penilai</h5>
                <button type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="modal/p_penilai.php"
                      method="post">
                    <p class="modal-text">Data akan dihapus</p>
                    <hr>
                    <input type="hidden"
                           name="id_delete"
                           id="id_delete">
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="submit"
                                class="btn btn-danger">Hapus</button>
                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var guru_penilaian = '';
var guru_dinilai_1 = data_guru_pen2;
var guru_dinilai_2 = guru_dinilai_1;
$(document).ready(function() {

    $("#exampleModalCenter").on('hidden.bs.modal', function(event) {
        document.location = "index.php?p=memilihpen";
    });
    $("#exampleModalCenter").on('show.bs.modal', function(event) {
        guru_penilaian = '';
        data_guru.forEach(isi_guru);
        $("#cb_guru_penilai").html('');
        $("#cb_guru_penilai").append('<option value="">[ Pilih Guru ]</value>');
        $("#cb_guru_penilai").append(guru_penilaian);
    });


    $(".btn_hapus_memilih_dinilai").click(function() {
        var daid = $(this).attr("data-bs-id");
        $(".hapusdata_memilih_dinilai").modal("show");
        $("#id_delete").val(daid);
    });


    $(".btn_ubah").click(function() {
        var daid = $(this).attr("data-bs-id");
        var _url = "modal/p_penilai.php?id_penilai=" + daid;
        $("#exampleModalCenter").modal("show");
        $(".btnSimpan").val("Ubah");
        $.ajax({
            url: _url,
            success: function(result) {
                var res = JSON.parse(result);

                $("#txt_id_penilai").val(res.id_penilai);

                $("#cb_guru_penilai").html("");
                $("#cb_guru_penilai").append("<option value='" + res.nip + "'>" + get_nama(
                    res.nip, data_guru_pen2) + "</option>");
                $("#cb_guru_penilai").attr("readonly", true);
                guru_penilaian = '';


            }
        });
    });

});

function isi_guru(value) {
    guru_penilaian = guru_penilaian + "<option value='" + value.nip + "'>" + value.nama + "</option>";
}

function get_index(nip) {
    for (var i = 0; i < data_guru_pen2.length; i++) {
        if (data_guru_pen2[i].nip == nip) {
            return i;
        }
    }
    return -1;
}

function get_nama(nip, arr) {
    for (var i = 0; i < arr.length; i++) {
        if (arr[i].nip == nip) {
            return arr[i].nama;
        }
    }
    return "";
}
</script>