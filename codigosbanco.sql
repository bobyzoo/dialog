CREATE TABLE `u217629253_dialog`.`usuario`
(
    `usuario_id`          INT          NOT NULL AUTO_INCREMENT,
    `usu_password`        VARCHAR(255) NOT NULL,
    `usu_login`           varchar(30)  NOT NULL UNIQUE,
    `usu_email`           VARCHAR(255) NOT NULL UNIQUE,
    `usu_nome`            VARCHAR(255) NOT NULL,
    `usu_telefone`        VARCHAR(20)  NULL,
    `usu_data_cadastro`   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `usu_data_nascimento` DATE         NOT NULL,
    `usuario_tipo_id`     INT          NOT NULL,
    `usu_ativo`           BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`usuario_id`),
    FOREIGN KEY (`usuario_tipo_id`) REFERENCES usuario_tipo (usuario_tipo_id)
) ENGINE = MyISAM;

CREATE TABLE `u217629253_dialog`.`psicologo`
(
    `psicologo_id`        INT         NOT NULL AUTO_INCREMENT,
    `usuario_id`          INT         NOT NULL,
    `psi_codigo_ativacao` VARCHAR(10) NOT NULL,
    `psi_numero_crp`      VARCHAR(20) NOT NULL,
    PRIMARY KEY (`psicologo_id`),
    FOREIGN KEY (`usuario_id`) REFERENCES usuario (usuario_id)
) ENGINE = MyISAM;

CREATE TABLE `u217629253_dialog`.`paciente`
(
    `paciente_id`                     INT          NOT NULL AUTO_INCREMENT,
    `usuario_id`                      INT          NOT NULL,
    `psicologo_id`                    INT          NOT NULL,
    `pac_nome_contato_emergencia`     VARCHAR(255) NOT NULL,
    `pac_telefone_contato_emergencia` VARCHAR(15)  NOT NULL,
    PRIMARY KEY (`paciente_id`),
    FOREIGN KEY (`psicologo_id`) REFERENCES psicologo (psicologo_id)
) ENGINE = MyISAM;

CREATE TABLE `u217629253_dialog`.`usuario_tipo`
(
    `usuario_tipo_id` INT          NOT NULL AUTO_INCREMENT,
    `ust_nome`        VARCHAR(255) NOT NULL,
    `ust_ativo`       BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`usuario_tipo_id`)
) ENGINE = MyISAM;


CREATE TABLE `u217629253_dialog`.`permissoes`
(
    `permissoes_id`   INT          NOT NULL AUTO_INCREMENT,
    `per_nome`        VARCHAR(255) NOT NULL,
    `perm_permission` VARCHAR(255) NOT NULL,
    `perm_ativo`      BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`permissoes_id`)
) ENGINE = MyISAM;


CREATE TABLE `u217629253_dialog`.`usuario_tipo_permissao`
(
    `usuario_tipo_permissao_id` INT NOT NULL AUTO_INCREMENT,
    `usuario_tipo_id`           INT NOT NULL,
    `permissoes_id`             INT NOT NULL,
    PRIMARY KEY (`usuario_tipo_permissao_id`),
    FOREIGN KEY (`usuario_tipo_id`) REFERENCES usuario_tipo (usuario_tipo_id),
    FOREIGN KEY (`permissoes_id`) REFERENCES permissoes (permissoes_id)
) ENGINE = MyISAM;

INSERT INTO usuario (usuario_id, usu_password, usu_login, usu_email, usu_nome, usu_telefone,
                     usu_data_cadastro,
                     usu_data_nascimento, usu_ativo, usuario_tipo_id)
VALUES (1, 'd1d92025edb756d2fbfd9b646dd4464d7f5b8e13', 'teste', 'teste@gmail.com', 'teste', null, '2021-07-22',
        '2021-07-14', 1, 1);
INSERT INTO usuario (usuario_id, usu_password, usu_login, usu_email, usu_nome, usu_telefone,
                     usu_data_cadastro,
                     usu_data_nascimento, usu_ativo, usuario_tipo_id)
