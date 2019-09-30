-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 30 2019 г., 14:59
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `juvilir_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bthemes`
--

CREATE TABLE `bthemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_on` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bthemes`
--

INSERT INTO `bthemes` (`id`, `alias`, `name_ru`, `name_ua`, `show_on`, `created_at`, `updated_at`) VALUES
(1, 'novosti-kompanii', 'Новости компании', 'Новини компанії', 1, '2019-08-06 07:46:29', '2019-08-13 05:56:36'),
(2, 'modnye-tendencii', 'Модные тенденции', 'Модні тенденції', 1, '2019-08-06 07:47:16', '2019-08-06 09:23:21'),
(3, 'interesnye-fakty', 'Интересные факты', 'Цікаві факти', 1, '2019-08-06 07:47:58', '2019-08-06 09:23:22'),
(4, 'poleznye-sovety', 'Полезные советы', 'Корисні поради', 1, '2019-08-06 07:48:33', '2019-08-06 09:23:23');

-- --------------------------------------------------------

--
-- Структура таблицы `btposts`
--

CREATE TABLE `btposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `btheme_id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_desc_ru` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_desc_ua` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ru` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content_ua` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `show_on` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `btposts`
--

INSERT INTO `btposts` (`id`, `btheme_id`, `alias`, `title_ru`, `title_ua`, `s_desc_ru`, `s_desc_ua`, `image_path`, `content_ru`, `content_ua`, `show_on`, `created_at`, `updated_at`) VALUES
(3, 1, 'second-news', 'second news', 'second news', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat diam eu varius faucibus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat diam eu varius faucibus.', '/images/uploads/blog/posts_card_images/642c743612353de5e9235c4d3358b3c88a9bd0beSl.jpg', '<h3 style=\"text-align: center; \">Заголовок 1</h3>\r\n<p style=\"text-align: center;\"><br></p>\r\n<p><img src=\"https://api.project-it.top/images/uploads/blog/posts_content_images/3743b656aa71aa6dbcbbe01d1c84a9440eb8e5f78j.png\" style=\"width: 288.472px; float: right; height: 174.766px;\" class=\"note-float-right\"></p><p>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\">L<span style=\"font-family: &quot;Courier New&quot;;\"><i>orem ipsum dolor sit amet, consectetur adipiscing elit. Integer </i></span></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\"><span style=\"font-family: &quot;Courier New&quot;;\"><i>volutpat diam eu varius faucibus. Aliquam venenatis quam ac enim </i></span></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\"><span style=\"font-family: &quot;Courier New&quot;;\"><i>dapibus, a dictum diam condimentum. Ut egestas augue a mauris </i></span></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\"><span style=\"font-family: &quot;Courier New&quot;;\"><i>hendrerit, non porta ex luctus. In dignissim et magna a eleifend. Morbi </i></span></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\"><span style=\"font-family: &quot;Courier New&quot;;\"><i>egestas gravida luctus. Vestibulum eu feugiat mi. Proin vit</i></span>ae eros </span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\">fringilla, iaculis lacus sed, ornare sem. Aenean finibus lorem vel nulla pulvinar facilisis. Morbi </span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\">mattis tincidunt laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer </span>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family: &quot;Comic Sans MS&quot;;\">volutpat diam eu varius faucibus. Aliquam venenatis quam ac enim dapibus, a dictum diam condimentum. Ut egestas augue a mauris hendrerit, non porta ex luctus. In dignissim et magna a eleifend. Morbi egestas gravida luctus. Vestibulum eu feugiat mi. Proin vitae eros fringilla, iaculis lacus sed, ornare sem. Aenean finibus lorem vel nulla pulvinar facilisis. Morbi mattis tincidunt laoreet.</span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span></p><p><span style=\"font-family: &quot;Comic Sans MS&quot;;\"> </span></p><h2><div style=\"text-align: center;\"><span style=\"font-size: 2rem;\">Заголовок 2</span></div><div style=\"text-align: center;\"><span style=\"font-size: 2rem;\"><br></span></div><hr style=\"text-align: center;\"></h2><p><img src=\"https://api.project-it.top/images/uploads/blog/posts_content_images/d2ae4e5ff8641089c35536160122c6416c407089M0.png\" style=\"width: 100%;\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><br></span><span style=\"font-family: &quot;Times New Roman&quot;;\"><br></span></p><p></p><div style=\"text-align: center;\"><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/I9Xmsd8PWJE\" width=\"100%\" height=\"360\" class=\"note-video-clip\"></iframe><font face=\"Times New Roman\"><br></font></div><div style=\"text-align: center;\"><font face=\"Times New Roman\"><br></font></div><div style=\"text-align: center;\"><font face=\"Times New Roman\"><br></font></div><div style=\"text-align: center;\"><font face=\"Times New Roman\"><br></font></div><div style=\"text-align: center;\"><font face=\"Times New Roman\"><br></font></div><br><p></p><p></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Arial Black&quot;; text-align: justify;\">Lorem ipsum dolor s</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Arial Black&quot;; text-align: justify;\">it amet, consectetur adipiscing elit. Integer volutpat diam eu varius faucibus. Aliquam venenatis quam ac enim dapibus, a dictum diam condimentum. Ut egestas augue a mauris hendrerit, non porta ex luctus. In dignissim et magna a eleifend. Morbi egestas gravida luctus. Vestibulum eu feugiat mi. Proin vitae eros fringilla, iaculis lacus sed, ornare sem. Aenean finibus lorem vel nulla pulvinar facilisis. Morbi mattis tincidunt laoreet.&nbsp;</span><br></p>', 1, '2019-08-08 11:35:32', '2019-08-16 14:46:28'),
(4, 1, 'second-news2', 'second news2', 'second news2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum nisl et sapien facilisis ultrices.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum nisl et sapien facilisis ultrices. Ut venenatis lacinia ultrices.', '/images/uploads/blog/posts_card_images/55a25906b3d4d68f07ee29618df0c2d77c6ac7c8Xa.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum nisl et sapien facilisis ultrices. Ut venenatis lacinia ultrices. Curabitur commodo felis neque, nec posuere sapien suscipit id. Vivamus odio massa, rutrum ut ornare pretium, eleifend a mauris. Integer porttitor suscipit commodo. Praesent vitae luctus urna. Mauris ornare dui vitae fringilla tincidunt.</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum nisl et sapien facilisis ultrices. Ut venenatis lacinia ultrices. Curabitur commodo felis neque, nec posuere sapien suscipit id. Vivamus odio massa, rutrum ut ornare pretium, eleifend a mauris. Integer porttitor suscipit commodo. Praesent vitae luctus urna. Mauris ornare dui vitae fringilla tincidunt.</span><br></p>', 1, '2019-08-09 07:27:00', '2019-08-16 14:55:36');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_array` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_full` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc_ru` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc_ua` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `alias`, `size_array`, `name_ru`, `name_ua`, `image_thumb`, `image_full`, `desc_ru`, `desc_ua`, `created_at`, `updated_at`) VALUES
(1, 'kolca', '[15.5,16,16.5,17,17.5,18,18.5,19,19.5,20]', 'Кольца', 'Каблучки', '/images/uploads/categories_img/695ae5a968b98e84e1ec792ae5c964ca8f484f0aKg.png', '/images/uploads/categories_img/274bf77ac4b03ec25b82a62ae8e6ab118d5891f0o2.jpg', NULL, NULL, '2019-07-08 11:48:00', '2019-07-26 07:07:46'),
(2, 'sergi', NULL, 'Серьги', 'Сережки', '/images/uploads/categories_img/4d20983f09d6b388400d936444122468c1f1adf2e5.jpg', '/images/uploads/categories_img/299476640703e8f95392df6e43d76b5ff9a36731Wt.jpg', NULL, NULL, '2019-07-08 11:55:13', '2019-07-24 09:12:57'),
(3, 'kulony', NULL, 'Кулоны', 'Кулони', '/images/uploads/categories_img/805857bd86a2222a96bcc72e0a0f24a1f3b3be6aSO.jpg', '/images/uploads/categories_img/6d5f96dd3a8022fcf904071334bfaf5d5efcb2833z.jpg', NULL, NULL, '2019-07-08 11:56:14', '2019-07-24 09:13:05'),
(4, 'cepochki', '[40, 45, 50, 55, 60, 65]', 'Цепочки', 'Ланцюжки', '/images/uploads/categories_img/bbb9102c0ba9e5811465a2475f4becfc09504ccbhj.jpg', '/images/uploads/categories_img/b45b745be6e5e5ace57a4ce27caf080d2c601cbbaX.jpg', NULL, NULL, '2019-07-08 11:57:00', '2019-07-24 09:13:12'),
(5, 'kole', NULL, 'Колье', 'Кольє', '/images/uploads/categories_img/506ae14a0421f0b3720c58da51545f0989b889d45J.jpg', '/images/uploads/categories_img/15f102db0d46aeb7e9949a3cf787a0e67829f4beLz.jpg', NULL, NULL, '2019-07-08 11:57:27', '2019-07-26 07:08:41'),
(6, 'braslety', '[16, 16.5, 17, 17.5, 18, 18.5, 19, 19.5, 20, 20.5, 21]', 'Браслеты', 'Браслети', '/images/uploads/categories_img/7b712d865a416d5c6f94a79629b9974e3844178cn3.jpg', '/images/uploads/categories_img/e50539a8790640a6582c6b5fe32f78816b98747f6G.jpg', NULL, NULL, '2019-07-08 11:57:46', '2019-07-24 09:13:28'),
(7, 'sharmy', NULL, 'Шармы', 'Шарми', '/images/uploads/categories_img/ef7ac5537a441119151af6601cb442bb3e37f4baPu.jpg', '/images/uploads/categories_img/44073cc71d8cda92fde788f1091ab7516de93475bw.jpg', NULL, NULL, '2019-07-08 11:59:10', '2019-07-24 09:13:36'),
(8, 'detskaya-kollekciya', NULL, 'Детская коллекция', 'Дитяча колекція', '/images/uploads/categories_img/6a36222b2608f7218349d5ae5c9eded2acc4a0afG9.jpg', '/images/uploads/categories_img/5d32ee75ed653ce97b31924db8fd8d073c3ece22XM.jpg', NULL, NULL, '2019-07-08 12:00:22', '2019-07-24 09:13:44'),
(9, 'drugie-kategorii', NULL, 'Другие категории', 'Інші категорії', '/images/uploads/categories_img/3e4582a0894cb7d7afe4a2952e573584b6405971ai.jpg', '/images/uploads/categories_img/887e08049e98ff22091edc4cba896081603fb1ed4Q.jpg', NULL, NULL, '2019-07-08 12:01:53', '2019-07-24 09:13:51');

-- --------------------------------------------------------

--
-- Структура таблицы `content_home_mozaiks`
--

CREATE TABLE `content_home_mozaiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_thumb` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_full` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `show_on` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `content_home_mozaiks`
--

INSERT INTO `content_home_mozaiks` (`id`, `alt`, `link`, `name_ru`, `name_ua`, `image_thumb`, `image_full`, `show_on`, `created_at`, `updated_at`) VALUES
(1, 'Мозаика №1', 'https://api.project-it.top/ua/categories/cepochki', 'Бриллианты', 'Діаманти', '/images/uploads/content/home_mozaik/d17d33d39220060f9a2889bbcd63c5ee45ea8734Fp.png', NULL, 0, '2019-08-02 08:34:11', '2019-08-02 09:27:48'),
(2, 'Мозаика №2', 'https://api.project-it.top/ua/categories/sergi', 'Украшение с камнями', 'Прикраси з камінням', '/images/uploads/content/home_mozaik/e49a246d4f155355cf0c40b4d156c12266506b01Q3.png', '/images/uploads/content/home_mozaik/78b2a4ac849d9b0e661f52d59ed67f1340c2a483Vk.png', 1, '2019-08-02 08:46:34', '2019-08-02 09:28:07'),
(3, 'Мозаика №3', 'https://api.project-it.top/ua/categories/detskaya-kollekciya', 'Детская коллекция', 'Дитяча колекція', '/images/uploads/content/home_mozaik/f2ab76640df90ebc054d08b7a7d31a7c9cacd3feht.png', '/images/uploads/content/home_mozaik/5e4fb32efdd0bb7459d1083a973f218e7cfdde1czE.png', 1, '2019-08-02 08:48:42', '2019-08-02 08:48:42'),
(4, 'Мозаика №4', 'https://api.project-it.top/ua/categories/kole', 'Колье', 'Кольє', '/images/uploads/content/home_mozaik/3cfb32e1bdf6da4dac8753c51a4e462a98e2cf42K0.png', NULL, 0, '2019-08-02 08:50:00', '2019-08-02 08:50:00'),
(5, 'Мозаика №5', 'https://api.project-it.top/ua/categories/kole', 'Sale %', 'Sale %', '/images/uploads/content/home_mozaik/45b584c3a2e56aff4e6615e0a7148b93b99a4704ot.png', NULL, 0, '2019-08-02 08:51:07', '2019-08-02 08:51:07'),
(6, 'Мозаика №6', 'https://api.project-it.top/ua/categories/sharmy', 'Шармы', 'Шарми', '/images/uploads/content/home_mozaik/7228bed5cea91121a29736f986521bdfdc6fca83xF.png', '/images/uploads/content/home_mozaik/1dc125d5ad76b79f73400b57f0a9463955e055e00b.png', 1, '2019-08-02 08:52:00', '2019-08-02 08:52:00');

