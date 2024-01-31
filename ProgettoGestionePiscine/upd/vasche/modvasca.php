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

                    $query_personale = "SELECT *
                        FROM piscina
                    ";
                     $result = pg_query($conn, $query_personale);

                    //INSERISCI + ELIMINA VASCA
                    echo '<h3>Inserire una vasca</h3>';
                    echo '<form method="POST" action="inserisciVasca.php">
                            <div class="mb-3">
                                <label class="form-label">id</label>
                                <input type="text" class="form-control" name="id" placeholder="Inserire id">
                            </div>';
                            echo' <label class="form-label">Nome piscina</label>';
                            echo '<select class="form-select mb-3" name="selezionaPiscina">';
                            while ($row = pg_fetch_array($result)) {
                                echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                            }
                            echo '</select>';    
                    echo '  <div class="mb-3">
                                <label class="form-label">tipologia</label>
                                <input type="text" class="form-control" name="tipologia" placeholder="Inserire tipologia">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">numero di corsie</label>
                                <input type="number" class="form-control" name="numcorsie" placeholder="Inserire numero di corsie">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">locazione</label>
                                <select class="form-select mb-3" name="locazione">
                                    <option value="esterno" >esterno</option>
                                    <option value="interno" >interno</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">data apertura</label>
                                <input type="date" class="form-control" name="dataApertura">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">data chiusura</label>
                                <input type="date" class="form-control" name="dataChiusura">
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>';
                    echo '<hr>';
                    echo '<h3>Eliminare una vasca</h3>';

                    $query_personale = "SELECT *
                    FROM piscina
                    ";
                    $result = pg_query($conn, $query_personale);

                    echo '<form action="eliminaVasca.php" method="POST">';
                    echo' <label class="form-label">Nome piscina</label>';
                    echo '<select class="form-select mb-3" name="selezionaPiscina" id="selezionaPiscina">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        }
                    echo '</select>';
                    $query_vasca = "SELECT *
                        FROM vasca 
                    ";
                    $result_vasca = pg_query($conn, $query_vasca);
                    echo' <label class="form-label">Id vasca</label>';
                    echo '<select class="form-select mb-3" name="selezionaVasca" id="selezionaVasca">';
                        while ($row = pg_fetch_array($result_vasca)) {
                            echo "<option value='".$row['id']."'>".$row['id']."</option>";
                        }
                    echo '</select>';
                    echo '<input type="submit" class="btn btn-primary"></form>';
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>