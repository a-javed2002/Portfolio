-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 08:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_task`
--

CREATE TABLE `assigned_task` (
  `assigned_task_id` int(11) NOT NULL,
  `task_id_fk` int(11) NOT NULL,
  `assigned_user_id_fk` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT -2,
  `started_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_task`
--

INSERT INTO `assigned_task` (`assigned_task_id`, `task_id_fk`, `assigned_user_id_fk`, `status`, `started_at`, `updated_at`) VALUES
(1, 1, 26, -2, '2023-05-03 01:41:39', '0000-00-00 00:00:00'),
(2, 6, 27, -2, '2023-05-03 01:58:12', '2023-05-03 01:58:12'),
(3, 9, 27, -2, '2023-05-03 03:40:51', '2023-05-03 03:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_work_items`
--

CREATE TABLE `assigned_work_items` (
  `assigned_work_items_id` int(11) NOT NULL,
  `work_item_id_fk` int(11) NOT NULL,
  `assigned_user_id_fk` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT -2,
  `started_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_work_items`
--

INSERT INTO `assigned_work_items` (`assigned_work_items_id`, `work_item_id_fk`, `assigned_user_id_fk`, `status`, `started_at`, `updated_at`) VALUES
(1, 10, 26, -2, '2023-05-03 02:22:55', '2023-05-03 02:22:55'),
(2, 11, 26, -1, '2023-05-03 02:23:27', '2023-05-03 18:25:54'),
(3, 12, 26, -1, '2023-05-03 02:24:48', '2023-05-03 02:24:48'),
(4, 13, 26, -2, '2023-05-03 02:25:50', '2023-05-03 02:25:50'),
(5, 14, 26, -2, '2023-05-03 02:26:03', '2023-05-03 02:26:03'),
(6, 20, 27, -1, '2023-05-03 03:40:01', '2023-05-03 03:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `invite_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `project_id_fk` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invite`
--

INSERT INTO `invite` (`invite_id`, `role`, `user_id_fk`, `project_id_fk`, `status`) VALUES
(1, 'developer', 26, 35, 1),
(2, 'researcher', 26, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization_name`, `created_at`, `user_id_fk`) VALUES
(1, 'organization-1', '2023-04-29 05:00:19', 25),
(2, 'organization-2', '2023-04-29 05:00:19', 25),
(3, 'organization-3', '2023-04-29 06:45:35', 26),
(4, 'organization-4', '2023-04-29 06:46:11', 27);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_key` varchar(100) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `organization_id_fk` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `proj_state` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_key`, `user_id_fk`, `organization_id_fk`, `added_on`, `proj_state`) VALUES
(4, 'project-1', 'o1p12', 25, 1, '2023-04-29 07:30:20', 1),
(5, 'project-5', 'o1p52', 25, 1, '2023-04-29 07:30:20', 1),
(6, 'project-6', 'o2p62', 25, 2, '2023-04-29 07:30:20', 1),
(7, 'project-11', 'o4p1126', 26, 4, '2023-04-29 07:30:20', 1),
(35, 'myproj', 'O2-P8-U26', 26, 2, '2023-04-29 17:28:31', 1),
(36, 'myownproj', 'O1-P36-U26', 26, 1, '2023-04-30 03:46:39', 1),
(37, 'hihello', 'O2-P37-U26', 26, 2, '2023-04-30 10:54:37', 1),
(38, 'fgh324', 'O1-P38-U26', 26, 1, '2023-04-30 10:57:48', 1),
(39, 'hihelloq123', 'O2-P39-U26', 26, 2, '2023-04-30 12:04:41', 1),
(40, 'hihello1234', 'O2-P40-U26', 26, 2, '2023-04-30 12:07:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

CREATE TABLE `project_users` (
  `project_users_id` int(11) NOT NULL,
  `project_id_fk` int(11) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_users`
--

INSERT INTO `project_users` (`project_users_id`, `project_id_fk`, `user_id_fk`, `role`, `added_on`) VALUES
(2, 5, 26, 'searching', '2023-04-29 17:05:03'),
(3, 6, 25, 'asd', '2023-04-30 05:35:25'),
(6, 35, 26, 'developer', '2023-04-30 05:51:46'),
(7, 7, 26, 'researcher', '2023-04-30 05:55:18'),
(8, 37, 26, 'admin', '2023-04-30 10:54:37'),
(9, 38, 26, 'admin', '2023-04-30 10:57:48'),
(10, 39, 26, 'admin', '2023-04-30 12:04:41'),
(11, 40, 26, 'admin', '2023-04-30 12:07:35'),
(12, 38, 27, 'searching', '2023-05-02 18:31:29'),
(13, 38, 31, 'dfg', '2023-05-02 18:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_nature` varchar(100) NOT NULL,
  `project_id_fk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_nature`, `project_id_fk`, `created_at`) VALUES
(1, 't12', 'das', 5, '2023-04-30 09:48:45'),
(2, 't4', 'fed', 35, '2023-04-30 11:02:31'),
(3, 'sad', 'adad', 5, '2023-04-30 11:02:31'),
(4, 'mytask-1', 'ui/ux', 38, '2023-05-03 01:44:28'),
(5, 'mytask-2', 'web development', 38, '2023-05-03 01:57:18'),
(6, 'mytask-2', 'web development', 38, '2023-05-03 01:58:12'),
(7, 'new4', 'asd', 38, '2023-05-03 02:57:27'),
(8, 't33', 'abc', 38, '2023-05-03 03:40:28'),
(9, 't34', 'abc', 38, '2023-05-03 03:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `role_id_fk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_gender`, `user_image`, `role_id_fk`, `created_at`) VALUES
(2, 'asd', 'asd', 'asd', '', 'asd', 2, '2023-04-29 05:00:47'),
(25, 'huzaifa', 'huzaifa@gmail.com', '$2y$10$m6YgSf3NNls5ncAfU5PQA.u1jL1gLUthY9SM.7vHmH8X8Mx5wE5/m', 'male', 'assets/uploads/644c90776951f-CALLL.jpg', 1, '2023-04-29 05:00:47'),
(26, 'abdullah', 'a.javed0202@gmail.com', '$2y$10$1pwGt.2K3fXriGZqQCY51O/nFSTyWBpuq7HnTd0JJM6ylpXlZFSvm', 'female', NULL, 1, '2023-04-29 05:00:47'),
(27, 'danish', 'danish@gmail.com', '$2y$10$/uJgV3fr93AjWbhmf8V/X.SOoA15VTJzbeBYY2M7aV0wb1laF5QNi', 'male', 'assets/uploads/644c915841df2-CALLL.jpg', 1, '2023-04-29 05:00:47'),
(28, 'za', 'za@d.com', '$2y$10$4UopJOAWcnZUDZP7cGvls.cnS96tSK5NZKOyAtJFDBnZFETsnWOSC', 'on', 'assets/uploads/644ca0a53b40e-CALLL.jpg', 2, '2023-04-29 05:00:47'),
(29, 'zara', 'zara@d.com', '$2y$10$OnR56qj6oaPYVV3AAcPaFe0mR/66LlhX0ANGGm6OJ/crQst8XIaeS', 'on', 'assets/uploads/644ca0b199a07-CALLL.jpg', 2, '2023-04-29 05:00:47'),
(30, 'sara', 'sara123@gmail.com', '$2y$10$pPCfc1m.1jGvd/iAyQ.x3uPTZIORjXcRFUZBTlXG/ErXld4WBZA3O', 'female', 'assets/uploads/644ca12e69fdb-MA.jpg', 2, '2023-04-29 05:00:47'),
(31, 'khan', 'khan@khan.com', '$2y$10$NyIziLqrEJ3YkVOmo55yVuc8wAHA7EzP/yRZIhkDNsVtOnXmBtYQu', 'male', 'assets/uploads/644ca4be9d077-CALLL.jpg', 3, '0000-00-00 00:00:00'),
(32, 'khan', 'khan1@khan.com', '$2y$10$PfWrURmoGYH3Ib.dRUy3HeE7.Cx06sJK.fxqzfxMGS9ppC5qBP7sG', 'male', 'assets/uploads/644ca50a6172e-CALLL.jpg', 3, '2023-04-29 05:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `work_items`
--

CREATE TABLE `work_items` (
  `wk_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `path` varchar(30) NOT NULL,
  `project_id_fk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_items`
--

INSERT INTO `work_items` (`wk_id`, `title`, `type`, `user_id_fk`, `path`, `project_id_fk`, `created_at`) VALUES
(1, 'w1', '', 25, 'project-1/abc', 4, '0000-00-00 00:00:00'),
(2, 'w2', '', 25, 'project-1/abc', 4, '0000-00-00 00:00:00'),
(3, 'w3', '', 25, 'project-1/abc', 4, '0000-00-00 00:00:00'),
(4, 'w4', '', 25, 'project-1/abc', 4, '0000-00-00 00:00:00'),
(5, 'w5', '', 25, 'project-1/abc', 4, '0000-00-00 00:00:00'),
(6, 'w6', '', 25, 'project-5/dfg', 5, '2023-04-29 02:48:04'),
(7, 'w7', '', 25, 'project-6/dfg', 6, '2023-04-29 02:48:46'),
(8, 'w8', '', 25, 'project-6/dfg', 6, '2023-04-29 02:49:05'),
(9, 't1', '', 27, 'project-1/abc', 5, '2023-04-30 09:20:39'),
(10, 'wk-92', 'asd', 26, '/', 38, '2023-05-03 02:22:55'),
(11, 'wk-90', 'asd1', 26, '/', 38, '2023-05-03 02:23:27'),
(12, 'wk-91', 'asd1', 26, '/', 38, '2023-05-03 02:24:48'),
(13, 'wk-90', 'qwe', 26, '/', 38, '2023-05-03 02:25:50'),
(14, 'wk-90', 'qwe', 26, 'fgh324/', 38, '2023-05-03 02:26:03'),
(15, 'wk-90', 'qwe', 26, 'fgh324/', 38, '2023-05-03 02:26:50'),
(16, 'hehehe', '123', 26, 'fgh324/', 38, '2023-05-03 02:27:14'),
(17, 'hehehe', '123', 26, 'fgh324/', 38, '2023-05-03 02:27:20'),
(18, 'wk10', 'abc', 26, 'fgh324/', 38, '2023-05-03 03:38:28'),
(19, 'wk12', 'abc', 26, 'fgh324/', 38, '2023-05-03 03:39:49'),
(20, 'wk13', 'abc', 26, 'fgh324/', 38, '2023-05-03 03:40:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_task`
--
ALTER TABLE `assigned_task`
  ADD PRIMARY KEY (`assigned_task_id`),
  ADD KEY `task_id_fk` (`task_id_fk`),
  ADD KEY `assigned_user_id_fk` (`assigned_user_id_fk`);

--
-- Indexes for table `assigned_work_items`
--
ALTER TABLE `assigned_work_items`
  ADD PRIMARY KEY (`assigned_work_items_id`);

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`invite_id`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `project_id_fk` (`project_id_fk`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`),
  ADD UNIQUE KEY `organization_name` (`organization_name`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD UNIQUE KEY `project_key` (`project_key`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `organization_id_fk` (`organization_id_fk`);

--
-- Indexes for table `project_users`
--
ALTER TABLE `project_users`
  ADD PRIMARY KEY (`project_users_id`),
  ADD KEY `project_id_fk` (`project_id_fk`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `project_id_fk` (`project_id_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`user_email`),
  ADD KEY `users_ibfk_1` (`role_id_fk`);

--
-- Indexes for table `work_items`
--
ALTER TABLE `work_items`
  ADD PRIMARY KEY (`wk_id`),
  ADD KEY `project_id_fk` (`project_id_fk`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_task`
--
ALTER TABLE `assigned_task`
  MODIFY `assigned_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assigned_work_items`
--
ALTER TABLE `assigned_work_items`
  MODIFY `assigned_work_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invite`
--
ALTER TABLE `invite`
  MODIFY `invite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `project_users`
--
ALTER TABLE `project_users`
  MODIFY `project_users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `work_items`
--
ALTER TABLE `work_items`
  MODIFY `wk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_task`
--
ALTER TABLE `assigned_task`
  ADD CONSTRAINT `assigned_task_ibfk_1` FOREIGN KEY (`task_id_fk`) REFERENCES `task` (`task_id`),
  ADD CONSTRAINT `assigned_task_ibfk_2` FOREIGN KEY (`assigned_user_id_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `invite_ibfk_2` FOREIGN KEY (`project_id_fk`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`organization_id_fk`) REFERENCES `organization` (`organization_id`);

--
-- Constraints for table `project_users`
--
ALTER TABLE `project_users`
  ADD CONSTRAINT `project_users_ibfk_1` FOREIGN KEY (`project_id_fk`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_users_ibfk_2` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`project_id_fk`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `work_items`
--
ALTER TABLE `work_items`
  ADD CONSTRAINT `work_items_ibfk_1` FOREIGN KEY (`project_id_fk`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `work_items_ibfk_2` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
