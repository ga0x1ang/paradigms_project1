SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT 'UNKNOWN',
  `description` varchar(255) NOT NULL DEFAULT 'N/A',
  `cost` double unsigned NOT NULL DEFAULT '999',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `item` (`id`, `name`, `description`, `cost`) VALUES
(1, 'ubuntu', 'the most famous linux distribution', 19.99),
(2, 'gentoo', 'a source-based distribution', 9.99),
(3, 'debian', 'father of ubuntu', 49.99),
(4, 'arch', 'bsd style linux', 69.99),
(5, 'fedora', 'blood of redhat linux', 19.99),
(6, 'opensuse', 'blood of suse linux', 129.99),
(7, 'freebsd', 'it''s not a linux', 89.99),
(8, 'windows', 'an expensive os', 299.99),
(9, 'macos', '...', 39.99),
(10, 'composite', 'a component-based os', 0.99);

CREATE TABLE IF NOT EXISTS `tax` (
  `state` varchar(32) NOT NULL,
  `tax` double unsigned NOT NULL,
  PRIMARY KEY (`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tax` (`state`, `tax`) VALUES
('Alabama', 0.04),
('Alaska', 0),
('Arizona', 0.066),
('Arkansas', 0.06),
('California', 0.075),
('Colorado', 0.029),
('Connecticut', 0.0635),
('Delaware', 0),
('District of Columbia', 0.06),
('Florida', 0.06),
('Georgia', 0.04),
('Hawaii', 0.04),
('Idaho', 0.06),
('Illinois', 0.0625),
('Indiana', 0.07),
('Iowa', 0.06),
('Kansas', 0.063),
('Kentucky', 0.06),
('Louisiana', 0.04),
('Maine', 0.05),
('Maryland', 0.06),
('Massachusetts', 0.0625),
('Michigan', 0.06),
('Minnesota', 0.06875),
('Mississippi', 0.07),
('Missouri', 0.04225),
('Montana', 0),
('Nebraska', 0.055),
('Nevada', 0.0685),
('New Hampshire', 0),
('New Jersey', 0.07),
('New Mexico', 0.05125),
('New York', 0.04),
('North Carolina', 0.0475),
('North Dakota', 0.05),
('Ohio', 0.055),
('Oklahoma', 0.045),
('Oregon', 0),
('Pennsylvania', 0.06),
('Rhode Island', 0.07),
('South Carolina', 0.06),
('South Dakota', 0.04),
('Tennessee', 0.07),
('Texas', 0.0625),
('Utah', 0.047),
('Vermont', 0.06),
('Virginia', 0.04),
('Washington', 0.065),
('West Virginia', 0.06),
('Wisconsin', 0.05),
('Wyoming', 0.04);
SET FOREIGN_KEY_CHECKS=1;
