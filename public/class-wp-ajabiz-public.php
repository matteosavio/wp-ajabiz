<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.matteosavio.com/
 * @since      1.0.0
 *
 * @package    Wp_Ajabiz
 * @subpackage Wp_Ajabiz/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Ajabiz
 * @subpackage Wp_Ajabiz/public
 * @author     Matteo Savio <matteo@digitalideas.io>
 */
class Wp_Ajabiz_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Ajabiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Ajabiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-ajabiz-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Ajabiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Ajabiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-ajabiz-public.js', array( 'jquery' ), $this->version, false );

	}
	
	public function ajabiz_opt_in($atts) {
    	$attributes = shortcode_atts( array(
    		'form' => '',
    		'contacttags' => ''
    	), $atts );
    	//https://stackoverflow.com/questions/31307306/wordpress-shortcodes-pass-array-of-values
    	if(!empty($atts['form'])) {
        	$theme = wp_get_theme();
        	
        	
    		if(($theme->parent()&&($theme->parent()->get('Name') == 'Divi'))||($theme->get('Name') == 'Divi')) {
            	return'
                    <div class="et_pb_contact" id="ajabiz-optin-1">
                        <form class="et_pb_contact_form clearfix" action="https://app.ajabiz.com/form/addContact/' . $attributes['form'] . '">
                            <p class="et_pb_contact_field et_pb_contact_field_half">
                                <input value="" name="firstName" id="ajabiz-subscribe-firstname" autocomplete="off" placeholder="Vorname*" class="input" type="text">
                            </p>
                            
                            <p class="et_pb_contact_field et_pb_contact_field_half et_pb_contact_field_last">
                                <input value="" name="lastName" id="ajabiz-subscribe-lastname" autocomplete="off" placeholder="Nachname*" type="text" class="input">
                            </p>
                            <p class="et_pb_contact_field et_pb_contact_field_0 et_pb_contact_field_last">
                                <input value="" name="email" id="ajabiz-subscribe-email" autocomplete="off" placeholder="E-Mail*" type="email" required="" class="input">
                            </p>
                            <input type="checkbox" name="contact-yrWNM7" value="1" style="display:none !important" tabindex="-1" autocomplete="off">
                            <div class="et_contact_bottom_container">
                                <input value="Eintragen" name="subscribe" class="et_pb_contact_submit et_pb_button" type="submit">
                            </div>
                        </form>
                    </div>
                    ';
        	}
        	else {
                return'
                    <div class="ajabiz-optin" id="ajabiz-optin-1">
                        <form action="https://app.ajabiz.com/form/addContact/' . $attributes['form'] . '">
                            <div class="ajabiz-formgrid">
                                <div class="half">
                                    <input value="" name="firstName" id="ajabiz-subscribe-firstname" autocomplete="off" placeholder="Vorname*" type="text">
                                </div>
                                <div class="half">
                                    <input value="" name="lastName" id="ajabiz-subscribe-lastname" autocomplete="off" placeholder="Nachname*" type="text">
                                </div>
                                <div class="full">
                                    <input value="" name="email" id="ajabiz-subscribe-email" autocomplete="off" placeholder="E-Mail*" type="email" required="">
                                </div>
                                <input type="checkbox" name="contact-yrWNM7" value="1" style="display:none !important" tabindex="-1" autocomplete="off">
                                <div class="full">
                                    <input value="Eintragen" name="subscribe" type="submit">
                                </div>
                            </div>
                            <div class="full">
                                <input value="" name="email" id="ajabiz-subscribe-email" autocomplete="off" placeholder="E-Mail*" type="email" required="">
                            </div>
                            <div class="full">
                                <input value="Eintragen" name="subscribe" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
                ';
    	}
    	
    	return '(No contact form hash)';
	}
}
