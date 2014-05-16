CREATE table eintraege
(
	id	int unsigned not null auto_increment primary key, 
	name	char(80), 
	datum	datetime, 
	eintrag	text, 
	email	char(120),
	url	char(120), 
	ip	char(39)
) engine=MyISAM default character set=utf8;
