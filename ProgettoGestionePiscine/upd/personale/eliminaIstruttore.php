<HTML>
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
                $cf = $_POST['selezionaIstruttore'];
                $query = "DELETE FROM istruttore WHERE cf = '$cf'";

                $result = pg_query($conn, $query);
                if($result){
                    echo("<br>Istruttore eliminato con successo!<br><br>");
                } else{
                    echo("<br>Istruttore NON eliminato correttamente.<br><br>");
                }

                $query = "  SELECT * FROM istruttore";
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
                echo '<form method="POST" action="modpersonale.php">  
                <input type="submit" class="btn btn-light" value="⬅ Torna Indietro"/>  
                </form>';               
            }
        ?>
    </body>
</HTML>