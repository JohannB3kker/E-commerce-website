DROP DATABASE IF EXISTS thebiltongpantry;
CREATE DATABASE thebiltongpantry;
USE thebiltongpantry;

-- -----------------------------------------------------
-- Table `mydb`.`tbl_manager`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thebiltongpantry`.`tbl_manager` (
  `managerID` INT(5) NOT NULL,
  `managerEmail` VARCHAR(50) NOT NULL,
  `managerPassword` VARCHAR(10) NOT NULL,
  `managerRole` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`managerID`));


-- -----------------------------------------------------
-- Table `mydb`.`tbl_customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thebiltongpantry`.`tbl_customer` (
  `customerID` INT(5) NOT NULL,
  `customerFirstName` VARCHAR(50) NOT NULL,
  `customerLastName` VARCHAR(50) NOT NULL,
  `customerEmail` VARCHAR(50) NOT NULL,
  `customerAddress` VARCHAR(50) NOT NULL,
  `customerPhoneNumber` VARCHAR(10) NOT NULL,
  `customerPassword` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`customerID`));


-- -----------------------------------------------------
-- Table `mydb`.`tbl_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thebiltongpantry`.`tbl_order` (
  `orderID` INT(5) NOT NULL,
  `customerID` INT(5) NOT NULL,
  `orderAmountDue` DECIMAL(10,2) NOT NULL,
  `orderTimestamp` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `orderStatus` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`orderID`),
  FOREIGN KEY (`customerID`) REFERENCES `thebiltongpantry`.`tbl_customer` (`customerID`));

-- -----------------------------------------------------
-- Table `mydb`.`tbl_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thebiltongpantry`.`tbl_product` (
  `productID` INT(5) NOT NULL,
  `managerID` INT(5) NOT NULL,
  `productDescription` VARCHAR(50) NOT NULL,
  `productPrice` DECIMAL(10,2) NOT NULL,
  `productImage` VARCHAR(255) NOT NULL,
  `productDateAdded` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `productDateEdited` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`productID`),
  FOREIGN KEY (`managerID`) REFERENCES `thebiltongpantry`.`tbl_manager` (`managerID`));


-- -----------------------------------------------------
-- Table `mydb`.`tbl_order_line`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thebiltongpantry`.`tbl_order_line` (
  `lineID` INT(5) NOT NULL,
  `orderID` INT(5) NOT NULL,
  `productID` INT(5) NOT NULL,
  `quantity` INT(5) NOT NULL,
  PRIMARY KEY (`lineID`),
  FOREIGN KEY (`orderID`) REFERENCES `thebiltongpantry`.`tbl_order` (`orderID`),
  FOREIGN KEY (`productID`) REFERENCES `thebiltongpantry`.`tbl_product` (`productID`));


-- -----------------------------------------------------
-- Table `mydb`.`tbl_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thebiltongpantry`.`tbl_message` (
  `messageID` INT(10) NOT NULL,
  `senderName` VARCHAR(50) NOT NULL,
  `senderLastName` VARCHAR(50) NOT NULL,
  `senderEmail` VARCHAR(50) NOT NULL,
  `senderNumber` VARCHAR(10) NOT NULL,
  `senderMessage` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`messageID`));


