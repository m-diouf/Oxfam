<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Ville.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/BudgetProjet.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/SecteurActivite.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Utilisateur/Structure.php');

/**
 * @access public
 * @package M_Projets
 */
class Projet extends Structure {
	/**
	 * @AttributeType String
	 */
	private $nom;
	/**
	 * @AssociationType M_Projets.Ville
	 */
	public $unnamed_Ville_;
	/**
	 * @AssociationType M_Budget.BudgetProjet
	 */
	public $unnamed_BudgetProjet_;
	/**
	 * @AssociationType M_Projets.SecteurActivite
	 */
	public $_;
}
?>