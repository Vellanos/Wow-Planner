CREATE TABLE User
(
  id     INTEGER      NOT NULL AUTO_INCREMENT,
  pseudo VARCHAR(255) NOT NULL,
  mail   VARCHAR(320) NOT NULL,
  mdp    VARCHAR(60)  NOT NULL,
  guild  VARCHAR(255) NULL    ,
  PRIMARY KEY (id)
);

ALTER TABLE User
  ADD CONSTRAINT UQ_id UNIQUE (id);

CREATE TABLE Classe
(
  id      INTEGER      NOT NULL AUTO_INCREMENT,
  nom     VARCHAR(32)  NOT NULL,
  couleur VARCHAR(6)   NOT NULL,
  icone   VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE Classe
  ADD CONSTRAINT UQ_id UNIQUE (id);

CREATE TABLE EventHasPerso
(
  personnage_id INTEGER NOT NULL,
  event_id      INTEGER NOT NULL
);

CREATE TABLE EventTable
(
  id      INTEGER NOT NULL AUTO_INCREMENT,
  date    DATE    NOT NULL,
  horaire TIME    NOT NULL,
  raid_id INTEGER NOT NULL,
  user_id INTEGER NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE EventTable
  ADD CONSTRAINT UQ_id UNIQUE (id);

CREATE TABLE GameVersion
(
  id  INTEGER     NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE GameVersion
  ADD CONSTRAINT UQ_id UNIQUE (id);

CREATE TABLE Personnage
(
  id        INTEGER     NOT NULL AUTO_INCREMENT,
  nom       VARCHAR(12) NOT NULL,
  classe_id INTEGER     NOT NULL,
  user_id   INTEGER     NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE Personnage
  ADD CONSTRAINT UQ_id UNIQUE (id);

CREATE TABLE Raid
(
  id             INTEGER      NOT NULL AUTO_INCREMENT,
  nom            VARCHAR(255) NOT NULL,
  gameversion_id INTEGER      NOT NULL,
  img            VARCHAR(60)  NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE Raid
  ADD CONSTRAINT UQ_id UNIQUE (id);

CREATE TABLE Specialisation
(
  id        INTEGER     NOT NULL AUTO_INCREMENT,
  role      VARCHAR(4)  NOT NULL,
  name       VARCHAR(32) NOT NULL,
  classe_id INTEGER     NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE Specialisation
  ADD CONSTRAINT UQ_id UNIQUE (id);

ALTER TABLE EventHasPerso
  ADD CONSTRAINT FK_Personnage_TO_EventHasPerso
    FOREIGN KEY (personnage_id)
    REFERENCES Personnage (id);

ALTER TABLE EventHasPerso
  ADD CONSTRAINT FK_EventTable_TO_EventHasPerso
    FOREIGN KEY (event_id)
    REFERENCES EventTable (id);

ALTER TABLE EventTable
  ADD CONSTRAINT FK_Raid_TO_EventTable
    FOREIGN KEY (raid_id)
    REFERENCES Raid (id);

ALTER TABLE EventTable
  ADD CONSTRAINT FK_User_TO_EventTable
    FOREIGN KEY (user_id)
    REFERENCES User (id);

ALTER TABLE Personnage
  ADD CONSTRAINT FK_Classe_TO_Personnage
    FOREIGN KEY (classe_id)
    REFERENCES Classe (id);

ALTER TABLE Raid
  ADD CONSTRAINT FK_GameVersion_TO_Raid
    FOREIGN KEY (gameversion_id)
    REFERENCES GameVersion (id);

ALTER TABLE Specialisation
  ADD CONSTRAINT FK_Classe_TO_Specialisation
    FOREIGN KEY (classe_id)
    REFERENCES Classe (id);

ALTER TABLE Personnage
  ADD CONSTRAINT FK_User_TO_Personnage
    FOREIGN KEY (user_id)
    REFERENCES User (id);
