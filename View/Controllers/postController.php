<?php

require_once __DIR__ . "/koneksi.php";

function tambahDataUser($barang, $deskripsi, $harga, $tanggal)
{
    $koneksi    = koneksi();
    $sql        = "INSERT INTO `table_repository`(`nama_barang`, `deskripsi_barang`, `harga_barang`, `tanggal_barang`) VALUES ('$barang','$deskripsi','$harga','$tanggal')";
    $result     = $koneksi->exec($sql);

    return $result;
}
function tambahDataAdmin($namaAdmin, $tanggalAdmin)
{
    $koneksi    = koneksi();
    $sql        = "INSERT INTO `admin_repository`( `nama_admin`, `tanggal_admin`) VALUES ('$namaAdmin','$tanggalAdmin')";
    $result     = $koneksi->exec($sql);

    return $result;
}