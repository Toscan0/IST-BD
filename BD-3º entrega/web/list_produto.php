<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
		<?php
 			try{
			$host = "db.ist.utl.pt";
 			$user ="ist181633";
 			$password = "projBD";
 			$dbname = $user;
			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$produto = $_REQUEST['produto'];
			$sql = "SELECT operador, instante, unidades 
					FROM reposicao 
					WHERE ean='$produto'
					ORDER BY operador;";
			$result = $db->query($sql);

			echo("<table border=\"1\">\n");
			echo("<tr><td>Operador</td><td>Instante</td><td>Unidades</td></tr>\n");
			foreach($result as $row){
				echo("<tr><td>");
			 	echo($row['operador']);
			 	echo("</td><td>");
			 	echo($row['instante']);
			 	echo("</td><td>");
			 	echo($row['unidades']);
			 	echo("</td></tr>\n");
			}
			 	echo("</table>\n");

			 	$db = null;
 			}
 			catch (PDOException $e){
 				echo("<p>ERROR: {$e->getMessage()}</p>");
 			}
		?>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>