create table users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	password varchar(30),
	phone VARCHAR(10),
	created_at TIMESTAMP
);

create table products (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	type VARCHAR(20),
	name VARCHAR(20),
	price INT(10)
);

create table subscriptions (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	qid VARCHAR(20),
	userid INT(6),
	start TIMESTAMP,
	end TIMESTAMP,
	total INT(6) UNSIGNED
);

create table services (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	qid VARCHAR(20),
	userid INT(6),
	start TIMESTAMP,
	end TIMESTAMP,
	weeks INT(6) UNSIGNED,
	total INT(6) UNSIGNED
);

create table goods (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	qid VARCHAR(20),
	userid INT(6),
	quantity INT(6) UNSIGNED,
	total INT(6) UNSIGNED
);

create table quotations (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	uid VARCHAR(20),
	userid INT(6),
	total INT(6) UNSIGNED
);

INSERT INTO products (type, name, price)
VALUES
	('subscription', 'teach a course', 10),
	('service', 'teaching session', 15),
	('good', 'textbook', 7)
