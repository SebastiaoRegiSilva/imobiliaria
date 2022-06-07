create database imobiliaria;
use imobiliaria;

create table imovel(
    id int primary key auto_increment,
    descricao varchar(200) not null,
    foto longblob,
    valor decimal(9,2),
    tipo char(1),
    fotoTipo varchar(20)
);

create table usuario(
    id int auto_increment primary key,
    login varchar(10),
    senha varchar(100),
    permissao char(1)
);

create table visualizacao(
    id int auto_increment primary key,
    idUsuario  int,
    idImovel int,
    data date,
    hora time,
    foreign key(idUsuario) references usuario(id),
    foreign key(idImovel) references imovel(id)
);

-- Descrição das colunas de uma tabela.
show COLUMNS from <nomeDaTabela>;