<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
 		<h3>Categorias</h3>
 		<form action="updateListSub.php" method="post">
			<?php
 				try{
 					//ligacao a base de dados
		 			$host = "db.ist.utl.pt";
		 			$user ="ist181633";
		 			$password = "projBD";
		 			$dbname = $user;
		 			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		 			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		 			//querie para ir a base de dados buscar todos os nomes das super categorias
		 			$sql = "SELECT nome 
		 					FROM super_categoria
		 					ORDER BY nome;";
		 			$result = $db->query($sql);

		 			//tabela que mostra estes nomes
		 			//a tabela tem radio buttons para o utilizador escolher uma das categorias
		 			echo("<table border=\"1\" cellspacing=\"1\">\n");
		 			echo("<tr>\n");
						echo("<td>NOME</td>\n");
						echo("<td></td>\n");
					echo("</tr>\n");
		 			foreach($result as $row){
		 				echo("<tr>\n");
		 					echo("<td>{$row['nome']}</td>\n");
		 					echo("<td><input type=\"radio\" name=\"superCat\" value=\"{$row['nome']}\"></td>\n");
		 				echo("</tr>\n"); 
					}
					echo("</table border>");
					
		 			$db = null;
	 			}
	 			catch (PDOException $e){
	 				echo("<p>ERROR: {$e->getMessage()}</p>");
	 			}
			?>
			<p><input type="submit" value="Submit"/></p>
		</form>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>
