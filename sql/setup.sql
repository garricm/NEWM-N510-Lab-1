-- Create Table 'Pothole'
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