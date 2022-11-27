-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: es_db
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'iPhone'),(2,'Samsung'),(3,'huawei'),(4,'oppo'),(5,'htc'),(6,'nokia'),(7,'acer'),(8,'huwawei'),(9,'samsung'),(10,'olympus'),(11,'nikon'),(12,'sony'),(13,'canon'),(14,'hp'),(15,'Asus'),(16,'Dell'),(17,'hp'),(18,'android'),(19,'samsung'),(20,'vizio'),(21,'abans');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand_has_model`
--

DROP TABLE IF EXISTS `brand_has_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand_has_model` (
  `brand_id` int NOT NULL,
  `model_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_brand_has_model_model1_idx` (`model_id`),
  KEY `fk_brand_has_model_brand1_idx` (`brand_id`),
  CONSTRAINT `fk_brand_has_model_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_brand_has_model_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_has_model`
--

LOCK TABLES `brand_has_model` WRITE;
/*!40000 ALTER TABLE `brand_has_model` DISABLE KEYS */;
INSERT INTO `brand_has_model` VALUES (1,1,1),(2,2,2),(3,3,3);
/*!40000 ALTER TABLE `brand_has_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qty` int DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  KEY `fk_cart_product1_idx` (`product_id`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (7,1,'rashmidissanayake511@gmail.com',3);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Cellphones and Accessories'),(2,'Computers and Tablets'),(3,'Cameras'),(4,'laptops'),(5,'Tv');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_has_brand`
--

