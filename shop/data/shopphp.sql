-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2021 г., 23:04
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shopphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `count` varchar(100) NOT NULL,
  `price` int DEFAULT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Телефоны'),
(2, 'Пылесосы'),
(3, 'Ноутбуки'),
(4, 'Политика'),
(5, 'Спорт'),
(6, 'Фрукты');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `view` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `category_id`, `view`) VALUES
(1, 'Voluptate molestiae sapiente qui cupiditate.', 'Corporis earum neque voluptatem hic incidunt eos vel. Porro repellendus non ut sunt ipsum. Voluptas nesciunt quisquam iste eum.', 1, 5),
(6, 'Aut optio non assumenda tenetur.', 'Ut occaecati ut aut exercitationem inventore sint. Id laboriosam natus ratione earum. Labore et sint in eum praesentium.', 1, 2),
(8, 'Voluptatem quo maxime ab adipisci fugit omnis voluptas.', 'Et assumenda velit rem aut reiciendis recusandae. Quasi repudiandae dolor sit sint. Molestiae et omnis quo minima quisquam voluptate rem. Asperiores praesentium delectus rerum est.', 3, 0),
(10, 'Maxime omnis ut vitae quia est suscipit animi.', 'Rerum illo magnam vero ipsa molestiae maiores iure. Laboriosam nisi aut totam est et ratione et. Et voluptatum nam et amet.', 5, 1),
(11, 'Occaecati necessitatibus repellat beatae exercitationem.', 'Dolores in id consequuntur beatae deleniti quia alias. Ut voluptatem modi aliquam modi fugit nobis. Magnam aspernatur aut odio sint.', 1, 0),
(12, 'Aliquam iusto possimus est sit non.', 'Voluptatem pariatur maxime quia voluptates officia reiciendis corporis. Aut quod eum similique ullam et. Consequatur temporibus ipsam consequatur aut voluptatem cupiditate inventore aut.', 2, 3),
(13, 'Qui praesentium qui provident.', 'Optio fuga eaque molestiae rerum. Ullam corrupti sint aut. Corporis perspiciatis perspiciatis reprehenderit omnis.', 3, 5),
(14, 'Accusantium aut ut quia aut iusto similique aspernatur.', 'At nihil fuga non animi exercitationem. Deleniti et fugiat error non. Harum numquam dignissimos odio consequatur.', 4, 2),
(15, 'Velit est officia animi doloribus.', 'Id aspernatur distinctio vero. Ea laudantium in velit iste reiciendis qui quidem veniam. Voluptatem nostrum vel qui ipsam ipsam id.', 5, 1),
(16, 'Tempore debitis reiciendis sit esse quia aliquid fugiat.', 'Consequatur soluta distinctio voluptatum sint magni repellendus. Doloremque omnis minima quo. Pariatur consectetur recusandae consectetur sunt. Qui vel sapiente qui atque.', 1, 0),
(17, 'Et aspernatur rerum et est earum provident explicabo.', 'Minus natus perferendis quibusdam ad suscipit. Deleniti reprehenderit vel quisquam odio qui fuga. Fuga voluptatem facilis et dolor. Qui non voluptatum laudantium et aut.', 2, 0),
(18, 'Dicta commodi autem voluptates sunt eius atque tenetur.', 'Veniam aut et doloribus modi neque necessitatibus eveniet tempore. Enim consectetur alias modi temporibus. Laborum totam aperiam id qui. Ut et magnam hic voluptas nam.', 3, 0),
(19, 'Eaque qui totam sunt optio sed.', 'Sequi nobis laudantium voluptatem quidem ducimus ullam qui velit. Omnis est assumenda error iure repudiandae fuga et autem. Facere maiores reiciendis ut excepturi. Omnis eveniet quia distinctio sed.', 4, 0),
(20, 'Odio facere illum repellat animi natus.', 'Quia nulla exercitationem sed laborum pariatur consequatur. Vero culpa exercitationem et et. Impedit et minima voluptatibus reprehenderit sed.', 5, 0),
(21, 'Natus ut enim vitae assumenda.', 'Voluptates libero cupiditate aut temporibus optio iste itaque sed. Alias impedit cupiditate molestias doloribus quis a ut. Nisi consequuntur accusantium voluptatem officiis corrupti.', 1, 2),
(22, 'Quo sint est aut earum cumque.', 'Ipsa quis sunt voluptates ut reiciendis. Quidem architecto est ut optio ipsa. Et sint voluptas excepturi ut qui facere accusantium et. Hic in inventore qui sunt.', 2, 0),
(23, 'Quam vel neque quis veritatis possimus laudantium.', 'Ratione adipisci ullam magnam accusamus ullam. Esse iste nesciunt vero dignissimos veniam cumque.', 3, 1),
(24, 'Et autem tempore libero enim excepturi possimus tempore.', 'Tempora odit est placeat sunt soluta aut cupiditate. Consequatur autem iste non est quia. Vero aut odit ut minima. Similique odit harum cumque.', 4, 0),
(25, 'Ea consequatur quis quisquam et.', 'Reprehenderit id optio eos nulla. Omnis enim debitis omnis nulla qui sequi. Dolor aut sed aspernatur. Assumenda recusandae et at qui. Quia asperiores consequuntur repellat aut sint libero distinctio.', 5, 0),
(26, 'Recusandae et dignissimos mollitia sed nisi.', 'Omnis cum vitae et. Perferendis ea quia voluptates est laudantium enim. Occaecati non delectus quam eaque omnis nesciunt animi. Totam iste iure consequatur explicabo ut illum.', 1, 0),
(27, 'Eum tempore et molestiae expedita tempore occaecati qui autem.', 'Aliquid mollitia eligendi explicabo eaque ut odit. Magnam laboriosam vel dicta dicta repellendus tempore. Alias perspiciatis id aut omnis quam sequi. Officia et quisquam modi voluptatem cum sunt.', 2, 0),
(28, 'Molestias unde aut consequatur iusto.', 'Nihil voluptatem autem voluptate totam. Ipsam maiores eaque sint quia vel voluptate. Est expedita accusamus quidem praesentium quo voluptatum.', 3, 0),
(29, 'Atque possimus ad voluptas pariatur libero.', 'Quod ab est eligendi et perferendis totam soluta. Quis quia omnis in sint labore nemo quaerat. Soluta voluptatem non quasi ad consequatur tenetur sit.', 4, 0),
(30, 'Explicabo eius quia sit ex porro voluptatum.', 'Est quo rerum hic excepturi. Provident perferendis dicta cupiditate et officia sit. Quia unde similique odio sunt.', 5, 0),
(31, 'Ullam illum vitae eum in libero assumenda.', 'Et sit aliquam temporibus cum. Aut et omnis quam. Quidem est voluptas aut perferendis voluptatem. Perspiciatis ducimus neque non iusto.', 1, 0),
(32, 'Ut ut esse et veniam et.', 'Quaerat placeat accusantium voluptatem blanditiis. Qui aut consequatur rerum. Nostrum non reprehenderit magnam ullam fugiat dolores. Eum sunt molestiae doloremque non in et a.', 2, 0),
(33, 'Qui itaque et eius est suscipit.', 'Illum quae non velit dolor. Alias id quaerat quod est iure omnis et. Non doloribus vero cupiditate ut.', 3, 0),
(34, 'Optio molestias nihil et vel modi.', 'Totam velit commodi voluptatem ut sit. Aspernatur a quisquam quis voluptatibus eligendi nostrum. Minima facilis ipsam quod est sit necessitatibus. Saepe minima cumque corporis qui doloremque.', 4, 0),
(35, 'Veritatis et qui rerum.', 'Excepturi in fuga laborum quasi deserunt et. At doloremque dolores et minima et incidunt officiis. Ullam vel dolores voluptatem autem fugit.', 5, 0),
(36, 'Tenetur sed aperiam possimus sit unde nisi excepturi.', 'Nihil vel alias dolores vel ducimus pariatur. Aut reprehenderit hic dolor in distinctio. Provident cupiditate et commodi officiis. Consequatur quidem soluta rerum sed.', 1, 0),
(37, 'Sequi earum iste tempore ullam.', 'Vel molestias voluptatem maxime sit qui est. Hic omnis doloribus tenetur quibusdam ducimus atque aut. Odit vel aut sint voluptates enim odit.', 2, 0),
(38, 'Voluptas aspernatur nihil consectetur voluptatem accusamus quis.', 'Perspiciatis impedit in non corporis enim aut. Omnis et beatae aut dolores error esse eaque. Error autem distinctio dicta dolor aliquid et aut ducimus.', 3, 0),
(39, 'Quaerat maiores quos neque impedit et ut qui.', 'Id sint at nihil voluptate alias voluptatem. Perferendis laboriosam sunt suscipit et. Eaque earum fugit dicta est qui ut quasi. Consequuntur sint accusantium dolorem.', 4, 0),
(40, 'Sunt facilis accusamus cum sequi saepe.', 'Veniam dignissimos sed repudiandae. Nobis corporis corporis beatae quaerat perspiciatis autem qui. Hic nisi quam asperiores fuga excepturi earum. Numquam distinctio unde soluta quia et nulla.', 5, 0),
(41, 'Itaque magnam sed eligendi aut.', 'Ut laudantium dolorem architecto aperiam. Culpa iure atque voluptas possimus autem. Aut qui perspiciatis est numquam ea occaecati. Cumque facilis soluta consequatur eum nesciunt earum.', 1, 0),
(42, 'Id soluta quaerat culpa.', 'Sit natus molestias culpa itaque nisi omnis nihil animi. Ipsa ut ut dolorem et aliquid minus. Rerum veritatis labore et et fugiat nisi quaerat. Sunt et magni suscipit laborum quia autem ex.', 2, 0),
(43, 'Quas ipsam vel aliquid molestiae fugit qui sint occaecati.', 'Consequatur consequatur sed omnis nisi consequatur nobis animi. Eos dolores voluptate quos occaecati earum aspernatur perspiciatis. Tempore nihil est repudiandae qui.', 3, 0),
(44, 'Non dolores quasi quae iste eum.', 'Cumque in ducimus sequi rem velit dolorem. Ipsam similique commodi possimus ad mollitia. Sequi et suscipit deleniti possimus ut eum. Voluptas aut id qui illo eos incidunt.', 4, 0),
(45, 'Laudantium sed accusamus praesentium.', 'Laborum debitis error et. Nihil laboriosam aut impedit quia accusantium aut exercitationem.', 5, 0),
(46, 'Corrupti nisi sed laboriosam perferendis.', 'Et est voluptatum labore aut aperiam quia. Nihil molestiae corrupti et odit. Quis dolor reiciendis dolorem fugiat eligendi tempore ex.', 1, 0),
(47, 'Ipsam rerum provident excepturi cupiditate nostrum mollitia.', 'Dolores voluptatem doloremque veritatis nam. Qui similique labore architecto accusamus quisquam nisi doloribus. Explicabo quisquam quod facere illum voluptas.', 2, 0),
(48, 'Ut similique delectus quia consequatur aliquid accusantium veritatis.', 'Qui sed qui unde accusamus quo quo enim. Rem nostrum voluptatem magnam qui asperiores in. Officia excepturi aperiam labore est mollitia et.', 3, 0),
(49, 'Qui et ab excepturi explicabo.', 'Nihil nihil nisi deserunt ut mollitia enim. Ut amet accusamus maxime sint minus.', 4, 0),
(50, 'Quidem consequatur nulla et eveniet in odit quia delectus.', 'Impedit consectetur a molestias dolorum aspernatur explicabo enim. Aliquam cupiditate placeat eius sapiente. Voluptatibus est quasi quis et. Facilis rerum temporibus omnis dolore nobis harum.', 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text,
  `phone` text NOT NULL,
  `session_id` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `href` text,
  `size` bigint DEFAULT NULL,
  `view` bigint DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `title`, `href`, `size`, `view`, `created_at`) VALUES
