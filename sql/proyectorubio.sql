/*
 Navicat Premium Data Transfer

 Source Server         : local - PC
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : proyectorubio

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 04/07/2022 21:33:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for censo
-- ----------------------------
DROP TABLE IF EXISTS `censo`;
CREATE TABLE `censo`  (
  `idCenso` int(255) NOT NULL AUTO_INCREMENT,
  `cedula` int(30) NULL DEFAULT NULL,
  `cantHijos` int(5) NULL DEFAULT NULL,
  `hijos10` int(5) NULL DEFAULT NULL,
  `profesion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trabaja` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jefeFamilia` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `patologia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'ninguna',
  `viviendaPropia` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`idCenso`) USING BTREE,
  INDEX `cedula`(`cedula`) USING BTREE,
  CONSTRAINT `cedula` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of censo
-- ----------------------------
INSERT INTO `censo` VALUES (1, 12134566, 0, 0, 'profesor', 'si', 'si', 'ninguna', 'si', 'los mangos', '2021-11-02');
INSERT INTO `censo` VALUES (15, 123456, 1, 1, 'carpintero', 'si', 'si', 'tos', 'si', 'junin', '2021-11-09');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `cedula` int(30) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `clave` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `admin` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (566, 'carlos', 'par', '435435', 'prueba@example.com', '321', 0);
INSERT INTO `usuarios` VALUES (2134, 'carlos', 'par', '435435', 'prueba@example.com', '321', 0);
INSERT INTO `usuarios` VALUES (56677, 'carlos', 'par', '435435', 'prueba@example.com', '321', 0);
INSERT INTO `usuarios` VALUES (98765, 'carlos', 'par', '435435', 'prueba@example.com', '321', 0);
INSERT INTO `usuarios` VALUES (111111, 'pan', 'car', '435435', 'prueba@example.com', '321', 0);
INSERT INTO `usuarios` VALUES (123456, 'carlos', 'par', '435435', 'prueba@example.com', '321', 0);
INSERT INTO `usuarios` VALUES (343346, 'carlos', 'par', '435435', 'prueba@example.com', '321', 0);
INSERT INTO `usuarios` VALUES (12134566, 'Administrador', 'Sistema', '3242353', 'admin@sistema.com', '1234', 1);

SET FOREIGN_KEY_CHECKS = 1;
