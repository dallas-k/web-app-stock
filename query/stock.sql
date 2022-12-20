CREATE TABLE stock (
    idx INT PRIMARY KEY AUTO_INCREMENT,
    reg DATE NOT NULL,
    name VARCHAR(16) NOT NULL,
    price INT NOT NULL,
    count INT NOT NULL,
    category VARCHAR(12) NOT NULL
);

INSERT INTO stock (reg, name, price, count, category) VALUES ('2022-12-05','삼성전자',20000,5,'domestic');
INSERT INTO stock (reg, name, price, count, category) VALUES ('2022-12-06','Apple',50000,10,'foreign');
INSERT INTO stock (reg, name, price, count, category) VALUES ('2022-12-07','금ETF',30000,2,'reality');
INSERT INTO stock (reg, name, price, count, category) VALUES ('2022-12-10','중장기채권',80000,5,'bond');