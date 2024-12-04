CREATE DATABASE `aqi_data`;

-- CREATE TABLE `user_air_quality` (
--     id INT NOT NULL AUTO_INCREMENT ,
--     city VARCHAR(255) NOT NULL,
--     country VARCHAR(255) NOT NULL,
--     aqi INT NOT NULL,
--     PRIMARY KEY (`id`) 
-- );

CREATE TABLE `feedback` (
    id INT NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    feedbackMessage TEXT NOT NULL,
    PRIMARY KEY (`id`) 
);