<?php

function koneksi()
{
    $host       = "localhost";
    $port       = 8111; 
    $database   = "repositorybarang"; 
    $username   = "root"; 
    $password   = ""; 


    return new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
        
    }
