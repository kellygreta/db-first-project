<HTML>
<head>
        <title>
        Gestione di piscine comunali
        </title>
        <link rel="stylesheet" href="../../lib/bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    </head>
    <body class="m-3">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="../../mainPage.php">GestionePiscine</a>
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
                $id = isset($_POST['id']) ? $_POST['id'] : NULL;
                $costo = isset($_POST['costo']) ? $_POST['costo'] : NULL;
                $tipologia = isset($_POST['tipologia']) ? $_POST['tipologia'] : NULL;
                $maxpartecipanti = isset($_POST['maxpartecipanti']) ? $_POST['maxpartecipanti'] : NULL;
                $minpartecipanti = isset($_POST['minpartecipanti']) ? $_POST['minpartecipanti'] : NULL;
                
                $query = "INSERT INTO corso (id, costo, tipologia, maxpartecipanti, minpartecipanti)
                            VALUES ('$id', '$costo', '$tipologia', '$maxpartecipanti', '$minpartecipanti')";

                $result = pg_query($conn, $query);
                if($result){
                    echo("<br>Corso inserito correttamente!<br><br>");
                } else{
                    echo("<br>Corso NON inserito correttamente.<br><br>");
                }

                $query = "  SELECT * FROM corso";
                $result = pg_query($conn, $query);

                if (!$result) {
                    echo "Errore.<br/>";
                    echo pg_last_error($conn);
                    exit();
                }else{

                    echo '<table id="tabellaCorso" class="table table-bordered caption-top">';
                        echo '<caption class="text-center">Corsi</caption>';
                        echo '<thead class="table-light">';
                            echo '<tr>';
                                echo '<th scope="col">id</th>';
                                echo '<th scope="col">costo</th>';
                                echo '<th scope="col">tipologia</th>';
                                echo '<th scope="col">livello</th>';
                                echo '<th scope="col">max numero di partecipanti</th>';
                                echo '<th scope="col">min numero di partecipanti</th>';
                            echo '</tr>';
                        echo '</thead>';  
                        echo '<tbody>';  
                        while ($row = pg_fetch_array($result)){
                            echo '<tr>';
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['costo'].'</td>';
                            echo '<td>'.$row['tipologia'].'</td>';
                            echo '<td>'.$row['livello'].'</td>';
                            echo '<td>'.$row['maxpartecipanti'].'</td>';
                            echo '<td>'.$row['minpartecipanti'].'</td>';
                            echo '</tr>';
                        };
                        echo '</tbody>';  
                    echo '</table>';
                }
                    echo '<form method="POST" action="modcorso.php">  
                        <input type="submit" class="btn btn-light" value="⬅ Torna Indietro"/>  
                    </form>';
                }
            
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
</HTML>