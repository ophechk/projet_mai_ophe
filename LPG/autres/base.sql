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
   nom_panier VARCHAR(50),
   prix_panier INT,
   date_achat DATETIME,
   id_client INT NOT NULL,
   PRIMARY KEY(id_panier),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

CREATE TABLE produit(
   id_produit INT,
   prix INT,
   nom_produit VARCHAR(50),
   PRIMARY KEY(id_produit)
);

CREATE TABLE composer(
   id_panier VARCHAR(50),
   id_produit INT,
   quantite INT,
   PRIMARY KEY(id_panier, id_produit),
   FOREIGN KEY(id_panier) REFERENCES panier(id_panier),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit)
);
