CREATE TABLE `agro_products` (
  `id` int NOT NULL,
  `id_catalano` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `grupo` varchar(250) DEFAULT NULL,
  `med_cub` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `esp_mm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `dtes` varchar(250) DEFAULT '0',
  `rad_mm` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0',
  `imagen` varchar(10) DEFAULT NULL,
  `modelo` varchar(250) DEFAULT NULL,
  `marca` varchar(250) DEFAULT NULL,
  `cad` varchar(250) DEFAULT '0',
  `observacion` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `diam_ex` varchar(250) DEFAULT NULL,
  `diam_int` varchar(250) DEFAULT NULL,
  `diam_rod` varchar(250) DEFAULT NULL,
  `can_diam` varchar(250) DEFAULT NULL,
  `paso_esp` varchar(250) DEFAULT NULL,
  `est_x_esp` varchar(250) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE = MYISAM DEFAULT CHARSET = latin1;