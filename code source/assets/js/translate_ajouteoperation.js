// load I18N bundles
$(document).ready(function () {
    loadBundles($.i18n.browserLang());
    // configure language combo box
    $('#lang').change(function () {
        var selection = $('#lang option:selected').val();
        loadBundles(selection !== 'browser' ? selection : $.i18n.browserLang());
    });
});

function loadBundles(lang) {
    $.i18n.properties({
        name: 'ajouteoperation',
        path: 'assets/bundle/',
        mode: 'both',
        language: lang,
        callback: function () {
            //$("#msg_welcome").text($.i18n.prop('msg_welcome'));
            $("#msg_welcome").text(msg_welcome);
            $("#btn_quit").text(btn_quit);
            $("#msg_welcome").text(msg_welcome);
            $("#btn_quit").text(btn_quit);
            $("#lnk_accueil").text(lnk_accueil);
            $("#lnk_module").text(lnk_module);
            $("#lnk_smodule").text(lnk_smodule);
            $("#lb_gestOp").text(lb_gestOp);
            $("#lb_error").text(lb_error);
            $("#lb_budget").text(lb_budget);
            $("#lb_period").text(lb_period);
            $("#lb_leftBudget").text(lb_leftBudget);
            $("#lb_chTheme").text(lb_chTheme);
            $("#lb_chRubrique").text(lb_chRubrique);
            $("#lb_chLigne").text(lb_chLigne);
            $("#lb_infoOp").text(lb_infoOp);
            $("#lb_numOp").text(lb_numOp);
            $("#lb_dateOp").text(lb_dateOp);
            $("#lb_typeOp").text(lb_typeOp);
            $("#lb_depense").text(lb_depense);
            $("#lb_refPaiement").text(lb_refPaiement);
            $("#lb_montantOp").text(lb_montantOp);
            $("#lb_soldeApresOp").text(lb_soldeApresOp);
            $("#lb_soldLigneApresOp").text(lb_soldLigneApresOp);
            $("#btn_save").text(btn_save);
            $("#lb_genererEtat").text(lb_genererEtat);
            $("#lb_print").text(lb_print);
        }
    });
}