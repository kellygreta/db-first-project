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
                $id = isset($_POST['id']) ? $_POST['id'] : NULL;
                $anno = isset($_POST['anno']) ? $_POST['anno'] : NULL;
                $orarioinizio = isset($_POST['orarioInizio']) ? $_POST['orarioInizio'] :  NULL;
                $orariofine = isset($_POST['orarioFine']) ? $_POST['orarioFine'] : NULL;
                $nomepiscinavasca = $_POST['selezionaPiscina'];
                $idvasca = $_POST['selezionaVasca'];
                $corsia = isset($_POST['corsia']) ? $_POST['corsia'] : NULL;               
                $idcorso = $_POST['selezionaCorso'];
                $cfistruttore = $_POST['selezionaIstruttore'];
                
                $query = "INSERT INTO edizione (id, anno,  orarioinizio, orariofine, nomepiscinavasca, idvasca, corsia, idcorso, cfistruttore)
          VALUES ('$id', '$anno', '$orarioinizio', '$orariofine', '$nomepiscinavasca', '$idvasca', '$corsia', '$idcorso', '$cfistruttore')";

                print_r($query);
                $result = pg_query($conn, $query);
                if($result){
                    echo("<br>Edizione inserita correttamente!<br><br>");
                } else{
                    echo("<br>Edizione NON inserita correttamente.<br><br>");
                }

                echo '<h3>Tabella Completa</h3>';
                $query = "  SELECT *
                                 FROM edizione 
                            ";
                    
                    $result = pg_query($conn, $query);

                    if (!$result) {
                        echo "Errore.<br/>";
                        echo pg_last_error($conn);
                        exit();
                    }else{
    
                        echo '<table id="tabellaEdizione" class="table table-bordered caption-top">';
                            echo '<caption class="text-center">Edizioni</caption>';
                            echo '<thead class="table-light">';
                                echo '<tr>';
                                    echo '<th scope="col">id</th>';
                                    echo '<th scope="col">anno</th>';
                                    echo '<th scope="col">orarioInizio</th>';
                                    echo '<th scope="col">orarioFine</th>';
                                    echo '<th scope="col">nomePiscinaVasca</th>';
                                    echo '<th scope="col">idVasca</th>';
                                    echo '<th scope="col">corsia</th>';
                                    echo '<th scope="col">idCorso</th>';
                                    echo '<th scope="col">cfIstruttore</th>';
                                echo '</tr>';
                            echo '</thead>';  
                            echo '<tbody>';  
                            while ($row = pg_fetch_array($result)){
                                echo '<tr>';
                                echo '<td>'.$row['id'].'</td>';
                                echo '<td>'.$row['anno'].'</td>';
                                echo '<td>'.$row['orarioinizio'].'</td>';
                                echo '<td>'.$row['orariofine'].'</td>';
                                echo '<td>'.$row['nomepiscinavasca'].'</td>';
                                echo '<td>'.$row['idvasca'].'</td>';
                                echo '<td>'.$row['corsia'].'</td>';
                                echo '<td>'.$row['idcorso'].'</td>';
                                echo '<td>'.$row['cfistruttore'].'</td>';
                                echo '</tr>';
                            };
                            echo '</tbody>';  
                        echo '</table>';
                    }
                    echo '<form method="POST" action="modedizione.php">  
                        <input type="submit" class="btn btn-light" value="⬅ Torna Indietro"/>  
                    </form>';
                }
            
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
</HTML>