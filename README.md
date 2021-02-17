# Spothole

Spothole is a Web database application that will allow citizens to report potholes within their local community so that they can be fixed. 

The application allows users to submit information about the pothole including their name, phone number and/or email, the location of the pothole, and a description to provide additional information about the location and/or pothole. 

The user can also report the pothole anonymously.

## Installation

1. Execute the following SQL script to setup the Database Tables


```sql
CREATE TABLE `pothole` (
 `potholeId` int(11) NOT NULL AUTO_INCREMENT,
 `city` varchar(100) NOT NULL,
 `state` varchar(100) NOT NULL,
 `zipCode` varchar(20) NOT NULL,
 `description` varchar(255) NOT NULL,
 `firstName` varchar(255) NOT NULL,
 `lastName` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `phone` varchar(100) NOT NULL,
 `streetAddress` varchar(255) NOT NULL,
 `isAnonymous` varchar(1) NOT NULL,
 `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
 `status` varchar(100) NOT NULL,
 `lastUpdated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
 PRIMARY KEY (`potholeId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4


CREATE TABLE Person (
    UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Passcode VARCHAR (255) NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    DOB DATE,
    Gender VARCHAR (255),
    Address VARCHAR (255),
    Email VARCHAR (255),
    Phone VARCHAR (18),
    City VARCHAR (255),
    County VARCHAR (255),
    ZIPCode VARCHAR (5),
    TitleRole VARCHAR (255)
);

INSERT INTO Person VALUES('000001','Password1','John','Smith','1989-1-11','Male','123 STREETA','js@iu.edu','4900980837','GREENWICH','Hamilton','28394','citizen');
INSERT INTO Person VALUES('000002','Password2','Bart','Allen','1990-6-6','Male','3 STREETE','ba@iu.edu','4637980837','NASHVILLE','Shelby','27384','citizen');
INSERT INTO Person VALUES('000003','Password3','Adam','West','1989-7-9','Male','23 STREETD','aw@iu.edu','2234980837','ASHTON','Marion','18364','citizen');

INSERT INTO Person VALUES('000004','Password4','Miguel','Smith','1990-5-6','Male','76 SUTHER BEND','ms@iu.edu','2900980837','INDIANAPOLIS','Johnson','81664','admin');
INSERT INTO Person VALUES('000005','Password5','Garric','Smith','1991-1-8','Male','288 TREEHOUSE BEND','gs@iu.edu','4905598837','SOUTHBEND','Franklin','29174','admin');
INSERT INTO Person VALUES('000006','Password6','Shruti','Smith','1992-7-1','Female','9878 GLOW PASS','as@iu.edu','5900980837','GREENVILLE','Bartholomew','28364','admin');
```

2. Update the following parameters in [dbconnections.php](https://github.com/garricm/SPOTHOLE/blob/master/dbconnection.php)

```php
$server = "db_url";
$username = "username";
$password = "password";
$database = "db_name";
``` 

## Collaborators
* [Miguel Angel Llamas Estrada](https://www.linkedin.com/in/miguel-angel-llamas-estrada)
* [Shruti Devulapalli](#)
* [Garric Mathias](https://www.linkedin.com/in/garric/)
