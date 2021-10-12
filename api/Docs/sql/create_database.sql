create database api_slim character set utf8 collate utf8_general_ci;

use api_slim;

create table users(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR (100) NOT NULL,
    email VARCHAR (100) NOT NULL,
    pass VARCHAR (45) NOT NULL,
	phone_mobile VARCHAR(15) NOT NULL,
    active TINYINT(1) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME,
    PRIMARY KEY(id)
);

create table tokens(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    token varchar(1000) NOT NULL,
    refresh_token varchar(1000) NOT NULL,
    expired_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id)
        REFERENCES users(id)
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
	created_at DATETIME NOT NULL,
    updated_at DATETIME,
    PRIMARY KEY(id),
        FOREIGN KEY (type_id)
        REFERENCES type_collection(id)
        ON DELETE CASCADE
);

create table loans(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    collection_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
	created_at DATETIME NOT NULL,
    devolution_date DATETIME,
    PRIMARY KEY(id),
    FOREIGN KEY (collection_id)
        REFERENCES collection(id)
        ON DELETE CASCADE,
	FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
);