DROP TABLE IF EXISTS `category_has_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_has_brand` (
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_category_has_brand_brand1_idx` (`brand_id`),
  KEY `fk_category_has_brand_category1_idx` (`category_id`),
  CONSTRAINT `fk_category_has_brand_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_category_has_brand_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_has_brand`
--

LOCK TABLES `category_has_brand` WRITE;
/*!40000 ALTER TABLE `category_has_brand` DISABLE KEYS */;
INSERT INTO `category_has_brand` VALUES (1,5,1),(1,1,2),(1,2,3),(1,3,4),(1,4,5);
/*!40000 ALTER TABLE `category_has_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Anuradhapura',1),(2,'Gampaha',3),(3,'Kurunagala',4),(4,'Negmbo',5),(5,'Nuwara Eliya',5),(6,'Polonnaruwa',7),(7,'Mathara',8),(8,'Rathnapura',9),(9,'Nochchiyagam',1),(10,'Malsiripura',4),(11,'Madirigiriya',7);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colour`
--

DROP TABLE IF EXISTS `colour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colour` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colour`
--

LOCK TABLES `colour` WRITE;
/*!40000 ALTER TABLE `colour` DISABLE KEYS */;
INSERT INTO `colour` VALUES (1,'black'),(2,'blue'),(3,'red'),(4,'pink'),(5,'white'),(6,'green'),(7,'ash');
/*!40000 ALTER TABLE `colour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condition`
--

DROP TABLE IF EXISTS `condition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condition`
--

LOCK TABLES `condition` WRITE;
/*!40000 ALTER TABLE `condition` DISABLE KEYS */;
INSERT INTO `condition` VALUES (1,'brand new'),(2,'used');
/*!40000 ALTER TABLE `condition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,'Anuradhapura',2),(2,'Kandy',5),(3,'Gampaha',6),(4,'Kurunagala',3),(5,'Negmbo',6),(6,'Nuwara Eliya',5),(7,'Polonnaruwa',2),(8,'Mathara',8),(9,'Rathnapura',5);
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` int DEFAULT NULL,
  `feedback` text,
  `date` datetime DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int NOT NULL,
  `gender_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `code` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES ('resource/mobile_images/iphone12.jpg',1),('resource/mobile_images/htc_u.jpg',2),('resource/mobile_images/huawei_p20.png',3),('resource/mobile_images/oppo_a95.png',4),('resource/computers_images/acer1.jpg',5),('resource/computers_images/dell pc.webp',6),('resource/computers_images/dell pc 2.jpg',7),('resource/computers_images/hp pc.png',8),('resource/camera_images/camera 1.jpg',9),('resource/camera_images/camera 4.jpeg',10),('resource/camera_images/camera 3.webp',11),('resource/camera_images/camera 5.jpg',12),('resource/laptop_images/asus1.jpg',13),('resource/laptop_images/huawei laptop1.jpg',14),('resource/laptop_images/hp-l-1.jpg',15),('resource/laptop_images/hp2.png',16),('resource/tv_images/android tv.jpg',17),('resource/tv_images/abans tv.jpg',18),('resource/tv_images/samsung tv.jpg',19),('resource/tv_images/vizio tv.jpg',20),('resource/tv_images/vizio tv2.jpg',21);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_product_product1_idx` (`product_id`),
  KEY `fk_user_has_product_user1_idx` (`user_email`),
  CONSTRAINT `fk_user_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_user_has_product_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,'Apple'),(2,'samsung_s6'),(3,'huawei_p20'),(4,'htc_u'),(5,'oppo_a95'),(6,'Dell'),(7,'Asus'),(8,'hp'),(9,'Acer'),(10,'olympus'),(11,'nikon'),(12,'canon'),(13,'sony'),(14,'android'),(15,'abans'),(16,'vizio'),(17,'nokiya'),(18,'huawei_tab'),(19,'samsung_tv');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `brand_has_model_id` int NOT NULL,
  `price` double DEFAULT NULL,
  `colour_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `title` varchar(100) DEFAULT NULL,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_colour1_idx` (`colour_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_colour1` FOREIGN KEY (`colour_id`) REFERENCES `colour` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,1,450000,7,3,'4GB','iPhone',2,1,'rashmidissanayake511@gmail.com','2022-11-09 12:45:38',400,800),(2,1,5,50000,1,3,'8GB','HTC',1,1,'rashmidissanayake@gmail.com','2022-11-09 12:54:43',400,800),(3,1,2,45000,2,3,'4GB','Samsung',2,1,'rashmidissanayake511@gmail.com','2022-11-09 13:03:22',400,800),(4,1,3,55000,6,3,'16GB','Huawei',1,1,'rashmidissanayake511@gmail.com','2022-11-09 13:09:29',400,800),(5,2,7,250000,1,5,'4GBRAM','Acer',1,1,'rashmidissanayake511@gmail.com','2022-11-09 13:16:59',1200,1600),(6,2,16,350000,7,5,'16GBram','Dell',1,1,'rashmidissanayake@gmail.com','2022-11-09 13:55:12',1200,1600),(7,2,16,450000,2,5,'16GBram','Dell',1,1,'rashmidissanayake511@gmail.com','2022-11-09 15:47:41',1200,1600),(8,2,20,255000,7,2,'4GBram','HP',1,1,'rashmidissanayake511@gmail.com','2022-11-09 15:50:53',1200,1600),(9,3,13,25000,1,0,'good','Canon',2,1,'rashmidissanayake@gmail.com',NULL,500,1000),(10,3,12,45000,7,6,'good','Sony',1,1,'rashmidissanayake511@gmail.com',NULL,500,1000),(11,3,11,55000,1,6,'good','Nikon',1,1,'rashmidissanayake@gmail.com',NULL,500,1000),(12,3,10,65000,6,6,'good','Olympus',1,1,'rashmidissanayake511@gmail.com',NULL,500,1000),(13,4,15,350000,7,8,'4GBram','Asus',1,1,'rashmidissanayake511@gmail.com',NULL,1200,1600),(14,4,3,250000,1,9,'8GBram','Huawei',1,1,'rashmidissanayake@gmail.com',NULL,1200,1600),(15,4,14,125000,7,6,'4GBram','HP',1,1,'rashmidissanayake511@gmail.com',NULL,1200,1600),(16,4,14,145000,1,6,'16GBram','HP',1,1,'rashmidissanayake511@gmail.com',NULL,1200,1600),(17,5,17,55000,1,5,'good','Android',1,1,'rashmidissanayake511@gmail.com',NULL,1600,2000),(18,5,19,45000,2,6,'HD','Abans',1,1,'rashmidissanayake511@gmail.com',NULL,1600,2000),(19,5,21,55000,2,6,'HD','Samsung',1,1,'rashmidissanayake511@gmail.com',NULL,1600,2000),(20,5,18,35000,7,6,'HD','ViVo',1,1,'rashmidissanayake511@gmail.com',NULL,1600,2000),(21,5,18,35000,7,6,'HD','Sony',1,1,'rashmidissanayake511@gmail.com',NULL,1600,2000);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_image`
--

DROP TABLE IF EXISTS `profile_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile_image` (
  `path` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_image`
