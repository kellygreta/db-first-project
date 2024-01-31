<html>
    <head>
        <title>Risultato</title>  
        <link rel="stylesheet" href="../lib/bootstrap-5.0.2-dist/css/bootstrap.min.css" /> 
    </head>
    <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="../mainPage.php">GestionePiscine</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
    
                        <li class="nav-item">
                            <a class="nav-link" href="../mainPage.php">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="../tabelle.php">Tabelle</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="../inserimenti.php">Inserimenti</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="../viste.php">Visualizzazioni</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../query.php">Interrogazioni</a>
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

                $piscina = $_POST['selezionaPiscina'];
                $codice = $_POST['selezionaCodice'];
               
                echo '<h3>Risultato</h3>';
                echo "<b>NOME PISCINA:</b> ";
                echo $piscina;
                echo ' ';
                echo "<b>CODICE:</b> ";
                echo $codice;

                
                $query = "  SELECT DISTINCT *        
                            FROM iscrizione JOIN edizione ON idEdizione = id
                            WHERE edizione.nomePiscinaVasca = '".$piscina."' AND iscrizione.codicePersona = '".$codice."'
                        ";
                    
                $result = pg_query($conn, $query);

                if (!$result) {
                    echo "Errore.<br/>";
                    echo pg_last_error($conn);
                    exit();
                }else{

                    echo '<table id="tabellaCorso" class="table table-bordered caption-top">';
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
                    
                echo '<form method="POST" action="../viste.php">  
                        <input type="submit" class="btn btn-light" value="⬅ Torna Indietro"/>  
                    </form>';
            }           
        ?>
    </body>
<html>