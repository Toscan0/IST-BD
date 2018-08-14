<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
 			$superCat = $_REQUEST['superCat'];
 			try{
 				$host = "db.ist.utl.pt";
				$user ="ist181633";
 				$password = "projBD";
 				$dbname = $user;
 				$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 				
 				$sql = "INSERT INTO categoria 
 						SELECT ('$superCat')
						WHERE NOT EXISTS(	SELECT * 
											FROM categoria 
											WHERE nome = '$superCat');";
 				echo("<p>$sql</p>");
 				$db->query($sql);
 				$db->query("commit;");
 				
 				$sql = "INSERT INTO super_categoria SELECT ('$superCat')
						WHERE NOT EXISTS(
							SELECT * 
							FROM super_categoria 
							WHERE nome = '$superCat');";
 				echo("<p>$sql</p>");
 				$db->query($sql);
				$db->query("commit;");

 				echo("<td><a href=\"categorias.php\">Voltar para Categorias</a></td>\n");
 				$db->query($sql);
 				$db = null;
 			}
 			catch (PDOException $e){
 				echo("<p>ERROR: {$e->getMessage()}</p>");
			}
		?>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>