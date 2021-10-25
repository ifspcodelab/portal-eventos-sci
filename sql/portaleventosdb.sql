/* Modelo lógico: */

CREATE TABLE noticia (
    texto_noticia varchar(3000),
    titulo_noticia varchar(255),
    observacoes_noticia varchar(255),
    cod_noticia int PRIMARY KEY AUTO_INCREMENT,
    imagem_noticia longblob,
    data_noticia datetime,
    link_noticia varchar(2000),
    descricao_noticia varchar(255),
    usuario char(9),
    data_modificacao datetime,
    fk_atividade_cod_atividade int
);

CREATE TABLE area (
    descricao_area varchar(255),
    nome_area varchar(255),
    cod_area int PRIMARY KEY AUTO_INCREMENT,
    usuario char(9),
    data_modificacao datetime
);

CREATE TABLE usuario (
    prontuario char(9) PRIMARY KEY,
    email varchar(255),
    nome varchar(255),
    senha varchar(255)
);

CREATE TABLE atividade (
    link_atividade varchar(2000),
    hora_fim time,
    preco_inscricao decimal(4,2),
    data_inicio date,
    cod_atividade int PRIMARY KEY AUTO_INCREMENT,
    data_fim date,
    observacao_atividade varchar(255),
    nome_atividade varchar(255),
    descricao_atividade varchar(255),
    pontuacao_atividade decimal(4,2),
    hora_inicio time,
    link_inscricao_atividade varchar(2000),
    data_modificacao datetime,
    usuario char(9),
    fk_evento_cod_evento int
);

CREATE TABLE evento (
    nome_evento varchar(255),
    sigla_evento char(10),
    periodo_evento varchar(255),
    cod_evento int PRIMARY KEY AUTO_INCREMENT,
    img_evento longblob,
    descricao_evento varchar(3000),
	link_evento varchar(2000),
	link_inscricao_evento varchar(2000),
    data_modificacao datetime,
    usuario char(9)
);

CREATE TABLE pessoa_IFSP (
    tipo_pessoa varchar(255),
    data_modificacao datetime,
    usuario char(9),
    cod_pessoa_ifsp int AUTO_INCREMENT,
    fk_pessoa_cod_pessoa int,
    fk_area_pessoa_IFSP_cod_area_pessoa_ifsp int,
    PRIMARY KEY (cod_pessoa_ifsp, fk_pessoa_cod_pessoa)
);

CREATE TABLE pessoa (
    email varchar(255),
    celular char(14),
    telefone char(13),
    nome_contato varchar(255),
    cod_pessoa int PRIMARY KEY AUTO_INCREMENT,
    data_modificacao datetime,
    usuario char(9)
);

CREATE TABLE area_pessoa_IFSP (
    nome_departamento varchar(255),
    cod_area_pessoa_ifsp int PRIMARY KEY AUTO_INCREMENT,
    sigla_area char(10),
    nome_area varchar(255),
    cod_departamento char(10),
    campus varchar(255),
    data_modificacao datetime,
    usuario char(9)
);

CREATE TABLE pessoa_externa (
    area_contato_empresa varchar(255),
    cod_pessoa_externa int AUTO_INCREMENT,
    data_modificacao datetime,
    usuario char(9),
    fk_pessoa_cod_pessoa int,
    fk_empresa_cod_empresa int,
    PRIMARY KEY (cod_pessoa_externa, fk_pessoa_cod_pessoa)
);

CREATE TABLE empresa (
    nome_empresa varchar(255),
    email varchar(255),
    site varchar(2000),
    cod_empresa int PRIMARY KEY AUTO_INCREMENT,
    data_modificacao datetime,
    usuario char(9)
);

CREATE TABLE area_atividade (
    fk_area_cod_area int,
    fk_atividade_cod_atividade int
);

CREATE TABLE envolvido_IFSP (
    fk_pessoa_IFSP_cod_pessoa_ifsp int,
    fk_pessoa_IFSP_fk_pessoa_cod_pessoa int,
    fk_atividade_cod_atividade int,
    papel_envolvido_ifsp varchar(255),
    data_modificacao datetime,
    usuario char(9)
);

CREATE TABLE responsavel_atividade (
    fk_pessoa_cod_pessoa int,
    fk_atividade_cod_atividade int
);

