<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/LigneBudget.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/PlanMensuel.php');

/**
 * @access public
 * @package M_SuiviCaisse
 */
class Operation {
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AttributeType Date
	 */
	private $dateOperation;
	/**
	 * @AttributeType double
	 */
	private $sommeOperation;
	/**
	 * @AttributeType String
	 */
	private $noteOperation;
	/**
	 * @AttributeType String
	 * Etat de la soumission peut etre :
	 * - validee
	 * - soumise
	 * - rejetee
	 * - brouillon
	 */
	private $etatSoumission;
	/**
	 * @AttributeType String
	 */
	private $soumission;
	/**
	 * @AttributeType String
	 */
	private $referencePaiement;
	/**
	 * @AssociationType M_Budget.LigneBudget
	 */
	public $_;
	/**
	 * @AssociationType M_Budget.PlanMensuel
	 */
	public $unnamed_PlanMensuel_;
}
?>