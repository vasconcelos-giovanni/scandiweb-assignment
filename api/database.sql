CREATE DATABASE `scandiweb_assignment`;

USE `scandiweb_assignment`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB;

INSERT INTO products
  (`sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`)
VALUES
  ('SKU00001', 'RBD - Live in Brasília', 9.99, '700', NULL, NULL, NULL, NULL);

INSERT INTO products
  (`sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`)
VALUES
  ('SKU00002', 'Wooden Table', 50.99, NULL, 100, 100, 100, NULL);

INSERT INTO products
  (`sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`)
VALUES
  ('SKU00003', 'The Picture of Dorian Gray', 10.99, NULL, NULL, NULL, NULL, 1.00);
