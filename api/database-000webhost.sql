CREATE TABLE `product_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_id` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`),
  FOREIGN KEY (`product_type_id`) REFERENCES `product_types`(`id`)
) ENGINE=InnoDB;

INSERT INTO id21456120_scandiweb_assignment.product_types
(name)
VALUES('dvd');
INSERT INTO id21456120_scandiweb_assignment.product_types
(name)
VALUES('furniture');
INSERT INTO id21456120_scandiweb_assignment.product_types
(name)
VALUES('book');

INSERT INTO id21456120_scandiweb_assignment.products
  (`product_type_id`, `sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`)
VALUES
  (1, 'SKU00001', 'RBD - Live in Brasília', 9.99, '700', NULL, NULL, NULL, NULL);

INSERT INTO id21456120_scandiweb_assignment.products
  (`product_type_id`, `sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`)
VALUES
  (2, 'SKU00002', 'Wooden Table', 50.99, NULL, 100, 100, 100, NULL);

INSERT INTO id21456120_scandiweb_assignment.products
  (`product_type_id`, `sku`, `name`, `price`, `size`, `height`, `width`, `length`, `weight`)
VALUES
  (3, 'SKU00003', 'The Picture of Dorian Gray', 10.99, NULL, NULL, NULL, NULL, 1.00);
