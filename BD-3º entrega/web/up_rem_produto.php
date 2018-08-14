<html>
	<head>
		<meta charset="utf-8">
	</head>
 	<body>
		<?php
			$ean = $_REQUEST['ean'];
 			try{
	 			$host = "db.ist.utl.pt";
	 			$user ="ist181633";
		 		$password = "projBD";
	 			$dbname = $user;
	 			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
	 			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "DELETE FROM fornece_sec WHERE ean = '$ean';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");
	 			
	 			/*
	 			$sql_instante = "select instante
                                from reposicao natural join evento_reposicao
                                where ean = '$ean';";
                echo("<p>$sql_instante</p>");
                $db->query($sql_instante);
                $result_instante = $db->query($sql_instante);
                echo("<p> $result_instante<\p>");
                
                $sql_operador = "select operador
                                from reposicao natural join evento_reposicao
                                where ean = '$ean';";
                echo("<p>$sql_operador</p>");
                $db->query($sql_operador);
                $result_operador = $db->query($sql_operador);
                echo("<p> $result_operador<\p>");*/
                
                
	 			
	 			$sql = "DELETE FROM reposicao WHERE ean = '$ean';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");
	 			
	 			$sql = "DELETE FROM planograma WHERE ean = '$ean';";
	 			echo("<p>$sql</p>");
	 			$db->query($sql);
	 			$db->query("commit;");
	 			
	 			$sql = "DELETE FROM produto WHERE ean = '$ean';";
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
