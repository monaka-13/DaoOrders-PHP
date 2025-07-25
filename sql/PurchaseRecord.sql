DROP DATABASE IF EXISTS DAOOrders;
CREATE DATABASE IF NOT EXISTS DAOOrders;
USE DAOOrders;

-- Create table CustomerCategory
create table Customer (		
	CustomerCode VARCHAR(2) PRIMARY KEY,
	CustomerDetail VARCHAR(20),
	CustomerDiscount FLOAT(3,2)	
) Engine=InnoDB;

-- Insert table Shipping
-- must insert a few data for the foreign key setting in the purchase department to work
insert into Customer (CustomerCode, CustomerDetail, CustomerDiscount) values ('SE', 'Senior', 0.15);
insert into Customer (CustomerCode, CustomerDetail, CustomerDiscount) values ('ST', 'Student', 0.1);
insert into Customer (CustomerCode, CustomerDetail, CustomerDiscount) values ('RE', 'Regular', 0);

-- Create table Purchase
create table Purchase (
	PurchaseID VARCHAR(10) PRIMARY KEY,	
	CustomerCode VARCHAR(2),
    Amount INT,	
	FOREIGN KEY (CustomerCode) REFERENCES Customer (CustomerCode) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;


-- Insert table Purchase
insert into Purchase (PurchaseID, CustomerCode, Amount) values 	('P926R', 'SE', 10);
insert into Purchase (PurchaseID, CustomerCode, Amount) values 	('P352S', 'ST', 5);
insert into Purchase (PurchaseID, CustomerCode, Amount) values 	('P881S', 'RE', 8);
insert into Purchase (PurchaseID, CustomerCode, Amount) values 	('P187R', 'SE', 6);
insert into Purchase (PurchaseID, CustomerCode, Amount) values 	('P043S', 'ST', 7);
insert into Purchase (PurchaseID, CustomerCode, Amount) values 	('P213R', 'RE', 6);
insert into Purchase (PurchaseID, CustomerCode, Amount) values 	('P777R', 'RE', 3);
