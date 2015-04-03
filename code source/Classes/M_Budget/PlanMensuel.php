<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/PlanAnnuel.php');
require_once(realpath(dirname(__FILE__)) . '/../M_SuiviCaisse/Operation.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/Mois.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/ElementPlanMensuel.php');

/**
 * @access public
 * @package M_Budget
 */
class PlanMensuel {
	/**
	 * @AttributeType String
	 */
	private $code;
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AssociationType M_Budget.PlanAnnuel
	 */
	public $unnamed_PlanAnnuel_;
	/**
	 * @AssociationType M_SuiviCaisse.Operation
	 */
	public $unnamed_Operation_;
	/**
	 * @AssociationType M_Budget.Mois
	 */
	public $_;
	/**
	 * @AssociationType M_Budget.ElementPlanMensuel
	 * @AssociationKind Composition
	 */
	public $unnamed_ElementPlanMensuel_;
}
?>