#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


CREATE TABLE Jeux(
        idJeu        int (11) Auto_increment  NOT NULL ,
        ImgJeu       Varchar (100) ,
        NomJeu       Varchar (50) NOT NULL ,
        DateJeu      Date NOT NULL ,
        Descriptif__ Text ,
        Video        Varchar (100) ,
        PRIMARY KEY (idJeu )
)ENGINE=InnoDB;


CREATE TABLE Consoles(
        idConsole   int (11) Auto_increment  NOT NULL ,
        NomConsole  Varchar (20) NOT NULL ,
        ImgConsole  Varchar (100) ,
        DateConsole Date ,
        PRIMARY KEY (idConsole )
)ENGINE=InnoDB;


CREATE TABLE Concerne(
        idConsole Int NOT NULL ,
        idJeu     Int NOT NULL ,
        PRIMARY KEY (idConsole ,idJeu )
)ENGINE=InnoDB;

ALTER TABLE Concerne ADD CONSTRAINT FK_Concerne_idConsole FOREIGN KEY (idConsole) REFERENCES Consoles(idConsole);
ALTER TABLE Concerne ADD CONSTRAINT FK_Concerne_idJeu FOREIGN KEY (idJeu) REFERENCES Jeux(idJeu);
