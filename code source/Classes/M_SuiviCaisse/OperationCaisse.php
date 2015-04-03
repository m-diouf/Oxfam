<?php
require_once(realpath(dirname(__FILE__)) . '/../M_SuiviCaisse/Operation.php');

/**
 * @access public
 * @package M_SuiviCaisse
 */
class OperationCaisse extends Operation {
	/**
	 * @AttributeType int
	 */
	private $numRecu;
}
?>