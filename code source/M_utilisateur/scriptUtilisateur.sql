--modelisation de la base de donne d apres le diagramme de conception
-- le type representant un privilege
CREATE or REPLACE TYPE t_privilege AS object(
	nom varchar(50),
	codePriv varchar(50)
 	);
--
--le type representant un groupe utilisateur
--		contient un agregation de t_privilege
		CREATE or REPLACE TYPE t_ref_t_privilege AS object(
			valeur ref t_privilege
		);
		CREATE or REPLACE TYPE t_liste_t_ref_t_privilege AS  TABLE  of t_ref_t_privilege;
CREATE   TYPE t_groupe_utilisateur AS object(
	nom varchar(50),
	liste_privileges t_liste_t_ref_t_privilege
 	); 
--le type representant une structure
CREATE or REPLACE  TYPE t_structure AS object(
	nom varchar(100)
 	); 
--type oxfam under t_structure??concepteurs???
--CREATE or REPLACE TYPE oxfam under t_structure( 	); 

--le type representant un  utilisateur
CREATE or REPLACE TYPE t_utilisateur AS object(
	nom varchar(50),
	prenom varchar(100),
	email varchar(200),
	password varchar(100),
	profil varchar(50),
	groupe_utilisateur REF t_groupe_utilisateur,
	structure REF t_structure

 	); 
--creation des tables des utilisateurs,privileges,structures  et groupes d utilisateur
CREATE  TABLE privilegesApp of t_privilege;
CREATE  TABLE groupes_utilisateur of t_groupe_utilisateur nested  TABLE  liste_privileges store as tab_privileges;
CREATE  TABLE structures of t_structure;
CREATE  TABLE utilisateurs of t_utilisateur;
--ajout des contraintes cle etrangere???
--ALTER TABLE table_name
--ADD CONSTRAINT constraint_name
--   FOREIGN KEY (column1, column2, ... column_n)
--   REFERENCES parent_table (column1, column2, ... column_n);
