<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
		<?php
 			$ean = $_REQUEST['produto'];
 			$design = $_REQUEST['designacao'];
 			try{
 				$host = "db.ist.utl.pt";
				$user ="ist181633";
 				$password = "projBD";
 				$dbname = $user;
 				$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 				$sql = "UPDATE produto set design = '$design' WHERE ean='$ean';";
 				echo("<p>$sql</p>");
 				$db->query($sql);
 				$db->query("commit;");

 				$db = null;
			}
 			catch (PDOException $e){
				echo("<p>ERROR: {$e->getMessage()}</p>");
			}
		?>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>