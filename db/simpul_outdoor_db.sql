-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Des 2022 pada 05.01
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpul_outdoor_db`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cetak_nota` (`tanggal_peminjaman` DATE, `tanggal_pengembalian` DATE, `id_produk` CHAR(30), `username` VARCHAR(30))   BEGIN
    SELECT * FROM perentalan WHERE tanggal_peminjaman = tanggal_peminjaman AND tanggal_pengembalian = tanggal_pengembalian AND id_produk = id_produk AND username = username;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rental_produk` (`jumlah` INT, `tanggal_peminjaman` DATE, `tanggal_pengembalian` DATE, `idproduk` CHAR(30), `username` VARCHAR(30))   BEGIN
    INSERT INTO perentalan VALUES(tanggal_peminjaman, tanggal_pengembalian, idproduk, jumlah, username, 'Belum Dikonfirmasi', NULL);
    UPDATE produk SET stok_produk = stok_produk - jumlah WHERE id_produk = idproduk;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilkan_riwayat` (`username` VARCHAR(30))   BEGIN
    SELECT perentalan.id_rental, perentalan.tanggal_peminjaman, perentalan.tanggal_pengembalian, produk.nama_produk, perentalan.jumlah_produk, perentalan.status_peminjaman, produk.harga_produk, perentalan.jumlah_produk * produk.harga_produk AS total_harga FROM perentalan JOIN produk ON perentalan.id_produk = produk.id_produk WHERE username = username ORDER BY tanggal_peminjaman DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upload_bayar` (`id_rental` INT, `bukti_pembayaran` VARCHAR(100), `id_produk` CHAR(30), `username` VARCHAR(30), `tanggal_peminjaman` DATE, `tanggal_pengembalian` DATE)   BEGIN
    UPDATE perentalan SET status_peminjaman = 'Menunggu Konfirmasi' WHERE id_rental = id_rental;
    INSERT INTO upload_pembayaran VALUES(id_produk, username, tanggal_peminjaman, tanggal_pengembalian, bukti_pembayaran, id_rental);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `nama`, `alamat`, `no_telp`, `email`) VALUES
('o6oYwA==', '+v1Z', 'g4o44O6DXPhWOtg=', 'j6oZ1O6/b8RlE/zEnITqiBlzcUezEvf00aPPlXEW', '4PlYjf/lPIIlQaC', 'o6oYwLqlZ9B5Fa2FsIr0yTt6PAS0Hg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perentalan`
--

