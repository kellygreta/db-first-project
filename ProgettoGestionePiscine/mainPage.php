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
                            <a class="nav-link active" href="mainPage.php">Home</a>
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
                            <a class="nav-link" href="query.php">Interrogazioni</a>
                        </li>
    
                    </ul>
                </div>          
        </nav>
        <h3>Progetto Basi di Dati - Gestione di piscine comunali</h3>
        
        <div style="font-size: large">
            Benvenutə sull’applicazione di Gestione di piscine comunali.<br><br>
            In questa applicazione puoi:
            <ul>
                <li>vedere i contenuniti delle <a href="tabelle.php">tabelle</a> più importanti del database.</li>
                <li> <a href="inserimenti.php">inserire e modificare</a></li>
                    <ul>
                        <li>una struttura</li>
                        <li>personale in organico nella struttura (per un determinato anno scolastico)</li>
                        <li>dei corsi presenti nella struttura (quindi delle edizioni)</li>
                        <li>degli iscritti, se minorenni, anche del/dei relativo/i genitore/i (almeno uno)</li>
                        <li>[NEW] dei corsi proposti dai comuni</li>
                        <li>[NEW] delle vasche in una struttura</li>
                    </ul> 
                <li><a href="viste.php">visualizzare</a></li>
                    <ul>
                        <li>il personale in organico per dato anno e struttura</li>
                        <li>lo storico delle iscrizioni di un iscritto in una struttura </li>
                        <li>[NEW] dei corsi presenti in una struttura (quindi delle edizioni) </li>
                        <li>[NEW] delle vasche in una struttura</li>
                    </ul> 
                <li>Eseguire le seguenti <a href="query.php">interrogazioni</a></li>
                    <ul>
                        <li>determinare gli istruttori supplenti che hanno esattamente una supplenza nella stagione corrente</li>
                        <li>determinare gli istruttori supplenti che hanno almeno due supplenze nella stagione corrente</li>
                        <li>Determinare gli istruttori supplenti che hanno non più di due supplenze nella stagione corrente</li>
                    </ul>                    
            </ul>  
       </div>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>