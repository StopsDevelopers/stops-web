DROP DATABASE IF EXISTS Stops;

CREATE DATABASE Stops;

USE Stops;

CREATE TABLE Country(
	  idCountry INT UNSIGNED NOT NULL AUTO_INCREMENT,
    code VARCHAR(3) NOT NULL,
    name VARCHAR(150) NOT NULL,
    areaCode INT NOT NULL,
    PRIMARY KEY (idCountry)
);

CREATE TABLE State(
	  idState INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    fkCountry INT UNSIGNED NOT NULL,
    PRIMARY KEY (idState),
    FOREIGN KEY (fkCountry) REFERENCES Country(idCountry)
);

CREATE TABLE City(
	  idCity INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    fkState INT UNSIGNED NOT NULL,
    PRIMARY KEY (idCity),
    FOREIGN KEY (fkState) REFERENCES State(idState)
);

CREATE TABLE Address(
	  idAddress INT UNSIGNED NOT NULL AUTO_INCREMENT,
    street VARCHAR(100) NOT NULL ,
    neighborhood VARCHAR(100) NOT NULL,
    zipCode VARCHAR(5),
    exteriorNumber TINYINT NOT NULL,
    interiorNumber TINYINT,
    fkCity INT UNSIGNED NOT NULL,
    PRIMARY KEY (idAddress),
    FOREIGN KEY (fkCity) REFERENCES City(idCity)
);

CREATE TABLE Profile(
	  idProfile INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    avatar TEXT,
    isVisible BIT NOT NULL DEFAULT 1,
    PRIMARY KEY (idProfile)
);

CREATE TABLE User(
	  idUser INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    email VARCHAR(60) NOT NULL UNIQUE,
    birthday DATE,
    releaseDate DATE,
    fkAddress INT UNSIGNED NOT NULL,
    fkProfile int UNSIGNED NOT NULL,
    PRIMARY KEY (idUser),
    FOREIGN KEY (fkAddress) REFERENCES Address(idAddress),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile)
);

CREATE TABLE Business(
	  idBusiness INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(100),
    releaseDate DATE,
    isActive BIT NOT NULL DEFAULT 1,
    email VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (idBusiness)
);

CREATE TABLE Stop(
	  idStop INT UNSIGNED NOT NULL AUTO_INCREMENT,
    releaseDate DATE NOT NULL,
    lastChangeDate DATETIME NOT NULL,
    count INT NOT NULL,
    fkUser INT UNSIGNED NOT NULL,
    fkBusiness INT UNSIGNED NOT NULL,
    PRIMARY KEY (idStop),
    FOREIGN KEY (fkUser) REFERENCES User(idUser),
    FOREIGN KEY (fkBusiness) REFERENCES Business(idBusiness)
);

CREATE TABLE Category(
    idCategory INT UNSIGNED NOT NULL AUTO_INCREMENT,
    icon VARCHAR(20) NOT NULL,
    name VARCHAR(30) NOT NULL,
    code VARCHAR(3) NOT NULL,
    description TEXT,
    PRIMARY KEY (idCategory)
);

CREATE TABLE Branch(
    idBranch INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    about TEXT,
    timeTable TEXT,
    description TEXT,
    releaseDate DATE NOT NULL,
    fkAddress INT UNSIGNED NOT NULL,
    fkProfile INT UNSIGNED NOT NULL,
    fkBusiness INT UNSIGNED NOT NULL,
    fkCategory INT UNSIGNED NOT NULL,
    PRIMARY KEY (idBranch),
    FOREIGN KEY (fkAddress) REFERENCES Address(idAddress),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY (fkBusiness) REFERENCES Business(idBusiness),
    FOREIGN KEY (fkCategory) REFERENCES Category(idCategory)
);

CREATE TABLE Award(
    idAward INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(200) NOT NULL,
    type ENUM('BONO_BIENVENIDA', 'BONO_CLIENTE_FRCUENTE', 'BONO_FAVORITO') NOT NULL,
    restriction TEXT NOT NULL,
    releaseDate DATE,
    deadline DATE,
    fkBusiness INT UNSIGNED NOT NULL,
    PRIMARY KEY (idAward),
    FOREIGN KEY (fkBusiness) REFERENCES Business(idBusiness)
);

