create database api_slim character set utf8 collate utf8_general_ci;

use api_slim;

create table persons(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR (100) NOT NULL,
    genre VARCHAR (1) NOT NULL,
    cpf VARCHAR(20),
	created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id)
);


create table users(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR (100) NOT NULL,
    pass VARCHAR (45) NOT NULL,
    active TINYINT(1) NOT NULL,
    person_id INT UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (person_id)
        REFERENCES persons(id)
        ON DELETE CASCADE
);

create table type_collection(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR (100) NOT NULL,
	created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id)
);

create table collection(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR (255) NOT NULL,
    author VARCHAR (100) NOT NULL,
	type_id INT UNSIGNED NOT NULL,
	active TINYINT(1) NOT NULL,
    PRIMARY KEY(id),
	created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
        FOREIGN KEY (type_id)
        REFERENCES type_collection(id)
        ON DELETE CASCADE
);

create table loans(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    collection_id INT UNSIGNED NOT NULL,
    person_id INT UNSIGNED NOT NULL,
	loan_date DATETIME NOT NULL,
    devolution_date DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (collection_id)
        REFERENCES collection(id)
        ON DELETE CASCADE,
	FOREIGN KEY (person_id)
        REFERENCES persons(id)
        ON DELETE CASCADE
);

