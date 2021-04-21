CREATE TABLE Continents (
    continent_id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(15)
);

INSERT INTO `Continents` (`continent_id`, `name`) VALUES
(1, 'Asia'),
(2, 'Europe'),
(3, 'Australia'),
(4, 'Antarctica'),
(5, 'Africa'),
(6, 'North America'),
(7, 'South America');

CREATE TABLE Countries (
    country_id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100),
    continent_id int,
    CONSTRAINT fk_continent
    FOREIGN KEY (continent_id)
        REFERENCES Continents(continent_id)
);

INSERT INTO `Countries` (`country_id`, `name`, `continent_id`) VALUES
(1, 'United States of America', 6),
(2, 'Canada', 6),
(3, 'Mexico', 6),
(4, 'India', 1),
(5, 'Russia', 1);

CREATE TABLE Users (
    user_id int PRIMARY KEY AUTO_INCREMENT,
    onboarding BIT(1) DEFAULT 0,
    f_name varchar(15),
    l_name varchar(15),
    m_name varchar(15),
    date_of_birth DATE,
    gender varchar(10),
    email varchar(50),
    phone varchar(12),
    city varchar(20),
    username varchar(20),
    user_password varchar(100),
    address tinytext,
    home_state varchar(50),
    profile_picture_location tinytext,
    user_role enum('immigrant', 'visitor', 'admin', 'superadmin') NOT NULL,
    country_id int,
    CONSTRAINT fk_country
    FOREIGN KEY (country_id)
        REFERENCES Countries(country_id)
);

INSERT INTO `Users` (`user_id`, `f_name`, `l_name`, `m_name`, `date_of_birth`, `gender`, `email`, `phone`, `city`, `user_password`, `address`, `home_state`, `profile_picture_location`, `user_role`, `country_id`, `username`, `onboarding`) VALUES
(2, 'Karan', 'Thakkar', 'Jeeten', '1997-03-16', 'male', 'karanthakkar@gmail.com', '+16822031219', 'Arlington', 'SuperSecurePasswordForKaran', '1001 S Example St, Arlington, TX 76010, U.S.A.', 'Texas', 'profilepictures\\karanProfilePic.jpg', 'admin', 1, 'karanthakkar', b'1'),
(3, 'Abhijeet', 'Rathod', NULL, '1997-01-01', 'male', 'abhijeet@gmail.com', '+16822983198', 'Dallas', 'SuperSecurePasswordForAbhijeet', '2002 E Example St, Dallas, TX 77019, U.S.A.', 'Texas', 'profilepictures\\abhiProfilePic.jpg', 'immigrant', 1, 'abhirathod', b'1'),
(4, 'Shreyalaxmi', 'Talukdar', NULL, '1998-01-01', 'female', 'shreya@gmail.com', '+16829082389', 'Arlington', 'SuperSecurePasswordForShreya', '3003 N Clearly Fake St, Arlington, TX 76019, U.S.A.', 'Texas', 'profilepictures\\shreyaProfilePic.jpg', 'visitor', 1, 'shreyalaxmi', b'0'),
(5, 'Super', 'Admin', 'Duper', '1990-01-01', 'self-ident', 'superadmin@gmail.com', '+19999999999', 'Washington D.C.', 'SuperSecurePasswordForSuperAdmin', '1, Washington Ave, D.C. 1000111, U.S.A.', 'Washington D.C.', 'profilepictures\\superAdminProfilePic.jpg', 'superadmin', 1, 'superadmin', b'0'),
(12, 'FTest', 'LTest', NULL, NULL, NULL, 'karan.thakkar97@gmail.com', '27598278589', 'Dombivli', 'cskldnvkln', '909 Border St', 'Maharashtra', NULL, 'immigrant', 4, 'testuser', b'0');

CREATE TABLE Profiles (
    profile_id int PRIMARY KEY AUTO_INCREMENT,
    work tinytext,
    education tinytext,
    bio text,
    interest text,
    skills text,
    user_id int,
    CONSTRAINT fk_user_profile
    FOREIGN KEY (user_id)
        REFERENCES Users(user_id)
);

