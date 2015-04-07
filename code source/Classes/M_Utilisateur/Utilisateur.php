<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/GroupeUtilisateur.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/Structure.php');

/**
 * @access public
 * @package M_Utilisateur
 */
class Utilisateur {
	private $id;
	/**
	 * @AttributeType String
	 */
	private $nom;
	/**
	 * @AttributeType String
	 */
	private $prenom;
	/**
	 * @AttributeType String
	 */
	private $email;
	/**
	 * @AttributeType String
	 */
	private $password;
	/**
	 * @AttributeType String
	 */
	private $profil;
	/**
	 * @AssociationType M_Utilisateur.GroupeUtilisateur
	 */
	public $groupeUtilisateur_;
	/**
	 * @AssociationType M_Utilisateur.Structure
	 */
	public $structure;
	public function   getId() {
		return $this->id;
	}
	public function   _wakeup() {
	
	}
	public function setId( $id) {
		$this->id = $id;
	}
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
	
		$this->nom = $nom;
	
	}
	public function getPrenom() {
		return $this->prenom;
	}
	public function setPrenom( $prenom) {
		$this->prenom = $prenom;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail( $email) {
		$this->email = $email;
	}
	public function getLogin() {
		return $this->login;
	}
	public function setLogin( $login) {
		$this->login = $login;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword( $password) {
		$this->password = $password;
	}
	public function getTelephone() {
		return $this->telephone;
	}
	public function setTelephone( $telephone) {
		$this->telephone = $telephone;
	}
	public function getProfil() {
		return $this->profil;
	}
	public function setProfil( $profil) {
		$this->profil = $profil;
	}
	//hydratation de l objet grace au donnnees de la base
	public function hydrate(array $donnees){
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);//on construit le setter potentiel pour chak info
	
			if (method_exists($this, $method))
			{
				$this->$method($value);//on fait  l affectation
			}
		}
	}
}
?>