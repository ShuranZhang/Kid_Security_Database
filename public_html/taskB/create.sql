SET foreign_key_checks = 0;
DROP TABLE IF EXISTS `KID`;

CREATE TABLE `KID`(
 `Fname` varchar(300) DEFAULT NULL,
 `Lname` varchar(300) DEFAULT NULL,
 `ID` int  PRIMARY KEY,
 `Age` int  DEFAULT NULL,
 `Sex` varchar(1)  DEFAULT NULL,
 `Address` varchar(400) DEFAULT NULL,
 `School_ID` int,
 `District` varchar(200) DEFAULT NULL  
);

DROP TABLE IF EXISTS `SCHOOL`;
CREATE TABLE `SCHOOL`(
 `Name` varchar(300) DEFAULT NULL,
 `Address` varchar(400) DEFAULT NULL,
 `Contact` int DEFAULT NULL,
 `SchoolIID` int PRIMARY KEY
);


DROP TABLE IF EXISTS `POLICEDEPARTMENT`;
CREATE TABLE `POLICEDEPARTMENT`(
 `Name` varchar(300) DEFAULT NULL,
    `Address` varchar(400) DEFAULT NULL,
    `Contact`int DEFAULT NULL,
    `District`  varchar(200)  PRIMARY KEY
);

DROP TABLE IF EXISTS `MISSINGCASE`;

CREATE TABLE `MISSINGCASE`(
 `CaseID` int(10) PRIMARY KEY,
    `Reporter Name` varchar(300) DEFAULT NULL,
    `Reporter Contact` int(10) DEFAULT NULL,
    `District` varchar(200) DEFAULT NULL,
);

DROP TABLE IF EXISTS `GUARDIAN`;
CREATE TABLE `GUARDIAN` (
 `FName` varchar(300),
    `LName` varchar(300),
    `K_ID` int(10),
    `Contact` int(10) DEFAULT NULL,
    PRIMARY KEY (`FName`,`LName`,`K_ID`),
    FOREIGN KEY (K_ID) REFERENCES KID(ID)
     ON DELETE CASCADE ON UPDATE CASCADE    );
