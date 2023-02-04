# CREATE DATABASE you_got_framed_test CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255),
    primary key(id)
);

CREATE TABLE products(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(64),
    price FLOAT,
    primary key(id)
);
