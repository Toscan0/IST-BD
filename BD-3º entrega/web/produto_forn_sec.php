<html>
    <head>
		<meta charset="utf-8">
	</head>
	<body>
        <h3>Adicionar fornecedor secundario ao Produto:</h3>
        <form action="up_prod_forn_sec.php" method="post">
            <?php
                $ean1 = $_REQUEST['produto_ean'];
 			
                try{
                    $host = "db.ist.utl.pt";
                    $user ="ist181633";
                    $password = "projBD";
                    $dbname = $user;
                    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    echo("<p>EAN produto: <input type=\"text\" value='$ean1' name=\"ean\"/></p>");
                    
                    $sql1 = "SELECT nif, nome 
                            FROM fornecedor
                            ORDER BY nif;";
                    $db->query($sql1);
                    $result1 = $db->query($sql1);
                    $db->query("commit;");

                    echo("Fornecedor:");
                    echo("<table border=\"1\" cellspacing=\"1\">\n");
                    echo("<tr>\n");
                        echo("<td>NIF</td>\n");
                        echo("<td>NOME</td>\n");
                        echo("<td></td>\n");
                    echo("</tr>\n");
                    foreach($result1 as $row1){
                        echo("<tr>\n");
                            echo("<td>{$row1['nif']}</td>\n");
                            echo("<td>{$row1['nome']}</td>\n");
                            echo("<td><input type=\"radio\" name=\"nif_forn\" value=\"{$row1['nif']}\"></td>\n");
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
