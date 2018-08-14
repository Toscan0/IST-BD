<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
 		<h3>Altere a designação de um produto:</h3>
 		<form action="updateProduct.php" method="post">
			<?php
 				try{
		 			$host = "db.ist.utl.pt";
		 			$user ="ist181633";
		 			$password = "projBD";
		 			$dbname = $user;
		 			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		 			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		 			$sql = "SELECT ean, design, categoria, forn_primario, data 
		 					FROM produto
		 					ORDER BY ean;";

		 			$result = $db->query($sql);

		 			echo("<table border=\"1\" cellspacing=\"1\">\n");
		 			echo("<tr>\n");
						echo("<td>NOME</td>\n");
						echo("<td>DESIGN</td>\n");
						echo("<td>CATEGORIA</td>\n");
						echo("<td>FORN_PRIMARIO</td>\n");
						echo("<td>DATA</td>\n");
						echo("<td></td>\n");
					echo("</tr>\n");
		 			foreach($result as $row){
		 				echo("<tr>\n");
		 					echo("<td>{$row['ean']}</td>\n");
		 					echo("<td>{$row['design']}</td>\n");
							echo("<td>{$row['categoria']}</td>\n");
							echo("<td>{$row['forn_primario']}</td>\n");
							echo("<td>{$row['data']}</td>\n");
		 					echo("<td><input type=\"radio\" name=\"produto\" value=\"{$row['ean']}\"></td>\n");
		 				echo("</tr>\n"); 
					}
					echo("</table border>");
					
		 			$db = null;
	 			}
	 			catch (PDOException $e){
	 				echo("<p>ERROR: {$e->getMessage()}</p>");
	 			}
			?>
			<p>Nova Designacao: <input type="text" name="designacao"/></p>
			<p><input type="submit" value="Submit"/></p>
		</form>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>
