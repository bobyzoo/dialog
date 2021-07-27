CREATE TABLE `dialog`.`usuario`
(
    `usuario_id`          INT          NOT NULL AUTO_INCREMENT,
    `usu_password`        VARCHAR(255) NOT NULL,
    `usu_login`           varchar(30)  NOT NULL UNIQUE,
    `usu_email`           VARCHAR(255) NOT NULL UNIQUE,
    `usu_nome`            VARCHAR(255) NOT NULL,
    `usu_telefone`        VARCHAR(20)  NULL,
    `usu_data_cadastro`   DATE         NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `usu_data_nascimento` DATE         NOT NULL,
    `usu_ativo`           BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`usuario_id`)
) ENGINE = MyISAM;

CREATE TABLE `dialog`.`psicologo`
(
    `psicologo_id`        INT         NOT NULL AUTO_INCREMENT,
    `usuario_id`          INT         NOT NULL,
    `psi_codigo_ativacao` VARCHAR(10) NOT NULL,
    `psi_numero_crp`      VARCHAR(20) NOT NULL,
    PRIMARY KEY (`psicologo_id`),
    FOREIGN KEY (`usuario_id`) REFERENCES dialog.usuario (usuario_id)
) ENGINE = MyISAM;

CREATE TABLE `dialog`.`paciente`
(
    `paciente_id`                     INT          NOT NULL AUTO_INCREMENT,
    `usuario_id`                      INT          NOT NULL,
    `psicologo_id`                    INT          NOT NULL,
    `pac_nome_contato_emergencia`     VARCHAR(255) NOT NULL,
    `pac_telefone_contato_emergencia` VARCHAR(15)  NOT NULL,
    PRIMARY KEY (`paciente_id`),
    FOREIGN KEY (`psicologo_id`) REFERENCES dialog.psicologo (psicologo_id)
) ENGINE = MyISAM;
