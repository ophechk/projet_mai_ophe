#contexte projet restotop
utiliser le terminal 				            //pex Laragon
se positionner a la racine web de Laragon 		//pex c:\laragon\www
cloner le projet restotop 			            //pex en le clonant depuis github
le projet est importé dans un dossier 		    //pex c:\laragon\www\restotop
se positionner a la racine web du projet 		//pex c:\laragon\www\restotop
verifier la version en cours			        // git log
verifier  la présence du fichier base.sql

#pour créer la BD
se connecter au terminal mysql 
mysql -u root				//pas de mot de passe par defaut sur Laragon
show databases				//la base restotop n'apparait pas encore
create database restotop character set utf8mb4
show databases				//la base restotop apparait maintenant
use restotop;				//aller sur la BD restotop,en l'état vide

#pour créer les tables de la BD et les peupler
source base.sql

# vérifier la creation des tables
show tables					            // 8 tables
select count(*) from resto;				// 11 restaurants
select * from utilisateur;				// 7 utilisateurs,le mot de passe est chiffré
