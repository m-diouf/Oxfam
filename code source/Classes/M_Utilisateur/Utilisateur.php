<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/GroupeUtilisateur.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/Structure.php');

/**
 * @access public
 * @package M_Utilisateur
 */
class Utilisateur {
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
	public $unnamed_GroupeUtilisateur_;
	/**
	 * @AssociationType M_Utilisateur.Structure
	 */
	public $unnamed_Structure_;
}
?>