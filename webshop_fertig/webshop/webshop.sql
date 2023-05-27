-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jan 2022 um 18:57
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admin_user`
--

INSERT INTO `admin_user` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'test', 'testing', 'test@test.com', 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Herrenparfum'),
(2, 'Damenparfum'),
(3, 'Düfte'),
(4, 'Deodorants'),
(5, 'Nischendüfte');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `phone_number` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `building_number` varchar(255) NOT NULL,
  `zip` int(7) NOT NULL,
  `active` tinyint(4) DEFAULT 1,
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `client`
--

INSERT INTO `client` (`id`, `first_name`, `last_name`, `email`, `gender`, `password`, `date_birth`, `phone_number`, `city`, `street`, `building_number`, `zip`, `active`, `deleted`) VALUES
(12, 'test', 'test', 'test@test.com', '', 'test', '0000-00-00', 0, '', '', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ean` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `weight` decimal(10,4) NOT NULL,
  `active` tinyint(4) DEFAULT 1,
  `deleted` tinyint(4) DEFAULT 0,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `nische_product` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `name`, `ean`, `price`, `weight`, `active`, `deleted`, `brand`, `description`, `image_url`, `nische_product`) VALUES
(1, 'Sauvage\r\nEau de Parfum', 1, '79.00', '100.0000', 1, 0, 'Dior', 'Die kraftvolle Frische von Sauvage offenbart neue sinnliche und geheimnisvolle Facetten, die sich in einer unverkennbaren, meisterhaften Komposition von einer neuen Seite zeigen. Saftig und prickelnd wie eh und je vereint sich die Bergamotte aus Kalabrien mit neuen würzigen Noten, um für mehr Fülle und Sinnlichkeit zu sorgen, während die rauchigen Akzente des Vanille-Absolues aus Papua-Neuguinea die holzige Ambra-Duftspur von Ambroxan® umhüllen, um die Maskulinität zu unterstreichen.\r\n\r\nFrançois Demachy, Parfumeur-Créateur bei Dior, ließ sich von der magischen Stunde der Abenddämmerung in der Wüste inspirieren. Vereint mit der Kühle der Nacht lässt die brennende Wüstenluft intensive Düfte frei. In der Stunde, wenn Wölfe in Erscheinung treten und der Himmel lodert, entfaltet sich eine ganz besondere Magie.\r\n\r\n„Ich habe mich bei Sauvage Eau de Parfum nicht mit der Intensität beschäftigt. Die Signatur des Duftes ist bereits sehr markant. Ich wollte die Komposition weder aufbauschen noch übersättigen. Mein Ziel war es, jede der dominanten Noten zu bereichern, um ihnen eine neue Farbe zu schenken.“ François Demachy, Parfumeur-Créateur (bei) Dior', 'dior-sauvage-eau-de-parfum.jpg', 0),
(2, 'Emporio Armani Stronger with You Intensely\r\nEau de Parfum', 2, '63.00', '100.0000', 1, 0, 'Giorgio Armani', 'Das Power Couple des 21. Jahrhunderts eröffnet ein neues Kapitel in seiner Liebesgeschichte. Inspiriert von den Metropolen der Welt begibt sich das Duftpaar aus dem Hause Emporio Armani auf die Reise ins romantisch, mediterrane Lissabon. Die männlich-intensive Duftsensation \"Stronger With You Intensely\" lädt Sie mit würzigem rosa Peffer ein, offenbart sich in einer Vereinigung von Salbei und Zimt und gibt stärkende Geborgenheit mit Tonkabohne und Wildleder. Erleben Sie sein Bekenntnis zu intensiver Liebe in mediterraner Atmospähre mit einer holzig-orientalischen Note und einem fruchtigen Hauch sinnlicher Verführung.', 'giorgio-armani-emporio-armani-eau-de-parfum.jpg', 0),
(3, 'Millesime for Men Aventus\r\nEau de Parfum', 3, '285.00', '100.0000', 1, 0, 'Creed', '>> Dauerhafte Top 50 Platzierung unter unseren meistverkauften Herrendüften\r\n\r\n>> Stil, Eleganz und pure Männlichkeit - in einem edlen Flakon verkörpert\r\n\r\n>> Eins der beliebtesten Herrendüfte seit 2010 erhältlich\r\n\r\n>> Aventus - Top Serie von Creed\r\nDer erlesene Duft von Creed Aventus\r\n\r\nCreed Aventus ist ein würzig herber Männerduft, der ein Odeur von Kraft und Männlichkeit versprüht. Diese Duftnote wurde für Männer kreiert, die als Helden in Ihrer Umgebung verehrt werden. Stärke und Leidenschaft werden von Creed Aventus verkörpert und immer mit dem extremen Ziel der Eroberung. Charismatische Vorbilder sind diese Männer, die Aventus von Creed auf ihre stählerne Haut auftragen. Creed Aventus ist ein außergewöhnlich maskuliner Duft mit fruchtig-würzigen Akzenten. Die Kopfnote wird aus einem fruchtigen Bouquet aus Schwarzer Johannisbeere, Bergamotte, Apfel und Ananas dominiert.\r\nCreed Aventus - ein Duft für Helden\r\n\r\nJasmin, Patchouli, Birke und Wacholderbeeren wirken leicht und verspielt in der Herznote. Die herb-würzige Kombination aus Moschus, Eichenmoos, Ambergris und Vanille bringen den besonders männlichen Akzent von Creed Aventus zum Vorschein. Das Aventus Parfum brilliert in einem edlen Flakon, der Stil, Eleganz und pure Männlichkeit in einem Design verkörpert. Eine faszinierende Mischung aus Glas, das bis zur Hälfte mit schwarzem Lack überzogen wurde, macht diesen Flakon zu einer optischen Augenweide. Die schwarze Kappe und die geschwungen Schwerter als Emblem zeugen von einer edlen und stilvollen Herkunft.\r\n\r\nCreed Aventus wurde 2010 von dem Meisterparfümeur Olivier Creed für die Kollektion Creed Herrendüfte entwickelt. Das Haus Creed wurde 1760 in London gegründet und entwickelte sich mit der Zeit zur Hofschneiderei für berühmte Monarchen wie Queen Victoria oder Kaiserin Eugenie. Heute liegt der Firmensitz in Paris und wird von Olivier Creed geleitet. Die Produktpalette von Creed Aventus besteht aus Eau de Toilette, After Shave Balm , Deodorant, Seife, Body Oil und einem Shower Gel. Genießen auch Sie diesen herrlich maskulinen Duft auf Ihrer Haut!', 'creed-millesime-for-men-aventus-eau-de-parfum.jpg', 1),
(4, 'Signatures of the Sun Oud&Spice \r\nEau de Parfum', 4, '176.00', '100.0000', 1, 0, 'Acqua di Parma', 'Eine einzigartige Kombination zweier olfaktorischer Erlebnisse:\r\nder opulente Duft von Oud, verstärkt durch lebendige und frische Zitrusnoten.\r\nDie kraftvollen und einnehmenden Noten von Oud werden destilliert und mit den warmen, würzigen Duftakkorden von Zimt und Nelken zu einer unvergesslichen Duftkomposition ', 'acqua-di-parma-signatures-of-the-sun-oud-spice-eau-de-parfum.jpg', 1),
(5, 'Sì\r\nEau de Parfum', 5, '68.00', '100.0000', 1, 0, 'Giorgio Armani', 'Si zu Träumen, Si zur Liebe, Si zum Leben, Si zu sich selbst! ,,Si ist die italienische Art, ,,Ja\" zu sagen. Designer Giorgio Armani beschreibt seinen neuen Damenduft ,,Si\" als eine Hommage an die moderne Weiblichkeit: ein unwiderstehliches Zusammenspiel aus Eleganz, Stärke und Unabhängigkeit. Anmutig und unverwechselbar spiegelt der Duft die Gegensätze der Frau wider, die ihre Freiheit lebt und doch verbunden ist. Selbstbewusst und lebensbejahend nimmt sie ihre Zukunft in die Hand. ,,Si\" ist eine Neuinterpretation des modernen Chypre, ein Duft, der das Herz berührt und die Sinne fesselt. Fruchtige Johannisbeere und Mandarine in der Kopfnote treffen auf zarte florale Noten der Freesie, Rose und Osmanthus im Herzen. Verfeinert wird die Komposition durch einen Hauch Vanille, Patschuli und edle Holznoten, die dem Duft seine unwiderstehlich sinnliche Wärme verleihen. Sagen auch Sie ,,S?\" zu enthusiastischer Lebensfreude und zu sich selbst. \"', 'giorgio-armani-si-eau-de-parfum.jpg', 0),
(6, 'Miss Dior', 6, '113.00', '100.0000', 1, 0, 'Dior', 'Das neue Miss Dior Eau de Parfum ist ein farbenfrohes florales Bouquet, gleich einem „Millefiori“-Motiv, in dem Noten wie die der Rose aus Grasse, der Pfingstrose, der Iris und des Maiglöckchens zum Leben erwachen. Die Miss Dior Couture-Schleife, ein außergewöhnlicher Couture-Akzent, ist mit einer Vielzahl bunter Tupfen bestickt, die wie Blüten aussehen.\r\n\r\n„Das florale Bouquet des neuen Miss Dior Eau de Parfum weckt mit seiner Sinnlichkeit all unsere Sinne. Es feiert samtige und sinnliche Rosen, die von frischen Maiglöckchen und pikanter Pfingstrose betont werden, alles umgeben von pudriger Iris.“\r\n\r\nDie elegante und ein bisschen kecke Miss Dior Schleife – die Form wird auch als „Poignard“ oder „Schwalbenschwanz“ bezeichnet – ist eine universelle Signatur, ein Erkennungsmerkmal der Couture. Sie wurde jetzt mit einem Sinn für Luxus und einem außergewöhnlichen Savoir-faire neu erfunden. Um den Hals des Flakons zu schmücken, wurde hinter den verschlossenen Türen der Ateliers eines der renommiertesten Bandmacher Frankreichs, der sich seit Jahrzehnten Kreationen für Haute-Couture-Modenschauen widmet, ein außergewöhnliches Band hergestellt.\r\n\r\nIn monatelanger Arbeit entstand auf traditionellen Holzwebstühlen ein Jacquard-Band aus etwa 396 Fäden mit ca. 12.000 Kreuzungen pro Zentimeter. Eine exquisite, sorgfältig gearbeitete Kreation mit einer Vielzahl von pastellfarbenen Blüten, die jede Schleife aus dem Jacquard-Band zieren.\r\n\r\nFür dieses zentimeterlange Band waren genauso viel Kreativität, Zeit und Aufmerksamkeit erforderlich wie für jene Bänder, die die schönsten Kleider bei den Modenschauen zieren.', 'dior-miss-dior-eau-de-parfum.jpg', 0),
(7, 'Millesime for Women Aventus for Her\r\nEau de Parfum', 7, '310.00', '100.0000', 1, 0, 'Creed', 'AVENTUS FOR HER ist der sehnlich erwartete, die Sinne beflügelnde neue Damenduft, der perfekt die Aura, den anbetungswürdigen Charakter seines maskulinen Gegenparts reflektiert. Die filigrane, über Jahre dauernde Kreation des faszinierenden Parfums ist inspiriert von der Kraft, Schönheit und Mystik der Amazonen – sagenumwobene Heldinnen, die auf dem Rücken ihrer Pferde unerschrocken für ihre Freiheit und ihre Ziele kämpfen. Gleichzeitig ist es eine Hommage an die starke, moderne Frau von heute. Eine olfaktorische Ode an vibrierende, leidenschaftliche Weiblichkeit und gleichzeitig auch ', 'creed-millesime-for-women-aventus-for-her-eau-de-parfum.jpg', 1),
(8, 'Women Delina Exclusif\r\nEau de Parfum', 8, '295.00', '100.0000', 1, 0, 'Parfums de Marly', 'Was wäre, wenn Sie auf einem spontanen Spaziergang durch einen orientalischen Garten wären, in dem Orangen, Palmen, Jasmin und Olivenbäumen stehen? Wie bei diesem unbeschwerten Gang durch einen Garten der Fantasie beginnt Delina Exclusif als ein Kaleidoskop von Erfahrungen und Gefühlen. Bei Delina Exclusif steht türkische Rosenessenz höchster Güte im Zentrum, die frischer und luxuriöser zugleich ist. Eine orientalische Blütennote mit einer holzigen Facette, vanillig und pudrig und sinnlicher als die ursprüngliche Note.\r\n\r\nAlle Geheimnisse des Orients sind hier, in dieser luxuriösen Konzentration der Verführung, die kraftvoll und sinnlich aufgeladen ist. Und wer ist die Trägerin? Eine Frau, die unendlich geheimnisvoll ist, mutig genug, diesen Überfluss für die Sinne für sich zu wählen.\r\n\r\nBei dieser exklusiven Kreation von Parfums de Marly, der intensiveren Quintessenz und luxuriösen Neuinterpretation von Delina, wurde der Name „Delina Exclusif“ in Silber auf den Flakon gesetzt.', 'parfums-de-marly-women-delina-exklusif-eau-de-parfum.jpg', 1),
(9, 'Le Male\r\nDeodorant Stick', 9, '29.00', '100.0000', 1, 0, 'Jean Paul Gaultier', 'Ein ambivalenter Matrose, maskulin und sexy wie ein Toy Boy\r\n\r\nLang anhaltender Frischeschutz.\r\n\r\nDieser praktische Deodorant Stift ist sanft zur Haut und bietet wirksamen Schutz. Eine lang anhaltende Wirkung in jeder Lebenslage.', 'jean-paul-gaultier-le-male-deostick.jpg', 0),
(10, '1 Million Deodorant Spray', 10, '15.00', '100.0000', 1, 0, 'Paco Rabanne', 'Das Paco Rabanne One Million Deospray - ein verführerisch maskuliner Duft\r\n\r\nDas Paco Rabanne One Million Deospray vereint klassische Deo Eigenschaften mit dem unverwechselbaren Duft des Eau de Toilette der Serie. Es bietet einen langanhaltenden Transpirationsschutz und hält die Haut den ganzen Tag wunderbar trocken. Das leichte Deospray erfüllt schon nach kurzem Sprühen was es verspricht. Der verführerische One Million Duft taucht jeden Mann in eine Aura aus Selbstbewusstsein und Lebensfreude. Holzig-würzige Nuancen verführen mit Akzenten von fruchtiger Blutorange, lieblicher Rose und herbem Leder. Bestellen Sie das Paco Rabanne One Million Deospray jetzt bei flaconi und ziehen Sie die Aufmerksamkeit der Frauenwelt auf sich.', 'paco-rabanne-one-million-deospray.jpg', 0),
(11, 'Lady Million\r\nDeodorant Spray', 11, '15.00', '100.0000', 1, 0, 'Paco Rabanne', 'Sorgt für ein Gefühl von Frische und bietet lang anhaltenden Schutz mit dem Duft von Lady Million.', 'paco-rabanne-lady-million-deodorant-spray.jpg', 0),
(12, 'Angel\r\nDeodorant Spray', 12, '39.00', '100.0000', 1, 0, 'MUGLER', 'Verwöhnen Sie Ihre Haut mit Duft und lassen Sie sich von Angel bezaubern, lassen Sie Ihren Emotionen freien Lauf. Eine feine und frische, nicht anhaftende Textur, die ein unmittelbares Gefühl von Komfort für die tägliche Anwendung vermittelt. Ohne Aluminium. Kein Antitranspirant. ', 'mugler-angel-deodorant-spray.jpg', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(6, 3, 5),
(7, 4, 1),
(8, 4, 5),
(9, 5, 2),
(10, 5, 3),
(11, 6, 2),
(12, 6, 3),
(13, 7, 2),
(14, 7, 5),
(15, 8, 2),
(16, 8, 5),
(17, 9, 1),
(18, 9, 4),
(19, 10, 1),
(20, 10, 4),
(21, 11, 2),
(22, 11, 4),
(23, 12, 2),
(24, 12, 4);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_items_ibfk_1` (`order_id`),
  ADD KEY `ordered_items_ibfk_2` (`product_id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`client_id`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD CONSTRAINT `ordered_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordered_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