VALUES (5, 'd1d92025edb756d2fbfd9b646dd4464d7f5b8e13', 'testePsicologo', 'testePsicologo@teste.com', 'Psicologo TESTE',
        '156165156165', '2021-07-22', '2021-06-28', 1, 3);
INSERT INTO usuario (usuario_id, usu_password, usu_login, usu_email, usu_nome, usu_telefone,
                     usu_data_cadastro,
                     usu_data_nascimento, usu_ativo, usuario_tipo_id)
VALUES (8, 'd1d92025edb756d2fbfd9b646dd4464d7f5b8e13', 'pacienteteste', 'pacienteteste@teste.com', 'Paciente Teste',
        null, '2021-07-22', '1990-03-25', 1, 2);


CREATE TABLE `questionario`
(
    `questionario_id` INT          NOT NULL AUTO_INCREMENT,
    `que_codigo`      varchar(255) NOT NULL,
    `que_nome`        varchar(255) NOT NULL,

    PRIMARY KEY (`questionario_id`)
) ENGINE = MyISAM;


CREATE TABLE `u217629253_dialog`.`pergunta`
(
    `pergunta_id`     INT          NOT NULL AUTO_INCREMENT,
    `questionario_id` INT          NOT NULL,
    `per_descricao`   varchar(255) NOT NULL,
    `per_tipo`        varchar(255) NOT NULL,
    `per_name_id`     varchar(255) NOT NULL,
    `placeholder`     varchar(255) NOT NULL DEFAULT 'Escreva aqui...',
    `per_required`    BOOL         NOT NULL DEFAULT FALSE,
    PRIMARY KEY (`pergunta_id`),
    FOREIGN KEY (`questionario_id`) REFERENCES questionario (questionario_id)
) ENGINE = MyISAM;

CREATE TABLE `u217629253_dialog`.`aplicacao_questionario`
(
    `aplicacao_questionario_id` INT     NOT NULL AUTO_INCREMENT,
    `questionario_id`           INT     NOT NULL,
    `apq_usuario_id`            INT     NOT NULL,
    `apq_data_cadastro`         DATE    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `apq_ultima_atualizacao`    DATE    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `apq_ativo`                 BOOLEAN NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`aplicacao_questionario_id`),
    FOREIGN KEY (`questionario_id`) REFERENCES questionario (questionario_id),
    FOREIGN KEY (`apq_usuario_id`) REFERENCES usuario (usuario_id)
) ENGINE = MyISAM;



CREATE TABLE `u217629253_dialog`.`resposta`
(
    `resposta_id`               INT NOT NULL AUTO_INCREMENT,
    `pergunta_id`               INT NOT NULL,
    `aplicacao_questionario_id` INT NOT NULL,
    `res_descricao`             text,
    PRIMARY KEY (`resposta_id`),
    FOREIGN KEY (`pergunta_id`) REFERENCES pergunta (pergunta_id),
    FOREIGN KEY (`aplicacao_questionario_id`) REFERENCES aplicacao_questionario (aplicacao_questionario_id)
) ENGINE = MyISAM;

# FORMULARIO DE RPD
INSERT INTO questionario (que_nome, que_codigo)
VALUES ('Registro de Pensamentos Disfuncionais', 'rpd');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_required, per_name_id,
                      placeholder)
