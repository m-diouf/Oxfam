<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/PlanMensuel.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/LigneBudget.php');

/**
 * @access public
 * @package M_Budget
 */
class ElementPlanMensuel {
	/**
	 * @AttributeType String
	 */
	private $code;
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AttributeType double
	 */
	private $montant;
	/**
	 * @AssociationType M_Budget.PlanMensuel
	 */
	public $unnamed_PlanMensuel_;
	/**
	 * @AssociationType M_Budget.LigneBudget
	 */
	public $unnamed_LigneBudget_;
}
?>