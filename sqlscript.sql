-- DROP TABLE UserStocks;
-- drop table Stocks;
-- drop table User;

CREATE TABLE `stocks` (
  `companyname` varchar(30) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `currentprice` decimal(11,2) NOT NULL,
  `recentchange` decimal(11,2) NOT NULL,
  `annualtrend` varchar(5) NOT NULL,
  `recentchangedirection` varchar(5) NOT NULL,
   	PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT true,
  `email` varchar(50) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,  
  PRIMARY KEY (`username`),
  UNIQUE (`email`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `userstocks` (
  `username` varchar(20) NOT NULL,
  `stockid` int(1) NOT NULL,
  PRIMARY KEY (username,stockid),
  FOREIGN KEY (username) REFERENCES User(username),
  FOREIGN KEY (stockid) REFERENCES Stocks(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`username`, `password`, `active`, `email`, `fname`, `lname`) VALUES
('BuyTheDip', 'password1', 'true', 'bnye3@gmail.com', 'Billbo', 'Baggins'),
('Trader1', 'password2', 'true', 'clee4@gmail.com', 'John', 'Doe'),
('test', 'test', 'true', '111@gmail.com', 'John', 'Snow');

INSERT INTO `stocks` (`companyname`, `id`, `currentprice`, `recentchange`, `annualtrend`, `recentchangedirection`) VALUES
('ABC Company', 1, '0.40', '0.02', 'Up', 'Up'),
('XYZ Logistics', 2, '1.00', '0.05', 'Down', 'Down'),
('Acme Publishing', 3, '1.33', '0.08', 'Up', 'Down'),
('Fling Fing', 4, '0.94', '0.11', 'Down', 'Up'),
('Neutral Networks', 5, '1.25', '0.40', 'Up', 'Up'),
('Total Solutions Inc', 6, '0.55', '0.01', 'Down', 'Up');

INSERT INTO `userstocks` (`username`, `stockid`) VALUES
('BuyTheDip',2),
('BuyTheDip',3),
('Trader1',3),
('Trader1',4),
('test',5);