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
    `usuario_tipo_id`     INT          NOT NULL,
    `usu_ativo`           BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`usuario_id`),
    FOREIGN KEY (`usuario_tipo_id`) REFERENCES dialog.usuario_tipo (usuario_tipo_id)
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

CREATE TABLE `dialog`.`usuario_tipo`
(
    `usuario_tipo_id` INT          NOT NULL AUTO_INCREMENT,
    `ust_nome`        VARCHAR(255) NOT NULL,
    `ust_ativo`       BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`usuario_tipo_id`)
) ENGINE = MyISAM;


CREATE TABLE `dialog`.`permissoes`
(
    `permissoes_id`   INT          NOT NULL AUTO_INCREMENT,
    `per_nome`        VARCHAR(255) NOT NULL,
    `perm_permission` VARCHAR(255) NOT NULL,
    `perm_ativo`      BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`permissoes_id`)
) ENGINE = MyISAM;


CREATE TABLE `dialog`.`usuario_tipo_permissao`
(
    `usuario_tipo_permissao_id` INT NOT NULL AUTO_INCREMENT,
    `usuario_tipo_id`           INT NOT NULL,
    `permissoes_id`             INT NOT NULL,
    PRIMARY KEY (`usuario_tipo_permissao_id`),
    FOREIGN KEY (`usuario_tipo_id`) REFERENCES dialog.usuario_tipo (usuario_tipo_id),
    FOREIGN KEY (`permissoes_id`) REFERENCES dialog.permissoes (permissoes_id)
) ENGINE = MyISAM;

INSERT INTO dialog.usuario (usuario_id, usu_password, usu_login, usu_email, usu_nome, usu_telefone, usu_data_cadastro,
                            usu_data_nascimento, usu_ativo, usuario_tipo_id)
VALUES (1, 'd1d92025edb756d2fbfd9b646dd4464d7f5b8e13', 'teste', 'teste@gmail.com', 'teste', null, '2021-07-22',
        '2021-07-14', 1, 1);
INSERT INTO dialog.usuario (usuario_id, usu_password, usu_login, usu_email, usu_nome, usu_telefone, usu_data_cadastro,
                            usu_data_nascimento, usu_ativo, usuario_tipo_id)
VALUES (5, 'd1d92025edb756d2fbfd9b646dd4464d7f5b8e13', 'testePsicologo', 'testePsicologo@teste.com', 'Psicologo TESTE',
        '156165156165', '2021-07-22', '2021-06-28', 1, 3);
INSERT INTO dialog.usuario (usuario_id, usu_password, usu_login, usu_email, usu_nome, usu_telefone, usu_data_cadastro,
                            usu_data_nascimento, usu_ativo, usuario_tipo_id)
VALUES (8, 'd1d92025edb756d2fbfd9b646dd4464d7f5b8e13', 'pacienteteste', 'pacienteteste@teste.com', 'Paciente Teste',
        null, '2021-07-22', '1990-03-25', 1, 2);


CREATE TABLE `dialog`.`questionario`
(
    `questionario_id` INT          NOT NULL AUTO_INCREMENT,
    `que_nome`        varchar(255) NOT NULL,
    PRIMARY KEY (`questionario_id`)
) ENGINE = MyISAM;


CREATE TABLE `dialog`.`pergunta`
(
    `pergunta_id`     INT          NOT NULL AUTO_INCREMENT,
    `questionario_id` INT          NOT NULL,
    `per_descricao`   varchar(255) NOT NULL,
    `per_tipo`        varchar(255) NOT NULL,
    PRIMARY KEY (`pergunta_id`),
    FOREIGN KEY (`questionario_id`) REFERENCES dialog.questionario (questionario_id)
) ENGINE = MyISAM;

CREATE TABLE `dialog`.`aplicacao_questionario`
(
    `aplicacao_questionario_id` INT NOT NULL AUTO_INCREMENT,
    `questionario_id`           INT NOT NULL,
    `apq_usuario_id`            INT NOT NULL,
    PRIMARY KEY (`aplicacao_questionario_id`),
    FOREIGN KEY (`questionario_id`) REFERENCES dialog.questionario (questionario_id),
    FOREIGN KEY (`apq_usuario_id`) REFERENCES dialog.usuario (usuario_id)
) ENGINE = MyISAM;

CREATE TABLE `dialog`.`resposta`
(
    `resposta_id`               INT NOT NULL AUTO_INCREMENT,
    `pergunta_id`               INT NOT NULL,
    `aplicacao_questionario_id` INT NOT NULL,
    `res_descricao`             text,
    PRIMARY KEY (`resposta_id`),
    FOREIGN KEY (`pergunta_id`) REFERENCES dialog.pergunta (pergunta_id),
    FOREIGN KEY (`aplicacao_questionario_id`) REFERENCES dialog.aplicacao_questionario (aplicacao_questionario_id)
) ENGINE = MyISAM;