(1, 'Озеро в лесу', 'wallhaven-1jyy51.jpg', 4378079, 4, '2021-05-05 05:40:58'),
(2, 'Луна', 'wallhaven-2e7voy.jpg', 1600191, 5, '2021-02-06 16:08:29'),
(3, 'Горы и небо', 'wallhaven-2e8eoy.jpg', 3488313, 2, '2012-04-15 23:52:12'),
(4, 'Водопад и гора', 'wallhaven-2e85jx.jpg', 3715553, 2, '2021-02-08 23:53:04'),
(5, 'Степь и небо', 'wallhaven-2em116.jpg', 3393963, 2, '2021-03-05 13:04:20'),
(6, 'Озеро в ущелье', 'wallhaven-2ex38g.jpg', 4635720, 2, '2021-05-12 15:11:25'),
(7, 'Старый замок в горах', 'wallhaven-5w9d23.jpg', 3066504, 1, '2021-04-24 11:45:13'),
(8, 'Песочная дюна', 'wallhaven-5wqpd1.jpg', 2758006, 2, '2021-01-14 04:24:44'),
(9, 'Над облаками', 'wallhaven-5wvme1.jpg', 2194075, 0, '2021-04-20 18:31:26'),
(10, 'Долина гор', 'wallhaven-5wxvr5.jpg', 1377051, 1, '2021-05-26 08:18:51'),
(11, 'Мост у озера', 'wallhaven-6k1d6l.jpg', 2913866, 0, '2021-02-24 20:57:19'),
(12, 'Город и горы', 'wallhaven-39zre9.jpg', 2954062, 1, '2021-03-14 09:16:33');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `article` bigint UNSIGNED NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` bigint DEFAULT NULL,
  `weight` varchar(20) NOT NULL DEFAULT '0',
  `count` bigint DEFAULT NULL,
  `units` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL DEFAULT '6',
  `json_product` json DEFAULT NULL,
  `image` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `article`, `description`, `price`, `weight`, `count`, `units`, `category_id`, `json_product`, `image`, `created_at`) VALUES
(1, 'Авокадо', 0, 'Авокадо — это плод дерева, которое по-научному называется Persea americana (Персея американская). Оно ценится за высокую питательность и насыщенную текстуру [1]. Авокадо очень популярно у сторонников здорового питания, его часто называют суперфудом из-за полезных свойств [2]. Известно несколько разновидностей авокадо, различаемых по форме, цвету, вкусовым качествам и весу (200 г — 1,4 кг). Родина авокадо — Центральная Америка и Мексика. Часто путаются с определением авокадо: по внешнему виду плод напоминает орех, по химическому составу и вкусовым качествам — овощ, однако авокадо считается фруктом.', 63, '0', 11, 'шт', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/avokado.jpg', '2021-06-10 00:36:28'),
(2, 'Арбуз', 0, 'Арбуз – один из любимых продуктов детей и многих взрослых. Но не все знают, как назвать эти сочные и сладкие плоды правильно. Чтобы выяснить, арбуз – это фрукт или все-таки ягода, для начала надо разобраться, что означают эти понятия.', 17, '0', 12, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/arb.png', '2021-06-09 23:45:24'),
(3, 'Айва', 0, 'Если верить гомеровским писаниям, то айва или квитовое яблоко – это верховный фрукт в саду Гесперид. Именно там, в палисаднике персонажей древнегреческой мифологии, росли деревья с золотыми плодами. Выращивать айву начали примерно 2600 лет назад, следовательно, она является самой старой сельскохозяйственной культурой.', 120, '0', 6, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/ayva.jpg', '2021-06-09 22:06:26'),
(4, 'Абрикос', 0, 'Абрикос – это листопадное дерево, входящее в семейство розовые. В высоту растение достигает 5-8 метров, ствол покрыт серо-бурой корой. Максимальный возраст деревьев 100 лет. Активно плодоносит в промежутке с 3 до 40 лет. Существуют дикая и одомашненная форма растения. Дикий абрикос сохранился только в Гималаях, горных районах Тянь-Шаня, Северного Кавказа.', 72, '0', 7, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/abrikos.jpg', '2021-06-09 19:31:15'),
(5, 'Ананас', 0, 'Ананас – это плод многолетнего травянистого растения, родиной которого считается Южная Америка, именно там и его и обнаружил Христофор Колумб. Со временем культура распространилась по близлежащим континентам и в настоящее время культивируется во множестве стран: Австралия, Индия, Южная Америка, Филиппины и Гавайские острова.', 95, '0', 8, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/pine.jpg', '2021-06-09 19:31:15'),
(6, 'Ананас GOLD', 0, 'Ананас Голд — это тропический фрукт, выращиваемый в теплых странах Южной Америки, Азии, Африки и по внешнему виду напоминающий большую шишку. Внутри нее скрывается желтая или золотая мякоть, которая отличается сочностью, сахарной сладостью и незабываемым ароматом.', 529, '0', 12, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/anagold.jpg', '2021-06-09 19:31:15'),
(7, 'Апельсины', 0, 'Апельсины – это цитрусовые круглой формы, диаметром 5-10 сантиметров. Они имеют бугристую оранжевую кожуру, мясистую мякоть оранжевого цвета и косточки. Вкус зависит от сорта и меняется от сладкого до горького.', 68, '0', 0, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/ap.jpg', '2021-06-09 23:52:29'),
(8, 'Бананы', 0, 'Бананы – это экзотические плоды эллиптической формы с кремообразной мякотью, покрытой плотной несъедобной кожурой. Банановое дерево может вырастать от 3 до 6 м в высоту. Плоды формируются группами по 50—150 штук, которые объединяются в кластеры по 10—25 штук.', 73, '0', 18, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/ban.jpg', '2021-06-09 19:31:15'),
(9, 'Виноград белый', 0, 'Несмотря на название, под белым виноградом подразумеваются сорта, дающие урожай белых, зеленых и желтых плодов. Желтая и зеленая разновидности относятся к белому винограду, считаясь его подвидами. Белый виноград может быть разделен на две большие группы – столовую и техническую. Первая группа пригодна для употребления в пищу в свежем виде, вторая предназначается для переработки с целью приготовления вин и других продуктов. Существуют универсальные сорта, да и большинство столовых сортов вполне может выступить в роли сырья. В свою очередь, ягоды технических сортов в своей основной массе могут употребляться в пищу свежими. Однако специалисты предпочитают разделять эти две группы.', 102, '0', 8, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/vin.jpg', '2021-06-09 19:31:15'),
(10, 'Виноград Red Glode', 0, 'Один из наиболее выращиваемых по всему миру сортов винограда Ред Глоб высоко оценен и селекционерами, и обычными покупателями. Эффектный вид гроздей, приятное освежающее сочетание сладости и кислоты в ягодах, узнаваемый оттенок кожицы — все это делает его привлекательным для выращивания. А также виноград встречается под названиями Красный Глобус, Красная Земля, Глобо Ройо, Роуз ЛТО. В России сорт выращивается в южных регионах, поскольку он очень теплолюбив. В США культивируется в климатической зоне Калифорнии и других южных штатов. Распространен в Китае и Японии, в Латинской Америке.', 96, '0', 33, 'кг', 6, NULL, 'https://raw.githubusercontent.com/efrem005/json/master/responses/img/rg.jpg', '2021-06-09 22:02:31');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user`, `text`, `product_id`, `created_at`) VALUES
(25, 'Николай', '123', 7, '2021-06-10 00:05:02'),
(26, 'Николай', 'Проверка', 3, '2021-06-10 00:14:33'),
(27, 'Николай', 'Арбуз класс!!!', 2, '2021-06-10 00:49:35'),
(28, 'Николай', 'Оооо бананы', 8, '2021-06-10 01:16:19'),
(29, 'Николай', 'Виноград Существуют универсальные сорта', 9, '2021-06-10 01:16:52');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `role` int NOT NULL DEFAULT '0',
  `fast_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `role`, `fast_name`) VALUES
(1, 'mr.Bin', '$2y$10$AaUuMOPTMSsmMCjJ4sGwgOG7V.DNIecSEhr0er46673whpCMaX2dW', '', 0, 'Bin'),
(2, 'Admin', '$2y$10$AaUuMOPTMSsmMCjJ4sGwgOG7V.DNIecSEhr0er46673whpCMaX2dW', '111546843160c2544f0dbf86.48878003', 1, 'Admin'),
(3, 'efrem', '$2y$10$86saABnS0YxGtRpcgAvs9uqHXo.jknTt9d/JfS/SF8PhDwBT0zxKO', NULL, 0, 'Николай'),
(4, 'strela_24', '$2y$10$olmdywJomCpVUBu8NnFAGOd4PTjvxWM9QL3RZ/vjny5RIwjd3kvGG', '195716863160c26488bddfa4.50638803', 0, 'Анастасия');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `basket_ibfk_2` (`product_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`,`title`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_category_id` (`category_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `reviews_ibfk_1` (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `login` (`login`,`pass`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
