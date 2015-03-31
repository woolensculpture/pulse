-- Dump completed on 2012-10-09 13:26:51
USE `web`;
-- MySQL dump 10.13  Distrib 5.5.16, for osx10.5 (i386)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	5.1.61-0+squeeze1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(45) DEFAULT NULL,
  `song` varchar(45) DEFAULT NULL,
  `album` varchar(45) DEFAULT NULL,
  `review` text NOT NULL,
  `url_tag` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,'Darwin Deez','Radar Detector','Darwin Deez','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec metus ligula, nec iaculis justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec nisi lorem. Lorem ipsum','8pbdLqTh_x4','2011-08-01 04:03:01'),(2,'IS TROPICAL','The Greeks','Native To','Fun. is back with the first single off their upcoming sophomore LP. They recruited current tourmate Janelle Monae for some background vocals near the end of the song, and it\'s awesome. The song feels like it\'s something made by Grizzly Bear and MGMT\'s beautiful daughter. The video on the other hand is quite open-ended, as it makes you come up with your own ideas as to what it could symbolize. Keep your eyes peeled for the album release! THIS ISN\'T FUN YOU SILLY IDIOTS!!! THIS IS TROPICAL!!! THIS ISN\'T FUN YOU SILLY IDIOTS!!! THIS IS TROPICAL!!! THIS ISN\'T FUN YOU SILLY IDIOTS!!! THIS IS TROPICAL!!! THIS ISN\'T FUN YOU SILLY IDIOTS!!! THIS IS TROPICAL!!! THIS ISN\'T FUN YOU SILLY IDIOTS!!! THIS IS TROPICAL!!! THIS ISN\'T FUN YOU SILLY IDIOTS!!! THIS IS TROPICAL!!!','QwrbyVaC6EU','2011-11-30 04:32:35'),(3,'Chiddy Bang','Mind Your Manners','Breakfast','Philly duo Chiddy Bang\'s first single off their upcoming album. Featuring a great sing along child choir sampled from Icona Pop paired with Chiddy\'s rhymes, this is what new wave meets hip hop should be. The video takes a cue from Cee Lo Green\'s widely successful lyric video for \"Fuck You\" from the summer of 2010.','nKyRBCW-Rcg','2011-08-05 02:57:07');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show` int(11) DEFAULT '1',
  `day` int(11) DEFAULT NULL,
  `dj` int(11) DEFAULT '1',
  `others` varchar(45) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `show` (`show`),
  KEY `dj` (`dj`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eboard`
--

DROP TABLE IF EXISTS `eboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `hours` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eboard`
--

