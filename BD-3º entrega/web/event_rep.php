<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
 		<h3>Selecione o EAN do produto a listar</h3>
 		<form action="list_produto.php" method="post">
			<?php
 				try{
		 			$host = "db.ist.utl.pt";
		 			$user ="ist181633";
		 			$password = "projBD";
		 			$dbname = $user;
		 			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
		 			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		 			$sql = "SELECT ean
		 					FROM reposicao
		 					GROUP BY ean
		 					ORDER BY ean;";

		 			$result = $db->query($sql);

		 			echo("<table border=\"1\" cellspacing=\"1\">\n");
		 			echo("<tr>\n");
						echo("<td>EAN</td>\n");
						echo("<td></td>\n");
					echo("</tr>\n");
		 			foreach($result as $row){
		 				echo("<tr>\n");
		 					echo("<td>{$row['ean']}</td>\n");
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
			<p><input type="submit" value="Submit"/></p>
		</form>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>