-- --------------------------------------------------------

--
-- Структура таблицы `content_home_sliders`
--

CREATE TABLE `content_home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_thumb` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_full` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `content_home_sliders`
--

INSERT INTO `content_home_sliders` (`id`, `alt`, `link`, `image_thumb`, `image_full`, `show_on`, `created_at`, `updated_at`) VALUES
(1, 'Первый слайд', 'https://api.project-it.top/ru/subcategories/kolca_ukrasheniya_s_kamnyami', '/images/uploads/content/home_first_sliders/f4a3f12daeee81cfae2a411c12cc44824a73f80593.png', '/images/uploads/content/home_first_sliders/f4867e6a5c8566f73a3645f62af31885c23b65e1Ie.jpg', 1, NULL, '2019-08-13 06:56:25'),
(2, 'Второй слайд', 'https://api.project-it.top/ru/', '/images/uploads/content/home_first_sliders/fe65a56c02870f14c8fe35d290d1e30d83f2011cJi.png', '/images/uploads/content/home_first_sliders/9a52e23d186033c7b65ebc08f155c221dde8849bgL.png', 1, '2019-07-31 10:50:33', '2019-08-13 06:56:26');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`) VALUES
(1, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":8,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:27\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(2, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(3, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(4, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(5, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(6, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`) VALUES
(7, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(8, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(9, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(10, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(11, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(12, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`) VALUES
(13, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}'),
(14, 'database', 'default', '{\"displayName\":\"App\\\\Jobs\\\\FirstTest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":1,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\FirstTest\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\FirstTest\\\":9:{s:5:\\\"tries\\\";i:1;s:10:\\\"\\u0000*\\u0000message\\\";s:15:\\\"begin first job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:1:{i:0;s:217:\\\"O:19:\\\"App\\\\Jobs\\\\SecondTest\\\":9:{s:5:\\\"tries\\\";i:8;s:10:\\\"\\u0000*\\u0000message\\\";s:16:\\\"begin second job\\\";s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\\\";}}\"}}', 'Exception: Error in /var/www/www-root/data/www/api.project-it.top/app/Jobs/FirstTest.php:28\nStack trace:\n#0 [internal function]: App\\Jobs\\FirstTest->handle()\n#1 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#2 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\FirstTest))\n#7 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\FirstTest))\n#8 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(49): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\FirstTest), false)\n#10 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(327): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(277): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(118): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(102): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(86): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#17 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(32): call_user_func_array(Array, Array)\n#18 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(90): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Container/Container.php(576): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(183): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Command/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(921): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(273): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/www-root/data/www/api.project-it.top/vendor/symfony/console/Application.php(149): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Console/Application.php(90): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/www-root/data/www/api.project-it.top/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(133): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 /var/www/www-root/data/www/api.project-it.top/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 {main}');

-- --------------------------------------------------------

--
-- Структура таблицы `favorites_products`
--

CREATE TABLE `favorites_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gproduct_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorites_products`
--

INSERT INTO `favorites_products` (`id`, `user_id`, `gproduct_id`) VALUES
(36, 11, 5),
(37, 11, 6),
(38, 11, 7),
(64, 2, 6),
(65, 2, 7),
(66, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `gpimages`
--

CREATE TABLE `gpimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gproduct_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gpimages`
--

INSERT INTO `gpimages` (`id`, `gproduct_id`, `image_path`, `created_at`, `updated_at`) VALUES
(15, 6, 'images/uploads/gproducts_img/f7d3096a3ad0495df83a58dffe4d07f28f54a777KH.jpg', '2019-07-23 13:59:18', '2019-07-23 13:59:18'),
(16, 6, 'images/uploads/gproducts_img/e4dd1149f1edabf89f4df0749a6f0411e04f511eEx.jpg', '2019-07-23 13:59:18', '2019-07-23 13:59:18'),
(17, 5, 'images/uploads/gproducts_img/27312e44633f1e46a7f00720f678d0506a920fa9j9.jpg', '2019-07-29 12:03:58', '2019-07-29 12:03:58'),
(18, 5, 'images/uploads/gproducts_img/3876941aef0ae7ec5344a0d7182c8c1dd849113dvq.jpg', '2019-07-29 12:03:58', '2019-07-29 12:03:58'),
(19, 7, 'images/uploads/gproducts_img/9e0c1579e60d25bdfff6f9a6d998e0506feab510GM.jpg', '2019-08-15 13:12:00', '2019-08-15 13:12:00'),
(20, 7, 'images/uploads/gproducts_img/46e02b8a2d11fae24d54b6f73c697249b516fd0egN.jpg', '2019-08-15 13:12:00', '2019-08-15 13:12:00'),
(21, 8, 'images/uploads/gproducts_img/86eb91e6b9d6c17637957d5395f7eda383683294d9.jpg', '2019-08-15 13:12:34', '2019-08-15 13:12:34'),
(22, 8, 'images/uploads/gproducts_img/73f0d36c3c7ed18ab1abda5c3f2f8fa0a272ee3e3A.jpg', '2019-08-15 13:12:34', '2019-08-15 13:12:34');

-- --------------------------------------------------------

--
-- Структура таблицы `gpparams`
--

CREATE TABLE `gpparams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `param_id` bigint(20) UNSIGNED NOT NULL,
  `gproduct_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gpparams`
--

INSERT INTO `gpparams` (`id`, `param_id`, `gproduct_id`) VALUES
(10, 1, 6),
(11, 3, 6),
(12, 1, 5),
(13, 3, 5),
(14, 2, 5),
(15, 4, 5),
(16, 5, 5),
(17, 6, 5),
(18, 13, 5),
(19, 15, 5),
(20, 1, 7),
(21, 5, 7),
(22, 1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `gproducts`
--

CREATE TABLE `gproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ru` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc_ua` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `gallery` json DEFAULT NULL,
  `new_on` tinyint(1) NOT NULL,
  `topsale_on` tinyint(1) NOT NULL,
  `sprice_on` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gproducts`
--

INSERT INTO `gproducts` (`id`, `alias`, `item_code`, `category_id`, `subcategory_id`, `name_ru`, `name_ua`, `desc_ru`, `desc_ua`, `gallery`, `new_on`, `topsale_on`, `sprice_on`, `created_at`, `updated_at`) VALUES
(5, 'zolotoe-kolco-s-zhemchugom-artikul-1112-1212-23', '1112/1212/23', 1, 2, 'Золотое кольцо с жемчугом', 'Золота каблучка з перлиною', '<dl><dt>Вес, грамм: </dt><dd>2,38</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,38</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '[\"images/uploads/gproducts_img/3876941aef0ae7ec5344a0d7182c8c1dd849113dvq.jpg\", \"images/uploads/gproducts_img/27312e44633f1e46a7f00720f678d0506a920fa9j9.jpg\"]', 1, 0, 0, '2019-07-22 12:20:27', '2019-09-29 18:12:02'),
(6, 'zolotoe-kolco-s-zhemchugom-2-artikul-1212-12', '1212/12', 1, 2, 'Золотое кольцо с жемчугом 2', 'Золота каблучка з перлиною 2', '<dl><dt>Вес, грамм: </dt><dd>2,35</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,35</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', NULL, 0, 0, 0, '2019-07-23 08:48:38', '2019-09-29 11:03:23'),
(7, 'zolota-kabluchka-z-perlinoyu-artikul-123123', '123123', 1, 2, 'Золота каблучка з перлиною', 'Золота каблучка з перлиною', '<dl><dt>Вес, грамм: </dt><dd>2,39</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,39</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', NULL, 1, 0, 0, '2019-08-15 13:12:00', '2019-09-29 11:03:23'),
(8, 'zolota-kabluchka-z-perlinoyud-artikul-wfsds', 'wfsds', 1, 2, 'Золота каблучка з перлиноюd', 'Золота каблучка з перлиною', '<dl><dt>Вес, грамм: </dt><dd>2,39</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,39</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', NULL, 0, 0, 0, '2019-08-15 13:12:34', '2019-09-29 11:03:23');

-- --------------------------------------------------------

--
-- Структура таблицы `gpvalues`
--

CREATE TABLE `gpvalues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gproduct_id` bigint(20) UNSIGNED NOT NULL,
  `gpparam_id` bigint(20) UNSIGNED NOT NULL,
  `pvalue_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gpvalues`
--

INSERT INTO `gpvalues` (`id`, `gproduct_id`, `gpparam_id`, `pvalue_id`) VALUES
(13, 6, 10, 3),
(14, 6, 11, 8),
(15, 5, 12, 3),
(16, 5, 13, 8),
(17, 5, 13, 12),
(18, 5, 14, 15),
(19, 5, 15, 16),
(20, 5, 16, 17),
(21, 5, 17, 18),
(22, 5, 18, 26),
(23, 5, 18, 27),
(24, 5, 19, 29),
(25, 5, 19, 30),
(26, 5, 19, 31),
(27, 5, 19, 32),
(28, 7, 20, 13),
(29, 7, 21, 17),
(30, 8, 22, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `mailing_from_sites`
--

CREATE TABLE `mailing_from_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_06_12_144605_create_roles_table', 2),
(5, '2019_06_12_160622_create_jobs_table', 3),
(6, '2019_06_12_164128_create_failed_jobs_table', 4),
(8, '2019_06_19_161804_add_new_col_to_users_table', 5),
(18, '2019_06_20_122011_create_categories_table', 6),
(19, '2019_06_20_122029_create_subcategories_table', 6),
(27, '2019_06_20_122118_create_params_table', 7),
(29, '2019_06_20_122136_create_pvalues_table', 8),
(30, '2019_07_15_145659_create_gproducts_table', 9),
(31, '2019_07_15_170531_create_tresh_images_table', 10),
(32, '2019_07_21_151237_create_gpparams_table', 11),
(33, '2019_07_21_151255_create_gpvalues_table', 11),
(34, '2019_07_23_112836_create_gpimages_table', 12),
(35, '2019_07_24_145118_create_products_table', 13),
(36, '2019_07_29_163017_create_setting_content_home_slider_table', 14),
(38, '2019_07_31_152137_create_setting_content_home_mozaik_table', 15),
(40, '2019_08_02_162835_create_blog_themes_table', 16),
(42, '2019_08_02_162912_create_blog_themes_posts_table', 17),
(44, '2019_08_19_103330_create_favorites_products_table', 18);

-- --------------------------------------------------------

--
-- Структура таблицы `params`
--

CREATE TABLE `params` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `special` tinyint(1) NOT NULL,
  `update_on` tinyint(4) NOT NULL DEFAULT '1',
  `type_param` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `params`
--

INSERT INTO `params` (`id`, `special`, `update_on`, `type_param`, `type_value`, `name_ru`, `name_ua`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'list', 'text', 'Вид металла', 'вид металу', 'Одна из основных характеристик товара, которая определяет из какого металла сделано изделие.', '2019-07-11 11:16:44', '2019-07-15 10:28:05'),
(2, 1, 1, 'list', 'int', 'Проба', 'Проба', 'Проба метала из которого сделано изделие.', '2019-07-11 12:58:53', '2019-07-11 12:58:53'),
(3, 1, 0, 'tab', 'text', 'Вставка', 'Вставка', NULL, '2019-07-17 10:05:29', '2019-07-17 10:05:29'),
(4, 1, 1, 'list', 'text', 'Дизаин/стиль', 'Дизаин/стиль', NULL, '2019-07-29 11:26:02', '2019-07-29 11:26:02'),
(5, 1, 1, 'list', 'text', 'Цвет металла', 'Колір металу', NULL, '2019-07-29 11:26:53', '2019-07-29 11:26:53'),
(6, 1, 1, 'list', 'text', 'Технология', 'Технологія', NULL, '2019-07-29 11:27:39', '2019-07-29 11:27:46'),
(7, 1, 1, 'list', 'text', 'Тип застежки', 'Тип застібки', NULL, '2019-07-29 11:28:43', '2019-07-29 11:28:43'),
(8, 1, 1, 'list', 'dec', 'Длина, мм:', 'Довжина, мм:', NULL, '2019-07-29 11:29:55', '2019-07-29 11:29:55'),
(9, 1, 1, 'list', 'text', 'Вид', 'Вид', NULL, '2019-07-29 11:30:39', '2019-07-29 11:30:39'),
(10, 1, 1, 'list', 'text', 'Дизайн', 'Дизайн', NULL, '2019-07-29 11:31:34', '2019-07-29 11:31:34'),
(11, 1, 1, 'list', 'text', 'Форма изделия', 'Форма вироба', NULL, '2019-07-29 11:32:24', '2019-07-29 11:32:24'),
(12, 1, 1, 'list', 'text', 'Плетение', 'Плетіння', NULL, '2019-07-29 11:33:36', '2019-07-29 11:33:36'),
(13, 1, 1, 'tab', 'text', 'Для кого', 'Для кого', NULL, '2019-07-29 11:34:01', '2019-07-29 11:34:28'),
(14, 0, 1, 'tab', 'text', 'Цвет вставки', 'Колір вставки', NULL, '2019-07-29 11:35:28', '2019-07-29 11:35:28'),
(15, 0, 1, 'tab', 'text', 'Тематика', 'Тематика', NULL, '2019-07-29 11:36:23', '2019-07-29 11:36:23'),
(16, 0, 1, 'list', 'dec', 'Масса ct:', 'Вага ct:', NULL, '2019-07-29 11:37:24', '2019-07-29 11:37:24'),
(17, 0, 1, 'list', 'text', 'Форма огранки:', 'Форма ограновування:', NULL, '2019-07-29 11:38:07', '2019-07-29 11:38:07'),
(18, 0, 1, 'list', 'text', 'Гр. цвета/чистоты/кл. огранки:', 'Гр. цвета/чистоты/кл. огранки:', NULL, '2019-07-29 11:38:40', '2019-07-29 11:38:40');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `period_products`
--

CREATE TABLE `period_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razmer` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ves` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_price` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ua` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_new` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probe` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amountKamny` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightKamny` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formOgranky` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GrColor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `period_products`
--

INSERT INTO `period_products` (`id`, `sku`, `sku_option`, `name`, `razmer`, `ves`, `price`, `discount`, `special_price`, `description`, `description_ua`, `brand_new`, `weight`, `probe`, `amountKamny`, `weightKamny`, `formOgranky`, `GrColor`, `created_at`, `updated_at`) VALUES
(2, '\"5bc27d0d-f0c5-4a5b-a55e-0261ee83a3ca', '4824002070634', '0160R-BR', '2,31', '\'0\'', '6 866', '50', '3 433', '<dl><dt>Вес, грамм: </dt><dd>2,31</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,31</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,31', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(3, '\"5bc27d0d-f0c5-4a5b-a55e-0261ee83a3ca', '4824002067597', '0160R-BR', '2,33', '\'0\'', '6 882', '50', '3 441', '<dl><dt>Вес, грамм: </dt><dd>2,33</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,33</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,33', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(4, '\"5bc27d0d-f0c5-4a5b-a55e-0261ee83a3ca', '4824100524459', '0160R-BR', '2,4', '\'0\'', '6 937', '50', '3 469', '<dl><dt>Вес, грамм: </dt><dd>2,4</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,4</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,4', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(5, '5b461f45-b202-49a6-9b9f-22cfe6552396', '2300079707274', '1EA30263', '2,03', '\'0\'', '1 263', '50', '632', '<dl><dt>Вес, грамм: </dt><dd>2,03</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,03</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,03', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(6, 'e51a0428-ec3f-453f-89e1-2f461593e273', '2160308044804', '1EA33789/4-E', '3,68', '\'0\'', '1 730', '70', '519', '<dl><dt>Вес, грамм: </dt><dd>3,68</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>3,68</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '3,68', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(7, '34d8b2b8-e802-4cf3-8d0f-a092fc5f9961', '2162206039432', '1EA34106-E', '2,6', '\'0\'', '1 430', '50', '715', '<dl><dt>Вес, грамм: </dt><dd>2,6</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,6</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,6', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(8, '89d2395e-34cd-4bbd-8674-45e1e3228577', '2300080356355', '1EA34585-E/12/1', '2,91', '\'0\'', '1 778', '50', '889', '<dl><dt>Вес, грамм: </dt><dd>2,91</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,91</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,91', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(9, '89d2395e-34cd-4bbd-8674-45e1e3228577', '2300080356348', '1EA34585-E/12/1', '2,92', '\'0\'', '1 784', '50', '892', '<dl><dt>Вес, грамм: </dt><dd>2,92</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,92</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,92', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:02', '2019-09-29 18:12:02'),
(10, 'ccfd2b0f-c630-4766-bf9d-35d61672cd9b', '2300080997183', '1EA43032', '0,88', '\'0\'', '528', '50', '264', '<dl><dt>Вес, грамм: </dt><dd>0,88</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,88</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,88', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(11, 'c2db891f-cde5-4996-82a7-2013180825b7', '2300080633487', '1EA43227', '0,86', '\'0\'', '535', '50', '268', '<dl><dt>Вес, грамм: </dt><dd>0,86</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,86</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,86', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(12, 'a96d31d6-bb37-489a-b599-254ec8100d16', '2300079331820', '1EA43531', '0,7', '\'0\'', '435', '50', '218', '<dl><dt>Вес, грамм: </dt><dd>0,7</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,7</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,7', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(13, 'a96d31d6-bb37-489a-b599-254ec8100d16', '2300079332056', '1EA43531', '0,7', '\'0\'', '435', '50', '218', '<dl><dt>Вес, грамм: </dt><dd>0,7</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,7</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,7', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(14, 'a96d31d6-bb37-489a-b599-254ec8100d16', '2300079331455', '1EA43531', '0,72', '\'0\'', '448', '50', '224', '<dl><dt>Вес, грамм: </dt><dd>0,72</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,72</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,72', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(15, '2c907012-f997-46d5-941a-fd7b6547c6c4', '2300077843660', '1EA44143', '1,28', '\'0\'', '740', '50', '370', '<dl><dt>Вес, грамм: </dt><dd>1,28</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,28</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,28', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(16, '2c907012-f997-46d5-941a-fd7b6547c6c4', '2300077843592', '1EA44143', '1,3', '\'0\'', '751', '50', '376', '<dl><dt>Вес, грамм: </dt><dd>1,3</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,3</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,3', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(17, 'fd2f2dee-443d-4659-b929-18cfe3bb314b', '2300073365067', '1EA53460', '1,51', '\'0\'', '710', '70', '213', '<dl><dt>Вес, грамм: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,51', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(18, 'fd2f2dee-443d-4659-b929-18cfe3bb314b', '2300073365074', '1EA53460', '1,51', '\'0\'', '710', '70', '213', '<dl><dt>Вес, грамм: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,51', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(19, 'fd2f2dee-443d-4659-b929-18cfe3bb314b', '2300073364473', '1EA53460', '1,53', '\'0\'', '719', '70', '216', '<dl><dt>Вес, грамм: </dt><dd>1,53</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,53</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,53', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(20, 'fd2f2dee-443d-4659-b929-18cfe3bb314b', '2300073365197', '1EA53460', '1,56', '\'0\'', '733', '70', '220', '<dl><dt>Вес, грамм: </dt><dd>1,56</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,56</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,56', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(21, '5057546e-205c-456a-8ad3-975b7129de38', '2300079281873', '1EA57257', '1,42', '\'0\'', '883', '50', '442', '<dl><dt>Вес, грамм: </dt><dd>1,42</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,42</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,42', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(22, '369fce25-d345-4206-9ed0-aa99b3aa136c', '2300069690098', '1EA57261', '1,74', '\'0\'', '1 063', '50', '532', '<dl><dt>Вес, грамм: </dt><dd>1,74</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,74</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,74', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:03', '2019-09-29 18:12:03'),
(23, '5ae50eab-1481-4811-93c1-aff7f823a68e', '2300087132129', '1EA59847', '2,1', '\'0\'', '1 191', '50', '596', '<dl><dt>Вес, грамм: </dt><dd>2,1</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,1</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,1', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(24, '5ae50eab-1481-4811-93c1-aff7f823a68e', '2300087131900', '1EA59847', '2,15', '\'0\'', '1 219', '50', '610', '<dl><dt>Вес, грамм: </dt><dd>2,15</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,15</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,15', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(25, 'db4d0960-7122-48ec-9c3c-676e4561a80c', '2300073370689', '1EA70112', '1,7', '\'0\'', '799', '70', '240', '<dl><dt>Вес, грамм: </dt><dd>1,7</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,7</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,7', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(26, '21c4bc4a-2f55-45fe-952a-2c0ff7c96f0e', '2300073507733', '1EA70189', '1,34', '\'0\'', '819', '50', '410', '<dl><dt>Вес, грамм: </dt><dd>1,34</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,34</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,34', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(27, '21c4bc4a-2f55-45fe-952a-2c0ff7c96f0e', '2300073507511', '1EA70189', '1,35', '\'0\'', '825', '50', '413', '<dl><dt>Вес, грамм: </dt><dd>1,35</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,35</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,35', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(28, '330f5c81-d0de-42e7-b390-beadb69b1220', '2300081015664', '1EA70292', '1,16', '\'0\'', '683', '50', '342', '<dl><dt>Вес, грамм: </dt><dd>1,16</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,16</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,16', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(29, '22dbaa6b-5c19-44ad-846d-5a98c9d191f7', '2300079429015', '1EA70325', '0,93', '\'0\'', '558', '50', '279', '<dl><dt>Вес, грамм: </dt><dd>0,93</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,93</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,93', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(30, '22dbaa6b-5c19-44ad-846d-5a98c9d191f7', '2300079429527', '1EA70325', '0,93', '\'0\'', '558', '50', '279', '<dl><dt>Вес, грамм: </dt><dd>0,93</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,93</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,93', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(31, '22dbaa6b-5c19-44ad-846d-5a98c9d191f7', '2300079429718', '1EA70325', '0,93', '\'0\'', '558', '50', '279', '<dl><dt>Вес, грамм: </dt><dd>0,93</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,93</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,93', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(32, '22dbaa6b-5c19-44ad-846d-5a98c9d191f7', '2300079428520', '1EA70325', '0,95', '\'0\'', '570', '50', '285', '<dl><dt>Вес, грамм: </dt><dd>0,95</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,95</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,95', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(33, '22dbaa6b-5c19-44ad-846d-5a98c9d191f7', '2300079428872', '1EA70325', '0,95', '\'0\'', '570', '50', '285', '<dl><dt>Вес, грамм: </dt><dd>0,95</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,95</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,95', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(34, 'f225d3fe-8bc7-4d2f-a9ad-f19037e5c883', '2300086188455', '1EA70345', '0,79', '\'0\'', '465', '50', '233', '<dl><dt>Вес, грамм: </dt><dd>0,79</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,79</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,79', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(35, '660e6f85-c18b-42f9-b400-746730f02fd2', '2300070524351', '1EA70379', '2,22', '\'0\'', '1 356', '50', '678', '<dl><dt>Вес, грамм: </dt><dd>2,22</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,22</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,22', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(36, '660e6f85-c18b-42f9-b400-746730f02fd2', '2300086784565', '1EA70379', '2,37', '\'0\'', '1 448', '50', '724', '<dl><dt>Вес, грамм: </dt><dd>2,37</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,37</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,37', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:04', '2019-09-29 18:12:04'),
(37, '660e6f85-c18b-42f9-b400-746730f02fd2', '2300086784688', '1EA70379', '2,37', '\'0\'', '1 448', '50', '724', '<dl><dt>Вес, грамм: </dt><dd>2,37</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,37</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,37', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(38, '660e6f85-c18b-42f9-b400-746730f02fd2', '2300086784732', '1EA70379', '2,4', '\'0\'', '1 466', '50', '733', '<dl><dt>Вес, грамм: </dt><dd>2,4</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,4</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,4', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(39, 'f965d78c-9200-4ff1-8019-58876fc66458', '2300078665865', '1EA74357', '0,88', '\'0\'', '528', '50', '264', '<dl><dt>Вес, грамм: </dt><dd>0,88</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,88</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,88', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(40, 'f965d78c-9200-4ff1-8019-58876fc66458', '2300078667432', '1EA74357', '0,89', '\'0\'', '534', '50', '267', '<dl><dt>Вес, грамм: </dt><dd>0,89</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,89</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,89', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(41, 'f965d78c-9200-4ff1-8019-58876fc66458', '2300078667449', '1EA74357', '0,89', '\'0\'', '534', '50', '267', '<dl><dt>Вес, грамм: </dt><dd>0,89</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,89</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,89', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(42, 'f965d78c-9200-4ff1-8019-58876fc66458', '2300078667463', '1EA74357', '0,89', '\'0\'', '534', '50', '267', '<dl><dt>Вес, грамм: </dt><dd>0,89</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,89</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,89', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(43, 'f965d78c-9200-4ff1-8019-58876fc66458', '2300081329082', '1EA74357', '0,91', '\'0\'', '566', '50', '283', '<dl><dt>Вес, грамм: </dt><dd>0,91</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,91</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,91', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(44, 'a3155ff3-a66f-41d4-8450-cb3ce1cafba8', '2300077826427', '1EA74380', '0,73', '\'0\'', '414', '50', '207', '<dl><dt>Вес, грамм: </dt><dd>0,73</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,73</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,73', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(45, 'a3155ff3-a66f-41d4-8450-cb3ce1cafba8', '2300077825802', '1EA74380', '0,74', '\'0\'', '420', '50', '210', '<dl><dt>Вес, грамм: </dt><dd>0,74</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,74</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,74', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(46, '2c9cc93d-4482-447d-aa5f-94fc12975900', '2300078096409', '1EA76015', '2,46', '\'0\'', '1 449', '50', '725', '<dl><dt>Вес, грамм: </dt><dd>2,46</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,46</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,46', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(47, '2c9cc93d-4482-447d-aa5f-94fc12975900', '2300078096805', '1EA76015', '2,48', '\'0\'', '1 461', '50', '731', '<dl><dt>Вес, грамм: </dt><dd>2,48</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,48</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,48', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(48, 'c4ae6932-2305-4024-8607-c7c7f1a728b6', '2300077847514', '1EA76250', '1,13', '\'0\'', '653', '50', '327', '<dl><dt>Вес, грамм: </dt><dd>1,13</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,13</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,13', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(49, 'd3749ce0-a3dc-44d7-b08d-04e35c158790', '2300087002415', '1EA76256', '0,55', '\'0\'', '336', '50', '168', '<dl><dt>Вес, грамм: </dt><dd>0,55</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,55</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,55', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(50, 'd3749ce0-a3dc-44d7-b08d-04e35c158790', '2300087002903', '1EA76256', '0,55', '\'0\'', '336', '50', '168', '<dl><dt>Вес, грамм: </dt><dd>0,55</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,55</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,55', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:05', '2019-09-29 18:12:05'),
(51, 'd3749ce0-a3dc-44d7-b08d-04e35c158790', '2300087003771', '1EA76256', '0,55', '\'0\'', '336', '50', '168', '<dl><dt>Вес, грамм: </dt><dd>0,55</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,55</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,55', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(52, 'd3749ce0-a3dc-44d7-b08d-04e35c158790', '2300087008899', '1EA76256', '0,56', '\'0\'', '342', '50', '171', '<dl><dt>Вес, грамм: </dt><dd>0,56</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,56</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,56', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(53, 'd3749ce0-a3dc-44d7-b08d-04e35c158790', '2300087009735', '1EA76256', '0,56', '\'0\'', '342', '50', '171', '<dl><dt>Вес, грамм: </dt><dd>0,56</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>0,56</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '0,56', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(54, 'ae82c2aa-42ff-4190-9847-9ffe2fbe4e56', '2300085544153', '1EA76525', '2,08', '\'0\'', '1 225', '50', '613', '<dl><dt>Вес, грамм: </dt><dd>2,08</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,08</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,08', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(55, '8a9f1a8d-7b5e-430d-9fe0-9eb1deccfe76', '2300073509614', '1EA76709', '1,22', '\'0\'', '745', '50', '373', '<dl><dt>Вес, грамм: </dt><dd>1,22</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,22</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,22', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(56, '8a9f1a8d-7b5e-430d-9fe0-9eb1deccfe76', '2300073509690', '1EA76709', '1,22', '\'0\'', '745', '50', '373', '<dl><dt>Вес, грамм: </dt><dd>1,22</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,22</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,22', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(57, '8a9f1a8d-7b5e-430d-9fe0-9eb1deccfe76', '2300079313277', '1EA76709', '1,22', '\'0\'', '759', '50', '380', '<dl><dt>Вес, грамм: </dt><dd>1,22</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,22</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,22', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(58, '8a9f1a8d-7b5e-430d-9fe0-9eb1deccfe76', '2300073509737', '1EA76709', '1,23', '\'0\'', '752', '50', '376', '<dl><dt>Вес, грамм: </dt><dd>1,23</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,23</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,23', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(59, '04e1be68-ecfc-47a6-b31a-c58679b4429b', '2300069236623', '1EA76819', '1,6', '\'0\'', '978', '50', '489', '<dl><dt>Вес, грамм: </dt><dd>1,6</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,6</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,6', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(60, '04e1be68-ecfc-47a6-b31a-c58679b4429b', '2300069237026', '1EA76819', '1,65', '\'0\'', '1 008', '50', '504', '<dl><dt>Вес, грамм: </dt><dd>1,65</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,65</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,65', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(61, '9886f378-086a-419d-a94e-b6b8b8b67d7b', '2300072581369', '1EA76954', '1,71', '\'0\'', '804', '70', '241', '<dl><dt>Вес, грамм: </dt><dd>1,71</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,71</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,71', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(62, '9886f378-086a-419d-a94e-b6b8b8b67d7b', '2300072582335', '1EA76954', '1,73', '\'0\'', '813', '70', '244', '<dl><dt>Вес, грамм: </dt><dd>1,73</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,73</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,73', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:06', '2019-09-29 18:12:06'),
(63, '9886f378-086a-419d-a94e-b6b8b8b67d7b', '2300072582472', '1EA76954', '1,73', '\'0\'', '813', '70', '244', '<dl><dt>Вес, грамм: </dt><dd>1,73</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,73</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,73', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(64, '0daa1486-2251-4909-87fa-9d43d7c61572', '2300073390328', '1EA77189', '1,59', '\'0\'', '747', '70', '224', '<dl><dt>Вес, грамм: </dt><dd>1,59</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,59</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,59', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(65, '0daa1486-2251-4909-87fa-9d43d7c61572', '2300073390663', '1EA77189', '1,59', '\'0\'', '747', '70', '224', '<dl><dt>Вес, грамм: </dt><dd>1,59</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,59</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,59', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(66, '39ac41f7-e788-4801-aebb-b0193c530929', '2300087013152', '1EA77525', '1,49', '\'0\'', '910', '50', '455', '<dl><dt>Вес, грамм: </dt><dd>1,49</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,49</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,49', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(67, '39ac41f7-e788-4801-aebb-b0193c530929', '2300087013374', '1EA77525', '1,51', '\'0\'', '923', '50', '462', '<dl><dt>Вес, грамм: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,51', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(68, 'b0eee46c-df97-4f53-9553-45613e4b0ad8', '2300069363305', '1EA77636', '1,41', '\'0\'', '830', '50', '415', '<dl><dt>Вес, грамм: </dt><dd>1,41</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,41</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,41', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(69, 'b0eee46c-df97-4f53-9553-45613e4b0ad8', '2300069363893', '1EA77636', '1,44', '\'0\'', '848', '50', '424', '<dl><dt>Вес, грамм: </dt><dd>1,44</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,44</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,44', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(70, 'b0eee46c-df97-4f53-9553-45613e4b0ad8', '2300069363695', '1EA77636', '1,47', '\'0\'', '866', '50', '433', '<dl><dt>Вес, грамм: </dt><dd>1,47</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,47</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,47', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(71, 'b0eee46c-df97-4f53-9553-45613e4b0ad8', '2300069362667', '1EA77636', '1,48', '\'0\'', '872', '50', '436', '<dl><dt>Вес, грамм: </dt><dd>1,48</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,48</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,48', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(72, 'b0eee46c-df97-4f53-9553-45613e4b0ad8', '2300069363190', '1EA77636', '1,53', '\'0\'', '901', '50', '451', '<dl><dt>Вес, грамм: </dt><dd>1,53</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,53</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,53', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(73, 'b0eee46c-df97-4f53-9553-45613e4b0ad8', '2300069363954', '1EA77636', '1,57', '\'0\'', '925', '50', '463', '<dl><dt>Вес, грамм: </dt><dd>1,57</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,57</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,57', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(74, '326d5711-4e79-431a-9dd9-f60cb822e9cb', '2300080865239', '1EA77753', '1,47', '\'0\'', '914', '50', '457', '<dl><dt>Вес, грамм: </dt><dd>1,47</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,47</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,47', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(75, '326d5711-4e79-431a-9dd9-f60cb822e9cb', '2300080864584', '1EA77753', '1,51', '\'0\'', '939', '50', '470', '<dl><dt>Вес, грамм: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,51</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,51', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(76, '8e77ce98-9baa-4ba0-89cb-6d500388eb9a', '2300072832027', '1EA77797', '2,03', '\'0\'', '1 196', '50', '598', '<dl><dt>Вес, грамм: </dt><dd>2,03</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,03</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '2,03', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:07', '2019-09-29 18:12:07'),
(77, '9a88a226-e576-4a17-9794-cd904ae8714d', '2300086746648', '1EA77895', '1,7', '\'0\'', '1 039', '50', '520', '<dl><dt>Вес, грамм: </dt><dd>1,7</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,7</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,7', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(78, 'cfc53956-953f-4a3e-a4cb-4fe635ad84c1', '2300073682195', '1EA77922', '1,79', '\'0\'', '841', '70', '252', '<dl><dt>Вес, грамм: </dt><dd>1,79</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,79</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,79', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(79, 'cfc53956-953f-4a3e-a4cb-4fe635ad84c1', '2300073682218', '1EA77922', '1,79', '\'0\'', '841', '70', '252', '<dl><dt>Вес, грамм: </dt><dd>1,79</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,79</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,79', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(80, 'cfc53956-953f-4a3e-a4cb-4fe635ad84c1', '2300073682829', '1EA77922', '1,82', '\'0\'', '855', '70', '257', '<dl><dt>Вес, грамм: </dt><dd>1,82</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,82</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,82', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(81, 'e5866176-59d2-4692-af03-05f5b5cbf2ba', '2300070398457', '1EA77923', '1,36', '\'0\'', '639', '70', '192', '<dl><dt>Вес, грамм: </dt><dd>1,36</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,36</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,36', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(82, 'e5866176-59d2-4692-af03-05f5b5cbf2ba', '2300070399706', '1EA77923', '1,41', '\'0\'', '663', '70', '199', '<dl><dt>Вес, грамм: </dt><dd>1,41</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,41</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,41', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(83, 'e5866176-59d2-4692-af03-05f5b5cbf2ba', '2300070399713', '1EA77923', '1,41', '\'0\'', '663', '70', '199', '<dl><dt>Вес, грамм: </dt><dd>1,41</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,41</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,41', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(84, 'e5866176-59d2-4692-af03-05f5b5cbf2ba', '2300070399768', '1EA77923', '1,43', '\'0\'', '672', '70', '202', '<dl><dt>Вес, грамм: </dt><dd>1,43</dd><dt>Проба: </dt><dd>925</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>1,43</dd><dt>Проба: </dt><dd>925</dd></dl>', 'Срібна Країна', '1,43', '925', NULL, NULL, NULL, NULL, '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(85, '\"a89d794b-7539-4387-a7e3-a61347e0ecbd', '4824100525364', '0079R-BR', '2,76', '\'0\'', '7 227', '50', '3 614', '<dl><dt>Вес, грамм: </dt><dd>2,76</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,76</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,76', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(86, '\"a89d794b-7539-4387-a7e3-a61347e0ecbd', '4824002280866', '0079R-BR', '2,77', '\'0\'', '8 855', '50', '4 428', '<dl><dt>Вес, грамм: </dt><dd>2,77</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,09</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/4A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,77</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,09</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/4A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,77', '925', '2', '0,09', 'Кр 57', '4/4A', '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(87, '\"a89d794b-7539-4387-a7e3-a61347e0ecbd', '4824002068099', '0079R-BR', '2,79', '\'0\'', '7 252', '50', '3 626', '<dl><dt>Вес, грамм: </dt><dd>2,79</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,79</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,79', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(88, '\"a89d794b-7539-4387-a7e3-a61347e0ecbd', '4824002067917', '0079R-BR', '2,8', '\'0\'', '7 259', '50', '3 630', '<dl><dt>Вес, грамм: </dt><dd>2,8</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,8</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,8', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:08', '2019-09-29 18:12:08'),
(89, '\"a89d794b-7539-4387-a7e3-a61347e0ecbd', '4824100525319', '0079R-BR', '2,84', '\'0\'', '7 291', '50', '3 646', '<dl><dt>Вес, грамм: </dt><dd>2,84</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,84</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,84', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:09', '2019-09-29 18:12:09'),
(90, '\"a89d794b-7539-4387-a7e3-a61347e0ecbd', '4824002287551', '0079R-BR', '2,88', '\'0\'', '8 943', '50', '4 472', '<dl><dt>Вес, грамм: </dt><dd>2,88</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,09</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/4A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,88</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,09</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/4A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,88', '925', '2', '0,09', 'Кр 57', '4/4A', '2019-09-29 18:12:09', '2019-09-29 18:12:09'),
(91, '\"5bc27d0d-f0c5-4a5b-a55e-0261ee83a3ca', '4824100524695', '0160R-BR', '2,32', '\'0\'', '6 873', '50', '3 437', '<dl><dt>Вес, грамм: </dt><dd>2,32</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,32</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,32', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:09', '2019-09-29 18:12:09'),
(92, '\"5bc27d0d-f0c5-4a5b-a55e-0261ee83a3ca', '4824100524633', '0160R-BR', '2,37', '\'0\'', '6 914', '50', '3 457', '<dl><dt>Вес, грамм: </dt><dd>2,37</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,37</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,37', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:09', '2019-09-29 18:12:09'),
(93, '\"5bc27d0d-f0c5-4a5b-a55e-0261ee83a3ca', '4824100524510', '0160R-BR', '2,38', '\'0\'', '6 921', '50', '3 461', '<dl><dt>Вес, грамм: </dt><dd>2,38</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Бриллиант</dd><dt>Количество камней: </dt><dd>2</dd><dt>Масса: </dt><dd>0,068</dd><dt>Гр. цвета/чистоты/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', '<dl><dt>Вага, грам: </dt><dd>2,38</dd><dt>Проба: </dt><dd>925</dd></dl><dl class=\"\"with-title\"\"><dt>Вставка 1: </dt><dd>Діамант</dd><dt>Кількість каменів: </dt><dd>2</dd><dt>Маса: </dt><dd>0,068</dd><dt>Гр. кольору/чистоти/кл. огранки: </dt><dd>4/5A</dd><dt>Форма огранки: </dt><dd>Кр 57</dd></dl>', 'Срібна Країна\"', '2,38', '925', '2', '0,068', 'Кр 57', '4/5A', '2019-09-29 18:12:09', '2019-09-29 18:12:09');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku_option` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gproduct_id` bigint(20) UNSIGNED NOT NULL,
  `size` double(4,2) DEFAULT NULL,
  `weight` double(7,3) NOT NULL,
  `g_price` double(7,2) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT '0',
  `total_sum` double(8,2) NOT NULL,
  `status` enum('new','reserve','sold') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `sku_option`, `barcode`, `gproduct_id`, `size`, `weight`, `g_price`, `sale`, `total_sum`, `status`, `created_at`, `updated_at`) VALUES
(1, '4824100525661', 'test1', 5, 2.81, 2.810, 7268.00, 50, 3634.00, 'new', NULL, '2019-09-29 11:03:22'),
(3, '4824100525289', 'test2', 5, 2.83, 2.830, 7285.00, 50, 3643.00, 'new', NULL, '2019-09-29 11:03:22'),
(5, '4824100524343', 'test3', 6, 2.35, 2.350, 6898.00, 50, 3449.00, 'new', NULL, '2019-09-29 11:03:22'),
(6, '4824100524473', 'test4', 5, 2.38, 2.380, 6921.00, 50, 3461.00, 'new', NULL, '2019-09-29 11:03:23'),
(7, '4824100524374', 'test5', 7, 2.39, 2.390, 6930.00, 50, 3465.00, 'new', NULL, '2019-09-29 11:03:23'),
(8, '4824100524596', 'test6', 8, 2.39, 2.390, 6930.00, 50, 3465.00, 'new', NULL, '2019-09-29 11:03:23');

-- --------------------------------------------------------

--
-- Структура таблицы `pvalues`
--

CREATE TABLE `pvalues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `param_id` bigint(20) UNSIGNED NOT NULL,
  `type_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pvalues`
--

INSERT INTO `pvalues` (`id`, `param_id`, `type_value`, `name_ru`, `name_ua`, `desc`, `created_at`, `updated_at`) VALUES
(3, 1, 'text', 'Золото', 'Золото', NULL, '2019-07-15 10:29:13', '2019-07-15 11:35:05'),
(4, 3, 'text', 'Бриллиант', 'Діамант', NULL, '2019-07-17 10:06:53', '2019-07-17 10:06:53'),
(5, 3, 'text', 'Сапфир', 'Сапфір', NULL, '2019-07-17 10:07:33', '2019-07-17 10:07:33'),
(6, 3, 'text', 'Агат', 'Агат', NULL, '2019-07-17 10:08:04', '2019-07-17 10:08:04'),
(7, 3, 'text', 'Аметист', 'Аметист', NULL, '2019-07-17 10:08:31', '2019-07-17 10:08:31'),
(8, 3, 'text', 'Гранат', 'Гранат', NULL, '2019-07-17 10:09:09', '2019-07-17 10:09:09'),
(9, 3, 'text', 'Топаз swiss', 'Топаз swiss', NULL, '2019-07-17 10:09:37', '2019-07-17 10:09:37'),
(10, 3, 'text', 'Кварц зеленый', 'Кварц зелений', NULL, '2019-07-17 10:10:07', '2019-07-17 10:10:07'),
(11, 3, 'text', 'Кварц голубой', 'Кварц блакитний', NULL, '2019-07-17 10:10:35', '2019-07-17 10:10:35'),
(12, 3, 'text', 'Жемчуг', 'Перли', NULL, '2019-07-17 10:11:06', '2019-07-17 10:11:06'),
(13, 1, 'text', 'Серебро', 'Срібло', NULL, '2019-07-17 10:12:52', '2019-07-17 10:12:52'),
(14, 2, 'int', '585', '585', NULL, '2019-07-17 12:15:34', '2019-07-17 12:15:34'),
(15, 2, 'int', '925', '925', NULL, '2019-07-29 11:39:51', '2019-07-29 11:39:51'),
(16, 4, 'text', 'дорожка', 'доріжка', NULL, '2019-07-29 11:40:31', '2019-07-29 11:40:31'),
(17, 5, 'text', 'белое серебро', 'біле срібло', NULL, '2019-07-29 11:41:01', '2019-07-29 11:41:01'),
(18, 6, 'text', 'родирование', 'родіювання', NULL, '2019-07-29 11:41:50', '2019-07-29 11:41:50'),
(19, 7, 'text', 'английский замок', 'англійський замок', NULL, '2019-07-29 11:44:41', '2019-07-29 11:44:41'),
(20, 8, 'dec', '5', '5', NULL, '2019-07-29 11:45:14', '2019-07-29 11:45:14'),
(21, 8, 'dec', '6', '6', NULL, '2019-07-29 11:45:14', '2019-07-29 11:45:27'),
(22, 9, 'text', '1 камень', '1 камінь', NULL, '2019-07-29 11:46:02', '2019-07-29 11:46:02'),
(23, 10, 'text', 'россыпь камней', 'розсип каменів', NULL, '2019-07-29 11:46:51', '2019-07-29 11:46:51'),
(24, 11, 'text', 'ключик', 'ключик', NULL, '2019-07-29 11:47:24', '2019-07-29 11:47:24'),
(25, 12, 'text', 'снейк', 'снейк', NULL, '2019-07-29 11:47:55', '2019-07-29 11:47:55'),
(26, 13, 'text', 'женщине', 'жінці', NULL, '2019-07-29 11:48:35', '2019-07-29 11:48:35'),
(27, 13, 'text', 'ребенку', 'дитині', NULL, '2019-07-29 11:48:57', '2019-07-29 11:48:57'),
(28, 14, 'text', 'белый', 'білий', NULL, '2019-07-29 11:49:38', '2019-07-29 11:49:38'),
(29, 15, 'text', 'день рождения', 'день народження', NULL, '2019-07-29 11:50:17', '2019-07-29 11:50:17'),
(30, 15, 'text', 'юбилей', 'ювілей', NULL, '2019-07-29 11:50:39', '2019-07-29 11:50:39'),
(31, 15, 'text', 'совершеннолетие', 'повноліття', NULL, '2019-07-29 11:51:07', '2019-07-29 11:51:07'),
(32, 15, 'text', '8 марта', '8 березня', NULL, '2019-07-29 11:51:32', '2019-07-29 11:51:32'),
(33, 15, 'text', 'Новый год', 'Новий рік', NULL, '2019-07-29 11:51:57', '2019-07-29 11:51:57'),
(34, 16, 'dec', '0.033', '0.033', NULL, '2019-07-29 11:52:46', '2019-07-29 11:52:46'),
(35, 17, 'text', 'Кр 57', 'Кр 57', NULL, '2019-07-29 11:53:28', '2019-07-29 11:53:28'),
(36, 18, 'text', '4/5A', '4/5A', NULL, '2019-07-29 11:53:48', '2019-07-29 11:53:48');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `label_ru`, `label_ua`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Администратор', 'Адміністратор', NULL, NULL),
(2, 'manager', 'Менеджер', 'Менеджер', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_full` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc_ru` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `desc_ua` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `alias`, `category_id`, `name_ru`, `name_ua`, `image_thumb`, `image_full`, `desc_ru`, `desc_ua`, `created_at`, `updated_at`) VALUES
(1, 'kolca_s_brilliantami', 1, 'С бриллиантами', 'З діамантами', NULL, NULL, NULL, NULL, '2019-07-09 11:22:16', '2019-07-09 13:31:07'),
(2, 'kolca_ukrasheniya_s_kamnyami', 1, 'Украшения с камнями', 'Прикраси з камінням', '/images/uploads/subcategories_img/0e07bd7ce905bb74b501712b2424ffccc0dfcedd7h.jpg', '/images/uploads/subcategories_img/b654a74431225cea9feaadcc8b35c67a556d4b90gJ.jpg', NULL, NULL, '2019-07-09 12:30:22', '2019-07-16 15:42:29'),
(3, 'kolca_s_odnim_kamnem', 1, 'С одним камнем', 'З одним каменем', NULL, NULL, NULL, NULL, '2019-07-09 12:31:30', '2019-07-09 15:05:46'),
(4, 'kolca_kolca_dorozhki', 1, 'Кольца-дорожки', 'Кільця-доріжки', NULL, NULL, NULL, NULL, '2019-07-09 12:32:11', '2019-07-09 15:19:13'),
(5, 'kolca_s_rossypyu_kamney', 1, 'С  россыпью камней', 'З розсипом каменів', NULL, NULL, NULL, NULL, '2019-07-09 12:33:33', '2019-07-09 15:20:10'),
(6, 'kolca_bez_kamney', 1, 'Без камней', 'Без каменів', NULL, NULL, NULL, NULL, '2019-07-09 12:34:09', '2019-07-09 15:23:02'),
(7, 'kolca_falangovye', 1, 'Фаланговые', 'Фалангові', NULL, NULL, NULL, NULL, '2019-07-09 15:25:14', '2019-07-09 15:25:14'),
(8, 'kolca_fantaziya', 1, 'Фантазия', 'Фантазія', NULL, NULL, NULL, NULL, '2019-07-09 15:26:46', '2019-07-09 15:26:46'),
(9, 'kolca_geometriya', 1, 'Геометрия', 'Геометрія', NULL, NULL, NULL, NULL, '2019-07-09 15:28:16', '2019-07-09 15:28:16'),
(10, 'kolca_korony', 1, 'Короны', 'Корони', NULL, NULL, NULL, NULL, '2019-07-09 15:29:02', '2019-07-09 15:29:02'),
(11, 'kolca_serdce', 1, 'Сердце', 'Серце', NULL, NULL, NULL, NULL, '2019-07-09 15:30:05', '2019-07-09 15:30:05'),
(12, 'sergi_s_brilliantami', 2, 'С бриллиантами', 'З діамантами', NULL, NULL, NULL, NULL, '2019-07-10 06:05:54', '2019-07-10 06:05:54'),
(13, 'sergi_ukrasheniya_s_kamnyami', 2, 'Украшения с камнями', 'Прикраси з камінням', NULL, NULL, NULL, NULL, '2019-07-10 06:06:12', '2019-07-16 15:43:02'),
(14, 'sergi_angliyskiy_zamok', 2, 'Английский замок', 'Англійский замок', NULL, NULL, NULL, NULL, '2019-07-10 06:10:11', '2019-07-10 06:10:11'),
(15, 'sergi_puset_gvozdiki_', 2, 'Пусет (гвоздики)', 'Пусети (гвоздики)', NULL, NULL, NULL, NULL, '2019-07-10 06:11:09', '2019-07-10 06:12:09'),
(16, 'sergi_puset_s_prodevkoy', 2, 'Пусет с продевкой', 'Пусети з продевкой', NULL, NULL, NULL, NULL, '2019-07-10 06:48:08', '2019-07-10 06:48:08'),
(17, 'sergi_sergi_dorozhki', 2, 'Серьги  дорожки', 'Сережки доріжки', NULL, NULL, NULL, NULL, '2019-07-10 06:48:39', '2019-07-10 06:48:39'),
(18, 'kole_s_kulonom', 5, 'С кулоном', 'З кулоном', NULL, NULL, NULL, NULL, '2019-07-10 06:49:19', '2019-07-16 15:44:19'),
(19, 'sergi_sergi_podveski', 2, 'Серьги  подвески', 'Сережки підвіски', NULL, NULL, NULL, NULL, '2019-07-10 06:49:23', '2019-07-10 06:49:23'),
(20, 'sergi_sergi_kolca_kongo_', 2, 'Серьги-кольца (Конго)', 'Сережки-кільця (Конго)', NULL, NULL, NULL, NULL, '2019-07-10 06:49:49', '2019-07-10 06:49:49'),
(21, 'sergi_sergi_prodevki', 2, 'Серьги-продевки', 'Сережки-продевкі', NULL, NULL, NULL, NULL, '2019-07-10 06:53:48', '2019-07-10 06:53:48'),
(22, 'sergi_kaffy', 2, 'Каффы', 'Кафи', NULL, NULL, NULL, NULL, '2019-07-10 06:54:11', '2019-07-10 06:54:11'),
(23, 'sergi_bez_kamney', 2, 'Без камней', 'Без каменів', NULL, NULL, NULL, NULL, '2019-07-10 06:54:38', '2019-07-10 06:54:38'),
(24, 'kulony_s_brilliantami', 3, 'С бриллиантами', 'З діамантами', NULL, NULL, NULL, NULL, '2019-07-10 06:55:28', '2019-07-10 06:55:28'),
(25, 'kole_busy_zhemchug', 5, 'Бусы Жемчуг', 'Намисто Перли', NULL, NULL, NULL, NULL, '2019-07-10 06:55:39', '2019-07-10 06:55:39'),
(26, 'kulony_ukrasheniya_s_kamnyami', 3, 'Украшения с камнями', 'Прикраси з камінням', NULL, NULL, NULL, NULL, '2019-07-10 06:55:56', '2019-07-16 15:43:22'),
(27, 'kulony_s_odnim_kamnem', 3, 'С одним камнем', 'З одним каменем', NULL, NULL, NULL, NULL, '2019-07-10 06:56:41', '2019-07-10 06:56:41'),
(28, 'kole_na_leske', 5, 'На леске', 'На волосіні', NULL, NULL, NULL, NULL, '2019-07-10 06:56:54', '2019-07-10 06:56:54'),
(29, 'kulony_zodiaki', 3, 'Зодиаки', 'Зодіаки', NULL, NULL, NULL, NULL, '2019-07-10 06:57:53', '2019-07-16 15:43:49'),
(30, 'kulony_bukvy', 3, 'Буквы', 'Літери', NULL, NULL, NULL, NULL, '2019-07-10 06:58:08', '2019-07-10 06:58:08'),
(31, 'braslety_braslety_dlya_busin', 6, 'Браслеты для бусин', 'Браслети для намистин', NULL, NULL, NULL, NULL, '2019-07-10 06:58:20', '2019-07-10 06:58:20'),
(32, 'kulony_fantaziynye', 3, 'Фантазийные', 'Фантазійні', NULL, NULL, NULL, NULL, '2019-07-10 06:58:28', '2019-07-10 06:58:28'),
(33, 'braslety_braslety_krasnaya_nit', 6, 'Браслеты красная нить', 'Браслети червона нитка', NULL, NULL, NULL, NULL, '2019-07-10 06:58:55', '2019-07-10 06:58:55'),
(34, 'kulony_klyuchiki', 3, 'Ключики', 'Ключики', NULL, NULL, NULL, NULL, '2019-07-10 06:58:56', '2019-07-10 06:58:56'),
(35, 'braslety_pletenie_lav', 6, 'Плетение Лав', 'Плетіння Лав', NULL, NULL, NULL, NULL, '2019-07-10 06:59:32', '2019-07-10 06:59:32'),
(36, 'kulony_angelochki', 3, 'Ангелочки', 'Янголята', NULL, NULL, NULL, NULL, '2019-07-10 06:59:34', '2019-07-10 06:59:34'),
(37, 'braslety_pletenie_nonna', 6, 'Плетение Нонна', 'Плетіння Нонна', NULL, NULL, NULL, NULL, '2019-07-10 06:59:54', '2019-07-10 06:59:54'),
(38, 'kulony_korony', 3, 'Короны', 'Корони', NULL, NULL, NULL, NULL, '2019-07-10 07:00:03', '2019-07-10 07:00:03'),
(39, 'braslety_pletenie_romb', 6, 'Плетение Ромб', 'Плетіння Ромб', NULL, NULL, NULL, NULL, '2019-07-10 07:00:29', '2019-07-10 07:00:29'),
(40, 'kulony_serdca', 3, 'Сердца', 'Серця', NULL, NULL, NULL, NULL, '2019-07-10 07:00:50', '2019-07-10 07:00:50'),
(41, 'braslety_pletenie_dvoynoy_romb', 6, 'Плетение Двойной Ромб', 'Плетіння Подвійний Ромб', NULL, NULL, NULL, NULL, '2019-07-10 07:01:01', '2019-07-10 07:01:01'),
(42, 'kulony_krestiki', 3, 'Крестики', 'Хрестики', NULL, NULL, NULL, NULL, '2019-07-10 07:01:28', '2019-07-10 07:01:28'),
(43, 'braslety_pletenie_sneyk', 6, 'Плетение Снэйк', 'Плетіння Снейк', NULL, NULL, NULL, NULL, '2019-07-10 07:01:32', '2019-07-10 07:01:32'),
(44, 'braslety_pletenie_fantaziynye', 6, 'Плетение Фантазийные', 'Плетіння Фантазійне', NULL, NULL, NULL, NULL, '2019-07-10 07:02:10', '2019-07-10 07:02:10'),
(45, 'cepochki_vstavka_kauchuk', 4, 'Вставка Каучук', 'Вставка Каучук', NULL, NULL, NULL, NULL, '2019-07-10 07:02:20', '2019-07-10 07:02:20'),
(46, 'cepochki_pletenie_gurmet', 4, 'Плетение Гурмет', 'Плетіння Гурмет', NULL, NULL, NULL, NULL, '2019-07-10 07:02:56', '2019-07-10 07:02:56'),
(47, 'sharmy_bez-razbivki', 7, 'без разбивки', 'без розбивки', '/images/uploads/subcategories_img/c35a3c8d4f29872c8db2f381ee3c16ca7b58aa8c49.jpg', NULL, NULL, NULL, '2019-07-10 07:02:57', '2019-07-24 09:35:28'),
(48, 'cepochki_pletenie_doch', 4, 'Плетение Дочь', 'Плетіння Дочка', NULL, NULL, NULL, NULL, '2019-07-10 07:03:48', '2019-07-10 07:03:48'),
(49, 'detskaya_kollekciya_angliyskiy_zamok', 8, 'Английский замок', 'Англійський замок', NULL, NULL, NULL, NULL, '2019-07-10 07:04:05', '2019-07-10 07:04:05'),
(50, 'cepochki_pletenie_lav', 4, 'Плетение Лав', 'Плетіння Лав', NULL, NULL, NULL, NULL, '2019-07-10 07:04:08', '2019-07-10 07:04:08'),
(51, 'cepochki_pletenie_nonna', 4, 'Плетение Нонна', 'Плетіння Нонна', NULL, NULL, NULL, NULL, '2019-07-10 07:04:30', '2019-07-10 07:04:30'),
(52, 'cepochki_pletenie_romb', 4, 'Плетение Ромб', 'Плетіння Ромб', NULL, NULL, NULL, NULL, '2019-07-10 07:05:02', '2019-07-10 07:05:02'),
(53, 'detskaya_kollekciya_puset_gvozdiki_', 8, 'Пусет (гвоздики)', 'Пусети (цвяхи)', NULL, NULL, NULL, NULL, '2019-07-10 07:05:06', '2019-07-10 07:05:06'),
(54, 'cepochki_pletenie_sneyk', 4, 'Плетение Снэйк', 'Плетіння Снейк', NULL, NULL, NULL, NULL, '2019-07-10 07:05:36', '2019-07-10 07:05:36'),
(55, 'detskaya_kollekciya_petelka', 8, 'Петелька', 'Петелька', NULL, NULL, NULL, NULL, '2019-07-10 07:05:40', '2019-07-10 07:05:40'),
(56, 'cepochki_pletenie_spiga', 4, 'Плетение Спига', 'Плетіння Спіга', NULL, NULL, NULL, NULL, '2019-07-10 07:05:58', '2019-07-10 07:05:58'),
(57, 'detskaya_kollekciya_bulavki', 8, 'Булавки', 'Шпильки', NULL, NULL, NULL, NULL, '2019-07-10 07:06:01', '2019-07-10 07:06:01'),
(58, 'cepochki_pletenie_yakor', 4, 'Плетение Якорь', 'Плетіння Якір', NULL, NULL, NULL, NULL, '2019-07-10 07:06:22', '2019-07-10 07:06:22'),
(59, 'detskaya_kollekciya_lozhki', 8, 'Ложки', 'Ложки', NULL, NULL, NULL, NULL, '2019-07-10 07:06:24', '2019-07-10 07:06:24'),
(60, 'cepochki_pletenie_singapur', 4, 'Плетение Сингапур', 'Плетіння Сінгапур', NULL, NULL, NULL, NULL, '2019-07-10 07:06:40', '2019-07-10 07:06:40'),
(61, 'drugie_kategorii_broshi', 9, 'Броши', 'Броши', NULL, NULL, NULL, NULL, '2019-07-10 07:07:00', '2019-07-10 07:07:00'),
(62, 'drugie_kategorii_pirsing', 9, 'Пирсинг', 'Пірсинг', NULL, NULL, NULL, NULL, '2019-07-10 07:07:19', '2019-07-10 07:07:19'),
(63, 'drugie_kategorii_bulavki', 9, 'Булавки', 'Шпильки', NULL, NULL, NULL, NULL, '2019-07-10 07:07:38', '2019-07-10 07:07:38'),
(64, 'drugie_kategorii_lozhki', 9, 'Ложки', 'Ложки', NULL, NULL, NULL, NULL, '2019-07-10 07:07:51', '2019-07-10 07:07:51'),
(65, 'drugie_kategorii_ikony', 9, 'Иконы', 'Ікони', NULL, NULL, NULL, NULL, '2019-07-10 07:08:16', '2019-07-10 07:08:16');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories_params`
--

CREATE TABLE `subcategories_params` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `param_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subcategories_params`
--

INSERT INTO `subcategories_params` (`id`, `subcategory_id`, `param_id`, `created_at`, `updated_at`) VALUES
(149, 1, 1, NULL, NULL),
(150, 2, 1, NULL, NULL),
(151, 3, 1, NULL, NULL),
(152, 4, 1, NULL, NULL),
(153, 5, 1, NULL, NULL),
(154, 6, 1, NULL, NULL),
(155, 7, 1, NULL, NULL),
(156, 8, 1, NULL, NULL),
(157, 9, 1, NULL, NULL),
(158, 10, 1, NULL, NULL),
(159, 11, 1, NULL, NULL),
(160, 12, 1, NULL, NULL),
(161, 13, 1, NULL, NULL),
(162, 14, 1, NULL, NULL),
(163, 15, 1, NULL, NULL),
(164, 16, 1, NULL, NULL),
(165, 17, 1, NULL, NULL),
(166, 18, 1, NULL, NULL),
(167, 19, 1, NULL, NULL),
(168, 20, 1, NULL, NULL),
(169, 21, 1, NULL, NULL),
(170, 22, 1, NULL, NULL),
(171, 23, 1, NULL, NULL),
(172, 24, 1, NULL, NULL),
(173, 25, 1, NULL, NULL),
(174, 26, 1, NULL, NULL),
(175, 27, 1, NULL, NULL),
(176, 28, 1, NULL, NULL),
(177, 29, 1, NULL, NULL),
(178, 30, 1, NULL, NULL),
(179, 31, 1, NULL, NULL),
(180, 32, 1, NULL, NULL),
(181, 33, 1, NULL, NULL),
(182, 34, 1, NULL, NULL),
(183, 35, 1, NULL, NULL),
(184, 36, 1, NULL, NULL),
(185, 37, 1, NULL, NULL),
(186, 38, 1, NULL, NULL),
(187, 39, 1, NULL, NULL),
(188, 40, 1, NULL, NULL),
(189, 41, 1, NULL, NULL),
(190, 42, 1, NULL, NULL),
(191, 43, 1, NULL, NULL),
(192, 44, 1, NULL, NULL),
(193, 45, 1, NULL, NULL),
(194, 46, 1, NULL, NULL),
(195, 47, 1, NULL, NULL),
(196, 48, 1, NULL, NULL),
(197, 49, 1, NULL, NULL),
(198, 50, 1, NULL, NULL),
(199, 51, 1, NULL, NULL),
(200, 52, 1, NULL, NULL),
(201, 53, 1, NULL, NULL),
(202, 54, 1, NULL, NULL),
(203, 55, 1, NULL, NULL),
(204, 56, 1, NULL, NULL),
(205, 57, 1, NULL, NULL),
(206, 58, 1, NULL, NULL),
(207, 59, 1, NULL, NULL),
(208, 60, 1, NULL, NULL),
(209, 61, 1, NULL, NULL),
(210, 62, 1, NULL, NULL),
(211, 63, 1, NULL, NULL),
(212, 64, 1, NULL, NULL),
(213, 65, 1, NULL, NULL),
(214, 1, 3, NULL, NULL),
(215, 2, 3, NULL, NULL),
(216, 3, 3, NULL, NULL),
(217, 4, 3, NULL, NULL),
(218, 5, 3, NULL, NULL),
(219, 6, 3, NULL, NULL),
(220, 7, 3, NULL, NULL),
(221, 8, 3, NULL, NULL),
(222, 9, 3, NULL, NULL),
(223, 10, 3, NULL, NULL),
(224, 11, 3, NULL, NULL),
(225, 12, 3, NULL, NULL),
(226, 13, 3, NULL, NULL),
(227, 14, 3, NULL, NULL),
(228, 15, 3, NULL, NULL),
(229, 16, 3, NULL, NULL),
(230, 17, 3, NULL, NULL),
(231, 18, 3, NULL, NULL),
(232, 19, 3, NULL, NULL),
(233, 20, 3, NULL, NULL),
(234, 21, 3, NULL, NULL),
(235, 22, 3, NULL, NULL),
(236, 23, 3, NULL, NULL),
(237, 24, 3, NULL, NULL),
(238, 25, 3, NULL, NULL),
(239, 26, 3, NULL, NULL),
(240, 27, 3, NULL, NULL),
(241, 28, 3, NULL, NULL),
(242, 29, 3, NULL, NULL),
(243, 30, 3, NULL, NULL),
(244, 31, 3, NULL, NULL),
(245, 32, 3, NULL, NULL),
(246, 33, 3, NULL, NULL),
(247, 34, 3, NULL, NULL),
(248, 35, 3, NULL, NULL),
(249, 36, 3, NULL, NULL),
(250, 37, 3, NULL, NULL),
(251, 38, 3, NULL, NULL),
(252, 39, 3, NULL, NULL),
(253, 40, 3, NULL, NULL),
(254, 41, 3, NULL, NULL),
(255, 42, 3, NULL, NULL),
(256, 43, 3, NULL, NULL),
(257, 44, 3, NULL, NULL),
(258, 45, 3, NULL, NULL),
(259, 46, 3, NULL, NULL),
(260, 47, 3, NULL, NULL),
(261, 48, 3, NULL, NULL),
(262, 49, 3, NULL, NULL),
(263, 50, 3, NULL, NULL),
(264, 51, 3, NULL, NULL),
(265, 52, 3, NULL, NULL),
(266, 53, 3, NULL, NULL),
(267, 54, 3, NULL, NULL),
(268, 55, 3, NULL, NULL),
(269, 56, 3, NULL, NULL),
(270, 57, 3, NULL, NULL),
(271, 58, 3, NULL, NULL),
(272, 59, 3, NULL, NULL),
(273, 60, 3, NULL, NULL),
(274, 61, 3, NULL, NULL),
(275, 62, 3, NULL, NULL),
(276, 63, 3, NULL, NULL),
(277, 64, 3, NULL, NULL),
(278, 65, 3, NULL, NULL),
(279, 1, 5, NULL, NULL),
(280, 2, 5, NULL, NULL),
(281, 3, 5, NULL, NULL),
(282, 4, 5, NULL, NULL),
(283, 5, 5, NULL, NULL),
(284, 6, 5, NULL, NULL),
(285, 7, 5, NULL, NULL),
(286, 8, 5, NULL, NULL),
(287, 9, 5, NULL, NULL),
(288, 10, 5, NULL, NULL),
(289, 11, 5, NULL, NULL),
(290, 12, 5, NULL, NULL),
(291, 13, 5, NULL, NULL),
(292, 14, 5, NULL, NULL),
(293, 15, 5, NULL, NULL),
(294, 16, 5, NULL, NULL),
(295, 17, 5, NULL, NULL),
(296, 18, 5, NULL, NULL),
(297, 19, 5, NULL, NULL),
(298, 20, 5, NULL, NULL),
(299, 21, 5, NULL, NULL),
(300, 22, 5, NULL, NULL),
(301, 23, 5, NULL, NULL),
(302, 24, 5, NULL, NULL),
(303, 25, 5, NULL, NULL),
(304, 26, 5, NULL, NULL),
(305, 27, 5, NULL, NULL),
(306, 28, 5, NULL, NULL),
(307, 29, 5, NULL, NULL),
(308, 30, 5, NULL, NULL),
(309, 31, 5, NULL, NULL),
(310, 32, 5, NULL, NULL),
(311, 33, 5, NULL, NULL),
(312, 34, 5, NULL, NULL),
(313, 35, 5, NULL, NULL),
(314, 36, 5, NULL, NULL),
(315, 37, 5, NULL, NULL),
(316, 38, 5, NULL, NULL),
(317, 39, 5, NULL, NULL),
(318, 40, 5, NULL, NULL),
(319, 41, 5, NULL, NULL),
(320, 42, 5, NULL, NULL),
(321, 43, 5, NULL, NULL),
(322, 44, 5, NULL, NULL),
(323, 45, 5, NULL, NULL),
(324, 46, 5, NULL, NULL),
(325, 47, 5, NULL, NULL),
(326, 48, 5, NULL, NULL),
(327, 49, 5, NULL, NULL),
(328, 50, 5, NULL, NULL),
(329, 51, 5, NULL, NULL),
(330, 52, 5, NULL, NULL),
(331, 53, 5, NULL, NULL),
(332, 54, 5, NULL, NULL),
(333, 55, 5, NULL, NULL),
(334, 56, 5, NULL, NULL),
(335, 57, 5, NULL, NULL),
(336, 58, 5, NULL, NULL),
(337, 59, 5, NULL, NULL),
(338, 60, 5, NULL, NULL),
(339, 61, 5, NULL, NULL),
(340, 62, 5, NULL, NULL),
(341, 63, 5, NULL, NULL),
(342, 64, 5, NULL, NULL),
(343, 65, 5, NULL, NULL),
(344, 1, 6, NULL, NULL),
(345, 2, 6, NULL, NULL),
(346, 3, 6, NULL, NULL),
(347, 4, 6, NULL, NULL),
(348, 5, 6, NULL, NULL),
(349, 6, 6, NULL, NULL),
(350, 7, 6, NULL, NULL),
(351, 8, 6, NULL, NULL),
(352, 9, 6, NULL, NULL),
(353, 10, 6, NULL, NULL),
(354, 11, 6, NULL, NULL),
(355, 12, 6, NULL, NULL),
(356, 13, 6, NULL, NULL),
(357, 14, 6, NULL, NULL),
(358, 15, 6, NULL, NULL),
(359, 16, 6, NULL, NULL),
(360, 17, 6, NULL, NULL),
(361, 18, 6, NULL, NULL),
(362, 19, 6, NULL, NULL),
(363, 20, 6, NULL, NULL),
(364, 21, 6, NULL, NULL),
(365, 22, 6, NULL, NULL),
(366, 23, 6, NULL, NULL),
(367, 24, 6, NULL, NULL),
(368, 25, 6, NULL, NULL),
(369, 26, 6, NULL, NULL),
(370, 27, 6, NULL, NULL),
(371, 28, 6, NULL, NULL),
(372, 29, 6, NULL, NULL),
(373, 30, 6, NULL, NULL),
(374, 31, 6, NULL, NULL),
(375, 32, 6, NULL, NULL),
(376, 33, 6, NULL, NULL),
(377, 34, 6, NULL, NULL),
(378, 35, 6, NULL, NULL),
(379, 36, 6, NULL, NULL),
(380, 37, 6, NULL, NULL),
(381, 38, 6, NULL, NULL),
(382, 39, 6, NULL, NULL),
(383, 40, 6, NULL, NULL),
(384, 41, 6, NULL, NULL),
(385, 42, 6, NULL, NULL),
(386, 43, 6, NULL, NULL),
(387, 44, 6, NULL, NULL),
(388, 45, 6, NULL, NULL),
(389, 46, 6, NULL, NULL),
(390, 47, 6, NULL, NULL),
(391, 48, 6, NULL, NULL),
(392, 49, 6, NULL, NULL),
(393, 50, 6, NULL, NULL),
(394, 51, 6, NULL, NULL),
(395, 52, 6, NULL, NULL),
(396, 53, 6, NULL, NULL),
(397, 54, 6, NULL, NULL),
(398, 55, 6, NULL, NULL),
(399, 56, 6, NULL, NULL),
(400, 57, 6, NULL, NULL),
(401, 58, 6, NULL, NULL),
(402, 59, 6, NULL, NULL),
(403, 60, 6, NULL, NULL),
(404, 61, 6, NULL, NULL),
(405, 62, 6, NULL, NULL),
(406, 63, 6, NULL, NULL),
(407, 64, 6, NULL, NULL),
(408, 65, 6, NULL, NULL),
(409, 1, 2, NULL, NULL),
(410, 2, 2, NULL, NULL),
(411, 3, 2, NULL, NULL),
(412, 4, 2, NULL, NULL),
(413, 5, 2, NULL, NULL),
(414, 6, 2, NULL, NULL),
(415, 7, 2, NULL, NULL),
(416, 8, 2, NULL, NULL),
(417, 9, 2, NULL, NULL),
(418, 10, 2, NULL, NULL),
(419, 11, 2, NULL, NULL),
(420, 12, 2, NULL, NULL),
(421, 13, 2, NULL, NULL),
(422, 14, 2, NULL, NULL),
(423, 15, 2, NULL, NULL),
(424, 16, 2, NULL, NULL),
(425, 17, 2, NULL, NULL),
(426, 18, 2, NULL, NULL),
(427, 19, 2, NULL, NULL),
(428, 20, 2, NULL, NULL),
(429, 21, 2, NULL, NULL),
(430, 22, 2, NULL, NULL),
(431, 23, 2, NULL, NULL),
(432, 24, 2, NULL, NULL),
(433, 25, 2, NULL, NULL),
(434, 26, 2, NULL, NULL),
(435, 27, 2, NULL, NULL),
(436, 28, 2, NULL, NULL),
(437, 29, 2, NULL, NULL),
(438, 30, 2, NULL, NULL),
(439, 31, 2, NULL, NULL),
(440, 32, 2, NULL, NULL),
(441, 33, 2, NULL, NULL),
(442, 34, 2, NULL, NULL),
(443, 35, 2, NULL, NULL),
(444, 36, 2, NULL, NULL),
(445, 37, 2, NULL, NULL),
(446, 38, 2, NULL, NULL),
(447, 39, 2, NULL, NULL),
(448, 40, 2, NULL, NULL),
(449, 41, 2, NULL, NULL),
(450, 42, 2, NULL, NULL),
(451, 43, 2, NULL, NULL),
(452, 44, 2, NULL, NULL),
(453, 45, 2, NULL, NULL),
(454, 46, 2, NULL, NULL),
(455, 47, 2, NULL, NULL),
(456, 48, 2, NULL, NULL),
(457, 49, 2, NULL, NULL),
(458, 50, 2, NULL, NULL),
(459, 51, 2, NULL, NULL),
(460, 52, 2, NULL, NULL),
(461, 53, 2, NULL, NULL),
(462, 54, 2, NULL, NULL),
(463, 55, 2, NULL, NULL),
(464, 56, 2, NULL, NULL),
(465, 57, 2, NULL, NULL),
(466, 58, 2, NULL, NULL),
(467, 59, 2, NULL, NULL),
(468, 60, 2, NULL, NULL),
(469, 61, 2, NULL, NULL),
(470, 62, 2, NULL, NULL),
(471, 63, 2, NULL, NULL),
(472, 64, 2, NULL, NULL),
(473, 65, 2, NULL, NULL),
(474, 1, 4, NULL, NULL),
(475, 2, 4, NULL, NULL),
(476, 3, 4, NULL, NULL),
(477, 4, 4, NULL, NULL),
(478, 5, 4, NULL, NULL),
(479, 6, 4, NULL, NULL),
(480, 7, 4, NULL, NULL),
(481, 8, 4, NULL, NULL),
(482, 9, 4, NULL, NULL),
(483, 10, 4, NULL, NULL),
(484, 11, 4, NULL, NULL),
(485, 1, 15, NULL, NULL),
(486, 2, 15, NULL, NULL),
(487, 3, 15, NULL, NULL),
(488, 4, 15, NULL, NULL),
(489, 5, 15, NULL, NULL),
(490, 6, 15, NULL, NULL),
(491, 7, 15, NULL, NULL),
(492, 8, 15, NULL, NULL),
(493, 9, 15, NULL, NULL),
(494, 10, 15, NULL, NULL),
(495, 11, 15, NULL, NULL),
(496, 12, 15, NULL, NULL),
(497, 13, 15, NULL, NULL),
(498, 14, 15, NULL, NULL),
(499, 15, 15, NULL, NULL),
(500, 16, 15, NULL, NULL),
(501, 17, 15, NULL, NULL),
(502, 18, 15, NULL, NULL),
(503, 19, 15, NULL, NULL),
(504, 20, 15, NULL, NULL),
(505, 21, 15, NULL, NULL),
(506, 22, 15, NULL, NULL),
(507, 23, 15, NULL, NULL),
(508, 24, 15, NULL, NULL),
(509, 25, 15, NULL, NULL),
(510, 26, 15, NULL, NULL),
(511, 27, 15, NULL, NULL),
(512, 28, 15, NULL, NULL),
(513, 29, 15, NULL, NULL),
(514, 30, 15, NULL, NULL),
(515, 31, 15, NULL, NULL),
(516, 32, 15, NULL, NULL),
(517, 33, 15, NULL, NULL),
(518, 34, 15, NULL, NULL),
(519, 35, 15, NULL, NULL),
(520, 36, 15, NULL, NULL),
(521, 37, 15, NULL, NULL),
(522, 38, 15, NULL, NULL),
(523, 39, 15, NULL, NULL),
(524, 40, 15, NULL, NULL),
(525, 41, 15, NULL, NULL),
(526, 42, 15, NULL, NULL),
(527, 43, 15, NULL, NULL),
(528, 44, 15, NULL, NULL),
(529, 45, 15, NULL, NULL),
(530, 46, 15, NULL, NULL),
(531, 47, 15, NULL, NULL),
(532, 48, 15, NULL, NULL),
(533, 49, 15, NULL, NULL),
(534, 50, 15, NULL, NULL),
(535, 51, 15, NULL, NULL),
(536, 52, 15, NULL, NULL),
(537, 53, 15, NULL, NULL),
(538, 54, 15, NULL, NULL),
(539, 55, 15, NULL, NULL),
(540, 56, 15, NULL, NULL),
(541, 57, 15, NULL, NULL),
(542, 58, 15, NULL, NULL),
(543, 59, 15, NULL, NULL),
(544, 60, 15, NULL, NULL),
(545, 61, 15, NULL, NULL),
(546, 62, 15, NULL, NULL),
(547, 63, 15, NULL, NULL),
(548, 64, 15, NULL, NULL),
(549, 65, 15, NULL, NULL),
(550, 1, 13, NULL, NULL),
(551, 2, 13, NULL, NULL),
(552, 3, 13, NULL, NULL),
(553, 4, 13, NULL, NULL),
(554, 5, 13, NULL, NULL),
(555, 6, 13, NULL, NULL),
(556, 7, 13, NULL, NULL),
(557, 8, 13, NULL, NULL),
(558, 9, 13, NULL, NULL),
(559, 10, 13, NULL, NULL),
(560, 11, 13, NULL, NULL),
(561, 12, 13, NULL, NULL),
(562, 13, 13, NULL, NULL),
(563, 14, 13, NULL, NULL),
(564, 15, 13, NULL, NULL),
(565, 16, 13, NULL, NULL),
(566, 17, 13, NULL, NULL),
(567, 18, 13, NULL, NULL),
(568, 19, 13, NULL, NULL),
(569, 20, 13, NULL, NULL),
(570, 21, 13, NULL, NULL),
(571, 22, 13, NULL, NULL),
(572, 23, 13, NULL, NULL),
(573, 24, 13, NULL, NULL),
(574, 25, 13, NULL, NULL),
(575, 26, 13, NULL, NULL),
(576, 27, 13, NULL, NULL),
(577, 28, 13, NULL, NULL),
(578, 29, 13, NULL, NULL),
(579, 30, 13, NULL, NULL),
(580, 31, 13, NULL, NULL),
(581, 32, 13, NULL, NULL),
(582, 33, 13, NULL, NULL),
(583, 34, 13, NULL, NULL),
(584, 35, 13, NULL, NULL),
(585, 36, 13, NULL, NULL),
(586, 37, 13, NULL, NULL),
(587, 38, 13, NULL, NULL),
(588, 39, 13, NULL, NULL),
(589, 40, 13, NULL, NULL),
(590, 41, 13, NULL, NULL),
(591, 42, 13, NULL, NULL),
(592, 43, 13, NULL, NULL),
(593, 44, 13, NULL, NULL),
(594, 45, 13, NULL, NULL),
(595, 46, 13, NULL, NULL),
(596, 47, 13, NULL, NULL),
(597, 48, 13, NULL, NULL),
(598, 49, 13, NULL, NULL),
(599, 50, 13, NULL, NULL),
(600, 51, 13, NULL, NULL),
(601, 52, 13, NULL, NULL),
(602, 53, 13, NULL, NULL),
(603, 54, 13, NULL, NULL),
(604, 55, 13, NULL, NULL),
(605, 56, 13, NULL, NULL),
(606, 57, 13, NULL, NULL),
(607, 58, 13, NULL, NULL),
(608, 59, 13, NULL, NULL),
(609, 60, 13, NULL, NULL),
(610, 61, 13, NULL, NULL),
(611, 62, 13, NULL, NULL),
(612, 63, 13, NULL, NULL),
(613, 64, 13, NULL, NULL),
(614, 65, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tresh_images`
--

CREATE TABLE `tresh_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tresh_images`
--

INSERT INTO `tresh_images` (`id`, `image_path`, `created_at`, `updated_at`) VALUES
(46, 'images/uploads/gproducts_img/cc982aeb33fb91c41fb73ff12551b45908031aa1w2.jpg', '2019-09-29 13:05:47', '2019-09-29 13:05:47'),
(47, 'images/uploads/gproducts_img/b7c5b92d3d57d064bccebb46cce71237b40783f9m3.jpg', '2019-09-29 13:53:55', '2019-09-29 13:53:55'),
(48, 'images/uploads/gproducts_img/7db2441576fc214255273d32261e1aa7e192aaf3Qj.jpg', '2019-09-29 13:58:37', '2019-09-29 13:58:37'),
(49, 'images/uploads/gproducts_img/29b2bcad1b604c7974b1c36dd7216eac93a7b024xl.png', '2019-09-29 13:58:58', '2019-09-29 13:58:58'),
(50, 'images/uploads/gproducts_img/29d2c7c0a959d5c4303950b1b1118058c5450605C4.jpg', '2019-09-29 17:31:06', '2019-09-29 17:31:06');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_at` date DEFAULT NULL,
  `town` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(189) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('male','famale') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_phone` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `notify_email` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `phone`, `photo`, `birth_at`, `town`, `discount`, `type`, `notify_phone`, `notify_email`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Тимур', 'Махинько', '+3 8(097)592-65-06', NULL, NULL, NULL, NULL, NULL, '0', '0', 'timortamerlan@gmail.com', NULL, '$2y$10$Q6NisvgaDO2STL7uvlMHlujpU7KQnwRu9iE76rRupJFp29wrvDbn2', 'f9g1SXUV24UFp2YqavCEcD6aJfcDyLTB9ekGdcyWEsc0NHvIKqaAMDSpKc6n', '2019-06-05 14:46:22', '2019-08-28 08:05:30'),
(2, 'Тимур', 'fdsfds', '+3 8(777)777-77-77', '/images/uploads/profile_img/a967a37b44218541abe8c1f6b3df321e5b0d436cfs.jpg', '1965-07-11', '852', 'xczxcz', 'famale', '0', '0', 'test@gmail.com', NULL, '$2y$10$dWkJlbz6sLPQRgxlEgNh6.b38ZQRSZHQLhzJpy0Cda3pFXVX5ZNKC', NULL, '2019-06-06 18:45:57', '2019-07-05 11:35:57'),
(6, 'Тимур', 'Менеджер', '+3 8(097)592-65-06', '/images/uploads/profile_img/052555476e46569f0bef27497711e0c3d2d3d6b68W.jpg', NULL, NULL, NULL, 'male', '0', '0', 'manager@gmail.com', NULL, '$2y$10$7SM6JyUHXh7nJXc8MM.XKugtFdnvjhcC/lyCPrkOmPC93scBDU.Z2', NULL, '2019-06-24 11:09:05', '2019-07-17 09:34:14'),
(7, 'Timur', 'Admin', '+3 8(097)592-65-06', '/images/uploads/profile_img/b8773e54fff47c9c0be4414c5482ed8ddadbf5c9UK.jpg', '1961-04-13', 'Запорожье', NULL, NULL, '0', '0', 'admin@gmail.com', NULL, '$2y$10$EfskWvkwAScmoeuf/mOcCOPuFXqbnsnd9hKdMDURn5Rvmryuk1zJO', NULL, '2019-06-24 11:17:45', '2019-08-09 11:17:07'),
(8, 'Yuliya', 'Tytomyr', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 'jtitomir@gmail.com', NULL, '$2y$10$.e11giNcstOk0MpCgZjCkO8fGVLWUwXbh4VD7gFFc.3GOISXtQTQm', 'dYdWNnB3sirjGTsiJf8WV4IbXhMSwQLyM4tkNvPae8EpgzrKOdxLbgHkPhRL', '2019-08-15 09:41:16', '2019-08-15 09:48:06'),
(11, 'Тимур', 'Махинько', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 'timortamerlan@gmail.com1', NULL, '$2y$10$yjeeZAWYgvknlnJxXziMIuU01R5iAuTi009VCQ7gnYn4rGy7h3Vei', NULL, '2019-08-28 12:43:49', '2019-08-28 12:43:49');

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 6, 2, NULL, NULL),
(4, 7, 1, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bthemes`
--
ALTER TABLE `bthemes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bthemes_alias_unique` (`alias`);

--
-- Индексы таблицы `btposts`
--
ALTER TABLE `btposts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `btposts_alias_unique` (`alias`),
  ADD KEY `btposts_btheme_id_foreign` (`btheme_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_alias_unique` (`alias`);

--
-- Индексы таблицы `content_home_mozaiks`
--
ALTER TABLE `content_home_mozaiks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `content_home_sliders`
--
ALTER TABLE `content_home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favorites_products`
--
ALTER TABLE `favorites_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_products_user_id_foreign` (`user_id`),
  ADD KEY `favorites_products_gproduct_id_foreign` (`gproduct_id`);

--
-- Индексы таблицы `gpimages`
--
ALTER TABLE `gpimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gpimages_gproduct_id_foreign` (`gproduct_id`);

--
-- Индексы таблицы `gpparams`
--
ALTER TABLE `gpparams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gpparams_param_id_foreign` (`param_id`),
  ADD KEY `gpparams_gproduct_id_foreign` (`gproduct_id`);

--
-- Индексы таблицы `gproducts`
--
ALTER TABLE `gproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gproducts_alias_unique` (`alias`),
  ADD UNIQUE KEY `gproducts_item_code_unique` (`item_code`),
  ADD KEY `gproducts_category_id_foreign` (`category_id`),
  ADD KEY `gproducts_subcategory_id_foreign` (`subcategory_id`);

--
-- Индексы таблицы `gpvalues`
--
ALTER TABLE `gpvalues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gpvalues_gproduct_id_foreign` (`gproduct_id`),
  ADD KEY `gpvalues_gpparam_id_foreign` (`gpparam_id`),
  ADD KEY `gpvalues_pvalue_id_foreign` (`pvalue_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `mailing_from_sites`
--
ALTER TABLE `mailing_from_sites`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `params`
--
ALTER TABLE `params`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `period_products`
--
ALTER TABLE `period_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`),
  ADD KEY `products_gproduct_id_foreign` (`gproduct_id`);

--
-- Индексы таблицы `pvalues`
--
ALTER TABLE `pvalues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pvalues_param_id_foreign` (`param_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_alias_unique` (`alias`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `subcategories_params`
--
ALTER TABLE `subcategories_params`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_params_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `subcategories_params_param_id_foreign` (`param_id`);

--
-- Индексы таблицы `tresh_images`
--
ALTER TABLE `tresh_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_roles_user_id_foreign` (`user_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bthemes`
--
ALTER TABLE `bthemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `btposts`
--
ALTER TABLE `btposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `content_home_mozaiks`
--
ALTER TABLE `content_home_mozaiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `content_home_sliders`
--
ALTER TABLE `content_home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `favorites_products`
--
ALTER TABLE `favorites_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `gpimages`
--
ALTER TABLE `gpimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `gpparams`
--
ALTER TABLE `gpparams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `gproducts`
--
ALTER TABLE `gproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `gpvalues`
--
ALTER TABLE `gpvalues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `mailing_from_sites`
--
ALTER TABLE `mailing_from_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `params`
--
ALTER TABLE `params`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `period_products`
--
ALTER TABLE `period_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `pvalues`
--
ALTER TABLE `pvalues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `subcategories_params`
--
ALTER TABLE `subcategories_params`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- AUTO_INCREMENT для таблицы `tresh_images`
--
ALTER TABLE `tresh_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `btposts`
--
ALTER TABLE `btposts`
  ADD CONSTRAINT `btposts_btheme_id_foreign` FOREIGN KEY (`btheme_id`) REFERENCES `bthemes` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favorites_products`
--
ALTER TABLE `favorites_products`
  ADD CONSTRAINT `favorites_products_gproduct_id_foreign` FOREIGN KEY (`gproduct_id`) REFERENCES `gproducts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gpimages`
--
ALTER TABLE `gpimages`
  ADD CONSTRAINT `gpimages_gproduct_id_foreign` FOREIGN KEY (`gproduct_id`) REFERENCES `gproducts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gpparams`
--
ALTER TABLE `gpparams`
  ADD CONSTRAINT `gpparams_gproduct_id_foreign` FOREIGN KEY (`gproduct_id`) REFERENCES `gproducts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gpparams_param_id_foreign` FOREIGN KEY (`param_id`) REFERENCES `params` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gproducts`
--
ALTER TABLE `gproducts`
  ADD CONSTRAINT `gproducts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gproducts_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gpvalues`
--
ALTER TABLE `gpvalues`
  ADD CONSTRAINT `gpvalues_gpparam_id_foreign` FOREIGN KEY (`gpparam_id`) REFERENCES `gpparams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gpvalues_gproduct_id_foreign` FOREIGN KEY (`gproduct_id`) REFERENCES `gproducts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gpvalues_pvalue_id_foreign` FOREIGN KEY (`pvalue_id`) REFERENCES `pvalues` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_gproduct_id_foreign` FOREIGN KEY (`gproduct_id`) REFERENCES `gproducts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pvalues`
--
ALTER TABLE `pvalues`
  ADD CONSTRAINT `pvalues_param_id_foreign` FOREIGN KEY (`param_id`) REFERENCES `params` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subcategories_params`
--
ALTER TABLE `subcategories_params`
  ADD CONSTRAINT `subcategories_params_param_id_foreign` FOREIGN KEY (`param_id`) REFERENCES `params` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcategories_params_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