INSERT INTO `Profiles` (`profile_id`, `work`, `education`, `bio`, `interest`, `skills`, `user_id`) VALUES
(1, 'NA', 'NA', 'Made this', 'None', 'None', 2),
(2, 'NA', 'NA', 'Abhijeet rathod', 'WDM', 'Coding', 3);

CREATE TABLE Media (
    media_id int PRIMARY KEY AUTO_INCREMENT,
    media_type enum('Photo', 'Video'),
    caption tinytext,
    tag varchar(20),
    file_location tinytext,
    posting_time timestamp,
    user_id int,
    CONSTRAINT fk_user_media
    FOREIGN KEY (user_id)
        REFERENCES Users(user_id)
);

CREATE TABLE Contributions (
    contribution_id int PRIMARY KEY AUTO_INCREMENT,
    contribution_type enum('Tip', 'Contribution'),
    contribution text,
    topic varchar(20),
    posting_time timestamp,
    user_id int,
    CONSTRAINT fk_user_contribution
    FOREIGN KEY (user_id)
        REFERENCES Users(user_id)
);

INSERT INTO `Contributions` (`contribution_id`, `contribution_type`, `contribution`, `topic`, `posting_time`, `user_id`) VALUES
(1, 'Tip', 'Hi this is my first tip!', NULL, '2021-04-05 01:09:08', 3),
(2, 'Tip', 'My second tip!', NULL, '2021-04-05 01:19:17', 3),
(3, 'Contribution', '', NULL, '2021-04-05 01:22:56', 3),
(4, 'Contribution', '', NULL, '2021-04-05 01:24:13', 3),
(5, 'Contribution', 'First contribution!', NULL, '2021-04-05 01:26:19', 3);

CREATE TABLE Blog (
    post_id int PRIMARY KEY AUTO_INCREMENT,
    title tinytext,
    body text,
    posting_time timestamp,
    user_id int,
    CONSTRAINT fk_user_blog
    FOREIGN KEY (user_id)
        REFERENCES Users(user_id)
);

CREATE TABLE Hospitals (
    hospital_id int PRIMARY KEY AUTO_INCREMENT,
    hospital_name tinytext,
    specialty varchar(100),
    email varchar(50),
    phone varchar(12),
    address tinytext,
    zipcode varchar(10),
    country_id int,
    CONSTRAINT fk_country_hospitals
    FOREIGN KEY (country_id)
        REFERENCES Countries(country_id)
);

INSERT INTO `Hospitals` (`hospital_id`, `hospital_name`, `specialty`, `email`, `phone`, `address`, `zipcode`, `country_id`) VALUES
(1, 'St Marys', 'Cardiovascular', 'stmarys@gmail.com', '9374982379', '203 S Collins St', '76015', 1),
(2, 'Watergate Hospital', 'Brain', 'watergate@bighospital.com', '458732952', '251 W Abram St', '75901', 1);

CREATE TABLE Schools (
    school_id int PRIMARY KEY AUTO_INCREMENT,
    school_name tinytext,
    max_study_level varchar(30),
    email varchar(50),
    phone varchar(12),
    address tinytext,
    zipcode varchar(10),
    country_id int,
    CONSTRAINT fk_country_schools
    FOREIGN KEY (country_id)
        REFERENCES Countries(country_id)
);

INSERT INTO `Schools` (`school_id`, `school_name`, `max_study_level`, `email`, `phone`, `address`, `zipcode`, `country_id`) VALUES
(1, 'New York Public School', 'High School', 'nyps@gmail.com', '759834795', '1st Ave, NY', '123458', 1),
(2, 'Vidya Niketan', 'High School', 'vidyaniketan@gmail.com', '9892174814', 'Opposite Premier Factory, Sonarpada, Dombivli East', '421201', 4);
