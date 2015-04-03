<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/Utilisateur.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/Privilege.php');

/**
 * @access public
 * @package M_Utilisateur
 */
class GroupeUtilisateur {
	/**
	 * @AssociationType M_Utilisateur.Utilisateur
	 */
	public $unnamed_Utilisateur_;
	/**
	 * @AssociationType M_Utilisateur.Privilege
	 * @AssociationKind Aggregation
	 */
	public $unnamed_Privilege_;
}
?>