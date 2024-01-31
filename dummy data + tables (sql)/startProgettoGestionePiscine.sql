CREATE TABLE Piscina (
	nome varchar(30) PRIMARY KEY,
	orarioApertura time(0) NOT NULL,
	orarioChiusura time(0) NOT NULL CHECK (orarioChiusura > orarioApertura),
	indirizzo varchar(30),
	citta varchar(30)
);

CREATE TABLE Telefono (
	numero decimal (10, 0) PRIMARY KEY
);

CREATE TABLE NumeroPiscina (
	numeroTelefono decimal (10, 0) REFERENCES Telefono (numero) ON DELETE CASCADE ON UPDATE CASCADE,
	nomePiscina varchar(30) REFERENCES Piscina (nome) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (numeroTelefono, nomePiscina)
);

--tipologia assume i valori: olimpionica, baby, neonatale
--locazione assume i valori: esterno, interno
CREATE TABLE Vasca ( 
	id varchar(4) NOT NULL,
	nomePiscina varchar(30) REFERENCES Piscina (nome) ON DELETE CASCADE ON UPDATE CASCADE,
    tipologia varchar(30) NOT NULL,
	numCorsie integer,
	locazione varchar(30),
	dataApertura date,
	dataChiusura date,
 	PRIMARY KEY (nomePiscina,id)
);

CREATE TABLE  Responsabile (
	cf varchar(16) PRIMARY KEY,
	nome varchar(20) NOT NULL,	
	cognome varchar(20) NOT NULL,
	dataNascita date NOT NULL
);

--tipologia assume i valori: neonatale, baby, ragazzi, adulti (possono essere proposti altri corsi)
CREATE TABLE Corso (
	id varchar(4) PRIMARY KEY,
	costo integer,
	tipologia varchar(30) NOT NULL,
	livello integer NOT NULL CHECK (livello > 0 AND livello < 4),
	maxPartecipanti integer,
	minPartecipanti integer,
	UNIQUE (tipologia, livello)
);

CREATE TABLE Istruttore  (
	cf varchar(16) PRIMARY KEY,
	nome varchar(20) NOT NULL,	
	cognome varchar(20) NOT NULL,
	dataNascita date NOT NULL
);

CREATE TABLE Edizione (
	id char(20) PRIMARY KEY,
	anno integer NOT NULL, 
	orarioInizio time(0) NOT NULL,
	orarioFine time(0) NOT NULL CHECK (orarioFine > orarioInizio),
	nomePiscinaVasca varchar(30),
	idVasca varchar(4),
	corsia integer,
	idCorso varchar(4) REFERENCES Corso (id),
	cfIstruttore varchar(16) REFERENCES Istruttore (cf) ON DELETE NO ACTION ON UPDATE CASCADE,
	FOREIGN KEY (nomePiscinaVasca, idVasca) REFERENCES Vasca (nomePiscina, id),
	UNIQUE (anno, orarioInizio, idCorso, nomePiscinaVasca, idVasca, cfIstruttore)
);

CREATE TABLE Qualifica ( 
	nome varchar(30) PRIMARY KEY 
);

CREATE TABLE PossiedeQualifica (
	nomeQualifica varchar(30) REFERENCES Qualifica (nome) ON DELETE CASCADE ON UPDATE CASCADE,
	cfIstruttore varchar(16) REFERENCES Istruttore (cf) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (nomeQualifica, cfIstruttore)
);

CREATE TABLE NumeroIstruttore (
	numeroTelefono decimal (10, 0) REFERENCES Telefono (numero) ON DELETE CASCADE ON UPDATE CASCADE,
	cfIstruttore varchar(16) REFERENCES Istruttore (cf) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (numeroTelefono, cfIstruttore)
);

--il primo è istruttore titolare, il secondo è il sostituto
CREATE TABLE Sostituzione (
	dataInizio date,
	dataFine date,
	cfIstruttoreTitolare varchar(16) REFERENCES Istruttore (cf) ON DELETE CASCADE ON UPDATE CASCADE,
	cfIstruttoreSostituto varchar(16) REFERENCES Istruttore (cf) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (DataInizio, cfIstruttoreTitolare)
);

CREATE TABLE Persona (
	codice serial PRIMARY KEY,
	nome varchar(20) NOT NULL,	
	cognome varchar(20) NOT NULL,
	dataNascita date NOT NULL,
	cfGenitore varchar(16)
);

