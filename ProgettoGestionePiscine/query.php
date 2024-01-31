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
                            <a class="nav-link" href="tabelle.php">Tabelle</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="inserimenti.php">Inserimenti</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="viste.php">Visualizzazioni</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="query.php">Interrogazioni</a>
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
                    echo '<h3>Query progetto : “gestione di piscine comunali”</h3>';
                    echo '<h4>Stagione corrente: 2023-2024</h4>';
                    echo '<form action="" method=POST>';
                    echo '<select class="form-select mb-3" name=query>';
                    echo '<option value="a">Determinare gli istruttori supplenti che hanno esattamente una supplenza nella stagione corrente</option>';
                    echo '<option value="b">Determinare gli istruttori supplenti che hanno almeno due supplenze nella stagione corrente</option>';
                    echo '<option value="c">Determinare gli istruttori supplenti che hanno non più di due supplenze nella stagione corrente</option>';
                    echo '</select>';
                    echo '<input type="submit" class="btn btn-primary"></form>';
                 
                    if (isset($_POST['query'])) {
                        switch ($_POST['query']) {
                            case 'a':
                                $query = " SELECT cf, nome, cognome, datanascita
                                FROM (
                                    SELECT * 
                                    FROM istruttore JOIN sostituzione ON cf = cfIstruttoreSostituto 
                                    JOIN assunzione ON  cfIstruttoreTitolare = cfIstruttore
                                    WHERE EXTRACT(YEAR FROM sostituzione.dataInizio) = 2023 AND
                                    (EXTRACT(YEAR FROM assunzione.dataInizio) = 2022 OR EXTRACT(YEAR FROM assunzione.dataInizio) = 2024)
                                    ) as sostituzioni
                                GROUP BY cf , nome, cognome, datanascita
                                HAVING COUNT(*)=1";
                                break;
                            case 'b':
                                $query = " SELECT cf, nome, cognome, datanascita
                                FROM (
                                    SELECT * 
                                    FROM istruttore JOIN sostituzione ON cf = cfIstruttoreSostituto 
                                    JOIN assunzione ON cfIstruttoreTitolare = cfIstruttore
                                    WHERE EXTRACT(YEAR FROM sostituzione.dataInizio) = 2023 AND
                                    (EXTRACT(YEAR FROM assunzione.dataInizio) = 2022 OR EXTRACT(YEAR FROM assunzione.dataInizio) = 2024)
                                    ) as sostituzioni
                                GROUP BY cf , nome, cognome, datanascita
                                HAVING COUNT(*)>1";
                                break;
                            case 'c':
                                $query = " SELECT cf, nome, cognome, datanascita
                                FROM (
                                    SELECT * 
                                    FROM istruttore JOIN sostituzione ON cf = cfIstruttoreSostituto 
                                    JOIN assunzione ON cfIstruttoreTitolare = cfIstruttore
                                    WHERE EXTRACT(YEAR FROM sostituzione.dataInizio) = 2023 AND
                                    (EXTRACT(YEAR FROM assunzione.dataInizio) = 2022 OR EXTRACT(YEAR FROM assunzione.dataInizio) = 2024)
                                    ) as sostituzioni
                                GROUP BY cf , nome, cognome, datanascita
                                HAVING COUNT(*)<3";
                                break;
                        }
                        
                        $result = pg_query($conn, $query);
                        if (!$result) {
                            echo "Errore.<br/>";
                            echo pg_last_error($conn);
                            exit();
                        }else{
                            echo '<table id="tabellaIstruttori" class="table table-bordered caption-top">';
                            echo '<caption class="text-center">Istruttori sostituti</caption>';
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
                    }
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>