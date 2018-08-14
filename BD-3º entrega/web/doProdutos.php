<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
 		<h3>Produtos</h3>
		<?php
 			try{
	 			$host = "db.ist.utl.pt";
	 			$user ="ist181633";
		 		$password = "projBD";
	 			$dbname = $user;
	 			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
	 			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 			$sql = "SELECT nome 
	 					FROM categoria
	 					ORDER BY nome;";

	 			$result = $db->query($sql);

				echo("<td><a href=\"produtosAdd.php\">Adicionar um Produto</a></td>\n");
				echo("<p></p>\n");
				echo("<td><a href=\"produtosRem.php\">Remover um Produto</a></td>\n");
			
				echo("<p></p>\n");
				echo("<td><a href=\"menuInicial.php\">Voltar ao Menu</a></td>\n");
	 			
	 			$db = null;
 			}
 			catch (PDOException $e){
 				echo("<p>ERROR: {$e->getMessage()}</p>");
 			}
		?>
 	</body>
</html>
