-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Juin 2017 à 14:21
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dvd`
--

-- --------------------------------------------------------

--
-- Structure de la table `acquisition`
--

CREATE TABLE `acquisition` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_nb` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `acquisition`
--

INSERT INTO `acquisition` (`id`, `date`, `fk_film`, `fk_nb`) VALUES
(1, '2017-05-09', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `acteur`
--

INSERT INTO `acteur` (`id`, `fk_film`, `nom`, `prenom`, `age`, `sexe`) VALUES
(1, 1, 'Jean-Jean', 'le bambou', 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `biographie` text NOT NULL,
  `age` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dash` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `biographie`, `age`, `image`, `dash`) VALUES
(1, 'Jacky et michel', 'Jeune et dynamique nouveaux venue dans le cinéma classé X les nouveaux talent du porno ', '35', 'https://cdn.meme.am/images/100x100/13976224.jpg', 'https://www.bullesociale.fr/bscdn/foozine/images/articles/478/478.jpg'),
(2, 'Gérard Depardieu', 'Gérard Depardieu, né le 27 décembre 1948 à Châteauroux, est un acteur français. Il est également citoyen russe depuis 2013. Révélé en 1974 par le film Les Valseuses, il est depuis l\'un des comédiens les plus actifs et l\'une des principales vedettes du cinéma français.', '22', 'https://www.citatum.hu/kepek/szerzok/depardieu_gerard.jpg', 'http://i.telegraph.co.uk/multimedia/archive/03060/depardieu_3060378c.jpg'),
(3, 'Charles Baudelaire', 'Charles Baudelaire est un poète français. Né à Paris le 9 avril 1821, il meurt dans la même ville le 31 août 1867 (à 46 ans).\r\n\r\n« Dante d’une époque déchue2 » selon le mot de Barbey d’Aurevilly, « tourné vers le classicisme, nourri de romantisme3 », à la croisée entre le Parnasse et le symbolisme, chantre de la « modernité », il occupe une place considérable parmi les poètes français pour un recueil certes bref au regard de l’œuvre de son contemporain Victor Hugo (Baudelaire s’ouvrit à son éditeur de sa crainte que son volume ne ressemblât trop à une plaquette…), mais qu’il aura façonné sa vie durant : Les Fleurs du mal.', 'décéder', 'http://www.ac-corse.fr/Lettres/photo/art/default/1006035-1262413.jpg', 'http://ddydc3qiky-flywheel.netdna-ssl.com/wp-content/uploads/2016/09/adolph-hitler-micropenis-650x350.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`) VALUES
(1, 'action'),
(2, 'aventure'),
(3, 'Science fiction'),
(4, 'porno'),
(5, 'dessin animé'),
(6, 'thriller');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `date` date NOT NULL,
  `texte` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `fk_film`, `date`, `texte`) VALUES
(1, 1, '2017-05-29', 'Qu\'est-ce que le Lorem Ipsum?\r\nLe Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.'),
(2, 2, '2017-05-04', 'coucou');

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='nom du directeur';

--
-- Contenu de la table `directeur`
--

INSERT INTO `directeur` (`id`, `nom`) VALUES
(1, 'Jean michel');

-- --------------------------------------------------------

--
-- Structure de la table `dvd`
--

