
-- # =============================================== DEBUT ======================================================== #
			
-- 							## Creation des types pour le projet oxfam SGBD avance 2014-2015

--			-- # Module M_Projet


-- -- # Type SecteurActivite 

CREATE TYPE T_secteurActivite AS OBJECT(
	libelle varchar(30), 
	code varchar(30)
	);

CREATE TYPE Ref_t_secteurActivite AS OBJECT(valeur REF T_secteurActivite);

-- # Type CategorieProjet

CREATE TYPE T_categorieProjet AS OBJECT(
	libelle varchar(30)
	);

CREATE TYPE Ref_t_categorieProjet AS OBJECT(valeur REF T_categorieProjet);

-- # Type Monnaie

CREATE TYPE T_monnaie AS OBJECT(
	nomDevise varchar(10),
	signe varchar(20),
	);

CREATE TYPE Ref_t_monnaie AS OBJECT(valeur REF T_monnaie);

-- # Type langue

CREATE TYPE T_langue AS OBJECT(
	nom varchar(30),
	code varchar(30)
	);

CREATE TYPE Ref_t_langue AS OBJECT(valeur REF T_langue);


-- # Type Ville

CREATE TYPE T_ville AS OBJECT(
	nomVille varchar(30),
	projet Ref_t_projet
	);

CREATE TYPE Ref_t_ville AS OBJECT(valeur REF T_ville);

-- # Type Pays

CREATE TYPE T_pays AS OBJECT(
	pays varchar(30),
	nomComplet varchar(30),
	nomAbrege varchar(20),
	monnaie Ref_t_monnaie,
	langue Ref_t_langue
	ville Ref_t_ville
	);

-- # Type Projet

CREATE TYPE T_projet UNDER T_structure(
	nom varchar(100),
	categorie Ref_t_categorieProjet,
	secteur Ref_t_secteurActivite
	);

CREATE TYPE Ref_t_projet AS OBJECT(valeur REF T_projet);

				-- # Module M_SuiviCaisse

-- # Type Operation Caisse

CREATE TYPE T_operationCaisse UNDER T_operation(
	numRecu int
	);

-- # Type Operation Banque

CREATE TYPE T_operationBanque UNDER T_operation(
	typeOpBancaire varchar(30),
	referenceOperation varchar(30)
	);

-- # Type Operation

CREATE TYPE T_operation AS OBJECT(
	libelle varchar(30),
	dateOperation date,
	sommeOperation double,
	noteOperation varchar(30),
	etatSoumission varchar(30),
	soumission varchar(30),
	referencePaiement varchar(30),
	ligneBudget Ref_t_ligneBudget
	) NOT FINAL;


				-- # Module M_Utilisateur

-- # Type privilege

CREATE TYPE T_privilege AS OBJECT(
	nom varchar(100),
	codePriv varchar(30)
	);

CREATE TYPE Ref_t_privilege AS OBJECT(valeur REF T_privilege);

-- # Type Groupe Utilisateur

CREATE TYPE T_groupeUtilisateur AS OBJECT(
	privilege Ref_t_privilege
	);

CREATE TYPE Ref_t_groupeUtilisateur AS OBJECT(valeur REF T_groupeUtilisateur);

-- # Type Utilisateur

CREATE TYPE T_utilisateur AS OBJECT(
	nom varchar(30),
	prenom varchar(30),
	email varchar(30),
	password varchar(30),
	profil varchar(30),
	groupe Ref_t_groupeUtilisateur,
	structure Ref_t_structure
	);

-- # Type Structure

CREATE TYPE T_structure AS OBJECT() NOT FINAL NOT INSTANTIABLE;

CREATE TYPE Ref_t_structure AS OBJECT(valeur T_structure);

-- # Type  OXFAM

CREATE TYPE T_oxfam UNDER T_structure;


				-- # Module M_Langues

-- # Type TranslatedSymbol

CREATE TYPE T_translatedSymbol;

-- # Type KeyWord_Symbols

CREATE TYPE T_keyWordSymbol;

CREATE TYPE Ref_t_keyWordSymbol AS OBJECT(valeur REF T_keyWordSymbol);

CREATE TYPE List_ref_keyWordSymbol AS TABLE OF Ref_t_keyWordSymbol;

-- # Type SousModule

CREATE TYPE T_sousModule AS OBJECT(
	MotsCles List_ref_keyWordSymbol
	);

CREATE TYPE Ref_t_sousModule AS OBJECT(valeur REF T_sousModule);

CREATE TYPE List_Ref_sousModule AS TABLE OF Ref_t_sousModule;

-- # Type Module

CREATE TYPE T_module AS OBJECT(
	SousModules List_Ref_sousModule;
	);


				-- # Module M_Budget

-- # Type LigneBudget

CREATE TYPE T_ligneBudget AS OBJECT(
	libelle varchar(50),
	montantPrevu double,
	montantExecute double,
	element Ref_t_elementMensuel
	);

CREATE TYPE Ref_t_ligneBudget AS OBJECT(valeur REF T_ligneBudget);

