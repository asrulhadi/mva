CREATE DATABASE insecure;
USE insecure;
CREATE TABLE user (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(16), password VARCHAR(64));
CREATE TABLE article (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT, title VARCHAR(140), content TEXT, date_created TIMESTAMP);
CREATE TABLE comment (id INT AUTO_INCREMENT PRIMARY KEY, comment VARCHAR(140), article_id INT, date_created TIMESTAMP);
INSERT INTO user (username,password) VALUES ("Alice","p455w0rd");
INSERT INTO user (username,password) VALUES ("Bob","DualPhone");
INSERT INTO user (username,password) VALUES ("Eve","Hacker");
