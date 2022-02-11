/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.20-MariaDB : Database - db_parc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_parc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_parc`;

/*Table structure for table `tb_chamados` */

DROP TABLE IF EXISTS `tb_chamados`;

CREATE TABLE `tb_chamados` (
  `id_chamado` INT(11) NOT NULL AUTO_INCREMENT,
  `id_situacao` INT(11) NOT NULL DEFAULT 1,
  `id_tipo` INT(11) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  `assunto` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` TEXT COLLATE utf8_unicode_ci NOT NULL,
  `nome_solicitante` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_solicitante` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_solicitante` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_abertura` DATE NOT NULL DEFAULT CURDATE(),
  `hora_abertura` TIME NOT NULL DEFAULT CURTIME(),
  PRIMARY KEY (`id_chamado`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `tb_grupos_usuarios` */

DROP TABLE IF EXISTS `tb_grupos_usuarios`;

CREATE TABLE `tb_grupos_usuarios` (
  `id_grupo` INT(11) NOT NULL AUTO_INCREMENT,
  `grupo` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_grupo`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `tb_permissoes_grupos` */

DROP TABLE IF EXISTS `tb_permissoes_grupos`;

CREATE TABLE `tb_permissoes_grupos` (
  `id_grupo` INT(11) NOT NULL,
  `abrir_chamado` TINYINT(1) NOT NULL DEFAULT 0,
  `gerenciar_chamados` TINYINT(1) NOT NULL DEFAULT 0,
  `visualizar_outros` TINYINT(1) NOT NULL DEFAULT 0,
  `editar_chamado` TINYINT(1) NOT NULL DEFAULT 0,
  `listar_tipos` TINYINT(1) NOT NULL DEFAULT 0,
  `cadastrar_tipo` TINYINT(1) NOT NULL DEFAULT 0,
  `inativar_tipos` TINYINT(1) NOT NULL DEFAULT 0,
  `listar_usuarios` TINYINT(1) NOT NULL DEFAULT 0,
  `cadastrar_usuario` TINYINT(1) NOT NULL DEFAULT 0,
  `alterar_usuario` TINYINT(1) NOT NULL DEFAULT 0,
  `listar_grupos` TINYINT(1) NOT NULL DEFAULT 0,
  `alterar_grupo` TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tb_permissoes_usuarios` */

DROP TABLE IF EXISTS `tb_permissoes_usuarios`;

CREATE TABLE `tb_permissoes_usuarios` (
  `id_usuario` INT(11) NOT NULL,
  `abrir_chamado` TINYINT(1) NOT NULL DEFAULT 0,
  `gerenciar_chamados` TINYINT(1) NOT NULL DEFAULT 0,
  `visualizar_outros` TINYINT(1) NOT NULL DEFAULT 0,
  `editar_chamado` TINYINT(1) NOT NULL DEFAULT 0,
  `listar_tipos` TINYINT(1) NOT NULL DEFAULT 0,
  `cadastrar_tipo` TINYINT(1) NOT NULL DEFAULT 0,
  `inativar_tipos` TINYINT(1) NOT NULL DEFAULT 0,
  `listar_usuarios` TINYINT(1) NOT NULL DEFAULT 0,
  `cadastrar_usuario` TINYINT(1) NOT NULL DEFAULT 0,
  `alterar_usuario` TINYINT(1) NOT NULL DEFAULT 0,
  `listar_grupos` TINYINT(1) NOT NULL DEFAULT 0,
  `alterar_grupo` TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tb_respostas_chamados` */

DROP TABLE IF EXISTS `tb_respostas_chamados`;

CREATE TABLE `tb_respostas_chamados` (
  `id_chamado` INT(11) NOT NULL,
  `id_resposta` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(11) NOT NULL,
  `descricao` TEXT COLLATE utf8_unicode_ci NOT NULL,
  `nome_solicitante` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_solicitante` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_solicitante` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_resposta` DATE NOT NULL DEFAULT CURDATE(),
  `hora_resposta` TIME NOT NULL DEFAULT CURTIME(),
  PRIMARY KEY (`id_resposta`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `tb_situacoes_chamados` */

DROP TABLE IF EXISTS `tb_situacoes_chamados`;

CREATE TABLE `tb_situacoes_chamados` (
  `id_situacao` INT(11) NOT NULL AUTO_INCREMENT,
  `situacao_chamado` VARCHAR(80) COLLATE utf8_unicode_ci NOT NULL,
  `cor_situacao` VARCHAR(7) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_situacao`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `tb_tipos` */

DROP TABLE IF EXISTS `tb_tipos`;

CREATE TABLE `tb_tipos` (
  `id_tipo` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_tipo`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `tb_usuarios` */

DROP TABLE IF EXISTS `tb_usuarios`;

CREATE TABLE `tb_usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` INT(11) NOT NULL DEFAULT 3,
  `puxar_grupo` TINYINT(1) NOT NULL DEFAULT 0,
  `nome` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `usuario` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` CHAR(32) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `ativo` TINYINT(1) DEFAULT 1,
  PRIMARY KEY (`id_usuario`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
