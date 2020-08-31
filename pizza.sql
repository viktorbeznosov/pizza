-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 29 2020 г., 17:20
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`, `description`) VALUES
(1, 'admin', 'admin@mail.ru', '$2y$10$TCgX11r09W0bLlvqR9AaGO6P3VeOb7kt8L1iJFZjnGfcwZXJJYDzC', 'assets/images/admins/admin.jpg', 'ydXGrVLcfdrrbRfg7o0IIXixnzJdJ4ylYMNMAu6NcC9xO3P99qIBksgMjzyj', '2020-07-31 21:00:00', '2020-07-31 21:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!'),
(3, 'Lance Smith', 'lance@mail.ru', '$2y$10$TCgX11r09W0bLlvqR9AaGO6P3VeOb7kt8L1iJFZjnGfcwZXJJYDzC', 'assets/images/admins/lance_smith.jpg', NULL, '2020-08-22 21:00:00', '2020-08-28 20:07:54', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!'),
(5, 'test', 'test@mail.ru', '$2y$10$2gYw2tZXIZYuNt5Rvo36qOC4EdTpmGDVZZRSNIHXsnZqQstfUosCe', 'assets/images/admins/1598646084_stay-home.jpg', NULL, '2020-08-28 20:21:24', '2020-08-28 20:21:24', NULL),
(6, 'Tom Smith', 'tom@mail.ru', '$2y$10$0Fb1Qj4ZVyDH8Ria3V44OOVTql/XKlV5Rp4BvH07cWHvLADiQbita', 'assets/images/admins/1598646496_person_1.jpg', NULL, '2020-08-28 20:28:16', '2020-08-28 20:28:16', NULL),
(7, 'Mark Wilson', 'mark@mail.ru', '$2y$10$Bs3MR/ClwwofOC5kHViv4..Ufze2tVNPf/OnvRYwYVoglieUPSb9y', 'assets/images/admins/1598646520_person_2.jpg', NULL, '2020-08-28 20:28:40', '2020-08-28 20:28:40', NULL),
(8, 'Patric Jackobson', 'patric@mail.ru', '$2y$10$dRWYz0pyeauNo09aPnBDfejcyIyglXkZHHK3QpWXgvMNba7MGmlum', 'assets/images/admins/1598646554_person_3.jpg', NULL, '2020-08-28 20:29:14', '2020-08-28 20:29:14', NULL),
(9, 'John Doe', 'john@mail.ru', '$2y$10$qrkdKpXGCOb0HnBX8XtWYOR.C7boLOvKgYyJYt9FE6BSyjZyk9o0q', 'assets/images/admins/1598646582_person_4.jpg', NULL, '2020-08-28 20:29:42', '2020-08-28 20:29:42', NULL),
(10, 'Lisa Adams', 'lisa@mail.ru', '$2y$10$2N72mWr3dv9oTbYvRPzD5OmiZnfIryV5R4WVIMoe/vQybUU5zB85u', 'assets/images/admins/1598646601_person_5.jpg', NULL, '2020-08-28 20:30:01', '2020-08-28 20:30:53', NULL),
(11, 'Molly Sunrise', 'molly@mail.ru', '$2y$10$XRZpSo9yTQv.yKMu4pMkYOXyBEyL0F5WSVC6XQ95dDsRgmU2JG3Wa', 'assets/images/admins/1598646643_person_6.jpg', NULL, '2020-08-28 20:30:43', '2020-08-28 20:30:43', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `admin_id`, `title`, `text`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_1.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>\r\n<h2 class=\"mb-3 mt-5\">#2. Creative WordPress Themes</h2>\r\n<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_2.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>\r\n<p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>', 'assets/images/blogs/image_1.jpg', '2020-08-10 18:00:00', '2020-08-10 18:00:00'),
(2, 3, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_1.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>\r\n<h2 class=\"mb-3 mt-5\">#2. Creative WordPress Themes</h2>\r\n<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_2.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>\r\n<p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>', 'assets/images/blogs/image_2.jpg', '2020-08-10 18:00:00', '2020-08-10 18:00:00'),
(3, 3, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_1.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>\r\n<h2 class=\"mb-3 mt-5\">#2. Creative WordPress Themes</h2>\r\n<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_2.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>\r\n<p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>', 'assets/images/blogs/image_3.jpg', '2020-08-10 18:00:00', '2020-08-10 18:00:00'),
(4, 3, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_1.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>\r\n<h2 class=\"mb-3 mt-5\">#2. Creative WordPress Themes</h2>\r\n<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_2.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>\r\n<p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>', 'assets/images/blogs/image_4.jpg', '2020-08-05 18:00:00', '2020-08-05 18:00:00'),
(5, 3, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_1.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>\r\n<h2 class=\"mb-3 mt-5\">#2. Creative WordPress Themes</h2>\r\n<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_2.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>\r\n<p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>', 'assets/images/blogs/image_5.jpg', '2020-08-09 18:00:00', '2020-08-09 18:00:00'),
(6, 3, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_1.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>\r\n<h2 class=\"mb-3 mt-5\">#2. Creative WordPress Themes</h2>\r\n<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>\r\n<p>\r\n<img src=\"http://pizza.loc/assets/images/image_2.jpg\" alt=\"\" class=\"img-fluid\">\r\n</p>\r\n<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>\r\n<p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>', 'assets/images/blogs/image_6.jpg', '2020-08-10 18:00:00', '2020-08-23 12:05:30'),
(7, 3, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>', 'assets/images/blogs/image_6.jpg', '2020-08-22 21:00:00', '2020-08-22 21:00:00'),
(8, 1, 'The Delicious Pizza', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">10 Tips For The Traveler</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>\r\n<p>', 'assets/images/blogs/image_6.jpg', '2020-08-22 21:00:00', '2020-08-22 21:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pizza', NULL, 'assets/images/categories/pizza.jpg', NULL, NULL),
(2, 'Drinks', NULL, 'assets/images/categories/drinks.jpg', NULL, NULL),
(3, 'Burgers', NULL, 'assets/images/categories/burges.jpg', NULL, NULL),
(4, 'Pasta', NULL, 'assets/images/categories/pasta.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `parent`, `blog_id`, `user_id`, `name`, `email`, `text`, `created_at`, `updated_at`) VALUES
(1, 0, 1, NULL, 'anonin', 'anonim@mail.ru', 'My first comment', '2020-08-28 18:30:23', '2020-08-28 18:30:23'),
(2, 1, 1, NULL, 'viktorbeznosov', 'viktorbeznosov@mail.ru', 'My reply', '2020-08-28 18:30:33', '2020-08-28 18:30:33'),
(3, 1, 1, NULL, 'test user', 'test@mail.ru', 'qwerty', '2020-08-28 18:30:51', '2020-08-28 18:30:51'),
(4, 1, 1, 2, NULL, NULL, 'last', '2020-08-28 18:37:18', '2020-08-28 18:37:18'),
(5, 4, 1, 2, NULL, NULL, 'fasdfasd', '2020-08-28 18:37:26', '2020-08-28 18:37:26'),
(6, 5, 1, 2, NULL, NULL, 'qqqqqqq', '2020-08-28 18:37:29', '2020-08-28 18:37:29'),
(7, 4, 1, 2, NULL, NULL, 'aaaaaaaaaaa', '2020-08-28 18:37:35', '2020-08-28 18:37:35'),
(8, 0, 1, 2, NULL, NULL, 'LAst', '2020-08-28 19:08:27', '2020-08-28 19:08:27');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_07_29_182215_create_categories_table', 1),
(4, '2020_07_29_182724_create_products_table', 1),
(5, '2020_07_29_184506_create_services_table', 1),
(6, '2020_07_29_184748_create_blogs_table', 1),
(7, '2020_07_29_191909_create_comments_table', 1),
(10, '2020_07_29_193456_create_admins_table', 1),
(11, '2020_08_05_181802_change_services_table', 1),
(12, '2020_08_11_103328_ChangeBlogsTable', 2),
(13, '2020_08_23_132533_change_admins_table', 3),
(14, '2020_08_24_061303_change_comments_table', 4),
(15, '2020_08_29_145536_CreateRolesTable', 5),
(16, '2020_08_29_145607_CreatePermissionsTable', 5),
(17, '2020_08_29_145848_CreatePermissionRoleTable', 5),
(18, '2020_08_29_145933_CreateRoleAdminTable', 5),
(19, '2020_08_29_150742_ChangeRoleAdminTable', 6),
(20, '2020_08_29_150816_ChangePermissionRoleTable', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VIEW_DASHBOARD', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(2, 'VIEW_CATEGORIES', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(3, 'CREATE_CATEGORIES', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(4, 'UPDATE_CATEGORIES', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(5, 'DELETE_CATEGORIES', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(6, 'VIEW_SERVICES', '2020-08-28 21:00:00', NULL),
(7, 'CREATE_SERVICES', '2020-08-28 21:00:00', NULL),
(8, 'UPDATE_SERVICES', '2020-08-28 21:00:00', NULL),
(9, 'DELETE_SERVICES', '2020-08-28 21:00:00', NULL),
(10, 'VIEW_BLOGS', '2020-08-28 21:00:00', NULL),
(11, 'CREATE_BLOGS', '2020-08-28 21:00:00', NULL),
(12, 'UPDATE_BLOGS', '2020-08-28 21:00:00', NULL),
(13, 'DELETE_BLOGS', '2020-08-28 21:00:00', NULL),
(14, 'VIEW_USERS', '2020-08-28 21:00:00', NULL),
(15, 'CREATE_USERS', '2020-08-28 21:00:00', NULL),
(16, 'UPDATE_USERS', '2020-08-28 21:00:00', NULL),
(17, 'DELETE_USERS', '2020-08-28 21:00:00', NULL),
(18, 'VIEW_ADMINS', '2020-08-28 21:00:00', NULL),
(19, 'CREATE_ADMINS', '2020-08-28 21:00:00', NULL),
(20, 'UPDATE_ADMINS', '2020-08-28 21:00:00', NULL),
(21, 'DELETE_ADMINS', '2020-08-28 21:00:00', NULL),
(22, 'VIEW_COMMENTS', '2020-08-28 21:00:00', NULL),
(23, 'UPDATE_COMMENTS', '2020-08-28 21:00:00', NULL),
(24, 'DELETE_COMMENTS', '2020-08-28 21:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`id`, `created_at`, `updated_at`, `permission_id`, `role_id`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 2, 1),
(3, NULL, NULL, 3, 1),
(4, NULL, NULL, 4, 1),
(5, NULL, NULL, 5, 1),
(6, NULL, NULL, 6, 1),
(7, NULL, NULL, 7, 1),
(8, NULL, NULL, 8, 1),
(9, NULL, NULL, 9, 1),
(10, NULL, NULL, 10, 1),
(11, NULL, NULL, 11, 1),
(12, NULL, NULL, 12, 1),
(13, NULL, NULL, 13, 1),
(14, NULL, NULL, 14, 1),
(15, NULL, NULL, 15, 1),
(16, NULL, NULL, 16, 1),
(17, NULL, NULL, 17, 1),
(18, NULL, NULL, 18, 1),
(19, NULL, NULL, 19, 1),
(20, NULL, NULL, 20, 1),
(21, NULL, NULL, 21, 1),
(22, NULL, NULL, 22, 1),
(23, NULL, NULL, 23, 1),
(24, NULL, NULL, 24, 1),
(25, NULL, NULL, 1, 2),
(26, NULL, NULL, 22, 2),
(27, NULL, NULL, 23, 2),
(28, NULL, NULL, 24, 2),
(29, NULL, NULL, 1, 3),
(30, NULL, NULL, 10, 3),
(31, NULL, NULL, 11, 3),
(32, NULL, NULL, 12, 3),
(33, NULL, NULL, 13, 3),
(34, NULL, NULL, 1, 4),
(35, NULL, NULL, 2, 4),
(36, NULL, NULL, 3, 4),
(37, NULL, NULL, 4, 4),
(38, NULL, NULL, 5, 4),
(39, NULL, NULL, 6, 4),
(40, NULL, NULL, 7, 4),
(41, NULL, NULL, 8, 4),
(42, NULL, NULL, 9, 4),
(43, NULL, NULL, 10, 4),
(44, NULL, NULL, 11, 4),
(45, NULL, NULL, 12, 4),
(46, NULL, NULL, 13, 4),
(47, NULL, NULL, 22, 4),
(48, NULL, NULL, 23, 4),
(49, NULL, NULL, 24, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Itallian Pizza', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '400.00', 'assets/images/products/pizza-1.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(2, 1, 'Hawaiian Pizza', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '300.00', 'assets/images/products/pizza-2.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(3, 1, 'Greek Pizza', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '400.00', 'assets/images/products/pizza-3.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(4, 1, 'Bacon Crispy Thins', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '550.00', 'assets/images/products/pizza-4.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(7, 1, 'Hawaiian Special', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '300.00', 'assets/images/products/pizza-5.jpg', '2020-08-18 21:00:00', '2020-08-12 21:00:00'),
(8, 1, 'Ultimate Overload', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '600.00', 'assets/images/products/pizza-6.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(9, 1, 'Bacon Pizza', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '300.00', 'assets/images/products/pizza-7.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(10, 1, 'Ham & Pineapple', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '400.00', 'assets/images/products/pizza-8.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(13, 2, 'Lemonade Juice', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '100.00', 'assets/images/products/drink-1.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(14, 2, 'Pineapple Juice', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '150.00', 'assets/images/products/drink-2.jpg', '2020-08-18 21:00:00', '2020-08-10 21:00:00'),
(15, 2, 'Soda Drinks', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '100.00', 'assets/images/products/drink-3.jpg', '2020-08-11 21:00:00', '2020-08-12 21:00:00'),
(16, 3, 'Burger', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '200.00', 'assets/images/products/burger-1.jpg', '2020-08-03 21:00:00', '2020-08-03 21:00:00'),
(17, 3, 'Cheese Burger', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '100.00', 'assets/images/products/burger-2.jpg', '2020-08-11 21:00:00', '2020-08-10 21:00:00'),
(18, 3, 'Super Burger', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '200.00', 'assets/images/products/burger-3.jpg', '2020-08-11 21:00:00', '2020-08-11 21:00:00'),
(19, 4, 'Pasta', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '250.00', 'assets/images/products/pasta-1.jpg', '2020-08-08 21:00:00', '2020-08-08 21:00:00'),
(20, 4, 'Pasta 2', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '300.00', 'assets/images/products/pasta-2.jpg', '2020-08-02 21:00:00', '2020-08-02 21:00:00'),
(21, 4, 'Pasta Cabonara', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '200.00', 'assets/images/products/pasta-3.jpg', '2020-08-08 21:00:00', '2020-08-08 21:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(2, 'Moderator', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(3, 'Blogger', '2020-08-28 21:00:00', '2020-08-28 21:00:00'),
(4, 'Content Manager', '2020-08-28 21:00:00', '2020-08-28 21:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `role_admin`
--

CREATE TABLE `role_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role_admin`
--

INSERT INTO `role_admin` (`id`, `created_at`, `updated_at`, `admin_id`, `role_id`) VALUES
(1, '2020-08-28 21:00:00', '2020-08-28 21:00:00', 1, 1),
(2, NULL, NULL, 6, 3),
(3, NULL, NULL, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'HEALTHY FOODS', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'mdi mdi-food', NULL, NULL),
(2, 'FASTEST DELIVERY', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'mdi mdi-bike', NULL, NULL),
(3, 'ORIGINAL RECIPES', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'mdi mdi-pizza', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@mail.ru', '$2y$10$TCgX11r09W0bLlvqR9AaGO6P3VeOb7kt8L1iJFZjnGfcwZXJJYDzC', 'assets/images/users/user.jpg', 'ka98viI1ecRbaLU8vjYY11pA9aTxlhNcB9y1lB0xacvMhY1poZ55sgsnfbbz', '2020-07-29 21:00:00', '2020-07-29 21:00:00'),
(2, 'ivan', 'ivan@mail.ru', '$2y$10$TCgX11r09W0bLlvqR9AaGO6P3VeOb7kt8L1iJFZjnGfcwZXJJYDzC', 'assets/images/users/1598205330_tomorrow_monday.jpg', NULL, '2020-08-23 14:47:54', '2020-08-23 14:55:30'),
(3, 'new user', 'newuser@mail.ru', '$2y$10$TCgX11r09W0bLlvqR9AaGO6P3VeOb7kt8L1iJFZjnGfcwZXJJYDzC', 'assets/images/users/1598205085_nichosi.jpg', NULL, '2020-08-23 14:51:25', '2020-08-23 14:51:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `role_admin`
--
ALTER TABLE `role_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
