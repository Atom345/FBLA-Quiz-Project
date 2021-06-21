-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 01:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `fbla`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_ask` text DEFAULT NULL,
  `question_content` text DEFAULT NULL,
  `question_type` varchar(20) DEFAULT NULL,
  `correct_value` text DEFAULT NULL,
  `question_hint` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_ask`, `question_content`, `question_type`, `correct_value`, `question_hint`) VALUES
(1, 'What is FBLA?', '<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"1\" type=\"radio\" />\r\n   <span>A gaming company.</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"2\" type=\"radio\" />\r\n    <span>A program to help students prefect their business skills; as well as learn new things.</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"3\" type=\"radio\"  />\r\n    <span>Some service made by Google.</span>\r\n </label>\r\n</p>', 'radio', '2', 'Select the answer(s) that applies..'),
(2, 'What does FBLA stand for?', '<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"1\" type=\"radio\" />\r\n   <span>Future Business Leaders of America</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"2\" type=\"radio\" />\r\n    <span>Future Business Leaders of Amsterdam</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"3\" type=\"radio\"  />\r\n    <span>Free Best Lovely Apples</span>\r\n </label>\r\n</p>', 'radio', '1', 'Select the answer(s) that applies..'),
(3, 'What are somethings FBLA focuses On?', '<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"1\" type=\"radio\" />\r\n   <span>Educational Programs.</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"2\" type=\"radio\" />\r\n    <span>Academic Programs.</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"3\" type=\"radio\"  />\r\n    <span>Leadership Development.</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"4\" type=\"radio\"  />\r\n    <span>All of the Above.</span>\r\n </label>\r\n</p>', 'radio', '4', 'Select the answer(s) that applies..'),
(4, 'Who was the Founder of FBLA?', '<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"1\" type=\"radio\" />\r\n   <span>John L. Smith</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"2\" type=\"radio\" />\r\n    <span>Hamden L. Forkner</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"3\" type=\"radio\"  />\r\n    <span>Seth B. Lawson</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"4\" type=\"radio\"  />\r\n    <span>Jeremy K. Gold</span>\r\n </label>\r\n</p>', 'radio', '2', 'Select the answer(s) that applies..'),
(5, 'What are FBLA\'s main colors?', '<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"1\" type=\"radio\" />\r\n   <span>Purple & Brown</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"2\" type=\"radio\" />\r\n    <span>Blue & Gold</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"3\" type=\"radio\"  />\r\n    <span>Red & Gold</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"4\" type=\"radio\"  />\r\n    <span>All of the Above</span>\r\n </label>\r\n</p>', 'radio', '2', 'Select the answer(s) that applies..'),
(6, 'What are the three words across the FBLA emblem?', '<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"1\" type=\"radio\" />\r\n   <span>Money, Cash, Awards</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group\" value = \"2\" type=\"radio\" />\r\n    <span>Service, Business, Progress</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"3\" type=\"radio\"  />\r\n    <span>Service, Education, Progress</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group\" value = \"4\" type=\"radio\"  />\r\n    <span>Business, Respect, Ownership</span>\r\n </label>\r\n</p>', 'radio', '3', 'Select the answer(s) that applies..'),
(7, 'Where is the National FBLA-PBL center located?', '<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"1\" type=\"radio\" />\r\n   <span>Berthoud, Colorado</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"2\" type=\"radio\" />\r\n    <span>Austin, Texas</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"3\" type=\"radio\"  />\r\n    <span>Reston, Virginia</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"4\" type=\"radio\"  />\r\n    <span>San Diego, California</span>\r\n </label>\r\n</p>', 'radio_two', '3', 'Select the answer(s) that applies..'),
(8, 'What do the initials LIFT in Mission LIFT stand for?', '<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"1\" type=\"radio\" />\r\n   <span>Leading Into the Future Together</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"2\" type=\"radio\" />\r\n    <span>Life, Integrity, Future, Tomorrow</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"3\" type=\"radio\"  />\r\n    <span>Labs, Inkling, Forever, Today</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"4\" type=\"radio\"  />\r\n    <span>Lots, Ingenious, Free, Together</span>\r\n </label>\r\n</p>', 'radio_two', '1', 'Select the answer(s) that applies..'),
(9, 'What are the dates of National FBLA-PBL week?', '<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"1\" type=\"radio\" />\r\n   <span>Second week in February</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"2\" type=\"radio\" />\r\n    <span>First Week in January</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"3\" type=\"radio\"  />\r\n    <span>Forth Week in May</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"4\" type=\"radio\"  />\r\n    <span>Last Week in December</span>\r\n </label>\r\n</p>', 'radio_two', '1', 'Select the answer(s) that applies..'),
(10, 'What is another name for a written plan of action?', '<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"1\" type=\"radio\" />\r\n   <span>Plan of Action</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"2\" type=\"radio\" />\r\n    <span>Plan of Procedure</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"3\" type=\"radio\"  />\r\n    <span>Program of Work</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"4\" type=\"radio\"  />\r\n    <span>Program of Execution</span>\r\n </label>\r\n</p>', 'radio_two', '3', 'Select the answer(s) that applies..'),
(11, 'What color of candle symbolizes the office of president?', '<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"1\" type=\"radio\" />\r\n   <span>Red</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"2\" type=\"radio\" />\r\n    <span>Blue</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"3\" type=\"radio\"  />\r\n    <span>Gold</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"4\" type=\"radio\"  />\r\n    <span>Green</span>\r\n </label>\r\n</p>', 'radio_two', '1', 'Select the answer(s) that applies..'),
(12, 'How many FBLA-Middle goals are there?', '<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"1\" type=\"radio\" />\r\n   <span>2</span>\r\n</label>\r\n</p>\r\n\r\n<p>\r\n<label>\r\n   <input name=\"radio_group_two\" value = \"2\" type=\"radio\" />\r\n    <span>9</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"3\" type=\"radio\"  />\r\n    <span>10</span>\r\n </label>\r\n</p>\r\n\r\n<p>\r\n <label>\r\n    <input name=\"radio_group_two\" value = \"4\" type=\"radio\"  />\r\n    <span>8</span>\r\n </label>\r\n</p>', 'radio_two', '4', 'Select the answer(s) that applies..'),
(14, 'FBLA\'s first state chapter was in  _ _ _ _', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n </div>\r\n', 'blank', 'Iowa', 'Fill in the blank.'),
(15, 'In debate, each member has the right to speak _ _ _ _ _ on a motion.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'twice', 'Fill in the blank.'),
(16, 'FBLA-PBL is divided into _ _ _ _ regions.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'five', 'Fill in the blank.'),
(17, '_ _ _ _ _ members required to start a new chapter in FBLA-ML.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'three', 'Fill in the blank.'),
(18, '_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ is the official website URL for FBLA.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'www.fbla-pbl.org', 'Fill in the blank.'),
(19, 'In order to compete in the competitive awards program for FBLA, dues must be received by _ _ _ _ _   _ .', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'March 1', 'Fill in the blank.'),
(20, 'America Enterprise day is on _ _ _ _ _ _ _ _ _ _   _ _.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'November 10', 'Fill in the blank.'),
(21, 'The person that typically conducts meetings has the role of _ _ _ _ _ _ _ _ _.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'president', 'Fill in the blank.'),
(22, 'The FBLA was declared as a non-profit student organization in _ _ _ _.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', '1969', 'Fill in the blank.'),
(23, 'FBLA national dues are $_._ _', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', '6.00', 'Fill in the blank.'),
(24, 'The Parliamentary Procedure Event is named after _ _ _ _ _ _ _   _   _ _ _ _ _ _.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'Dorothy L Travis', 'Fill in the blank.'),
(25, 'A local chapter with 50 members will be entitled to _ _ _ _ _ local voting delagates.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'three', 'Fill in the blank.'),
(26, 'The first FBLA chapter was held in the state of _ _ _ _ _ _ _ _ _.', '<div class=\"input-field\">\r\n   <input id=\"fill_blank\" name = \"fill_blank\" type=\"text\" class=\"validate\">\r\n   <label for=\"fill_blank\">Answer</label>\r\n</div>', 'blank', 'Tennessee', 'Fill in the blank.'),
(27, 'What are FBLA\'s main colors?', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Blue</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Purple</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Green</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>Gold</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>Red</span>\r\n   </label>\r\n</p>', 'select', '5', 'Select all that apply.'),
(28, 'What are the different levels of FBLA?', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>FBLA Middle Level</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Professional Division</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>FBLA High Level</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>FBLA</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>PBL</span>\r\n   </label>\r\n</p>\r\n', 'select', '12', 'Select all that apply.'),
(29, 'Select the 5 Regions.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Mountain Plains</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>North Central</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Southern</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>Western</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>Eastern</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"6\" />\r\n      <span>All of the above</span>\r\n   </label>\r\n</p>\r\n', 'select', '6', 'Select all that apply.'),
(30, 'Select the city\'s where FLC was held.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Berthoud</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Berthoud</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Austin</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>Omaha</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>Denver</span>\r\n   </label>\r\n</p>', 'select', '6', 'Select all that apply.'),
(31, 'Select when NLC 2016 was held.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Richmond</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Broomfield</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Nashville</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>Golden</span>\r\n   </label>\r\n</p>\r\n', 'select', '3', 'Select all that apply.'),
(32, 'Select the city where the first FBLA chapter was held.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Modesto</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Johnson City</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Oklahoma City</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>Wichita</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>Baton Rouge</span>\r\n   </label>\r\n</p>', 'select', '2', 'Select all that apply.'),
(33, 'Select the first year the Nebraska charter was held.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>1982</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>1962</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>1963</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>1998</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>1990</span>\r\n   </label>\r\n</p>', 'select', '3', 'Select all that apply.'),
(34, 'Select the due amount required for FBLA-ML.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>$4.00</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>$6.00</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Four Dollars</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>$5.00</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>Six Dollars</span>\r\n   </label>\r\n</p>', 'select', '4', 'Select all that apply.'),
(35, 'Select all the available business achievement awards.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Future Award</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Business Award</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Leader Award</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>America Award</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>All the above</span>\r\n   </label>\r\n</p>', 'select', '5', 'Select all that apply.'),
(36, 'Select all the categories in FBLA competitive events.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Team</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Individual</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Plan</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>Process</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>Chapter</span>\r\n   </label>\r\n</p>', 'select', '8', 'Select all that apply.'),
(37, 'Select the national theme for FBLA-PBL in 2014-2015.', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>Step up to the challenge</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>Step up to the Adventure</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>Promote Business</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>Create a Plan</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>Step up to the awards</span>\r\n   </label>\r\n</p>', 'select', '1', 'Select all that apply.'),
(38, 'How many members are on the National Board of directors?', '<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"1\" />\r\n      <span>16</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"2\" />\r\n      <span>8</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"3\" />\r\n      <span>15</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"4\" />\r\n      <span>20</span>\r\n   </label>\r\n</p>\r\n\r\n<p>\r\n  <label>\r\n     <input type=\"checkbox\" name=\"select[]\" class=\"filled-in\" value = \"5\" />\r\n      <span>10</span>\r\n   </label>\r\n</p>', 'select', '3', 'Select all that apply.'),
(39, 'When presenting your FBLA project, it is important to be...', '<div class=\"input-field\">\r\n    <textarea id=\"textarea\" placeholder = \"Press `ENTER` for a new line.\" class=\"materialize-textarea\" name = \"response\"></textarea>\r\n    <label for=\"textarea\">Your Response</label>\r\n</div>', 'response', 'professional,respectful', 'This is a free response. Free responses should be more than 100 letters.'),
(40, 'In your own words, what does FBLA focus on?', '<div class=\"input-field\">\r\n    <textarea id=\"textarea\" placeholder = \"Press `ENTER` for a new line.\" class=\"materialize-textarea\" name = \"response\"></textarea>\r\n    <label for=\"textarea\">Your Response</label>\r\n</div>', 'response', 'business,hard work,success,learning', 'This is a free response. Free responses should be more than 100 letters.'),
(41, 'When working on a project for a competitive event, it is important to...', '<div class=\"input-field\">\r\n    <textarea id=\"textarea\" placeholder = \"Press `ENTER` for a new line.\" class=\"materialize-textarea\" name = \"response\"></textarea>\r\n    <label for=\"textarea\">Your Response</label>\r\n</div>', 'response', 'guidelines,rules ', 'This is a free response. Free responses should be more than 100 letters.'),
(42, 'When participating at a FBLA event, it is important to dress...', '<div class=\"input-field\">\r\n    <textarea id=\"textarea\" placeholder = \"Press `ENTER` for a new line.\" class=\"materialize-textarea\" name = \"response\"></textarea>\r\n    <label for=\"textarea\">Your Response</label>\r\n</div>', 'response', 'appropriately,nicely,professionally', 'This is a free response. Free responses should be more than 100 letters.'),
(43, 'When participating in a FBLA related event, it is important not to...', '<div class=\"input-field\">\r\n    <textarea id=\"textarea\" placeholder = \"Press `ENTER` for a new line.\" class=\"materialize-textarea\" name = \"response\"></textarea>\r\n    <label for=\"textarea\">Your Response</label>\r\n</div>', 'response', 'disrespectful,rude,loud', 'This is a free response. Free responses should be more than 100 letters.'),
(44, 'Give some examples of clothing you should wear to an FBLA event.', '<div class=\"input-field\">\r\n    <textarea id=\"textarea\" placeholder = \"Press `ENTER` for a new line.\" class=\"materialize-textarea\" name = \"response\"></textarea>\r\n    <label for=\"textarea\">Your Response</label>\r\n</div>', 'response', 'suit,slacks,nice shoes,jeans,tie', 'This is a free response. Free responses should be more than 100 letters.'),
(45, 'How do FBLA competitive events work?', '<div class=\"input-field\">\r\n    <textarea id=\"textarea\" placeholder = \"Press `ENTER` for a new line.\" class=\"materialize-textarea\" name = \"response\"></textarea>\r\n    <label for=\"textarea\">Your Response</label>\r\n</div>', 'response', 'guidelines,rules,present,presentation,judges', 'This is a free response. Free responses should be more than 100 letters.');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_progress`
--

CREATE TABLE `quiz_progress` (
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quiz_random_questions` varchar(50) DEFAULT NULL,
  `given_answers` varchar(500) DEFAULT NULL,
  `quiz_timestamp` varchar(40) DEFAULT NULL,
  `finished` varchar(10) DEFAULT NULL,
  `score` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `pass` varchar(225) DEFAULT NULL,
  `admin` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `pass`, `admin`) VALUES
(1, 'admin@admin.com', 'John Smith', '$2y$10$oWZaZmox9ZiuBuMFL62InO0JbVmJgHsTrM12NreKGiB0g3ED676Ou', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz_progress`
--
ALTER TABLE `quiz_progress`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `quiz_progress`
--
ALTER TABLE `quiz_progress`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;