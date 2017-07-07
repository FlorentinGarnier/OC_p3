-- Création de la base de donnée
-- -----------------------------

DROP SCHEMA IF EXISTS Blog;
CREATE SCHEMA IF NOT EXISTS Blog CHARACTER SET 'utf8';
USE Blog;

-- Création des tables
-- -------------------


-- Tables Role
-- -----------

CREATE TABLE IF NOT EXISTS roles(
  id INT AUTO_INCREMENT PRIMARY KEY,
  roles VARCHAR(45)
)
  ENGINE = INNODB;

-- Table User
-- ---------

CREATE TABLE IF NOT EXISTS user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(16),
  lastname VARCHAR(16),
  email VARCHAR(255) NOT NULL ,
  password VARCHAR(65) NOT NULL,
  createdAt DATETIME NOT NULL,
  updatedAt DATETIME,
  roles_id INT,
  CONSTRAINT fk_roles
  FOREIGN KEY (roles_id)
    REFERENCES roles(id),
  INDEX fk_roles_idx (roles_id ASC),
  UNIQUE INDEX id_UNIQUE (id ASC)

)
  ENGINE=INNODB;


-- Table category
-- --------------

CREATE TABLE IF NOT EXISTS category(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  createdAt DATETIME NOT NULL,
  updatedAt DATETIME,
  UNIQUE INDEX id_UNIQUE (id ASC)

)
  ENGINE = INNODB;


-- Tables Billet
-- -------------

CREATE TABLE IF NOT EXISTS billet(
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(45) NOT NULL,
  content LONGTEXT NOT NULL,
  createdAt DATETIME NOT NULL,
  updatedAt DATETIME,
  category_id INT,
  user_id INT,
  CONSTRAINT fk_user
  FOREIGN KEY (user_id)
    REFERENCES user(id),
  CONSTRAINT fk_category
  FOREIGN KEY (category_id)
    REFERENCES category(id),
  INDEX fk_category_idx (category_id ASC),
  UNIQUE INDEX id_UNIQUE (id ASC)


)
  ENGINE = INNODB;


-- Table commentary
-- ----------------

CREATE TABLE IF NOT EXISTS commentary(
  id INT AUTO_INCREMENT PRIMARY KEY,
  content VARCHAR(45) NOT NULL,
  createdAt DATETIME NOT NULL,
  updatedAt DATETIME,
  UNIQUE INDEX id_UNIQUE (id ASC)

)
  ENGINE = INNODB;

-- Table billet has commentary
-- ---------------------------

CREATE TABLE IF NOT EXISTS billet_has_commentary(
  billet_id INT,
  commentary_id INT,
  CONSTRAINT fk_billet_id
  FOREIGN KEY (billet_id)
    REFERENCES billet(id),
  CONSTRAINT fk_billet_has_commentary_id
  FOREIGN KEY (commentary_id)
    REFERENCES commentary(id),
  PRIMARY KEY (billet_id, commentary_id)

)
  ENGINE = INNODB;


-- Table commentary has commentary
-- -------------------------------

CREATE TABLE IF NOT EXISTS commentary_has_commentary(
  commentary_id INT,
  child_commentary_id INT,
  PRIMARY KEY (commentary_id, child_commentary_id),
  CONSTRAINT fk_commentary_id
    FOREIGN KEY (commentary_id)
    REFERENCES commentary(id),
  CONSTRAINT fk_child_commentary_id
  FOREIGN KEY (child_commentary_id)
    REFERENCES commentary(id)
)
  ENGINE = INNODB;