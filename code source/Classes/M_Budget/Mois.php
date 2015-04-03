<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/AnneeComptable.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/PlanMensuel.php');

/**
 * @access public
 * @package M_Budget
 */
class Mois {
	/**
	 * @AttributeType String
	 */
	private $code;
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AttributeType String
	 * Etat peut etre : cloture ou ouvert
	 */
	private $etat;
	/**
	 * @AssociationType M_Budget.AnneeComptable
	 */
	public $unnamed_AnneeComptable_;
	/**
	 * @AssociationType M_Budget.PlanMensuel
	 */
	public $unnamed_PlanMensuel_;
}
?>