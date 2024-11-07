-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: inovedashboad
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.22.04.1

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('campanhainterna@gmail.com|127.0.0.1','i:1;',1730313671),('campanhainterna@gmail.com|127.0.0.1:timer','i:1730313671;',1730313671),('llmagaia25@gmail.com|127.0.0.1','i:1;',1728329278),('llmagaia25@gmail.com|127.0.0.1:timer','i:1728329278;',1728329278),('llmagaia26@gmail.com|127.0.0.1','i:2;',1727370147),('llmagaia26@gmail.com|127.0.0.1:timer','i:1727370147;',1727370147);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Comunicação e Expressão Oral','Desenvolva habilidades para comunicar-se de forma clara e eficaz. O curso aborda técnicas de apresentação, oratória, e habilidades interpessoais essenciais para uma comunicação bem-sucedida em diversos contextos.','images/rSGkimQ9bVae8zCxvr3zgAI2IIsOJABDgF80AoVV.jpg','2024-08-25 10:34:07','2024-08-25 10:45:18'),(2,'Introdução à Programação','Um curso ideal para iniciantes interessados em aprender os fundamentos da programação. Aborda conceitos básicos, lógica de programação e introdução a linguagens como Python ou JavaScript.','images/9LnTlB6L4yNy0SFvC3XHWC9oRlme5dsXZKJcsQHs.jpg','2024-08-25 10:34:49','2024-09-18 15:21:31'),(3,'Finanças Pessoais','Aprenda a gerenciar seu dinheiro de forma eficiente, desde orçamento e poupança até investimentos e planejamento para o futuro. O curso oferece dicas práticas para melhorar sua saúde financeira.','images/3u8ZltDWLfsFtWpzuMd3CNcmoyeF66IePMIc2aZq.jpg','2024-08-25 10:35:26','2024-09-18 08:50:53'),(5,'Novo curso','dsadsadd',NULL,'2024-09-17 17:50:12','2024-09-18 07:35:53'),(6,'Grupo 1','Grupo 1 descricao',NULL,'2024-09-18 15:17:05','2024-09-18 15:19:55'),(7,'Grupo 2','Grupo 2 descricao',NULL,'2024-09-18 15:17:23','2024-09-18 15:17:23');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_cursos`
--

DROP TABLE IF EXISTS `group_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_cursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` bigint unsigned NOT NULL,
  `group_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_cursos_curso_id_foreign` (`curso_id`),
  KEY `group_cursos_group_id_foreign` (`group_id`),
  CONSTRAINT `group_cursos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_cursos_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_cursos`
--

