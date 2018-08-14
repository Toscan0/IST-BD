<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
		<?php
			$cat = $_REQUEST['cat'];
 			try{
	 			$host = "db.ist.utl.pt";
	 			$user ="ist181633";
	 			$password = "projBD";
	 			$dbname = $user;
	 			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
	 			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 			$sql = "UPDATE produto set categoria = NULL WHERE categoria='$cat';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");



	 			$sql = "DELETE FROM constituida WHERE categoria = '$cat';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
				$db->query("commit;");

	 			$sql = "DELETE FROM constituida WHERE super_categoria = '$cat';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");

	 			$sql = "DELETE FROM super_categoria WHERE nome = '$cat';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");

				$sql = "DELETE FROM categoria_simples WHERE nome = '$cat';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");

	 			$sql = "DELETE FROM categoria WHERE nome = '$cat';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");
	 

	 			echo("<td><a href=\"categorias.php\">Voltar para Categorias</a></td>\n");
	 			$db = null;
 			}
 			catch (PDOException $e){
 				echo("<p>ERROR: {$e->getMessage()}</p>");
			}
		?>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>