LOCK TABLES `eboard` WRITE;
/*!40000 ALTER TABLE `eboard` DISABLE KEYS */;
INSERT INTO `eboard` VALUES (1,'General Manager','General Manager','gm@witr.rit.edu','MWF 10 - 12 PM'),(2,'Program Director','Program Director','pd@witr.rit.edu','MW 12 - 2 PM'),(3,'Chief Engineer','Chief Engineer','engineer@witr.rit.edu','MW 12 - 2 PM'),(4,'Development Director','','development@witr.rit.edu','MW 12 - 2 PM'),(5,'Business Director','','business@witr.rit.edu','MW 12 - 2 PM'),(6,'Member-At-Large','Fernando Ellis','mal@witr.rit.edu','MW 3:30 - 5:30 PM'),(7,'Music Director','Dan Mansen','music@witr.rit.edu','MW 2 - 4 PM'),(8,'News Director','Zoe Rabinowitz','news@witr.rit.edu','MW 12 - 2 PM'),(9,'Production Director','JT Fitzgerald','production@witr.rit.edu','MW 12 - 2 PM'),(10,'Webmaster','Phil Betley','webmaster@witr.rit.edu','MW 2 - 4 PM'),(11,'IT Director','Dan Grau','it@witr.rit.edu','MW 12 - 2 PM'),(12,'Secretary','Taylor Osmonson','','MW 12 - 2 PM'),(13,'Test Position','Test Name','Test Email','Test Hours');
/*!40000 ALTER TABLE `eboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_reviews`
--

DROP TABLE IF EXISTS `album_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_name` varchar(45) DEFAULT NULL,
  `album_name` varchar(45) DEFAULT NULL,
  `review` text,
  `img_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_reviews`
--

LOCK TABLES `album_reviews` WRITE;
/*!40000 ALTER TABLE `album_reviews` DISABLE KEYS */;
INSERT INTO `album_reviews` VALUES (1,'The Naked and Famous','Passive Me, Agressive You','This album is...','album1.jpg'),(3,'Manchester Orchestra','Simple Math','At first glance, or at least upon hearing the lead single, Atlanta\'s Manchester Orchestra seems to have completely reinvented themselves on their latest album. Adding strings to the mix is an initial shock to the system, but the more refined sound feels like a natural evolution on their brilliant third album. Rest assured, Andy Hull and crew are still willing and able to kick you in the chest with burly guitar-driven rock and rip your heart out with soul-baring lyrics. After a few listens, you\'ll realize the depth and beauty this album has to offer.','simplemath.jpg'),(2,'Tapes \'N Tapes','Outside','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu ligula a sem placerat commodo. Sed nulla diam, dapibus eu volutpat nec, viverra sed ligula. Morbi condimentum, metus ac consectetur vehicula, lacus dui tincidunt nisi, in sagittis urna neque et nisl. Mauris sollicitudin dui vel ipsum feugiat ornare. Nam neque nisi, dapibus quis ornare quis, pulvinar eget purus. Sed vestibulum quam eget sem dictum non tincidunt lacus imperdiet. Fusce faucibus condimentum sem a varius. Curabitur sed eros ut justo aliquet sodales nec ac neque. Proin ut dui dolor. Aenean in nibh erat, nec pharetra sapien.','album2.jpg'),(5,'Portugal. The Man','In the Mountain In the Cloud','Portugal. The Man\'s 6th studio album to date and first signed to Atlantic Records. With a fresh David Bowie-esque psychedelic synth-pop feel, this album is definitely their most glamorous to date. “So American” starts the album off on the right foot, singing about the typical American things, breaking rules, Rock n Roll, and boys and girls. The album’s single, “Got It All (This Can’t Be Living Now)” is perfect for the bike ride along the Genesee on those rare sunny Rochester days. The rest of the album frolics along beautifully, like the scenery of their native Alaska. The final song “Sleep Forever” is one of the strongest, yet also the most atmospheric song on the album. Thanks to “In The Mountain In The Cloud”, Portugal. The Man sounds better than ever.','portugal._the_man_.jpg');
/*!40000 ALTER TABLE `album_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charts`
--

DROP TABLE IF EXISTS `charts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `song` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charts`
--

LOCK TABLES `charts` WRITE;
/*!40000 ALTER TABLE `charts` DISABLE KEYS */;
INSERT INTO `charts` VALUES (1,'This is song 1'),(2,'This is song 2'),(3,'This is song 3'),(4,'This is song 4'),(5,'This is song 5'),(6,'This is song 6'),(7,'This is song 7'),(8,'This is song 8'),(9,'This is song 9'),(10,'This is song 10'),(11,'This is song 11'),(12,'This is song 12'),(13,'This is song 13'),(14,'This is song 14'),(15,'This is song 15'),(16,'This is song 16'),(17,'This is song 17'),(18,'This is song 18'),(19,'This is song 19'),(20,'This is song 20');
/*!40000 ALTER TABLE `charts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(45) NOT NULL,
  `picture` varchar(45) NOT NULL DEFAULT 'default.jpg',
  `long_decription` varchar(45) DEFAULT NULL,
  `description_page` tinyint(1) DEFAULT '0',
  `url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'EVENT','WITR @ Global Village','2011-08-29','9 - 11pm','global_village3.jpg',NULL,0,''),(8,'EVENT','Joywave w/ Sports 7\" Release Show','2011-08-05','@ Bug Jar','joywave.jpg',NULL,1,'http://bugjar.com/2011/04/rochester-ny-joywave-w-sports-light-feelings-featuring-travis-j-johansen-the-beaumonts/'),(5,'EVENT','WITR @ RIT Club Fair','2011-09-04','Debut of new T-Shirts!','club_fair.jpg',NULL,0,''),(16,'EVENT','Joywave','2011-09-10','@The Bug Jar','joywave1.jpg',NULL,1,'http://bugjar.com/2011/08/rochester-ny-joywave-w-doctors-kopps-milking-diamonds/'),(9,'EVENT','Flour City Shows presents: O\'Death','2011-09-17','@ The Bug Jar','ODeath.jpg',NULL,1,'http://flourcityshows.com/?page_id=6'),(20,'EVENT','WITR @ Tympanogram presents: The Static Jacks','2011-09-22','@ The Lovin\' Cup','static_jacks.png',NULL,1,'http://www.thestaticjacks.com/'),(10,'EVENT','The Demos','2011-09-23','@ The Bug Jar','The_demos.jpg',NULL,1,'http://bugjar.com/2011/06/rochester-ny-the-demos-w-the-national-rifle-the-tins-mikey-jukebox/'),(11,'EVENT','Umphrey\'s McGee','2011-09-13','@ Water Street Music Hall','mcgee.jpg',NULL,0,NULL),(12,'EVENT','Giant Panda Guerilla Dub Squad','2011-09-30','@ Water Street Music Hall','panda.jpg',NULL,0,NULL),(13,'EVENT','The Flaming Lips','2011-10-25','@ The Main Street Armory','flaming_lips.jpg',NULL,0,NULL),(14,'EVENT','Reel Big FIsh w/ Streetlight Manifesto','2011-08-11','@ Main Street Armory','reel_big_fish.jpg',NULL,0,NULL),(15,'EVENT','Pixies Doolittle Tour','2011-11-02','@ Main Street Armory','pixies.jpg',NULL,0,NULL),(19,'EVENT','Flour City Shows presents: Reading Rainbow','2011-09-16','@ The Bug Jar','reading_rainbow.png',NULL,1,'http://flourcityshows.com/?page_id=6'),(18,'EVENT','WITR @ Homecoming Hockey Tailgate','2011-10-15','@ Blue Cross Arena','hockey.png',NULL,0,NULL),(21,'SLIDER','Test','2011-09-22','0','static_jacks_slider.jpg',NULL,0,NULL),(22,'SLIDER','Test 2','2011-09-23','0','sports_slider.jpg',NULL,0,NULL),(23,'SLIDER','Test User','2011-09-30','0','default.jpg',NULL,0,NULL),(24,'SLIDER','Ask Alec','2012-09-28','0','default.jpg',NULL,1,'http://test.witr.rit.edu/askalec');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afcu_contest`
--

DROP TABLE IF EXISTS `afcu_contest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afcu_contest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `submission_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afcu_contest`
--

LOCK TABLES `afcu_contest` WRITE;
/*!40000 ALTER TABLE `afcu_contest` DISABLE KEYS */;
INSERT INTO `afcu_contest` VALUES (1,'test','','','','','','',NULL,'2012-02-12 23:46:59'),(2,'test','','','','','','',NULL,'2012-02-12 23:48:46');
/*!40000 ALTER TABLE `afcu_contest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `dj_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_role` int(11) DEFAULT '1',
  `picture` varchar(45) DEFAULT 'default.jpg',
  `description` varchar(1000) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_role` (`user_role`),
  KEY `password` (`password`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_resources`
--

DROP TABLE IF EXISTS `user_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_resources`
--

LOCK TABLES `user_resources` WRITE;
/*!40000 ALTER TABLE `user_resources` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) DEFAULT NULL,
  `resource` int(11) DEFAULT NULL,
  `read` tinyint(1) DEFAULT '0',
  `write` tinyint(1) DEFAULT '0',
  `modify` tinyint(1) DEFAULT '0',
  `delete` tinyint(1) DEFAULT '0',
  `publish` tinyint(1) DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permissions`
--

LOCK TABLES `user_permissions` WRITE;
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `show_picture` varchar(45) NOT NULL DEFAULT 'default.jpg',
  `slider_picture` varchar(45) NOT NULL DEFAULT 'default.jpg',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `style` varchar(150) DEFAULT 'display: none;',
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shows`
--

LOCK TABLES `shows` WRITE;
/*!40000 ALTER TABLE `shows` DISABLE KEYS */;
INSERT INTO `shows` VALUES (1,'The Pulse of Music','','POMdecal.jpg','pulse_of_music.jpg',1,'position: absolute; z-index: 1000; left: 15px; top: 65px; font-size: 55px; color: black;'),(2,'Dysfunctional Noise','The Greatest Punk Rock Show on EARTH!','punk.jpg','dysfunctionalnoise.jpg',1,'position: absolute; z-index: 1000; left: 15px; top: 70px; font-size: 54px; color: white;'),(5,'Bad Dog Blues','','bdblues.jpg','baddogblues.jpg',1,'position: absolute; z-index: 1000; left: 15px; top: 80px; font-size: 50px; color: white;'),(6,'Dig This!','','digthis.jpg','Digthis.jpg',0,'position: absolute; z-index: 1000; left: 25px; top: 20px; font-size: 50px; color: white;'),(7,'Dimension Latina','','latina.jpg','dimension_latina.jpg',1,'position: absolute; z-index: 1000; left: 15px; top: 85px; font-size: 50px; color: black;'),(8,'Do the Pop','','default.jpg','normal_happiness.jpg',1,'position: absolute; z-index: 1000; left: 20px; top: 45px; font-size: 47px; color: white;'),(9,'Femme Fatale','','femme.jpg','femme_fatale.jpg',1,'position: absolute; z-index: 1000; left: 10px; top: 70px; font-size: 50px; color: black'),(11,'House Rhythm Radio','','hrr.jpg','houserhythm.jpg',1,'position: absolute; z-index: 1000; left: 25px; top: 35px; font-size: 45px; color: white;'),(12,'Jamtower Radio','','jtr.jpg','jamtower.jpg',1,'position: absolute; z-index: 1000; left: 25px; top: 40px; font-size: 45px; color: white;'),(13,'Reggae Sounds','','reggae.jpg','reggaesounds.jpg',1,'position: absolute; z-index: 1000; left: 25px; top: 30px; font-size: 45px; color: white;'),(14,'Rochester Sessions','','rochester.jpg','rochSessions.jpg',1,'position: absolute; z-index: 1000; left: 20px; top: 55px; font-size: 50px; color: white;'),(15,'Renegade Soundwave','','renegade.jpg','RSW.jpg',1,'position: absolute; z-index: 1000; left: 30px; top: 65px; font-size: 45px; color: white;'),(16,'Skank On','','skank.jpg','SkankOnt.jpg',1,'position: absolute; z-index: 1000; left: 40px; top: 55px; font-size: 50px; color: white;'),(17,'The Answer','','theanswer.jpg','the_answer.jpg',1,'position: absolute; z-index: 1000; left: 20px; top: 70px; font-size: 50px; color: white;'),(18,'The G-Spot','','hiphop.jpg','GSPOT.jpg',1,'position: absolute; z-index: 1000; left: 15px; top: 80px; font-size: 55px; color: black;'),(19,'Indestructable Beat','','beat.jpg','indestructible_beat.jpg',1,'position: absolute; z-index: 1000; left: 15px; top: 80px; font-size: 53px; color: black'),(20,'Raised on Rock','','default.jpg','raisedon_rock.jpg',1,'position: absolute; z-index: 1000; left: 20px; top: 60px; font-size: 50px; color: black'),(21,'Headbangers Haven','','z_news_19_EMP_headbanger_170_Pixel.jpg','headbangers.jpg',1,'position: absolute; z-index: 1000; left: 13px; top: 70px; font-size: 55px; color: white;'),(22,'Smash\'em Up','','default.jpg','smashemup.jpg',1,'position: absolute; z-index: 1000; left: 15px; top: 80px; font-size: 55px; color: black'),(23,'Top 20 Countdown','','countdown.jpg','countdown.jpg',1,'position: absolute; z-index: 1000; left: 20px; top: 80px; font-size: 50px; color: black'),(24,'Metallic Overdrive','','metallic.jpg','metallic_overdrive.jpg',0,'position: absolute; z-index: 1000; left: 10px; top: 70px; font-size: 50px; color: black'),(25,'Density Wave','Density Wave is Rochester\'s trip-hop show. Tune in to hear Commander Val bring you some dense sound waves in a trip through trip hop.','density_wave.jpg','density_wave.jpg',1,'position: absolute; z-index: 1000; left: 25px; top: 55px; font-size: 50px; color: black');
/*!40000 ALTER TABLE `shows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hockey`
--

DROP TABLE IF EXISTS `hockey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hockey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `opponent` varchar(100) DEFAULT NULL,
  `opponent_img` varchar(300) DEFAULT 'default.jpg',
  `rit_score` int(11) DEFAULT '0',
  `opponent_score` int(11) DEFAULT '0',
  `recording` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `time` (`time`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hockey`
--

LOCK TABLES `hockey` WRITE;
/*!40000 ALTER TABLE `hockey` DISABLE KEYS */;
INSERT INTO `hockey` VALUES (1,'2011-10-01','17:00:00','here','Brock','brock.jpg',14,5,'WITR - Brick City Weekend RIT vs SLU.mp3'),(2,'1969-12-31','10:30:00','there','them','brock.jpg',5,0,NULL),(3,'2011-10-11','14:30:00','There','Those guys','default.jpg',0,0,'12_Outbreak.mp3'),(4,'2011-10-18','14:30:00','sdfsd - test2','sdf','default.jpg',10,0,NULL),(5,'2011-10-11','14:30:00','adsf-test','asdf','default.jpg',0,0,NULL),(6,'2011-11-20','23:21:00','asdg','asdg','default.jpg',0,0,NULL),(7,'2011-11-23','10:30:00','tes','ets','default.jpg',0,0,NULL),(8,'1969-12-31','19:00:00','0','0','default.jpg',0,0,NULL);
/*!40000 ALTER TABLE `hockey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'user','Registered User',NULL),(2,'admin','Administrator Role',1),(3,'super_admin','Super Administrator',2),(4,'pd','Programming Director',2),(5,'music','Music Director',4),(6,'mal','Member At Large',2),(7,'dev','Development Director',2),(8,'news','News Director',7),(9,'hockey','Hockey DJ Admin',1),(10,'guest','Guest Role',NULL);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-09 13:26:52
