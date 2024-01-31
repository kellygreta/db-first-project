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
                    //INSERISCI + ELIMINA CORSO
                    echo '<h3>Inserire un corso</h3>';
                    echo '<form method="POST" action="inserisciCorso.php">
                            <div class="mb-3">
                                <label class="form-label">id</label>
                                <input type="text" class="form-control" name="id" placeholder="Inserire id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Costo</label>
                                <input type="number" class="form-control" name="costo" placeholder="Inserire costo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipologia</label>
                                <input type="text" class="form-control" name="tipologia" placeholder="Inserire tipologia">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">livello</label>
                                <input type="number" class="form-control" name="livello" placeholder="Inserire livello tra 1 e 3">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">max partecipanti</label>
                                <input type="number" class="form-control" name="maxpartecipanti" placeholder="Inserire massimo numero di partecipanti">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">min partecipanti</label>
                                <input type="number" class="form-control" name="minpartecipanti" placeholder="Inserire minimo numero di partecipanti">
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>';
                    echo '<hr>';
                    echo '<h3>Eliminare un corso</h3>';

                    $query_personale = "SELECT *
                        FROM corso
                    ";
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="eliminaCorso.php" method="POST">';
                    echo '<select class="form-select mb-3" name="selezionaCorso">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['id']."'>".$row['id']."</option>";
                        }
                    echo '<input type="submit" class="btn btn-primary"></form>';
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>