--

LOCK TABLES `profile_image` WRITE;
/*!40000 ALTER TABLE `profile_image` DISABLE KEYS */;
INSERT INTO `profile_image` VALUES ('./resource/profile_img/vidusha_6380a83de0c9a.jpeg','anjanavidusha4@gmail.com'),('./resource/profile_img/Harshana_6380a78ed74b9.jpeg','auramartstaff@gmail.com'),('resource/profile_img/rashmi_6380a06a6fb08.png','rashmidissanayake511@gmail.com');
/*!40000 ALTER TABLE `profile_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Northern'),(2,'North Central'),(3,'North Western'),(4,'Eastern'),(5,'central'),(6,'Western'),(7,'Sabaragamuwa'),(8,'Southern'),(9,'Uva');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recent`
--

DROP TABLE IF EXISTS `recent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  KEY `fk_recent_product1_idx` (`product_id`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recent`
--

LOCK TABLES `recent` WRITE;
/*!40000 ALTER TABLE `recent` DISABLE KEYS */;
INSERT INTO `recent` VALUES (1,'rashmidissanayake511@gmail.com',7),(2,'rashmidissanayake511@gmail.com',2),(3,'rashmidissanayake511@gmail.com',4),(4,'rashmidissanayake511@gmail.com',7),(5,'rashmidissanayake511@gmail.com',4),(6,'rashmidissanayake511@gmail.com',4),(7,'rashmidissanayake511@gmail.com',7),(8,'rashmidissanayake511@gmail.com',7);
/*!40000 ALTER TABLE `recent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Available'),(2,'unavable');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_address`
--

DROP TABLE IF EXISTS `user_has_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_has_address` (
  `user_email` varchar(100) NOT NULL,
  `city_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `postal_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_city_city1_idx` (`city_id`),
  KEY `fk_user_has_city_user1_idx` (`user_email`),
  CONSTRAINT `fk_user_has_city_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_city_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_address`
--

LOCK TABLES `user_has_address` WRITE;
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` VALUES ('rashmidissanayake511@gmail.com',1,1,'halmillakulama','nochchiyagama','50'),('auramartstaff@gmail.com',10,2,'Koongolla waththe','Hindagolla','60'),('anjanavidusha4@gmail.com',1,3,'kandy','city','6000');
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `fname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `joined_date` datetime NOT NULL,
  `verification_code` varchar(64) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`) USING BTREE,
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('Vidusha','anjanavidusha4@gmail.com','anjana','123123123','0767572388','2022-11-25 17:03:52',NULL,'1',1),('Harshana','auramartstaff@gmail.com','Chathuranga','123123123','0788294456','2022-11-24 09:30:50','','1',1),('Rashmi','rashmidissanayake511@gmail.com','dissanayake','123456789','0788294456','2022-11-08 13:36:11','636b4abb0fe8d','1',2),('rashmi','rashmidissanayake@gmail.com','dissanayake','12345667','0716673817','2022-11-09 11:36:18',NULL,'1',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watchlist`
--

LOCK TABLES `watchlist` WRITE;
/*!40000 ALTER TABLE `watchlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `watchlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-27 10:00:52
