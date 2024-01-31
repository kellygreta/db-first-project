<!-- Progetto Basi di Dati - Gestione di piscine comunali -->
<html>
    <head>
        <title>
        Gestione di piscine comunali
        </title>
        <script>
            function toggleGenitore() {
                let data = document.getElementById('dataNascita').value;
                let dataNascita = new Date(data);
                let date = new Date();
                
                console.log('data',dataNascita);
                console.log('currentDate', date);

                var diffDays = parseInt((date - dataNascita) / (1000 * 60 * 60 * 24), 10);

                console.log(diffDays);

                if(diffDays < 6570){
                    document.getElementById('cfGenitore').style.display = 'block';
                }
                else{
                    document.getElementById('cfGenitore').style.display = 'none';
                }

                
            }
            
        </script>
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
                  
                    //INSERISCI + ELIMINA ISCRITTO
                    echo '<h3>Inserire una iscritto</h3>';
                    echo '<form method="POST" action="inserisciPersona.php">
                            <div class="mb-3">
                                <label class="form-label">Codice</label>
                                <input type="text" class="form-control" name="codice" placeholder="Inserire codice">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Inserire nome">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cognome</label>
                                <input type="text" class="form-control" name="cognome" placeholder="Inserire cognome">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data di nascita</label>
                                <input type="date" class="form-control"  id="dataNascita" name="dataNascita" onChange="toggleGenitore()">
                            </div>
                            <div class="mb-3"  id="cfGenitore" style="display: none;">
                                <label class="form-label">Codice Fiscale Genitore</label>
                                <input type="text" class="form-control" name="cfGenitore" placeholder="Inserire codice fiscale">
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>';
                    
                    echo '<hr>';
                    echo '<h3>Eliminare una iscritto</h3>';

                    $query_personale = "SELECT *
                        FROM persona
                    ";
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="eliminaPersona.php" method="POST">';
                    echo '<select class="form-select mb-3" name="selezionaPersona">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['codice']."'>".$row['codice']."</option>";
                        }
                    echo '<input type="submit" class="btn btn-primary"></form>';
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>