CREATE TABLE Album(
    idAlbum INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(200),
    fkBranch INT UNSIGNED NOT NULL,
    PRIMARY KEY (idAlbum),
    FOREIGN KEY (fkBranch) REFERENCES Branch(idBranch)
);

CREATE TABLE MultimediaType(
    idMultimediaType INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    code VARCHAR(3) NOT NULL,
    PRIMARY KEY (idMultimediaType)
);

CREATE TABLE Multimedia(
    idMultimedia INT UNSIGNED NOT NULL AUTO_INCREMENT,
    path TEXT NOT NULL,
    date DATETIME NOT NULL,
    description TEXT,
    privacy TEXT,
    fkAlbum INT UNSIGNED NOT NULL,
    fkMultimediaType INT UNSIGNED NOT NULL,
    PRIMARY KEY (idMultimedia),
    FOREIGN KEY (fkAlbum) REFERENCES Album(idAlbum),
    FOREIGN KEY (fkMultimediaType) REFERENCES MultimediaType(idMultimediaType)
);

CREATE TABLE Promotion(
    idPromotion INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(200) NOT NULL,
    price TINYINT NOT NULL,
    releaseDate DATE,
    deadline DATE,
    restriction TEXT,
    fkBusiness INT UNSIGNED NOT NULL,
    fkMultimedia INT UNSIGNED NOT NULL,
    PRIMARY KEY (idPromotion),
    FOREIGN KEY (fkBusiness) REFERENCES Business(idBusiness),
    FOREIGN KEY (fkMultimedia) REFERENCES Multimedia(idMultimedia)
);

CREATE TABLE Coupon(
    idCoupon INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(200) NOT NULL,
    price TINYINT NOT NULL,
    releaseDate DATE,
    deadline DATE,
    restriction TEXT,
    fkBranch INT UNSIGNED NOT NULL,
    fkMultimedia INT UNSIGNED NOT NULL,
    PRIMARY KEY (idCoupon),
    FOREIGN KEY (fkBranch) REFERENCES Branch(idBranch),
    FOREIGN KEY (fkMultimedia) REFERENCES Multimedia(idMultimedia)
);

CREATE TABLE ClaimAward(
    idClaimAward INT UNSIGNED NOT NULL AUTO_INCREMENT,
    releaseDate DATETIME NOT NULL,
    fkUser INT UNSIGNED NOT NULL,
    fkAward INT UNSIGNED NOT NULL,
    PRIMARY KEY (idClaimAward),
    FOREIGN KEY (fkUser) REFERENCES User(idUser),
    FOREIGN KEY (fkAward) REFERENCES Award(idAward)
);

CREATE TABLE ClaimPromotion(
    idClaimPromotion INT UNSIGNED NOT NULL AUTO_INCREMENT,
    releaseDate DATETIME NOT NULL,
    fkUser INT UNSIGNED NOT NULL,
    fkPromotion INT UNSIGNED NOT NULL,
    PRIMARY KEY (idClaimPromotion),
    FOREIGN KEY (fkUser) REFERENCES User(idUser),
    FOREIGN KEY (fkPromotion) REFERENCES Promotion(idPromotion)
);

CREATE TABLE ClaimCoupon(
    idClaimCoupon INT UNSIGNED NOT NULL AUTO_INCREMENT,
    releaseDate DATETIME NOT NULL,
    fkUser INT UNSIGNED NOT NULL,
    fkCoupon INT UNSIGNED NOT NULL,
    PRIMARY KEY (idClaimCoupon),
    FOREIGN KEY (fkUser) REFERENCES User(idUser),
    FOREIGN KEY (fkCoupon) REFERENCES Coupon(idCoupon)
);

CREATE TABLE Visit(
    idVisit INT UNSIGNED NOT NULL AUTO_INCREMENT,
    date DATETIME NOT NULL,
    fkUser INT UNSIGNED NOT NULL,
    fkBranch INT UNSIGNED NOT NULL,
    PRIMARY KEY (idVisit),
    FOREIGN KEY (fkUser) REFERENCES User(idUser),
    FOREIGN KEY (fkBranch) REFERENCES Branch(idBranch)
);

