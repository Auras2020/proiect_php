ALTER TABLE NAVE DROP CONSTRAINT nave_clasa_fk;
ALTER TABLE CONSECINTE DROP CONSTRAINT consecinte_nava_fk;
ALTER TABLE CONSECINTE DROP CONSTRAINT consecinte_batalie_fk;
DROP TABLE Clase;
DROP TABLE Nave;
DROP TABLE Batalii;
DROP TABLE Consecinte;

CREATE OR REPLACE TABLE Clase
(clasa VARCHAR(20) PRIMARY KEY,
tip VARCHAR(2),
CONSTRAINT clase_tip_ck CHECK(tip IN('vl', 'cr')),
tara VARCHAR(20),
nr_arme INT(10),
diametru_tun INT(10),
deplasament INT(20),
CONSTRAINT clase_diametru_tun_ck CHECK(diametru_tun>=15 OR (diametru_tun<15 AND nr_arme>=10)));

CREATE OR REPLACE TABLE Nave
(nume VARCHAR(20),
clasa VARCHAR(20),
anul_lansarii INT(4),
CONSTRAINT nave_an_lansare_ck CHECK(anul_lansarii>=1775),
CONSTRAINT nave_nume_pk PRIMARY KEY(nume),
CONSTRAINT nave_clasa_fk FOREIGN KEY(clasa) REFERENCES clase(clasa));

CREATE OR REPLACE TABLE Batalii
(nume VARCHAR(30),
data DATE,
locatie VARCHAR(20),
CONSTRAINT batalii_nume_pk PRIMARY KEY(nume));

CREATE OR REPLACE TABLE Consecinte
(nava VARCHAR(20),
CONSTRAINT consecinte_nava_fk FOREIGN KEY(nava) REFERENCES nave(nume),
batalie VARCHAR(30),
CONSTRAINT consecinte_batalie_fk FOREIGN KEY(batalie) REFERENCES batalii(nume),
PRIMARY KEY(nava, batalie),
rezultat VARCHAR(20),
CONSTRAINT consecinte_rezultat_ck CHECK(rezultat IN('scufundat', 'avariat', 'nevatamat')));

INSERT INTO CLASE
VALUES('Giuseppe Caribaldi', 'vl', 'Italia', 4, 15, 13850);
INSERT INTO CLASE
VALUES('Mary Rose', 'vl', 'Marea Britanie', 4, 30, 70650);
INSERT INTO CLASE
VALUES('Ticonderoga', 'cr', 'America', 5, 17, 5000);
INSERT INTO CLASE
VALUES('Black Pearl', 'cr', 'Marea Britanie', 12, 19, 4500);

INSERT INTO NAVE
VALUES('Giuseppe Caribaldi', 'Giuseppe Caribaldi', 1985);
INSERT INTO NAVE
VALUES('Cavour', 'Giuseppe Caribaldi', 2008);
INSERT INTO NAVE
VALUES('Mary Rose', 'Mary Rose', 1830);
INSERT INTO NAVE
VALUES('Elizabeth', 'Mary Rose', 1775);
INSERT INTO NAVE
VALUES('Ticonderoga', 'Ticonderoga', 1983);
INSERT INTO NAVE
VALUES('Yorktown', 'Ticonderoga', 1981);

INSERT INTO BATALII
VALUES('Battle of Chemulpo Bay', STR_TO_DATE('09-feb-1904', '%d-%b-%Y'), 'Coreea de Sud');
INSERT INTO BATALII
VALUES('Battle of Midway', STR_TO_DATE('05-jun-1942', '%d-%b-%Y'), 'America');

INSERT INTO CONSECINTE
VALUES('Ticonderoga', 'Battle of Chemulpo Bay', 'nevatamat');
INSERT INTO CONSECINTE
VALUES('Elizabeth', 'Battle of Chemulpo Bay', 'avariat');
INSERT INTO CONSECINTE
VALUES('Giuseppe Caribaldi', 'Battle of Chemulpo Bay', 'scufundat');
INSERT INTO CONSECINTE
VALUES('Ticonderoga', 'Battle of Midway', 'nevatamat');
INSERT INTO CONSECINTE
VALUES('Yorktown', 'Battle of Midway', 'avariat');
INSERT INTO CONSECINTE
VALUES('Cavour', 'Battle of Midway', 'avariat');