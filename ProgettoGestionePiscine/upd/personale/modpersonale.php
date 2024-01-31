<!-- Progetto Basi di Dati - Gestione di piscine comunali -->
<html>
    <head>
        <title>
        Gestione di piscine comunali
        </title>
        <script>
            function togglePersonale() {
                let option = document.getElementById('selectRuolo').options[document.getElementById('selectRuolo').selectedIndex].value;

                    if (option === 'a') {
                        document.getElementById('responsabile').style.display = 'block';
                        document.getElementById('istruttore').style.display = 'none';
                    } else {
                        document.getElementById('responsabile').style.display = 'none';
                        document.getElementById('istruttore').style.display = 'block';
                    }
            }

            function togglePersonaleDelete() {
                let option = document.getElementById('selectRuolo1').options[document.getElementById('selectRuolo1').selectedIndex].value;

                    if (option === 'a') {
                        document.getElementById('responsabile1').style.display = 'block';
                        document.getElementById('istruttore1').style.display = 'none';
                    } else {
                        document.getElementById('responsabile1').style.display = 'none';
                        document.getElementById('istruttore1').style.display = 'block';
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
                
                $query = "  SELECT * FROM responsabile";
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
                echo '<hr>';
                //INSERISCI + ELIMINA PERSONALE
                echo '<h3>Inserire personale</h3>';

                echo '<p>Seleziona chi vuoi inserire:</p>';
                echo '<select class="form-select mb-3" name="selectRuolo" id="selectRuolo" onChange="togglePersonale()">';
                echo '<option value="a">Responsabile</option>';
                echo '<option value="b">Istruttore</option>';
                echo '</select>';

                echo '<form method="POST" name="responsabile"id="responsabile" action="inserisciResponsabile.php">
                    <h3>Inserire Resposabile</h3>
                        <div class="mb-3">
                            <label class="form-label">Codice Fiscale</label>
                            <input type="text" class="form-control" name="cf" placeholder="Inserire codice fiscale">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Inserire nome">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">cognome</label>
                            <input type="text" class="form-control" name="cognome" placeholder="Inserire cognome">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data di nascita</label>
                            <input type="date" class="form-control" name="dataNascita">
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>';

                    echo '<form method="POST" name="istruttore"id="istruttore" action="inserisciIstruttore.php"  style="display: none;">
                    <h3>Inserire Istruttore</h3>
                        <div class="mb-3">
                            <label class="form-label">Codice Fiscale</label>
                            <input type="text" class="form-control" name="cf" placeholder="Inserire codice fiscale">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Inserire nome">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">cognome</label>
                            <input type="text" class="form-control" name="cognome" placeholder="Inserire cognome">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data di nascita</label>
                            <input type="date" class="form-control" name="dataNascita">
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>';                
                
                    echo '<hr>';
                    echo '<h3>Elimina personale</h3>';
                    echo '<p>Seleziona chi vuoi eliminare:</p>';
                    echo '<select class="form-select mb-3" name="selectRuolo1" id="selectRuolo1" onChange="togglePersonaleDelete()">';
                    echo '<option value="a">Responsabile</option>';
                    echo '<option value="b">Istruttore</option>';
                    echo '</select>';

                    $query_responsabile = "SELECT * FROM responsabile";
                    $result = pg_query($conn, $query_responsabile);
                    echo '<form name="responsabile1" id="responsabile1" action="eliminaResponsabile.php" method="POST">';
                    echo '<select class="form-select mb-3" name="selezionaResponsabile">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['cf']."'>".$row['cf']."</option>";
                        }
                    echo '<input type="submit" class="btn btn-primary"></form>';

                    $query_istruttore = "SELECT * FROM istruttore";
                    $result = pg_query($conn, $query_istruttore);
                    echo '<form name="istruttore1" id="istruttore1" action="eliminaIstruttore.php" method="POST" style="display: none;">';
                    echo '<select class="form-select mb-3" name="selezionaIstruttore">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['cf']."'>".$row['cf']."</option>";
                        }
                    echo '<input type="submit" class="btn btn-primary"></form>';
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>