-- A) Qual o nome do fornecedor que que forneceu o maior numero de categorias
-- seleciona o nome
select nome
from fornecedor
where nif = (select forn_primario --ve o nif que correponde ao count
            from produto
            group by forn_primario
            having count(*) =(  select MAX(y.num)  --ve qual e o maior count
                                from (select count(*) as num
                                from produto as x
                                group by forn_primario) y));
                                
-- B) Qais os fornecedores primarios(nome e nif) que forneceram produtos de todas as categorias simples
select fornecedor.nome, fornecedor.nif
from categoria, produto, categoria_simples, fornecedor
where categoria.nome = produto.categoria and categoria.nome = categoria_simples.nome and fornecedor.nif = produto.forn_primario;

-- C) Quais os produtos(ean) que nunca foram repostos
select ean
from produto
where produto.ean  NOT IN(  select ean 
                            from reposicao)
group by ean;

-- D) Quais os produtos(ean) com um número de fornecedores secundarios superior a 10
select produto.ean
from produto natural join fornece_sec
group by ean
having count(ean) > 10;

-- E) Quais os produtos(ean) que foram repostos sempre pelo mesmo operador
select produto1.ean
from produto as produto1
where 1 = (select count(distinct evento_reposicao.operador)
			from evento_reposicao natural join reposicao natural join produto as produto2
			where produto1.ean = produto2.ean);
