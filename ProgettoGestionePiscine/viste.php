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
                            <a class="nav-link active" href="viste.php">Visualizzazioni</a>
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
            
                if (!$conn) {
                    echo 'Connessione al database fallita.';
                    exit();
                }else{                    
                    
                    //VISUALIZZA STORICO PERSONALE
                    echo '<h3>Visualizzazione del personale in organico per dato anno e struttura</h3>';
                    $query_personale = "SELECT *
                        FROM piscina
                    ";
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="view/viewPersonale.php" method="POST">';
                    echo '<label class="form-label">seleziona piscina</label>';
                    echo '<select class="form-select mb-3" name="selezionaPiscina">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        }
                    echo '</select>';
                    echo '<div class="mb-3">
                        <label class="form-label">anno</label>
                        <input type="number" class="form-control" name="anno" placeholder="Inserire anno">
                    </div>';
                    echo '<input type="submit" class="btn btn-primary mt-3"></form>';
                    echo '<hr>';
                    
                    //VISUALIZZA STORICO ISCRITTO
                    echo '<h3>Visualizzazione dello storico delle iscrizioni di un iscritto in una struttura</h3>';
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="view/viewIscritto.php" method="POST">';
                    echo '<label class="form-label">seleziona piscina</label>';
                    echo '<select class="form-select mb-3" name="selezionaPiscina">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        }
                    echo '</select>';
                    $query_codice = "SELECT *
                        FROM persona
                    ";
                    $result_codice = pg_query($conn, $query_codice);
                    echo '<label class="form-label">seleziona id iscritto</label>';
                    echo '<select class="form-select mb-3" name="selezionaCodice">';
                        while ($row = pg_fetch_array($result_codice)) {
                            echo "<option value='".$row['codice']."'>".$row['codice']."</option>";
                        } 
                    echo '</select>';                  
                    echo '<input type="submit" class="btn btn-primary mt-3"></form>';
                    echo '<hr>';
                    
                    //VISUALIZZA EDIZIONI (x STRUTTURA)
                    echo '<h3>[NEW] Visualizzazione dello storico delle edizioni (di corsi) in una struttura</h3>';
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="view/viewEdizione.php" method="POST">';
                    echo '<label class="form-label">seleziona piscina</label>';
                    echo '<select class="form-select mb-3" name="selezionaPiscina">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        }
                    echo '</select>';     
                    echo '<input type="submit" class="btn btn-primary mt-3"></form>';
                    echo '<hr>';
                    //VISUALIZZA VASCHE (x STRUTTURA)
                    echo '<h3>[NEW] Visualizzazione delle vasche presenti in una struttura</h3>';
                    $result = pg_query($conn, $query_personale);
                    echo '<form action="view/viewVasche.php" method="POST">';
                    echo '<label class="form-label">seleziona piscina</label>';
                    echo '<select class="form-select mb-3" name="selezionaPiscina">';
                        while ($row = pg_fetch_array($result)) {
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        }
                    echo '</select>';     
                    echo '<input type="submit" class="btn btn-primary mt-3"></form>';
                    echo '<hr>';
                }
        ?>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>