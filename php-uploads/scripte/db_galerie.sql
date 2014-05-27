CREATE database db_galerie;

CREATE TABLE account 
(
	id			int unsigned not null auto_increment primary key, 
	name		char(80), 
	passwort	sha1(), 
	email		char(120), 
	ip			char(39)
)	engine=MyISAM default charakter set=utf8;

CREATE TABLE galerie 
(
	name_upl	char(120) not null, 
	account_id	int not null, 
	name_ori	char(80), 
	groesse		int, 
	ort			char(120), 
	ip			char(39), 
	date_upl	now(), 
	PRIMARY KEY (name_upl), 
	FOREIGN KEY (account_id) REFERENCES ACCOUNT (id) 
) engine=MyISAM default charakter set=utf8;