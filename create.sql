DROP DATABASE IF EXISTS assignment2;
CREATE DATABASE assignment2;
USE assignment2;

create table bands (
   name varchar(50),
   startDate varchar(50),
   endDate varchar(50),
   vocals varchar(50),
   guitar varchar(50),
   keybaord varchar(50),
   synthesizer varchar(50),
   bass varchar(50),
   drums varchar(50),
   percussion varchar(50),
   backingVocals varchar(50),
   rhythmGuitar varchar(50),
   bandID int AUTO_INCREMENT,
   PRIMARY KEY(bandID)
) engine = InnoDB;

create table players (
   name varchar(50),
   birthDate varchar(50),
   deathDate varchar(50),
   city varchar(50),
   state varchar(50),
   country varchar(50),
   playerID int AUTO_INCREMENT,
   PRIMARY KEY(playerID)
) engine = InnoDB;
