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
