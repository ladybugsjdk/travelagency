DROP DATABASE IF EXISTS BlackMesaTravel;

CREATE DATABASE BlackMesaTravel;

USE BlackMesaTravel;

CREATE TABLE Users
(
   UserID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   FirstName varchar(30) NOT NULL,
   LastName varchar(30) NOT NULL,
   EmailAddress varchar(30) NOT NULL,
   uPassword varchar(20) NOT NULL
);


INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('John','Doe', 'johndoe@email.com', 'password1');
INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('Jane','Doe', 'janedoe@email.com', 'password2');
INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('Test','Tester', 'testtester@email.com', 'password3');
