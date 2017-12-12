-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2017 at 03:21 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.26-1~dotdeb+8.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Rallye_mobilité`
--

-- --------------------------------------------------------

--
-- Table structure for table `appli`
--

CREATE TABLE `appli` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `question` varchar(200) DEFAULT NULL,
  `one` varchar(200) DEFAULT NULL,
  `two` varchar(200) DEFAULT NULL,
  `three` varchar(200) DEFAULT NULL,
  `four` varchar(200) DEFAULT NULL,
  `five` varchar(200) DEFAULT NULL,
  `my_all` varchar(200) DEFAULT NULL,
  `indice` varchar(200) DEFAULT NULL,
  `response` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appli`
--

INSERT INTO `appli` (`id`, `title`, `name`, `question`, `one`, `two`, `three`, `four`, `five`, `my_all`, `indice`, `response`, `image`) VALUES
(1, 'gpe1pg1', 'crocodile', '', 'quand nous avons faim on dit que nous avons les', 'quand un portable n’a pas d’internet, il n’a pas de', '', '', '', 'un restaurant', 'Je suis aussi une espèce de reptile', 'crocodile', ''),
(2, 'gpe1pg2', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'gpe1pg3', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'gpe1pg4', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'gpe1pg5', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'gpe1pg6', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'gpe1pg7', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'gpe1pg8', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'gpe1pg9', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'gpe2pg1', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'gpe2pg2', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'gpe2pg3', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'gpe2pg4', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'gpe2pg5', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'gpe2pg6', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'gpe2pg7', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'gpe2pg8', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'gpe2pg9', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'gpe3pg1', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'gpe3pg2', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'gpe3pg3', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'gpe3pg4', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'gpe3pg5', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'gpe3pg6', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'gpe3pg7', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'gpe3pg8', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'gpe3pg9', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `appli_explication`
--

CREATE TABLE `appli_explication` (
  `id` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `button_enterprise`
--

CREATE TABLE `button_enterprise` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `button_enterprise`
--

INSERT INTO `button_enterprise` (`id`, `name`, `done`) VALUES
(2, 'bâtiment', 0),
(4, 'logistique', 0),
(5, 'restauration', 1),
(6, 'travaux publics', 0),
(7, 'commerce', 1),
(8, 'industrie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `president` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL,
  `vice_director` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `adresse`, `president`, `director`, `vice_director`, `phone`, `mail`, `title`, `done`) VALUES
(1, '91 ter rue Jean Jaurès 62803 LIEVIN Cédex', 'Mr Laurent DUPORGE', 'Mr Benoit DECQ', 'N/C', '0321131015', 'accueil@mde-llhc.fr, ', 'Maison de l’emploi de Lens-Liévin-Hénin-Carvin', 1),
(2, '91 rue Jean Jaurès 62803 LIEVIN Cedex', 'Mr Laurent DUPORGE', 'Mr Benoit DECQ', 'Mme Christiane BOSSELET', '0321748040', 'contact@ml-lenslievin.fr', 'Mission Locale de Lens-Liévin', 1),
(3, '80 rue Montpencher, 62110 HENIN BEAUMONT', 'Mr Daniel MACIEJASZ', 'Mr Florian FRYSON', 'N/C', '0321206464', 'contact@mlhenincarvin.fr', 'Mission Locale de Hénin-Carvin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `number_street` varchar(20) DEFAULT NULL,
  `street` varchar(200) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(60) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `domain_activity` varchar(50) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `web` varchar(50) DEFAULT NULL,
  `done` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entreprises`
--

INSERT INTO `entreprises` (`id`, `title`, `image`, `number_street`, `street`, `postal_code`, `city`, `activity`, `domain_activity`, `contact`, `phone`, `mail`, `web`, `done`) VALUES
(1, 'Auchan', 'auchan.png', '43', 'route Nationale', 62950, 'Noyelles Godault', 'Grande distribution', 'commerce', 'Mme Karima Lalb', '0321698320', 'klalb@auchan.fr', 'www.auchan.fr', 1),
(2, 'Benalu', 'Logo_Benalu-iloveimg-cropped-1-247x70.png', '', 'Rue Zal de la Souchez', 62801, 'Liévin', 'Fabrication de véhicule en aluminium', 'industrie', 'Mme Isabelle Averlan', '0321794334', 'isabelle.averlan@benalu.com', 'www.benalu.com', 0),
(3, 'Durisotti', 'durisotti-249x70.jpg', '', 'Avenue de la Fosse 13', 62430, 'Sallaumines', 'Mécanique & Métallurgie', 'industrie', ' Mme Séverine Clout', '0321698743', 'sclout@durisotti.com', 'www.durisotti.com', 1),
(4, 'Dupont restauration', 'logo-dupont-2017-iloveimg-resized-1-242x70.png', '13', 'avenue Blaise Pascal', 62820, 'Libercourt', 'Traiteur', 'restauration', 'M. Bertrand Galamez', '0321089000', 'galamezb@dupont-restauration.com', 'www.dupont-restauration.fr', 1),
(5, 'Faurecia', 'faurecia-185x70.png', '', 'Chemin de noyelles', 62110, 'Hénin beaumont', 'Automobile', 'industrie', 'Mme Delcloy Cécile', '0321796262', 'cecile.delcloy@faurecia.com', 'www.faurecia.com/fr', 0),
(6, 'Kelvion', 'logo_i-iloveimg-resized-1.png', '2', 'rue de l’électrolyse', 62410, 'Wingles', 'Fabrication d\'équipements aérauliques et frigorifiques', 'industrie', 'Mme Cathy Bouillet', '0321698900', 'cathy.bouillet@kelvion.com', 'fr.kelvion.com', 1),
(7, 'McCain', 'McCain_logo.svg-iloveimg-resized-1-117x70.png', '', 'Parc de la motte du bois', 62440, 'Harnes', 'Agro-alimentaire', 'industrie', 'Mme Caroline Roussel', '0321087800', 'caroline.roussel@mccain.com', 'www.mccain.fr', 1),
(8, 'Moy park', 'moy-park-hero-iloveimg-resized-1-94x70.png', '712', 'chemin de Noyelles', 62110, 'Hénin-Beaumont', 'Plats préparés', 'industrie', 'Mr Marc Duval', '0321796600', 'N/C', 'www.moypark.com', 0),
(9, 'Styrolution', 'Styrolution_Logo.svg-iloveimg-cropped-iloveimg-resized-287x70.png', '', 'rue Albert du Plat', 62410, ' Wingles', 'Fabrication de matières plastiques', 'industrie', 'M. Philippe Bres', '0321773200', 'N/C', 'www.ineos-styrolution.com', 0),
(10, 'O-I', 'Owens-Illinois_logo.svg-iloveimg-resized-95x70.png', '', 'Avenue de la verrerie', 62410, 'Wingles', 'Fabrication du verre', 'industrie', 'Mme Sylvie Mathieu', '0321692990', 'Sylvie.Mathieu@eu.o-i.com', 'http://www.o-i.com', 1),
(11, 'Paprec recyclage', 'logo_paprec_recyclage-web-fondblc-400x200-iloveimg-cropped-iloveimg-resized-231x70.png', '', 'Parc d\'entreprises de la Motte au Bois', 62440, 'Harnes', ' Récupération de déchets triés', 'industrie', 'Mr Grégory Bouriez', '0321136777', 'gregory.bouriez@paprec.com', 'www.paprec.com/fr', 1),
(12, 'Sealock', 'sealock_logo-iloveimg-cropped-iloveimg-resized-207x70.jpg', '53', 'rue du marais', 62430, 'Sallaumines', 'Fabrication de colles industrielles', 'Industrie', 'Jean-Marc Barki', '0321786060', 'sealock@sealock.fr', 'http://www.sealock.fr/', 1),
(13, 'Wecxsteen potatoes', 'wecxsteen-iloveimg-cropped-iloveimg-cropped-iloveimg-resized-211x70.png', '', 'Rue Augustin Legrand', 62680, 'Méricourt', 'Agro-alimentaire', 'industrie', 'N/C', '0321404550', 'N/C', 'http://www.groupe-wecxsteen.com', 1),
(14, 'Wehr', 'logo_494607-iloveimg-resized-1-156x70.png', '', 'rue Jean Baptiste Grison', 62880, 'Vendin-le-vieil', 'Fabrication de robinetterie', 'industrie', 'Mme Cathie Deliers', '0321795450', 'cathie.deliers@weirgroup.com', 'www.global.weir/?lang=fr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `explication`
--

CREATE TABLE `explication` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `text3` text NOT NULL,
  `text4` text NOT NULL,
  `text5` text NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `explication`
--

INSERT INTO `explication` (`id`, `title`, `image`, `text1`, `text2`, `text3`, `text4`, `text5`, `done`) VALUES
(1, 'Mobilité', 'mobilite1.jpg', 'En quelques clics, retrouvez votre trajet sur-mesure combinant :', ' - Le bus sur le réseau Tadao.', ' - Les trains depuis toutes les gares SNCF.', ' - Le taxi.', '- Le covoiturage.', 1),
(2, 'Application', 'application.jpg', 'A définir', 'A définir', '', '', '', 0),
(3, 'Entreprises', 'entreprise1.jpg', 'Cette page est dédiée aux demandeurs d\'emploi.', 'Découvrez une liste d\'entreprises dans la région.', 'Pensez à postuler et à envoyer votre CV.', 'Différents secteurs d’activités peuvent vous être proposés.', '', 1),
(4, 'Formation', 'formation1.jpg', 'Grâce à cette page, vous aurez accès aux différents centres de formations disponibles dans les Hauts de France.', 'Vous pourrez affiner votre recherche et contacter l’organisme de votre choix.', 'N\'hésitez pas.', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `number_street` varchar(11) DEFAULT NULL,
  `street` varchar(200) NOT NULL,
  `postal_code` int(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `web` varchar(100) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id`, `title`, `number_street`, `street`, `postal_code`, `city`, `contact`, `phone`, `mail`, `web`, `done`, `image`) VALUES
(1, 'Afpa', '', 'Rue Léon Blum', 62800, 'Liévin', 'Mr Dominique Bos', '0321773752', 'dominique.bos@afpa.fr', 'www.afpa.fr', 1, 'afpa-70x70.png'),
(2, 'Afpi formation', '360', 'Boulevard Miroslaw Holler', 62110, 'Hénin-Beaumont', 'N/C', '0321204031', 'afpad@afpad-afpi.com', 'www.afpi-acmformation.com', 1, 'logo-afpi-formation-242x70.png'),
(3, 'AFTRAL', '622', 'rue des hauts de France, Delta 3', 62110, ' Hénin-Beaumont', 'Mr Alain Posmyk', '0361196000', 'alain.posmyk@aftral.com', 'www.aftral.com', 1, 'Aftral93_1-300x62.png'),
(4, 'Apprentis Auteuil', '2', 'rue Paul Gaugin', 62750, 'Loos-en-Gohelle', 'Mme Valérie Collart', '0321147753', 'valerie.collart@apprentis-auteuil.org', 'www.cfasaintlouis.fr', 1, 'logo_150ans_1160-125x70.jpg'),
(5, 'ASSIFEP Formation', '', 'Rue des colibris', 62300, 'Lens', 'Mr Grégory Monthuel', 'N/C', 'gregorymonthuel@assifep.com', 'www.assifep.com', 1, 'assifep-logo-196x70.png'),
(6, 'CPO fc', '', 'rue Copernic', 62970, 'Courcelles-les-Lens', 'Mme Fadila Deffar', 'N/C', 'fdeffar@cpo-fc.com', 'www.cpo-fc.com/', 1, 'cpo-70x70.png'),
(7, 'Crefo', '8', 'rue Pierre Bayle', 62300, 'Lens', 'Mme Linda Fruitier', '0321783344', 'lfruitier@crefo.fr', 'crefo.fr', 1, 'crefo-124x70.png'),
(8, 'Greta', '3', 'rue Léon Blum, Centre Arthur Pique', 62800, 'Liévin', 'N/C', '0321692692', 'greta-lagohelle@ac-lille.fr', 'www.greta-npdc.fr', 1, 'GRETAgrandARTOIS2016-189x70.png'),
(9, 'Id formation', '19', 'rue Beaumont', 62950, 'Noyelles-Godault', 'N/C', '0321206787', 'noyelles-godault@id-formation.fr', 'www.id-formation.fr', 1, 'idFormation-70x70.png'),
(10, 'Groupe Instep', '21', 'avenue Lamendin', 62800, 'Liévin', 'Mr Danny Damore', '0321440564', 'danny.damore@instep.fr', '62.210.177.94/instep', 1, 'Logo-Instep-Formation-295x300-69x70.jpg'),
(11, 'Pop School', '32', 'rue Casimir Beugnet', 62300, 'Lens', 'Mme Myriam Pennequin', 'N/C', 'myriam@pop.eu.com', 'pop.eu.com/popschool', 1, 'popschool-60x70.png'),
(12, 'Groupe Promotrans', '', 'Centre Euralogistics, Dourges', 62223, 'Anzin St Aubin', 'Mme Isabelle Ziane', '0321213170', 'i.ziane@promotrans.fr', 'www.promotrans.fr', 1, 'promotrans-255x70.png');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`id`, `text`, `done`) VALUES
(1, 'Vous souhaitez decouvrir les entreprises du territoire ?', 1),
(2, 'Vos conseillers vont vous y aider ! Préparez vous à jouer et à découvrir des métiers. ', 1),
(3, 'Cette application a été imaginé par la Mission Locale de Lens-Liévin et la Maison de l\'emploi de Lens-Liévin-Hénin-Carvin.', 1),
(4, 'Elle a été conçue et réalisée avec l\'appui technique des étudiants de Pop School Lens, par Mr Sailly Sébastien avec l\'aide de Mr Rudy Malcherczyk et Mme Karine Molinaro.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `text` varchar(200) NOT NULL,
  `done` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `image`, `text`, `done`) VALUES
(1, 'Styrolution', 'carou8.jpg', 'Février 2017', 0),
(2, 'Camion de la Plasturgie', 'carou4.jpeg', 'Février 2017', 1),
(3, 'McCain', 'carou7.jpg', 'Mars 2016', 1),
(4, 'Faurecia', 'carou6.jpg', 'Mars 2016', 1),
(5, '', 'carou2.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locate`
--

CREATE TABLE `locate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `qr_code` varchar(200) NOT NULL,
  `start_traject` varchar(200) NOT NULL,
  `end_traject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locate`
--

INSERT INTO `locate` (`id`, `name`, `qr_code`, `start_traject`, `end_traject`) VALUES
(1, 'gpe1pg1', 'afpa-70x70.png', '3 rue bl', '3 rue bl'),
(2, 'gpe1pg2', '', '', ''),
(3, 'gpe1pg3', '', '', ''),
(4, 'gpe1pg4', '', '', ''),
(5, 'gpe1pg5', '', '', ''),
(6, 'gpe1pg6', '', '', ''),
(7, 'gpe1pg7', '', '', ''),
(8, 'gpe1pg8', '', '', ''),
(9, 'gpe1pg9', '', '', ''),
(11, 'gpe2pg1', '', '', ''),
(12, 'gpe2pg2', '', '', ''),
(13, 'gpe2pg3', '', '', ''),
(14, 'gpe2pg4', '', '', ''),
(15, 'gpe2pg5', '', '', ''),
(16, 'gpe2pg6', '', '', ''),
(17, 'gpe2pg7', '', '', ''),
(18, 'gpe2pg8', '', '', ''),
(19, 'gpe2pg9', '', '', ''),
(21, 'gpe3pg1', '', '', ''),
(22, 'gpe3pg2', '', '', ''),
(23, 'gpe3pg3', '', '', ''),
(24, 'gpe3pg4', '', '', ''),
(25, 'gpe3pg5', '', '', ''),
(26, 'gpe3pg6', '', '', ''),
(27, 'gpe3pg7', '', '', ''),
(28, 'gpe3pg8', '', '', ''),
(29, 'gpe3pg9', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mobility`
--

CREATE TABLE `mobility` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `web` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobility`
--

INSERT INTO `mobility` (`id`, `title`, `web`, `image`, `done`) VALUES
(1, 'SNCF', 'www.voyages-sncf.com', 'sncf2.jpg', 1),
(2, 'Co-voiturage', 'www.idvroom.com/recherche-trajet?utm_source=Voyagesncf&utm_medium=pageweb&utm_campaign=partenariatvsc&forcecookies=ok', 'idvroom.png', 1),
(3, 'Taxi', 'www.google.fr/search?q=taxi+lens&tbas=0&sa=X&ved=0ahUKEwjO6ainp4bXAhVkB8AKHSNTAIsQtgQIGg&biw=360&bih=536', 'taxi2.jpeg', 1),
(5, 'TADAO', 'www.tadao.fr/affichage.php?id=268', 'tadao5.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizz`
--

CREATE TABLE `quizz` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `question` varchar(300) NOT NULL,
  `response` varchar(300) NOT NULL,
  `indice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizz`
--

INSERT INTO `quizz` (`id`, `title`, `question`, `response`, `indice`) VALUES
(1, 'durisotti', 'Quelle entreprise transforme des véhicules pour la police ou la gendarmerie ?', 'durisotti', ''),
(2, 'arvato', 'Citer l’entreprise du territoire qui emploie le plus de salariés ?', 'arvato', 'Plateforme sur Vendin-le-vieil');

-- --------------------------------------------------------

--
-- Table structure for table `rebus`
--

CREATE TABLE `rebus` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `one` varchar(200) DEFAULT NULL,
  `two` varchar(200) DEFAULT NULL,
  `three` varchar(200) DEFAULT NULL,
  `four` varchar(200) DEFAULT NULL,
  `five` varchar(200) DEFAULT NULL,
  `indice` varchar(300) DEFAULT NULL,
  `my_all` varchar(300) NOT NULL,
  `response` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rebus`
--

INSERT INTO `rebus` (`id`, `name`, `one`, `two`, `three`, `four`, `five`, `indice`, `my_all`, `response`) VALUES
(1, 'auchan', 'le contraire de bas', 'un espace rempli de mines', '', '', '', 'Gros centre commercial sur Noyelles Godault', 'un magasin créé dans la zone du même nom à Roubaix en 1961', 'auchan'),
(2, 'crocodile', 'quand nous avons faim on dit que nous avons les', 'quand un portable n’a pas d’internet, il n’a pas de', '', '', '', 'Je suis aussi une espèce de reptile', 'un restaurant', 'crocodile');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'Administrateur', '$2y$10$vdZKUpac8oRlaw3vOEHLduTzPQt3GLLab2klZlN1XmKeN0kMECh.u'),
(5, 'seb', '$2y$10$1X6t/2pLdW//XBfJwtnTwe6zyBLKScfIW2W7daDO1GduifJcGIehS');

-- --------------------------------------------------------

--
-- Table structure for table `who`
--

CREATE TABLE `who` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `question` varchar(300) NOT NULL,
  `indice` varchar(300) NOT NULL,
  `response` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `who`
--

INSERT INTO `who` (`id`, `title`, `image`, `question`, `indice`, `response`) VALUES
(1, 'arvato', 'arvato.png', 'Combien de personnes a embauché cette entreprise ?', 'Elle appartient au groupe Bertelsmann et est spécialiste de la relation client par téléphone.', '2500'),
(2, 'louvre-lens', 'LNS-louvre.jpg', 'Qu’abrite ce bâtiment ?', 'Sa galerie du temps est révolutionnaire', 'louvre-lens');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appli`
--
ALTER TABLE `appli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appli_explication`
--
ALTER TABLE `appli_explication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `button_enterprise`
--
ALTER TABLE `button_enterprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explication`
--
ALTER TABLE `explication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locate`
--
ALTER TABLE `locate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobility`
--
ALTER TABLE `mobility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rebus`
--
ALTER TABLE `rebus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who`
--
ALTER TABLE `who`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appli_explication`
--
ALTER TABLE `appli_explication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `button_enterprise`
--
ALTER TABLE `button_enterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `explication`
--
ALTER TABLE `explication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `locate`
--
ALTER TABLE `locate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `mobility`
--
ALTER TABLE `mobility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rebus`
--
ALTER TABLE `rebus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `who`
--
ALTER TABLE `who`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
