INSERT INTO piscina VALUES ('piscina Rossa', '8:30', '20:30',  'via Rossa 21', 'Milano');
INSERT INTO piscina VALUES ('piscina Verde', '8:30', '20:30',   'via Verde 2', 'Milano'); 
INSERT INTO piscina VALUES ( 'piscina Blu', '8:30', '20:30',   'via Blu 3', 'Lodi');
INSERT INTO piscina VALUES ( 'piscina Viola', '8:30', '20:30',   'via Viola 5', 'Piacenza');

INSERT INTO Telefono VALUES ('123456789');
INSERT INTO Telefono VALUES ('987654321');
INSERT INTO Telefono VALUES ('564738291');
INSERT INTO Telefono VALUES ('823345678');

INSERT INTO NumeroPiscina VALUES ('123456789','piscina Rossa');
INSERT INTO NumeroPiscina VALUES ('987654321','piscina Verde');
INSERT INTO NumeroPiscina VALUES ('564738291','piscina Blu');
INSERT INTO NumeroPiscina VALUES ('823345678','piscina Viola');

INSERT INTO  Responsabile VALUES ('JWRTLY84R58A155P','Mario','Rossi','1955-12-12');
INSERT INTO  Responsabile VALUES ('QNXDNS27C69H865S','Oscar','Wilde','1986-09-23');
INSERT INTO  Responsabile VALUES ('THDFLM34M29A177V','Victor','Hugo','1972-12-27');
INSERT INTO  Responsabile VALUES ('DLMMYC82E11A627J','Dorian','Gray','1976-02-13');

-- storico dirigenza piscina rossa (2016-2023)
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2016' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2017' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2018' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2019' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2020' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2021' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2022' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Rossa',  '8:30', '12:30' , '2023' );
-- storico dirigenza piscina verde (2016-2023)
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2016' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2017' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2018' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2019' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2020' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2021' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2022' );
INSERT INTO Dirigenza VALUES ('JWRTLY84R58A155P', 'piscina Verde',  '13:30', '20:30', '2023' );
-- storico dirigenza piscina blu (2020-2023)
INSERT INTO Dirigenza VALUES ('QNXDNS27C69H865S', 'piscina Blu',  '8:30', '20:30', '2020' );
INSERT INTO Dirigenza VALUES ('QNXDNS27C69H865S', 'piscina Blu',  '8:30', '20:30', '2021' );
INSERT INTO Dirigenza VALUES ('QNXDNS27C69H865S', 'piscina Blu',  '8:30', '20:30', '2022' );
INSERT INTO Dirigenza VALUES ('QNXDNS27C69H865S', 'piscina Blu',  '8:30', '20:30', '2023' );
-- storico dirigenza piscina viola (2020-2023)
INSERT INTO Dirigenza VALUES ('THDFLM34M29A177V', 'piscina Viola',  '8:30', '20:30', '2020' );
INSERT INTO Dirigenza VALUES ('THDFLM34M29A177V', 'piscina Viola',  '8:30', '20:30', '2021' );
INSERT INTO Dirigenza VALUES ('THDFLM34M29A177V', 'piscina Viola',  '8:30', '20:30', '2022' );
INSERT INTO Dirigenza VALUES ('THDFLM34M29A177V', 'piscina Viola',  '8:30', '20:30', '2023' );

INSERT INTO  Istruttore VALUES ('RTFDMD85P57I566Z', 'Paola','Diaz', '1957-05-16');
INSERT INTO  Istruttore VALUES ('RHYBMG90B26H987Z', 'Giorgia','Sawyer', '1963-10-19');
INSERT INTO  Istruttore VALUES ('FFCFFS94E23B313O', 'Alessio','Williams', '1970-02-04');
INSERT INTO  Istruttore VALUES ('QNBSTP56B04I105L', 'Carlotta','Yu', '1970-03-22'); 
INSERT INTO  Istruttore VALUES ('LCBFHN37D07H769A', 'Cesare','Montgomery', '1976-07-12'); 
INSERT INTO  Istruttore VALUES ('HNVQHU36P23B643P', 'Luigi','Nolan', '1977-07-16');

