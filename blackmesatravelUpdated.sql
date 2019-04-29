DROP DATABASE IF EXISTS BlackMesaTravel2;

CREATE DATABASE BlackMesaTravel2;

USE BlackMesaTravel2;

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
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2, 'United States', 'Yellowstone', 'Yellowstone National Park is an American national park located in Wyoming, Montana, and Idaho. It was established by the U.S. Congress and signed into law by President Ulysses S. Grant on March 1, 1872.', 44.4280, 110.5885);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2, 'Nepal', 'Kathmandu', 'Kathmandu is the capital city and largest city of Nepal with a population of around 1 million. Kathmandu is also the largest metropolis in the Himalayan hill region. ', 27.7172, 85.3240);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (3, 'United States', 'Los Angeles', 'Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry.', 34.0522, 118.2437);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (3, 'Venezuela', 'Caracas', 'Caracas, Venezuela\'s capital, is a commercial and cultural center located in a northern mountain valley.', 10.4806, 66.9036);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'Mexico', 'Mexico City', 'Mexico City is the densely populated, high-altitude capital of Mexico. It\'s known for its Templo Mayor.', 19.4326, 99.1332);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'United Arab Emirates', 'Dubai', 'Dubai is a city and emirate in the United Arab Emirates known for luxury shopping, ultramodern architecture and a lively nightlife scene.', 25.2048, 55.2708);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'England', 'London', 'London, the capital of England and the United Kingdom, is a 21st-century city with history stretching back to Roman times.', 51.5074, 0.1278);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1, 'Germany', 'Berlin', 'Berlin, Germany\’s capital, dates to the 13th century. Reminders of the city\'s turbulent 20th-century history include its Holocaust memorial and the Berlin Wall\'s graffitied remains.', 52.5200, 13.4050);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (3, 'United States', 'Las Vegas', 'Las Vegas, officially the City of Las Vegas and often known simply as Vegas, is the 28th-most populated city in the United States, the most populated city in the state of Nevada, and a popular gambling city.', 36.1699, 115.1398);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2, 'Peru', 'Machu Picchu', 'Built in the 15th century and later abandoned, it\’s renowned for its sophisticated dry-stone walls that fuse huge blocks without the use of mortar, intriguing buildings that play on astronomical alignments and panoramic views.', 13.1631, 72.5450);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (3, 'Argentina', 'Buenos Aires', 'Buenos Aires is Argentina\’s big, cosmopolitan capital city. Its center is the Plaza de Mayo, lined with stately 19th-century buildings including Casa Rosada, the iconic, balconied presidential palace.', 34.6037, 58.3816);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2, 'Nepal', 'Mount Everest', 'Mount Everest, known in Nepali as Sagarmatha and in Tibetan as Chomolungma, is Earth\'s highest mountain above sea level, located in the Mahalangur Himal sub-range of the Himalayas.', 27.9881, 86.9250);

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