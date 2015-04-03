<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/PlanAnnuel.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/Mois.php');

/**
 * @access public
 * @package M_Budget
 */
class AnneeComptable {
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AttributeType String
	 */
	private $code;
	/**
	 * @AttributeType String
	 * Etat peut etre : cloturee ou ouverte
	 */
	private $etat;
	/**
	 * @AssociationType M_Budget.PlanAnnuel
	 */
	public $unnamed_PlanAnnuel_;
	/**
	 * @AssociationType M_Budget.Mois
	 * @AssociationKind Composition
	 */
	public $unnamed_Mois_;
}
?>