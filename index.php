<?php


// Bootstrap
require 'model/connection_data.php';

// Header
include 'index_header.php';

// Content 

switch (isset($_GET['page']) ? $_GET['page'] : 'home')
{
	case 'home': include 'vue/accueil_eatlist.php'; break;
	
	case 'login': include 'vue/user/login.php'; break;
	case 'logout': include 'vue/user/logout.php'; break;
	
	case 'addRecette': include 'vue/ajouter_recette.phtml'; break;
	
	case 'inscription': include 'vue/inscription.phtml'; break;
	case 'vue2': include 'vue/vue2.php'; break;
	case 'vue3': include 'vue/vue3.php'; break;
	
	default: include 'vue/error.php'; break;
}


// Footer
include 'index_footer.php';
