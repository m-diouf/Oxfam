<?php
	//require("../M_Utilisateur/Utilisateur.php");

	require_once(realpath(dirname(__FILE__)) . '/../M_Budget/BudgetProjet.php');
	require_once(realpath(dirname(__FILE__)) . '/../M_Budget/LigneBudget.php');
	require_once(realpath(dirname(__FILE__)) . "/../M_Budget/PlanAnnuel.php");
	require_once(realpath(dirname(__FILE__)) . "/../M_Budget/PlanMensuel.php");
	require_once(realpath(dirname(__FILE__)) . "/../M_Budget/Themes.php");
	require_once(realpath(dirname(__FILE__)) . "/../M_Budget/AnneeComptable.php");
	require_once(realpath(dirname(__FILE__)) . "/../M_Budget/ActiviteB.php");

class Manageur2{
	/**
	* Instance de la classe PDO
	*
	* @var PDO
	* @access private
	*/
	private $PDOInstance = null;
	/**
	* Instance de la classe Manageur2
	*
	* @var Manageur2
	* @access private
	* @static
	*/
	private static $instance = null;
	/**
	* Constante: nom d'utilisateur de la bdd
	*
	* @var string
	*/
	const DEFAULT_SQL_USER = 'riki';
	/**
	* Constante: hôte de la bdd
	*
	* @var string
	*/
	const DEFAULT_SQL_HOST = 'localhost/XE';
	/**
	* Constante: hôte de la bdd
	*
	* @var string
	*/
	const DEFAULT_SQL_PASS = 'passer';
	/**
	* Constante: nom de la bdd
	*
	* @var string
	*/
	const DEFAULT_SQL_DTB = 'oxfam';
	/**
	* Constructeur
	*
	* @param void
	* @return void
	* @see PDO::__construct()
	* @access private
	*/
	private function __construct(){
		$conn = oci_pconnect('riki', 'passer', 'localhost/XE');
	 }
	/**
	* Crée et retourne l'objet Manageur2 : Singleton
	*
	* @access public
	* @static
	* @param void
	* @return Manageur2 $instance
	*/
		public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new Manageur2();
		}
		return self::$instance;
	}
	public function getPDO(){
		$conn = oci_pconnect('riki', 'passer', 'localhost/XE');
		return $conn;
	}
	/*methodes de manipulation des utilisateurs */

	public function addMois(Mois $m){

		$request = 'insert into Mois(code, libelle, etat)'.
					'values (:code, :lib , :etat)'; 
		$insert = oci_parse($this->getPDO(), $request);
		oci_bind_by_name($insert, ':code', $m->getCode);
		oci_bind_by_name($insert, ':lib', $m->getLibelle);
		oci_bind_by_name($insert, ':etat', $m->getEtat);

		$execute = oci_execute($insert);
		if ($execute != 0){
			echo "reussi";
		}
		else
			echo "erreur exe: ".$execute;
		return $execute;
	}
	 public function addEltPlanMensuel($options){
	 	$request = 'insert into ElementPlanMensuel(code, libelle, montant)'.
					'values (:code, :lib , :montant)'; 
		$insert = oci_parse($this->getPDO(), $request);
		oci_bind_by_name($insert, ':code', $m->getCode);
		oci_bind_by_name($insert, ':lib', $m->getLibelle);
		oci_bind_by_name($insert, ':montant', $m->getMontant);

		$execute = oci_execute($insert);
		if ($execute != 0){
			echo "reussi";
		}
		else
			echo "erreur exe: ".$execute;
		return $execute;
	 
	}
	 public function addLigneBudget(LigneBudget $l){
	 	$request = 'insert into LigneBudget(libelle, montantprevu, montantexecute)'.
					'values (:lib, :mntprev, :mntexec)'; 
		$insert = oci_parse($this->getPDO(), $request);
		oci_bind_by_name($insert, ':lib', $l->getLibelle);
		oci_bind_by_name($insert, ':mntprev', $l->getMontantPrevu);
		oci_bind_by_name($insert, ':mntexec', $l->getMontantExecute);

		$execute = oci_execute($insert);
		if ($execute != 0){
			echo "reussi";
		}
		else
			echo "erreur exe: ".$execute;
		return $execute;
	}
	public function deleteUtilisateurById($id){
		
		
	}
	public function existUtilisateur($info){
		
	}
	public function getUtilisateur($info){

	}
	
	
	public function getUtilisateurByEmail($info){
	
	}
	 public function getListUtilisateur(){
	 
  }
	public function update(Utilisateur $uti){
		
	}

	public function getListUtilisateurNew(){
	 	
  }
  	 public function countUtilisateurNew(){
	
	}
 
}//fin class ManageurDb

//c
?>