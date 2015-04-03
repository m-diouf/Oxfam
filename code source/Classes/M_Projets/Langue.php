<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Pays.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Langues/TranslatedSymbol.php');

/**
 * @access public
 * @package M_Projets
 */
class Langue {
	/**
	 * @AttributeType String
	 */
	private $nom;
	/**
	 * @AttributeType String
	 */
	private $code;
	/**
	 * @AssociationType M_Projets.Pays
	 */
	public $unnamed_Pays_;
	/**
	 * @AssociationType M_Langues.TranslatedSymbol
	 */
	public $unnamed_TranslatedSymbol_;
}
?>