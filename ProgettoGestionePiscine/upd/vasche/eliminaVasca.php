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
                $nomepiscina = $_POST['selezionaPiscina'];
                $id = $_POST['selezionaVasca'];
                $query = "DELETE FROM vasca WHERE nomepiscina = '$nomepiscina' AND id = '$id'";

                $result = pg_query($conn, $query);
                if($result){
                    echo("<br>Vasca eliminata con successo!<br><br>");
                } else{
                    echo("<br>Vasca NON eliminato correttamente.<br><br>");
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
    </body>
</HTML>