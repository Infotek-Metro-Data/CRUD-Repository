<?php

require_once __DIR__ . "/koneksi.php";


function hapusDataUser($id)
{
    $koneksi    = koneksi();
    $sql        = "DELETE FROM `table_repository` WHERE id = $id";
    $result     = $koneksi->exec($sql);

    return $result;
}