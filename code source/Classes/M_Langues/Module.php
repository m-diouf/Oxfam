<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Langues/SousModule.php');

/**
 * Represente les 6 modules du projet a savoir:
 * 
 * - M_Budget
 * - M_Projet
 * - M_Utilisateur
 * - M_SuiviCaisse
 * - M_Reporting
 * - M_Langue
 * @access public
 * @package M_Langues
 */
class Module {
	/**
	 * @AssociationType M_Langues.SousModule
	 * @AssociationKind Composition
	 */
	public $unnamed_SousModule_;
}
?>