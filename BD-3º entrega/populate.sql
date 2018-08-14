-- catergotia(nome) --
insert into categoria values ('Carne');
insert into categoria values ('Pronto-a-comer');
insert into categoria values ('Higiene');
insert into categoria values ('Enlatados');
insert into categoria values ('Pizza');
insert into categoria values ('Shampoo');
insert into categoria values ('Salsichas');

-- categoria simples(nome) --
insert into categoria_simples values ('Enlatados');
insert into categoria_simples values ('Pizza');
insert into categoria_simples values ('Shampoo');
insert into categoria_simples values ('Salsichas');
	
-- super_categoria(nome) --
insert into super_categoria values ('Carne');
insert into super_categoria values ('Pronto-a-comer');
insert into super_categoria values ('Higiene');
insert into super_categoria values ('Enlatados');

-- constituida(super_categoria, categoria) --
insert into constituida values ('Carne', 'Enlatados');
insert into constituida values ('Pronto-a-comer', 'Pizza');
insert into constituida values ('Higiene', 'Shampoo');
insert into constituida values ('Enlatados', 'Salsichas');

-- fornecedor(nif, nome) --
insert into fornecedor values (111111111, 'Tiago');
insert into fornecedor values (222222222, 'Bea');
insert into fornecedor values (333333333, 'Mara');
insert into fornecedor values (444444444, 'Antonio');
insert into fornecedor values (555555555, 'Jose');
insert into fornecedor values (666666666, 'Pedro');
insert into fornecedor values (777777777, 'Pedro1');
insert into fornecedor values (888888888, 'Pedro2');
insert into fornecedor values (999999999, 'Pedro3');
insert into fornecedor values (101010101, 'Pedro4');
insert into fornecedor values (121212121, 'Pedro5');
insert into fornecedor values (131313131, 'Pedro6');
insert into fornecedor values (141414141, 'Pedro7');
insert into fornecedor values (151515151, 'Pedro8');
insert into fornecedor values (161616161, 'Pedro9');
insert into fornecedor values (171717171, 'Pedro10');
insert into fornecedor values (181818181, 'Pedro11');


-- produto(ean, design, categoria, forn_prim, data) --
insert into produto values (1111111111111, 	'A carne mais tenra',		     'Carne', 111111111, '2017-01-01');
insert into produto values (2222222222222,					NULL, 	'Pronto-a-comer', 222222222, '2017-01-02');
insert into produto values (3333333333333, 		   	'Necessario',		   'Higiene', 333333333, '2017-01-03');
insert into produto values (4444444444444, 		   	'Saborosos' ,        'Enlatados', 444444444, '2017-01-04');
insert into produto values (5555555555555, 		'Sabor Italiano',            'Pizza', 555555555, '2017-01-05');
insert into produto values (6666666666666, 				 'Suave',          'Shampoo', 666666666, '2017-01-06');
insert into produto values (7777777777777,	'A carne mais tenra',            'Carne', 555555555, '2017-01-07');

-- fornece_sec(nif, ean) --
insert into fornece_sec values (111111111, 1111111111111);
insert into fornece_sec values (222222222, 4444444444444);
insert into fornece_sec values (333333333, 5555555555555);
insert into fornece_sec values (444444444, 2222222222222);
insert into fornece_sec values (777777777, 2222222222222);
insert into fornece_sec values (888888888, 2222222222222);
insert into fornece_sec values (999999999, 2222222222222);
insert into fornece_sec values (101010101, 2222222222222);
insert into fornece_sec values (121212121, 2222222222222);
insert into fornece_sec values (131313131, 2222222222222);
insert into fornece_sec values (141414141, 2222222222222);
insert into fornece_sec values (151515151, 2222222222222);
insert into fornece_sec values (161616161, 2222222222222);
insert into fornece_sec values (171717171, 2222222222222);
insert into fornece_sec values (181818181, 2222222222222);
insert into fornece_sec values (111111111, 6666666666666);
insert into fornece_sec values (222222222, 7777777777777);
insert into fornece_sec values (222222222, 3333333333333);

-- corredor(nro ,largura) --
insert into corredor values (1, 2);
insert into corredor values (2, 2);
insert into corredor values (3, 2);
insert into corredor values (4, 4);

-- prateleira(nro, lado, altura) --
insert into prateleira values (1, 'esquerdo', 'baixo');
insert into prateleira values (2, 'esquerdo', 'chao');
insert into prateleira values (3, 'direito', 'medio');
insert into prateleira values (4, 'direito', 'superior');

-- planograma(ean, nro, lado, altura, face, unidades, loc) --
insert into planograma values (1111111111111, 1, 'esquerdo', 'baixo', 2, 8, '1');
insert into planograma values (4444444444444, 2, 'esquerdo', 'chao', 3, 5, '5');
insert into planograma values (5555555555555, 3, 'direito', 'medio', 5, 7, '9');
insert into planograma values (2222222222222, 4, 'direito', 'superior', 6, 2, '8');

-- evento_reposicao(operador, instante) --
insert into evento_reposicao values ('Joao', '2017-05-01 10:43:41');
insert into evento_reposicao values ('Daniel', '2016-05-01 11:44:42');
insert into evento_reposicao values ('Goncalo', '2017-05-01 20:43:41');
insert into evento_reposicao values ('Joana', '2016-05-01 11:00:42');

insert into evento_reposicao values ('Joao', '2017-05-01 10:47:48');
insert into evento_reposicao values ('Goncalo', '2016-05-01 12:42:05');
	
-- reposicao(ean, nro, lado, altura, operador, instate, unidades) --
insert into reposicao values (1111111111111, 1, 'esquerdo', 'baixo', 'Joao', '2017-05-01 10:43:41', 8);
insert into reposicao values (4444444444444, 2, 'esquerdo', 'chao', 'Daniel', '2016-05-01 11:44:42', 5);
insert into reposicao values (5555555555555, 3, 'direito', 'medio', 'Goncalo', '2017-05-01 20:43:41', 7);
insert into reposicao values (2222222222222, 4, 'direito', 'superior', 'Joana', '2016-05-01 11:00:42', 2);
insert into reposicao values (1111111111111, 1, 'esquerdo', 'baixo', 'Joao', '2017-05-01 10:47:48', 10);
insert into reposicao values (4444444444444, 2, 'esquerdo', 'chao', 'Goncalo', '2016-05-01 12:42:05', 2);
