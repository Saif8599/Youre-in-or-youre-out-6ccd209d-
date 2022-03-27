USE netland;

DROP TABLE IF EXISTS gebruiker;

CREATE TABLE gebruiker (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO gebruiker (username, password)
VALUES
    ('test-user','W@chtw00rd');



