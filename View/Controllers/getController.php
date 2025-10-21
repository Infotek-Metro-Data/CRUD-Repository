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
function ambilDataAdmin()
{
    $koneksi    = koneksi();
    $sql        = "SELECT * FROM admin_repository";
    $result     = $koneksi->query($sql);

    return $result;
}