-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Ara 2022, 11:07:45
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sites`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `status`, `username`, `password`, `lastLogin`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$SKtdD/0kYYJr9mh2KRhJfujuFSWOq.c9ZCBcOWhYMmMUx3RJe2ZhW', '2022-12-15 12:32:59', NULL, NULL, NULL, '2022-12-15 09:32:59'),
(5, 2, 'user', '$2y$10$.GFPO11OJqnE7kUEXPjNZujVAKtmc/LC18XlKBtnyU.EZ4BWwb4gO', '2022-12-12 23:17:53', '2022-12-12 23:17:37', 1, '2022-12-12 20:17:37', '2022-12-12 20:17:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `link_en` text DEFAULT NULL,
  `link_de` text DEFAULT NULL,
  `link_ru` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_de` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  `keywords_en` text DEFAULT NULL,
  `keywords_de` text DEFAULT NULL,
  `keywords_ru` text DEFAULT NULL,
  `content_en` text DEFAULT NULL,
  `content_de` text DEFAULT NULL,
  `content_ru` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `status`, `title_en`, `title_de`, `title_ru`, `link_en`, `link_de`, `link_ru`, `description_en`, `description_de`, `description_ru`, `keywords_en`, `keywords_de`, `keywords_ru`, `content_en`, `content_de`, `content_ru`, `image`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'Why Do We Use Lorem Ipsum?', 'Das generierte Lorem Ipsum', 'Почему мы используем Lorem Ipsum?', 'why-do-we-use-lorem-ipsum', 'das-generierte-lorem-ipsum', 'pocemu-my-ispolzuem-lorem-ipsum', 'Why Do We Use Lorem Ipsum?', 'Das generierte Lorem Ipsum', 'Почему мы используем Lorem Ipsum?', 'Why Do We Use Lorem Ipsum?', 'Das generierte Lorem Ipsum', 'Почему мы используем Lorem Ipsum?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p><p>Где я могу его достать?<br>Есть много вариаций отрывков из Лорем Ипсум. Но подавляющее большинство из них были изменены путем добавления юмора или добавления случайных слов. Если вы собираетесь использовать фрагмент дека Ipsum, вам необходимо убедиться, что между текстом не скрыты какие-либо смущающие слова. Все генераторы Lorem Ipsum в Интернете повторяют заранее определенные блоки текста. Это, в свою очередь, делает этот генератор настоящим генератором Lorem Ipsum в Интернете. Этот генератор использует словарь, содержащий более 200 латинских слов и их структуру предложений. Таким образом, созданные тексты Lorem Ipsum далеки от повторений, юмора и нехарактерной лексики.</p>', '1gSuPO4Ywv.jpg', '2022-12-21 13:00:15', 1, '2022-12-15 10:40:14', '2022-12-21 10:00:15'),
