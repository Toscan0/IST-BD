<html>
    <head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
 			$ean = $_REQUEST['EANproduto'];
 			$design = $_REQUEST['Design'];
 			$cat = $_REQUEST['categoria'];
 			$forn = $_REQUEST['nome_forn'];
 			$data = $_REQUEST['data'];
 			try{
 				$host = "db.ist.utl.pt";
 				$user ="ist181633";
 				$password = "projBD";
 				$dbname = $user;
 				$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO produto 
 						SELECT '$ean', '$design', '$cat', '$forn', '$data'
 						WHERE NOT EXISTS (	SELECT *
 											FROM produto
 											WHERE ean = $ean);";
 				echo("<p>$sql</p>");
 				$db->query($sql);
 				$db->query("commit;");
                
                echo("<form action=\"produto_forn_sec.php\" method=\"post\">");
                    echo("<p>EAN produto: <input type=\"text\" value='$ean' name=\"produto_ean\"/></p>");
                    echo("<p><input type=\"submit\" value=\"Adicionar forn_sec\"/></p>");
                echo("</form>");
				$db = null;
 			}
	 		catch (PDOException $e){
 				echo("<p>ERROR: {$e->getMessage()}</p>");
			}
		?>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>
