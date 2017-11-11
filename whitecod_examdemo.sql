-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2017 at 04:08 AM
-- Server version: 5.6.32-78.1-log
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whitecod_examdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'rtoadmin17@');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `chapterId` int(11) NOT NULL,
  `chapterName` varchar(250) NOT NULL,
  `subjectId` int(11) NOT NULL COMMENT 'FK subject'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapterId`, `chapterName`, `subjectId`) VALUES
(1, 'Building Material', 1),
(2, 'Surveying', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymenthistory`
--

CREATE TABLE IF NOT EXISTS `paymenthistory` (
  `historyId` int(11) NOT NULL,
  `transactionAmount` varchar(500) NOT NULL,
  `orderId` varchar(500) NOT NULL,
  `paymentStatus` varchar(500) NOT NULL,
  `studentId` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` varchar(50) NOT NULL,
  `set_Name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenthistory`
--

INSERT INTO `paymenthistory` (`historyId`, `transactionAmount`, `orderId`, `paymentStatus`, `studentId`, `timeStamp`, `payment_status`, `set_Name`) VALUES
(1, '1.0', '627536662', 'Success', 11, '2017-03-25 05:46:11', 'A', NULL),
(2, '1.0', '67058269', 'Success', 11, '2017-03-25 06:04:36', 'A', NULL),
(3, '1.0', '1925685673', 'Success', 14, '2017-03-27 07:20:58', 'A', NULL),
(4, '10', '', 'Success', 14, '2017-03-27 07:23:21', 'D', NULL),
(5, '10', '', 'Success', 14, '2017-03-27 07:26:06', 'D', NULL),
(6, '10', '', 'Success', 14, '2017-03-27 07:27:09', 'D', NULL),
(7, '10', '', 'Success', 14, '2017-03-29 05:10:07', 'D', NULL),
(8, '10', '', 'Success', 15, '2017-04-03 17:40:20', 'D', NULL),
(9, '0', '', 'Success', 11, '2017-04-04 09:25:52', 'D', 'Full Syllabus Free Test 1'),
(10, '0', '', 'Success', 11, '2017-04-04 09:39:26', 'D', 'Building Matrial Section 2'),
(11, '0', '', 'Success', 11, '2017-04-04 09:46:53', 'D', 'Building Matrial Section 2'),
(12, '0', '', 'Success', 11, '2017-04-04 09:48:09', 'D', 'Building Matrial Section 2'),
(13, '10', '', 'Success', 11, '2017-04-04 09:48:29', 'D', 'Building Matrial Section 1'),
(14, '10', '', 'Success', 11, '2017-04-08 05:24:12', 'D', 'Building Matrial Section 1'),
(15, '10', '', 'Success', 11, '2017-04-08 07:22:57', 'D', 'Building Matrial Section 1'),
(16, '10', '', 'Success', 15, '2017-04-08 09:24:20', 'D', 'Surveying Section 3'),
(17, '10', '', 'Success', 15, '2017-04-08 09:27:31', 'D', 'Building Matrial Section 1'),
(18, '10', '', 'Success', 11, '2017-04-08 10:01:12', 'D', 'Building Matrial Section 1'),
(19, '10', '', 'Success', 11, '2017-04-08 10:01:56', 'D', 'Building Matrial Section 1'),
(20, '10', '', 'Success', 11, '2017-04-08 10:02:43', 'D', 'Building Matrial Section 1'),
(21, '10', '', 'Success', 11, '2017-04-08 10:04:21', 'D', 'Building Matrial Section 1'),
(22, '10', '', 'Success', 11, '2017-04-08 10:04:27', 'D', 'Building Matrial Section 1');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedexams`
--

CREATE TABLE IF NOT EXISTS `purchasedexams` (
  `purc_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `exam_status` int(2) NOT NULL DEFAULT '0',
  `purchased_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasedexams`
--

INSERT INTO `purchasedexams` (`purc_id`, `student_id`, `set_id`, `exam_status`, `purchased_date`) VALUES
(1, 11, 1, 1, '2017-03-25 09:21:30'),
(2, 11, 1, 1, '2017-03-25 12:28:15'),
(3, 11, 1, 1, '2017-03-26 06:15:35'),
(4, 14, 1, 1, '2017-03-27 07:22:17'),
(5, 14, 1, 1, '2017-03-27 07:25:32'),
(6, 14, 1, 1, '2017-03-27 07:27:02'),
(7, 14, 1, 1, '2017-03-27 07:39:07'),
(8, 14, 2, 0, '2017-03-27 07:39:16'),
(9, 14, 2, 0, '2017-03-27 07:39:22'),
(10, 15, 1, 1, '2017-04-03 17:40:03'),
(11, 11, 10, 0, '2017-04-04 09:25:47'),
(12, 11, 11, 1, '2017-04-04 09:25:50'),
(13, 11, 2, 1, '2017-04-04 09:32:24'),
(14, 11, 1, 1, '2017-04-04 09:45:20'),
(15, 11, 2, 1, '2017-04-04 09:46:46'),
(16, 11, 2, 1, '2017-04-04 09:48:03'),
(17, 11, 1, 1, '2017-04-08 05:24:08'),
(18, 11, 1, 1, '2017-04-08 07:22:47'),
(19, 15, 3, 1, '2017-04-08 09:24:03'),
(20, 15, 1, 1, '2017-04-08 09:27:20'),
(21, 11, 1, 1, '2017-04-08 10:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `chapterId` int(11) NOT NULL,
  `question` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `option1` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option2` varchar(250) CHARACTER SET latin1 NOT NULL,
  `option3` varchar(250) CHARACTER SET latin1 NOT NULL,
  `option4` varchar(250) CHARACTER SET latin1 NOT NULL,
  `answer_option` varchar(4) CHARACTER SET latin1 NOT NULL,
  `questionImage` int(2) NOT NULL,
  `optionAImage` int(2) NOT NULL,
  `optionBImage` int(2) NOT NULL,
  `optionCImage` int(2) NOT NULL,
  `optionDImage` int(2) NOT NULL,
  `googlefontbit` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subjectId`, `chapterId`, `question`, `option1`, `option2`, `option3`, `option4`, `answer_option`, `questionImage`, `optionAImage`, `optionBImage`, `optionCImage`, `optionDImage`, `googlefontbit`) VALUES
(1, 1, 1, 'In a mortar, the binding material is', 'cement', 'sand', 'surkhi', 'cinder.', 'a', 0, 0, 0, 0, 0, 0),
(2, 1, 1, 'Lacquer paints', 'are generally applied on structural steel', 'are less durable as compared to enamel paints', 'consist of resin and nitro-cellulose', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(3, 1, 1, 'Wrought iron contains carbon upto', '0.25%', '1.00%', '1.50%', '2%.', 'a', 0, 0, 0, 0, 0, 0),
(4, 1, 1, 'Pick up the polymineralic rock from the following:', 'Quartz sand', 'Pure gypsum', 'Magnesite', 'Granite', 'd', 0, 0, 0, 0, 0, 0),
(5, 1, 1, 'Pick up the correct statement from the following:', 'For thin structures subjected to wetting and drying, the water cement ratio should be 0.45', 'For mass concrete structures subjected to wetting and drying, the water ratio should be 0.55', 'For thin structures which remain continuously under water, the water-cement ratio by weight should be 0.55', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(6, 1, 1, 'Ultimate strength to cement is provided by', 'Tricalcium silicate', 'Di-calcium silicate', 'Tri-calcium aluminate', 'Tetra calcium alumino ferrite.', 'b', 0, 0, 0, 0, 0, 0),
(7, 1, 1, 'Elastomers can extend upto', 'five times their original dimensions', 'seven times their original dimensions', 'ten times their original dimensions', 'three times their original dimensions.', 'c', 0, 0, 0, 0, 0, 0),
(8, 1, 1, 'Bitumen felt', 'is used as water proofing material', 'is used as damp proofing material', 'is made from bitumen and hessian fibres', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(9, 1, 1, 'In the method of condensation polymerization,', 'low-molecular substances are removed from the high molecular substance', 'the reaction proceeds with an evolution of ammonia', 'the reaction proceeds with an evolution of hydrogen chloride', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(10, 1, 1, 'In the cement the compound quickest to react with water, is', 'Tricalcium aluminate', 'Tetra-calcium alumino-ferrite', 'Tricalcium silicate', 'Dicalcium silicate.', 'a', 0, 0, 0, 0, 0, 0),
(11, 1, 1, 'The initial setting time of lime-pozzolana, is', '30 minutes', '60 minutes', '90 minutes', '120 minutes.', 'd', 0, 0, 0, 0, 0, 0),
(12, 1, 1, 'The clay to be used for manufacturing bricks for a large project, is dugout and allowed to weather throughout', 'the monsoon', 'the winter', 'the summer', 'none of these.', 'a', 0, 0, 0, 0, 0, 0),
(13, 1, 1, 'The rocks which are formed due to cooling of magma at a considerable depth from earth''s surface are called', 'Plutonic rocks', 'Hypabyssal rocks', 'Volcanic rocks', 'Igneous rocks.', 'a', 0, 0, 0, 0, 0, 0),
(14, 1, 1, 'Quartzite is a', 'metamorphic rock', 'argillaceous rock', 'calcareous rock', 'silicious rock.', 'd', 0, 0, 0, 0, 0, 0),
(15, 1, 1, 'The variety of pig iron used for manufacture of wrought iron, is', 'Bessemer pig', 'Grey or foundry pig', 'White forge pig', 'Mottled pig.', 'c', 0, 0, 0, 0, 0, 0),
(16, 1, 1, 'Sand stone is', 'sedimentary rock', '', '', '', '', 0, 0, 0, 0, 0, 0),
(17, 1, 1, 'If the furnace is provided with insufficient fuel at low temperatures, the type of pig iron produced, is called', 'Bessemer pig', 'Grey or foundry pig', 'White or forge pig', 'Mottled pig.', 'c', 0, 0, 0, 0, 0, 0),
(18, 1, 1, 'Stainless steel contains', '18% of chromuim and 8% nickel', '8% of chromium and 18% of nickel', '12% of chromium and 36% of nickel', '36% of chromium and 12% of nickel.', 'a', 0, 0, 0, 0, 0, 0),
(19, 1, 1, 'Pick up the hypabyssal rock from the following:', 'Granite', 'Dolerite', 'Basalt', 'All the above.', 'b', 0, 0, 0, 0, 0, 0),
(20, 1, 1, 'Depending on the chemical composition and mechanical properties, iron may be classified as', 'cast iron', 'wrought iron', 'steel', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(21, 1, 1, 'Wrought iron contains carbon about', '1.5% to 5.5%', '0.5% to 1.75%', '0.1% to 0.25%', 'none to these.', 'c', 0, 0, 0, 0, 0, 0),
(22, 1, 1, 'The main constituent of fly-ash, is', 'aluminium oxide', 'silica', 'ferrous oxide', 'All of these.', 'd', 0, 0, 0, 0, 0, 0),
(23, 1, 1, 'Bitumen in', 'solid state, is called asphalt', 'semi fluid state, is called mineral tar', 'fluid state, is called petroleum', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(24, 1, 1, 'The plastics made from cellulose resin', 'are as clear as glass', 'are tough and strong', 'fluid state, is called petroleum', 'all the above', 'd', 0, 0, 0, 0, 0, 0),
(25, 1, 1, 'Kaolin is chemically classified as', 'metamorphic rock', 'argillaceous rock', 'calcareous rock', 'silicious rock.', 'b', 0, 0, 0, 0, 0, 0),
(26, 1, 1, 'Which one of the following is acid resistant asbestos:', 'actinolite asbestos', 'amosite asbestos', 'anthophylite asbestos', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(27, 1, 1, 'Due to attack of dry rot, the timber', 'cracks', 'shrinks', 'reduces to powder', 'none of these', 'c', 0, 0, 0, 0, 0, 0),
(28, 1, 1, 'Brittleness of cold is due to an excess of', 'sulphur', 'carbon', 'phosphorus', 'silicon.', 'c', 0, 0, 0, 0, 0, 0),
(29, 1, 1, 'For the manufacture of Portland cement, the proportions of raw materials used, are', 'lime 63% ; silica 22% ; other ingredients 15%', 'lime 22% ; silica 63% ; other ingredients 15%', 'silica 40% ; lime 40% ; other ingredients 20%', 'silica 70% ; lime 20% ; other ingredients 10%.', 'a', 0, 0, 0, 0, 0, 0),
(30, 1, 1, 'Asbestos cement', 'is brittle', 'warps due to changes in humidity', 'strength is lowered when saturated by water', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(31, 1, 1, 'Gniess is obtained from', 'igneous rocks', 'metamorphic rocks', 'sedimentary rocks', 'sedimentary metamorphic rocks.', 'd', 0, 0, 0, 0, 0, 0),
(32, 1, 1, 'The rocks formed by gradual deposition, are called', 'sedimentary rocks', 'igneous rocks', 'metamorphic rocks', 'none of these.', 'a', 0, 0, 0, 0, 0, 0),
(33, 1, 1, 'Galvanising means covering iron with a thin coat of', 'tin', 'zinc', 'glaze', 'coal tar.', 'b', 0, 0, 0, 0, 0, 0),
(34, 1, 1, 'For preparing porcelains, the clay should be', 'sufficiently pure', 'of high degree of tanacity', 'of good plasticity', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(35, 1, 1, 'Polymerization helps to improve the property of', 'strength', 'rigidity', 'elasticity', 'all of these.', 'd', 0, 0, 0, 0, 0, 0),
(36, 1, 1, 'Good quality stones must', 'be durable', 'be free from clay', 'resist action of acids', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(37, 1, 1, 'Sewer pipes are made of', 'earthen ware', 'stone ware', 'refractory clay', 'terracota', 'b', 0, 0, 0, 0, 0, 0),
(38, 1, 1, 'Fibre glass', 'retains heat-longer', 'has a higher strength to weight ratio', 'is shock proof and fire retardent', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(39, 1, 1, 'Pick up the correct statement from the following:', 'The theory of formation of concrete is based on the phenomena of formation of voids', 'The bulking of sand is taken into account while volumetric proportioning of the aggregates', 'The expansion and contraction joints are provided if concrete structures exceed 12 m in length', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(40, 1, 1, 'Pick up the correct statement from the following:', 'In stone arches, the stones are placed with their natural beds radial', 'In cornices, the stones are placed with their natural beds as vertical', 'In stone walls, the stones are placed with their natural beds as horizontal', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(41, 1, 1, 'The commonly used colour pigment in paints, is', 'ambers', 'carbon black', 'iron oxide', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(42, 1, 1, 'Varnish is a transparent or semi-transparent solution of resinuous substances in', 'alcohol', 'linseed', 'turpentine', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(43, 1, 1, 'Initial setting time of cement for asbestos cement products should be not less than', '30 minutes', '50 minutes', '75 minutes', '90 minutes.', 'd', 0, 0, 0, 0, 0, 0),
(44, 1, 1, 'The variety of pig iron used for the manufacture of steel by Bessemer process, is', 'Bessemer pig', 'Grey pig', 'White forge pig', 'Mottled pig.', 'a', 0, 0, 0, 0, 0, 0),
(45, 1, 1, 'For melting one tonne of cast iron', '700 m3?air is required', '20 kg limestone is required', 'one quintal coke is required', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(46, 1, 1, 'For filling cracks in masonry structures, the type of bitumen used, is', 'cut-back bitumen', 'bitumen-emulsion', 'blown bitumen', 'plastic bitumen.', 'd', 0, 0, 0, 0, 0, 0),
(47, 1, 1, 'Plastic', 'is an organic substance', 'consists of natural or synthetic binders', 'finished products are rigid and stable at normal temperature', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(48, 1, 1, 'Vanadium steel is generally used for', 'railway switches and crossing', 'bearing balls', 'magnets', 'axles and springs.', 'd', 0, 0, 0, 0, 0, 0),
(49, 1, 1, 'Pick up the correct statement from the following:', 'In basic Bessemer process, the steel heats the converter', 'In open-hearth process, the furnace heats the steel', 'In Siemens process, the impurities of pig iron are oxidised by the oxygen of the ore', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(50, 1, 1, 'The process of manufacturing steel by heating short lengths of wrought iron bars mixed with charcoal in fire clay crucibles and collecting the molten iron into moulds, is known as', 'Cementation process', 'Crucible process', 'Bessemer process', 'Open hearth process.', 'b', 0, 0, 0, 0, 0, 0),
(51, 1, 2, 'The rocks in which argil (or clay) predominates, are called', 'sillicious rocks', 'argillaceous rocks', 'calcareous rocks', 'igneous rocks', 'b', 0, 0, 0, 0, 0, 0),
(52, 1, 2, 'A badly mixed cement concrete results in', 'segregation', 'bleeding', 'honey combing', 'none to these.', 'c', 0, 0, 0, 0, 0, 0),
(53, 1, 2, 'Pick up the correct statement regarding low heat cement from the following:', 'It possesses less compressive strength', 'Its initial setting time is about one hour', 'Its final setting time is about 10 hours', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(54, 1, 2, 'Chemically, marble is known as', 'metamorphic rock', 'argillaceous rock', 'calcareous rock', 'silicious rock.', 'c', 0, 0, 0, 0, 0, 0),
(55, 1, 2, 'Inner part of a timber log surrounding the pitch, is called', 'sapwood', 'cambium layer', 'heart wood', 'none to these', 'c', 0, 0, 0, 0, 0, 0),
(56, 1, 2, 'The filler used in plastic bitumen, is', 'shale powder', 'talc powder', 'asbestos powder', 'plastic powder', 'c', 0, 0, 0, 0, 0, 0),
(57, 1, 2, 'Resins are', 'not soluble in water', 'soluble in spirit', 'used in varnishes', 'left behind on evaporation of oil', 'c', 0, 0, 0, 0, 0, 0),
(58, 1, 2, 'Refractory bricks are used for', 'retaining walls', 'columns', 'piers', 'combustion chambers.', 'd', 0, 0, 0, 0, 0, 0),
(59, 1, 2, 'Expanded metal is', 'manufactured from steel sheets', 'used for reinforced concrete in road pavements', 'measured in term of SWM (shortway mesh) and LWM (long way mesh)', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(60, 1, 2, 'The rock generally used for roofing, is', 'granite', 'basalt', 'slate', 'pumice.', 'c', 0, 0, 0, 0, 0, 0),
(61, 1, 2, 'Apiece of sawn timber whose cross-sectional dimensions exceed 5 cm, in one direction and 20 cm in the other direction, is called a', 'cant', 'deal', 'baulk', 'strip.', 'c', 0, 0, 0, 0, 0, 0),
(62, 1, 2, 'Quick lime (or caustic lime)', 'is obtained by the calcination of pure lime stone', 'has great affinity to moisture', 'is amorphous', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(63, 1, 2, 'Pick up the correct statement from the following:', 'soft stones are required for carving', 'light stones are required for arches', 'hard stones are required to stand high pressure', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(64, 1, 2, 'Name the type of cement from the following for canal linings :', 'sulphate resisting cement', 'rapid hardening cement', 'quick setting cement', 'pozzuolana cement.', 'a', 0, 0, 0, 0, 0, 0),
(65, 1, 2, 'Mastic asphalt is generally used for', 'damp proof course', 'water proof layer', 'partition walls', 'both (a) and (b).', 'd', 0, 0, 0, 0, 0, 0),
(66, 1, 2, 'Black marble is generally found in the district of', 'Jodhpur', 'Jaipur', 'Jabalpur', 'Jaisalmer', 'b', 0, 0, 0, 0, 0, 0),
(67, 1, 2, 'The most fire resistant paints are :', 'enamel paints', 'aluminium paints', 'asbestos paints', 'cement paints.', 'b', 0, 0, 0, 0, 0, 0),
(68, 1, 2, 'If?P?is the percentage of water required for normal consistency, water to be added for determination of initial setting time, is', '0.70?P', '0.75?P', '0.80?P', '0.85?P', 'd', 0, 0, 0, 0, 0, 0),
(69, 1, 2, 'A pug mill is used for', 'softening brick earth', 'moulding brick earth', 'tempering brick earth', 'providing brick earth', 'c', 0, 0, 0, 0, 0, 0),
(70, 1, 2, 'A good brick earth should contain :', 'about 20% to 30% of alumina', 'about 50% to 60% of silica', 'about 5 to 6% of oxide of lime', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(71, 1, 2, 'The commonly used lime in white washing, is', 'white lime', 'fat lime', 'hydraulic lime', 'lime', 'b', 0, 0, 0, 0, 0, 0),
(72, 1, 2, 'Shingle is', 'decomposed laterite', 'crushed granite', 'water bound pebbles', 'air weathered rock.', 'a', 0, 0, 0, 0, 0, 0),
(73, 1, 2, 'Pick up the plutonic rock from the following:', 'Granite', 'Dolerite', 'Basalt', 'All the above.', 'a', 0, 0, 0, 0, 0, 0),
(74, 1, 2, 'The lime which contains mainly calcium oxide and slacks with water, is', 'fat lime', 'quick lime', 'hydraulic lime', 'poor lime', 'b', 0, 0, 0, 0, 0, 0),
(75, 1, 2, 'Seasoning is', 'a process of removing sap', 'creosoting', 'painting with sodium silicate', 'coating with tar.', 'a', 0, 0, 0, 0, 0, 0),
(76, 1, 2, 'Inhaling of fly-ash over a long period causes', 'silicosis', 'fibrosis of lungs', 'bronchitis', 'All of these.', 'd', 0, 0, 0, 0, 0, 0),
(77, 1, 2, 'Minimum required water cement ratio for a workable concrete, is', '0.3', '0.4', '0.6', '1.0.', 'b', 0, 0, 0, 0, 0, 0),
(78, 1, 2, 'Rocks formed due to alteration of original structure due to heat and excessive pressure are called', 'sedimentary rocks', 'igneous rocks', 'metamorphic rocks', 'none of these.', 'c', 0, 0, 0, 0, 0, 0),
(79, 1, 2, 'The compound of Portland cement which contributes to the strength after two to three years is', 'Tricalcium silicate', 'Di-calcium silicate', 'Tricalcium aluminate', 'Tetracalcium alumino ferrite.', 'b', 0, 0, 0, 0, 0, 0),
(80, 1, 2, 'For slaking of 10 kg of CaO, the theoretical amount of water is', '2.2 kg', '1.5 kg', '3.2 kg', 'None of these.', 'c', 0, 0, 0, 0, 0, 0),
(81, 1, 2, 'Pick up the correct statement from the following: Method of sawing timber', 'tangentially to annual rings, is known as tangential method.', 'in four quarters such that each board cuts annual rings at angles not less than 45?, is known as quarter sawing method.', 'cut out of quarter logs, parallel to the medullary rays and perpendicular to annual rings, is known as radial sawing.', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(82, 1, 2, 'Clay and silt content in a good brick earth must be at least', '50%', '40%', '30%', '25%', 'a', 0, 0, 0, 0, 0, 0),
(83, 1, 2, 'Bessemer process is used for the manufacture of', 'Pig iron', 'cast iron', 'Wrought iron', 'Steel.', 'd', 0, 0, 0, 0, 0, 0),
(84, 1, 2, 'The portion of the brick without a triangular corner equal to half the width and half the length, is called', 'closer', 'queen closer', 'king closer', 'squint brick.', 'c', 0, 0, 0, 0, 0, 0),
(85, 1, 2, 'The standard size of masonry bricks, is', '18 cm x 8 cm x 8 cm', '19 cm x 9 cm x 9 cm', '20 cm x 10 cm x 10 cm', '21 cm x 11 cm x 11 cm', 'b', 0, 0, 0, 0, 0, 0),
(86, 1, 2, 'Which one of the following is an air binding material ?', 'Gypsum', 'Acid-resistant cement', 'Quick lime', 'All of these.', 'd', 0, 0, 0, 0, 0, 0),
(87, 1, 2, 'A good quality stone absorbs water less than', '5%', '10%', '15%', '20%', 'a', 0, 0, 0, 0, 0, 0),
(88, 1, 2, 'Pick up the correct statement from the following:', 'Alexander Parkes, a Scottish chemist prepared a hard material by mixing camphor and alcohol with nitro cellulose and called it, as?Parkesite', 'Dr. L. Bakeland, a Belgian scientist prepared a product known as Bakelite', 'Pollark, an Austrian scientist prepared a substance from urea and formaldehyde and called it?Plastic', 'All the above.', 'd', 0, 0, 0, 0, 0, 0),
(89, 1, 2, 'Plywood is made from', 'common timber', 'bamboo fibre', 'teak wood only', 'asbestos sheets.', 'c', 0, 0, 0, 0, 0, 0),
(90, 1, 2, 'Soundness test of cement determines', 'quality of free lime', 'ultimate strength', 'durability', 'initial setting', 'a', 0, 0, 0, 0, 0, 0),
(91, 1, 2, 'The slag which floats on the surface of the molten iron generally contains', 'Lime (CaO) 45%', 'Alumina (Al2O3) 12%', ' MgO, CaSO4, KMnO2 and FeO 8%', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(92, 1, 2, 'Minimum of 40% of iron, is available in', 'Magnetite', 'Red haemetite', 'Limonite', 'Black band.', 'd', 0, 0, 0, 0, 0, 0),
(93, 1, 2, 'If the iron ore contains clay as an impurity, the flux added during calcination, is', 'clay', 'lime stone', 'argillaceous iron ore', 'all the above.', 'b', 0, 0, 0, 0, 0, 0),
(94, 1, 2, 'Cement is said to be of good quality if', 'its colour is not greenish grey', 'one feels cool by thrusting one''s hand in the cement bag', 'it is not smooth when rubbed in between fingers', 'none of these.', 'd', 0, 0, 0, 0, 0, 0),
(95, 1, 2, 'Cast steel is manufactured by', 'Cementation process', 'Crucible process', 'Bessemer process', 'Open hearth process.', 'b', 0, 0, 0, 0, 0, 0),
(96, 1, 2, 'For the manufacture of plywood, veneers are placed so that grains of adjacent veneers', 'run at right angles', 'parallel', 'inclined at 45?', 'inclined at 60?.', 'a', 0, 0, 0, 0, 0, 0),
(97, 1, 2, 'A 1st class brick immersed in water for 24 hours, should not absorb water (by weight) more than', '10%', '15%', '20%', '25%', 'c', 0, 0, 0, 0, 0, 0),
(98, 1, 2, 'The proportions of charcoal, saltpetre and sulphur in gun powder by weight, are respectively:', '15, 75, 10', '75, 10, 15', '10, 15, 75', '10, 75, 15.', 'a', 0, 0, 0, 0, 0, 0),
(99, 1, 2, 'Geologically, marble is known as', 'sedimentary rock', 'igneous rock', 'metamorphic rock', 'stratified rock.', 'c', 0, 0, 0, 0, 0, 0),
(100, 2, 3, 'Hydrographic surveys deal with the mapping of', 'large water bodies', 'heavenly bodies', 'mountaineous region', 'canal system', 'a', 0, 0, 0, 0, 0, 0),
(101, 2, 3, 'If?h?is the difference in level between end points separated by?l, then the slope correction is??. The second term may be neglected if the value of?h?in a 20 m distance is less than', '?m', '1 m', '2 m', '3 m', 'd', 0, 0, 0, 0, 0, 0),
(102, 2, 3, 'An ideal vertical curve to join two gradients, is', 'circular', 'parabolic', 'elliptical', 'hyperbolic', 'b', 0, 0, 0, 0, 0, 0),
(103, 2, 3, 'Pick up the correct statement from the following :', 'the eyepiece plays no part in defining the line of sight', 'the diaphragm plays no part in defining the line of sight', 'the optical centre of the objective plays no part in defining the line of sight', 'none of these.', 'a', 0, 0, 0, 0, 0, 0),
(104, 2, 3, 'The intercept of a staff', 'is maximum if the staff is held truly normal to the line of sight.', 'is minimum if the staff is held truly normal to the line of sight.', 'decreases if the staff is tilted away from normal', 'increases if the staff is tilted towards normal.', 'b', 0, 0, 0, 0, 0, 0),
(105, 2, 3, 'The radius of curvature of the arc of the bubble tube is generally kept', '10 m', '25 m', '50 m', '100 m', 'd', 0, 0, 0, 0, 0, 0),
(106, 2, 3, 'If?S?is the length of a subchord and?R?is the radius of simple curve, the angle of deflection between its tangent and sub-chord, in minutes, is equal to', '573?S/R', '573?R/S', '171.9?S/R', '1718.9?S/R.', 'd', 0, 0, 0, 0, 0, 0),
(107, 2, 3, 'The real image of an object formed by the objective, must lie', 'in the plane of cross hairs', 't the centre of the telescope', 'at the optical centre of the eye-piece', 'anywhere inside the telescope.', 'a', 0, 0, 0, 0, 0, 0),
(108, 2, 3, 'In chain surveying tie lines are primarily provided', 'to check the accuracy of the survey', 'to take offsets for detail survey', 'to avoid long offsets from chain lines', 'to increase the number of chain lines.', 'c', 0, 0, 0, 0, 0, 0),
(109, 2, 3, 'Pick up the correct statement from the following :', 'the tangent screw enables to give small movement under conditions of smooth and positive control', 'standing on the tripod is the levelling head or trib arch', 'the levelling screws are used to tilt the instrument so that its rotation axis is truly vertical', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(110, 2, 3, 'One of the Lehmann''s rules of plane tabling, is', 'location of the instrument station is always distant from each of the three rays from the known points in proportion to their distances', 'when looking in the direction of each of the given points, the instrument station will be on the right side of one and left side of the other ray', 'when the instrument station is outside the circumscribing circle its location is always on the opposite side of the ray to the most distant point as the inter-section of the other two rays', 'none of these.', 'a', 0, 0, 0, 0, 0, 0),
(111, 2, 3, 'If?f1?and?f2?are the distances from the optical centre of a convex lens of focal length?f?to conjugate two points?P1and?P2?respectively, the following relationship holds good', 'f?=?f1?+?f2', 'f =1/2 (f1 + f2)', '', 'none of these.', 'c', 0, 0, 0, 0, 0, 0),
(112, 2, 3, 'The accuracy of measurement in chain surveying, does not depend upon', 'length of the offset', 'scale of the plotting', 'importance of the features', 'general layout of the chain lines.', 'd', 0, 0, 0, 0, 0, 0),
(113, 2, 3, 'If arithmetic sum of latitudes of a closed traverse is ?Lat?and closing error in latitude is?dx, the correction for a side whose latitude is?l, as given by Transit Rule, is', '', '', '', 'none of these.', 'a', 0, 0, 0, 0, 0, 0),
(114, 2, 3, 'Closed contours of decreasing values towards their centre, represent', 'a hill', 'a depression', 'a saddle or pass', 'a river bed.', 'b', 0, 0, 0, 0, 0, 0),
(115, 2, 3, 'If a 30 m chain diverges through a perpendicular distance?d?from its correct alignment, the error in length, is', '', '', '', '', 'a', 0, 0, 0, 0, 0, 0),
(116, 2, 3, 'Diopter is the power of a lens having a focal length of', '25 cm', '50 cm', '75 cm', '100 cm', 'a', 0, 0, 0, 0, 0, 0),
(117, 2, 3, 'An imaginary line joining the points of equal elevation on the surface of the earth, represents', 'contour surface', 'contour gradient', 'contour line', 'level line', 'c', 0, 0, 0, 0, 0, 0),
(118, 2, 3, 'The ''fix'' of a plane table station with three known points, is bad if the plane table station lies', 'in the great triangle', 'outside the great triangle', 'on the circumference of the circumscribing circle', 'none of these.', 'c', 0, 0, 0, 0, 0, 0),
(119, 2, 3, 'If?R?is the radius of the main curve, ? the angle of deflection,?S?the shift and?L?the length of the transition curve, then, total tangent length of the curve, is', '(R?-?S) tan ?/2 -?L/2', '(R?+?S) tan ?/2 -?L/2', 'R?+?S) tan ?/2 +?L/2', '(R?-?S) tan ?/2 +?L/2', 'c', 0, 0, 0, 0, 0, 0),
(120, 2, 3, 'In chain surveying field work is limited to', 'linear measurements only', 'angular measurements only', 'both linear and angular measurements', 'all the above.', 'a', 0, 0, 0, 0, 0, 0),
(121, 2, 3, 'Two concave lenses of 60 cm focal length are cemented on either side of a convex lens of 15 cm focal length. The focal length of the combination is', '10 cm', '20 cm', '30 cm', '40 cm', 'c', 0, 0, 0, 0, 0, 0),
(122, 2, 3, 'If ? is the vertical angle of an inclined sight, ? is the angle of tilt of the staff, the error', '', '', '', 'none of these.', 'a', 0, 0, 0, 0, 0, 0),
(123, 2, 3, 'One of the tacheometric constants is additive, the other constant, is', 'subtractive constant', 'multiplying constant', 'dividing constant', 'indicative constant.', 'b', 0, 0, 0, 0, 0, 0),
(124, 2, 3, 'The limiting length of an offset does not depend upon', 'accuracy of the work', 'method of setting out perpendiculars', 'scale of plotting', 'indefinite features to be surveyed.', 'd', 0, 0, 0, 0, 0, 0),
(125, 2, 3, 'In quadrantal bearing system, back bearing of a line may be obtained from its forward bearing, by', 'adding 180?, if the given bearing is less than 180?', 'subtracting 180?, if the given bearing, is more than 180?', 'changing the cardinal points, i.e. substituting N for S and E for W and vice-versa', 'none of these.', 'c', 0, 0, 0, 0, 0, 0),
(126, 2, 3, 'If?L?is the perimeter of a closed traverse, ?D?is the closing error in departure, the correction for the departure of a traverse side of length?l, according to Bowditch rule, is', '', '', '', '.', 'd', 0, 0, 0, 0, 0, 0),
(127, 2, 3, 'Pick up the correct statement from the following:', 'the theodolite in which telescope can be rotated in vertical plane is called a?transmit', 'when the vertical circle is to the left of the telescope during observation, it is called to be in left face', 'when the vertical circle is to the right of the telescope during observation, it is called to be in right face', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(128, 2, 3, 'Pick up the method of surveying in which field observations and plotting proceed simultaneously from the following', 'chain surveying', 'compass surveying', 'plan table surveying', 'tacheometric surveying.', 'c', 0, 0, 0, 0, 0, 0),
(129, 2, 3, 'While viewing through a level telescope and moving the eye slightly, a relative movement occurs between the image of the levelling staff and the cross hairs. The instrument is', 'correctly focussed', 'not correctly focussed', 'said to have parallax', 'free from parallax.', 'c', 0, 0, 0, 0, 0, 0),
(130, 2, 3, 'Accuracy of ''fix'' by two point problem, is', 'bad', 'good', 'not reliable', 'unique.', 'c', 0, 0, 0, 0, 0, 0),
(131, 2, 3, 'A bearing of a line is also known as', 'magnetic bearing', 'true bearing', 'azimuth', 'reduced bearing', 'b', 0, 0, 0, 0, 0, 0),
(132, 2, 3, 'True meridians are generally preferred to magnetic meridians because', 'these converge to a point', 'these change due to change in time', 'these remain constant.', 'None of these.', 'c', 0, 0, 0, 0, 0, 0),
(133, 2, 3, 'Pick up the correct statement from the following :', 'the apparent error on reversal is twice the actual error', 'the correction may be made equal to half the observed discrepancy.', 'the good results may be obtained from a defective instrument by reversing and taking the mean of two erroneous results', 'all the above.', 'd', 0, 0, 0, 0, 0, 0),
(134, 2, 3, 'If ? is the slope of the ground and?l?is the measured distance, the correction is', '2l?sin2??/2', '2l?cos2??/2', '2l?tan2??/2', '2l?cot2??/2.', 'a', 0, 0, 0, 0, 0, 0),
(135, 2, 3, 'The most reliable method of plotting a theodolite traverse, is', 'by consecutive co-ordinates of each station', 'by independent co-ordinates of each station', 'by plotting included angles and scaling off each traverse leg', 'by the tangent method of plotting.', 'b', 0, 0, 0, 0, 0, 0),
(136, 2, 3, 'The difference of level between a point below the plane of sight and one above, is the sum of two staff readings and an error would be produced equal to', 'the distance between the zero of gradient and the foot of the staff', 'twice the distance between the zero of graduation and the foot of the staff', 'thrice the distance between the zero of graduation and the foot of the staff', 'none of the above.', 'b', 0, 0, 0, 0, 0, 0),
(137, 2, 3, 'Offsets are measured with an accuracy of 1 in 40. If the point on the paper from both sources of error (due to angular and measurement errors) is not to exceed 0.05 cm on a scale of 1 cm = 20 m, the maximum length of offset should be limited to', '14.14', '28.28 m', '200 m', 'none of these.', 'b', 0, 0, 0, 0, 0, 0),
(138, 2, 3, 'The probable error of the adjusted bearing at the middle is', '', '?', '', '', '', 0, 0, 0, 0, 0, 0),
(139, 2, 3, 'The bearings of the lines?AB?and?BC?are 146? 30'' and 68? 30''. The included angle?ABC?is', '102?', '78?', '45?', 'none of these.', 'a', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionsets`
--

CREATE TABLE IF NOT EXISTS `questionsets` (
  `qsId` int(11) NOT NULL,
  `setId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionsets`
--

INSERT INTO `questionsets` (`qsId`, `setId`, `questionId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38),
(39, 1, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 1, 45),
(46, 1, 46),
(47, 1, 47),
(48, 1, 48),
(49, 1, 49),
(50, 1, 50),
(51, 2, 51),
(52, 2, 52),
(53, 2, 53),
(54, 2, 54),
(55, 2, 55),
(56, 2, 56),
(57, 2, 57),
(58, 2, 58),
(59, 2, 59),
(60, 2, 60),
(61, 2, 61),
(62, 2, 62),
(63, 2, 63),
(64, 2, 64),
(65, 2, 65),
(66, 2, 66),
(67, 2, 67),
(68, 2, 68),
(69, 2, 69),
(70, 2, 70),
(71, 2, 71),
(72, 2, 72),
(73, 2, 73),
(74, 2, 74),
(75, 2, 75),
(76, 2, 76),
(77, 2, 77),
(78, 2, 78),
(79, 2, 79),
(80, 2, 80),
(81, 2, 81),
(82, 2, 82),
(83, 2, 83),
(84, 2, 84),
(85, 2, 85),
(86, 2, 86),
(87, 2, 87),
(88, 2, 88),
(89, 2, 89),
(90, 2, 90),
(91, 2, 91),
(92, 2, 92),
(93, 2, 93),
(94, 2, 94),
(95, 2, 95),
(96, 2, 96),
(97, 2, 97),
(98, 2, 98),
(99, 2, 99),
(100, 3, 100),
(101, 3, 101),
(102, 3, 102),
(103, 3, 103),
(104, 3, 104),
(105, 3, 105),
(106, 3, 106),
(107, 3, 107),
(108, 3, 108),
(109, 3, 109),
(110, 3, 110),
(111, 3, 111),
(112, 3, 112),
(113, 3, 113),
(114, 3, 114),
(115, 3, 115),
(116, 3, 116),
(117, 3, 117),
(118, 3, 118),
(119, 3, 119),
(120, 3, 120),
(121, 3, 121),
(122, 3, 122),
(123, 3, 123),
(124, 3, 124),
(125, 3, 125),
(126, 3, 126),
(127, 3, 127),
(128, 3, 128),
(129, 3, 129),
(130, 3, 130),
(131, 3, 131),
(132, 3, 132),
(133, 3, 133),
(134, 3, 134),
(135, 3, 135),
(136, 3, 136),
(137, 3, 137),
(138, 3, 138),
(139, 3, 139),
(140, 10, 138),
(141, 10, 139),
(142, 11, 138),
(143, 11, 139);

-- --------------------------------------------------------

--
-- Table structure for table `question_set`
--

CREATE TABLE IF NOT EXISTS `question_set` (
  `id` int(11) NOT NULL,
  `set_name` varchar(50) NOT NULL,
  `set_time` int(11) NOT NULL,
  `subjectId` int(11) DEFAULT NULL,
  `negativeMarks` float NOT NULL COMMENT 'consider in negative',
  `ismixedtest` int(2) DEFAULT NULL,
  `stream_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `setAmount` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_set`
--

INSERT INTO `question_set` (`id`, `set_name`, `set_time`, `subjectId`, `negativeMarks`, `ismixedtest`, `stream_id`, `active`, `setAmount`) VALUES
(1, 'Building Matrial Section 1', 1800, 1, 0.25, NULL, NULL, 1, '10'),
(2, 'Building Matrial Section 2', 1800, 1, 0.25, NULL, NULL, 1, '0'),
(3, 'Surveying Section 3', 1800, 2, 0.25, NULL, NULL, 1, '10'),
(10, 'Full Syllabus Test 1', 3600, NULL, 0.25, 1, 1, 1, '20'),
(11, 'Full Syllabus Free Test 1', 3600, NULL, 0.25, 1, 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE IF NOT EXISTS `stream` (
  `streamId` int(11) NOT NULL,
  `streanName` varchar(500) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`streamId`, `streanName`, `timeStamp`, `active`) VALUES
(1, 'Civil', '2017-03-20 05:28:34', 1),
(2, 'Auto Mobile', '2017-03-20 06:14:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE IF NOT EXISTS `student_answers` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `ParchaseExamId` int(11) NOT NULL,
  `set_no` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `student_answer` varchar(5) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`id`, `student_id`, `ParchaseExamId`, `set_no`, `question_no`, `student_answer`) VALUES
(1, 11, 1, 1, 2, 'c'),
(2, 11, 1, 1, 22, 'a'),
(3, 11, 1, 1, 34, 'b'),
(4, 11, 2, 1, 1, 'd'),
(5, 11, 2, 1, 34, 'b'),
(6, 11, 3, 1, 1, 'b'),
(7, 14, 4, 1, 1, 'a'),
(8, 14, 4, 1, 2, 'c'),
(9, 14, 4, 1, 3, 'b'),
(10, 14, 4, 1, 19, 'd'),
(11, 14, 5, 1, 1, 'c'),
(12, 14, 5, 1, 19, 'c'),
(13, 15, 10, 1, 1, 'b'),
(14, 15, 10, 1, 2, 'd'),
(15, 15, 10, 1, 3, 'd'),
(16, 15, 10, 1, 4, 'a'),
(17, 15, 10, 1, 5, 'a'),
(18, 15, 10, 1, 6, 'b'),
(19, 15, 10, 1, 7, 'c'),
(20, 15, 10, 1, 8, 'c'),
(21, 15, 10, 1, 9, 'b'),
(22, 15, 10, 1, 10, 'd'),
(23, 15, 10, 1, 11, 'c'),
(24, 15, 10, 1, 12, 'b'),
(25, 15, 10, 1, 13, 'b'),
(26, 15, 10, 1, 14, 'c'),
(27, 15, 10, 1, 15, 'b'),
(28, 15, 10, 1, 16, 'c'),
(29, 15, 10, 1, 17, 'b'),
(30, 15, 10, 1, 18, 'c'),
(31, 15, 10, 1, 19, 'c'),
(32, 15, 10, 1, 20, 'b'),
(33, 15, 10, 1, 21, 'c'),
(34, 15, 10, 1, 22, 'b'),
(35, 15, 10, 1, 23, 'b'),
(36, 15, 10, 1, 24, 'b'),
(37, 15, 10, 1, 25, 'c'),
(38, 15, 10, 1, 26, 'c'),
(39, 15, 10, 1, 27, 'c'),
(40, 15, 10, 1, 28, 'c'),
(41, 15, 10, 1, 29, 'a'),
(42, 15, 10, 1, 30, 'd'),
(43, 15, 10, 1, 32, 'c'),
(44, 15, 10, 1, 33, 'c'),
(45, 15, 10, 1, 37, 'c'),
(46, 15, 10, 1, 40, 'a'),
(47, 15, 10, 1, 41, 'b'),
(48, 15, 10, 1, 42, 'b'),
(49, 15, 10, 1, 43, 'c'),
(50, 15, 10, 1, 44, 'd'),
(51, 15, 10, 1, 45, 'c'),
(52, 15, 10, 1, 46, 'b'),
(53, 15, 10, 1, 47, 'c'),
(54, 15, 10, 1, 48, 'c'),
(55, 15, 10, 1, 49, 'a'),
(56, 15, 10, 1, 50, 'b'),
(57, 11, 13, 2, 51, 'b'),
(58, 11, 13, 2, 52, 'c'),
(59, 11, 13, 2, 53, 'b'),
(60, 11, 13, 2, 63, 'd'),
(61, 11, 13, 2, 64, 'c'),
(62, 11, 13, 2, 65, 'b'),
(63, 11, 15, 2, 52, 'b'),
(64, 11, 15, 2, 53, 'b'),
(65, 11, 15, 2, 54, 'b'),
(66, 11, 16, 2, 51, 'a'),
(67, 11, 14, 1, 1, 'c'),
(68, 11, 14, 1, 35, 'b'),
(69, 11, 18, 1, 1, 'b'),
(70, 11, 18, 1, 2, 'c'),
(71, 11, 18, 1, 36, 'b'),
(72, 11, 18, 1, 50, 'd'),
(73, 15, 19, 3, 100, 'b'),
(74, 15, 19, 3, 101, 'c'),
(75, 15, 19, 3, 102, 'c'),
(76, 15, 19, 3, 112, 'c'),
(77, 15, 19, 3, 119, 'c'),
(78, 15, 19, 3, 120, 'd'),
(79, 15, 19, 3, 133, 'c'),
(80, 11, 21, 1, 1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE IF NOT EXISTS `student_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `login_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `name`, `email`, `password`, `phone`, `address`, `payment_amount`, `active`, `login_status`) VALUES
(11, 'Shree', 'shridhar@whitecode.co.in', 'qwerty', 8983375031, '', 15, 1, 1),
(14, 'Dhananjay', 'dhananjay.ghadyalji@whitecode.co.in', 'asdf', 9876543210, '', 945, 1, 1),
(15, 'Pravin Mundhe', 'pamundhe@gmail.com', '9112078539', 9112078539, '', 975, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE IF NOT EXISTS `student_result` (
  `id` int(11) NOT NULL,
  `set_no` int(11) NOT NULL,
  `ParchaseExamId` int(11) NOT NULL,
  `wrong_ans_count` int(11) NOT NULL,
  `right_ans_count` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `not_answered` int(11) NOT NULL,
  `forRank` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`id`, `set_no`, `ParchaseExamId`, `wrong_ans_count`, `right_ans_count`, `student_id`, `percentage`, `total_questions`, `not_answered`, `forRank`) VALUES
(1, 1, 1, 3, 0, 11, 0, 50, 47, 0),
(2, 1, 2, 2, 0, 11, 0, 50, 48, 0),
(3, 1, 3, 1, 0, 11, 0, 50, 49, 0),
(4, 1, 4, 3, 1, 14, 2, 50, 46, 0),
(5, 1, 5, 2, 0, 14, 0, 50, 48, 0),
(6, 1, 10, 35, 9, 15, 18, 50, 6, 0),
(7, 2, 13, 3, 3, 11, 6, 49, 43, 0),
(8, 2, 15, 3, 0, 11, 0, 49, 46, 0),
(9, 2, 16, 1, 0, 11, 0, 49, 48, 0),
(10, 1, 14, 2, 0, 11, 0, 50, 48, 0),
(11, 1, 18, 4, 0, 11, 0, 50, 46, 0),
(12, 3, 19, 6, 1, 15, 3, 40, 33, 0),
(13, 1, 21, 0, 1, 11, 2, 50, 49, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL,
  `streamId` int(11) NOT NULL,
  `question_type` varchar(50) NOT NULL,
  `active` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `streamId`, `question_type`, `active`, `sequence`, `group`) VALUES
(1, 1, 'Building matrial ', 1, 1, 1),
(2, 1, 'Surveying', 1, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapterId`);

--
-- Indexes for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  ADD PRIMARY KEY (`historyId`);

--
-- Indexes for table `purchasedexams`
--
ALTER TABLE `purchasedexams`
  ADD PRIMARY KEY (`purc_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionsets`
--
ALTER TABLE `questionsets`
  ADD PRIMARY KEY (`qsId`);

--
-- Indexes for table `question_set`
--
ALTER TABLE `question_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`streamId`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapterId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `purchasedexams`
--
ALTER TABLE `purchasedexams`
  MODIFY `purc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `questionsets`
--
ALTER TABLE `questionsets`
  MODIFY `qsId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `question_set`
--
ALTER TABLE `question_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `streamId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
