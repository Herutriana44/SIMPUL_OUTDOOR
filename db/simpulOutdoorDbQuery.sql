CREATE TABLE akun(
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    nama VARCHAR(30) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    no_telp VARCHAR(15) NOT NULL,
    email VARCHAR(30) NOT NULL,
    PRIMARY KEY (username)
);

CREATE TABLE produk(
    id_produk CHAR(30) NOT NULL,
    nama_produk VARCHAR(100) NOT NULL,
    harga_produk INT NOT NULL,
    deskripsi_produk VARCHAR(100) NOT NULL,
    gambar_produk VARCHAR(100) NOT NULL,
    stok_produk INT NOT NULL,
    PRIMARY KEY (id_produk)
);

CREATE TABLE perentalan(
    id_rental INT NOT NULL AUTO_INCREMENT,
    tanggal_peminjaman DATE NOT NULL,
    tanggal_pengembalian DATE NOT NULL,
    id_produk CHAR(30) NOT NULL,
    jumlah_produk INT NOT NULL,
    username VARCHAR(30) NOT NULL,
    status_peminjaman VARCHAR(30) NOT NULL,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk),
    FOREIGN KEY (username) REFERENCES akun(username),
    PRIMARY KEY (id_rental)
);

INSERT INTO produk VALUES('PRD001', 'Tenda Rei Kaps 4', 40000, '-', 'Tenda Rei Kaps 4.jpg',100);
INSERT INTO produk VALUES('PRD002', 'Tenda Rei Kaps 2', 25000, '-', 'Tenda Rei Kaps 2.jpg',100);
INSERT INTO produk VALUES('PRD003', 'Tenda Eiger Kaps 2', 30000, '-', 'Tenda Eiger Kaps 2.jpg',100);
INSERT INTO produk VALUES('PRD004', 'Tenda Eiger Kaps 4', 50000, '-', 'Tenda Eiger Kaps 4.jpg',100);
INSERT INTO produk VALUES('PRD005', 'Tenda Regu', 25000, '-', 'Tenda Regu.png',100);
INSERT INTO produk VALUES('PRD006', 'Tenda Regu Paket', 35000, '-', 'Tenda Regu.png',100);
INSERT INTO produk VALUES('PRD007', 'Sleeping Bag', 15000, '-', 'SB.jpg',100);
INSERT INTO produk VALUES('PRD008', 'Sleeping Bag Rei', 25000, '-', 'SB Rei.jpg',100);
INSERT INTO produk VALUES('PRD009', 'Sleeping Bag Eiger', 30000, '-', 'SB Eiger.jpg',100);
INSERT INTO produk VALUES('PRD010', 'Matras', 5000, '-', 'Matras.jpg',100);
INSERT INTO produk VALUES('PRD011', 'Matras Foil', 10000, '-', 'Matras Foil.jpg',100);
INSERT INTO produk VALUES('PRD012', 'Fly Sheet 3x4', 15000, '-', 'Fly Sheet 3x4.jpg',100);
INSERT INTO produk VALUES('PRD013', 'Fly Sheet 2x3', 10000, '-', 'Fly Sheet 2x3.jpg',100);
INSERT INTO produk VALUES('PRD014', 'Carrier 60L', 45000, '-', 'Carrier 60L.jpg',100);
INSERT INTO produk VALUES('PRD015', 'Carrier 40L', 35000, '-', 'Carrier 40L.jpg',100);
INSERT INTO produk VALUES('PRD016', 'Headlamp', 10000, '-', 'Headlamp.jpg',100);
INSERT INTO produk VALUES('PRD017', 'Lampu Tenda', 5000, '-', 'Lampu Tenda.jpg',100);
INSERT INTO produk VALUES('PRD018', 'Hammock', 15000, '-', 'Hammock.jpg',100);
INSERT INTO produk VALUES('PRD019', 'Gloves', 10000, '-', 'Gloves.jpg',100);
INSERT INTO produk VALUES('PRD020', 'Trackpole', 15000, '-', 'Trackpole.jpg',100);
INSERT INTO produk VALUES('PRD021', 'Nesting DS/SY', 15000, '-', 'Nesting.jpg',100);
INSERT INTO produk VALUES('PRD022', 'Kompor Outdoor', 10000, '-', 'Kompor.jpg',100);
INSERT INTO produk VALUES('PRD023', 'Gas', 135000, '-', 'Gas.jpg',100);
INSERT INTO produk VALUES('PRD024', 'Gas Reffil', 140000, '-', 'Gas.jpg',100);

