CREATE TABLE Proizvodjac (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Naziv TEXT NOT NULL,
  PRIMARY KEY(ID)
)
ENGINE=InnoDB;

CREATE TABLE Model (
  ID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Proizvodjac_ID INTEGER UNSIGNED NOT NULL,
  Naziv TEXT NULL,
  Godina SMALLINT UNSIGNED NULL,
  Cena INTEGER UNSIGNED NULL,
  PRIMARY KEY(ID),
  INDEX Model_FKIndex1(Proizvodjac_ID),
  FOREIGN KEY(Proizvodjac_ID)
    REFERENCES Proizvodjac(ID)
      ON DELETE RESTRICT
      ON UPDATE CASCADE
)
ENGINE=InnoDB;