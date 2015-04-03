<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Pays.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Projet.php');

/**
 * @access public
 * @package M_Projets
 */
class Ville {
	/**
	 * @AttributeType String
	 */
	private $nomVille;
	/**
	 * @AssociationType M_Projets.Pays
	 */
	public $unnamed_Pays_;
	/**
	 * @AssociationType M_Projets.Projet
	 * @AssociationKind Aggregation
	 */
	public $unnamed_Projet_;
}
?>