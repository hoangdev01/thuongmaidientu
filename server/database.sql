-- Active: 1656402603003@@localhost@3307@thuctap
CREATE TABLE account(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role VARCHAR(50) NOT NULL,
    active BOOLEAN NOT NULL
);
CREATE TABLE user(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    name TEXT NOT NULL,
    birthday DATE NULL,
    address TEXT NULL,
    accountId int NOT NULL,
    FOREIGN KEY (accountId) REFERENCES account(id)
);
CREATE TABLE chat(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    sendId int NOT NULL,
    receiveId int NOT NULL,
    content TEXT NULL,
    filePath VARCHAR(200) NULL,
    FOREIGN KEY (sendId) REFERENCES user(id),
    FOREIGN KEY (receiveId) REFERENCES user(id)
) ;
CREATE TABLE bill(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    userId int NOT NULL,
    price int NOT NULL,
    date int NOT NULL,
    status VARCHAR(20) NOT NULL,
    FOREIGN KEY (userId) REFERENCES user(id)
) ;

CREATE TABLE category(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    name TEXT NOT NULL,
    desciption TEXT NULL
) ;
CREATE TABLE product(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    name TEXT NOT NULL,
    desciption TEXT NULL,
    amount int NOT NULL,
    categoryId int NULL,
    price int NOT NULL,
    userId int NULL,
    imagePath int NULL,
    FOREIGN KEY (userId) REFERENCES user(id),
    FOREIGN KEY (categoryId) REFERENCES category(id)
);
CREATE TABLE bill_detail(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    billId int NOT NULL,
    productId int NOT NULL,
    amount int NOT NULL,
    FOREIGN KEY (billId) REFERENCES bill(id),
    FOREIGN KEY (productId) REFERENCES product(id)
);

CREATE TABLE cart(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    userId int NOT NULL,
    productId int NOT NULL,
    amount int NOT NULL,
    FOREIGN KEY (userId) REFERENCES user(id),
    FOREIGN KEY (productId) REFERENCES product(id)
);
INSERT INTO account (username, password, role, active)
VALUES ("admin", 12345678, "admin", 1);
INSERT INTO user ( name, birthday, address,accountId)
VALUES ("admin", null, null,1);
