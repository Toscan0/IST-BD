drop table if exists constituida cascade;
drop table if exists reposicao cascade;
drop table if exists planograma cascade;
drop table if exists fornece_sec cascade;
drop table if exists evento_reposicao cascade;
drop table if exists produto cascade;
drop table if exists super_categoria cascade;
drop table if exists categoria_simples cascade;
drop table if exists categoria cascade;
drop table if exists prateleira cascade;
drop table if exists corredor cascade;
drop table if exists fornecedor cascade;

create table categoria(
	nome varchar(255) not null unique,
	primary key(nome)
	/* RI-RE1 RI-RE2 */
);

create table categoria_simples(
	nome varchar(255) not null unique,
	primary key(nome),
	foreign key(nome) references categoria(nome) ON UPDATE cascade
);

create table super_categoria(
	nome varchar(255),
	primary key(nome),
	foreign key(nome) references categoria(nome) ON UPDATE cascade
	/* RI-RE3 */
);

create table constituida(
	super_categoria varchar(255) not null,
	categoria varchar(255) not null unique,
	primary key(super_categoria, categoria),
	foreign key(categoria) references categoria(nome) ON UPDATE cascade,
	foreign key(super_categoria) references super_categoria(nome) ON UPDATE cascade,
	check(categoria != super_categoria)
);

create table fornecedor(
	nif bigint not null unique,
	nome varchar(255) not null,
	primary key(nif)
);

create table produto(
	ean bigint not null unique,	--ean e um int de 13 digitos -> bigint
	design varchar(255),
	categoria varchar(255), -- O produto pode nao ter categoria
	forn_primario bigint not null,
	data date not null,
	primary key(ean),
	foreign key(categoria) references categoria(nome) ON UPDATE cascade,
	foreign key(forn_primario) references fornecedor(nif) ON UPDATE cascade
	--RI-RE3
);

create table fornece_sec(
	nif bigint not null ,
	ean bigint not null ,
	primary key(nif, ean),
	foreign key(nif) references fornecedor(nif) ON UPDATE cascade,
	foreign key(ean) references produto(ean) ON UPDATE cascade
	/*RI-EA4*/
);

create table corredor(
	nro int not null unique,
	largura int,
	primary key(nro)
);

create table prateleira(
	nro int not null,
	lado varchar(10) not null, 		/*esquerdo direito */
	altura varchar(10) not null, 	/* chao, medio, superior */
	primary key(nro, lado, altura),
	foreign key(nro) references corredor(nro) ON UPDATE cascade
);

create table planograma(
	ean bigint not null,
	nro int not null,
	lado varchar(10) not null, 		/* esquerdo direito */
	altura varchar(10) not null, 	/* chao, medio, superior */
	face int not null,
	unidades int not null,
	loc varchar(20) not null,
	primary key(ean, nro, lado, altura),
	foreign key(ean) references produto(ean) ON UPDATE cascade,
	foreign key(nro, lado, altura) references prateleira(nro, lado, altura) ON UPDATE cascade
);

create table evento_reposicao(
	operador varchar(255) not null,
	instante timestamp not null,
	primary key(operador, instante)
	/* RI_EA3 */
);

create table reposicao(
	ean bigint not null,
	nro int not null,
	lado varchar(10) not null, 		/* esquerdo, direito */
	altura varchar(10) not null, 	/* chao, medio, superior */
	operador varchar(255) not null,
	instante timestamp not null,
	unidades int not null,
	primary key(ean, nro, lado, altura, operador, instante),
	foreign key(ean, nro, lado, altura) references planograma(ean, nro, lado, altura) ON UPDATE cascade,
	foreign key(operador, instante) references evento_reposicao(operador, instante) ON UPDATE cascade
);
