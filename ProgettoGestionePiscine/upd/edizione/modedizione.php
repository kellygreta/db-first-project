<!-- Progetto Basi di Dati - Gestione di piscine comunali -->
<html>
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
                    
                $query = "  SELECT * FROM edizione";
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

                $query_personale = "SELECT *
                    FROM piscina";
                $result = pg_query($conn, $query_personale);

                $query_vasca = "SELECT *
                    FROM vasca";
                $result_vasca = pg_query($conn, $query_vasca);

                $query_corso = "SELECT *
                    FROM corso";
                $result_corso = pg_query($conn, $query_corso);
                
                $query_istruttore = "SELECT *
                  FROM istruttore";
                $result_istruttore = pg_query($conn, $query_istruttore);

                    //INSERISCI + ELIMINA EDIZIONE
                    echo '<h3>Inserire una edizione</h3>';
                    echo '<form method="POST" action="inserisciEdizione.php">
                            <div class="mb-3">
                                <label class="form-label">id</label>
                                <input type="text" class="form-control" name="id" placeholder="Inserire id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">anno</label>
                                <input type="number" class="form-control" name="anno" placeholder="Inserire anno">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">orarioInizio</label>
                                <input type="time" class="form-control" name="orarioInizio" placeholder="Inserire orarioInizio">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">orarioFine</label>
                                <input type="time" class="form-control" name="orarioFine" placeholder="Inserire orarioFine">
                            </div>';
                    echo' <label class="form-label">Nome piscina</label>';
                    echo '<select class="form-select mb-3" name="selezionaPiscina">';
                            while ($row = pg_fetch_array($result)) {
                                echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                            }
                            echo '</select>';
                    echo' <label class="form-label">id Vasca</label>';
                        echo '<select class="form-select mb-3" name="selezionaVasca">';
                                while ($row = pg_fetch_array($result_vasca)) {
                                    echo "<option value='".$row['id']."'>".$row['id']."</option>";
                                }
                            echo '</select>';
                    echo '<div class="mb-3">
                            <label class="form-label">corsia</label>
                            <input type="number" class="form-control" name="corsia" placeholder="Inserire corsia">
                        </div>';
                    echo' <label class="form-label">id corso</label>';
                        echo '<select class="form-select mb-3" name="selezionaCorso">';
                                while ($row = pg_fetch_array($result_corso)) {
                                    echo "<option value='".$row['id']."'>".$row['id']."</option>";
                                }
                            echo '</select>';
                    echo' <label class="form-label">codice fiscale istruttore</label>';
                        echo '<select class="form-select mb-3" name="selezionaIstruttore">';
                                while ($row = pg_fetch_array($result_istruttore)) {
                                    echo "<option value='".$row['cf']."'>".$row['cf']."</option>";
                                }
                            echo '</select>';
                    echo    '<input type="submit" class="btn btn-primary">
                        </form>';
                    echo '<hr>';
                    echo '<h3>Eliminare una edizione</h3>';

                    $query_personale = "SELECT *
                        FROM edizione
                    ";
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="eliminaEdizione.php" method="POST">';
                    echo '<select class="form-select mb-3" name="selezionaEdizione">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['id']."'>".$row['id']."</option>";
                        }
                    echo '<input type="submit" class="btn btn-primary"></form>';
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>