CREATE TABLE Medico (
	cf varchar(16) PRIMARY KEY,
	nome varchar(20) NOT NULL,	
	cognome varchar(20) NOT NULL
);

CREATE TABLE CertificatoMedico (
	id varchar(4) PRIMARY KEY, 
	dataVisita date NOT NULL ,
	dataScadenza date NOT NULL ,
	cfMedico varchar(16) REFERENCES Medico (cf) ON DELETE CASCADE ON UPDATE CASCADE,
	codicePersona serial REFERENCES Persona (codice) ON DELETE CASCADE ON UPDATE CASCADE,
	UNIQUE (cfMedico, codicePersona)
);

CREATE TABLE Dirigenza (
	cfResponsabile varchar(16) REFERENCES Responsabile (cf) ON DELETE CASCADE ON UPDATE CASCADE,
	nomePiscina varchar(30) REFERENCES Piscina (nome) ON DELETE CASCADE ON UPDATE CASCADE, 
	inizioTurno time(0) NOT NULL, 
	fineTurno time(0) NOT NULL CHECK (fineTurno > inizioTurno),
	anno integer NOT NULL,
	PRIMARY KEY (cfResponsabile, nomePiscina, anno)
);

CREATE TABLE Assunzione (
	nomePiscina varchar(30) REFERENCES Piscina (nome) ON DELETE CASCADE ON UPDATE CASCADE,
	cfIstruttore varchar(16) REFERENCES Istruttore (cf) ON DELETE CASCADE ON UPDATE CASCADE,
	dataInizio date NOT NULL, 
	dataFine date NOT NULL,
	ferieDisponibili integer, 
	PRIMARY KEY (cfIstruttore, nomePiscina, dataInizio)
);

CREATE TABLE Iscrizione (
	codicePersona serial REFERENCES Persona (codice) ON DELETE CASCADE ON UPDATE CASCADE,
	idEdizione char(20) REFERENCES Edizione (id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (codicePersona, idEdizione)
	);

-- QUERY 
-- a. Determinare gli istruttori supplenti che hanno esattamente una supplenza nella stagione corrente
SELECT cf, nome, cognome, datanascita
FROM (
	SELECT * 
	FROM istruttore JOIN sostituzione ON cf = cfIstruttoreSostituto 
	JOIN assunzione ON  cfIstruttoreTitolare = cfIstruttore
	WHERE EXTRACT(YEAR FROM sostituzione.dataInizio) = 2023 AND
	(EXTRACT(YEAR FROM assunzione.dataInizio) = 2022 OR EXTRACT(YEAR FROM assunzione.dataInizio) = 2024)
) as sostituzioni
GROUP BY cf , nome, cognome, datanascita
HAVING COUNT(*)=1

-- b. Determinare gli istruttori supplenti che hanno esattamente una supplenza nella stagione corrente
SELECT cf, nome, cognome, datanascita
FROM (
	SELECT * 
	FROM istruttore JOIN sostituzione ON cf = cfIstruttoreSostituto 
	JOIN assunzione ON cfIstruttoreTitolare = cfIstruttore
	WHERE EXTRACT(YEAR FROM sostituzione.dataInizio) = 2023 AND
	(EXTRACT(YEAR FROM assunzione.dataInizio) = 2022 OR EXTRACT(YEAR FROM assunzione.dataInizio) = 2024)
) as sostituzioni
GROUP BY cf , nome, cognome, datanascita
HAVING COUNT(*)>1

-- c. Determinare gli istruttori supplenti che hanno non più di due supplenze nella stagione corrente
 SELECT cf, nome, cognome, datanascita
FROM (
	SELECT * 
	FROM istruttore JOIN sostituzione ON cf = cfIstruttoreSostituto 
	JOIN assunzione ON cfIstruttoreTitolare = cfIstruttore
	WHERE EXTRACT(YEAR FROM sostituzione.dataInizio) = 2023 AND
	(EXTRACT(YEAR FROM assunzione.dataInizio) = 2022 OR EXTRACT(YEAR FROM assunzione.dataInizio) = 2024)
) as sostituzioni
GROUP BY cf , nome, cognome, datanascita
HAVING COUNT(*)<3