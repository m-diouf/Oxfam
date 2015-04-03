<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Projet.php');

/**
 * @access public
 * @package M_Projets
 */
class SecteurActivite {
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AttributeType String
	 */
	private $code;
	/**
	 * @AssociationType M_Projets.Projet
	 */
	public $unnamed_Projet_;
}
?>