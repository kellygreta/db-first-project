<!-- Progetto Basi di Dati - Gestione di piscine comunali -->
<html>
    <head>
        <title>
        Gestione di piscine comunali
        </title>
        <link rel="stylesheet" href="lib/bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    </head>
    <body class="m-3">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="mainPage.php">GestionePiscine</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
    
                        <li class="nav-item">
                            <a class="nav-link" href="mainPage.php">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link active" href="tabelle.php">Tabelle</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="inserimenti.php">Inserimenti</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="viste.php">Visualizzazioni</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="query.php">Interrogazioni</a>
                        </li>
    
                    </ul>
                </div>          
        </nav>
         <?php
            session_start();
            $conn = pg_connect("host=localhost port=5432 dbname=GestionePiscine user=postgres password=postgres");
            
                //PISCINA
                if (!$conn) {
                    echo 'Connessione al database fallita.';
                    exit();
                }else{ 
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
                            echo '</tr>';
                        };
                        echo '</tbody>';  
                       echo '</table>';
                    }
                    //RESPONSABILE
                    $query = "  SELECT *
                                FROM responsabile
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
                    //ISTRUTTORE
                    $query = "  SELECT *
                                FROM istruttore
                            ";
                        
                    $result = pg_query($conn, $query);

                    if (!$result) {
                        echo "Errore.<br/>";
                        echo pg_last_error($conn);
                        exit();
                    }else{
                        echo '<table id="tabellaIstruttori" class="table table-bordered caption-top">';
                        echo '<caption class="text-center">Istruttori</caption>';
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
                //CORSO
                $query = "  SELECT *
                            FROM corso
                        ";
                    
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
                //PERSONA
                $query = "  SELECT *
                            FROM persona
                        ";
                    
                $result = pg_query($conn, $query);

                if (!$result) {
                    echo "Errore.<br/>";
                    echo pg_last_error($conn);
                    exit();
                }else{
                    echo '<table id="tabellaPersona" class="table table-bordered caption-top">';
                        echo '<caption class="text-center">Persone</caption>';
                        echo '<thead class="table-light">';
                            echo '<tr>';
                                echo '<th scope="col">codice</th>';
                                echo '<th scope="col">Nome</th>';
                                echo '<th scope="col">Cognome</th>';
                                echo '<th scope="col">Data nascita</th>';
                                echo '<th scope="col">cf genitore (opz)</th>';
                            echo '</tr>';
                        echo '</thead>';  
                        echo '<tbody>';  
                        while ($row = pg_fetch_array($result)){
                            echo '<tr>';
                            echo '<td>'.$row['codice'].'</td>';
                            echo '<td>'.$row['nome'].'</td>';
                            echo '<td>'.$row['cognome'].'</td>';
                            echo '<td>'.$row['datanascita'].'</td>';
                            echo '<td>'.$row['cfgenitore'].'</td>';
                            echo '</tr>';
                        };
                        echo '</tbody>';  
                       echo '</table>';
                } 
                //EDIZIONE       
                $query = "  SELECT *
                FROM edizione";
        
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
            }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>