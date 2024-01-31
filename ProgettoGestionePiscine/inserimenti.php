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
                            <a class="nav-link active" href="inserimenti.php">Inserimenti</a>
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
        <div style="font-size: large">
        In questa pagina puoi:
            <li>inserire e modificare</a></li>
                    <ul>
                        <li>una <a href="upd/piscina/modpiscina.php">struttura</a></li>
                        <li><a href="upd/personale/modpersonale.php">personale</a> in organico nella struttura (per un determinato anno scolastico)</li>
                        <li>delle <a href="upd/edizione/modedizione.php">edizioni</a> di corsi presenti nella struttura </li>
                        <li>degli <a href="upd/persona/modpersona.php">persona</a> se minorenni, anche del/dei relativo/i genitore/i (almeno uno)</li>
                        <li>[NEW] dei <a href="upd/corso/modcorso.php">corsi</a> proposti dai comuni</li>
                        <li>[NEW] delle  <a href="upd/vasche/modvasca.php">vasche</a> in una struttura</li>
                    </ul> 
        </div>
        <script src="lib/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    </body>
<html>