-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Июн 05 2021 г., 22:16
-- Версия сервера: 5.7.24
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplompasha`
--

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `artistID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `city` varchar(40) NOT NULL,
  `describeArtist` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`artistID`, `userID`, `city`, `describeArtist`) VALUES
(1, 1, 'Ростов-на-Дону', 'Художник. Я только в начале пути.'),
(2, 2, 'Казань', 'Я родилась в 1974 году в России городе Казань. Мой отец – профессиональный художник-дизайнер. Мне сложно отследить тот момент, когда живопись впервые завладела моим вниманием, видимо, с первых дней моей жизни. Я всегда училась у отца, и далее закончила художественную школу в городе Казань, позднее в 2007 году переехала жить в Санкт-Петербург и много лет подряд практиковалась в частных мастерских у художников Художественной Академии Петербурга. Как второе образование, было окончание Академии астрологии в Петербурге, и большая практика консультирования клиентов. С тех пор прошло более шести лет, и именно астрология дала мне тот самый уникальный акцент в моих картинах, вдохновила на новый этап моего творчества. Теперь я не просто смотрю на мир, на людей, я вижу их своим взглядом, я вижу особенность каждой личности, каждой души, даже если это неживой предмет. Но слова слишком скупы, чтобы описать это, поэтому я выбрала свой язык – язык холста и красок. Я знаю, что я на правильном пути, я знаю это, потому что я испытываю безумное удовольствие от времени, проведенным за рисованием. Я разговариваю со моим внутренним Я, и эта беседа может длиться часами. Мои работы – это не статичная картинка, это медитация, это жизненный поток, это опыт, который каждый раз будет открываться вам по-новому. Возможно, вы разгадаете эту загадку, возможно, мои сюжеты навсегда останутся для вас тайной. Но только одно важно – вам будет хорошо наедине с моими картинами, которые украсят ваш дом.');

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `pictureID` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `nameP` varchar(50) NOT NULL,
  `photoP` varchar(20) NOT NULL,
  `describeP` text NOT NULL,
  `typeID` int(11) NOT NULL,
  `styleID` int(11) NOT NULL,
  `stateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`pictureID`, `artistID`, `nameP`, `photoP`, `describeP`, `typeID`, `styleID`, `stateID`) VALUES
(1, 2, 'Аромат Востока - 1', '3.png', 'Холст, Масло... Новая серия моих картин посвящена Востоку, а точнее моей поездке по Египту в марте 2021 года. Целый месяц я провела в этой загадочной стране, путешествуя по самым древним городам, любуясь пирамидами, древними храмами и гробницами фараонов, изучая наследие исторического музея в городе Каир и проживая незабываемые дни и ночи на просторах бесконечной пустыни и погружаясь с аквалангом в глубины красного моря. Несколько моих работ я хочу посвятить ароматам Востока.', 1, 4, 1),
(2, 2, 'Крылья Ветра - 1', '4.png', 'Новая серия моих картин посвящена Востоку, а точнее моей поездке по Египту в марте 2021 года. Целый месяц я провела в этой загадочной стране, путешествуя по самым древним городам, любуясь пирамидами, древними храмами и гробницами фараонов, изучая наследие исторического музея в городе Каир и проживая незабываемые дни и ночи на просторах бесконечной пустыни. Ветер и Солнце наполняют все пространство, в котором живет человек. Мы дышим энергией ветра, мы живет благодаря энергии Солнца. ', 1, 4, 2),
(3, 2, 'Эффект бабочки', '5.png', 'Мир, в котором мы живем, прекрасен, но очень изменчив. Он был создан Великим Мастером-Творцом, в сознании которого находятся бесчисленные новые творческие возможности для развития этого Вселенной. Так бабочки, будучи одними из самых изящных произведений искусства, могут наслаждать мир своей красотой всего лишь один день. Моя картина напомнит вам, что вы не должны забывать восхищаться жизнью вокруг, когда она открывает перед вами свои яркие краски. Картина написана активными живыми мазками, в ней чувствуется игра и движение красок. Масляная среда отображается текучестью своей фактуры.', 1, 4, 2),
(4, 1, 'Женские роли', '6.png', 'В этой картине я изображаю свою женскую роль в обществе. Это мой автопортрет, вечно молодая девушка-кошка. Я выгляжу спокойной и уравновешенной для людей, которые меня не знают. У меня есть видимые недостатки (сигарета), в детстве была неуклюжей, совершено невзрачной, гадким утёнком, но всегда хотела быть яркой и привлекательной. Взрослая жизнь позволила мне реализовать это стремление, теперь я крашу волосы в рыжий цвет и стараюсь выглядеть эффектно. Я не очень любила читать книги в детстве, у меня всегда получалось самой создавать миры в своей голове, не используя костыли в виде чужих идей. Маленькая женщина под стулом - это принцесса, которую не все видят, ошейник на шее - ограничения в моей голове, которые порой мешают двигаться к целям, мороженое - это соблазны, маска - скрытность, личные тайны, страхи.', 1, 1, 1),
(5, 1, 'В ожидании ветра', '7.png', 'Картина символизирует ожидание чайкой потоков ветра для полета. Порой каждый из нас ждет удачного момента.', 1, 2, 1),
(6, 1, 'Сохраняйте спокойствие, господа!', '8.png', 'В природе не бывает стабильности. Когда окружающий мир «сходит сума», а нервные клетки не восстанавливаются - сохраняйте спокойствие, как черепашки под водой во время шторма.', 1, 2, 2),
(7, 1, 'Весть из иных миров', '9.png', 'На этой картине изображено представление ожидания важной новости из другого мира. Птица символ этих вестей. Какую же он получит новость?', 1, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `states`
--

CREATE TABLE `states` (
  `stateID` int(11) NOT NULL,
  `nameState` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `states`
--

INSERT INTO `states` (`stateID`, `nameState`) VALUES
(1, 'На проверке'),
(2, 'Активно'),
(3, 'Неактивно');

-- --------------------------------------------------------

--
-- Структура таблицы `style`
--

CREATE TABLE `style` (
  `styleID` int(11) NOT NULL,
  `nameStyle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `style`
