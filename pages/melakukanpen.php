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
            if (isset($_GET['p']) && !isset($_GET['id'])) {
                echo "<li class='breadcrumb-item active' aria-current='page'>Penilaian Kinerja </li> ";
            } else if (isset($_GET['p']) && isset($_GET['id'])) {
                echo "<li class='breadcrumb-item active' aria-current='page'><a href='index.php?p=melakukanpen' class='text-success'>Penilaian Kinerja </a> / Nilai</li>";
            }
            ?>
        </ol>
    </nav>
    <div class="shadow mb-4 p-3">
        <div class="row">
            <?php

            if (!isset($_GET['id'])) {
            ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-success"
                           title="Rubrik Penilaian"
                           href="assets/file/rubrik.pdf"><i class="fas fa-file"></i> Rubrik Penilaian</a>
                    </div>

                </div>
                <br>
                <div class="table-responsive">
                    <table class="table display w-100 text-center order-table display w-100"
                           id="myTable">
                        <thead class="table-success">
                            <tr>
                                <th scope="col"
                                    class="text-center align-middle">No</th>
                                <th scope="col"
                                    class="text-center align-middle">NIP</th>
                                <th scope="col"
                                    class="text-center align-middle">Nama</th>
                                <th scope="col"
                                    class="text-center align-middle">Status</th>
                                <th scope="col"
                                    class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $nip_s = $_SESSION[md5('user')];
                                $sql = "SELECT a.id_penilai, a.nip, c.nama_guru, b.id_penilai_detail FROM penilai a JOIN penilai_detail b  ON a.id_penilai = b.id_penilai
                                JOIN user c ON a.nip = c.nip WHERE b.nip = '$nip_s' ";
                                $q = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($q)) {
                                ?>
                            <tr class="<?= sudah($row['id_penilai_detail']); ?>">
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
                                    <?= penilaian_per_guru($row['id_penilai_detail']) ?>
                                </td>
                                <td>
                                    <a href="index.php?p=melakukanpen&id=<?= $row['id_penilai']; ?>"
                                       class="btn btn-success btn-sm">
                                        <i class="fas fa-fw fa-pen"></i> Nilai
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } else { ?>
            <?php
                $nip_s = $_SESSION[md5('user')];
                $ssql = "SELECT * FROM user c JOIN jenis_user d ON c.id_jenis_user = d.id_jenis_user WHERE c.nip = '$nip_s'";
                $q = mysqli_query($con, $ssql);
                $rw = mysqli_fetch_array($q);
                $sebagai = $rw['level'] == 3 ? '0' : ($rw['level'] == 1 ? '1' : ($nip_s == $rw['nip'] ? '2' : ''));

                $id_penilai = isset($_GET['id']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id'])) : "";
                $sql = "SELECT a.id_penilai, a.nip, b.nama_guru, c.jabatan FROM penilai a JOIN user b ON a.nip = b.nip JOIN jenis_user c ON b.id_jenis_user = c.id_jenis_user WHERE a.id_penilai = '$id_penilai'";
                $q = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($q);
                ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <br>
                <table class="table table-responsive">
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
                </table>

                <!-- KETERANGAN -->
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h6 class="fw-bold text-light">Keterangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="accordion"
                             id="keteranganPenilaian">
                            <div class="accordion-item">
                                <h2 class="accordion-header"
                                    id="headingOne">
                                    <button class="accordion-button"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapsePenilaian"
                                            aria-expanded="true"
                                            aria-controls="collapsePenilaian">
                                        Keterangan Penilaian
                                    </button>
                                </h2>
                                <div id="collapsePenilaian"
                                     class="accordion-collapse collapse"
                                     aria-labelledby="headingOne"
                                     data-bs-parent="#keteranganPenilaian">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Angka</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Tidak Mampu</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Kurang Mampu</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Mampu</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Sangat Mampu</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion"
                                 id="keteranganBobot">
                                <div class="accordion-item">
                                    <h2 class="accordion-header"
                                        id="headingOne">
                                        <button class="accordion-button"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseBobot"
                                                aria-expanded="true"
                                                aria-controls="collapseBobot">
                                            Keterangan Bobot
                                        </button>
                                    </h2>
                                    <div id="collapseBobot"
                                         class="accordion-collapse collapse"
                                         aria-labelledby="headingOne"
                                         data-bs-parent="#keteranganPenilaian">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Kompetensi</th>
                                                            <th>Bobot</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $sql = "SELECT * FROM jenis_kompetensi";
                                                        $q = mysqli_query($con, $sql);

                                                        while ($row = mysqli_fetch_array($q)) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?= $row['nama_kompetensi']; ?></td>
                                                            <td>
                                                                <?= $row['bobot_kompetensi']; ?> %
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KETERANGAN -->

                    <form class="form-horizontal p-2"
                          method="post"
                          action="modal/p_nilai.php">
                        <input type="hidden"
                               name="nip_dinilai"
                               value="<?= $row['nip']; ?>">
                        <input type="hidden"
                               name="nip_penilai"
                               value="<?= $_SESSION[md5('user')]; ?>">
                        <nav class="">
                            <div class="nav nav-tabs"
                                 id="nav-tab"
                                 role="tablist">

                                <?php
                                    $sql = "SELECT * FROM jenis_kompetensi";
                                    $q = mysqli_query($con, $sql);
                                    $i = 0;
                                    $data_kompetensi = [];
                                    while ($row = mysqli_fetch_array($q)) {
                                        $data_kompetensi[$i]['id_kompetensi'] = $row['id_kompetensi'];
                                        $data_kompetensi[$i]['nama_kompetensi'] = $row['nama_kompetensi'];
                                        $data_kompetensi[$i]['bobot_kompetensi'] = $row['bobot_kompetensi'];
                                        if ($i == 0) {
                                    ?>
                                <a class="nav-item nav-link text-success active"
                                   id="nav-home-tab"
                                   data-toggle="tab"
                                   href="#nav-<?= $row['id_kompetensi']; ?>"
                                   role="tab"
                                   aria-controls="nav-home"
                                   aria-selected="true"><?= $row['nama_kompetensi']; ?></a>
                                <?php
                                        } else {
                                        ?>
                                <a class="nav-item nav-link text-success"
                                   id="nav-home-tab"
                                   data-toggle="tab"
                                   href="#nav-<?= $row['id_kompetensi']; ?>"
                                   role="tab"
                                   aria-controls="nav-home"
                                   aria-selected="true"><?= $row['nama_kompetensi']; ?></a>
                                <?php
                                        }
                                        $i++;
                                    }
                                    ?>
                            </div>
                        </nav>
                        <div class="tab-content"
                             id="nav-tabContent">
                            <?php
                                foreach ($data_kompetensi as $k => $v) {
                                    if ($k == 0) {
                                        $ext = "show active";
                                    } else {
                                        $ext = "";
                                    }
                                ?>
                            <div class="tab-pane fade <?= $ext; ?>"
                                 id="nav-<?= $v['id_kompetensi']; ?>"
                                 role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <br>
                                <div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%"
                                                    class="text-center">No</th>
                                                <th width="70%"
                                                    class="text-center">Isi Kompetensi</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $i = 0;
                                                    $sq = "SELECT * FROM isi_kompetensi WHERE id_kompetensi = $v[id_kompetensi] AND ket LIKE '%$sebagai%' ";
                                                    $qs = mysqli_query($con, $sq);
                                                    while ($row = mysqli_fetch_array($qs)) {
                                                    ?>
                                            <tr class="text-center">
                                                <td>
                                                    <?= ++$i; ?>
                                                </td>
                                                <td class="text-justify">
                                                    <?= htmlspecialchars_decode($row['isi_kompetensi']); ?>
                                                </td>
                                                <td class="form-group">
                                                    <input class="form-check-input form-check-input-lg"
                                                           type="radio"
                                                           name="kompetensi_<?= $row['id_isi']; ?>"
                                                           id="kompetensi_<?= $row['id_isi']; ?>_1"
                                                           title="Tidak Mampu"
                                                           value="1"
                                                           required>
                                                </td>
                                                <td class="form-group">
                                                    <input class="form-check-input form-check-input-lg"
                                                           type="radio"
                                                           name="kompetensi_<?= $row['id_isi']; ?>"
                                                           id="kompetensi_<?= $row['id_isi']; ?>_2"
                                                           title="Kurang Mampu"
                                                           value="2"
                                                           required>
                                                </td>
                                                <td class="form-group">
                                                    <input class="form-check-input form-check-input-lg"
                                                           type="radio"
                                                           name="kompetensi_<?= $row['id_isi']; ?>"
                                                           id="kompetensi_<?= $row['id_isi']; ?>_3"
                                                           title="Mampu"
                                                           value="3"
                                                           required>
                                                </td>
                                                <td class="form-group">
                                                    <input class="form-check-input form-check-input-lg"
                                                           type="radio"
                                                           name="kompetensi_<?= $row['id_isi']; ?>"
                                                           id="kompetensi_<?= $row['id_isi']; ?>_4"
                                                           title="Sangat Mampu"
                                                           value="4"
                                                           required>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                                }
                                ?>
                        </div>
                        <?php
                            $nip_s = $_SESSION[md5('user')];
                            $sql = "SELECT * FROM penilai a JOIN penilai_detail b ON a.id_penilai = b.id_penilai JOIN penilaian c ON b.id_penilai_detail = c.id_penilai_detail WHERE a.id_penilai = '$id_penilai' AND b.nip = '$nip_s'";
                            $q = mysqli_query($con, $sql);
                            if (mysqli_num_rows($q) > 0) {
                                echo '<script>';
                                while ($row = mysqli_fetch_array($q)) {
                                    echo '$("#kompetensi_' . $row['id_isi'] . '_' . $row['hasil_nilai'] . '").attr("checked",true);';
                                }
                                echo '</script>';
                            }
                            ?>
                        <div class="container">
                            <div class="float-right">
                                <br>
                                <button type="submit"
                                        class="btn btn-success btn-md">Simpan</button>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <?php

    function sudah($idpdt = '')
    {
        global $con;
        $sql = "SELECT * FROM penilai a JOIN penilai_detail b ON a.id_penilai = b.id_penilai JOIN penilaian c ON b.id_penilai_detail = c.id_penilai_detail WHERE b.id_penilai_detail = $idpdt";
        //echo $sql; 
        $q = mysqli_query($con, $sql);
        if (mysqli_num_rows($q) > 0) {
            return 'bold';
        } else {
            return '';
        }
    }
    ?>