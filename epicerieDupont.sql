-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.14-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table projet_php_epicerie.panier : ~9 rows (environ)
/*!40000 ALTER TABLE `panier` DISABLE KEYS */;
/*!40000 ALTER TABLE `panier` ENABLE KEYS */;

-- Listage des données de la table projet_php_epicerie.produit : ~20 rows (environ)
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`id`, `url`, `description`, `prix`) VALUES
	(1, 'imgProduit/cafeClassique.jpg', 'La variété Senseo Classique est un mélange de grains arabica et robusta torréfiés à cœur, pour un café parfaitement équilibré.', 4),
	(2, 'imgProduit/granola.png', 'Découvrez le Sablé Granola nappé au chocolat au lait fondant. Granola, ça cache toujours quelque chose d’EXTRA !', 3),
	(3, 'imgProduit/cafeDoux.jpg', 'La finesse des grains arabica légérement torréfiés confère au café Senseo® Doux son caractère raffiné et sa douceur.', 3),
	(4, 'imgProduit/cereales.jpg', 'De délicieuses céréales de riz soufflé au bon goût de chocolat de la jungle ! Une recette simple et unique qui fait plaisir à votre enfant.', 3),
	(5, 'imgProduit/chocapic.jpg', 'De délicieux pétales de céréales forts en chocolat, avec du blé complet cultivé avec des méthodes toujours plus responsables.', 3),
	(6, 'imgProduit/pates.jpg', 'Variez les plaisirs avec les nouvelles formes de pâtes fantaisies de Panzani ! Découvrez le Pipe Rigate, une forme originale qui retient bien les sauces !', 4),
	(7, 'imgProduit/demelant.jpg', 'Le Démêlant Purifiant Argile Extraordinaire, enrichi en 3 argiles fines, démêle et hydrate intensément vos longueurs sans les alourdir.', 5),
	(8, 'imgProduit/mache.jpg', 'Traditionnellement cultivée dans les terres fines de la région Nantaise, cette salade délicate est associée à des assaisonnements légers.', 2),
	(9, 'imgProduit/lentilles.jpg', 'Finis les légumes longs et complexes à préparer ! Bonduelle vous propose des lentilles cuites dans très peu de jus, pour une saveur respectées.', 3),
	(10, 'imgProduit/riz.jpg', 'Le riz Basmati Sélection Lustucru a été choisi avec le plus grand soin pour la finesse de ses grains et la subtilité de son parfum.', 4),
	(11, 'imgProduit/sacPoubelle.jpg', 'Plus respectueux de l’environnement, je suis fabriqué à partir de 90% de plastique recyclés, je consomme moins de ressources.', 2),
	(12, 'imgProduit/mir.jpg', 'Mir Vaisselle secrets authentiques de Vinaigre Framboise Groseille* est un liquide vaisselle facilement reconnaissable à sa couleur.', 1),
	(13, 'imgProduit/cordonBleu.jpg', 'Une tendre viande de poulet ou de dinde 100% filets, agrémentée de fromage fondant et d’un savoureux jambon fumé de dinde sans sel nitrité.', 3),
	(14, 'imgProduit/petitsPois.jpg', 'Cette mélodie de petits pois tendres et fondants cuisinés dans un jus aux notes raffinées ravira les palais les plus délicats.', 4),
	(15, 'imgProduit/farine.jpg', 'Grâce à son savoir-faire inégalé, Francine crée des farines pour vous simplifier la cuisine et créer des recettes savoureuses.', 3),
	(16, 'imgProduit/gel_douche.jpg', 'Sa formule spécialement développée pour les peaux sensibles et délicates, nettoie votre peau en douceur et la laisse nette et propre.', 4),
	(17, 'imgProduit/sel.jpg', 'Les fins cristaux caractérisant le sel de mer fin La Baleine sont naturellement blancs et non raffinés. Il relève le goût des viandes, légumes et féculents.', 2),
	(18, 'imgProduit/tomates.jpg', 'Cette petite tomate de forme oblongue présente un diamètre de 2 à 3 cm ce qui la rend particulièrement adaptée au snacking.', 2),
	(19, 'imgProduit/lessive.jpg', 'Découvrez la nouvelle formule Super Croix 40% plus concentrée pour toujours plus de praticité et un impact réduit sur l’environnement.', 8),
	(20, 'imgProduit/dentifrice.jpeg', 'Le Dentifrice Signal Integral 8 Complet contient une formule antibactérienne au Pro-Time Zinc pour une action anti-plaque dentaire qui dure 18 heures.', 2);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

-- Listage des données de la table projet_php_epicerie.utilisateur : ~7 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
