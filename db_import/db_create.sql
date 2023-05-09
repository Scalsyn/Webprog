
CREATE DATABASE cardealer_db CHARACTER SET utf8 COLLATE utf8_general_ci;

/*
CREATE TABLE colors
(
    pack VARCHAR(30) PRIMARY KEY,
    colors VARCHAR(100)
);

CREATE TABLE cars
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    brand VARCHAR(50),
    model VARCHAR(50),
    color VARCHAR(30),
    price INT,
    FOREIGN KEY(color) REFERENCES colors(pack)
);

CREATE TABLE vendors
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    birthdate DATE,
    address VARCHAR(50),
    phone VARCHAR(15)
);

CREATE TABLE customers
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    birthdate DATE,
    address VARCHAR(50),
    phone VARCHAR(15)
);

CREATE TABLE sales
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    car INT,
    customer INT,
    vendor INT,
    date DATETIME,
    FOREIGN KEY(car) REFERENCES cars(id),
    FOREIGN KEY(customer) REFERENCES customers(id),
    FOREIGN KEY(vendor) REFERENCES vendors(id)
);
*/