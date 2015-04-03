<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/PlanAnnuel.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Projets/Projet.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/Themes.php');

/**
 * @access public
 * @package M_Budget
 */
class BudgetProjet {
	/**
	 * @AttributeType double
	 */
	private $montantDemande;
	/**
	 * @AttributeType double
	 */
	private $montantAttribue;
	/**
	 * @AttributeType double
	 */
	private $montantExecute;
	/**
	 * @AttributeType double
	 */
	private $montantRestant;
	/**
	 * @AssociationType M_Budget.PlanAnnuel
	 */
	public $unnamed_PlanAnnuel_;
	/**
	 * @AssociationType M_Projets.Projet
	 */
	public $_;
	/**
	 * @AssociationType M_Budget.Themes
	 * @AssociationKind Composition
	 */
	public $unnamed_Themes_;
}
?>