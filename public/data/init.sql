CREATE DATABASE dinotrove;

  use dinotrove;

  CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    userID VARCHAR(50) NOT NULL,
    age INT(3),
  );