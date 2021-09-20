CREATE TABLE ACCES
(
nume varchar(20),
parola varchar(40),
PRIMARY KEY(nume)
);
insert into acces values('nume1', 'parola1');
insert into acces values('nume2', sha1('parola2'));