<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Langues/SousModule.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Langues/TranslatedSymbol.php');

/**
 * Represente les symboles a traduire par exemple la devise d'une monnaie donnee d'un pays
 * @access public
 * @package M_Langues
 */
class KeyWord_Symbols {
	/**
	 * @AssociationType M_Langues.SousModule
	 */
	public $unnamed_SousModule_;
	/**
	 * @AssociationType M_Langues.TranslatedSymbol
	 */
	public $unnamed_TranslatedSymbol_;
}
?>