LOCK TABLES `group_cursos` WRITE;
/*!40000 ALTER TABLE `group_cursos` DISABLE KEYS */;
INSERT INTO `group_cursos` VALUES (3,5,1,'2024-09-17 17:50:12','2024-09-17 17:50:12'),(5,5,5,NULL,NULL),(8,3,5,NULL,NULL),(9,3,1,NULL,NULL),(10,6,6,'2024-09-18 15:17:05','2024-09-18 15:17:05'),(11,7,7,'2024-09-18 15:17:23','2024-09-18 15:17:23'),(12,6,7,NULL,NULL),(13,2,6,NULL,NULL);
/*!40000 ALTER TABLE `group_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_users`
--

DROP TABLE IF EXISTS `group_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `group_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_users_user_id_foreign` (`user_id`),
  KEY `group_users_group_id_foreign` (`group_id`),
  CONSTRAINT `group_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_users`
--

LOCK TABLES `group_users` WRITE;
/*!40000 ALTER TABLE `group_users` DISABLE KEYS */;
INSERT INTO `group_users` VALUES (5,17,4,NULL,NULL),(6,17,1,NULL,NULL),(7,10,4,NULL,NULL),(8,10,1,NULL,NULL),(9,1,4,NULL,NULL),(10,1,1,NULL,NULL),(11,18,6,NULL,NULL),(12,19,7,NULL,NULL),(13,18,7,NULL,NULL),(14,21,6,NULL,NULL),(21,29,6,NULL,NULL),(22,29,7,NULL,NULL);
/*!40000 ALTER TABLE `group_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'sistema','2024-09-17 16:48:32','2024-09-17 16:48:32'),(4,'Antonio Madlante teste','2024-09-17 17:07:44','2024-09-17 17:07:44'),(5,'Antonio Madlante teste','2024-09-17 17:07:47','2024-09-17 17:07:47'),(6,'grupo1','2024-09-18 15:10:53','2024-09-18 15:10:53'),(7,'grupo2','2024-09-18 15:10:58','2024-09-18 15:10:58');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (16,'0001_01_01_000000_create_users_table',1),(17,'0001_01_01_000001_create_cache_table',1),(18,'0001_01_01_000002_create_jobs_table',1),(19,'2024_08_08_074829_create_permission_tables',1),(48,'2024_08_12_170155_create_cursos_table',2),(49,'2024_08_12_170201_create_videos_table',2),(50,'2024_08_15_075149_create_perguntas_table',2),(51,'2024_08_15_075200_create_respostas_table',2),(52,'2024_08_25_112936_create_video__users_table',2),(53,'2024_08_25_134915_create_personal_access_tokens_table',3),(55,'2024_08_26_071115_add_progress_to_video__users_table',4),(56,'2024_09_17_182554_create_groups_table',5),(57,'2024_09_17_191531_remove_client_type_from_cursos_table',6),(58,'2024_09_17_194400_create_group_cursos_table',7),(60,'2024_09_18_073121_create_group_users_table',8),(61,'2024_09_19_070251_create_video_curso_users_table',9),(62,'2024_09_19_091543_update_curso_id_in_videos_table',10),(64,'2024_09_19_091710_create_video_users_table',11),(65,'2024_09_21_141335_create_origem_clientes_table',12),(66,'2024_09_26_182639_create_settings_templates_table',13),(67,'2024_10_08_130208_create_origin_groups_table',14),(68,'2024_10_08_235538_add_column_to_origem_clientes--table=origem_clientes',15),(69,'2024_11_03_231412_add_session_id_to_users_table',16),(71,'2024_11_04_105457_create_videos_watcheds_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (2,'App\\Models\\User',1),(1,'App\\Models\\User',2),(2,'App\\Models\\User',8),(2,'App\\Models\\User',9),(2,'App\\Models\\User',10),(2,'App\\Models\\User',15),(2,'App\\Models\\User',16),(2,'App\\Models\\User',17),(2,'App\\Models\\User',18),(2,'App\\Models\\User',19),(1,'App\\Models\\User',20),(2,'App\\Models\\User',21),(2,'App\\Models\\User',22),(2,'App\\Models\\User',23),(2,'App\\Models\\User',24),(2,'App\\Models\\User',25),(2,'App\\Models\\User',26),(2,'App\\Models\\User',27),(2,'App\\Models\\User',28),(2,'App\\Models\\User',29);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origem_clientes`
--

DROP TABLE IF EXISTS `origem_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `origem_clientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origem_clientes`
--

LOCK TABLES `origem_clientes` WRITE;
/*!40000 ALTER TABLE `origem_clientes` DISABLE KEYS */;
INSERT INTO `origem_clientes` VALUES (1,'Antonio Madlante teste 1',NULL,NULL,NULL,'2024-09-21 12:33:21','2024-09-21 12:40:07'),(2,'origem 2',NULL,NULL,NULL,'2024-09-21 12:34:17','2024-09-21 12:34:17'),(3,'Origem 3',NULL,NULL,NULL,'2024-09-21 12:35:17','2024-09-21 12:35:17'),(9,'Teste 1','89e3a668-9c01-4d9d-a1ff-365367a30039','teste-1',NULL,'2024-10-08 22:01:50','2024-10-08 22:01:50');
/*!40000 ALTER TABLE `origem_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origin_groups`
--

DROP TABLE IF EXISTS `origin_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `origin_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `groups_id` bigint unsigned NOT NULL,
  `origem_clientes_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `origin_groups_groups_id_foreign` (`groups_id`),
  KEY `origin_groups_origem_clientes_id_foreign` (`origem_clientes_id`),
  CONSTRAINT `origin_groups_groups_id_foreign` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `origin_groups_origem_clientes_id_foreign` FOREIGN KEY (`origem_clientes_id`) REFERENCES `origem_clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origin_groups`
--

LOCK TABLES `origin_groups` WRITE;
/*!40000 ALTER TABLE `origin_groups` DISABLE KEYS */;
INSERT INTO `origin_groups` VALUES (10,6,9,NULL,NULL),(11,7,9,NULL,NULL);
/*!40000 ALTER TABLE `origin_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('llmagaia2@gmail.com','$2y$12$XzBL8U8UODctC6OCJfoKOuUbNWliyW7TW7j6kCvV3GHPXieWDV3ZS','2024-08-22 02:51:47');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perguntas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `videos_id` bigint unsigned NOT NULL,
  `users_id` bigint unsigned NOT NULL,
  `pergunta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `respondida` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perguntas_videos_id_foreign` (`videos_id`),
  KEY `perguntas_users_id_foreign` (`users_id`),
  CONSTRAINT `perguntas_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `perguntas_videos_id_foreign` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (1,4,18,'adsaasdsd',1,'2024-09-26 15:46:28','2024-10-07 12:12:58'),(2,14,29,'dsadsadasdasd',1,'2024-11-03 20:12:28','2024-11-03 20:13:00');
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'edit courses','web','2024-08-09 05:20:13','2024-08-09 05:20:13'),(2,'delete courses','web','2024-08-09 05:20:13','2024-08-09 05:20:13');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostas`
--

DROP TABLE IF EXISTS `respostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respostas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `perguntas_id` bigint unsigned NOT NULL,
  `users_id` bigint unsigned NOT NULL,
  `resposta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respostas_perguntas_id_foreign` (`perguntas_id`),
  KEY `respostas_users_id_foreign` (`users_id`),
  CONSTRAINT `respostas_perguntas_id_foreign` FOREIGN KEY (`perguntas_id`) REFERENCES `perguntas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `respostas_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostas`
--

LOCK TABLES `respostas` WRITE;
/*!40000 ALTER TABLE `respostas` DISABLE KEYS */;
INSERT INTO `respostas` VALUES (1,1,2,'sSAS','2024-10-07 12:12:58','2024-10-07 12:12:58'),(2,2,29,'dsdadsad','2024-11-03 20:13:00','2024-11-03 20:13:00');
/*!40000 ALTER TABLE `respostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2024-08-09 05:20:13','2024-08-09 05:20:13'),(2,'cliente','web','2024-08-09 05:20:13','2024-08-09 05:20:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('AICA9481rErG72Af5fw9eptF85NkENyzDy9tvutD',29,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkhmd0doSHJkbW11S0h2OTcxR2ZHZ0Q1OWZwU0c2OHo3cGxveGtHNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbGllbnQvdmlkZW9zIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjk7fQ==',1730810244),('jcOAHEDTJw11wVa284XFgXHpvrgdoOuoQBAKgtF3',29,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRkQ0WFprYUp2RjdYWTI3VjNuZE1XZFF4NWJJN0FXTXBnMGZVWXd0TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly83OWIzLTE5Ni0zLTEwMC02Ni5uZ3Jvay1mcmVlLmFwcC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI5O30=',1730809969),('Z4VkRjWrSzIcQoesOHNlvfEU0BABj6mrH0jo0ejY',29,'127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Mobile Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3BvRWRFTnpNc25GaUFmcnpQMW5KQkIwbko0d1JVazZJRjlaNmZuMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly82YzFjLTE5Ni0zLTEwMC02Ni5uZ3Jvay1mcmVlLmFwcC9jbGllbnQvdmlkZW9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjk7fQ==',1730810183);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings_templates`
--

DROP TABLE IF EXISTS `settings_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sidebar_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_menu_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_menu_hover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_table_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings_templates`
--

LOCK TABLES `settings_templates` WRITE;
/*!40000 ALTER TABLE `settings_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lazaro','Magaia','827017601','827017602','llmagaia3@gmail.com','1','2',NULL,'$2y$12$gm5EEJ750QO1X4Bfk3Q4vuOe7rU.JLEbt/3M.bU23yhUNEWqgbBJu',NULL,'2024-08-09 05:20:13','2024-09-23 19:49:50',NULL),(2,'Lazaro','Magaia','827017601','827017602','llmagaia2@gmail.com',NULL,'1',NULL,'$2y$12$TR0jxga6ZgOyFtnKQgnHkuBvH966MA4MoBiy4kEh1xeZgvPUssM0i',NULL,'2024-08-09 05:24:10','2024-11-05 10:36:49','NLXmrD9n7EiG5g9nGF472jRirOpckwhvsv1AK5Jz'),(8,'Edilson','Alfredo','827017601',NULL,'campanha2@gmail.com','1','2',NULL,'$2y$12$evtFF3bwTT/LXzaQJo3VguAmxap15xq61gucUwiFuoFkpHmcaHsWq',NULL,'2024-08-14 14:49:53','2024-08-15 13:22:18',NULL),(9,'Cliente','Externo 2','827017601',NULL,'campanha3@gmail.com','2','2',NULL,'$2y$12$Xd9U6463H3cCh7tPLskfXOMw5PBhTbQqcY4VWdvx/mK3FSn0LjcBa',NULL,'2024-08-15 13:08:35','2024-08-22 01:21:52',NULL),(10,'Campanha','interna','827017601','827017601','campanhainterna@gmail.com','1','2',NULL,'$2y$12$szHtSTKSWYMvOeqNx3Ih5exX9re0911WMHGaIj81TMfoz8JoHeMy6',NULL,'2024-08-15 13:09:31','2024-08-15 13:09:31',NULL),(17,'Usuario','Teste','827017601',NULL,'llmagaia21@gmail.com','1','2',NULL,'$2y$12$hRbV2GSflZ4SMXuJHsP1UeueSshcf6BnZMbvJQr20ZzlrnMLP6hGK',NULL,'2024-09-18 07:29:39','2024-09-18 07:29:39',NULL),(18,'Grupo 1','Magaia','827017601',NULL,'llmagaia25@gmail.com','1','2',NULL,'$2y$12$tK335AbSE1BI3MOhDihsrOuqhKrvd.0ib3ZxWFQq5XUELO0mRqsfS',NULL,'2024-09-18 15:14:42','2024-09-18 15:14:42',NULL),(19,'Teste 2','Magaia','827017601',NULL,'llmagaia26@gmail.com','1','2',NULL,'$2y$12$V8JH/aTb6yNZi5FvQ3m8pOCuQPh2GAHPFPzQNwL9sLkrYTNipLNrq',NULL,'2024-09-18 15:16:20','2024-09-19 18:52:24',NULL),(20,'Lazaro','Magaia','82701760144',NULL,'llmagaia122@gmail.com',NULL,'1',NULL,'$2y$12$dJ/n/zH0rsOxVc91mCIA0eXp1qG0eWJu/vq/wJ3XdXYg8RNJAtiDW',NULL,'2024-09-21 12:10:43','2024-09-21 12:10:43',NULL),(21,'Lazaro','Magaia','82701764151',NULL,'llmagaia211@gmail.com','2','2',NULL,'$2y$12$hAdzSaTRUIf8bamDXbQINeaqFMl8TuJIrD1bKUqMJCk4MA1mIgd/S',NULL,'2024-09-21 12:51:39','2024-09-21 12:51:39',NULL),(29,'Lazaro','Magaia','82701760145',NULL,'llmagaia30@gmail.com','2','2',NULL,'$2y$12$EG5G5MHGEd5mjvD6N8BZMOICh0Q325Uqrxx.3cblr9ARpeY/seq7i',NULL,'2024-10-08 23:36:01','2024-11-05 10:37:18','AICA9481rErG72Af5fw9eptF85NkENyzDy9tvutD');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video__users`
--

DROP TABLE IF EXISTS `video__users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video__users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `videos_id` bigint unsigned NOT NULL,
  `watched` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `progress` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `video__users_user_id_videos_id_unique` (`user_id`,`videos_id`),
  KEY `video__users_videos_id_foreign` (`videos_id`),
  CONSTRAINT `video__users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `video__users_videos_id_foreign` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video__users`
--

LOCK TABLES `video__users` WRITE;
/*!40000 ALTER TABLE `video__users` DISABLE KEYS */;
INSERT INTO `video__users` VALUES (11,9,1,1,'2024-08-26 07:36:01','2024-08-26 10:59:45',100),(12,29,14,1,'2024-11-03 20:31:00','2024-11-03 20:55:41',100);
/*!40000 ALTER TABLE `video__users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_curso_users`
--

DROP TABLE IF EXISTS `video_curso_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video_curso_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `curso_id` bigint unsigned NOT NULL,
  `video_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_curso_users_user_id_foreign` (`user_id`),
  KEY `video_curso_users_curso_id_foreign` (`curso_id`),
  KEY `video_curso_users_video_id_foreign` (`video_id`),
  CONSTRAINT `video_curso_users_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `video_curso_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `video_curso_users_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_curso_users`
--

LOCK TABLES `video_curso_users` WRITE;
/*!40000 ALTER TABLE `video_curso_users` DISABLE KEYS */;
INSERT INTO `video_curso_users` VALUES (3,9,5,10,'2024-09-19 06:09:56','2024-09-19 06:09:56'),(5,1,5,10,'2024-09-19 06:50:06','2024-09-19 06:50:06'),(6,8,5,10,'2024-09-19 06:50:06','2024-09-19 06:50:06'),(7,18,5,10,'2024-09-19 08:47:56','2024-09-19 08:47:56'),(8,18,2,6,'2024-09-19 12:35:11','2024-09-19 12:35:11'),(9,19,2,6,'2024-09-19 12:35:11','2024-09-19 12:35:11');
/*!40000 ALTER TABLE `video_curso_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_users`
--

DROP TABLE IF EXISTS `video_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `video_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_users_user_id_foreign` (`user_id`),
  KEY `video_users_video_id_foreign` (`video_id`),
  CONSTRAINT `video_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `video_users_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_users`
--

LOCK TABLES `video_users` WRITE;
/*!40000 ALTER TABLE `video_users` DISABLE KEYS */;
INSERT INTO `video_users` VALUES (5,18,12,'2024-09-19 08:47:47','2024-09-19 08:47:47'),(6,1,12,'2024-09-19 12:10:56','2024-09-19 12:10:56'),(7,1,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(8,8,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(9,9,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(10,10,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(11,17,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(12,18,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(13,19,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(14,21,14,'2024-10-30 16:42:12','2024-10-30 16:42:12'),(15,29,14,'2024-10-30 16:42:12','2024-10-30 16:42:12');
/*!40000 ALTER TABLE `video_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` bigint unsigned DEFAULT NULL,
  `id_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int NOT NULL DEFAULT '0',
  `data_adicao` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_curso_id_foreign` (`curso_id`),
  CONSTRAINT `videos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,3,'Ip81_0CCJeY','https://youtu.be/Ip81_0CCJeY?si=aQlXUkd9orZfWVr_','The Lion King in 60 Seconds','Everything you need to know about the lion king summarized in 60 seconds.\r\n\r\n\r\nThanks to Oscartoons for lending his voice to this abomination!','https://img.youtube.com/vi/Ip81_0CCJeY/maxresdefault.jpg',1,'2024-08-25','2024-08-25 10:37:23','2024-08-25 10:37:23'),(2,3,'HNbHwmjzcGM','https://youtu.be/HNbHwmjzcGM?si=pzpvu0Gs58Fo3cAu','If Mufasa Was A Better Dad : The Lion King Spoof!','We all love the #lionking  and #mufasa  is a pretty good dad but I dare to ask what if he was better? It is #fathersday  month so there I did it. \r\n\r\n#solidjj  #cartoons  #disney','https://img.youtube.com/vi/HNbHwmjzcGM/maxresdefault.jpg',2,'2024-08-25','2024-08-25 10:38:13','2024-08-25 10:38:13'),(3,3,'Xiw8RCD8mZ4','https://youtu.be/Xiw8RCD8mZ4?si=D8fxZAxtWxxFZm_D','Zootopia in 3 Minutes','Get AtlasVPN for only $1.39 per month for a limited time! https://atlasv.pn/Reedflower\r\n\r\n\r\nSome editing help and Flash the Sloth by Vindag\r\nAll other male voices by HeyZKay:    • Video','https://img.youtube.com/vi/Xiw8RCD8mZ4/maxresdefault.jpg',3,'2024-08-25','2024-08-25 10:38:52','2024-08-25 10:38:52'),(4,2,'VWAqDfFtB0g','https://youtu.be/VWAqDfFtB0g?si=NjHpr8pWZh0ZzDNE','The Apollo Program in 60 Seconds','Made for the 50th anniversary of the Apollo 11 landing, this is a very quick look at all the other Apollo missions that led up to and went beyond the first steps on the Moon.','https://img.youtube.com/vi/VWAqDfFtB0g/maxresdefault.jpg',1,'2024-08-25','2024-08-25 10:40:21','2024-08-25 10:40:21'),(5,2,'XASY30EfGAc','https://youtu.be/XASY30EfGAc?si=KQO54RVlm8YiqTdW','What is a Programming Language in 60 seconds!','Did you know that a programming language is a way for humans to tell computers what to do? In this episode, Laura Holmes goes over how programming languages work and what they are best used for.','https://img.youtube.com/vi/XASY30EfGAc/maxresdefault.jpg',2,'2024-08-25','2024-08-25 10:41:05','2024-08-25 10:41:05'),(6,2,'yp_531ec3D0','https://youtu.be/yp_531ec3D0?si=OY9yR_20RARTkb_x','Programming in 60 seconds','This video explain the main concept behind programming.','https://img.youtube.com/vi/yp_531ec3D0/maxresdefault.jpg',3,'2024-08-25','2024-08-25 10:41:43','2024-08-25 10:41:43'),(7,1,'SjIlYK5BBlI','https://youtu.be/SjIlYK5BBlI?si=O3IkyTHEAyihk2j7','Life in 60 Seconds','Get to know 60 Second Docs, a series of short documentaries profiling subjects and examining perspectives, trends and aspirations beneath the surface, yet all within reach of the mainstream. We provide a fresh look into the most unique characters, lifestyles and trends around the world. Watch us on all of your favorite platforms -- Facebook, Instagram, Twitter, YouTube, Snapchat, Amazon and more. Got a minute?','https://img.youtube.com/vi/SjIlYK5BBlI/maxresdefault.jpg',1,'2024-08-25','2024-08-25 10:42:45','2024-08-25 10:42:45'),(8,1,'IpNG4ohSUkI','https://youtu.be/IpNG4ohSUkI?si=W1JAEzw1oPGog0l1','Loneliness | Short Film | 60 Seconds','This short is about Loneliness and depression.We all have suffered from loneliness which in turn leads to depression. It is very important that we talk to one other about whats going on in our lives no matter how happy or sad one might look. Lets not let people around us feel lonely which make them feel like trash.','https://img.youtube.com/vi/IpNG4ohSUkI/maxresdefault.jpg',2,'2024-08-25','2024-08-25 10:43:15','2024-08-25 10:43:15'),(9,1,'RI20wFIzXaI','https://youtu.be/RI20wFIzXaI?si=9buIVcSvG5WMSqM_','Frozen Fever | Movies in 60 Seconds | Disney Kids','Elsa plans a surprise birthday party for Anna, but when she catches a cold and leaves Kristoff in charge, things don\'t go exactly as planned!','https://img.youtube.com/vi/RI20wFIzXaI/maxresdefault.jpg',3,'2024-08-25','2024-08-25 10:43:54','2024-08-25 10:43:54'),(10,5,'SjIlYK5BBlI','https://youtu.be/pFuh3K3wQg8?si=GS_Cg_p9zPwoAPLo','aula teste','asdsdsda','https://img.youtube.com/vi/pFuh3K3wQg8/maxresdefault.jpg',1,'2024-09-18','2024-09-18 08:08:28','2024-09-18 08:08:28'),(12,NULL,'SjIlYK5BBlI','https://youtu.be/SjIlYK5BBlI?si=Dnnxk7ZkJaHL5pA-','Aula sem curso','sdsadasd','https://img.youtube.com/vi/SjIlYK5BBlI/maxresdefault.jpg',1,'2024-09-19','2024-09-19 07:56:39','2024-09-19 09:54:41'),(14,NULL,'VWAqDfFtB0g','https://youtu.be/VWAqDfFtB0g?si=NjHpr8pWZh0ZzDNE','Aula teste','Chegou um anime polêmico que surpreendeu a todos com a sua arte, animação e linguagem sem censura! Análise do primeiro episódio de DAN DA DAN e todas as minhas primeiras impressões dessa estreia! \r\n\r\nCamisetas da minha coleção: http://lolja.com.br/gabi-xavier\r\n\r\n#dandadan','https://img.youtube.com/vi/VWAqDfFtB0g/maxresdefault.jpg',25,'2024-10-08','2024-10-08 06:22:23','2024-11-03 20:51:43');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos_watcheds`
--

DROP TABLE IF EXISTS `videos_watcheds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos_watcheds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `videos_id` bigint unsigned NOT NULL,
  `watched` tinyint(1) NOT NULL DEFAULT '0',
  `progress` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `videos_watcheds_user_id_videos_id_unique` (`user_id`,`videos_id`),
  KEY `videos_watcheds_videos_id_foreign` (`videos_id`),
  CONSTRAINT `videos_watcheds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `videos_watcheds_videos_id_foreign` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos_watcheds`
--

LOCK TABLES `videos_watcheds` WRITE;
/*!40000 ALTER TABLE `videos_watcheds` DISABLE KEYS */;
INSERT INTO `videos_watcheds` VALUES (2,29,14,1,100,'2024-11-04 09:10:27','2024-11-04 09:11:27');
/*!40000 ALTER TABLE `videos_watcheds` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-05 14:40:43
