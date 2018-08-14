<html>
    <head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
 			$superCat = $_REQUEST['superCat'];
 			$catSimples = $_REQUEST['catSimples'];
 			try{
 				$host = "db.ist.utl.pt";
 				$user ="ist181633";
 				$password = "projBD";
 				$dbname = $user;
 				$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 				$sql = "INSERT INTO categoria 
 						SELECT ('$catSimples')
						WHERE NOT EXISTS(	SELECT * 
											FROM categoria 
											WHERE nome = '$catSimples');";
 				echo("<p>$sql</p>");
 				$db->query($sql);
 				$db->query("commit;");

 				$sql = "INSERT INTO categoria 
 						SELECT ('$superCat')
						WHERE NOT EXISTS (  SELECT * 
											FROM categoria 
											WHERE nome = '$superCat');";
 				echo("<p>$sql</p>");
 				$db->query($sql);
 				$db->query("commit;");
 
 				$sql = "INSERT INTO super_categoria 
 						SELECT ('$superCat')
						WHERE NOT EXISTS (	SELECT * 
											FROM super_categoria 
											WHERE nome = '$superCat');";
				echo("<p>$sql</p>");
 				$db->query($sql);
 				$db->query("commit;");

 				$sql = "INSERT INTO categoria_simples 
 						SELECT ('$catSimples')
						WHERE NOT EXISTS (	SELECT * 
											FROM categoria_simples 
											WHERE nome = '$catSimples');";
 				echo("<p>$sql</p>");
 				$db->query($sql);
 				$db->query("commit;");

 				$sql = "INSERT INTO constituida 
 						SELECT '$superCat','$catSimples'
 						WHERE NOT EXISTS (	SELECT *
 											FROM constituida
 											WHERE super_categoria = '$superCat' 
 												AND categoria = '$catSimples');";
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
 	</body>
</html>
