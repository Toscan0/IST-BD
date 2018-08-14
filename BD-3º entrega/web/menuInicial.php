<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
 		<h3 style="text-align:center;">Projeto BD-3º Entrega</h3>
 		<h3 style="text-align:center;">Grupo 34</h3>
 		<h3>Menu Inicial</h3>
		<?php
 			try{
 				$host = "db.ist.utl.pt";
 				$user ="ist181633";
 				$password = "projBD";
 				$dbname = $user;
				$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


				echo("<p></p>\n");
				echo("<td><a href=\"categorias.php\">Adicionar/Remover Categorias</a></td>\n");
				echo("<p></p>\n");
				echo("<td><a href=\"doProdutos.php\">Inserir/Remover um produto</a></td>\n");
				echo("<p></p>\n");
				echo("<td><a href=\"event_rep.php\">Listar Eventos de Reposicao</a></td>\n");
				echo("<p></p>\n");
				echo("<td><a href=\"changeProduto.php\">Alterar Designacao de um produto</a></td>\n");
				echo("<p></p>\n");
				echo("<td><a href=\"listaSub.php\">Listar sub-categorias</a></td>\n");

 				$db = null;
 			}
 			catch (PDOException $e){
 				echo("<p>ERROR: {$e->getMessage()}</p>");
 			}
		?>
 	</body>
</html>
