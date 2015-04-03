<?php
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/Themes.php');
require_once(realpath(dirname(__FILE__)) . '/../M_Budget/LigneBudget.php');

/**
 * @access public
 * @package M_Budget
 */
class ActiviteB {
	/**
	 * @AttributeType String
	 */
	private $libelle;
	/**
	 * @AttributeType Date
	 */
	private $dateDebut;
	/**
	 * @AttributeType Date
	 */
	private $dateFin;
	/**
	 * @AttributeType float
	 */
	private $montantPrevu;
	/**
	 * @AssociationType M_Budget.Themes
	 */
	public $unnamed_Themes_;
	/**
	 * @AssociationType M_Budget.LigneBudget
	 * @AssociationKind Composition
	 */
	public $unnamed_LigneBudget_;
}
?>