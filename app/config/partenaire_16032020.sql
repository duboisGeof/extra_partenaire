-- MySQL dump 10.13  Distrib 5.5.28, for Linux (x86_64)
--
-- Host: localhost    Database: partenaire
-- ------------------------------------------------------
-- Server version	5.5.28

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
-- Table structure for table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actualite`
--

LOCK TABLES `actualite` WRITE;
/*!40000 ALTER TABLE `actualite` DISABLE KEYS */;
INSERT INTO `actualite` VALUES (53,'<p>Le 31 janvier dernier, la CPAM a participé au forum SDAASP (Schéma départemental d\'amélioration de l\'accessibilité des services au public) piloté par le Conseil départemental 93 et la CAF qui a réuni près de 200 participants.</p>\r\n\r\n<p>L’objectif&nbsp;? Informer les professionnels du département - en lien avec le public - des dispositifs d’accès aux droits proposés par les différents organismes (CAF, CPAM, Conseil départemental, CNAV, Pôle emploi, l’ODDS*, etc.).</p>\r\n\r\n<p>À ce titre la CPAM a tenu un stand permettant de communiquer plus largement sur la PFIDASS, le DMP ou encore le compte ameli. Par ailleurs, deux tables rondes ont été organisées&nbsp;: l’une sur l’inclusion numérique, l’autre sur la PFIDASS.</p>\r\n\r\n<p><em>ODDS&nbsp;: Observatoire départemental des données sociales.<br />\r\nL’ODDS est une structure partenariale dédiée au partage de données et à la production d\'études. Elle regroupe les principaux acteurs du domaine social en Seine-Saint-Denis (la Préfecture, la Direction Départementale de la Cohésion Sociale, le Conseil Départemental, la Caf, la Cpam, la Cnav…).</em></p>','http://55.166.4.14/Geoffrey/extra_partenaire/web/files/Actualite/actualite_53.png','Accès aux droits sociaux et aux services : s’informer pour mieux orienter les bénéficiaires','2020-03-13 15:42:15'),(54,'<p>Suite à la mise en place - le 1er novembre dernier - de la complémentaire santé solidaire (CSS), la Cpam a diffusé à ses partenaires un bulletin d’information relatif à la complémentaire santé solidaire le 23 octobre. Mais elle a également organisé pour eux, les 21 et 27 novembre derniers, des sessions d’information.</p>\r\n\r\n<p>L’objectif&nbsp;? Présenter le nouveau dispositif aux acteurs de terrain.</p>\r\n\r\n<p>Ces présentations ont respectivement réuni 111 et 94 personnes soit un total de 205 participants. Parmi les partenaires présents : des centres communaux d’action sociale (CCAS) et centres médico-sociaux (CMS), des missions locales, des assistantes sociales de différents services, des services sociaux d’hôpitaux, des municipalités, ou encore des associations.</p>\r\n\r\n<p>Ces présentations ont été très appréciées par les participants qui ont souligné la clarté des informations communiquées&nbsp;</p>','http://55.166.4.14/Geoffrey/extra_partenaire/web/files/Actualite/actualite_54.png','La Cpam présente la complémentaire santé solidaire à ses partenaires !','2020-03-13 15:42:33'),(55,'<p>Depuis le 1er novembre 2019, la Complémentaire santé solidaire remplace la couverture maladie universelle complémentaire (CMU-C) et l’aide au paiement d’une complémentaire santé (ACS). L’essentiel à savoir.</p>\r\n\r\n<p>Plus simple, ce nouveau dispositif, destiné à mieux protéger les personnes aux revenus modestes, permet aux personnes éligibles à l’ACS de bénéficier du panier de soins de la CMU-C moyennant une participation financière maîtrisée. Et c’est un vrai progrès.</p>\r\n\r\n<p><strong>Un dispositif plus simple pour faciliter le recours à cette aide</strong></p>\r\n\r\n<p>Sur les 12 millions de personnes qui étaient éligibles à la CMU-C et à l’ACS, seulement 7,1 millions de personnes en bénéficiaient effectivement fin juin 2019. En cause, un manque de lisibilité entre les deux dispositifs, la lourdeur des démarches à accomplir pour l’ACS, la persistance de frais élevés sur certains postes de soins. Il était donc nécessaire de simplifier les démarches, d’abord, en réunissant sous une même offre et un même nom les deux dispositifs existants, CMU-C et ACS. Le choix de l’organisme qui gèrera la Complémentaire santé solidaire a aussi été simplifié. Dès la demande, le bénéficiaire sera libre de choisir entre son organisme d’assurance maladie ou un organisme complémentaire au sein d’une liste unique. Il paiera directement sa participation financière, s’il en a une, auprès de l’organisme choisi.</p>\r\n\r\n<p>Cette simplification passe enfin par les démarches à accomplir pour la demander, notamment avec la possibilité d’effectuer les démarches en ligne et avec un nombre limité de pièces justificatives demandées.</p>\r\n\r\n<p><strong>Une plus grande protection pour un coût maitrisé</strong></p>\r\n\r\n<p>La Complémentaire santé solidaire sera également plus protectrice. Les personnes éligibles pourront bénéficier d’une prise en charge totale de leurs frais de santé, incluant les prothèses dentaires, les aides auditives et les lunettes du panier 100 % santé. Ce dernier comprend un large choix d’équipements et de soins répondant aux besoins de santé pour lesquels le reste à charge pouvait être élevé dans le cadre du dispositif ACS. Les dispositifs médicaux tels que fauteuils roulants, sondes, pansements seront aussi totalement couverts, alors qu’ils ne l’étaient pas intégralement par l’ACS.</p>\r\n\r\n<p>Les bénéficiaires qui étaient éligibles à la CMU-C n’auront aucune participation financière à payer pour obtenir la Complémentaire santé solidaire. Pour les éligibles à l’ACS, la contribution sera variable en fonction de l’âge et d’un montant de moins de 1 euro par jour par personne.</p>\r\n\r\n<p><strong>Plus d’infos sur&nbsp;<a href=\"https://www.ameli.fr/seine-saint-denis/assure/droits-demarches/difficultes-acces-droits-soins/complementaire-sante/complementaire-sante-solidaire\">ameli.fr</a></strong></p>','http://55.166.4.14/Geoffrey/extra_partenaire/web/files/Actualite/actualite_55.png','La Complémentaire santé solidaire : un nouveau dispositif d’accès aux soins','2020-03-13 15:43:25'),(56,'<p>Afin de présenter le dispositif PFIDASS et d’associer les partenaires dans la détection du renoncement aux soins, la CPAM a organisé, le 13 juin dernier, une rencontre avec les centres communaux d’action sociale (CCAS), les coordonnateurs ateliers santé ville (ASV) et les centres sociaux.</p>\r\n\r\n<p>26 communes étaient représentées*, soit 65 % des villes du département pour un total de 62 participants dont 24 représentants CCAS, 13 représentants des centres sociaux et 21 représentants ASV.</p>\r\n\r\n<p>À l’issue de cette réunion, certains participants ont adressé des mails afin de souligner leur satisfaction quant à la qualité de la réunion et des informations diffusées mais également pour informer de l’organisation de réunions internes aux structures de leurs communes en vue de communiquer sur le dispositif PFIDASS et lutter contre le renoncement aux soins.</p>\r\n\r\n<p>*Aubervilliers, Aulnay-sous-Bois, Bagnolet, Bondy, Clichy-sous-Bois, Drancy, Épinay-sur-Seine, Gagny, La Courneuve, Le Blanc-Mesnil, Le Pré Saint-Gervais, L’Île-Saint-Denis, Livry-Gargan, Neuilly-sur-Marne, Noisy-le-Grand, Noisy-le-Sec, Pantin, Pierrefitte, Romainville, Rosny-sous-Bois, Saint-Ouen, Sevran, Stains, Tremblay-en-France, Villepinte, Villetaneuse.</p>\r\n\r\n<div>\r\n<p><strong>Plus d’infos sur </strong><a href=\"https://www.ameli.fr/seine-saint-denis/assure/droits-demarches/difficultes-acces-droits-soins/renoncement-soins/dispositif-renoncement\"><strong>ameli.fr</strong></a></p>\r\n</div>','http://55.166.4.14/Geoffrey/extra_partenaire/web/files/Actualite/actualite_56.png','PFIDASS : réunion de présentation du dispositif','2020-03-13 15:44:10');
/*!40000 ALTER TABLE `actualite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `refOp` tinyint(1) NOT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E638C54C8C93` (`type_id`),
  CONSTRAINT `FK_4C62E638C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typecontact` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (4,1,'MARTIN','Jacques','0123456789',1,0),(12,1,'MECHETY','Luiza','12345678',1,0),(82,1,'Dubois','Geoffrey','0616313427',0,NULL),(83,2,'Balissat','Pascal','0616313427',0,NULL),(84,1,'Dubois Le Gestionnaire','Geoffrey Le Gestionnaire','0616313427',0,NULL),(85,1,'Dubois Le Gestionnaire','Geoffrey Le Gestionnaire','0616313427',0,NULL),(86,1,'Dubois Le Gestionnaire','Geoffrey Le Gestionnaire','0616313427',0,NULL),(87,1,'Dubois Le Gestionnaire','Geoffrey Le Gestionnaire','0616313427',0,NULL),(88,1,'Dubois Le Gestionnaire','Geoffrey Le Gestionnaire','0616313427',0,NULL),(89,1,'Dubois','Geoffrey','0616313427',0,NULL),(90,1,'Dubois','Geoffrey','0616313427',0,NULL);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demande_compte`
