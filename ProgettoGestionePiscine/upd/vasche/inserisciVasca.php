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
                //print_r($_POST);
                $id = isset($_POST['id']) ? $_POST['id'] : NULL;
                $nomepiscina = $_POST['selezionaPiscina'];
                $tipologia = isset($_POST['tipologia']) ? $_POST['tipologia'] : NULL;               
                $numcorsie = isset($_POST['numcorsie']) ? $_POST['numcorsie'] : NULL;
                $locazione = $_POST['locazione'];
                $dataapertura = is_null($_POST['dataApertura']) ? $_POST['dataApertura'] :  "2023-09-01";
                $datachiusura = is_null($_POST['dataChiusura']) ? $_POST['dataChiusura'] : "2024-06-25";
                
                $query = "INSERT INTO vasca (id, nomepiscina, tipologia, numcorsie, locazione, dataapertura, datachiusura)
                            VALUES ('$id', '$nomepiscina', '$tipologia', '$numcorsie', '$locazione', '$dataapertura', '$datachiusura')";

                print_r($query);
                $result = pg_query($conn, $query);
                if($result){
                    echo("<br>Vasca inserita correttamente!<br><br>");
                } else{
                    echo("<br>Vasca NON inserita correttamente.<br><br>");
                }

                echo '<h3>Tabella Completa</h3>';
                $query = "  SELECT *
                                 FROM vasca 
                            ";
                    
                    $result = pg_query($conn, $query);

                    if (!$result) {
                        echo "Errore.<br/>";
                        echo pg_last_error($conn);
                        exit();
                    }
                    else{
                        echo '<table id="tabellaPiscina" class="table table-bordered caption-top">';
                        echo '<caption class="text-center">Vasche</caption>';
                        echo '<thead class="table-light">';
                            echo '<tr>';
                                echo '<th scope="col">Id</th>';
                                echo '<th scope="col">Nome piscina</th>';
                                echo '<th scope="col">Tipologia</th>';
                                echo '<th scope="col">numero di Corsie</th>';
                                echo '<th scope="col">locazione</th>';
                                echo '<th scope="col">data apertura</th>';
                                echo '<th scope="col">data chiusura</th>';
                            echo '</tr>';
                        echo '</thead>';  
                        echo '<tbody>';  
                        while ($row = pg_fetch_array($result)){
                            echo '<tr>';
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['nomepiscina'].'</td>';
                            echo '<td>'.$row['tipologia'].'</td>';
                            echo '<td>'.$row['numcorsie'].'</td>';
                            echo '<td>'.$row['locazione'].'</td>';
                            echo '<td>'.$row['dataapertura'].'</td>';
                            echo '<td>'.$row['datachiusura'].'</td>';
                            echo '</tr>';
                        };
                        echo '</tbody>';  
                       echo '</table>';
                    }
                    echo '<form method="POST" action="modvasca.php">  
                        <input type="submit" class="btn btn-light" value="⬅ Torna Indietro"/>  
                    </form>';
                }
            
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
</HTML>