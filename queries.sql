CREATE TABLE IF NOT EXISTS `manufacturers` (
                                               `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                               `full_name` CHAR(255) NOT NULL,
    `short_name` CHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP DEFAULT NULL
    ) ENGINE InnoDB charset utf8;

CREATE TABLE IF NOT EXISTS `hard_wares_goods` (
    `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `manufacturer_id` INT UNSIGNED NOT NULL,
    `name` CHAR(255) NOT NULL,
    `model` CHAR(255) NOT NULL,
    `price` NUMERIC(9,2) UNSIGNED NOT NULL,
    `description` TEXT DEFAULT NULL,
    `materials` TEXT DEFAULT NULL,
    `production_date` DATE DEFAULT NULL,
    `pre_order` BOOL DEFAULT FALSE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    `deleted_at` TIMESTAMP DEFAULT NULL,
    FOREIGN KEY (manufacturer_id) REFERENCES manufacturers(id)
    ) ENGINE InnoDB charset utf8;

INSERT INTO `manufacturers`(`full_name`, `short_name`)
VALUES ('Hewlett-Packard Company', 'HP');

INSERT INTO `manufacturers`(`full_name`, `short_name`)
VALUES ('Samsung Group', 'Samsung');

INSERT INTO `manufacturers`(`full_name`, `short_name`)
VALUES ('Apple Inc.', 'Apple');

INSERT INTO `hard_wares_goods`(`manufacturer_id`, `name`, `model`, `price`, `description`, `materials`, `production_date`, `pre_order`)
VALUES (1, 'Laptop', 'g550', 1000, 'Simple laptop',
        '{"corps": "polimer","frame": "metal"}', '2024-12-12', TRUE);

INSERT INTO `hard_wares_goods`(`manufacturer_id`, `name`, `model`, `price` )
VALUES (1, 'Printer ', 'LaserJet5', 300);

INSERT INTO `hard_wares_goods`(`manufacturer_id`, `name`, `model`, `price`)
VALUES (1, 'Server', 'ProLiant dl45', 5000);

INSERT INTO `hard_wares_goods`(`manufacturer_id`, `name`, `model`, `price`, `production_date`, `pre_order`)
VALUES (2, 'Mobile phone', 'Galaxy S25', 1200, '2025-05-01', TRUE);

INSERT INTO `hard_wares_goods`(`manufacturer_id`, `name`, `model`, `price`)
VALUES (2, 'Tablet', 'Galaxy tab 22', 700);

INSERT INTO `hard_wares_goods`(`manufacturer_id`, `name`, `model`, `price`)
VALUES (3, 'Watch', 'Series 9', 399);

INSERT INTO `hard_wares_goods`(`manufacturer_id`, `name`, `model`, `price`, `production_date`, `pre_order`)
VALUES (3, 'MacBook', 'Pro', 1500, '2025-03-01', TRUE);

UPDATE `hard_wares_goods`
SET `description` = 'Usual tablet'
WHERE `id` = 5;

UPDATE `hard_wares_goods`
SET `production_date` = '2023-10-10'
WHERE `id` = 3;

SELECT * FROM `hard_wares_goods` WHERE `manufacturer_id` = 3 ORDER BY `price`;

SELECT * FROM `hard_wares_goods` WHERE `pre_order` = TRUE;

SELECT * FROM `hard_wares_goods` WHERE `description` != '';

SELECT m.short_name, hwg.name, hwg.price
FROM `hard_wares_goods` AS hwg
LEFT JOIN manufacturers AS m ON hwg.manufacturer_id = m.id;

SELECT m.full_name AS corp_name,
       COUNT(hwg.id) AS prod_count,
       ROUND(AVG(price), 2) AS average,
       SUM(price) AS total
FROM `manufacturers` AS m
LEFT JOIN hard_wares_goods AS hwg ON hwg.manufacturer_id = m.id
GROUP BY m.full_name ORDER BY total DESC;

DELETE FROM `hard_wares_goods` WHERE id = 2;




