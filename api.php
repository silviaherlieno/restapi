<?php

header('Content-Type: application/json; charset=utf-8');

$koneksi = mysqli_connect("localhost", "root", "", "tokokomputer");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    $array_data = array();
    while ($data = mysqli_fetch_assoc($query)) {
        $array_data[] = $data;
    }
    echo json_encode($array_data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $promo = $_POST['promo'];
    $sql = "INSERT INTO barang (nama, harga, promo) VALUES ('$nama', '$harga', '$promo')";
    $periksa = mysqli_query($koneksi, $sql);

    if ($periksa) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $sql = "DELETE FROM barang WHERE id='$id'";
    $periksa = mysqli_query($koneksi, $sql);

    if ($periksa) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $_GET['id'];
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $promo = $_GET['promo'];
    $sql = "UPDATE barang SET nama='$nama', harga='$harga', promo='$promo' WHERE id='$id'";

    $periksa = mysqli_query($koneksi, $sql);

    if ($periksa) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}
?>