(2, 1, 'What is Lorem Ipsum?', 'Wo kommt es her?', 'Что такое Лорем Ипсум?', 'what-is-lorem-ipsum', 'wo-kommt-es-her', 'cto-takoe-lorem-ipsum', 'What is Lorem Ipsum?', 'Wo kommt es her?', 'Что такое Лорем Ипсум?', 'What is Lorem Ipsum?', 'Wo kommt es her?', 'Что такое Лорем Ипсум?', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Why do we use Lorem Ipsum?<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Lorem Ipsum - это небольшие тексты, используемые в наборной и полиграфической промышленности. Лорем Ипсум использовался в качестве отраслевого стандарта для подделок текстов с 1500-х годов, когда неназванный печатник смешал его, взяв галерею шрифтов, чтобы создать книгу образцов хуруфата. Он не только просуществовал пятьсот лет, но и практически без изменений превратился в электронный верстак. Он стал популярным в 1960-х годах с публикацией листов Letraset, содержащих отрывки из Lorem Ipsum, а в последнее время с настольным издательским программным обеспечением, содержащим версии Lorem Ipsum, таким как Aldus PageMaker.</p><p>Зачем мы его используем?<br>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p>', '3TK9hEqDxZ.jpg', '2022-12-21 13:00:06', 1, '2022-12-15 10:40:35', '2022-12-21 10:00:06'),
(3, 1, 'Where Can I Find Lorem Ipsum?', 'Leser vom Text abgelenkt wird', 'Где я могу найти Лорема Ипсума?', 'where-can-i-find-lorem-ipsum', 'leser-vom-text-abgelenkt-wird', 'gde-ia-mogu-naiti-lorema-ipsuma', 'Where Can I Find Lorem Ipsum?', 'Leser vom Text abgelenkt wird', 'Где я могу найти Лорема Ипсума?', 'Where Can I Find Lorem Ipsum?', 'Leser vom Text abgelenkt wird', 'Где я могу найти Лорема Ипсума?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Lorem Ipsum - это небольшие тексты, используемые в наборной и полиграфической промышленности. Лорем Ипсум использовался в качестве отраслевого стандарта для подделок текстов с 1500-х годов, когда неназванный печатник смешал его, взяв галерею шрифтов, чтобы создать книгу образцов хуруфата. Он не только просуществовал пятьсот лет, но и практически без изменений превратился в электронный верстак. Он стал популярным в 1960-х годах с публикацией листов Letraset, содержащих отрывки из Lorem Ipsum, а в последнее время с настольным издательским программным обеспечением, содержащим версии Lorem Ipsum, таким как Aldus PageMaker.</p><p>Зачем мы его используем?<br>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p>', 'is8TR3wCEI.jpg', '2022-12-21 12:59:53', 1, '2022-12-15 10:41:13', '2022-12-21 09:59:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `link_en` text DEFAULT NULL,
  `link_de` text DEFAULT NULL,
  `link_ru` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_de` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  `keywords_en` text DEFAULT NULL,
  `keywords_de` text DEFAULT NULL,
  `keywords_ru` text DEFAULT NULL,
  `content_en` text DEFAULT NULL,
  `content_de` text DEFAULT NULL,
  `content_ru` text DEFAULT NULL,
  `coverImage` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `status`, `title_en`, `title_de`, `title_ru`, `link_en`, `link_de`, `link_ru`, `description_en`, `description_de`, `description_ru`, `keywords_en`, `keywords_de`, `keywords_ru`, `content_en`, `content_de`, `content_ru`, `coverImage`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is Lorem Ipsum?', 'Was ist Lorem Ipsum?', 'Что такое Лорем Ипсум?', 'what-is-lorem-ipsum', 'was-ist-lorem-ipsum', 'cto-takoe-lorem-ipsum', 'What is Lorem Ipsum?', 'Was ist Lorem Ipsum?', 'Что такое Лорем Ипсум?', 'What is Lorem Ipsum?', 'Was ist Lorem Ipsum?', 'Что такое Лорем Ипсум?', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Why do we use Lorem Ipsum?<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where does Lorem Ipsum come from?<br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '<p>Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll Wörter nahm und diese durcheinander warf um ein Musterbuch zu erstellen. Es hat nicht nur 5 Jahrhunderte überlebt, sondern auch in Spruch in die elektronische Schriftbearbeitung geschafft (bemerke, nahezu unverändert). Bekannt wurde es 1960, mit dem erscheinen von \"Letraset\", welches Passagen von Lorem Ipsum enhielt, so wie Desktop Software wie \"Aldus PageMaker\" - ebenfalls mit Lorem Ipsum.</p><p>Warum nutzen wir es?<br>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p>', '<p>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p>', 'dm4USrR0jh.jpg', '2022-12-21 12:52:48', 1, '2022-12-15 09:56:22', '2022-12-21 09:52:48'),
(2, 1, 'Why Do We Use Lorem Ipsum?', 'Wo kommt es her?', 'Почему мы используем Lorem Ipsum?', 'why-do-we-use-lorem-ipsum', 'wo-kommt-es-her', 'pocemu-my-ispolzuem-lorem-ipsum', 'Why Do We Use Lorem Ipsum?', 'Wo kommt es her?', 'Почему мы используем Lorem Ipsum?', 'Why Do We Use Lorem Ipsum?', 'Wo kommt es her?', 'Почему мы используем Lorem Ipsum?', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where does Lorem Ipsum come from?<br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p>', '<p>Lorem Ipsum - это небольшие тексты, используемые в наборной и полиграфической промышленности. Лорем Ипсум использовался в качестве отраслевого стандарта для подделок текстов с 1500-х годов, когда неназванный печатник смешал его, взяв галерею шрифтов, чтобы создать книгу образцов хуруфата. Он не только просуществовал пятьсот лет, но и практически без изменений превратился в электронный верстак. Он стал популярным в 1960-х годах с публикацией листов Letraset, содержащих отрывки из Lorem Ipsum, а в последнее время с настольным издательским программным обеспечением, содержащим версии Lorem Ipsum, таким как Aldus PageMaker.</p><p>Зачем мы его используем?<br>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на с</p>', 'U5hDIbwfq3.jpg', '2022-12-21 12:53:09', 1, '2022-12-15 09:56:50', '2022-12-21 09:53:09'),
(3, 1, 'Where Does Lorem Ipsum Come From?', 'Wo kann ich es kriegen?', 'Откуда взялся Лорем Ипсум?', 'where-does-lorem-ipsum-come-from', 'wo-kann-ich-es-kriegen', 'otkuda-vzialsia-lorem-ipsum', 'Where Does Lorem Ipsum Come From?', 'Wo kann ich es kriegen?', 'Откуда взялся Лорем Ипсум?', 'Where Does Lorem Ipsum Come From?', 'Wo kann ich es kriegen?', 'Откуда взялся Лорем Ипсум?', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Why do we use Lorem Ipsum?<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where does Lorem Ipsum come from?<br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '<p>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Lorem Ipsum - это небольшие тексты, используемые в наборной и полиграфической промышленности. Лорем Ипсум использовался в качестве отраслевого стандарта для подделок текстов с 1500-х годов, когда неназванный печатник смешал его, взяв галерею шрифтов, чтобы создать книгу образцов хуруфата. Он не только просуществовал пятьсот лет, но и практически без изменений превратился в электронный верстак. Он стал популярным в 1960-х годах с публикацией листов Letraset, содержащих отрывки из Lorem Ipsum, а в последнее время с настольным издательским программным обеспечением, содержащим версии Lorem Ipsum, таким как Aldus PageMaker.</p><p>Зачем мы его используем?<br>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на с</p>', 'WKbBqAkG27.jpg', '2022-12-21 12:53:26', 1, '2022-12-15 09:57:17', '2022-12-21 09:53:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_images`
--

CREATE TABLE `category_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `cover` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `category_images`
--

INSERT INTO `category_images` (`id`, `status`, `categoryId`, `cover`, `image`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '4yNdCbneQR.jpg', '2022-12-15 12:56:22', 1, '2022-12-15 09:56:22', '2022-12-15 09:56:22'),
(2, 1, 1, 1, 'dm4USrR0jh.jpg', '2022-12-15 12:56:25', 1, '2022-12-15 09:56:22', '2022-12-15 09:56:25'),
(3, 1, 2, 1, 'U5hDIbwfq3.jpg', '2022-12-15 12:56:54', 1, '2022-12-15 09:56:50', '2022-12-15 09:56:54'),
(4, 1, 2, 0, 'lUF1dnHUkX.jpg', '2022-12-15 12:56:50', 1, '2022-12-15 09:56:50', '2022-12-15 09:56:50'),
(5, 1, 2, 0, 'Yps8AtJqQx.jpg', '2022-12-15 12:56:50', 1, '2022-12-15 09:56:50', '2022-12-15 09:56:50'),
(6, 1, 3, 0, 'wbRMPtnX1Y.jpg', '2022-12-15 12:57:17', 1, '2022-12-15 09:57:17', '2022-12-15 09:57:17'),
(7, 1, 3, 1, 'WKbBqAkG27.jpg', '2022-12-15 12:57:22', 1, '2022-12-15 09:57:17', '2022-12-15 09:57:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `whatsapp` varchar(150) DEFAULT NULL,
  `whatsappButton` int(11) DEFAULT NULL,
  `phone1` varchar(150) DEFAULT NULL,
  `phone2` varchar(150) DEFAULT NULL,
  `mail1` varchar(150) DEFAULT NULL,
  `mail2` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `tumblr` text DEFAULT NULL,
  `reddit` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `status`, `whatsapp`, `whatsappButton`, `phone1`, `phone2`, `mail1`, `mail2`, `address`, `location`, `facebook`, `instagram`, `twitter`, `pinterest`, `linkedin`, `youtube`, `tumblr`, `reddit`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, '0222 222 222 22', 1, '0222 222 222 22', '0222 222 222 22', 'mail@mail.com', 'mail@mail.com', 'Antalya', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d204203.91479233315!2d30.578020565177265!3d36.897855327118855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c39aaeddadadc1%3A0x95c69f73f9e32e33!2sAntalya!5e0!3m2!1str!2str!4v1670960548637!5m2!1str!2str', 'http://localhost', 'http://localhost', 'http://localhost', 'http://localhost', 'http://localhost', 'http://localhost', 'http://localhost', 'http://localhost', NULL, NULL, NULL, '2022-12-13 19:44:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `debt` decimal(10,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `status`, `name`, `phone`, `mail`, `paid`, `debt`, `note`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test Customer', '0222 222 222 22', 'mail@mail.com', NULL, NULL, '<p>test customer</p>', '2022-12-21 12:56:32', 1, '2022-12-15 10:15:13', '2022-12-21 09:56:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_debts`
--

CREATE TABLE `customer_debts` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `debt` decimal(10,2) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `debtDate` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customer_debts`
--

INSERT INTO `customer_debts` (`id`, `status`, `customerId`, `debt`, `title`, `currency`, `debtDate`, `note`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '515.00', 'Where Does Lorem Ipsum Come From? added due to product sale', '₺', '2022-12-15 13:15:30', 'test customer', '2022-12-15 13:15:30', 1, '2022-12-15 10:15:30', '2022-12-15 10:15:30'),
(2, 1, 1, '50.00', NULL, '₺', '2022-12-15 13:15:52', 'test debt', '2022-12-15 13:15:52', 1, '2022-12-15 10:15:52', '2022-12-15 10:15:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_payments`
--

CREATE TABLE `customer_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `paymentDate` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customer_payments`
--

INSERT INTO `customer_payments` (`id`, `status`, `customerId`, `payment`, `title`, `currency`, `paymentDate`, `note`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '250.00', 'Lorem Ipsum Nereden Gelir? ürün satışından dolayı eklendi', '₺', '2022-12-15 13:15:30', 'test satışı', '2022-12-15 13:15:30', 1, '2022-12-15 10:15:30', '2022-12-15 10:15:30'),
(2, 1, 1, '20.00', NULL, '₺', '2022-12-15 13:15:41', 'test ödemesi', '2022-12-15 13:15:41', 1, '2022-12-15 10:15:41', '2022-12-15 10:15:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_sales`
--

CREATE TABLE `customer_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discountedPrice` decimal(10,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `finalPrice` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `debt` decimal(10,2) DEFAULT NULL,
  `saleDate` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customer_sales`
--

INSERT INTO `customer_sales` (`id`, `status`, `customerId`, `productId`, `productName`, `price`, `discountedPrice`, `discount`, `finalPrice`, `currency`, `payment`, `debt`, `saleDate`, `note`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Lorem Ipsum Nereden Gelir?', '850.00', '765.00', 10, '765.00', '₺', '250.00', '515.00', '2022-12-15 13:15:30', 'test satışı', '2022-12-15 13:15:30', 1, '2022-12-15 10:15:30', '2022-12-15 10:15:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `footer_menus`
--

CREATE TABLE `footer_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `topMenu` int(11) DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `link_en` text DEFAULT NULL,
  `link_de` text DEFAULT NULL,
  `link_ru` text DEFAULT NULL,
  `row` int(11) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `footer_menus`
--

INSERT INTO `footer_menus` (`id`, `status`, `topMenu`, `title_en`, `title_de`, `title_ru`, `link_en`, `link_de`, `link_ru`, `row`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Institutional', 'Institutionell', 'институциональный', NULL, NULL, NULL, 1, '2022-12-21 13:02:40', 1, '2022-12-15 10:45:25', '2022-12-21 10:02:40'),
(2, 1, 1, 'Contact', 'Kommunikation', 'Коммуникация', 'http://localhost/contact', 'http://localhost/iletisim', 'http://localhost/contact', 1, '2022-12-21 13:02:47', 1, '2022-12-15 10:45:40', '2022-12-21 10:02:47'),
(3, 1, 1, 'About us', 'über uns', 'о нас', 'http://localhost/page/what-is-lorem-ipsum', 'http://localhost/sayfa/lorem-ipsum-nedir', 'http://localhost/page/cto-takoe-lorem-ipsum', 2, '2022-12-21 13:02:54', 1, '2022-12-15 10:46:02', '2022-12-21 10:02:54'),
(4, 1, 1, 'Why Us?', 'Warum wir?', 'Почему нас?', 'http://localhost/page/why-do-we-use-lorem-ipsum', 'http://localhost/sayfalar', 'http://localhost/page/gde-ia-mogu-naiti-ipsum', 3, '2022-12-21 13:03:02', 1, '2022-12-15 10:46:23', '2022-12-21 10:03:02'),
(5, 1, NULL, 'Our Blog Posts', 'Unsere Blogbeiträge', 'Наши сообщения в блоге', NULL, NULL, NULL, 2, '2022-12-21 13:03:12', 1, '2022-12-15 10:46:37', '2022-12-21 10:03:12'),
(6, 1, 5, 'Why Do We Use Lorem Ipsum?', 'Warum verwenden wir Lorem Ipsum?', 'Почему мы используем Lorem Ipsum?', 'http://localhost/blog/why-do-we-use-lorem-ipsum', 'http://localhost/blog/lorem-ipsum-neden-kullaniriz', 'http://localhost/blog/pocemu-my-ispolzuem-lorem-ipsum', 1, '2022-12-21 13:03:22', 1, '2022-12-15 10:46:59', '2022-12-21 10:03:22'),
(7, 1, 5, 'What is Lorem Ipsum?', 'Was ist Lorem Ipsum?', 'Что такое Лорем Ипсум?', 'http://localhost/blog/what-is-lorem-ipsum', 'http://localhost/blog/lorem-ipsum-nedir', 'http://localhost/blog/cto-takoe-lorem-ipsum', 2, '2022-12-21 13:03:31', 1, '2022-12-15 10:47:12', '2022-12-21 10:03:31'),
(8, 1, 5, 'Where Can I Find Lorem Ipsum?', 'Wo finde ich Lorem Ipsum?', 'Где я могу найти Лорема Ипсума?', 'http://localhost/blog/where-can-i-find-lorem-ipsum', 'http://localhost/blog/lorem-ipsum-nereden-bulabilirim', 'http://localhost/blog/gde-ia-mogu-naiti-lorema-ipsuma', 3, '2022-12-21 13:03:40', 1, '2022-12-15 10:47:25', '2022-12-21 10:03:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `status`, `image`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'xBLmNAF01W.jpg', '2022-12-15 13:41:58', 1, '2022-12-15 10:41:58', '2022-12-15 10:41:58'),
(2, 1, 'tC3S5wQpZF.jpg', '2022-12-15 13:41:59', 1, '2022-12-15 10:41:59', '2022-12-15 10:41:59'),
(3, 1, 'FCsT9UB6GQ.jpg', '2022-12-15 13:41:59', 1, '2022-12-15 10:41:59', '2022-12-15 10:41:59'),
(4, 1, '6D9n1QNOZE.jpg', '2022-12-15 13:41:59', 1, '2022-12-15 10:41:59', '2022-12-15 10:41:59'),
(5, 1, 'purUYdcfOJ.jpg', '2022-12-15 13:41:59', 1, '2022-12-15 10:41:59', '2022-12-15 10:41:59'),
(6, 1, '4VfnclYX8r.jpg', '2022-12-15 13:41:59', 1, '2022-12-15 10:41:59', '2022-12-15 10:41:59'),
(7, 1, 'Yu0IgQ2rGz.jpg', '2022-12-15 13:41:59', 1, '2022-12-15 10:41:59', '2022-12-15 10:41:59'),
(8, 1, 'tsMSxI2ACJ.jpg', '2022-12-15 13:41:59', 1, '2022-12-15 10:41:59', '2022-12-15 10:41:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `header_menus`
--

CREATE TABLE `header_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `topMenu` int(11) DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `link_en` text DEFAULT NULL,
  `link_de` text DEFAULT NULL,
  `link_ru` text DEFAULT NULL,
  `row` int(11) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `header_menus`
--

INSERT INTO `header_menus` (`id`, `status`, `topMenu`, `title_en`, `title_de`, `title_ru`, `link_en`, `link_de`, `link_ru`, `row`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Home', 'Startseite', 'домашняя страница', 'http://localhost', 'http://localhost', 'http://localhost', 1, '2022-12-21 13:00:52', 1, '2022-12-15 10:16:26', '2022-12-21 10:00:52'),
(2, 1, NULL, 'Institutional', 'Institutionell', 'институциональный', NULL, NULL, NULL, 2, '2022-12-21 13:01:00', 1, '2022-12-15 10:16:38', '2022-12-21 10:01:00'),
(3, 1, 2, 'What is Lorem Ipsum?', 'Was ist Lorem Ipsum?', 'Что такое Лорем Ипсум?', 'http://localhost/what-is-lorem-ipsum', 'http://localhost/sayfa/lorem-ipsum-nedir', 'http://localhost/cto-takoe-lorem-ipsum', 1, '2022-12-21 13:01:07', 1, '2022-12-15 10:42:48', '2022-12-21 10:01:07'),
(4, 1, 2, 'Why Do We Use Lorem Ipsum?', 'Warum verwenden wir Lorem Ipsum?', 'Почему мы используем Lorem Ipsum?', 'http://localhost/why-do-we-use-lorem-ipsum', 'http://localhost/sayfa/lorem-ipsum-neden-kullaniriz', 'http://localhost/pocemu-my-ispolzuem-lorem-ipsum', 2, '2022-12-21 13:01:15', 1, '2022-12-15 10:43:02', '2022-12-21 10:01:15'),
(5, 1, NULL, 'Our services', 'Dienstleistungen', 'Наши услуги', NULL, NULL, NULL, 3, '2022-12-21 13:01:26', 1, '2022-12-15 10:43:16', '2022-12-21 10:01:26'),
(6, 1, 5, 'Where Does Lorem Ipsum Come From?', 'Woher kommt Lorem Ipsum?', 'Откуда взялся Лорем Ипсум?', 'http://localhost/what-is-lorem-ipsum/where-does-lorem-ipsum-come-from', 'http://localhost/lorem-ipsum-nedir/lorem-ipsum-nereden-gelir', 'http://localhost/cto-takoe-lorem-ipsum/otkuda-vzialsia-lorem-ipsum', 1, '2022-12-21 13:01:36', 1, '2022-12-15 10:43:43', '2022-12-21 10:01:36'),
(7, 1, 5, 'Why Do We Use?', 'Warum verwenden wir?', 'Почему мы используем?', 'http://localhost/what-is-lorem-ipsum/why-do-we-use', 'http://localhost/lorem-ipsum-nedir/neden-kullaniriz', 'http://localhost/cto-takoe-lorem-ipsum/pocemu-my-ispolzuem', 2, '2022-12-21 13:01:45', 1, '2022-12-15 10:43:56', '2022-12-21 10:01:45'),
(8, 1, 5, 'Where Can I Find Lorem Ipsum?', 'Wo finde ich Lorem Ipsum?', 'Где я могу найти Лорема Ипсума?', 'http://localhost/what-is-lorem-ipsum/where-can-i-find-lorem-ipsum', 'http://localhost/lorem-ipsum-nedir/lorem-ipsum-nereden-bulabilirim', 'http://localhost/cto-takoe-lorem-ipsum/gde-ia-mogu-naiti-lorema-ipsuma', 3, '2022-12-21 13:01:54', 1, '2022-12-15 10:44:09', '2022-12-21 10:01:54'),
(9, 1, NULL, 'Gallery', 'Galerie', 'Галерея', 'http://localhost/gallery', 'http://localhost/galeri', 'http://localhost/gallery', 3, '2022-12-21 13:02:04', 1, '2022-12-15 10:44:29', '2022-12-21 10:02:04'),
(10, 1, NULL, 'Blog', 'Bloggen', 'блог', 'http://localhost/blog', 'http://localhost/blog', 'http://localhost/blog', 4, '2022-12-21 13:02:17', 1, '2022-12-15 10:44:46', '2022-12-21 10:02:17'),
(11, 1, NULL, 'Contact', 'Kommunikation', 'Коммуникация', 'http://localhost/contact', 'http://localhost/iletisim', 'http://localhost/contact', 5, '2022-12-21 13:02:28', 1, '2022-12-15 10:45:07', '2022-12-21 10:02:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `latest_transactions`
--

CREATE TABLE `latest_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL,
  `transaction` text DEFAULT NULL,
  `transactionDate` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `latest_transactions`
--

INSERT INTO `latest_transactions` (`id`, `status`, `adminId`, `transaction`, `transactionDate`, `created_at`, `updated_at`) VALUES
(230, 1, 1, 'admin settings updated', '2022-12-21 12:51:28', '2022-12-21 09:51:28', '2022-12-21 09:51:28'),
(231, 1, 1, 'admin settings updated', '2022-12-21 12:51:45', '2022-12-21 09:51:45', '2022-12-21 09:51:45'),
(232, 1, 1, 'admin, Was ist Lorem Ipsum? Created a category titled', '2022-12-21 12:52:48', '2022-12-21 09:52:48', '2022-12-21 09:52:48'),
(233, 1, 1, 'admin, Wo kommt es her? Created a category titled', '2022-12-21 12:53:09', '2022-12-21 09:53:09', '2022-12-21 09:53:09'),
(234, 1, 1, 'admin, Wo kann ich es kriegen? Created a category titled', '2022-12-21 12:53:26', '2022-12-21 09:53:26', '2022-12-21 09:53:26'),
(235, 1, 1, 'admin, Es gibt viele Variationen edited product titled', '2022-12-21 12:54:16', '2022-12-21 09:54:16', '2022-12-21 09:54:16'),
(236, 1, 1, 'admin, Glauben oder nicht edited product titled', '2022-12-21 12:54:44', '2022-12-21 09:54:44', '2022-12-21 09:54:44'),
(237, 1, 1, 'admin, Lorem Ipsum ist nicht edited product titled', '2022-12-21 12:55:03', '2022-12-21 09:55:03', '2022-12-21 09:55:03'),
(238, 1, 1, 'admin, Originalform, abgeleitet von der edited product titled', '2022-12-21 12:55:29', '2022-12-21 09:55:29', '2022-12-21 09:55:29'),
(239, 1, 1, 'admin, Cicero sind auch reproduziert edited product titled', '2022-12-21 12:55:49', '2022-12-21 09:55:49', '2022-12-21 09:55:49'),
(240, 1, 1, 'admin, Test Customer held customer named', '2022-12-21 12:56:32', '2022-12-21 09:56:32', '2022-12-21 09:56:32'),
(241, 1, 1, 'admin, Wo kommt es her? edited his page', '2022-12-21 12:57:25', '2022-12-21 09:57:25', '2022-12-21 09:57:25'),
(242, 1, 1, 'admin, Wo kann ich es kriegen? edited his page', '2022-12-21 12:57:34', '2022-12-21 09:57:34', '2022-12-21 09:57:34'),
(243, 1, 1, 'admin, Wenn du eine Passage des Lorem edited his page', '2022-12-21 12:57:52', '2022-12-21 09:57:52', '2022-12-21 09:57:52'),
(244, 1, 1, 'admin, Lorem Ipsum Nereden Bulabilirim? edited the blog post', '2022-12-21 12:59:42', '2022-12-21 09:59:42', '2022-12-21 09:59:42'),
(245, 1, 1, 'admin, Leser vom Text abgelenkt wird edited the blog post', '2022-12-21 12:59:53', '2022-12-21 09:59:53', '2022-12-21 09:59:53'),
(246, 1, 1, 'admin, Wo kommt es her? edited the blog post', '2022-12-21 13:00:06', '2022-12-21 10:00:06', '2022-12-21 10:00:06'),
(247, 1, 1, 'admin, Das generierte Lorem Ipsum edited the blog post', '2022-12-21 13:00:15', '2022-12-21 10:00:15', '2022-12-21 10:00:15'),
(248, 1, 1, 'admin, Startseite edited the menu titled', '2022-12-21 13:00:52', '2022-12-21 10:00:52', '2022-12-21 10:00:52'),
(249, 1, 1, 'admin, Institutionell edited the menu titled', '2022-12-21 13:01:00', '2022-12-21 10:01:00', '2022-12-21 10:01:00'),
(250, 1, 1, 'admin, Was ist Lorem Ipsum? edited the menu titled', '2022-12-21 13:01:07', '2022-12-21 10:01:07', '2022-12-21 10:01:07'),
(251, 1, 1, 'admin, Warum verwenden wir Lorem Ipsum? edited the menu titled', '2022-12-21 13:01:15', '2022-12-21 10:01:15', '2022-12-21 10:01:15'),
(252, 1, 1, 'admin, Dienstleistungen edited the menu titled', '2022-12-21 13:01:26', '2022-12-21 10:01:26', '2022-12-21 10:01:26'),
(253, 1, 1, 'admin, Woher kommt Lorem Ipsum? edited the menu titled', '2022-12-21 13:01:36', '2022-12-21 10:01:36', '2022-12-21 10:01:36'),
(254, 1, 1, 'admin, Warum verwenden wir? edited the menu titled', '2022-12-21 13:01:45', '2022-12-21 10:01:45', '2022-12-21 10:01:45'),
(255, 1, 1, 'admin, Wo finde ich Lorem Ipsum? edited the menu titled', '2022-12-21 13:01:54', '2022-12-21 10:01:54', '2022-12-21 10:01:54'),
(256, 1, 1, 'admin, Galerie edited the menu titled', '2022-12-21 13:02:04', '2022-12-21 10:02:04', '2022-12-21 10:02:04'),
(257, 1, 1, 'admin, Bloggen edited the menu titled', '2022-12-21 13:02:17', '2022-12-21 10:02:17', '2022-12-21 10:02:17'),
(258, 1, 1, 'admin, Kommunikation edited the menu titled', '2022-12-21 13:02:28', '2022-12-21 10:02:28', '2022-12-21 10:02:28'),
(259, 1, 1, 'admin, Institutionell edited the menu titled', '2022-12-21 13:02:40', '2022-12-21 10:02:40', '2022-12-21 10:02:40'),
(260, 1, 1, 'admin, Kommunikation edited the menu titled', '2022-12-21 13:02:47', '2022-12-21 10:02:47', '2022-12-21 10:02:47'),
(261, 1, 1, 'admin, über uns edited the menu titled', '2022-12-21 13:02:54', '2022-12-21 10:02:54', '2022-12-21 10:02:54'),
(262, 1, 1, 'admin, Warum wir? edited the menu titled', '2022-12-21 13:03:02', '2022-12-21 10:03:02', '2022-12-21 10:03:02'),
(263, 1, 1, 'admin, Unsere Blogbeiträge edited the menu titled', '2022-12-21 13:03:12', '2022-12-21 10:03:12', '2022-12-21 10:03:12'),
(264, 1, 1, 'admin, Warum verwenden wir Lorem Ipsum? edited the menu titled', '2022-12-21 13:03:22', '2022-12-21 10:03:22', '2022-12-21 10:03:22'),
(265, 1, 1, 'admin, Was ist Lorem Ipsum? edited the menu titled', '2022-12-21 13:03:31', '2022-12-21 10:03:31', '2022-12-21 10:03:31'),
(266, 1, 1, 'admin, Wo finde ich Lorem Ipsum? edited the menu titled', '2022-12-21 13:03:40', '2022-12-21 10:03:40', '2022-12-21 10:03:40'),
(267, 1, 1, 'admin, Corporate Webdesign arranged the slide', '2022-12-21 13:04:21', '2022-12-21 10:04:21', '2022-12-21 10:04:21'),
(268, 1, 1, 'admin, Corporate Webdesign arranged the slide', '2022-12-21 13:04:27', '2022-12-21 10:04:27', '2022-12-21 10:04:27'),
(269, 1, 1, 'admin, held a note', '2022-12-21 13:04:55', '2022-12-21 10:04:55', '2022-12-21 10:04:55'),
(270, 1, 1, 'admin, held a note', '2022-12-21 13:04:58', '2022-12-21 10:04:58', '2022-12-21 10:04:58'),
(271, 1, 1, 'admin, held a note', '2022-12-21 13:05:01', '2022-12-21 10:05:01', '2022-12-21 10:05:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_27_190350_admins', 1),
(6, '2022_11_27_190415_settings', 1),
(7, '2022_11_27_190441_contact', 1),
(8, '2022_11_27_190534_categories', 1),
(9, '2022_11_27_190604_category_features', 1),
(10, '2022_11_27_190630_category_features_types', 1),
(11, '2022_11_27_190759_category_comments', 1),
(12, '2022_11_27_190825_category_images', 1),
(13, '2022_11_27_190847_products', 1),
(14, '2022_11_27_190908_product_comments', 1),
(15, '2022_11_27_190929_product_images', 1),
(16, '2022_11_27_190953_header_menus', 1),
(17, '2022_11_27_191253_footer_menus', 1),
(18, '2022_11_27_191337_pages', 1),
(19, '2022_11_27_191357_page_images', 1),
(20, '2022_11_27_191509_blogs', 1),
(21, '2022_11_27_191527_notes', 1),
(22, '2022_11_27_191604_customers', 1),
(23, '2022_11_27_191623_sales', 1),
(24, '2022_11_27_191817_sliders', 1),
(25, '2022_11_27_191835_supports', 1),
(26, '2022_11_27_191854_stories', 1),
(27, '2022_11_27_191913_latest_transactions', 1),
(28, '2022_11_27_191936_gallery_images', 1),
(29, '2022_12_06_164549_customer_debts', 1),
(30, '2022_12_06_164812_customer_payments', 1),
(31, '2022_12_06_200108_customer_sales', 1),
(32, '2022_12_12_210101_orders', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `notes`
--

INSERT INTO `notes` (`id`, `status`, `note`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 2, 'Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie.', '2022-12-21 13:04:55', 1, '2022-12-15 10:49:26', '2022-12-21 10:04:55'),
(2, 2, 'Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie.', '2022-12-21 13:04:58', 1, '2022-12-15 10:49:31', '2022-12-21 10:04:58'),
(3, 1, 'Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie.', '2022-12-21 13:05:01', 1, '2022-12-15 10:49:37', '2022-12-21 10:05:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `productName` varchar(250) DEFAULT NULL,
  `productFeature` varchar(250) DEFAULT NULL,
  `productType` varchar(250) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discountedPrice` decimal(10,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `finalPrice` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `debt` decimal(10,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `link_en` text DEFAULT NULL,
  `link_de` text DEFAULT NULL,
  `link_ru` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_de` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  `keywords_en` text DEFAULT NULL,
  `keywords_de` text DEFAULT NULL,
  `keywords_ru` text DEFAULT NULL,
  `content_en` text DEFAULT NULL,
  `content_de` text DEFAULT NULL,
  `content_ru` text DEFAULT NULL,
  `coverImage` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `status`, `title_en`, `title_de`, `title_ru`, `link_en`, `link_de`, `link_ru`, `description_en`, `description_de`, `description_ru`, `keywords_en`, `keywords_de`, `keywords_ru`, `content_en`, `content_de`, `content_ru`, `coverImage`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is Lorem Ipsum?', 'Wenn du eine Passage des Lorem', 'Что такое Лорем Ипсум?', 'what-is-lorem-ipsum', 'wenn-du-eine-passage-des-lorem', 'cto-takoe-lorem-ipsum', 'What is Lorem Ipsum?', 'Wenn du eine Passage des Lorem', 'Что такое Лорем Ипсум?', 'What is Lorem Ipsum?', 'Wenn du eine Passage des Lorem', 'Что такое Лорем Ипсум?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p><p>Где я могу его достать?<br>Есть много вариаций отрывков из Лорем Ипсум. Но подавляющее большинство из них были изменены путем добавления юмора или добавления случайных слов. Если вы собираетесь использовать фрагмент дека Ipsum, вам необходимо убедиться, что между текстом не скрыты какие-либо смущающие слова. Все генераторы Lorem Ipsum в Интернете повторяют заранее определенные блоки текста. Это, в свою очередь, делает этот генератор настоящим генератором Lorem Ipsum в Интернете. Этот генератор использует словарь, содержащий более 200 латинских слов и их структуру предложений. Таким образом, созданные тексты Lorem Ipsum далеки от повторений, юмора и нехарактерной лексики.</p>', 'R0JGTE6iA4.jpg', '2022-12-21 12:57:52', 1, '2022-12-15 10:39:19', '2022-12-21 09:57:52'),
(2, 1, 'Why Do We Use Lorem Ipsum?', 'Wo kann ich es kriegen?', 'Почему мы используем Lorem Ipsum?', 'why-do-we-use-lorem-ipsum', 'wo-kann-ich-es-kriegen', 'pocemu-my-ispolzuem-lorem-ipsum', 'Why Do We Use Lorem Ipsum?', 'Wo kann ich es kriegen?', 'Почему мы используем Lorem Ipsum?', 'Why Do We Use Lorem Ipsum?', 'Wo kann ich es kriegen?', 'Почему мы используем Lorem Ipsum?', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where does Lorem Ipsum come from?<br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p>', 'SFOxqHUXTy.jpg', '2022-12-21 12:57:34', 1, '2022-12-15 10:39:48', '2022-12-21 09:57:34'),
(3, 1, 'Where Can I Find Ipsum?', 'Wo kommt es her?', 'Где я могу найти Ипсум?', 'where-can-i-find-ipsum', 'wo-kommt-es-her', 'gde-ia-mogu-naiti-ipsum', 'Where Can I Find Ipsum?', 'Wo kommt es her?', 'Где я могу найти Ипсум?', 'Where Can I Find Ipsum?', 'Wo kommt es her?', 'Где я могу найти Ипсум?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p>', 'aovIJi54FB.jpg', '2022-12-21 12:57:25', 1, '2022-12-15 10:41:44', '2022-12-21 09:57:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page_images`
--

CREATE TABLE `page_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `pageId` int(11) DEFAULT NULL,
  `cover` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `page_images`
--

INSERT INTO `page_images` (`id`, `status`, `pageId`, `cover`, `image`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'R0JGTE6iA4.jpg', '2022-12-15 13:39:25', 1, '2022-12-15 10:39:19', '2022-12-15 10:39:25'),
(2, 1, 2, 0, 'j90qGXpQcM.jpg', NULL, NULL, '2022-12-15 10:39:48', '2022-12-15 10:39:48'),
(3, 1, 2, 1, 'SFOxqHUXTy.jpg', '2022-12-15 13:39:52', 1, '2022-12-15 10:39:48', '2022-12-15 10:39:52'),
(4, 1, 2, 0, 'FSNzofKqwr.jpg', NULL, NULL, '2022-12-15 10:39:48', '2022-12-15 10:39:48'),
(5, 1, 2, 0, 'bRUPznQG3V.jpg', NULL, NULL, '2022-12-15 10:39:48', '2022-12-15 10:39:48'),
(6, 1, 3, 1, 'aovIJi54FB.jpg', '2022-12-15 13:41:47', 1, '2022-12-15 10:41:44', '2022-12-15 10:41:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `link_en` text DEFAULT NULL,
  `link_de` text DEFAULT NULL,
  `link_ru` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_de` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  `keywords_en` text DEFAULT NULL,
  `keywords_de` text DEFAULT NULL,
  `keywords_ru` text DEFAULT NULL,
  `content_en` text DEFAULT NULL,
  `content_de` text DEFAULT NULL,
  `content_ru` text DEFAULT NULL,
  `featureTypes` varchar(250) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discountedPrice` decimal(10,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `finalPrice` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `orderForm` int(11) DEFAULT NULL,
  `formTitle_de` varchar(255) DEFAULT NULL,
  `formTitle_en` varchar(250) DEFAULT NULL,
  `formTitle_ru` varchar(250) DEFAULT NULL,
  `feature_de` varchar(250) DEFAULT NULL,
  `feature_en` varchar(250) DEFAULT NULL,
  `feature_ru` varchar(250) DEFAULT NULL,
  `type_de` varchar(250) DEFAULT NULL,
  `type_en` varchar(250) DEFAULT NULL,
  `type_ru` varchar(250) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `coverImage` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `status`, `categoryId`, `title_en`, `title_de`, `title_ru`, `link_en`, `link_de`, `link_ru`, `description_en`, `description_de`, `description_ru`, `keywords_en`, `keywords_de`, `keywords_ru`, `content_en`, `content_de`, `content_ru`, `featureTypes`, `stock`, `price`, `discountedPrice`, `discount`, `finalPrice`, `currency`, `orderForm`, `formTitle_de`, `formTitle_en`, `formTitle_ru`, `feature_de`, `feature_en`, `feature_ru`, `type_de`, `type_en`, `type_ru`, `comments`, `coverImage`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Where Does Lorem Ipsum Come From?', 'Es gibt viele Variationen', 'Откуда взялся Лорем Ипсум?', 'where-does-lorem-ipsum-come-from', 'es-gibt-viele-variationen', 'otkuda-vzialsia-lorem-ipsum', 'Where Does Lorem Ipsum Come From?', 'Es gibt viele Variationen', 'Откуда взялся Лорем Ипсум?', 'Where Does Lorem Ipsum Come From?', 'Es gibt viele Variationen', 'Откуда взялся Лорем Ипсум?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p>', NULL, 15, '850.00', '765.00', 10, '765.00', '$', 1, 'Sipariş Formu', NULL, NULL, 'Color', NULL, NULL, 'Blue, Black', NULL, NULL, NULL, 'kNQWeK3Jqy.jpg', '2022-12-21 12:54:16', 1, '2022-12-15 09:59:40', '2022-12-21 09:54:16'),
(2, 1, 1, 'Why Do We Use?', 'Glauben oder nicht', 'Почему мы используем?', 'why-do-we-use', 'glauben-oder-nicht', 'pocemu-my-ispolzuem', 'Why Do We Use?', 'Glauben oder nicht', 'Почему мы используем?', 'Why Do We Use?', 'Glauben oder nicht', 'Почему мы используем?', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Why do we use Lorem Ipsum?<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Lorem Ipsum - это небольшие тексты, используемые в наборной и полиграфической промышленности. Лорем Ипсум использовался в качестве отраслевого стандарта для подделок текстов с 1500-х годов, когда неназванный печатник смешал его, взяв галерею шрифтов, чтобы создать книгу образцов хуруфата. Он не только просуществовал пятьсот лет, но и практически без изменений превратился в электронный верстак. Он стал популярным в 1960-х годах с публикацией листов Letraset, содержащих отрывки из Lorem Ipsum, а в последнее время с настольным издательским программным обеспечением, содержащим версии Lorem Ipsum, таким как Aldus PageMaker.</p><p>Зачем мы его используем?<br>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nDsVi2uF8t.jpg', '2022-12-21 12:54:44', 1, '2022-12-15 10:03:59', '2022-12-21 09:54:44'),
(3, 1, 1, 'Where Can I Find Lorem Ipsum?', 'Lorem Ipsum ist nicht', 'Где я могу найти Лорема Ипсума?', 'where-can-i-find-lorem-ipsum', 'lorem-ipsum-ist-nicht', 'gde-ia-mogu-naiti-lorema-ipsuma', 'Where Can I Find Lorem Ipsum?', 'Lorem Ipsum ist nicht', 'Где я могу найти Лорема Ипсума?', 'Where Can I Find Lorem Ipsum?', 'Lorem Ipsum ist nicht', 'Где я могу найти Лорема Ипсума?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Lorem Ipsum - это небольшие тексты, используемые в наборной и полиграфической промышленности. Лорем Ипсум использовался в качестве отраслевого стандарта для подделок текстов с 1500-х годов, когда неназванный печатник смешал его, взяв галерею шрифтов, чтобы создать книгу образцов хуруфата. Он не только просуществовал пятьсот лет, но и практически без изменений превратился в электронный верстак. Он стал популярным в 1960-х годах с публикацией листов Letraset, содержащих отрывки из Lorem Ipsum, а в последнее время с настольным издательским программным обеспечением, содержащим версии Lorem Ipsum, таким как Aldus PageMaker.</p><p>Зачем мы его используем?<br>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p>', NULL, 20, '400.00', '360.00', 10, '360.00', '$', 1, 'Sipariş Formu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YMfTpJDLP0.jpg', '2022-12-21 12:55:03', 1, '2022-12-15 10:11:08', '2022-12-21 09:55:03'),
(4, 1, 2, 'Lorem Ipsum is not made up of random words', 'Originalform, abgeleitet von der', 'Lorem Ipsum не состоит из случайных слов', 'lorem-ipsum-is-not-made-up-of-random-words', 'originalform-abgeleitet-von-der', 'lorem-ipsum-ne-sostoit-iz-slucainyx-slov', 'Lorem Ipsum is not made up of random words', 'Originalform, abgeleitet von der', 'Lorem Ipsum не состоит из случайных слов', 'Lorem Ipsum is not made up of random words', 'Originalform, abgeleitet von der', 'Lorem Ipsum не состоит из случайных слов', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get Lorem Ipsum?<br>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p>', NULL, 30, '250.00', NULL, NULL, '250.00', '$', 1, 'Talep Formu', NULL, NULL, 'Color', NULL, NULL, 'Blue', NULL, NULL, NULL, 'tbr4mYSDwO.jpg', '2022-12-21 12:55:29', 1, '2022-12-15 10:12:29', '2022-12-21 09:55:29'),
(5, 1, 3, 'Purpose of using Lorem Ipsum', 'Cicero sind auch reproduziert', 'Цель использования Lorem Ipsum', 'purpose-of-using-lorem-ipsum', 'cicero-sind-auch-reproduziert', 'cel-ispolzovaniia-lorem-ipsum', 'Purpose of using Lorem Ipsum', 'Cicero sind auch reproduziert', 'Цель использования Lorem Ipsum', 'Purpose of using Lorem Ipsum', 'Cicero sind auch reproduziert', 'Цель использования Lorem Ipsum', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where does Lorem Ipsum come from?<br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br>&nbsp;</p>', '<p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach \"lorem ipsum\" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst (beeinflusst von Witz und des eigenen Geschmacks)</p><p><br>Wo kommt es her?<br>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, \"consectetur\", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des \"de Finibus Bonorum et Malorum\" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", kommt aus einer Zeile der Sektion 1.10.32.</p><p>Der Standardteil von Lorem Ipsum, genutzt seit 1500, ist reproduziert für die, die es interessiert. Sektion 1.10.32 und 1.10.33 von \"de Finibus Bonorum et Malroum\" von Cicero sind auch reproduziert in ihrer Originalform, abgeleitet von der Englischen Version aus von 1914 (H. Rackham)</p><p>Wo kann ich es kriegen?<br>Es gibt viele Variationen der Passages des Lorem Ipsum, aber der Hauptteil erlitt Änderungen in irgendeiner Form, durch Humor oder zufällige Wörter welche nicht einmal ansatzweise glaubwürdig aussehen. Wenn du eine Passage des Lorem Ipsum nutzt, solltest du aufpassen dass in der Mitte des Textes keine ungewollten Wörter stehen. Viele der Generatoren im Internet neigen dazu, vorgefertigte Stücke zu wiederholen - was es nötig machte einen richtigen Generator zu entwickeln. Wir nutzen ein Wörterbuch aus über 200 Lateinischen Wörter, kombiniert mit einer Handvoll Kunstsätzen, welche das Lorem Ipsum glaubwürdig macht. Das generierte Lorem Ipsum ist außerdem frei von Wiederholungen, Humor oder unqualitativen Wörter etc, ...</p>', '<p>Общеизвестно, что повторяющееся содержимое страницы отвлекает читателя. Цель использования Lorem Ipsum состоит в том, чтобы улучшить читаемость, обеспечивая более сбалансированное распределение букв по сравнению с постоянным вводом текста \"текст придет сюда, текст придет сюда\". В настоящее время многие настольные издательские пакеты и редакторы веб-страниц используют Lorem Ipsum в качестве основного текста по умолчанию. Декомму Декоммунизация - это процесс, при котором поиск по ключевым словам \"lorem ipsum\" в поисковых системах отображается большое количество сайтов, которые еще находятся на стадии разработки. За прошедшие годы было разработано несколько версий, иногда случайно, иногда сознательно (например, с добавлением юмора).</p><p>Откуда Доход?<br>Вопреки распространенному мнению, Lorem Ipsum не состоит из случайных слов. Корни М.Он. Он имеет 45-летнюю историю, восходящую к классической латинской литературе с 2000 года. Профессор латинского языка Ричард МакКлинток из Хэмпден-Сиднейского колледжа в Вирджинии пришел к окончательному источнику, когда изучил примеры в классической литературе слова \"consectetur\", одного из самых трудных для понимания слов, встречающихся в отрывке из Lorem Ipsum. Лорм Ипсум, автор Цицерона, М.Он. \"De Finibus Bonorum et Malorum\" (Крайние границы добра и зла), написанный в 45 г., взят из глав 1.10.32 и 1.10.33 его произведения. Эта книга представляет собой трактат по теории морали и была очень популярна в эпоху Возрождения. Первая строка отрывка Лорем Ипсум, \"Лорем ипсум долор сит амет\", взята из строки в главе 1.10.32.</p><p>Стандартные тексты Lorem Ipsum, которые использовались с 1500-х годов, были воспроизведены для тех, кто заинтересован. Главы 1.10.32 и 1.10.33, написанные Цицероном, также относятся к 1914 году хиджры. Он был воспроизведен в исходном формате в сопровождении английских версий, взятых из перевода Рэкхэма.</p>', NULL, 30, '180.00', '162.00', 10, '162.00', '$', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dzeqMGair4.jpg', '2022-12-21 12:55:49', 1, '2022-12-15 10:13:34', '2022-12-21 09:55:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `commentDate` datetime DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `cover` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `status`, `productId`, `cover`, `image`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'KvX4QN3SPc.jpg', '2022-12-15 12:59:40', 1, '2022-12-15 09:59:40', '2022-12-15 09:59:40'),
(2, 1, 1, 1, 'kNQWeK3Jqy.jpg', '2022-12-15 13:02:01', 1, '2022-12-15 09:59:40', '2022-12-15 10:02:01'),
(3, 1, 1, 0, '9x72eCJtwl.jpg', '2022-12-15 12:59:40', 1, '2022-12-15 09:59:40', '2022-12-15 09:59:40'),
(4, 1, 1, 0, 'xWd7L9gZIN.jpg', '2022-12-15 12:59:40', 1, '2022-12-15 09:59:40', '2022-12-15 09:59:40'),
(5, 1, 2, 0, 'jKU9Jtgowk.jpg', '2022-12-15 13:03:59', 1, '2022-12-15 10:03:59', '2022-12-15 10:03:59'),
(6, 1, 2, 0, 'Ql14HbMqsY.jpg', '2022-12-15 13:03:59', 1, '2022-12-15 10:03:59', '2022-12-15 10:03:59'),
(7, 1, 2, 0, '5cnS12UZrl.jpg', '2022-12-15 13:03:59', 1, '2022-12-15 10:03:59', '2022-12-15 10:03:59'),
(8, 1, 2, 1, 'nDsVi2uF8t.jpg', '2022-12-15 13:04:04', 1, '2022-12-15 10:03:59', '2022-12-15 10:04:04'),
(9, 1, 3, 0, 'sX4UQkzAgj.jpg', '2022-12-15 13:11:08', 1, '2022-12-15 10:11:08', '2022-12-15 10:11:08'),
(10, 1, 3, 0, 'vyD6Foshz5.jpg', '2022-12-15 13:11:08', 1, '2022-12-15 10:11:08', '2022-12-15 10:11:08'),
(11, 1, 3, 0, '87Jf3RPQmo.jpg', '2022-12-15 13:11:13', 1, '2022-12-15 10:11:08', '2022-12-15 10:53:39'),
(12, 1, 3, 1, 'YMfTpJDLP0.jpg', '2022-12-15 13:53:39', 1, '2022-12-15 10:11:08', '2022-12-15 10:53:39'),
(13, 1, 4, 1, 'tbr4mYSDwO.jpg', '2022-12-15 13:12:33', 1, '2022-12-15 10:12:29', '2022-12-15 10:12:33'),
(14, 1, 4, 0, 'G5K0yFdwq3.jpg', '2022-12-15 13:12:29', 1, '2022-12-15 10:12:29', '2022-12-15 10:12:29'),
(15, 1, 4, 0, '8t5lguBAsZ.jpg', '2022-12-15 13:12:29', 1, '2022-12-15 10:12:29', '2022-12-15 10:12:29'),
(16, 1, 5, 0, 'rtNWlOVj1L.jpg', '2022-12-15 13:13:34', 1, '2022-12-15 10:13:34', '2022-12-15 10:13:34'),
(17, 1, 5, 1, 'dzeqMGair4.jpg', '2022-12-15 13:13:38', 1, '2022-12-15 10:13:34', '2022-12-15 10:13:38'),
(18, 1, 5, 0, 'v0ZgUWDTyH.jpg', '2022-12-15 13:13:34', 1, '2022-12-15 10:13:34', '2022-12-15 10:13:34'),
(19, 1, 5, 0, 'n4BukGY8lL.jpg', '2022-12-15 13:13:34', 1, '2022-12-15 10:13:34', '2022-12-15 10:13:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `productName` text DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `saleDate` datetime DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discountedPrice` decimal(10,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `finalPrice` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `debt` decimal(10,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `saleAdminId` int(11) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sales`
--

INSERT INTO `sales` (`id`, `status`, `productId`, `productName`, `customerId`, `saleDate`, `price`, `discountedPrice`, `discount`, `finalPrice`, `currency`, `payment`, `debt`, `note`, `saleAdminId`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem Ipsum', 1, '2022-12-15 13:15:30', '850.00', '765.00', 10, '765.00', '₺', '250.00', '515.00', NULL, NULL, '2022-12-15 13:15:30', 1, '2022-12-15 10:15:30', '2022-12-15 10:15:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `url_en` text DEFAULT NULL,
  `url_de` text DEFAULT NULL,
  `url_ru` text DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_de` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  `keywords_en` text DEFAULT NULL,
  `keywords_de` text DEFAULT NULL,
  `keywords_ru` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `lang_de` int(11) DEFAULT NULL,
  `lang_en` int(11) DEFAULT NULL,
  `lang_ru` int(11) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `status`, `url_en`, `url_de`, `url_ru`, `title_en`, `title_de`, `title_ru`, `description_en`, `description_de`, `description_ru`, `keywords_en`, `keywords_de`, `keywords_ru`, `logo`, `lang_de`, `lang_en`, `lang_ru`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://localhost', 'http://localhost', 'http://localhost', 'Corporate Web Design', 'Lorem Ipsum', 'веб-дизайн', 'Corporate Web Design', 'Lorem Ipsum', 'веб-дизайн', 'Corporate Web Design', 'Lorem Ipsum', 'веб-дизайн', 'logo.png', 1, 1, 1, NULL, NULL, NULL, '2022-12-21 09:51:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `title_de` text DEFAULT NULL,
  `title_ru` text DEFAULT NULL,
  `link_en` text DEFAULT NULL,
  `link_de` text DEFAULT NULL,
  `link_ru` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_de` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `status`, `title_en`, `title_de`, `title_ru`, `link_en`, `link_de`, `link_ru`, `description_en`, `description_de`, `description_ru`, `image`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'Corporate Web Design', 'Corporate Webdesign', 'Корпоративный веб-дизайн', 'http://localhost', 'http://localhost', NULL, NULL, NULL, NULL, 'BAbludUUmY.jpg', '2022-12-21 13:04:21', 1, '2022-12-15 10:47:54', '2022-12-21 10:04:21'),
(2, 1, 'Web Design', 'Corporate Webdesign', 'веб-дизайн', NULL, NULL, NULL, NULL, NULL, NULL, 'v3aHB2Th4e.jpg', '2022-12-21 13:04:27', 1, '2022-12-15 10:48:07', '2022-12-21 10:04:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stories`
--

CREATE TABLE `stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `stories`
--

INSERT INTO `stories` (`id`, `status`, `title`, `link`, `image`, `lastDate`, `lastAdminId`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web design', 'http://localhost', '4ODKrmsZ2c.jpg', '2022-12-15 14:07:30', 1, '2022-12-15 10:48:28', '2022-12-15 11:07:30'),
(2, 1, 'Website', NULL, 'aWMngsiqDH.jpg', '2022-12-15 14:07:22', 1, '2022-12-15 10:48:44', '2022-12-15 11:07:22'),
(3, 1, 'Web design', 'http://localhost', 'qaJSMoDbpG.jpg', '2022-12-15 14:07:14', 1, '2022-12-15 10:49:01', '2022-12-15 11:07:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `supports`
--

CREATE TABLE `supports` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `supportDate` datetime DEFAULT NULL,
  `replyDate` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lastDate` datetime DEFAULT NULL,
  `lastAdminId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer_debts`
--
ALTER TABLE `customer_debts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer_payments`
--
ALTER TABLE `customer_payments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer_sales`
--
ALTER TABLE `customer_sales`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `footer_menus`
--
ALTER TABLE `footer_menus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `header_menus`
--
ALTER TABLE `header_menus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `latest_transactions`
--
ALTER TABLE `latest_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `page_images`
--
ALTER TABLE `page_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `customer_debts`
--
ALTER TABLE `customer_debts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `customer_payments`
--
ALTER TABLE `customer_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `customer_sales`
--
ALTER TABLE `customer_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `footer_menus`
--
ALTER TABLE `footer_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `header_menus`
--
ALTER TABLE `header_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `latest_transactions`
--
ALTER TABLE `latest_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `page_images`
--
ALTER TABLE `page_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
