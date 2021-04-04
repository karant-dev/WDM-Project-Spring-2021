CREATE TABLE Continents (
    continent_id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(15)
);

CREATE TABLE Countries (
    country_id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100),
    continent_id int,
    CONSTRAINT fk_continent
    FOREIGN KEY (continent_id)
        REFERENCES Continents(continent_id)
);

CREATE TABLE Users (
    user_id int PRIMARY KEY AUTO_INCREMENT,
    f_name varchar(15),
    l_name varchar(15),
    m_name varchar(15),
    date_of_birth DATE,
    gender varchar(10),
    email varchar(50),
    phone varchar(12),
    city varchar(20),
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