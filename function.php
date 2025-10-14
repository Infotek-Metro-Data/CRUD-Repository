<?php

require_once __DIR__ . "/koneksi.php";

function ambilDataUser()
{
    $koneksi    = koneksi();
    $sql        = "SELECT * FROM table_repository";
    $result     = $koneksi->query($sql);

    return $result;
}
function ambilSatuDataUser($id)
{
    $koneksi    = koneksi();
    $sql        = "SELECT * FROM table_repository WHERE id = $id ";
    $result     = $koneksi->query($sql);

    return $result;   
}



function tambahDataUser($barang, $deskripsi, $harga, $tanggal)
{
    $koneksi    = koneksi();
    $sql        = "INSERT INTO `table_repository`(`nama_barang`, `deskripsi_barang`, `harga_barang`, `tanggal_barang`) VALUES ('$barang','$deskripsi','$harga','$tanggal')";
    $result     = $koneksi->exec($sql);

    return $result;
}
function hapusDataUser($id)
{
    $koneksi    = koneksi();
    $sql        = "DELETE FROM `table_repository` WHERE id = $id";
    $result     = $koneksi->exec($sql);

    return $result;
}
function editDataUser($id, $barang, $deskripsi, $harga, $tanggal)
{
    $koneksi    = koneksi();
    $sql        = "UPDATE `table_repository` SET `nama_barang`='$barang',`deskripsi_barang`='$deskripsi',`harga_barang`='$harga',`tanggal_barang`='$tanggal' WHERE id=$id";
    $result     = $koneksi->exec($sql);

    return $result;
}
