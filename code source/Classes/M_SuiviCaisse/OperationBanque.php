<?php
require_once(realpath(dirname(__FILE__)) . '/../M_SuiviCaisse/Operation.php');

/**
 * @access public
 * @package M_SuiviCaisse
 */
class OperationBanque extends Operation {
	/**
	 * @AttributeType String
	 */
	private $typeOpBancaire;
	/**
	 * @AttributeType String
	 */
	private $referenceOperation;
}
?>