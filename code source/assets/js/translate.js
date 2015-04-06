// load I18N bundles
$(document).ready(function() {
	loadBundles($.i18n.browserLang());
	// configure language combo box
	$('#lang').change(function() {
		var selection = $('#lang option:selected').val();
		loadBundles(selection !== 'browser' ? selection : $.i18n.browserLang());
	});
});
function loadBundles(lang) {
	$.i18n.properties({
		name : 'Messages',
		path : 'bundle/',
		mode : 'both',
		language : lang,
		callback : function() {
			//$("#msg_welcome").text($.i18n.prop('msg_welcome'));
			$("#msg_welcome").text(msg_welcome);
			$("#msg_selLang").text(msg_selLang(lang));
		}
	});
