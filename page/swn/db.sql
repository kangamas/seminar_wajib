-- Dumping structure for table tesdb.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- Dumping data for table tesdb.mahasiswa: ~4 rows (approximately)
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jk`, `alamat`) VALUES
	(1, '51201214', 'AZIS GAGU', 'L', 'GORONTALO'),
	(2, '51240012', 'SUTISNA', 'L', 'MAKASSAR'),
	(3, '51240032', 'EDI SUPONO', 'L', 'MANADO'),
	(4, '51240041', 'NUNUNG', 'P', 'SEMARANG');