CREATE TABLE envolvido_evento_IFSP (
    fk_pessoa_IFSP_cod_pessoa_ifsp int,
    fk_pessoa_IFSP_fk_pessoa_cod_pessoa int,
    fk_evento_cod_evento int
);

ALTER TABLE noticia ADD CONSTRAINT FK_noticia_2
    FOREIGN KEY (fk_atividade_cod_atividade)
    REFERENCES atividade (cod_atividade)
    ON DELETE CASCADE;
 
ALTER TABLE atividade ADD CONSTRAINT FK_atividade_2
    FOREIGN KEY (fk_evento_cod_evento)
    REFERENCES evento (cod_evento)
    ON DELETE RESTRICT;
 
ALTER TABLE pessoa_IFSP ADD CONSTRAINT FK_pessoa_IFSP_2
    FOREIGN KEY (fk_pessoa_cod_pessoa)
    REFERENCES pessoa (cod_pessoa)
    ON DELETE CASCADE;
 
ALTER TABLE pessoa_IFSP ADD CONSTRAINT FK_pessoa_IFSP_3
    FOREIGN KEY (fk_area_pessoa_IFSP_cod_area_pessoa_ifsp)
    REFERENCES area_pessoa_IFSP (cod_area_pessoa_ifsp)
    ON DELETE CASCADE;
 
ALTER TABLE pessoa_externa ADD CONSTRAINT FK_pessoa_externa_2
    FOREIGN KEY (fk_pessoa_cod_pessoa)
    REFERENCES pessoa (cod_pessoa)
    ON DELETE CASCADE;
 
ALTER TABLE pessoa_externa ADD CONSTRAINT FK_pessoa_externa_3
    FOREIGN KEY (fk_empresa_cod_empresa)
    REFERENCES empresa (cod_empresa)
    ON DELETE CASCADE;
 
ALTER TABLE area_atividade ADD CONSTRAINT FK_area_atividade_1
    FOREIGN KEY (fk_area_cod_area)
    REFERENCES area (cod_area)
    ON DELETE RESTRICT;
 
ALTER TABLE area_atividade ADD CONSTRAINT FK_area_atividade_2
    FOREIGN KEY (fk_atividade_cod_atividade)
    REFERENCES atividade (cod_atividade)
    ON DELETE SET NULL;
 
ALTER TABLE envolvido_IFSP ADD CONSTRAINT FK_envolvido_IFSP_1
    FOREIGN KEY (fk_pessoa_IFSP_cod_pessoa_ifsp, fk_pessoa_IFSP_fk_pessoa_cod_pessoa)
    REFERENCES pessoa_IFSP (cod_pessoa_ifsp, fk_pessoa_cod_pessoa)
    ON DELETE RESTRICT;
 
ALTER TABLE envolvido_IFSP ADD CONSTRAINT FK_envolvido_IFSP_2
    FOREIGN KEY (fk_atividade_cod_atividade)
    REFERENCES atividade (cod_atividade)
    ON DELETE SET NULL;
 
ALTER TABLE responsavel_atividade ADD CONSTRAINT FK_responsavel_atividade_1
    FOREIGN KEY (fk_pessoa_cod_pessoa)
    REFERENCES pessoa (cod_pessoa)
    ON DELETE RESTRICT;
 
ALTER TABLE responsavel_atividade ADD CONSTRAINT FK_responsavel_atividade_2
    FOREIGN KEY (fk_atividade_cod_atividade)
    REFERENCES atividade (cod_atividade)
    ON DELETE SET NULL;
 
ALTER TABLE envolvido_evento_IFSP ADD CONSTRAINT FK_envolvido_evento_IFSP_1
    FOREIGN KEY (fk_pessoa_IFSP_cod_pessoa_ifsp, fk_pessoa_IFSP_fk_pessoa_cod_pessoa)
    REFERENCES pessoa_IFSP (cod_pessoa_ifsp, fk_pessoa_cod_pessoa)
    ON DELETE RESTRICT;
 
ALTER TABLE envolvido_evento_IFSP ADD CONSTRAINT FK_envolvido_evento_IFSP_2
    FOREIGN KEY (fk_evento_cod_evento)
    REFERENCES evento (cod_evento)
    ON DELETE SET NULL;