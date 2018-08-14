<html>
    <head>
		<meta charset="utf-8">
	</head>
 	<body>
 		<h3>Categorias</h3>
 		<form action="updateSimples.php" method="post">
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
                    
                    echo("<td>Super Categoria:</td>\n");
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
			<p>Categoria Simples: <input type="text" name="catSimples"/></p>
			<p><input type="submit" value="Submit"/></p>
		</form>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>
