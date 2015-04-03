<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Pays.php');

/**
 * @access public
 * @package M_Projets
 */
class Monnaie {
	/**
	 * @AttributeType String
	 */
	private $nomDevise;
	/**
	 * @AttributeType String
	 */
	private $signe;
	/**
	 * @AssociationType M_Projets.Pays
	 */
	public $unnamed_Pays_;
}
?>