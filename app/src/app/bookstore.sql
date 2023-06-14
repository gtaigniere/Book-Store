--
-- Base de données :  `bookstore`
--
CREATE DATABASE IF NOT EXISTS bookstore DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE bookstore;

-- --------------------------------------------------------

--
-- Structure de la table `book`
--
CREATE TABLE book (
    id INT NOT NULL AUTO_INCREMENT,
    name TINYTEXT NOT NULL,
    publisher TINYTEXT NOT NULL,
    price DECIMAL(6,2) DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `book`
--

INSERT INTO book (id, name, publisher, price) VALUES
    (1, 'Le mage', 'Mister Fantasy', 9.90),
    (2, 'Gagner la guerre', 'Les moutons électriques', 28),
    (3, 'La novice', 'France loisirs', 25.99),
    (4, 'Le roi des Murgos', 'Pocket', 8.70),
    (5, 'Le vaisseau elfique', 'Payot & Rivages', 20.60);

-- --------------------------------------------------------

