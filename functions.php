<?php

function test_contact_page_scripts() {
	wp_enqueue_style('test_contact_page-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
	wp_enqueue_style('test_contact_page-base-style', get_template_directory_uri() . '/dist/base.css', array('test_contact_page-style'), wp_get_theme()->get('Version'));

	wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js');
	wp_enqueue_script('test_contact_page-base-script', get_template_directory_uri() . '/dist/base.js', array('customize-preview', 'google-maps'), wp_get_theme()->get('Version'), true);

	$translation_array = array('templateUrl' => get_stylesheet_directory_uri());
	wp_localize_script('test_contact_page-base-script', 'object_name', $translation_array);
}

add_action('wp_enqueue_scripts', 'test_contact_page_scripts');

/** Customizer */
function test_contact_page_customize_register($wp_customize) {

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector' => '.site-title a',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector' => '.site-description',
		)
	);


	$transport = 'postMessage';
	$wp_customize->add_panel('contacts',
		array(
			'title'    => esc_html__('Contacts', 'test_contact_page'),
			'priority' => 210,
		)
	);

	/* Headquarters Address */
	$wp_customize->add_section(
		'section_headquarters',
		array(
			'title'    => esc_html__('GMS Headquarters', 'test_contact_page'),
			'priority' => 10,
			'panel'    => 'contacts'
		)
	);
	$setting = 'mod_headquarters_address';
	$wp_customize->add_setting($setting, [
		'default'           => esc_html__('Global Message Service Ukraine LLC Bundesstrasse 5 / 3rd Floor 
6300 Zug
Switzerland', 'test_contact_page'),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => $transport
	]);
	$wp_customize->add_control($setting, [
		'section' => 'section_headquarters',
		'label'   => esc_html__('Address', 'test_contact_page'),
		'type'    => 'textarea',
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_headquarters_address',
		array(
			'selector' => '.headquarters_address',
		)
	);


	/* Phone */
	$setting = 'mod_headquarters_phone';
	$wp_customize->add_setting($setting, [
		'default'           => esc_html__('+41 41 544 62 00', 'test_contact_page'),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => $transport
	]);
	$wp_customize->add_control($setting, [
		'section' => 'section_headquarters',
		'label'   => esc_html__('Phone', 'test_contact_page'),
		'type'    => 'text',
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_headquarters_phone',
		array(
			'selector' => '.headquarters_phone',
		)
	);


	/* Email */
	$setting = 'mod_headquarters_email';
	$wp_customize->add_setting($setting, [
		'default'           => esc_html__('info@gms-worlwide.com', 'test_contact_page'),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => $transport
	]);
	$wp_customize->add_control($setting, [
		'section' => 'section_headquarters',
		'label'   => esc_html__('Email', 'test_contact_page'),
		'type'    => 'text',
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_headquarters_email',
		array(
			'selector' => '.headquarters_email',
		)
	);


	/* Message */
	$setting = 'mod_headquarters_message';
	$wp_customize->add_setting($setting, [
		'default'           => esc_html__('Viber Us', 'test_contact_page'),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => $transport
	]);
	$wp_customize->add_control($setting, [
		'section' => 'section_headquarters',
		'label'   => esc_html__('Vider', 'test_contact_page'),
		'type'    => 'text',
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_headquarters_message',
		array(
			'selector' => '.headquarters_message',
		)
	);


	/* Email */
	$setting = 'mod_headquarters_form';
	$wp_customize->add_setting($setting, [
		'default'           => esc_html__('Contact Us', 'test_contact_page'),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => $transport
	]);
	$wp_customize->add_control($setting, [
		'section' => 'section_headquarters',
		'label'   => esc_html__('Form', 'test_contact_page'),
		'type'    => 'text',
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_headquarters_form',
		array(
			'selector' => '.headquarters_form',
		)
	);


	/* Support text */
	$wp_customize->add_section(
		'section_support',
		array(
			'title'    => esc_html__('Support', 'test_contact_page'),
			'priority' => 15,
			'panel'    => 'contacts'
		)
	);
	$setting = 'mod_support_text';
	$wp_customize->add_setting($setting, [
		'default'           => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'test_contact_page'),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => $transport
	]);
	$wp_customize->add_control($setting, [
		'section' => 'section_support',
		'label'   => esc_html__('Support text', 'test_contact_page'),
		'type'    => 'textarea',
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_support_text',
		array(
			'selector' => '.support_text',
		)
	);


	/* Support Phone */
	$setting = 'mod_support_phone';
	$wp_customize->add_setting($setting, [
		'default'           => esc_html__('+41 41 544 62 00', 'test_contact_page'),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => $transport
	]);
	$wp_customize->add_control($setting, [
		'section' => 'section_support',
		'label'   => esc_html__('Phone', 'test_contact_page'),
		'type'    => 'text',
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_support_phone',
		array(
			'selector' => '.support_phone',
		)
	);


	/* Maps */
	$wp_customize->add_section(
		'section_maps',
		array(
			'title'    => esc_html__('Maps', 'test_contact_page'),
			'priority' => 20,
			'panel'    => 'contacts'
		)
	);
	$setting = 'mod_maps';
	$wp_customize->add_setting($setting, [
		'default'   => 'true',
		'transport' => $transport
	]);
	$wp_customize->add_setting($setting, [
		'transport' => $transport,
	]);
	$wp_customize->add_control($setting, [
		'type'    => 'radio',
		'choices' => [
			'true'  => esc_html__('Show', 'test_contact_page'),
			'false' => esc_html__('Hide', 'test_contact_page'),
		]
	]);
	$wp_customize->selective_refresh->add_partial(
		'mod_maps',
		array(
			'selector' => '.maps',
		)
	);

}

add_action('customize_register', 'test_contact_page_customize_register');

