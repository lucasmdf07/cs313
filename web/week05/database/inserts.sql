INSERT INTO state (id, name) VALUES (DEFAULT, 'Idaho');
INSERT INTO state (id, name) VALUES (DEFAULT, 'Utah');
INSERT INTO state (id, name) VALUES (DEFAULT, 'California');

INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Rexburg', 1);
INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Provo', 2);
INSERT INTO city (id, name, state_id) VALUES (DEFAULT, 'Los Angeles', 3);

INSERT INTO hotel (id, name, description, address, city_id) VALUES (DEFAULT, 'SpringHill Suites', 'SpringHill Suites is a brand of hotels operated by Marriott International. Geared toward the upper-moderate lodging segment of the hospitality industry, the chain consists of all-suite hotels. As of December 31, 2018, it has 414 hotels with 48,959 rooms. Wikipedia', '1177 S Yellowstone Hwy, Rexburg, ID 83440', 1);
INSERT INTO hotel (id, name, description, address, city_id) VALUES (DEFAULT, 'Super 8', 'Super 8 Worldwide, formerly Super 8 Motels, is the worlds largest budget hotel chain, with hotels in the United States, Canada, China and Germany. The company is a subsidiary of Wyndham Worldwide, formerly a part of Cendant. As of December 31, 2018, it has 2,889 properties with 178,028 rooms.', '1555 N Canyon Rd, Provo, UT 84604', 2);
INSERT INTO hotel (id, name, description, address, city_id) VALUES (DEFAULT, 'Four Seasons Hotel', 'Four Seasons Hotels Limited, trading as Four Seasons Hotels and Resorts, is an international luxury hospitality company headquartered in Toronto, Ontario, Canada. Four Seasons operates more than 100 hotels worldwide. Since 2007, Bill Gates and Prince Al-Waleed bin Talal have been majority owners of the company.', '300 Doheny Dr, Los Angeles, CA 90048', 3);

INSERT INTO picture (url, name, hotel_id) VALUES ('https://www.yellowstoneteton.org/media/spring-hill-suites-rexburg-thumb_72274_73659.jpg', 'Spring Hill', 1);
INSERT INTO picture (url, name, hotel_id) VALUES ('https://d3vhvq4fea7n1x.cloudfront.net/original/aff.bstatic.com/images/hotel/max500/133/13343163.jpg', 'Super 8', 2);
INSERT INTO picture (url, name, hotel_id) VALUES ('https://www.fourseasons.com/alt/img-opt/~70.1530.0,0000-241,2500-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/LAX/LAX_905_original.jpg', 'Four Seasons Hotel', 3);
