<?php
require_once(realpath(dirname(__FILE__)) . '/../M_SuiviCaisse/Operation.php');

/**
 * @access public
 * @package M_SuiviCaisse
 */
class OperationBanque extends Operation {
	
	public function __construct($donnees)	{
		$this->hydrate($donnees);
	}
	/**
	 * @AttributeType String
	 */
	private $typeOpBancaire;
	public function   getTypeOpBancaire() {
		return $this->typeOpBancaire;
	}
	public function   setTypeOpBancaire($typeOpBancaire) {
		return $this->typeOpBancaire=$typeOpBancaire;
	}
	
	/**
	 * @AttributeType String
	 */
	private $referenceOperation;
	public function   getReferenceOperation() {
		return $this->referenceOperation;
	}
	public function   setReferenceOperation($referenceOperation) {
		return $this->referenceOperation=$referenceOperation;
	}
}
?>