CREATE TABLE `perentalan` (
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `id_produk` char(30) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status_peminjaman` varchar(30) NOT NULL,
  `id_rental` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perentalan`
--

INSERT INTO `perentalan` (`tanggal_peminjaman`, `tanggal_pengembalian`, `id_produk`, `jumlah_produk`, `username`, `status_peminjaman`, `id_rental`) VALUES
('2022-12-31', '2022-12-31', 'PRD001', 3, 'o6oYwA==', 'Menunggu Konfirmasi', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(30) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `gambar_produk` varchar(100) NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `gambar_produk`, `stok_produk`) VALUES
('PRD001', 'Tenda Rei Kaps 4', 40000, '-', 'Tenda Rei Kaps 4.jpg', 88),
('PRD002', 'Tenda Rei Kaps 2', 25000, '-', 'Tenda Rei Kaps 2.jpg', 95),
('PRD003', 'Tenda Eiger Kaps 2', 30000, '-', 'Tenda Eiger Kaps 2.jpg', 98),
('PRD004', 'Tenda Eiger Kaps 4', 50000, '-', 'Tenda Eiger Kaps 4.jpg', 98),
('PRD005', 'Tenda Regu', 25000, '-', 'Tenda Regu.png', 98),
('PRD006', 'Tenda Regu Paket', 35000, '-', 'Tenda Regu.png', 98),
('PRD007', 'Sleeping Bag', 15000, '-', 'SB.jpg', 98),
('PRD008', 'Sleeping Bag Rei', 25000, '-', 'SB Rei.jpg', 98),
('PRD009', 'Sleeping Bag Eiger', 30000, '-', 'SB Eiger.jpg', 98),
('PRD010', 'Matras', 5000, '-', 'Matras.jpg', 98),
('PRD011', 'Matras Foil', 10000, '-', 'Matras Foil.jpg', 98),
('PRD012', 'Fly Sheet 3x4', 15000, '-', 'Fly Sheet 3x4.jpg', 98),
('PRD013', 'Fly Sheet 2x3', 10000, '-', 'Fly Sheet 2x3.jpg', 98),
('PRD014', 'Carrier 60L', 45000, '-', 'Carrier 60L.jpg', 98),
('PRD015', 'Carrier 40L', 35000, '-', 'Carrier 40L.jpg', 98),
('PRD016', 'Headlamp', 10000, '-', 'Headlamp.jpg', 98),
('PRD017', 'Lampu Tenda', 5000, '-', 'Lampu Tenda.jpg', 98),
('PRD018', 'Hammock', 15000, '-', 'Hammock.jpg', 98),
('PRD019', 'Gloves', 10000, '-', 'Gloves.jpg', 98),
('PRD020', 'Trackpole', 15000, '-', 'Trackpole.jpg', 98),
('PRD021', 'Nesting DS/SY', 15000, '-', 'Nesting.jpg', 98),
('PRD022', 'Kompor Outdoor', 10000, '-', 'Kompor.jpg', 98),
('PRD023', 'Gas', 135000, '-', 'Gas.jpg', 98),
('PRD024', 'Gas Reffil', 140000, '-', 'Gas.jpg', 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload_pembayaran`
--

CREATE TABLE `upload_pembayaran` (
  `id_produk` char(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `id_rental` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `upload_pembayaran`
--

INSERT INTO `upload_pembayaran` (`id_produk`, `username`, `tanggal_peminjaman`, `tanggal_pengembalian`, `bukti_pembayaran`, `id_rental`) VALUES
('PRD001', 'o6oYwA==', '2022-12-31', '2022-12-31', '7_Screenshot from 2022-12-28 10-55-52.png', 7);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pesanan` (
`id_produk` char(30)
,`username` varchar(30)
,`tanggal_peminjaman` date
,`tanggal_pengembalian` date
,`id_rental` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pesanan`
--
DROP TABLE IF EXISTS `view_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pesanan`  AS SELECT `produk`.`id_produk` AS `id_produk`, `akun`.`username` AS `username`, `perentalan`.`tanggal_peminjaman` AS `tanggal_peminjaman`, `perentalan`.`tanggal_pengembalian` AS `tanggal_pengembalian`, `perentalan`.`id_rental` AS `id_rental` FROM ((`produk` join `perentalan` on(`perentalan`.`id_produk` = `produk`.`id_produk`)) join `akun` on(`akun`.`username` = `perentalan`.`username`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `perentalan`
--
ALTER TABLE `perentalan`
  ADD PRIMARY KEY (`id_rental`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `upload_pembayaran`
--
ALTER TABLE `upload_pembayaran`
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `username` (`username`),
  ADD KEY `id_rental` (`id_rental`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `perentalan`
--
ALTER TABLE `perentalan`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `perentalan`
--
ALTER TABLE `perentalan`
  ADD CONSTRAINT `perentalan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `perentalan_ibfk_2` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Ketidakleluasaan untuk tabel `upload_pembayaran`
--
ALTER TABLE `upload_pembayaran`
  ADD CONSTRAINT `upload_pembayaran_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `upload_pembayaran_ibfk_2` FOREIGN KEY (`username`) REFERENCES `akun` (`username`),
  ADD CONSTRAINT `upload_pembayaran_ibfk_3` FOREIGN KEY (`id_rental`) REFERENCES `perentalan` (`id_rental`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
