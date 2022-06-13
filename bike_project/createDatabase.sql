DROP DATABASE IF EXISTS bikes_inventory;

-- create the database
CREATE DATABASE IF NOT EXISTS bikes_inventory DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- specfiy the data base
USE bikes_inventory;

-- set check  foreign key  false to delete the parent tables and child tables 
SET FOREIGN_KEY_CHECKS = 0;

-- Drop the tables
DROP TABLE IF EXISTS  users;
DROP TABLE IF EXISTS  customers ;
DROP TABLE IF EXISTS  products;


-- create tables 


CREATE TABLE users
(
  id INT(5) not null  auto_increment,
  email    VARCHAR(255),
  password VARCHAR(30),
  
  CONSTRAINT Users_pk  PRIMARY KEY(id)
);




CREATE TABLE customers  
(
  id INT(5) not null  auto_increment,
  first_name   VARCHAR(30),
  last_name   VARCHAR(30),
  date_Of_Birth     DATE,
  province VARCHAR(30),
  city     VARCHAR(30),
  street   VARCHAR(30),
  zipcode  VARCHAR(7),
  Phone_number VARCHAR(7),


  CONSTRAINT Customers_pk  PRIMARY KEY(id),
  CONSTRAINT Customers_fk FOREIGN KEY(id)REFERENCES users(id)
);


CREATE TABLE products
(
 id INT(5) not null  auto_increment,
 product_number VARCHAR(255),
 Price       Double(8,2),
 Wheels      VARCHAR(255),
 Brakes      VARCHAR(255),
 category    INT(5),

  CONSTRAINT Bikes_pk  PRIMARY KEY(id)
 
 );


CREATE TABLE Orders
(
  id INT(5) not null  auto_increment,
  customer_id  INT(5),
  product_id  INT(5),
  Date     DATE,

  CONSTRAINT Order_pk  PRIMARY KEY(id),
  CONSTRAINT Order_fk1 FOREIGN KEY(customer_id)REFERENCES customers(id),
  CONSTRAINT Order_fk2 FOREIGN KEY(product_id)REFERENCES products(id)

);

COMMIT;


