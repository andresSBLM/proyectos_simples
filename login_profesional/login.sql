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
    ('Laura', 'García López', 'laura.garcia@a.com', '125'),
    ('Carlos', 'Martínez Ruiz', 'carlos.mtz@b.com', '126'),
    ('Ana', 'Fernández Ramos', 'ana.fdez@c.com', '127'),
    ('David', 'Sánchez Navarro', 'david.snchz@d.com', '128'),
    ('Elena', 'Romero Torres', 'elena.rt@e.com', '129'),
    ('andres','serrano grigoruta', 'andresserranoblm13@gmail.com', '111'),
    ('Miguel', 'Navarro Gil', 'miguel.ng@f.com', '130'),
    ('Lucia', 'Serrano Castro', 'lucia.sc@g.com', '131'),
    ('Javier', 'Ortega Molina', 'javi.om@h.com', '132'),
    ('Marta', 'Delgado Marín', 'marta.dm@i.com', '133'),
    ('Alejandro', 'Morales Sanz', 'alex.ms@j.com', '134'),
    ('Sofía', 'Ibáñez Blanco', 'sofia.ib@k.com', '135'),
    ('Gonzalo', 'Suárez Cano', 'gonzalo.sc@l.com', '136'),
    ('Carmen', 'Vázquez Medina', 'carmen.vm@m.com', '137'),
    ('Adrián', 'Iglesias Prieto', 'adrian.ip@n.com', '138'),
    ('Paula', 'Cortes Calvo', 'paula.cc@o.com', '139'),
    ('Raúl', 'Cabrera Santos', 'raul.cs@p.com', '140'),
    ('Sara', 'Nuñez Reyes', 'sara.nr@q.com', '141'),
    ('Marcos', 'Lozano Cruz', 'marcos.lc@r.com', '142'),
    ('Irene', 'Garrido Peña', 'irene.gp@s.com', '143'),
    ('Hugo', 'Marín Santana', 'hugo.ms@t.com', '144')
    ;



/*
sudo -u postgres createuser -P login
contraseña : login
sudo -u postgres createdb -O login login

sudo -u postgres psql -l

psql -h localhost -d login -U login
psql -h localhost -d login -U login < login.sql
*/