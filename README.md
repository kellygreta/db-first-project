# db-first-project 
my first database project

## Progettazione e realizzazione dell’applicazione web “gestione di piscine comunali”
Corso di Basi di Dati e Web 
**Introduzione** 
**Scopo del lavoro.** Scopo di questo progetto è la realizzazione di una versione semplificata per la gestione di piscine comunali per un comune di medie dimensioni. 

### Descrizione del dominio applicativo
Scopo di questo progetto è la realizzazione di una versione semplificata per la gestione di piscine comunali per un comune di medie dimensioni. Per ciascuna piscina, identificata dal nome, si vogliono memorizzare l’indirizzo, un insieme di numeri di telefono, il periodo di apertura, informazioni sulla struttura quali numero e tipologia di vasche (all’aperto, al chiuso, olimpioniche, baby, nuoto neonatale), numero di corsie, periodo di fruizione ed infine i dati del responsabile. Si noti che un responsabile potrebbe “dirigere” anche più di una piscina nel qual caso interessa sapere quando è reperibile in ciascuna struttura di cui è responsabile. Il comune propone dei corsi di nuoto (nuoto baby, ragazzi, adulti, ciascuno con livelli da I a III) attivabili in tutte le strutture, eventualmente con modalità ed orari differenti, ma resta a ciascuna struttura la facoltà di proporre alla propria utenza dei corsi specifici. Alcuni corsi (nuoto baby e neonatale) possono essere invece attivati esclusivamente nelle strutture con le apposite vasche. Per ogni corso svolto preso una struttura si vogliono memorizzare alcune informazioni: il costo, il numero minimo e massimo di partecipanti, e l’orario di svolgimento delle varie edizioni, la corsia nel quale si tiene). Ogni edizione di un corso possiede un istruttore titolare. Gli istruttori possono essere assunti stabilmente dalle strutture, nel qual caso interessa memorizzare il numero di giorni di ferie disponibili, o possono essere soggetti a contratti stagionali di durata annuale o una frazione di esso; di ciascun istruttore interessano i dati anagrafici, i recapiti telefonici e l’elenco delle qualifiche possedute (ad es. istruttore di nuoto, di fitness, di pallanuoto, ecc.). Si vuole tenere traccia della storia lavorativa degli istruttori; si noti che un istruttore può aver lavorato/lavorare in più strutture (anche la stessa), sia con contratto a tempo determinato, sia essendo stato assunto dalla struttura, ma anche può aver sostituito il collega “titolare” più volte nello stesso anno (ovviamente in periodi differenti). Ogni istruttore può seguire più edizioni dello stesso corso o di corsi differenti. Le persone iscritte ad una qualche edizione di un corso, anche più di una, debbono essere registrate e identificate dal numero della tessera personale rilasciata in fase di iscrizione. Per poter frequentare è obbligatorio il rilascio di un certificato medico, di durata stagionale, che attesti l’idoneità alla pratica sportiva. Si vuole mantenere le informazioni dei medici che hanno rilasciato i certificati, della data della visita e degli iscritti che siano sprovvisti dello stesso. 

Di seguito vengono riportate alcune operazioni da considerare durante la progettazione della base di dati. Questo elenco non è esaustivo, è possibile considerare anche altre operazioni oltre a quelle indicate, motivandone la scelta. 
1) Inserimento e modifica
  - Di una struttura
  - Del personale in organico nella struttura (per un determinato anno scolastico)
  - Dei corsi presenti nella struttura
  - Degli iscritti, se minorenni, anche del/dei relativo/i genitore/i (almeno uno)
2) Visualizzazione
  - Del personale in organico per dato anno e struttura
  - Dello storico delle iscrizioni di un iscritto in una struttura
3) Interrogazioni
  - Determinare gli istruttori supplenti che hanno esattamente una supplenza nella stagione corrente
  - Determinare gli istruttori supplenti che hanno almeno due supplenze nella stagione corrente
  - Determinare gli istruttori supplenti che hanno non più di due supplenze nella stagione corrente

## progettazione del sito

Nome del database PostgreSQL: GestionePiscine
Nome della cartella sotto htdocs: ProgettoGestionePiscine

Il sito sito è composto da 5 macrosezioni, accessibili dalla barra di navigazione posta in alto:
1. Home = una panoramica della applicazione
2. Tabelle = contiene alcune delle tabelle presenti nel database
3. Inserimenti = si può effettuare l’inserimento e l’eliminazione di
  - Una struttura (table piscina)
  - Personale (table responsabile e table istruttore)
  - Corsi presenti in una struttura (table edizione)
  - Iscritti (table persona)
  - Corsi (table corso) (non richiesto dalla specifica di progetto)
  - Vasche (table vasche) (non richiesto dalla specifica di progetto)
4. Visualizzazioni = si può visualizzare delle tabelle specificando alcuni parametri
  - l personale in organico per dato anno e struttura
  - lo storico delle iscrizioni di un iscritto in una struttura
  - [NEW] dei corsi presenti in una struttura (quindi delle edizioni)
  - [NEW] delle vasche in una struttura
5. Interrogazioni = si possono eseguire le interrogazioni richieste dal progetto, quindi determinare
gli istruttori supplenti che hanno
  - esattamente una supplenza nella stagione corrente
  - almeno due supplenze nella stagione corrente
  - non più di due supplenze nella stagione corrente
