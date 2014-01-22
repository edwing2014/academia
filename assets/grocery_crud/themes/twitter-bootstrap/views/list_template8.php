<?php
//$this->set_css($this->default_theme_path.'/twitter-bootstrap/css/style.css');

//$this->set_css($this->default_theme_path.'/twitter-bootstrap/css/jquery-ui/flick/jquery-ui-1.9.2.custom.css');

$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);

//	JAVASCRIPTS - JQUERY-UI
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/jquery-ui/jquery-ui-1.9.2.custom.js');
//	JAVASCRIPTS - JQUERY LAZY-LOAD
$this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');

if (!$this->is_IE7()) {
	$this->set_js_lib($this->default_javascript_path.'/common/list.js');
}
//	JAVASCRIPTS - TWITTER BOOTSTRAP
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-transition.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-alert.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-modal.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-dropdown.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-scrollspy.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-tab.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-tooltip.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-popover.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-button.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-collapse.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-carousel.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-typeahead.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/bootstrap-affix.js');
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/bootstrap/application.js');
//	JAVASCRIPTS - MODERNIZR
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/modernizr/modernizr-2.6.1.custom.js');
//	JAVASCRIPTS - TABLESORTER
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/tablesorter/jquery.tablesorter.min.js');
	//JAVASCRIPTS - JQUERY-COOKIE
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/cookies.js');
	//JAVASCRIPTS - JQUERY-FORM
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/jquery.form.js');
	//JAVASCRIPTS - JQUERY-NUMERIC
$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.numeric.min.js');
	//JAVASCRIPTS - JQUERY-PRINT-ELEMENT
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/libs/print-element/jquery.printElement.min.js');
	//JAVASCRIPTS - JQUERY FANCYBOX
$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.fancybox-1.3.4.js');
	//JAVASCRIPTS - JQUERY EASING
$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.easing-1.3.pack.js');

	//JAVASCRIPTS - twitter-bootstrap - CONFIGURAÇÕES
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/app/twitter-bootstrap.js');
	//JAVASCRIPTS - JQUERY-FUNCTIONS
$this->set_js($this->default_theme_path.'/twitter-bootstrap/js/jquery.functions.js');
?>

<script type="text/javascript">
	var base_url = "<?php echo base_url();?>",
		subject = "<?php echo $subject?>",
		ajax_list_info_url = "<?php echo $ajax_list_info_url?>",
		unique_hash = "<?php echo $unique_hash; ?>",
		message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";
</script>

<!-- UTILIZADO PARA IMPRESSÃO DA LISTAGEM -->
<div id="hidden-operations"></div>

<div class="twitter-bootstrap">
	<div id="main-table-box">
		<br/>
		
		<br/>



		<div id="ajax_list">
			asa
		</div>

		
	</div>
</div>


