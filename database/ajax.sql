CREATE TABLE `user` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL UNIQUE,

  `LastName` varchar(225) NOT NULL,

  `Age` int(11) NOT NULL,

  `Birthplace` varchar(225) NOT NULL,

  `Occupation` varchar(225) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET= utf8;




--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`,`FirstName`, `LastName`, `Age`, `Birthplace`, `Occupation`) VALUES

(1,'aditya', 'jain', 22, 'punjab', 'Er'),
(2,'ashish', 'jain', 27, 'punjab', 'Er'),
(3,'sanjay', 'jain', 60, 'punjab', 'shopkepper'),
(4,'madhu', 'jain', 55, 'punjab', 'housewife');
