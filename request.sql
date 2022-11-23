CREATE DATABASE `d-tailing` character set 'UTF8';

USE `d-tailing`;

CREATE TABLE users(
    Id_users INT AUTO_INCREMENT,
    firstname VARCHAR(25),
    lastname VARCHAR(25),
    maiil VARCHAR(125),
    phone VARCHAR(12),
    created_at DATE,
    valided_at DATE,
    password VARCHAR(50),
    PRIMARY KEY(Id_users)
);

CREATE TABLE cars(
    Id_cars INT AUTO_INCREMENT,
    type INT(2),
    PRIMARY KEY(Id_cars)
);

CREATE TABLE cars_users(
    Id_cars_users INT AUTO_INCREMENT,
    Id_users INT NOT NULL,
    Id_cars INT NOT NULL,
    PRIMARY KEY(Id_cars_users),
    FOREIGN KEY(Id_users) REFERENCES users(Id_users),
    FOREIGN KEY(Id_cars) REFERENCES cars(Id_cars)
);

CREATE TABLE prestations(
    Id_prestations INT AUTO_INCREMENT,
    title VARCHAR(50),
    description TEXT,
    price DECIMAL(4,2),
    PRIMARY KEY(Id_prestations)
);

CREATE TABLE appointments(
    Id_appointments INT AUTO_INCREMENT,
    datehour DATETIME,
    Id_prestations INT NOT NULL,
    Id_cars_users INT NOT NULL,
    PRIMARY KEY(Id_appointments),
    FOREIGN KEY(Id_prestations) REFERENCES prestations(Id_prestations),
    FOREIGN KEY(Id_cars_users) REFERENCES cars_users(Id_cars_users)
);
