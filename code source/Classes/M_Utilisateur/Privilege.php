<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/GroupeUtilisateur.php');

/**
 * @access public
 * @package M_Utilisateur
 */
class Privilege {
	/**
	 * @AttributeType String
	 */
	private $nom;
	/**
	 * @AttributeType String
	 */
	private $codePriv;
	/**
	 * @AssociationType M_Utilisateur.GroupeUtilisateur
	 */
	public $unnamed_GroupeUtilisateur_;
}
?>