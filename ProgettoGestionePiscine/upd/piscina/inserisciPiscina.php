<HTML>
<head>
        <title>
        Gestione di piscine comunali
        </title>
        <link rel="stylesheet" href="../../lib/bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    </head>
    <body class="m-3">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="mainPage.php">GestionePiscine</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
    
                        <li class="nav-item">
                            <a class="nav-link" href="../../mainPage.php">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="../../tabelle.php">Tabelle</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link active" href="../../inserimenti.php">Inserimenti</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../viste.php">Visualizzazioni</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../query.php">Interrogazioni</a>
                        </li>
    
                    </ul>
                </div>          
        </nav>
        <?php
         session_start();
         $conn = pg_connect("host=localhost port=5432 dbname=GestionePiscine user=postgres password=postgres");
         
            if (!$conn) {
                echo 'Connessione al database fallita.';
                exit();
            }else{
                $nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
                $orarioapertura = isset($_POST['orarioApertura']) ? $_POST['orarioApertura'] : NULL;
                $orariochiusura = isset($_POST['orarioChiusura']) ? $_POST['orarioChiusura'] : NULL;
                $indirizzo = isset($_POST['indirizzo']) ? $_POST['indirizzo'] : NULL;
                $citta = isset($_POST['citta']) ? $_POST['citta'] : NULL;
                
                $query = "INSERT INTO piscina (nome, orarioapertura, orariochiusura, indirizzo, citta)
                            VALUES ('$nome', '$orarioapertura', '$orariochiusura', '$indirizzo', '$citta')";

                $result = pg_query($conn, $query);
                if($result){
                    echo("<br>Piscina inserita correttamente!<br><br>");
                } else{
                    echo("<br>Piscina NON inserita correttamente.<br><br>");
                }

                echo '<h3>Tabella Completa</h3>';
                $query = "  SELECT *
                                 FROM piscina
                            ";
                    
                    $result = pg_query($conn, $query);

                    if (!$result) {
                        echo "Errore.<br/>";
                        echo pg_last_error($conn);
                        exit();
                    }
                    else{
                        echo '<table id="tabellaPiscina" class="table table-bordered caption-top">';
                        echo '<caption class="text-center">Piscine</caption>';
                        echo '<thead class="table-light">';
                            echo '<tr>';
                                echo '<th scope="col">Nome</th>';
                                echo '<th scope="col">Orario apertura</th>';
                                echo '<th scope="col">Orario chiusura</th>';
                                echo '<th scope="col">indirizzo</th>';
                                echo '<th scope="col">Città</th>';
                                echo '<th scope="col">telefono</th>';
                            echo '</tr>';
                        echo '</thead>';  
                        echo '<tbody>';  
                        while ($row = pg_fetch_array($result)){
                            echo '<tr>';
                            echo '<td>'.$row['nome'].'</td>';
                            echo '<td>'.$row['orarioapertura'].'</td>';
                            echo '<td>'.$row['orariochiusura'].'</td>';
                            echo '<td>'.$row['indirizzo'].'</td>';
                            echo '<td>'.$row['citta'].'</td>';
                            echo '<td>'.$row['numerotelefono'].'</td>';
                            echo '</tr>';
                        };
                        echo '</tbody>';  
                       echo '</table>';
                    }
                    echo '<form method="POST" action="modpiscina.php">  
                        <input type="submit" class="btn btn-light" value="⬅ Torna Indietro"/>  
                    </form>';
                }
            
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
</HTML>