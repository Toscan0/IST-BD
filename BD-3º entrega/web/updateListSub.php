<html>
    <head>
        <meta charset="utf-8">
    </head>
	<body>
		<?php
            /*É  funcao uma recursiva que imprime as subcategorias de todas as categorias e
            é chamada recursivamente em cada subcategoria para também imprimir as subcategorias dela, 
            caso ela tenha*/
			function printSub($row){
 				try{
                    //ligacao a base de dados
                    $host = "db.ist.utl.pt";
                    $user ="ist181633";
                    $password = "projBD";
                    $dbname = $user;
                    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    //ve as categorias simples, que constituem a super categoria selecionada
                    $sql = "SELECT categoria 
                            FROM constituida 
                            WHERE super_categoria = '{$row}';";
                    $db->query($sql);
 				
                    $result = $db->query($sql);
                    foreach ($result as $row){
                            echo ("<p> {$row['categoria']}</p>");
                            //chama a funcao outra vez para imprimir as sub categorias desta categoria
                            printSub($row['categoria']);
                    }
                }
                catch (PDOException $e){
                    echo("<p>ERROR: {$e->getMessage()}</p>");
                }
 			}
 			$superCat = $_REQUEST['superCat'];
 			try{
                //ligacao a base de dados
 				$host = "db.ist.utl.pt";
 				$user ="ist181633";
 				$password = "projBD";
 				$dbname = $user;
 				$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //ve as categorias simples, que constituem a super categoria selecionada pelo utilizador
 				$sql = "SELECT categoria 
 						FROM constituida 
 						WHERE super_categoria = '$superCat';";
 				$db->query($sql);
 				$result = $db->query($sql);


				echo("<p><b>Sub-Categorias:</b></p>\n");
 				foreach ($result as $row) {
                        //imprime as categorias que constituem a super categoria
		 				echo ("<p> {$row['categoria']}</p>");
                        //ve se estas categorias da super categoria selecionada tem sub-categorias
		 				printSub($row['categoria']);
 				}
				$db = null;
 			}
	 		catch (PDOException $e){
 				echo("<p>ERROR: {$e->getMessage()}</p>");
			}
		?>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>