CREATE TABLE `dvd` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `preambule` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) NOT NULL,
  `année_sortie` date NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `fk_cat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `dvd`
--

INSERT INTO `dvd` (`id`, `titre`, `preambule`, `image`, `auteur`, `année_sortie`, `serial_number`, `prix`, `fk_cat`) VALUES
(1, 'les dents du string 2', '<p>\r\n	Si certains fans s&#39;organisent volontiers des road trips pour d&eacute;couvrir avec &eacute;merveillement les lieux de tournage de leurs films pr&eacute;f&eacute;r&eacute;s, d&#39;autres choisissent de se faire peur ! Pour sa toute derni&egrave;re vid&eacute;o intitul&eacute;e The Road Trip Project, la cha&icirc;ne Youtube des canadiens de Moon Film, qui s&#39;&eacute;tait d&eacute;j&agrave; amus&eacute;e &agrave; compiler 120 ans de cin&eacute;ma en 120 secondes, se place ainsi sous le signe de l&#39;horreur pour nous faire d&eacute;couvrir les lieux de tournage de 15 grands films du cin&eacute;ma d&#39;horreur.</p>\r\n', 'https://warnerbros-newsroom-prod-cache.s3-eu-west-1.amazonaws.com/lineup_news_affiche/last/image-1111.png', 'jacky et michel', '2010-05-01', 'sdeezfgbiehfb', '20€', 4),
(2, 'le surfeur fisteur', 'Baywatch : Alerte à Malibu, ou Alerte à Malibu au Québec, est un film américain réalisé par Seth Gordon, sorti en 2017. Il s\'agit d\'une adaptation cinématographique de la série télévisée du même nom.', 'https://expresfilm.com/wp-content/uploads/2017/05/Sahil-Güvenlik-Baywatch-İzle.jpg', 'nanare', '2017-01-10', 'frddsgdfggfd', '15€', 1),
(3, 'les orphelins violer', 'Charles Baudelaire est un poète français. Né à Paris le 9 avril 1821, il meurt dans la même ville le 31 août 1867 (à 46 ans).  « Dante d’une époque déchue2 » selon le mot de Barbey d’Aurevilly, « tourné vers le classicisme, nourri de romantisme3 », à la croisée entre le Parnasse et le symbolisme, chantre de la « modernité », il occupe une place considérable parmi les poètes français pour un recueil certes bref au regard de l’œuvre de son contemporain Victor Hugo (Baudelaire s’ouvrit à son éditeur de sa crainte que son volume ne ressemblât trop à une plaquette…), mais qu’il aura façonné sa vie durant : Les Fleurs du mal.  Au cœur des débats sur la fonction de la littérature de son époque, Baudelaire détache la poésie de la morale, la proclame tout entière destinée au Beau et non à la Vérité4. Comme le suggère le titre de son recueil, il a tenté de tisser des liens entre le mal et la beauté, le bonheur fugitif et l’idéal inaccessible (À une passante), la violence et la volupté (Une martyre), mais aussi entre le poète et son lecteur (« Hypocrite lecteur, mon semblable, mon frère ») et même entre les artistes à travers les âges (Les Phares)5. Outre des poèmes graves (Semper Eadem) ou scandaleux (Delphine et Hippolyte), il a exprimé la mélancolie (Mœsta et errabunda), l’horreur (Une charogne) et l’envie d’ailleurs (L’Invitation au voyage) à travers l’exotisme.', 'http://www.serie-enstreaming.com/wp-content/uploads/2016/12/1474347023_poster-900038-240x350.jpg', 'trashman', '2016-06-15', 'gfdqsgsddfhgdf', '12€', 3);

-- --------------------------------------------------------

--
-- Structure de la table `horraire`
--

CREATE TABLE `horraire` (
  `id` int(11) NOT NULL,
  `ouverture_semaine` varchar(25) NOT NULL,
  `fermeture_semaine` varchar(25) NOT NULL,
  `ouverture_weekend` varchar(25) NOT NULL,
  `fermeture_weekend` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `horraire`
--

INSERT INTO `horraire` (`id`, `ouverture_semaine`, `fermeture_semaine`, `ouverture_weekend`, `fermeture_weekend`) VALUES
(1, '8:00', '20:00', '8:00', '20:00');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(2, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'Lorem Ipsum is simply dummy text.'),
(4, 'Le sufeur fisteur', 'le-sufeur-fisteur', 'bon je sais que ça ne ressemble a rien mais bon yannick ne m\'en veux pas dis toi que la fonctionnalité est belle est bien la :)\r\n\r\naller bon courage\r\n\r\nPS: oui mon code est un gros bordel');

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

CREATE TABLE `quantite` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `quantite`
--

INSERT INTO `quantite` (`id`, `quantite`) VALUES
(1, 5423),
(2, 2154);

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `fk_directeur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='données des sociétés';

--
-- Contenu de la table `societe`
--

INSERT INTO `societe` (`id`, `nom`, `adresse`, `fk_directeur`) VALUES
(1, 'Van damme', '2 rue du karate', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acquisition`
--
ALTER TABLE `acquisition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_film` (`fk_film`),
  ADD KEY `fk_nb` (`fk_nb`);

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_film` (`fk_film`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_film` (`fk_film`);

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat` (`fk_cat`);

--
-- Index pour la table `horraire`
--
ALTER TABLE `horraire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Index pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_directeur` (`fk_directeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acquisition`
--
ALTER TABLE `acquisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `directeur`
--
ALTER TABLE `directeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `horraire`
--
ALTER TABLE `horraire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `quantite`
--
ALTER TABLE `quantite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `societe`
--
ALTER TABLE `societe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
