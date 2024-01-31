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

                $selezione = $_POST['selezionaPiscina'];
                $anno = isset($_POST['anno']) ? $_POST['anno'] : NULL;
               
                echo '<h3>Risultato</h3>';
                echo "<b>NOME PISCINA:</b> ";
                echo $selezione;
                echo ' ';
                echo "<b>ANNO:</b> ";
                echo $anno;


                //DIRIGENTE
                $query = "  SELECT DISTINCT *
                            FROM responsabile  JOIN dirigenza ON cf = cfresponsabile 
                            WHERE dirigenza.nomePiscina = '".$selezione."' AND dirigenza.anno = '$anno'
                        ";
                    
                $result = pg_query($conn, $query);

                if (!$result) {
                    echo "Errore.<br/>";
                    echo pg_last_error($conn);
                    exit();
                }
                else{
                    echo '<table id="tabellaResponsabili" class="table table-bordered caption-top">';
                        echo '<caption class="text-center">Responsabili</caption>';
                        echo '<thead class="table-light">';
                            echo '<tr>';
                                echo '<th scope="col">cf</th>';
                                echo '<th scope="col">Nome</th>';
                                echo '<th scope="col">Cognome</th>';
                                echo '<th scope="col">Data nascita</th>';
                            echo '</tr>';
                        echo '</thead>';  
                        echo '<tbody>';  
                        while ($row = pg_fetch_array($result)){
                            echo '<tr>';
                            echo '<td>'.$row['cf'].'</td>';
                            echo '<td>'.$row['nome'].'</td>';
                            echo '<td>'.$row['cognome'].'</td>';
                            echo '<td>'.$row['datanascita'].'</td>';
                            echo '</tr>';
                        };
                        echo '</tbody>';  
                       echo '</table>';
                }

                //ISTRUTTORE TITOLARE
                $query = "SELECT  *
                    FROM istruttore JOIN assunzione ON cf = cfIstruttore
                    WHERE assunzione.nomePiscina = '".$selezione."' AND EXTRACT(YEAR FROM assunzione.dataInizio) = '$anno'
                ";

                $result = pg_query($conn, $query);

                if (!$result) {
                    echo "Errore.<br/>";
                    echo pg_last_error($conn);
                    exit();
                }
                else{
                    echo '<table id="tabellaIstruttori" class="table table-bordered caption-top">';
                    echo '<caption class="text-center">Istruttori Titolari</caption>';
                    echo '<thead class="table-light">';
                        echo '<tr>';
                            echo '<th scope="col">cf</th>';
                            echo '<th scope="col">Nome</th>';
                            echo '<th scope="col">Cognome</th>';
                            echo '<th scope="col">Data nascita</th>';
                        echo '</tr>';
                    echo '</thead>';  
                    echo '<tbody>';  
                    while ($row = pg_fetch_array($result)){
                        echo '<tr>';
                        echo '<td>'.$row['cf'].'</td>';
                        echo '<td>'.$row['nome'].'</td>';
                        echo '<td>'.$row['cognome'].'</td>';
                        echo '<td>'.$row['datanascita'].'</td>';
                        echo '</tr>';
                    };
                    echo '</tbody>';  
                   echo '</table>';
                }

                //SOSTITUZIONI
                $query = "SELECT DISTINCT Istruttore.*
                FROM Istruttore
                JOIN Sostituzione AS IstuttoreSostituto ON Istruttore.cf = IstuttoreSostituto.cfIstruttoreSostituto
                JOIN Istruttore AS IstuttoreTitolare ON IstuttoreTitolare.cf = IstuttoreSostituto.cfIstruttoreTitolare
                JOIN Assunzione AS AssunzioneTitolare ON IstuttoreSostituto.cfIstruttoreTitolare = AssunzioneTitolare.cfIstruttore                
                WHERE AssunzioneTitolare.nomePiscina = '".$selezione."'
                AND EXTRACT(YEAR FROM IstuttoreSostituto.dataInizio) = '$anno'
                OR (EXTRACT(YEAR FROM IstuttoreSostituto.dataInizio) = '$anno' - 1 OR EXTRACT(YEAR FROM IstuttoreSostituto.dataInizio) = '$anno' + 1)
                ;";

                $result = pg_query($conn, $query);

                if (!$result) {
                    echo "Errore.<br/>";
                    echo pg_last_error($conn);
                    exit();
                }
                else{
                    echo '<table id="tabellaIstruttoriSostituti" class="table table-bordered caption-top">';
                    echo '<caption class="text-center">Istruttori Sostituti</caption>';
                    echo '<thead class="table-light">';
                        echo '<tr>';
                            echo '<th scope="col">cf</th>';
                            echo '<th scope="col">Nome</th>';
                            echo '<th scope="col">Cognome</th>';
                            echo '<th scope="col">Data nascita</th>';
                        echo '</tr>';
                    echo '</thead>';  
                    echo '<tbody>';  
                    while ($row = pg_fetch_array($result)){
                        echo '<tr>';
                        echo '<td>'.$row['cf'].'</td>';
                        echo '<td>'.$row['nome'].'</td>';
                        echo '<td>'.$row['cognome'].'</td>';
                        echo '<td>'.$row['datanascita'].'</td>';
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