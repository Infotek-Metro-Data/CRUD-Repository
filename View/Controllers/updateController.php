<?php

require_once __DIR__ . "/koneksi.php";


function editDataUser($id, $barang, $deskripsi, $harga, $tanggal)
{
    $koneksi    = koneksi();
    $sql        = "UPDATE `table_repository` SET `nama_barang`='$barang',`deskripsi_barang`='$deskripsi',`harga_barang`='$harga',`tanggal_barang`='$tanggal' WHERE id=$id";
    $result     = $koneksi->exec($sql);

    return $result;
}