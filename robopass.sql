SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


CREATE TABLE `transactions` (
  `user_id` varchar(5) DEFAULT NULL,
  `stall_id` varchar(25) NOT NULL,
  `amount` smallint(6) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `users` (
  `user_id` varchar(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `balance` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE;
