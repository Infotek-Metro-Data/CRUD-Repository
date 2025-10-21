CREATE TABLE admin_repository (
    id_admin INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_admin VARCHAR(255) NOT NULL,
    tanggal_admin DATE NOT NULL
);
CREATE TABLE table_repository (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_barang VARCHAR(255) NOT NULL,
    deskripsi_barang VARCHAR(255) NOT NULL,
    harga_barang INT(11) NOT NULL,
    tanggal_barang DATE NOT NULL
);
CREATE TABLE login (
    id_login INT(20) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(225) NOT NULL,
    user_type VARCHAR(50) NOT NULL DEFAULT 'user'
);
