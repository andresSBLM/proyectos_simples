DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id          BIGSERIAL       PRIMARY KEY,
    nombre      VARCHAR(255)    NOT NULL,
    apellidos   VARCHAR(255)    NOT NULL,
    email       VARCHAR(255)    NOT NULL UNIQUE,
    contrasena  VARCHAR(255)    NOT NULL
);



INSERT INTO usuarios (nombre, apellidos, email, contrasena) 
VALUES
    ('paco', 'Guijarro Fierro', 'pagui@b.com', '123'),
    ('jesus', 'jimenez serio', 'jusep@jes.com', '124'),
    ('andres','serrano grigoruta', 'andresserranoblm13@gmail.com', '111');



/*
sudo -u postgres createuser -P login
contraseña : login
sudo -u postgres createdb -O login login

sudo -u postgres psql -l

psql -h localhost -d login -U login
psql -h localhost -d login -U login < login.sql
*/