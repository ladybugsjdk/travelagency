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


CREATE TABLE BIOMES (
	BiomeId	int	AUTO_INCREMENT NOT NULL,
	BiomeName	varchar(50)	NOT NULL,
	PRIMARY KEY (BiomeId)

);

CREATE TABLE PREMIER_LOCATIONS
(
   LocationId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   BiomeId int NOT NULL,
   Country varchar(30) NOT NULL,
   LocationName varchar(30) NOT NULL,
   Description varchar(255) NOT NULL,
   Latitude Double NOT NULL,
   Longitude Double NOT NULL,
   FOREIGN KEY (BiomeId) REFERENCES BIOMES(BiomeId)
);

CREATE TABLE ACTIVITIES (
	ActivityId	int	AUTO_INCREMENT NOT NULL PRIMARY KEY,
	ActivityName1	varchar(255)	NOT NULL,
	ActivityName2	varchar(255)	NOT NULL,
	ActivityName3	varchar(255)	NOT NULL,
	LocationId	int,
	FOREIGN KEY (LocationId) REFERENCES PREMIER_LOCATIONS(LocationId)
);


CREATE TABLE PACKAGES	
(
	PackageID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	LocationId int NOT NULL,
	PricePerDay double NOT NULL,
	StartDate date NOT NULL,
	EndDate date NOT NULL,
	FOREIGN KEY (LocationId) REFERENCES PREMIER_LOCATIONS(LocationId)
);

INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('John','Doe', 'johndoe@email.com', 'password1');
INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('Jane','Doe', 'janedoe@email.com', 'password2');
INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('Test','Tester', 'testtester@email.com', 'password3');

INSERT INTO Biomes (BiomeName) VALUES ('City');
INSERT INTO Biomes (BiomeName) VALUES ('Mountain');
INSERT INTO Biomes (BiomeName) VALUES ('Beach');
INSERT INTO Biomes (BiomeName) VALUES ('Desert');
INSERT INTO Biomes (BiomeName) VALUES ('Tundra');
INSERT INTO Biomes (BiomeName) VALUES ('Island');

INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (6, 'United States', 'Hawaii', 'An isolated volcanic archipelago in the Central Pacific. Rugged landscapes of cliffs, waterfalls, tropical foliage and beaches.', 21.3069, 157.8583);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'France', 'Paris', 'France\'s capital, is a major European city and a global center for art, fashion, gastronomy and culture.', 48.8566, 2.3522);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'United States', 'New York', 'Its iconic sites include skyscrapers such as the Empire State Building and sprawling Central Park.', 40.7128, 74.0060);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'Italy', 'Rome', 'A sprawling, cosmopolitan city with nearly 3,000 years of globally influential art, architecture and culture on display.', 41.9028, 12.4964);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'Japan', 'Tokyo', 'Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples.', 35.6762, 139.6503);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (3, 'Bahamas', 'Nassau', 'A coral-based archipelago in the Atlantic Ocean.', 25.0480, 77.3554);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (3, 'Westeros', 'White Harbor', 'Westeros is bordered to the west by the Sunset Sea, to the south by the Summer Sea and to the east by the Narrow Sea and Shivering Sea.', 00.0000, 00.0000);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'United States', 'Seattle', 'A city on Puget Sound in the Pacific Northwest, is surrounded by water, mountains and evergreen forests', 47.6062, 122.3321);

INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Swimming', 'Hiking', 'Snorkeling', 1);
INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Museums', 2);
INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Shopping', 'Sightseeing', 'Nightlife', 3);
INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Museums', 4);
INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Food', 'Sightseeing', 'Shopping', 5);
INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Swimming', 'Boating', 'Snorkeling', 6);
INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Dragons', 'Famine', 'War', 7);
INSERT INTO Activities (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Thrifting', 8);

INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (1, 439, '2019-04-01', '2020-04-01');
INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (2, 549, '2019-05-01', '2019-08-01');
INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (3, 200, '2019-06-01', '2020-04-01');
INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (4, 880, '2019-04-10', '2020-05-29');
INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (5, 989, '2019-04-30', '2019-10-01');
INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (6, 269, '2019-04-01', '2020-04-01');
INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (7, 600, '2019-04-01', '2020-04-01');
INSERT INTO Packages (LocationId, PricePerDay, StartDate, EndDate) VALUES (8, 399, '2019-04-01', '2020-04-01');