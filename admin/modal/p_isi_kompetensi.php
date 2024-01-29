<?php
include '../../config/koneksi.php';
if (isset($_POST['btnSimpan'])) {
	$btn = $_POST['btnSimpan'];

	$id_isi = isset($_POST['id_isi']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['id_isi'])) : "";
	$id_kompetensi = isset($_POST['id_kompetensi']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['id_kompetensi'])) : "";
	$isi_kompetensi = isset($_POST['isi_kompetensi']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['isi_kompetensi'])) : "";
	$ket = isset($_POST['ket']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['ket'])) : "";
	$penilai = isset($_POST['penilai']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['penilai'])) : "";


	if ($btn == "Tambah") {
		$sql = "INSERT INTO isi_kompetensi ( id_kompetensi, isi_kompetensi, ket) VALUES('$id_kompetensi', '$isi_kompetensi', '$penilai') ";
	} else {
		$sql = "UPDATE isi_kompetensi SET id_kompetensi = '$id_kompetensi', isi_kompetensi = '$isi_kompetensi', ket = '$penilai' WHERE id_isi = '$id_isi'";
	}

	$query = mysqli_query($con, $sql);
	if ($query) {
		$_SESSION["flash"]["type"] = "success";
		$_SESSION["flash"]["head"] = "Sukses";
		$_SESSION["flash"]["msg"] = "Data berhasil disimpan!";
	} else {
		$_SESSION["flash"]["type"] = "danger";
		$_SESSION["flash"]["head"] = "Terjadi Kesalahan";
		$_SESSION["flash"]["msg"] = "Data gagal disimpan! " . mysqli_error($con);
	}
	header("location:../index.php?p=misikom");
}

if (isset($_POST['btnDelete'])) {
	$id_isi = isset($_POST['id_delete']) ? mysqli_real_escape_string($con, htmlspecialchars($_POST['id_delete'])) : "";
	$sql = "DELETE  FROM isi_kompetensi WHERE id_isi = $id_isi";
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
	header("location:../index.php?p=misikom");
}

if (isset($_GET['id_isi'])) {
	$id_isi = isset($_GET['id_isi']) ? mysqli_real_escape_string($con, htmlspecialchars($_GET['id_isi'])) : "";
	$sql = "SELECT * FROM isi_kompetensi a JOIN jenis_kompetensi b ON a.id_kompetensi = b.id_kompetensi WHERE a.id_isi = $id_isi";
	$q = mysqli_query($con, $sql);
	$data = [];
	while ($row = mysqli_fetch_assoc($q)) {
		$data = $row;
	}
	echo json_encode($data);
}

?>