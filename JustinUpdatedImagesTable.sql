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
   Description varchar(2000) NOT NULL,
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

CREATE TABLE IMAGES
(
	ImageID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    URL	 varchar(2083)	NOT NULL,
	LocationId	int ,
	FOREIGN KEY (LocationId) REFERENCES PREMIER_LOCATIONS(LocationId)
);

INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('John','Doe', 'johndoe@email.com', 'password1');
INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('Jane','Doe', 'janedoe@email.com', 'password2');
INSERT INTO Users (FirstName, LastName, EmailAddress, uPassword) VALUES ('Test','Tester', 'testtester@email.com', 'password3');

INSERT INTO BIOMES (BiomeName) VALUES ('City');
INSERT INTO BIOMES (BiomeName) VALUES ('Mountain');
INSERT INTO BIOMES (BiomeName) VALUES ('Beach');
INSERT INTO BIOMES (BiomeName) VALUES ('Desert');
INSERT INTO BIOMES (BiomeName) VALUES ('Tundra');
INSERT INTO BIOMES (BiomeName) VALUES ('Island');

INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (6,	'USA',	'Hawaii',	'Hawaii, a U.S. state, is an isolated volcanic archipelago in the Central Pacific. Its islands are renowned for their rugged landscapes of cliffs, waterfalls, tropical foliage and beaches with gold, red, black and even green sands. Of the 6 main islands, Oahu has Hawaii’s biggest city and capital, Honolulu, home to crescent Waikiki Beach and Pearl Harbor\'s WWII memorials.',	19.8968,	-155.5828);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'France',	'Paris',	'Paris, France\'s capital, is a major European city and a global center for art, fashion, gastronomy and culture. Its 19th-century cityscape is crisscrossed by wide boulevards and the River Seine. Beyond such landmarks as the Eiffel Tower and the 12th-century, Gothic Notre-Dame cathedral, the city is known for its cafe culture and designer boutiques along the Rue du Faubourg Saint-Honoré.',	48.8566,	2.3522);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'USA',	'New York City',	'New York City comprises 5 boroughs sitting where the Hudson River meets the Atlantic Ocean. At its core is Manhattan, a densely populated borough that’s among the world’s major commercial, financial and cultural centers. Its iconic sites include skyscrapers such as the Empire State Building and sprawling Central Park. Broadway theater is staged in neon-lit Times Square.',	40.7128,	-74.0060);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'Italy',	'Rome',	'Rome, Italy’s capital, is a sprawling, cosmopolitan city with nearly 3,000 years of globally influential art, architecture and culture on display. Ancient ruins such as the Forum and the Colosseum evoke the power of the former Roman Empire. Vatican City, headquarters of the Roman Catholic Church, has St. Peter’s Basilica and the Vatican Museums, which house masterpieces such as Michelangelo’s Sistine Chapel frescoes.',	41.9028,	12.4964);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'Japan',	'Tokyo',	'Tokyo, Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods. The Imperial Palace sits amid large public gardens. The city\'s many museums offer exhibits ranging from classical art (in the Tokyo National Museum) to a reconstructed kabuki theater (in the Edo-Tokyo Museum).',	35.6762,	139.6503);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2,	'USA',	'YellowStone',	'Yellowstone National Park is a nearly 3,500-sq.-mile wilderness recreation area atop a volcanic hot spot. Mostly in Wyoming, the park spreads into parts of Montana and Idaho too. Yellowstone features dramatic canyons, alpine rivers, lush forests, hot springs and gushing geysers, including its most famous, Old Faithful. It\'s also home to hundreds of animal species, including bears, wolves, bison, elk and antelope.',	44.4280,	-110.5885);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (6,	'Bahamas',	'Bahamas',	'The Bahamas is a coral-based archipelago in the Atlantic Ocean. Its 700-plus islands and cays range from uninhabited to packed with resorts. The northernmost, Grand Bahama, and Paradise Island, home to many large-scale hotels, are among the best known. Scuba diving and snorkeling sites include the massive Andros Barrier Reef, Thunderball Grotto (used in James Bond films) and the black-coral gardens off Bimini.',	25.0343,	-77.3963);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2,	'Nepal',	'Nepal',	'Nepal, officially the Federal Democratic Republic of Nepal, is a landlocked country in South Asia. It is located mainly in the Himalayas but also includes parts of the Indo-Gangetic Plain. With an estimated population of 26.4 million, it is 48th largest country by population and 93rd largest country by area.',	28.3949,	84.1240);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'USA',	'Seattle',	'Seattle, a city on Puget Sound in the Pacific Northwest, is surrounded by water, mountains and evergreen forests, and contains thousands of acres of parkland. Washington State’s largest city, it’s home to a large tech industry, with Microsoft and Amazon headquartered in its metropolitan area. The futuristic Space Needle, a 1962 World’s Fair legacy, is its most iconic landmark.',	47.6062,	-122.3321);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'USA',	'Los Angeles',	'Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry. Near its iconic Hollywood sign, studios such as Paramount Pictures, Universal and Warner Brothers offer behind-the-scenes tours. On Hollywood Boulevard, TCL Chinese Theatre displays celebrities’ hand- and footprints, the Walk of Fame honors thousands of luminaries and vendors sell maps to stars’ homes.',	34.0522,	-118.2437);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2,	'Venezuela',	'Venezuela',	'Venezuela is a country on the northern coast of South America with diverse natural attractions. Along its Caribbean coast are tropical resort islands including Isla de Margarita and the Los Roques archipelago. To the northwest are the Andes Mountains and the colonial town of Mérida, a base for visiting Sierra Nevada National Park. Caracas, the capital, is to the north.',	10.4806,	-66.9036);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'Mexico',	'Mexico City',	'Mexico City is the densely populated, high-altitude capital of Mexico. It\'s known for its Templo Mayor (a 13th-century Aztec temple), the baroque Catedral Metropolitana de México of the Spanish conquistadors and the Palacio Nacional, which houses historic murals by Diego Rivera. All of these are situated in and around the Plaza de la Constitución, the massive main square also known as the Zócalo.',	19.4326,	-99.1332);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'UAE',	'Dubai',	'Dubai is a city and emirate in the United Arab Emirates known for luxury shopping, ultramodern architecture and a lively nightlife scene. Burj Khalifa, an 830m-tall tower, dominates the skyscraper-filled skyline. At its foot lies Dubai Fountain, with jets and lights choreographed to music. On artificial islands just offshore is Atlantis, The Palm, a resort with water and marine-animal parks.',	25.2048,	55.2708);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'England',	'London',	'London, the capital of England and the United Kingdom, is a 21st-century city with history stretching back to Roman times. At its centre stand the imposing Houses of Parliament, the iconic ‘Big Ben’ clock tower and Westminster Abbey, site of British monarch coronations. Across the Thames River, the London Eye observation wheel provides panoramic views of the South Bank cultural complex, and the entire city.',	51.5074,	-0.1278);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'Germany',	'Berlin',	'Berlin, Germany’s capital, dates to the 13th century. Reminders of the city\'s turbulent 20th-century history include its Holocaust memorial and the Berlin Wall\'s graffitied remains. Divided during the Cold War, its 18th-century Brandenburg Gate has become a symbol of reunification. The city\'s also known for its art scene and modern landmarks like the gold-colored, swoop-roofed Berliner Philharmonie, built in 1963.',	52.5200,	13.4050);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'USA',	'Las Vegas',	'Las Vegas, officially the City of Las Vegas and often known simply as Vegas, is the 28th-most populated city in the United States, the most populated city in the state of Nevada, and the county seat of Clark County.',	36.1699,	-115.1398);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2,	'Peru',	'Machu Picchu',	'Machu Picchu is an Incan citadel set high in the Andes Mountains in Peru, above the Urubamba River valley. Built in the 15th century and later abandoned, it’s renowned for its sophisticated dry-stone walls that fuse huge blocks without the use of mortar, intriguing buildings that play on astronomical alignments and panoramic views. Its exact former use remains a mystery.',	-13.1631,	-72.5450);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (1,	'Argentina',	'Buenos Aires',	'Buenos Aires is Argentina’s big, cosmopolitan capital city. Its center is the Plaza de Mayo, lined with stately 19th-century buildings including Casa Rosada, the iconic, balconied presidential palace. Other major attractions include Teatro Colón, a grand 1908 opera house with nearly 2,500 seats, and the modern MALBA museum, displaying Latin American art.',	-34.6037,	-58.3816);
INSERT INTO PREMIER_LOCATIONS (BiomeId, Country, LocationName, Description, Latitude, Longitude) VALUES (2,	'China',	'Mount Everest',	'Mount Everest, known in Nepali as Sagarmatha and in Tibetan as Chomolungma, is Earth\'s highest mountain above sea level, located in the Mahalangur Himal sub-range of the Himalayas. The international border between Nepal and China runs across its summit point.',	27.9881,	86.9250);

INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Swimming', 'Hiking', 'Snorkeling', 1);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Museums', 2);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Shopping', 'Sightseeing', 'Nightlife', 3);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Museums', 4);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Food', 'Sightseeing', 'Shopping', 5);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Swimming', 'Boating', 'Snorkeling', 6);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Dragons', 'Famine', 'War', 7);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Thrifting', 8);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Museums', 9);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Food', 'Sightseeing', 'Shopping', 10);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Swimming', 'Boating', 'Snorkeling', 11);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Boating', 'Museums', 12);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Thrifting', 13);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Museums', 14);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Food', 'Sightseeing', 'Shopping', 15);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Swimming', 'Boating', 'Snorkeling', 16);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Boating', 'Museums', 17);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Thrifting', 18);
INSERT INTO ACTIVITIES (ActivityName1, ActivityName2, ActivityName3, LocationId) VALUES ('Sightseeing', 'Food', 'Thrifting', 19);

INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (1, 439, '2019-04-01', '2020-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (2, 549, '2019-05-01', '2019-08-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (3, 200, '2019-06-01', '2020-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (4, 880, '2019-04-10', '2020-05-29');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (5, 989, '2019-04-30', '2019-10-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (6, 269, '2019-04-01', '2020-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (7, 600, '2019-04-01', '2020-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (8, 399, '2019-04-01', '2020-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (9, 500, '2019-06-11', '2020-10-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (10, 800, '2019-10-01', '2019-12-30');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (11, 1200, '2019-04-01', '2021-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (12, 745, '2019-10-01', '2021-01-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (13, 400, '2020-01-11', '2020-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (14, 780, '2019-08-20', '2020-05-20');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (15, 980, '2019-10-01', '2021-10-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (16, 550, '2019-12-30', '2020-05-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (17, 999, '2019-04-01', '2020-04-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (18, 1100, '2019-10-01', '2021-08-01');
INSERT INTO PACKAGES (LocationId, PricePerDay, StartDate, EndDate) VALUES (19, 195, '2019-04-01', '2020-04-01');

INSERT INTO IMAGES (URL, LocationId) VALUES ('https://singularityhub.com/wp-content/uploads/2018/06/2045-carbon-neutral-pledge-na-pali-coast-kauai-1053409016-1068x601.jpg', 1);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://www.telegraph.co.uk/content/dam/Travel/hotels/europe/france/paris/paris-cityscape-overview-guide.jpg?imwidth=450', 2);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://thenypost.files.wordpress.com/2018/12/181222-stuy-town.jpg?quality=90&strip=all&w=618&h=410&crop=1', 3);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://travelpassionate.com/wp-content/uploads/2017/12/Colosseum-with-clear-blue-sky-Rome-Italy.-Rome-landmark-and-antique-architecture.-Rome-Colosseum-is-one-of-the-best-known-monuments-of-Rome-and-Italy-min.jpg', 4);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://www.asgam.com/wp-content/uploads/2018/12/tokyo-japan-FDEALS0217.jpg', 5);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://vivaglammagazine.com/wp-content/uploads/2018/04/The-Best-Places-to-Stay-in-Yellowstone-National-Park-1000x600.jpg', 6);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://i1.wp.com/travelswithbibi.com/wp-content/uploads/2018/10/Pardise-Island-Bahamas.jpg?fit=4032%2C3024&ssl=1', 7);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://brightcove04pmdo-a.akamaihd.net/5104226627001/5104226627001_5339731547001_5334486754001-vs.jpg?pubId=5104226627001&videoId=5334486754001', 8);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://www.nationalgeographic.com/content/dam/travel/Guide-Pages/north-america/seattle-travel.adapt.1900.1.jpg', 9);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://media.wired.com/photos/5b9c01161e60052cdc38bdef/master/pass/losangeles-947698310.jpg', 10);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://www.planetware.com/photos-large/VEN/venezuela-angel-falls-morning-view.jpg', 11);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://theculturetrip.com/wp-content/uploads/2017/05/flickr-lui_piquee.jpg', 12);
INSERT INTO IMAGES (URL, LocationId) VALUES ('http://www.travelstart.co.za/blog/wp-content/uploads/2018/05/burjkhalifa.jpg', 13);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://www.fodors.com/wp-content/uploads/2017/10/HERO_UltimateLondon_Hero_shutterstock412054315.jpg', 14);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://www.berlin-welcomecard.de/sites/default/files/styles/stage_desktop_20x/public/berlin-welcomecard_hero_2880__1.jpg?itok=fgbQwjEO&timestamp=1528123533', 15);
INSERT INTO IMAGES (URL, LocationId) VALUES ('http://res.cloudinary.com/simpleview/image/upload/v1497480003/clients/lasvegas/strip_b86ddbea-3add-4995-b449-ac85d700b027.jpg', 16);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://www.intrepidtravel.com/adventures/wp-content/uploads/2018/06/shutterstock_282046022.jpg', 17);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://lonelyplanetimages.imgix.net/a/g/hi/t/4c410251e0146b2edd2b8b1d64a02047-buenos-aires.jpg?sharp=10&vib=20&w=1200', 18);
INSERT INTO IMAGES (URL, LocationId) VALUES ('https://s.abcnews.com/images/International/everest-gty-er-190218_hpMain_16x9_992.jpg', 19);