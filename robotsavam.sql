

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";

-- Database: `robotsavam`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `userId` varchar(15) DEFAULT NULL,
  `stallId` varchar(25) NOT NULL,
  `item` varchar(4) NOT NULL,
  `amount` smallint(6) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(15) NOT NULL PRIMARY KEY,
  `userName` varchar(25) NOT NULL,
  `userPhone` varchar(11) NOT NULL,
  `balance` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

