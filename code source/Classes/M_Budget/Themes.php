<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/BudgetProjet.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/ActiviteB.php');

/**
 * @access public
 * @package M_Budget
 */
class Themes {
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AssociationType M_Budget.BudgetProjet
	 */
	public $unnamed_BudgetProjet_;
	/**
	 * @AssociationType M_Budget.ActiviteB
	 * @AssociationKind Aggregation
	 */
	public $unnamed_ActiviteB_;
}
?>