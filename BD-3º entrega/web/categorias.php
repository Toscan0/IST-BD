<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
 		<h3>Categorias</h3>
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

				echo("<td><a href=\"addCategoria.php\">Adicionar uma Categoria</a></td>\n");
				echo("<p></p>\n");
				echo("<td><a href=\"delCategoria.php\">Remover uma Categoria</a></td>\n");
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