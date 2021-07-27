<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// prise en charge du logo du site
function custom_logo() {
	add_theme_support('custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	));
}
add_action('after_setup_theme','custom_logo');

function orion_register_assets() {
    
	// Déclarer style.css à la racine du thème
	wp_enqueue_style( 
	    'orion-wp-style',
	    get_stylesheet_uri(), 
	    array(), 
	    '1.0'
	);
	    
	// Déclarer un autre fichier CSS
	wp_enqueue_style( 
	    'orion-main-style', 
	    get_template_directory_uri() . '/assets/styles/main.css',
	    array(), 
	    '1.0'
	);
	//seulement sur page d'accueil
	if (is_front_page()) {
		wp_enqueue_style( 
			'orion-main-style', 
			get_template_directory_uri() . '/assets/styles/main.css',
			array(), 
			'1.0'
		);
	}
  }
  add_action( 'wp_enqueue_scripts', 'orion_register_assets' );