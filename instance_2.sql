-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 04, 2021 at 12:46 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `instance2`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `configs` (
  `key` varchar(10) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `configs` (`key`, `json`) VALUES
('common', '{\"title\":\"Instance 2\",\"description\":\"This is the second instance\",\"status\":\"enabled\"}');
