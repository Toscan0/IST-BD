<html>
    <head>
		<meta charset="utf-8">
	</head>
	<body>
            <?php
                $ean2 = $_REQUEST['ean'];
                $nif = $_REQUEST['nif_forn'];
                
                try{
                    $host = "db.ist.utl.pt";
                    $user ="ist181633";
                    $password = "projBD";
                    $dbname = $user;
                    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    /*echo($ean2);
                    echo("<br>");
                    echo($nif);*/
                    
                    $sql = "INSERT INTO fornece_sec 
 						SELECT '$nif', '$ean2';";
 						
                    echo("<p>$sql</p>");
                    $db->query($sql);
                    $db->query("commit;");
                    
                    echo("<p>Se Desejas adicionar mais fornecedores secundarios:</p>");
                    echo("<form action=\"produto_forn_sec.php\" method=\"post\">");
                        echo("<p>EAN produto: <input type=\"text\" value='$ean2' name=\"produto_ean\"/></p>");
                        echo("<p><input type=\"submit\" value=\"Adicionar forn_sec\"/></p>");
                    echo("</form>");
                
                    $db = null;
                }
                catch (PDOException $e){
                    echo("<p>ERROR: {$e->getMessage()}</p>");
                }
            ?>
		</form>
		<a href="menuInicial.php">Voltar ao Menu</a>
 	</body>
</html>
