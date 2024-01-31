<?php
include '../../config/koneksi.php';
if (isset($_POST['btnSimpan'])) {
	$btn = $_POST['btnSimpan'];

	$id_periode = isset($_POST['id_periode']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['id_periode'])) : "";
	$tahun_ajar = isset($_POST['tahun_ajar']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['tahun_ajar'])) : "";
	$semester = isset($_POST['semester']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['semester'])) : "";
	$status_periode = isset($_POST['status_periode']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['status_periode'])) : "";;

	$kepalaSekolah = isset($_POST['kepalaSekolah']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['kepalaSekolah'])) : "";

	if ($kepalaSekolah == '100') {

		$setting = $kepalaSekolah;

		if ($btn == "Tambah") {
			$ssq = "SELECT * FROM periode WHERE tahun_ajar = $tahun_ajar AND LOWER(semester) = LOWER('$semester')";
			$q = mysqli_query($con, $ssq);
			if (mysqli_num_rows($q) > 0) {
				$sql = "";
			} else {
				if ($status_periode == 1) {
					mysqli_query($con, "UPDATE periode SET status_periode = 0");
				}
				$sql = "INSERT INTO periode (tahun_ajar, semester, status_periode, setting) VALUES( '$tahun_ajar', '$semester', '$status_periode', '$setting') ";
			}
		} else {
			if ($status_periode == 1) {
				mysqli_query($con, "UPDATE periode SET status_periode = 0");
			}
			if (mysqli_query($con, "UPDATE periode SET status_periode = 1 WHERE id_periode = $id_periode")) {
				$_SESSION["flash"]["type"] = "success";
				$_SESSION["flash"]["head"] = "Sukses";
				$_SESSION["flash"]["msg"] = "Data berhasil disimpan!";
			}

			$_SESSION["flash"]["type"] = "danger";
			$_SESSION["flash"]["head"] = "Terjadi Kesalahan";
			$_SESSION["flash"]["msg"] = "Data gagal disimpan! " . mysqli_error($con);
			echo "<script>document.location='index.php?p=mperiode';</script>";
			$sql = "UPDATE periode SET tahun_ajar = '$tahun_ajar', semester = '$semester', setting='$setting' WHERE id_periode = '$id_periode'";
		}


		$query = mysqli_query($con, $sql);
		if ($query) {
			$_SESSION["flash"]["type"] = "success";
			$_SESSION["flash"]["head"] = "Sukses";
			$_SESSION["flash"]["msg"] = "Data berhasil disimpan!";
		} else {
			$_SESSION["flash"]["type"] = "danger";
			$_SESSION["flash"]["head"] = "Terjadi Kesalahan";
			$_SESSION["flash"]["msg"] = "Data gagal disimpan! "; //.mysql_error();
		}
		header("location:../index.php?p=mperiode");
	} else {

		$_SESSION["flash"]["type"] = "danger";
		$_SESSION["flash"]["head"] = "Terjadi Kesalahan";
		$_SESSION["flash"]["msg"] = "Data gagal disimpan!"; //.mysql_error();
		header("location:../index.php?p=mperiode");
	}
}

if (isset($_POST['btnDelete'])) {
	$id_periode = isset($_POST['id_delete']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['id_delete'])) : "";
	$sql = "DELETE  FROM periode WHERE id_periode = $id_periode";
	$query = mysqli_query($con, $sql);
	if ($query) {
		$_SESSION["flash"]["type"] = "success";
		$_SESSION["flash"]["head"] = "Sukses";
		$_SESSION["flash"]["msg"] = "Data berhasil dihapus!";
	} else {
		$_SESSION["flash"]["type"] = "danger";
		$_SESSION["flash"]["head"] = "Terjadi Kesalahan";
		$_SESSION["flash"]["msg"] = "Data gagal dihapus! " . mysqli_error($con);
	}
	header("location:../index.php?p=mperiode");
}

if (isset($_GET['id_periode'])) {
	$id_periode = isset($_GET['id_periode']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id_periode'])) : "";
	$sql = "SELECT * FROM periode WHERE id_periode = $id_periode";
	$q = mysqli_query($con, $sql);
	$data = [];
	while ($row = mysqli_fetch_assoc($q)) {
		$data = $row;
	}
	echo json_encode($data);
}
