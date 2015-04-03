<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Langues/Module.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Langues/KeyWord_Symbols.php');

/**
 * Represente les differents operations de chaque modules ou bien les pages de chaque module
 * @access public
 * @package M_Langues
 */
class SousModule {
	/**
	 * @AssociationType M_Langues.Module
	 */
	public $unnamed_Module_;
	/**
	 * @AssociationType M_Langues.KeyWord_Symbols
	 * @AssociationKind Composition
	 */
	public $unnamed_KeyWord_Symbols_;
}
?>