CREATE TABLE upload_pembayaran(
    id_produk CHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    tanggal_peminjaman DATE NOT NULL,
    tanggal_pengembalian DATE NOT NULL,
    bukti_pembayaran VARCHAR(100) NOT NULL,
    id_rental INT NOT NULL,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk),
    FOREIGN KEY (username) REFERENCES akun(username),
    FOREIGN KEY (id_rental) REFERENCES perentalan(id_rental)
);

INSERT INTO upload_pembayaran VALUES('PRD001', 'admin', '2020-01-01', '2020-01-02', 'bukti_pembayaran.jpg', 1);

CREATE VIEW view_pesanan AS
SELECT produk.id_produk, akun.username, perentalan.tanggal_peminjaman, perentalan.tanggal_pengembalian, perentalan.id_rental 
FROM produk
JOIN perentalan ON perentalan.id_produk = produk.id_produk
JOIN akun ON akun.username = perentalan.username;

DELIMITER $$
CREATE PROCEDURE upload_bayar(id_rental INT, bukti_pembayaran VARCHAR(100), id_produk CHAR(30), username VARCHAR(30), tanggal_peminjaman DATE, tanggal_pengembalian DATE )
BEGIN
    UPDATE perentalan SET status_peminjaman = 'Menunggu Konfirmasi' WHERE id_rental = id_rental;
    INSERT INTO upload_pembayaran VALUES(id_produk, username, tanggal_peminjaman, tanggal_pengembalian, bukti_pembayaran, id_rental);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE rental_produk(jumlah INT, tanggal_peminjaman DATE, tanggal_pengembalian DATE, idproduk CHAR(30), username VARCHAR(30))
BEGIN
    INSERT INTO perentalan VALUES(tanggal_peminjaman, tanggal_pengembalian, idproduk, jumlah, username, 'Belum Dikonfirmasi', NULL);
    UPDATE produk SET stok_produk = stok_produk - jumlah WHERE id_produk = idproduk;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE cetak_nota(tanggal_peminjaman DATE, tanggal_pengembalian DATE, id_produk CHAR(30), username VARCHAR(30))
BEGIN
    SELECT * FROM perentalan WHERE tanggal_peminjaman = tanggal_peminjaman AND tanggal_pengembalian = tanggal_pengembalian AND id_produk = id_produk AND username = username;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE total_produk(username VARCHAR(30), tanggal_peminjaman DATE, tanggal_pengembalian DATE)
BEGIN
    SELECT SUM(jumlah_produk * harga_produk) AS total FROM perentalan JOIN produk ON perentalan.id_produk = produk.id_produk WHERE username = username AND tanggal_peminjaman = tanggal_peminjaman AND tanggal_pengembalian = tanggal_pengembalian;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE tampilkan_riwayat(username VARCHAR(30))
BEGIN
    SELECT perentalan.id_rental, perentalan.tanggal_peminjaman, perentalan.tanggal_pengembalian, produk.nama_produk, perentalan.jumlah_produk, perentalan.status_peminjaman, produk.harga_produk, perentalan.jumlah_produk * produk.harga_produk AS total_harga FROM perentalan JOIN produk ON perentalan.id_produk = produk.id_produk WHERE username = username ORDER BY tanggal_peminjaman DESC;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE akses_login(user VARCHAR(30), pass VARCHAR(30))
BEGIN
    SELECT * FROM akun WHERE username = user AND password = pass;
END$$
DELIMITER ;