--

INSERT INTO `style` (`styleID`, `nameStyle`) VALUES
(1, 'Сюрреализм'),
(2, 'Символизм'),
(3, 'Фантастический реализм'),
(4, 'Абстракционизм');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `typeID` int(11) NOT NULL,
  `nameType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`typeID`, `nameType`) VALUES
(1, 'Масло');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nameUser` varchar(20) NOT NULL,
  `surnameUser` varchar(20) DEFAULT NULL,
  `lastnameUser` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photoUser` varchar(20) DEFAULT NULL,
  `ifArtist` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `login`, `password`, `nameUser`, `surnameUser`, `lastnameUser`, `email`, `photoUser`, `ifArtist`) VALUES
(1, 'papina90', '1234', 'Татьяна', 'Александровна', 'Папина', 'tanusha79@mail.ru', '1.jpg', 1),
(2, 'marina01', '0987', 'Марина', NULL, 'Венедиктова', 'mv.astrolog@gmail.com', '2.jpg', 1),
(3, 'user1', '1234', 'Василий', NULL, 'Айвазовский', 'artlover@mail.ru', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `votes`
--

CREATE TABLE `votes` (
  `voteID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `pictureID` int(11) NOT NULL,
  `dateVote` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artistID`),
  ADD UNIQUE KEY `userID_2` (`userID`),
  ADD KEY `userID` (`userID`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pictureID`),
  ADD KEY `artistID` (`artistID`,`typeID`,`styleID`),
  ADD KEY `typeID` (`typeID`),
  ADD KEY `styleID` (`styleID`),
  ADD KEY `stateID` (`stateID`);

--
-- Индексы таблицы `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`stateID`);

--
-- Индексы таблицы `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`styleID`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`voteID`),
  ADD KEY `userID` (`userID`,`pictureID`),
  ADD KEY `pictureID` (`pictureID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `artistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `states`
--
ALTER TABLE `states`
  MODIFY `stateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `style`
--
ALTER TABLE `style`
  MODIFY `styleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `votes`
--
ALTER TABLE `votes`
  MODIFY `voteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `artists_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Ограничения внешнего ключа таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `type` (`typeID`),
  ADD CONSTRAINT `pictures_ibfk_2` FOREIGN KEY (`artistID`) REFERENCES `artists` (`artistID`),
  ADD CONSTRAINT `pictures_ibfk_3` FOREIGN KEY (`styleID`) REFERENCES `style` (`styleID`),
  ADD CONSTRAINT `pictures_ibfk_4` FOREIGN KEY (`stateID`) REFERENCES `states` (`stateID`);

--
-- Ограничения внешнего ключа таблицы `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`pictureID`) REFERENCES `pictures` (`pictureID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