CREATE TABLE Contact(
    idContact INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type ENUM('CONTACTO_FACEBOOK','CONTACTO_TWITTER','CONTACTO_SITIO_WEB','CONTACTO_TELEFONO','CONTACTO_CORREO') NOT NULL,
    info VARCHAR(100) NOT NULL,
    fkBranch INT UNSIGNED NOT NULL,
    PRIMARY KEY (idContact),
    FOREIGN KEY (fkBranch) REFERENCES Branch(idBranch)
);

CREATE TABLE Word(
    idWord INT UNSIGNED NOT NULL AUTO_INCREMENT,
    word VARCHAR(20) NOT NULL,
    PRIMARY KEY (idWord)
);

CREATE TABLE Topic(
    fkBranch INT UNSIGNED NOT NULL,
    fkWord INT UNSIGNED NOT NULL,
    FOREIGN KEY (fkBranch) REFERENCES Branch(idBranch),
    FOREIGN KEY (fkWord) REFERENCES Word(idWord)
);

CREATE TABLE Follow(
    idFollow INT UNSIGNED NOT NULL AUTO_INCREMENT,
    releaseDate DATE NOT NULL,
    fkUser INT UNSIGNED NOT NULL,
    fkProfile INT UNSIGNED NOT NULL,
    PRIMARY KEY (idFollow),
    FOREIGN KEY (fkUser) REFERENCES User(idUser),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile)
);

CREATE TABLE Post(
    idPost INT UNSIGNED NOT NULL AUTO_INCREMENT,
    location TEXT,
    text TEXT,
    releaseDate DATETIME NOT NULL,
    privacy ENUM('PRIVACIDAD_PUBLICO','PRIVACIDAD_SOLO_YO','PRIVACIDAD_SOLO_AMIGOS') NOT NULL DEFAULT 'PRIVACIDAD_SOLO_AMIGOS',
    tag TEXT,
    fkProfile INT UNSIGNED NOT NULL,
    fkMultimedia INT UNSIGNED,
    PRIMARY KEY (idPost),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY (fkMultimedia) REFERENCES Multimedia(idMultimedia)
);

CREATE TABLE Share(
    idShare INT UNSIGNED NOT NULL AUTO_INCREMENT,
    date DATETIME NOT NULL,
    fkProfile INT UNSIGNED NOT NULL,
    fkPost INT UNSIGNED NOT NULL,
    PRIMARY KEY (idShare),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY (fkPost) REFERENCES Post(idPost)
);

CREATE TABLE Comment(
    idComment INT UNSIGNED NOT NULL AUTO_INCREMENT,
    text TEXT NOT NULL,
    date DATETIME NOT NULL,
    fkProfile INT UNSIGNED NOT NULL,
    fkPost INT UNSIGNED NOT NULL,
    PRIMARY KEY (idComment),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY (fkPost) REFERENCES Post(idPost)
);

CREATE TABLE PostReaction(
    idPostReaction INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type ENUM('REACCION_ME_GUSTA') NOT NULL DEFAULT 'REACCION_ME_GUSTA',
    fkProfile INT UNSIGNED NOT NULL,
    fkPost INT UNSIGNED NOT NULL,
    PRIMARY KEY (idPostReaction),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY (fkPost) REFERENCES Post(idPost)
);

CREATE TABLE CommentReaction(
    idCommentReaction INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type ENUM('REACCION_ME_GUSTA') NOT NULL DEFAULT 'REACCION_ME_GUSTA',
    fkProfile INT UNSIGNED NOT NULL,
    fkComment INT UNSIGNED NOT NULL,
    PRIMARY KEY (idCommentReaction),
    FOREIGN KEY (fkProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY (fkComment) REFERENCES Comment(idComment)
);

CREATE TABLE Notification(
    idNotification INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type ENUM('USUARIO_COMENTO_POST','USUARIO_COMENTO_COMENTARIO','USUARIO_REACCIONO_POST','USUARIO_REACCIONO_COMENTARIO') NOT NULL,
    seen BIT NOT NULL DEFAULT 0,
    date DATETIME,
    fkProfileAutor INT UNSIGNED NOT NULL,
    fkProfileDestination INT UNSIGNED NOT NULL,
    fkObjective INT UNSIGNED NOT NULL,
    PRIMARY KEY (idNotification),
    FOREIGN KEY (fkProfileAutor) REFERENCES Profile(idProfile),
    FOREIGN KEY (fkProfileDestination) REFERENCES Profile(idProfile)
);