--

DROP TABLE IF EXISTS `demande_compte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demande_compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `nomStructure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomResponsable` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenomResponsable` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telResponsable` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mailResponsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mailDiffusion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresseStructure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpStructure` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `communeStructure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8DB2148F6BF700BD` (`status_id`),
  KEY `IDX_8DB2148FC54C8C93` (`type_id`),
  CONSTRAINT `FK_8DB2148F6BF700BD` FOREIGN KEY (`status_id`) REFERENCES `demande_status` (`id`),
  CONSTRAINT `FK_8DB2148FC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type_structure` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demande_compte`
--

LOCK TABLES `demande_compte` WRITE;
/*!40000 ALTER TABLE `demande_compte` DISABLE KEYS */;
INSERT INTO `demande_compte` VALUES (32,2,3,'Dubois Geoffrey','Balissat','Pascal','0616313427','pascal.balissat@assurance-maladie.fr','Dubois','Geoffrey','0616313427','geoffrey.dubois@assurance-maladie.fr','dali.cpam-bobigny@assurance-maladie.fr','20 rue du val d\'oise','95340','Bernes-sur-Oise');
/*!40000 ALTER TABLE `demande_compte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demande_status`
--

DROP TABLE IF EXISTS `demande_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demande_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_394423F35E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demande_status`
--

LOCK TABLES `demande_status` WRITE;
/*!40000 ALTER TABLE `demande_status` DISABLE KEYS */;
INSERT INTO `demande_status` VALUES (2,'Acceptée'),(1,'En attente'),(3,'Refusée');
/*!40000 ALTER TABLE `demande_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_question`
--

DROP TABLE IF EXISTS `faq_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reponse` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dans_faq` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `question_reformule` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reponse_reformule` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faqtheme_id` int(11) NOT NULL,
  `date_question` date NOT NULL,
  `date_reponse` date DEFAULT NULL,
  `date_faq` date DEFAULT NULL,
  `questionpartenaire_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4A55B059363BFEA1` (`faqtheme_id`),
  KEY `IDX_4A55B059516F8A47` (`questionpartenaire_id`),
  KEY `IDX_4A55B059E7A1254A` (`contact_id`),
  CONSTRAINT `FK_4A55B059363BFEA1` FOREIGN KEY (`faqtheme_id`) REFERENCES `faq_theme` (`id`),
  CONSTRAINT `FK_4A55B059516F8A47` FOREIGN KEY (`questionpartenaire_id`) REFERENCES `fos_user` (`id`),
  CONSTRAINT `FK_4A55B059E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_question`
