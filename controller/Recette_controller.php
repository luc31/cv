<?php  
// Model
require_once(__DIR__.'/../model/Recipe_data.php');



// COMPONENT
require_once(__DIR__.'/components/UtilsComponent.php');
require_once(__DIR__.'/components/PasswordsComponent.php');
require_once(__DIR__.'/components/UrlsComponent.php');
require_once(__DIR__.'/components/FormsComponent.php');
require_once(__DIR__.'/components/MessagesComponent.php');
require_once(__DIR__.'/components/SavePicture.php');

//add recipe ou ajouter une recette
	class Recette_controlleur
	{
		
		public function add_recipe($request_data,$request_file_data)
		{
			$mandatoryFields = ['input_recipe_name', 'input_recipe' ];

			// check form validity
			if (isOkFormsComponent($request_data, $mandatoryFields)) {
				$url = "http://localhost:8082/eatlist_projet_fin_etude_vs3_mvc/index.php?page=addRecette";
				$recipe = [];
				$recipe['id_recipe'] = NULL;
				$recipe['name_recipe'] = ucFirstUtilsComponent($request_data['input_recipe_name']);
				$recipe['recipe'] = $request_data['input_recipe'];
				//$recipe['picture'] = trim($request_data['picture_recipe']);
				$recipe['ingredient'] = array_filter($request_data['input_ingredient']);
				$picture = savePicture($request_file_data);
				
				$replacepicture = 'c:wamp64\www\eatlist_projet_fin_etude_vs3_mvc\vue\images_recettes\imgReplaceRecette.png';
				$add_recipe = new Recipe();
					
				// add recipe in database
				if($picture[0]=='success')
				{
					$status= $add_recipe->link_recipe($recipe, $picture[1]);
					 
				}


				else if($picture=='errorextension')
				{

					 return formatMessagesComponent('Mauvais format jpg,png,jpeg', 'error');
				
					
				}

				else if($picture=='errorsize')
				{
					 return formatMessagesComponent('Le fichier est trop important taille max 300ko', 'error');
					
				}


				else if($picture=='error')
				{
					 return formatMessagesComponent('Le fichier n\'a pas pu être sauvegarder veuillez réssayer', 'error');
					 
				}
				
			
				if ($status == SQL_SUCCESS) {

					if($picture=='picturereplace')
					{
						$status = $add_recipe->link_recipe($recipe, $replacepicture);
						 return formatMessagesComponent('Le fichier envoyer est vide il sera remplacer. Recette ajouté sans photo', 'warning');
					}
					else
					{
						 return formatMessagesComponent('Recette ajouté', 'success');
						
					}
				}
				

			}
			  return formatMessagesComponent('Tous les champs sont obligatoires', 'error');

		}


	}
		
?>