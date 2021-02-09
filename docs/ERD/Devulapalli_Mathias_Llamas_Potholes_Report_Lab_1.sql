CREATE DATABASE potholesreport;
USE potholesreport;

CREATE TABLE Person (
    UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Passcode VARCHAR (255) NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    DOB DATE,
    Gender VARCHAR (255),
    Address VARCHAR (255),
    City VARCHAR (255),
    County VARCHAR (255),
    ZIPCode VARCHAR (5),
    TitleRole VARCHAR (255)
);

CREATE TABLE Incident (
    IncidentID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserID VARCHAR (255) NOT NULL,
    DateReported VARCHAR(255) NOT NULL,
    DateFixed VARCHAR(255) NOT NULL,
    LastUpdatedDate DATE,
    Severity VARCHAR (255),
    Address VARCHAR (255),
    County VARCHAR (255),
    City VARCHAR (255),
    ZIPCode VARCHAR (5),
    Landmark VARCHAR (255),
    Note VARCHAR (500),
    Stage VARCHAR (20),
    Picture BLOB
);