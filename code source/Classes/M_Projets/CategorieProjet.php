<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Projet.php');

/**
 * @access public
 * @package M_Projets
 */
class CategorieProjet {
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AssociationType M_Projets.Projet
	 */
	public $unnamed_Projet_;
}
?>