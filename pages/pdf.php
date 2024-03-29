<?php

require '../vendor/autoload.php';
require '../config/koneksi.php';

use iio\libmergepdf\Merger;
use Dompdf\Dompdf;

$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if (isset($_GET['detail'])) {
    $idu = "?detail=" . $_GET['detail'];
    $data = file_get_contents($root . "cetak_laporan.php" . $idu);

    $dompdf = new Dompdf();
    $dompdf->loadHtml($data);

    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $tgl = date("dmy");

    $dompdf->stream("laporan_kinerja_" . $idu . '_' . $tgl . '.pdf', array("Attachment" => false));
} else {

    $m = new Merger();

    $data = file_get_contents($root . "cetak_laporan.php");

    $dompdf = new Dompdf();
    $dompdf->loadHtml($data);

    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $tgl = date("dmy");

    $pdf_arr = [];
    $pdf_arr[] = "laporan_kinerja_" . $tgl . '.pdf';
    //file_put_contents($dompdf->output(), "laporan_kinerja_".$tgl.'pdf');

    $m->addRaw($dompdf->output());
    unset($dompdf);

    $sql = "SELECT
                    d.nip,
                    d.nama_guru,
                    SUM(a.hasil_nilai) as nilai,
                    COUNT(a.id_nilai) as jml
                FROM penilaian a
                JOIN penilai_detail b ON a.id_penilai_detail = b.id_penilai_detail
                JOIN penilai c ON b.id_penilai = c.id_penilai
                JOIN user d ON c.nip = d.nip
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
        $idu = "?detail=" . $row['nip'];
        $data = file_get_contents($root . "cetak_laporan.php" . $idu);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($data);

        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $tgl = date("dmy");

        $pdf_arr[] = "laporan_kinerja_" . $idu . '_' . $tgl . 'pdf';
        //file_put_contents($dompdf->output(), "laporan_kinerja_".$idu.'_'.$tgl.'pdf');
        $m->addRaw($dompdf->output());

        unset($dompdf);
    }

    $pdf = file_put_contents("../laporan/laporan_kinerja_" . $tgl . '.pdf', $m->merge());


    $file = "../laporan/laporan_kinerja_" . $tgl . '.pdf';
    $filename = "laporan_kinerja_" . $tgl . '.pdf';
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    header('Accept-Ranges: bytes');
    @readfile($file);
}
