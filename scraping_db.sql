CREATE DATABASE scraping_db;
USE scraping_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE dentists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(20)
);
