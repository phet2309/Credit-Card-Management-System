CREATE TABLE IF NOT EXISTS `admin`
(
    `UserId`    INT AUTO_INCREMENT,
    `UserName`  VARCHAR(20) NOT NULL,
    `Password`  VARCHAR(20) NOT NULL,
    `UserType`  VARCHAR(20) NOT NULL,
    PRIMARY KEY(`UserId`)
);
CREATE TABLE IF NOT EXISTS `user`
(   
    `UserId`    INT,
    `UserName`  VARCHAR(20) NOT NULL,
    `Password`  VARCHAR(20) NOT NULL,
    `UserDOB`   DATE NOT NULL,
    `CardType`  VARCHAR(20)
);
CREATE TABLE IF NOT EXISTS `transaction`
(
    `UserId`    INT,
    `TranId`    INT AUTO_INCREMENT,
    `To`        INT NOT NULL,
    `Date`      DATE NOT NULL,
    `Time`      TIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY(`TranId`)
);
CREATE TABLE IF NOT EXISTS `loan`
(
    `BorrowerId`    INT,
    `LoanId`        INT AUTO_INCREMENT,
    `Amount`        INT NOT NULL,
    `Date`          DATE DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `Time`          TIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY(`LoanId`)
);
CREATE TABLE IF NOT EXISTS `report`
(
    `UserId`    INT,
    `Credit`    INT NOT NULL,
    `Loan`      INT NOT NULL,
    PRIMARY KEY(`UserId`) 
);
CREATE TABLE IF NOT EXISTS `help`
(
    `HelpId`    INT AUTO_INCREMENT,
    `HelpInfo`  VARCHAR(100),
    `HelpDesc`  VARCHAR(500),
    PRIMARY KEY(`HelpId`)
);
    
INSERT INTO `admin`(`UserName`,`Password`,`UserType`) VALUES ('admin','admin','admin');
ALTER TABLE `admin` AUTO_INCREMENT=123456789;
ALTER TABLE `user` AUTO_INCREMENT=100;
ALTER TABLE `help` AUTO_INCREMENT=1;
ALTER TABLE `user` ADD FOREIGN KEY (`UserId`) REFERENCES `admin`(`UserId`) ON DELETE CASCADE;
ALTER TABLE `report` ADD FOREIGN KEY (`UserId`) REFERENCES `admin`(`UserId`) ON DELETE CASCADE;
ALTER TABLE `transaction` ADD FOREIGN KEY (`UserId`) REFERENCES `admin`(`UserId`) ON DELETE CASCADE;
ALTER TABLE `loan` ADD FOREIGN KEY (`BorrowerId`) REFERENCES `admin`(`UserId`) ON DELETE CASCADE;