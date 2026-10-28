CREATE DATABASE IF NOT EXISTS `apiclasse` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `apiclasse`;

CREATE TABLE IF NOT EXISTS `estudantes` (
    `matricula` VARCHAR(20) NOT NULL PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `apelido` VARCHAR(50) NULL,
    `sexo` ENUM('M', 'F') DEFAULT 'M',
    `status` ENUM('ativo', 'desativo') DEFAULT 'ativo',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `estudantes` (`matricula`, `nome`, `apelido`, `sexo`, `status`) VALUES
('2016-6932', 'Raquel Campos', 'Campos', 'F', 'ativo'),
('2016-3214', 'Gabriel Antunes', 'Gabriel', 'M', 'ativo'),
('2016-2547', 'Jorge Jorginho', 'Jorginho', 'M', 'ativo'),
('2016-8452', 'Fernando Fer', 'Fer', 'M', 'ativo'),
('2016-2255', 'Carlos Guimarães', 'Carlos', 'M', 'ativo')
ON DUPLICATE KEY UPDATE `nome` = VALUES(`nome`);

CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `senha` VARCHAR(255) NOT NULL,
    `perfil` VARCHAR(50) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `usuarios` (`nome`, `email`, `senha`, `perfil`) VALUES
('Gabriel Martins', 'admin@escola.com', 'Password@123', 'Administrador Geral'),
('Prof. Carlos Eduardo', 'coordenador@escola.com', 'Password@123', 'Coordenador Pedagógico'),
('Ana Beatriz Lima', 'secretaria@escola.com', 'Password@123', 'Secretaria Acadêmica')
ON DUPLICATE KEY UPDATE `nome` = VALUES(`nome`);
