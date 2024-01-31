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
                    //INSERISCI + ELIMINA PISCINA
                    echo '<h3>Inserire una Piscina</h3>';
                    echo '<form method="POST" action="inserisciPiscina.php">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Inserire nome">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">orario apertura</label>
                                <input type="time" class="form-control" name="orarioApertura">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">orario chiusura</label>
                                <input type="time" class="form-control" name="orarioChiusura">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Indirizzo</label>
                                <input type="text" class="form-control" name="indirizzo" placeholder="Inserire indirizzo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Città</label>
                                <input type="text" class="form-control" name="citta" placeholder="Inserire città">
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>';
                    echo '<hr>';
                    echo '<h3>Eliminare una piscina</h3>';

                    $query_personale = "SELECT *
                        FROM piscina
                    ";
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="eliminaPiscina.php" method="POST">';
                    echo '<select class="form-select mb-3" name="selezionaPiscina">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        }
                    echo '<input type="submit" class="btn btn-primary"></form>';
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>