CREATE TYPE List_ref_ligneBudget AS TABLE OF Ref_t_ligneBudget;

-- # Type ElementPlanMensuel

CREATE TYPE T_elementMensuel AS OBJECT(
	code varchar(30),
	libelle varchar(30),
	montant double
	);

CREATE TYPE Ref_t_elementMensuel AS OBJECT(valeur REF T_elementMensuel);

CREATE TYPE List_ref_elementMensuel AS TABLE OF Ref_t_elementMensuel;


-- # Type Mois

CREATE TYPE T_mois AS OBJECT(
	code varchar(30),
	libelle varchar(30),
	etat varchar(30)
	);

CREATE TYPE Ref_t_mois AS OBJECT(valeur REF T_mois);

CREATE TYPE List_ref_mois AS TABLE OF Ref_t_mois;

-- # Type PlanMensuel

CREATE TYPE T_planMensuel AS OBJECT(
	code varchar(30),
	libelle varchar(30),
	Elements List_ref_elementMensuel,
	mois Ref_t_mois
	);

CREATE TYPE Ref_t_planMensuel AS OBJECT(valeur REF T_planMensuel);

CREATE TYPE List_ref_planMensuel AS TABLE OF Ref_t_planMensuel; 

-- # Type ActiviteB

CREATE TYPE T_activiteB AS OBJECT(
	libelle varchar(30),
	dateDebut date,
	dateFin date,
	montantPrevu double,
	LignesBudgets List_ref_ligneBudget
	);

CREATE TYPE Ref_t_activiteB AS OBJECT(valeur REF T_activiteB);

-- # Type Themes

CREATE TYPE T_theme AS OBJECT(
	libelle varchar(30),
	Activite Ref_t_activiteB
	);

CREATE TYPE Ref_t_theme AS OBJECT(valeur REF T_theme);

CREATE TYPE List_ref_theme AS TABLE OF Ref_t_theme;

-- # Type BudgetProjet

CREATE TYPE T_budgetProjet AS OBJECT(
	montantDemande double,
	montantAttribue double,
	montantExecute double,
	montantRestant double,
	Themes List_ref_theme, 
	);

-- # Type PlanAnnuel

CREATE TYPE T_planAnnuel AS OBJECT(
	libelle varchar(30),
	code varchar(30),
	montantTotalPrevu double
	Annee Ref_t_anneeComptable,
	PlanMensuels List_ref_planMensuel
	);

-- # Type AnneComptable

CREATE TYPE T_anneeComptable AS OBJECT(
	libelle varchar(30),
	code varchar(30),
	etat varchar(30),
	Mois List_ref_mois
	);

CREATE TYPE Ref_t_anneeComptable AS OBJECT(valeur REF T_anneeComptable);



							-- 	## Creation des tables pour le projet oxfam SGBD avance 2014-2015

			-- # Module M_Projet

-- # create table Routeurs of t_routeurs nested PCs store as MesPCs;

CREATE TABLE SecteurActivite OF T_secteurActivite;

CREATE TABLE Projet OF T_projet;

CREATE TABLE CategorieProjet OF T_categorieProjet;

CREATE TABLE Ville OF T_ville;

CREATE TABLE Pays OF T_pays;

CREATE TABLE Monnaie OF T_monnaie;

CREATE TABLE Langue OF T_langue;


			-- # Module M_SuiviCaisse


CREATE TABLE Operation OF T_operation;

CREATE TABLE OperationBanque OF T_operationBanque;

CREATE TABLE OperationCaisse OF T_operationCaisse;


			-- # Module M_Utilisateur

CREATE TABLE Privilege OF T_privilege;

CREATE TABLE GroupeUtilisateur OF T_groupeUtilisateur;

CREATE TABLE Utilisateur OF T_utilisateur;

CREATE TABLE OXFAM OF T_oxfam;


			-- # Module M_Langue


CREATE TABLE TranslatedSymbol OF T_translatedSymbol;

CREATE TABLE KeyWord_Symbols OF T_keyWordSymbol;

CREATE TABLE SousModule OF T_sousModule NESTED MotsCles STORE AS MesMotsCles;

CREATE TABLE Module OF T_module NESTED SousModules STORE AS MesSousModules;


			-- # Module M_Budget


CREATE TABLE LigneBudget OF T_ligneBudget;

CREATE TABLE ElementPlanMensuel OF T_elementMensuel;

CREATE TABLE Mois OF T_mois;

CREATE TABLE PlanMensuel OF T_planMensuel NESTED Elements STORE AS MesElements;

CREATE TABLE ActiviteB OF T_activiteB NESTED LignesBudgets STORE AS MesLignesBudgets;

CREATE TABLE Theme OF T_theme;

CREATE TABLE BudgetProjet OF T_budgetProjet NESTED Themes STORE AS MesThemes;

CREATE TABLE PlanAnnuel OF T_planAnnuel NESTED PlanMensuels STORE AS MesPlansMensuels;

CREATE TABLE AnneComptable OF T_anneeComptable NESTED Mois STORE AS MesMois;

/
-- # ================================================= FIN ======================================================= #