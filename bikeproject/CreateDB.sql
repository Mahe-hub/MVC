DROP DATABASE IF EXISTS BikeShowroom_mangment;
-- create the database
CREATE DATABASE IF NOT EXISTS BikeShowroom_mangment  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- specfiy the data base
USE BikeShowroom_mangment ;
-- set check  foreign key  false to delete the parent tables and child tables 
SET FOREIGN_KEY_CHECKS = 0;

-- Drop the tables
DROP TABLE IF EXISTS Customers ;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Bike_Catgory;
DROP TABLE IF EXISTS Bikes;
DROP TABLE IF EXISTS User_Order;


CREATE TABLE Customers
(
  Cust_id INT(5) not null  auto_increment,
  Fname   VARCHAR(30),
  Lname   VARCHAR(30),
  Province VARCHAR(30),
  City     VARCHAR(30),
  Street   VARCHAR(30),
  Zipcode  VARCHAR(7),
  Phone_number VARCHAR(7),
  Email    VARCHAR(30),
  Password VARCHAR(30),

  CONSTRAINT Customers_pk  PRIMARY KEY(Cust_id)
);



CREATE TABLE Users
(
  User_id INT(5) not null  auto_increment,
  Email    VARCHAR(30),
  Password VARCHAR(30),
  Cust_id INT(5),
  
  CONSTRAINT Users_pk  PRIMARY KEY(User_id),
  CONSTRAINT Users_fk FOREIGN KEY(Cust_id)REFERENCES Customers(Cust_id)
);


CREATE TABLE Bike_Catgory
(
 Cat_id INT(5) not null  auto_increment,
 Explanation VARCHAR(30),

 CONSTRAINT BCat_pk  PRIMARY KEY(Cat_id)
);

CREATE TABLE Bikes
(
 Bike_id INT(5) not null  auto_increment,
 Product_Num VARCHAR(255),
 Price       Double(8,2),
 Wheels      VARCHAR(255),
 Brakes      VARCHAR(255),
 Category    INT(5),

 CONSTRAINT Bikes_pk  PRIMARY KEY(Bike_id),
 CONSTRAINT Bikes_fk FOREIGN KEY(Category )REFERENCES Bike_Catgory(Cat_id)
 );

CREATE TABLE User_Order
(
  Order_ID INT(5) not null  auto_increment,
  Cust_ID  INT(5),
  Bike_ID  INT(5),
  Date     DATE,

  CONSTRAINT Order_pk  PRIMARY KEY(Order_ID),
  CONSTRAINT Order_fk1 FOREIGN KEY(Cust_ID)REFERENCES Customers(Cust_id),
  CONSTRAINT Order_fk2 FOREIGN KEY(Bike_ID)REFERENCES Bikes(Bike_id)

);

COMMIT;