--

LOCK TABLES `faq_question` WRITE;
/*!40000 ALTER TABLE `faq_question` DISABLE KEYS */;
INSERT INTO `faq_question` VALUES (36,'Question 2',NULL,'N',NULL,NULL,1,'2018-11-08',NULL,NULL,11,4),(38,'Question 1',NULL,'N',NULL,NULL,1,'2018-11-12',NULL,NULL,11,4),(39,'Question 3',NULL,'N',NULL,NULL,1,'2018-11-12',NULL,NULL,24,12),(44,'question PUMA',NULL,'N',NULL,NULL,1,'2018-11-28',NULL,NULL,11,4),(46,'jkhjk',NULL,'N',NULL,NULL,1,'2018-11-28',NULL,NULL,11,4),(47,'Pol',NULL,'N',NULL,NULL,3,'2019-02-27',NULL,NULL,11,4),(48,'petite question PUMA',NULL,'N',NULL,NULL,1,'2020-02-06',NULL,NULL,24,12),(49,'fbdfbdxfbxb','ghfghfg hfghf','O','Question PUMA','Reponse PUMA',1,'2020-02-20','2020-02-26','2020-02-26',24,12),(50,'hjiu',NULL,'N',NULL,NULL,5,'2020-03-12',NULL,NULL,24,12),(51,'N° de dossier :  - Nom assuré : VIDAL hjghhj - Date de naissance : 09/03/2020 - Date de réception : 01/03/2020','iihbh','N',NULL,NULL,1,'2020-03-12','2020-03-12',NULL,24,12);
/*!40000 ALTER TABLE `faq_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_theme`
--

DROP TABLE IF EXISTS `faq_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail_trait` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_theme`
--

LOCK TABLES `faq_theme` WRITE;
/*!40000 ALTER TABLE `faq_theme` DISABLE KEYS */;
INSERT INTO `faq_theme` VALUES (1,'Question réglementaire - PUMA','','PUMA'),(2,'Question réglementaire - Complémentaire santé solidaire','','CMUACS'),(3,'Question réglementaire - AME','','AME'),(4,'Question réglementaire - Droits des ressortissants européens inactifs','','DROITSRESSORT'),(5,'Question relative à un dossier assuré','',''),(6,'Question sur les modalités du partenariat ','','');
/*!40000 ALTER TABLE `faq_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `structure_id` int(11) DEFAULT NULL,
  `contact_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479E7A1254A` (`contact_id`),
  KEY `IDX_957A6479C54C8C93` (`type_id`),
  KEY `IDX_957A64792534008B` (`structure_id`),
  CONSTRAINT `FK_957A64792534008B` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`),
  CONSTRAINT `FK_957A6479C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type_compte` (`id`),
  CONSTRAINT `FK_957A6479E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (11,'dali','dali','stephane.azerot@assurance-maladie.fr','stephane.azerot@assurance-maladie.fr',1,'t86d6xpdhf4skg8s8ks04gw0sccwsko','$2y$13$t86d6xpdhf4skg8s8ks04e4WV7Xgl1H2sQ81ab3mDCl4YjBoW1geq','2020-03-02 13:07:46',0,0,NULL,'84oFM9UwrLBUajgOciI7UDfd1eGL_Erao5secSWj_xo','2018-12-05 08:57:45','a:1:{i:0;s:10:\"ROLE_ADMIN\";}',0,NULL,5,2,4),(24,'Luiza','luiza','luiza.mechety@assurance-maladie.fr','luiza.mechety@assurance-maladie.fr',1,'t86d6xpdhf4skg8s8ks04gw0sccwsko','$2y$13$t86d6xpdhf4skg8s8ks04e4WV7Xgl1H2sQ81ab3mDCl4YjBoW1geq','2020-03-12 16:53:47',0,0,NULL,NULL,NULL,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}',0,NULL,5,1,12),(40,'geoffrey.dubois@assurance-maladie.fr','geoffrey.dubois@assurance-maladie.fr','geoffrey.dubois@assurance-maladie.fr','geoffrey.dubois@assurance-maladie.fr',1,'m0odn9ff0k0808sog444s0wccc44888','$2y$13$m0odn9ff0k0808sog444suoWz.VgCODOEFEt//H.Fy1kwTmDHYFly','2020-03-12 09:05:21',0,0,NULL,NULL,NULL,'a:1:{i:0;s:15:\"ROLE_PARTENAIRE\";}',0,NULL,3,1,82),(41,'pascal.balissat@assurance-maladie.fr','pascal.balissat@assurance-maladie.fr','pascal.balissat@assurance-maladie.fr','pascal.balissat@assurance-maladie.fr',1,'gl3lyo3urlwgscc0g0ow4o4swkw0sc4','$2y$13$gl3lyo3urlwgscc0g0ow4enx10mXevtbs7t6HFm6nlm9fxlDj/ML6',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:15:\"ROLE_PARTENAIRE\";}',0,NULL,3,1,83),(42,'dubois.leGestionnaire@gmail.com','dubois.legestionnaire@gmail.com','dubois.leGestionnaire@gmail.com','dubois.legestionnaire@gmail.com',1,'6acym4rx5544wscsswskkcoogg0scg4','$2y$13$6acym4rx5544wscsswskkOKr5xg45MhMjUhJGy9ekKOzBkocatflK',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:17:\"ROLE_GESTIONNAIRE\";}',0,NULL,4,NULL,88),(43,'dubois.geof@gmail.com','dubois.geof@gmail.com','dubois.geof@gmail.com','dubois.geof@gmail.com',1,'91fl5qe7cg84884s84kwk4kggss4gow','$2y$13$91fl5qe7cg84884s84kwkuBzpoTGSSbH978wnpiepzXw/.jgcG14i',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:17:\"ROLE_GESTIONNAIRE\";}',0,NULL,4,NULL,89),(44,'sylvie.vidal@assurance-maladie.fr','sylvie.vidal@assurance-maladie.fr','sylvie.vidal@assurance-maladie.fr','sylvie.vidal@assurance-maladie.fr',1,'pafmm0khcyoks40w44s0c44wgww08co','$2y$13$pafmm0khcyoks40w44s0cu/BkajXSV82HiNaoom9ufsi9hBu21dQu','2020-03-12 13:01:59',0,0,NULL,NULL,NULL,'a:1:{i:0;s:17:\"ROLE_GESTIONNAIRE\";}',0,NULL,4,NULL,90);
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateModification` datetime NOT NULL,
  `urlPath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `information`
--

LOCK TABLES `information` WRITE;
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
INSERT INTO `information` VALUES (1,'<div class=\"Texte\" id=\"TheTexte\" lang=\"zxx\">\n<p>Aujourd&#39;hui Soleo saepe ante oculos ponere, idque libenter crebris usurpare sermonibus, omnis nostrorum imperatorum, omnis exterarum gentium potentissimorumque populorum, omnis clarissimorum regum res gestas, cum tuis nec contentionum magnitudine nec numero proeliorum nec varietate regionum nec celeritate conficiendi nec dissimilitudine bellorum posse conferri; nec vero disiunctissimas terras citius passibus</p>\n\n<div class=\"green\"><a href=\"http://www.google.fr\">cuiusquam potuisse peragrari, quam tuis non</a></div>\ndicam cursibus, sed victoriis lustratae sunt&nbsp;&nbsp;\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n</div>\n','2018-10-02 16:37:45','essentiel','Les essentiels'),(2,'<p>Toute personne qui travaille ou réside en France de manière stable et régulière a droit à la prise en charge de ses frais de santé à titre personnel et de manière continue tout au long de sa vie : tel est le principe de la protection universelle maladie.</p>\n\n<p><strong>Plus d’infos sur </strong><a href=\"https://www.ameli.fr/seine-saint-denis/assure/droits-demarches/principes/protection-universelle-maladie\"><strong>ameli.fr</strong></a></p>\n','2018-10-02 16:37:45','PUMA',' La Protection Universelle MAladie (PUMA)'),(3,'<p><span class=\"italique\" lang=\"la\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit. </span></p>\n\n<p><span class=\"italique\" lang=\"la\">Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna. </span></p>\n','2018-10-02 16:37:45','CMUCACS','CMUC - ACS'),(4,'<p><span class=\"italique\" lang=\"la\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit. </span></p>\n\n<p><span class=\"italique\" lang=\"la\">Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna. </span></p>\n','2018-10-02 16:37:45','AME','AME'),(5,'<p><span class=\"italique\" lang=\"la\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit. </span></p>\n\n<p><span class=\"italique\" lang=\"la\">Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna. </span></p>\n','2018-10-02 16:37:45','DROITSRESSORT','Droits des ressortissants'),(6,'<p><span class=\"italique\" lang=\"la\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit. </span></p>\n\n<p><span class=\"italique\" lang=\"la\">Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna. </span></p>\n','2018-10-02 16:37:45','AIDEFI','Aides Financières'),(7,'<p>Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna.</p>\n\n<p>Aliquam convallis sollicitudin purus. Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus. Fusce vulputate sem at sapien. Vivamus leo. Aliquam euismod libero eu enim. Nulla nec felis sed leo placerat imperdiet. Aenean suscipit nulla in justo. Suspendisse cursus rutrum augue. Nulla tincidunt tincidunt mi. Curabitur iaculis, lorem vel rhoncus faucibus, felis magna fermentum augue, et ultricies lacus lorem varius purus. Curabitur eu amet.</p>\n','2018-10-02 16:37:45','AIDEFICOMPL','AFCS - Aides financières complémentaires'),(8,'<p>Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna.</p>\n\n<p>Aliquam convallis sollicitudin purus. Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus. Fusce vulputate sem at sapien. Vivamus leo. Aliquam euismod libero eu enim. Nulla nec felis sed leo placerat imperdiet. Aenean suscipit nulla in justo. Suspendisse cursus rutrum augue. Nulla tincidunt tincidunt mi. Curabitur iaculis, lorem vel rhoncus faucibus, felis magna fermentum augue, et ultricies lacus lorem varius purus. Curabitur eu amet.</p>\n','2018-10-02 16:37:45','CARTEVITALE','CARTE VITALE'),(9,'<div class=\"Texte\" id=\"TheTexte\" lang=\"zxx\">\n<p>Quanta autem v<u>is amicitiae sit, ex hoc intellegi maxime p</u>otest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.</p>\n\n<div class=\"table-responsive\">\n<p>Circa hos dies Lollianus primae lanuginis adulescens, <strong>Lampadi filius ex praefecto, </strong>exploratius causam Maximino spectante, convictus codicem noxiarum artium nondum per aetatem firmato consilio descripsisse, exulque mittendus, ut sperabatur, patris inpulsu provocavit ad principem, et iussus ad <em>eius comitatum duci, de fumo, ut aiunt,</em> in flammam traditus Phalangio Baeticae consulari cecidit funesti carnificis manu.</p>\n</div>\n\n<p>Verum ad istam omnem orationem <a href=\"http://www.google.fr\">brevis est defensio. Nam quoad aetas </a>M. Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam dedit&scaron;nihil dicam hoc loco de me; tantum sit, quantum vos existimatis; hoc dicam, hunc a patre continuo ad me esse deductum; nemo hunc M. Caelium in illo aetatis flore vidit nisi aut cum patre aut mecum aut in M. Crassi castissima domo, cum artibus honestissimis erudiretur.</p>\n\n<p>Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.</p>\n\n<p>Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.</p>\n\n<p>Haec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, quoniam magister equitum longius ea tempestate distinebatur, iussus comes orientis Nebridius contractis undique militaribus copiis ad eximendam periculo civitatem amplam et oportunam studio properabat ingenti, quo cognito abscessere latrones nulla re amplius memorabili gesta, dispersique ut solent avia montium petiere celsorum.</p>\n\n<p>Itaque tum Scaevola cum in eam ipsam mentionem incidisset, exposuit nobis sermonem Laeli de amicitia habitum ab illo secum et cum altero genero, C. Fannio Marci filio, paucis diebus post mortem Africani. Eius disputationis sententias memoriae mandavi, quas hoc libro exposui arbitratu meo; quasi enim ipsos induxi loquentes, ne &#39;inquam&#39; et &#39;inquit&#39; saepius interponeretur, atque ut tamquam a praesentibus coram haberi sermo videretur.</p>\n\n<p>Dum haec in oriente aguntur, Arelate hiemem agens Constantius post theatralis ludos atque circenses ambitioso editos apparatu diem sextum idus Octobres, qui imperii eius annum tricensimum terminabat, insolentiae pondera gravius librans, siquid dubium deferebatur aut falsum, pro liquido accipiens et conperto, inter alia excarnificatum Gerontium Magnentianae comitem partis exulari maerore multavit.</p>\n\n<p>Post haec Gallus Hierapolim profecturus ut expeditioni specie tenus adesset, Antiochensi plebi suppliciter obsecranti ut inediae dispelleret metum, quae per multas difficilisque causas adfore iam sperabatur, non ut mos est principibus, quorum diffusa potestas localibus subinde medetur aerumnis, disponi quicquam statuit vel ex provinciis alimenta transferri conterminis, sed consularem Syriae Theophilum prope adstantem ultima metuenti multitudini dedit id adsidue replicando quod invito rectore nullus egere poterit victu.</p>\n\n<p>Isdem diebus Apollinaris Domitiani gener, paulo ante agens palatii Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsus Constantinopolim petit exindeque per protectores retractus artissime tenebatur.</p>\n</div>\n','2018-10-02 16:37:45','situation','Situations particulières'),(10,'<p>offreSante</p>','2018-10-02 16:37:45','offreSante','aaa'),(11,'<div class=\"Texte\" id=\"TheTexte\" lang=\"zxx\">\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amico</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>&nbsp;</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intelleg<img align=\"left\" alt=\"\" height=\"284\" src=\"http://55.166.4.14/Stephane/extra_partenaire/web/uploads/newsletter%20CPAM%20bretagne.jpg\" style=\"margin:16px\" width=\"288\" />itur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>efrrtrrr</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium di</p>\n</div>\n','2018-10-02 16:37:45','serviceSocial','Le service social'),(12,'<p>offrePartenaire</p>','2018-10-02 16:37:45','offrePartenaire','aaa'),(13,'<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.citur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n\n<p>Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.</p>\n\n<p>Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.</p>\n\n<p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus. Quod si forte, ut fit plerumque, ceciderunt, tum intellegitur quam fuerint inopes amicorum. Quod Tarquinium dixisse ferunt, tum exsulantem se intellexisse quos fidos amicos habuisset, quos infidos, cum iam neutris gratiam referre posset.</p>\n','2018-10-02 16:37:45','mediation','La médiation - la conciliation'),(14,'<div class=\"Texte\" id=\"TheTexte\" lang=\"zxx\">\n<p>Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.</p>\n\n<p>Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Etenim eo loco, Fanni et Scaevola, locati sumus ut nos longe prospicere oporteat futuros casus rei publicae. Deflexit iam aliquantum de spatio curriculoque consuetudo maiorum.</p>\n\n<p>Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.</p>\n\n<p>Apud has gentes, quarum exordiens initium ab Assyriis ad <a href=\"http://google.com\">Nili cataractas</a> porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti, equorum adiumento pernicium graciliumque camelorum per diversa se raptantes, in tranquillis vel turbidis rebus: nec eorum quisquam aliquando stivam adprehendit vel arborem colit aut arva subigendo quaeritat victum, sed errant semper per spatia longe lateque distenta sine lare sine sedibus fixis aut legibus: nec idem perferunt diutius caelum aut tractus unius soli illis umquam placet.</p>\n\n<p>Ibi victu recreati et quiete, postquam abierat timor, vicos opulentos adorti equestrium adventu cohortium, quae casu propinquabant, nec resistere planitie porrecta conati digressi sunt retroque concedentes omne iuventutis robur relictum in sedibus acciverunt.</p>\n\n<p>Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.</p>\n\n<p>Ut enim quisque sibi plurimum confidit et ut quisque maxime virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in amicitiis expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego quidem illius; sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam consuetudo. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.</p>\n\n<p>Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.</p>\n\n<p>Ultima Syriarum est Palaestina per intervalla magna protenta, cultis abundans terris et nitidis et civitates habens quasdam egregias, nullam nulli cedentem sed sibi vicissim velut ad perpendiculum aemulas: Caesaream, quam ad honorem Octaviani principis exaedificavit Herodes, et Eleutheropolim et Neapolim itidemque Ascalonem Gazam aevo superiore exstructas.</p>\n\n<p>Alii summum decus in carruchis solito altioribus et ambitioso vestium cultu ponentes sudant sub ponderibus lacernarum, quas in collis insertas cingulis ipsis adnectunt nimia subtegminum tenuitate perflabiles, expandentes eas crebris agitationibus maximeque sinistra, ut longiores fimbriae tunicaeque perspicue luceant varietate liciorum effigiatae in species animalium multiformes.</p>\n</div>\n','2018-10-02 16:37:45','infosPartenaire','L\'information aux partenaires'),(15,'<p dir=\"rtl\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"-webkit-text-stroke-width:0px; background-color:#ffffff; color:#333f48; display:inline !important; float:none; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; orphans:2; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; word-spacing:0px\">Derni&egrave;re mise &agrave; jour&nbsp;: Le&nbsp;10/12/2018</span></span></span></p>\n\n<p style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\">Conform&eacute;ment &agrave; la loi &laquo; Informatique et Libert&eacute;s &raquo;, le site extra_partenaire de la <u>CPAM Seine-Saint-Denis</u> a fait l&#39;objet d&#39;une d&eacute;claration aupr&egrave;s de la Commission nationale de l&#39;informatique et des libert&eacute;s (Cnil). Les traitements de donn&eacute;es personnelles mis en &oelig;uvre par la CPAM et effectu&eacute;s &agrave; partir&nbsp;sur ce site&nbsp;ont fait l&rsquo;objet de consultations et d&rsquo;avis successifs de la Cnil.</span></span></p>\n\n<p style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\"><strong><span style=\"font-family:Times New Roman,Times,serif\"><u>Pourquoi utilisons-nous des cookies&nbsp;?</u></span></strong></span></span></p>\n\n<aside>\n<p style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">Nous utilisons des cookies sur notre Site pour les besoins de votre navigation, l&rsquo;optimisation et la personnalisation de nos Services sur notre plateforme en m&eacute;morisant vos pr&eacute;f&eacute;rences.Vous pouvez &agrave; tout moment d&eacute;sactiver les cookies.</span></p>\n</aside>\n\n<h4 style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\"><u><strong>D&eacute;finition de &laquo;&nbsp;cookie&nbsp;&raquo; et son utilisation</strong>. </u></span></h4>\n\n<p style=\"text-align: justify; margin-left: 40px;\"><span style=\"font-family:Times New Roman,Times,serif\">Un &laquo;&nbsp;<strong>cookie&nbsp;</strong>&raquo; est un fichier texte d&eacute;pos&eacute; sur votre ordinateur lors de la visite de notre plateforme. Dans votre ordinateur, les cookies sont g&eacute;r&eacute;s par votre navigateur internet.</span></p>\n\n<h4 style=\"text-align: justify;\"><strong><span style=\"font-family:Times New Roman,Times,serif\"><u>Moyens d&rsquo;opposition au d&eacute;p&ocirc;t des cookies</u></span></strong></h4>\n\n<p style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">Vous pouvez &agrave; tout moment choisir de d&eacute;sactiver les cookies. Voici la proc&eacute;dure pour les refuser par d&eacute;faut sur les navigateurs les plus utilis&eacute;s.</span></p>\n\n<p style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>Si vous utilisez Firefox&nbsp;:</strong></span></p>\n\n<ol>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">&nbsp;Cliquez sur le bouton de menu et s&eacute;lectionnez&nbsp;<strong>Options</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">S&eacute;lectionnez le panneau Vie priv&eacute;e et rendez-vous &agrave; la section&nbsp;<strong>Historique</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">&nbsp;Dans le menu d&eacute;roulant &agrave; c&ocirc;t&eacute; de<strong>&nbsp;R&egrave;gles de conservation</strong>&nbsp;: choisissez Utiliser les param&egrave;tres personnalis&eacute;s pour l&rsquo;historique</span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">&nbsp;D&eacute;cochez la case&nbsp;<strong>Accepter les cookies</strong>&nbsp;pour d&eacute;sactiver les cookies</span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">&nbsp;Dans la liste d&eacute;roulante&nbsp;<strong>Accepter les cookies tiers</strong>, s&eacute;lectionnez&nbsp;<strong>&quot;jamais&quot;</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">&nbsp;Fermez la page&nbsp;<em>about:preferences</em>. Toutes les modifications que vous avez apport&eacute;es seront automatiquement enregistr&eacute;es.</span></li>\n</ol>\n\n<p style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>Si vous utilisez Chrome&nbsp;:</strong></span></p>\n\n<ol>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">En haut &agrave; droite, cliquez sur Plus &gt;&nbsp;<strong>Param&egrave;tres</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">En bas, cliquez sur&nbsp;<strong>Avanc&eacute;s</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">Dans la section&nbsp;<strong>&quot;Confidentialit&eacute; et s&eacute;curit&eacute;&quot;</strong>, cliquez sur&nbsp;<strong>Param&egrave;tres du contenu</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">Cliquez sur&nbsp;<strong>Cookies</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">d&eacute;sactivez l&rsquo;option Autoriser les sites &agrave; enregistrer/lire les donn&eacute;es des cookies</span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">Cliquez sur&nbsp;<strong>&quot;OK&quot;&nbsp;</strong>pour valider.</span></li>\n</ol>\n\n<p style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>Si vous utilisez Internet Explorer&nbsp;:</strong></span></p>\n\n<ol>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">S&eacute;lectionnez le bouton&nbsp;<strong>Outils</strong>, puis&nbsp;<strong>Options Internet</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">S&eacute;lectionnez l&rsquo;onglet&nbsp;<strong>Confidentialit&eacute;</strong>, puis sous&nbsp;<strong>Param&egrave;tres</strong>, s&eacute;lectionnez&nbsp;<strong>Avanc&eacute;</strong></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-family:Times New Roman,Times,serif\">Cochez la case&nbsp;<strong>&quot;Ignorer la gestion automatique des cookies&quot;</strong>, puis s&eacute;lectionner&nbsp;<strong>&quot;Refuser&quot;</strong>dans la colonne&nbsp;<strong>&quot;Cookies tierces parties&quot;</strong>.</span></li>\n</ol>\n','2018-12-10 00:00:00','cookies','Confidentialité, protections des données et cookies'),(16,'<p>aide ...</p>','2020-03-02 09:27:00','infosAidesSoins','Aide à l\'accès aux soins');
/*!40000 ALTER TABLE `information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nature_dossier`
--

DROP TABLE IF EXISTS `nature_dossier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nature_dossier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail_cpam` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_25CBABE2A4D60759` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nature_dossier`
--

LOCK TABLES `nature_dossier` WRITE;
/*!40000 ALTER TABLE `nature_dossier` DISABLE KEYS */;
INSERT INTO `nature_dossier` VALUES (1,'AME dépôt d\'une demande','cadres.ame.bobigny.cpam-bobigny@assurance-maladie.fr'),(2,'AME complément d\'une demande','cadres.ame.bobigny.cpam-bobigny@assurance-maladie.fr'),(3,'AME rattachement d\'un ayant droit','cadres.ame.bobigny.cpam-bobigny@assurance-maladie.fr'),(4,'AME rétroactivité','cadres.ame.bobigny.cpam-bobigny@assurance-maladie.fr'),(5,'AME recours gracieux','cadres.ame.bobigny.cpam-bobigny@assurance-maladie.fr'),(6,'PUMA dépôt d\'une demande','psa-leraincy.cpam-bobigny@assurance-maladie.fr'),(7,'PUMA complément d\'une demande','psa-leraincy.cpam-bobigny@assurance-maladie.fr'),(8,'PUMA rétroactivité','psa-leraincy.cpam-bobigny@assurance-maladie.fr'),(9,'PUMA recours gracieux','psa-leraincy.cpam-bobigny@assurance-maladie.fr'),(10,'PUMA + Complémentaire santé solidaire dépôt d\'une demande','cadres-psa-saint-denis.cpam-bobigny@assurance-maladie.fr'),(11,'PUMA + Complémentaire santé solidaire complément d\'une demande','cadres-psa-saint-denis.cpam-bobigny@assurance-maladie.fr'),(14,'Complémentaire santé solidaire dépôt d\'une demande','cadres-psa-saint-denis.cpam-bobigny@assurance-maladie.fr'),(15,'Complémentaire santé solidaire complément d\'une demande','cadres-psa-saint-denis.cpam-bobigny@assurance-maladie.fr'),(16,'Complémentaire santé solidaire rétroactivité','cadres-psa-saint-denis.cpam-bobigny@assurance-maladie.fr'),(17,'Complémentaire santé solidaire recours gracieux','cadres-psa-saint-denis.cpam-bobigny@assurance-maladie.fr'),(18,'Aide financière dépôt d\'une demande','aidefinanciere.cpam-bobigny@assurance-maladie.fr'),(19,'Aide financière complément d\'une demande','aidefinanciere.cpam-bobigny@assurance-maladie.fr'),(20,'Relations internationales (conventions, …)',''),(21,'Demande d\'information',''),(33,'AME mise à jour (RIB, Mater, changement d\'adresse, …)','cadres.ame.bobigny.cpam-bobigny@assurance-maladie.fr'),(34,'Complémentaire santé solidaire + demande de mutation','cadres-psa-saint-denis.cpam-bobigny@assurance-maladie.fr'),(35,'Mutation dépôt d\'une demande','aChanger'),(36,'Mutation complément d\'une demande','aChanger'),(37,'Rattachement des ayants droit mineurs','aChanger'),(38,'Mise à jour (RIB, Mater, Médecin Traitant,…)','aChanger'),(39,'Prescription arrêt de travail','aChanger'),(40,'Indemnités journalières maladie/mater/pater','aChanger'),(41,'Indemnités journalières Accident de Travail/Maladie Pro.','aChanger'),(42,'Indemnités journalières complément d\'une demande','aChanger'),(43,'Carte Vitale','aChanger'),(44,'Feuilles de soins','aChanger'),(45,'Justificatif état civil (attribution d\'un n° définitif / divergence état civil)','aChanger'),(46,'Protocole de soins - demande de prise en charge','aChanger');
/*!40000 ALTER TABLE `nature_dossier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateModification` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7E8585C8A76ED395` (`user_id`),
  CONSTRAINT `FK_7E8585C8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter`
--

LOCK TABLES `newsletter` WRITE;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
INSERT INTO `newsletter` VALUES (310,'Test Sylvie le 27/02/2020','<p><img alt=\"heart\" height=\"23\" src=\"http://55.166.4.14/Sylvie/extra_partenaire/web/bundles/ivoryckeditor/plugins/smiley/images/heart.png\" title=\"heart\" width=\"23\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Une belle newsletter !!!!!!!!!!!!!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sign&eacute;e : <span style=\"color:#800080\">Sylvie</span></p>','2020-02-27 13:51:57',24,NULL),(311,'aaaaaaaaaa','<p>é</p>','2020-03-13 13:30:17',24,NULL);
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_offre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `effacer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offre`
--

LOCK TABLES `offre` WRITE;
/*!40000 ALTER TABLE `offre` DISABLE KEYS */;
INSERT INTO `offre` VALUES (23,'essai','eyuuuuèjjtyju','2018-08-09 15:37:40','2018-08-09 15:37:40',1),(24,'test','aout','2018-08-09 10:37:20','2018-08-17 00:00:00',1),(27,'Nouvelle offre','Nouvelle offre de Geoffrey','2018-08-22 16:31:34','2018-08-22 00:00:00',1),(28,'Nouvelle offre','Nouvelle offre de Geoffrey','2018-08-22 16:33:59','2018-08-15 00:00:00',1),(29,'Nouvelle offre tytytyj','Nouvelle offre de Geoffrey2','2018-10-08 15:24:15','2018-08-15 00:00:00',0),(30,'Nouvelle offre','Nouvelle offre de Geoffrey','2018-08-22 16:35:20','2018-08-15 00:00:00',1),(31,'Geoffrey','Geoffrey offre','2018-08-23 08:51:50','2019-11-08 00:00:00',0),(32,'Geoffrey','Geoffrey offre','2018-08-23 08:52:41','2019-11-08 00:00:00',1),(33,'Geoffrey','Geoffrey offre','2018-08-23 08:53:16','2019-11-08 00:00:00',1);
/*!40000 ALTER TABLE `offre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `structure`
--

DROP TABLE IF EXISTS `structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `commune` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mailDiffusion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partenariat` tinyint(1) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6F0137EAC54C8C93` (`type_id`),
  CONSTRAINT `FK_6F0137EAC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type_structure` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `structure`
--

LOCK TABLES `structure` WRITE;
/*!40000 ALTER TABLE `structure` DISABLE KEYS */;
INSERT INTO `structure` VALUES (1,'Clinique du Grand Stade','130 r D. Casanova','93200','SAINT-DENIS','',0,4),(2,'Hôpital Avicenne','125 rue de Stalingrad','93000','BOBIGNY','cpam2',0,1),(3,'Delafontaine','','93000','Saint-Denis','',0,1);
/*!40000 ALTER TABLE `structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transmission_dossier`
--

DROP TABLE IF EXISTS `transmission_dossier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transmission_dossier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partenaire_id` int(11) DEFAULT NULL,
  `nom_patro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `agent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_mari` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateInstruction` date DEFAULT NULL,
  `ordreArchivage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observationPart` longtext COLLATE utf8_unicode_ci,
  `agentCPAM` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numDossier` int(11) DEFAULT NULL,
  `dateTransmission` date DEFAULT NULL,
  `dateReception` date DEFAULT NULL,
  `demande_id` int(11) NOT NULL,
  `decision_id` int(11) NOT NULL,
  `observationInter` longtext COLLATE utf8_unicode_ci,
  `urgence` tinyint(1) NOT NULL,
  `pj` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_35D12D7498DE13AC` (`partenaire_id`),
  KEY `IDX_35D12D7480E95E18` (`demande_id`),
  KEY `IDX_35D12D74BDEE7539` (`decision_id`),
  CONSTRAINT `FK_35D12D7480E95E18` FOREIGN KEY (`demande_id`) REFERENCES `nature_dossier` (`id`),
  CONSTRAINT `FK_35D12D7498DE13AC` FOREIGN KEY (`partenaire_id`) REFERENCES `structure` (`id`),
  CONSTRAINT `FK_35D12D74BDEE7539` FOREIGN KEY (`decision_id`) REFERENCES `type_decision` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3606 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transmission_dossier`
--

LOCK TABLES `transmission_dossier` WRITE;
/*!40000 ALTER TABLE `transmission_dossier` DISABLE KEYS */;
INSERT INTO `transmission_dossier` VALUES (3589,1,'VIDAL',NULL,'2020-03-09',NULL,'0123652589','hg','hjghhj','2020-03-09','1','test  gh ghh','vidal',NULL,'2020-03-02','2020-03-03',14,1,'sfsdf',0,NULL),(3590,1,'kjl',NULL,'2000-01-04',NULL,'0125698562','bnv','yut',NULL,NULL,NULL,NULL,NULL,'2020-03-02','2020-03-03',6,1,NULL,0,NULL),(3591,1,'jhj',NULL,'2020-03-11',NULL,'0125632584','hfghf','iuio',NULL,NULL,NULL,NULL,NULL,'2020-03-02',NULL,18,1,NULL,1,NULL),(3593,2,'daliu','fg jkhjk hjk jhjk jkh','2020-03-10',NULL,'0123654789','dali','sfgsdfg',NULL,NULL,NULL,NULL,NULL,'2020-03-02','2020-03-10',21,1,NULL,1,NULL),(3594,1,'fghfgh',NULL,'2020-03-10',NULL,NULL,'fghfg','fgh',NULL,NULL,NULL,NULL,NULL,'2020-03-02','2020-03-03',1,1,NULL,0,NULL),(3598,1,'VIDAL','Aucune observation',NULL,'DUPONT','0123658745',NULL,'MARION',NULL,NULL,NULL,NULL,12320,'2020-03-05','2020-03-03',11,1,NULL,0,'dossier_05032020_140532.pdf');
/*!40000 ALTER TABLE `transmission_dossier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_compte`
--

DROP TABLE IF EXISTS `type_compte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EC2139585E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_compte`
--

LOCK TABLES `type_compte` WRITE;
/*!40000 ALTER TABLE `type_compte` DISABLE KEYS */;
INSERT INTO `type_compte` VALUES (5,'Admin'),(3,'Fournisseur'),(4,'Gestionnaire'),(1,'Partenaire'),(2,'PSA');
/*!40000 ALTER TABLE `type_compte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_decision`
--

DROP TABLE IF EXISTS `type_decision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_decision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_decision`
--

LOCK TABLES `type_decision` WRITE;
/*!40000 ALTER TABLE `type_decision` DISABLE KEYS */;
INSERT INTO `type_decision` VALUES (1,'en cours'),(2,'accord PUMA'),(3,'accord PUMA + accord CSS sans PF'),(4,'accord PUMA + accord CSS avec PF'),(5,'accord PUMA + refus CSS'),(6,'accord PUMA + demande de pièces complémentaires CSS'),(7,'accord CSS sans PF'),(8,'accord CSS avec PF'),(9,'accord AME'),(10,'refus PUMA'),(11,'refus PUMA + refus CSS'),(12,'refus CSS'),(13,'refus AME'),(14,'demande de pièces complémentaires PUMA'),(15,'demande de pièces complémentaires PUMA + CSS'),(16,'demande de pièces complémentaires CSS'),(17,'demande de pièces complémentaires AME'),(18,'demande de pièces complémentaires MUTATION'),(19,'demande de pièces complémentaires divers (Mise à jour, aide financières, RFI, SANDIA, CRA, …)'),(20,'demande traitée (aide fi., IJ, …)'),(21,'mise à jour traitée'),(22,'demande déjà traitée'),(29,'demande restituée le jour du RDV'),(30,'demande non déposée par le partenaire'),(31,'hors périmètre CPAM 93'),(32,'hors périmètre AME'),(33,'classement sans suite');
/*!40000 ALTER TABLE `type_decision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_structure`
--

DROP TABLE IF EXISTS `type_structure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DBC776FA5E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_structure`
--

LOCK TABLES `type_structure` WRITE;
/*!40000 ALTER TABLE `type_structure` DISABLE KEYS */;
INSERT INTO `type_structure` VALUES (4,'Autre'),(3,'Centre de formation et d\'apprentissage'),(1,'Hôpital'),(2,'Mission locale jeunes');
/*!40000 ALTER TABLE `type_structure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecontact`
--

DROP TABLE IF EXISTS `typecontact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typecontact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_96866A83A4D60759` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecontact`
--

LOCK TABLES `typecontact` WRITE;
/*!40000 ALTER TABLE `typecontact` DISABLE KEYS */;
INSERT INTO `typecontact` VALUES (1,'Employé'),(2,'Responsable');
/*!40000 ALTER TABLE `typecontact` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-16 10:29:30
