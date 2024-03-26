CREATE TABLE client(
   id_client INT,
   nom_client VARCHAR(50),
   prenom_client VARCHAR(50),
   email VARCHAR(50),
   numero_tel VARCHAR(50),
   code_postal VARCHAR(50),
   ville VARCHAR(50),
   pays VARCHAR(50),
   mdp_client VARCHAR(50),
   PRIMARY KEY(id_client)
);

CREATE TABLE panier(
   id_panier VARCHAR(50),
   date_achat DATETIME,
   id_client INT NOT NULL,
   PRIMARY KEY(id_panier),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

CREATE TABLE coffret(
   id_coffret INT,
   prix INT,
   nom_coffret VARCHAR(50),
   PRIMARY KEY(id_coffret)
);

CREATE TABLE composer(
   id_panier VARCHAR(50),
   id_coffret INT,
   quantite INT,
   PRIMARY KEY(id_panier, id_coffret),
   FOREIGN KEY(id_panier) REFERENCES panier(id_panier),
   FOREIGN KEY(id_coffret) REFERENCES coffret(id_coffret)
);

----------------------------------------------------------------------------------

insert into coffret (id_coffret, prix, nom_coffret) values (1, 23, 'coffret petit dejeuner');
insert into coffret (id_coffret, prix, nom_coffret) values (2, 40, 'coffret dejeuner');
insert into coffret (id_coffret, prix, nom_coffret) values (3, 82, 'coffret goûter');
insert into coffret (id_coffret, prix, nom_coffret) values (4, 44, 'coffret apéro');
insert into coffret (id_coffret, prix, nom_coffret) values (5, 30, 'coffret surprise');
insert into coffret (id_coffret, prix, nom_coffret) values (6, 30, 'coffret boisson');
