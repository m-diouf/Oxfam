<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/ActiviteB.php');
require_once(realpath(dirname(__FILE__)) . '/../M_SuiviCaisse/Operation.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/ElementPlanMensuel.php');

/**
 * @access public
 * @package M_Budget
 */
class LigneBudget {
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AttributeType double
	 */
	private $montantPrevu;
	/**
	 * @AttributeType double
	 */
	private $montantExecute;
	/**
	 * @AssociationType M_Budget.ActiviteB
	 */
	public $unnamed_ActiviteB_;
	/**
	 * @AssociationType M_SuiviCaisse.Operation
	 */
	public $unnamed_Operation_;
	/**
	 * @AssociationType M_Budget.ElementPlanMensuel
	 */
	public $_;
}
?>