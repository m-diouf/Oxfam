create or replace type t_Operation as object (
	id integer,
	libelle varchar(50),
	dateOperation date,
	sommeOperation integer,
	noteOperation varchar(50),
	etatSoumission varchar(30),
	soumission varchar(50),
	referencePaiement varchar(50),
	ligneBudget ref t_ligneBudget
) not final;

create type t_OperationCaisse under t_Operation(
	numRecu integer
);

create type t_OperationBanque under t_Operation(
	typeOpBancaire varchar(50),
	referenceOperation varchar(50)
);


-- Creation des tables d' operations
create table operationCaisse of t_OperationCaisse ;
create table operationBanque of t_OperationBanque ;

-- Séquence pour l'auto_incrémentation de l'ID de la table OperationCaisse
CREATE SEQUENCE seq_opCaisse
	MINVALUE 1
	START WITH 1
	INCREMENT BY 1
	CACHE 50 ;

-- Séquence pour l'auto_incrémentation de l'ID de la table OperationBanque
CREATE SEQUENCE seq_opBanque
	MINVALUE 1
	START WITH 1
	INCREMENT BY 1
	CACHE 50 ;

-- Avoir le dernier ID de la table OperationCaisse
SELECT seq_opCaisse.NEXTVAL AS nextInsertID FROM DUAL;

-- Creation des tables d' operations
create table operationCaisse of t_OperationCaisse ;
create table operationBanque of t_OperationBanque ;

-- Insertion d'une opération	
INSERT INTO operationCaisse values (t_OperationCaisse(
	seq_opCaisse.NEXTVAL,
	'libelle', 
	'28-12-1882', 
	25000,
	'noteOperation', 
	'etatSoumission', 
	'soumission', 
	'referencePaiement', 
	select ref(l) from lignebudget l where (l.libelle='bugget1'), 
	125
	));

INSERT INTO lignebudget values ('bugget1',250000,0);

drop table operationcaisse ; 
drop table operationBanque ;
drop type t_operationCaisse ;
drop type t_operationBanque ;
drop type t_operation ;