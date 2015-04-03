<?php
	require("../M_Utilisateur/Utilisateur.php");
class ManageurBD{
	/**
	* Instance de la classe PDO
	*
	* @var PDO
	* @access private
	*/
	private $PDOInstance = null;
	/**
	* Instance de la classe ManageurBD
	*
	* @var ManageurBD
	* @access private
	* @static
	*/
	private static $instance = null;
	/**
	* Constante: nom d'utilisateur de la bdd
	*
	* @var string
	*/
	const DEFAULT_SQL_USER = 'root';
	/**
	* Constante: hôte de la bdd
	*
	* @var string
	*/
	const DEFAULT_SQL_HOST = 'localhost';
	/**
	* Constante: hôte de la bdd
	*
	* @var string
	*/
	const DEFAULT_SQL_PASS = '';
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
	 }
	/**
	* Crée et retourne l'objet ManageurBD : Singleton
	*
	* @access public
	* @static
	* @param void
	* @return ManageurBD $instance
	*/
		public static function getInstance(){
		if(is_null(self::$instance)){
		self::$instance = new ManageurBD();
		}
		return self::$instance;
	}
	public function getPDO(){
			 
	}
	/*methodes de manipulation des utilisateurs */

	 public function addUtilisateur(Utilisateur $uti){
		
	}
	 public function countUtilisateur($options){
	 
	}
	 public function deleteUtilisateur(Utilisateur $uti){
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