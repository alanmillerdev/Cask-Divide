CREATE DATABASE CaskDivide;

CREATE TABLE CaskDivide.User(
    UserID INTEGER NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    UserType VARCHAR(20) NOT NULL,
    FirstName VARCHAR(80) NOT NULL,
    LastName VARCHAR(80) NOT NULL,
    DOB DATE NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    2FAENABLED BOOLEAN NOT NULL,
    RegistrationDate DATE, 
    PRIMARY KEY (UserID)
);

CREATE TABLE CaskDivide.Admin(
    UserID INTEGER NOT NULL,
    LastLogin DATETIME NOT NULL,
    PRIMARY KEY (UserID),
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

CREATE TABLE CaskDivide.Distillery(
    DistilleryName VARCHAR(80) NOT NULL,
    Description VARCHAR(2000) NOT NULL,
    PRIMARY KEY (DistilleryName)
);

CREATE TABLE CaskDivide.Cask(
    CaskID INTEGER NOT NULL AUTO_INCREMENT,
    CaskName VARCHAR(80) NOT NULL,
    CaskDescription VARCHAR(255) NOT NULL,
    PercentageAvailable INTEGER NOT NULL,
    WholeCaskPrice DECIMAL(8, 2) NOT NULL,
    OLA DECIMAL(4, 2) NOT NULL,
    RLA DECIMAL(4, 2) NOT NULL,
    PercentageAlcohol DECIMAL(4, 2) NOT NULL,
    CaskType VARCHAR(60) NOT NULL,
    WoodType VARCHAR(60) NOT NULL,
    DistilleryName VARCHAR(80) NOT NULL,
    CaskImage LONGTEXT NOT NULL,
    PRIMARY KEY (CaskID),
    FOREIGN KEY (DistilleryName) REFERENCES Distillery(DistilleryName)
);

CREATE TABLE CaskDivide.Payment(
    TransactionID INTEGER NOT NULL AUTO_INCREMENT,
    StripeTransactionID VARCHAR(255) NOT NULL,
    StripeCustomerID VARCHAR(255) NOT NULL,
    PRIMARY KEY (TransactionID)
);

CREATE TABLE CaskDivide.Investment(
    InvestmentID INTEGER NOT NULL AUTO_INCREMENT,
    UserID INTEGER NOT NULL,
    CaskID INTEGER NOT NULL,
    TransactionID INTEGER NOT NULL,
    PercentPurchased INTEGER NOT NULL,
    PurchaseAmount DOUBLE NOT NULL,
    PurchaseDate DATETIME NOT NULL,
    PRIMARY KEY (InvestmentID),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (CaskID) REFERENCES Cask(CaskID),
    FOREIGN KEY (TransactionID) REFERENCES Payment(TransactionID)
);

CREATE TABLE CaskDivide.UserInvestments(
    UserInvestmentID INTEGER NOT NULL AUTO_INCREMENT,
    UserID INTEGER NOT NULL,
    InvestmentID INTEGER NOT NULL,
    PurchaseDate DATETIME NOT NULL,
    PRIMARY KEY (UserInvestmentID),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (InvestmentID) REFERENCES Investment(InvestmentID)
);

CREATE TABLE CaskDivide.AdminLogItem(
    ID INTEGER NOT NULL AUTO_INCREMENT,
    UserID INTEGER NOT NULL,
    CaskID INTEGER NOT NULL,
    Action VARCHAR(255) NOT NULL,
    Description VARCHAR(255),
    DateOfAction DATETIME NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (CaskID) REFERENCES Cask(CaskID)
);