VALUES (1, ' O que est?? acontecendo? (Situa????o)', 'text', TRUE, 'txtAcontecendo', 'O que est?? acontecendo? (Situa????o)');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_required, per_name_id)
VALUES (1, 'Quais pensamentos v??m a sua cabe??a?', 'text', TRUE, 'txtQuaisPensamentos');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_required, per_name_id)
VALUES (1, 'O quanto esse pensamento ?? verdade para voc???', 'bars-square', TRUE, 'txtQntPensamento');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_required, per_name_id)
VALUES (1, 'O que voc?? est?? sentindo?', 'text', TRUE, 'txtSentindo');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_required, per_name_id)
VALUES (1, 'Qual a intensidade dessa emo????o?', 'bars-square', TRUE, 'qntEmocoes');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_required, per_name_id)
VALUES (1, 'O que voc?? fez nesse situa????o? (Comportamento)', 'text', TRUE, 'txtFezSituacao');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id)
VALUES (1, 'Quais fatos podem contradizer esses pensamentos, que pode demonstrar que eles est??o equivocados?
(Ganho de Perspectiva)', 'text', 'txtFatosContradizemPensamentos');

INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id)
VALUES (1, 'Pode haver uma outra forma de entender essa situa????o, baseada nos fotos acima? Caso positivo, qual?
(Reavalia????o do pensamento inicial)', 'text', 'txtOutraFormaResposta');
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id)
VALUES (1, 'Quanto voc?? acredita no pensamento inicial?', 'bars-square', 'qntPensamentoInicial');
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id)
VALUES (1, 'E agora, como se sente (emo????es)?', 'text', 'txtSenteEmocoes');
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id)
VALUES (1, 'Qual a intensidade dessa emo????o?', 'bars-square', 'qntIntensidadeEmocoes');
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id)
VALUES (1, 'O que voc?? aprendeu analisando esses pensamentos?', 'text', 'txtAprendeuAnalisandoPensamento');


# FORMULARIO DE PLANO DE ACAO
INSERT INTO questionario (que_nome, que_codigo)
VALUES ('Plano de A????o', 'pla');
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (2, 'O objetivo com este plano de a????o ?? ...', 'text', 'txtObjetivoPlanoDeAcao', DEFAULT, DEFAULT);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (2, 'O que eu vou fazer (a????es pr??ticas)?', 'text', 'txtOqueVouFazer', DEFAULT, DEFAULT);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (2, 'Existe algum obst??culo ou dificuldade?', 'text', 'txtObstaculoOuDificuldade', DEFAULT, DEFAULT);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (2, 'Como vou lidar com esses obst??culos ou dificuldades?
        ', 'text', 'txtLidarObstaculosOuDificuldade', DEFAULT, DEFAULT);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (2, 'Quando vou colocar este plano na pr??tica?
        ', 'text', 'txtPlanoEmPratica', DEFAULT, DEFAULT);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (2, 'Quais foram os resultados?', 'text', 'txtResultados', DEFAULT, DEFAULT);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (2, 'O que eu aprendi?', 'text', 'txtAprendi', DEFAULT, DEFAULT);


# FORMULARIO DE HUMOR
INSERT INTO questionario (que_nome, que_codigo)
VALUES ('Monitoramento de humor', 'mdh');
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (3, 'Qual seu humor?', 'select', 'selectHumor', DEFAULT, true);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (3, 'Qual seu sentimento?', 'select', 'selectSentimentos', DEFAULT, true);
INSERT INTO pergunta (questionario_id, per_descricao, per_tipo, per_name_id, placeholder, per_required)
VALUES (3, 'Descreva o que estais sentindo ', 'text', 'txtOqueEstaSentindo', 'Comente sobre o que estais sentindo',
        true);


ALTER TABLE `usuario`
    CHANGE `usu_ativo` `usu_ativo` TINYINT(1) NOT NULL DEFAULT '0';


ALTER TABLE `usuario`
    ADD `usu_cpf` VARCHAR(30) NULL AFTER `usuario_tipo_id`,
    ADD UNIQUE `usu_cpf` (`usu_cpf`);



create table assinatura
(
    assinatura_id            int         null,
    usuario_id               int         null,
    assinatura_data_cadastro date        NOT NULL DEFAULT CURRENT_TIMESTAMP,
    assinatura_data_final    date        null,
    assinatura_status        varchar(10) null,
    constraint assinatura_pk
        primary key (assinatura_id),
    FOREIGN KEY (`usuario_id`) REFERENCES usuario (usuario_id)
);


CREATE TABLE log
(
    `log_id`      INT  NOT NULL AUTO_INCREMENT,
    `log_content` TEXT NOT NULL,
    PRIMARY KEY (`log_id`)
) ENGINE = InnoDB;