-- storico assunzioni piscina rossa (2016-2023)
INSERT INTO Assunzione VALUES ('piscina Rossa', 'RTFDMD85P57I566Z', '2015-09-10', '2016-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'RTFDMD85P57I566Z', '2016-09-10', '2017-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'RTFDMD85P57I566Z', '2017-09-10', '2018-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'RHYBMG90B26H987Z', '2015-09-10', '2016-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'RHYBMG90B26H987Z', '2016-09-10', '2017-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'RHYBMG90B26H987Z', '2017-09-10', '2018-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'FFCFFS94E23B313O', '2016-09-10', '2017-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'FFCFFS94E23B313O', '2017-09-10', '2018-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'FFCFFS94E23B313O', '2018-09-10', '2019-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'FFCFFS94E23B313O', '2021-09-10', '2022-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'FFCFFS94E23B313O', '2022-09-10', '2023-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'FFCFFS94E23B313O', '2023-09-10', '2024-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'HNVQHU36P23B643P', '2018-09-10', '2019-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'HNVQHU36P23B643P', '2021-09-10', '2022-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'HNVQHU36P23B643P', '2022-09-10', '2023-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Rossa', 'HNVQHU36P23B643P', '2023-09-10', '2024-06-10', '15');
-- storico assunzioni piscina verde (2016-2023)
INSERT INTO Assunzione VALUES ('piscina Verde', 'HNVQHU36P23B643P', '2016-06-10', '2017-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Verde', 'HNVQHU36P23B643P', '2016-09-10', '2017-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Verde', 'HNVQHU36P23B643P', '2017-09-10', '2018-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Verde', 'QNBSTP56B04I105L', '2018-09-10', '2019-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Verde', 'QNBSTP56B04I105L', '2021-09-10', '2022-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Verde', 'QNBSTP56B04I105L', '2022-09-10', '2023-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Verde', 'QNBSTP56B04I105L', '2023-09-10', '2024-06-10', '15');
-- storico assunzioni piscina blu (2018-2023)
INSERT INTO Assunzione VALUES ('piscina Blu', 'LCBFHN37D07H769A', '2018-09-10', '2019-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Blu', 'LCBFHN37D07H769A', '2021-09-10', '2022-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Blu', 'LCBFHN37D07H769A', '2022-09-10', '2023-06-10', '15');
INSERT INTO Assunzione VALUES ('piscina Blu', 'LCBFHN37D07H769A', '2023-09-10', '2024-06-10', '15');

INSERT INTO Qualifica VALUES ('neonatale');
INSERT INTO Qualifica VALUES ('baby');
INSERT INTO Qualifica VALUES ('ragazzi');
INSERT INTO Qualifica VALUES ('adulti');

-- INSERT PossiedeQualifica VALUES ('', '');

-- INSERT NumeroIstruttore VALUES ('', '');

-- storico sostituzioni (piscina rossa), il primo è istruttore titolare, il secondo è il sostituto
INSERT INTO Sostituzione VALUES ('2018-01-11','2018-06-10', 'RTFDMD85P57I566Z', 'LCBFHN37D07H769A');
INSERT INTO Sostituzione VALUES ('2023-10-01','2023-10-20', 'HNVQHU36P23B643P', 'LCBFHN37D07H769A');
INSERT INTO Sostituzione VALUES ('2023-10-01','2023-10-20', 'FFCFFS94E23B313O', 'QNBSTP56B04I105L');
INSERT INTO Sostituzione VALUES ('2023-11-01','2023-11-20', 'FFCFFS94E23B313O', 'QNBSTP56B04I105L');

INSERT INTO  Vasca VALUES ('1', 'piscina Rossa', 'olimpionica',  '6', 'interno', NULL, NULL);
INSERT INTO  Vasca VALUES ('2', 'piscina Rossa','baby', '3', 'interno', NULL, NULL );
INSERT INTO  Vasca VALUES ('3', 'piscina Rossa', 'olimpionica', '6', 'esterno', NULL, NULL);
INSERT INTO  Vasca VALUES ('4', 'piscina Rossa','baby', '3', 'esterno', NULL, NULL);
INSERT INTO  Vasca VALUES ('1', 'piscina Verde','olimpionica',  '6', 'interno', NULL, NULL);
INSERT INTO  Vasca VALUES ('2', 'piscina Verde', 'baby', '3', 'interno', NULL, NULL);
INSERT INTO  Vasca VALUES ('3', 'piscina Verde', 'olimpionica',  '6', 'esterno',  NULL, NULL);
INSERT INTO  Vasca VALUES ('4', 'piscina Verde', 'baby',  '3', 'esterno', NULL, NULL);
INSERT INTO  Vasca VALUES ('1', 'piscina Blu', 'olimpionica', '6', 'interno', NULL, NULL);
INSERT INTO  Vasca VALUES ('2', 'piscina Blu', 'olimpionica', '6', 'esterno', NULL, NULL);

