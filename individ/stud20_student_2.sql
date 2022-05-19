-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 19 2022 г., 12:53
-- Версия сервера: 10.2.12-MariaDB
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `stud20_student_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `date`, `content`, `title`, `img`, `name`, `parent`, `guid`) VALUES
(1, '2021-06-04 21:00:00', 'CSS — формальный язык описания внешнего вида документа (веб-страницы), написанного с использованием языка разметки (чаще всего HTML или XHTML). Также может применяться к любым XML-документам, например, к SVG или XUL.\r\n<h1>Использование CSS</h1>\r\n<p>CSS используется создателями веб-страниц для задания цветов, шрифтов, стилей, расположения отдельных блоков и других аспектов представления внешнего вида этих веб-страниц. Основной целью разработки CSS является ограждение и отделение описания логической структуры веб-страницы (которое производится с помощью HTML или других языков разметки) от описания внешнего вида этой веб-страницы (которое теперь производится с помощью формального языка CSS). Такое разделение может увеличить доступность документа, предоставить большую гибкость и возможность управления его представлением, а также уменьшить сложность и повторяемость в структурном содержимом.\r\n\r\nКроме того, CSS позволяет представлять один и тот же документ в различных стилях или методах вывода, таких как экранное представление, печатное представление, чтение голосом (специальным голосовым браузером или программой чтения с экрана) или при выводе устройствами, использующими шрифт Брайля</p>\r\n', 'css', '', 'neobychnye-muzei-mira', 0, ''),
(2, '2021-06-04 21:00:00', 'Правила CSS могут располагаться как в самом веб-документе, внешний вид которого они описывают, так и во внешних файлах, имеющих расширение .css. Формат CSS — это текстовый файл, в котором содержится перечень правил CSS и комментариев к ним.\r\nСтили CSS могут быть подключены или внедрены в описываемый ими веб-документ четырьмя способами:\r\nПравила CSS могут располагаться как в самом веб-документе, внешний вид которого они описывают, так и во внешних файлах, имеющих расширение .css. Формат CSS — это текстовый файл, в котором содержится перечень правил CSS и комментариев к ним.\r\nСтили CSS могут быть подключены или внедрены в описываемый ими веб-документ четырьмя способами:\r\n\r\nкогда описание стилей находится в отдельном файле, оно может быть подключено к документу посредством элемента <link>, включённого в элемент <head>:\r\n\r\nкогда файл стилей размещается отдельно от родительского документа, он может быть подключён к документу инструкцией @import в элементе<style>:\r\n\r\nкогда стили описаны внутри документа, они могут быть включены в элемент <style>, который, включается в элемент <head>:\r\n\r\n\r\nкогда стили описаны в теле документа, они могут располагаться в атрибутах отдельного элемента\r\n', 'Способы подключения CSS к документу', 'css1.jpg', 'muzej-karet-lissabon', 1, 'https://ru.wikipedia.org/wiki/CSS'),
(3, '2021-06-04 21:00:00', 'Применение CSS к документам HTML основано на принципах наследования и каскадирования. Принцип наследования заключается в том, что свойства CSS, объявленные для элементов-предков, почти всегда наследуются элементами-потомками.\r\n\r\nПринцип каскадирования применяется в случае, когда какому-то элементу HTML одновременно поставлено в соответствие более одного правила CSS, то есть, когда происходит конфликт значений этих правил. Чтобы разрешить такие конфликты, вводятся правила приоритета.\r\n\r\nНаиболее низким приоритетом обладает стиль браузера;\r\nСледующим по значимости является стиль, заданный пользователем браузера в его настройках;\r\nИ наиболее высоким приоритетом обладает стиль, заданный непосредственно автором страницы. И далее, уже в этом авторском стиле приоритеты расставляются следующим образом:\r\nСамым низким приоритетом обладают стили, наследуемые в документе элементом от своих предков;\r\nБолее высоким приоритетом обладают стили, заданные во внешних таблицах стилей, подключённых к документу;\r\nЕщё более высоким приоритетом обладают стили, заданные непосредственно селекторами всех десяти видов (см. подраздел \"виды селекторов\"), содержащимися в контейнерах style данного документа. Нередки случаи, когда к какому-нибудь элементу имеют отношение, задают его вид, несколько таких селекторов. Такие конфликты между ними разрешаются с помощью расчёта специфичности каждого такого селектора и применения этих селекторов к данному элементу в порядке убывания их специфичностей. Расчёт специфичности будет описан ниже.\r\nСпецифичность селекторов делится на 4 группы — a, b, c, d:\r\nесли стиль встроенный (определён как style=\"...\", то а=1, иначе a=0) ;\r\nзначение b равно количеству идентификаторов (иначе — id=\" \", они начинаются с #) в селекторе;\r\nзначение c равно количеству классов (class=\" \", они начинаются с .), псевдоклассов (они начинаются с :, например a:hover) и селекторов атрибутов (input[type=\"text\");\r\nзначение d равно количеству селекторов типов элементов (h1 { color: blue; }) и псевдокод-элементов (p::first-line { color: blue; }). После этого полученное значение приводится к числу (обычно в десятичной системе счисления). Селектор, обладающий большим значением специфичности, обладает и большим приоритетом.\r\nТаблица расчёта специфичности:', 'Наследование. Каскадирование. Приоритеты стилей CSS.', 'css2.jpg', 'muzej-tanca-stokgolm-shveciya', 1, 'https://ru.wikipedia.org/wiki/CSS'),
(4, '2021-06-04 21:00:00', 'До появления CSS оформление веб-страниц осуществлялось исключительно средствами HTML, непосредственно внутри содержимого документа. Однако с появлением CSS стало возможным принципиальное разделение содержания и представления документа. За счёт этого нововведения стало возможным лёгкое применение единого стиля оформления для массы схожих документов, а также быстрое изменение этого оформления.\r\n\r\nПреимущества:\r\n\r\nНесколько дизайнов страницы для разных устройств просмотра. Например, на экране дизайн будет рассчитан на большую ширину, во время печати меню не будет выводиться, а на КПК и сотовом телефоне меню будет следовать за содержимым.\r\nУменьшение времени загрузки страниц сайта за счёт переноса правил представления данных в отдельный CSS-файл. В этом случае браузер загружает только структуру документа и данные, хранимые на странице, а представление этих данных загружается браузером только один раз и может быть закэшировано.\r\nПростота последующего изменения дизайна. Не нужно править каждую страницу, а достаточно лишь изменить CSS-файл.\r\nДополнительные возможности оформления. Например, с помощью CSS-вёрстки можно сделать блок текста, который остальной текст будет обтекать (например для меню) или сделать так, чтобы меню было всегда видно при прокрутке страницы.\r\nНедостатки:\r\n\r\nРазличное отображение вёрстки в различных браузерах (особенно устаревших), которые по-разному интерпретируют одни и те же данные CSS.\r\nЧасто встречающаяся необходимость на практике исправлять не только один CSS-файл, но и теги HTML, которые сложным и ненаглядным способом связаны с селекторами CSS, что иногда сводит на нет простоту применения единых файлов стилей и значительно увеличивает время редактирования и тестирования.', 'CSS-вёрстка', 'css3.jpg', 'muzei-zhivyh-babochek-v-sankt-peterburge', 1, 'https://ru.wikipedia.org/wiki/CSS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;