CREATE database db_galerie;

USE db_galerie;

CREATE TABLE account 
( 
	account		char(20)  not null, 
	passwort	char(40), 
	email		char(120), 
	ip			char(39), 
	PRIMARY KEY(account) 
)	engine=InnoDB default character set=utf8;

CREATE TABLE bild  
(
	bildID		char(40) not null,  
	accountID	char(20) not null, 
	dateiName	char(255), 
	pfad		char(120), 
	datum		datetime, 
	ip			char(39),  
	PRIMARY KEY (bildID), 
	FOREIGN KEY(accountID) REFERENCES account(account) 
) engine=InnoDB default character set=utf8;

CREATE TABLE bewertung 
(
	accountID	char(20) not null, 
	bildID		char(40) not null,
	datum		datetime, 
	wertung		tinyint unsigned, 
	ip			char(39), 
	PRIMARY KEY(accountID, bildID), 
	FOREIGN KEY(accountID) REFERENCES account(account), 
	FOREIGN KEY(bildID) REFERENCES bild(bildID)  
)  engine=InnoDB default character set=utf8;

CREATE TABLE kommentar 
(
	accountID	char(20) not null, 
	bildID		char(40) not null,
	datum		datetime, 
	kommentar	text, 
	ip			char(39), 
	PRIMARY KEY(accountID, bildID), 
	FOREIGN KEY(accountID) REFERENCES account(account), 
	FOREIGN KEY(bildID) REFERENCES bild(bildID) 
) engine=InnoDB default character set=utf8;