INSERT INTO  Corso VALUES ('mag1', '120','adulti','1','10','2');
INSERT INTO  Corso VALUES ('mag2', '120','adulti','2','10','2');
INSERT INTO  Corso VALUES ('mag3', '120','adulti','3','10','2');
INSERT INTO  Corso VALUES ('rag1', '120','ragazzi','1','8','2');
INSERT INTO  Corso VALUES ('rag2', '120','ragazzi','2','8','2');
INSERT INTO  Corso VALUES ('rag3', '120','ragazzi','3','8','2');
INSERT INTO  Corso VALUES ('bb1', '300', 'baby','1','6','2');
INSERT INTO  Corso VALUES ('bb2', '300', 'baby','2','6','2');
INSERT INTO  Corso VALUES ('bb3', '110', 'baby','3','6','2');
INSERT INTO  Corso VALUES ('neo1', '110', 'neonatale','1','5','2');
INSERT INTO  Corso VALUES ('neo2', '110', 'neonatale','2','5','2');
INSERT INTO  Corso VALUES ('neo3', '110', 'neonatale','3','5','2');

-- 2016-2023
INSERT INTO Edizione (id, anno, orarioInizio, orarioFine, nomePiscinaVasca, idVasca, corsia, idCorso, cfIstruttore)
VALUES
('rag1_2016_AM_PR', '2016', '10:00:00', '12:00:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O'),
('rag1_2017_AM_PR', '2017', '08:30:00', '10:30:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O'),
('rag1_2018_AM_PR', '2018', '09:15:00', '11:15:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O'),
('rag1_2019_AM_PR', '2019', '10:30:00', '12:30:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O'),
('rag1_2020_AM_PR', '2020', '11:00:00', '13:00:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O'),
('rag1_2021_AM_PR', '2021', '09:45:00', '11:45:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O'),
('rag1_2022_AM_PR', '2022', '08:00:00', '10:00:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O'),
('rag1_2023_AM_PR', '2023', '10:15:00', '12:15:00', 'piscina Rossa', '1', 1, 'rag1', 'FFCFFS94E23B313O');

INSERT INTO Edizione (id, anno, orarioInizio, orarioFine, nomePiscinaVasca, idVasca, corsia, idCorso, cfIstruttore)
VALUES
('mag1_2018_AM_PR', '2018', '08:00:00', '10:00:00', 'piscina Rossa', '1', 1, 'mag1', 'HNVQHU36P23B643P'),
('mag1_2018_PM_PR', '2018', '15:30:00', '17:30:00', 'piscina Rossa', '1', 2, 'mag1', 'HNVQHU36P23B643P'),
('mag1_2021_AM_PR', '2021', '08:30:00', '10:30:00', 'piscina Rossa', '1', 1, 'mag1', 'HNVQHU36P23B643P'),
('mag1_2021_PM_PR', '2021', '15:00:00', '17:00:00', 'piscina Rossa', '1', 2, 'mag1', 'HNVQHU36P23B643P'),
('mag1_2022_AM_PR', '2022', '08:45:00', '10:45:00', 'piscina Rossa', '1', 1, 'mag1', 'HNVQHU36P23B643P'),
('mag1_2022_PM_PR', '2022', '15:15:00', '17:15:00', 'piscina Rossa', '1', 2, 'mag1', 'HNVQHU36P23B643P'),
('mag1_2023_AM_PR', '2023', '09:00:00', '11:00:00', 'piscina Rossa', '1', 1, 'mag1', 'HNVQHU36P23B643P'),
('mag1_2023_PM_PR', '2023', '14:30:00', '16:30:00', 'piscina Rossa', '1', 2, 'mag1', 'HNVQHU36P23B643P');

INSERT INTO  Medico VALUES ('VRRXSZ60M42B386M', 'Simon','Williamson');
INSERT INTO  Medico VALUES ('LLTPPS32D43G588I', 'Luke','Skywalker');

INSERT INTO  Persona VALUES ('1','William','Shakespeare','1990-03-10');
INSERT INTO  Persona VALUES ('2','Riccardo','Floyd','1992-06-18');
INSERT INTO  Persona VALUES ('3','Jennifer','Hill','1992-07-05');
INSERT INTO  Persona VALUES ('4','Taylor','Jacobs','1995-07-11');
INSERT INTO  Persona VALUES ('5','Paris','Hilton','2008-03-16', 'ZWKTPL45E46E489I');
INSERT INTO  Persona VALUES ('6','Hannah','Montana','2010-01-11','RTLVGF58P41A831S');

INSERT INTO CertificatoMedico VALUES ('id1','2023-04-10','2024-04-10','VRRXSZ60M42B386M', '2');

INSERT INTO Iscrizione VALUES ('2', 'rag1_2018_AM_PR');
INSERT INTO Iscrizione VALUES ('2', 'rag1_2023_AM_PR');