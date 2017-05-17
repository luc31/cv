<?php  

require_once(__DIR__.'/connection_data.php');	
// DATA
require_once(__DIR__.'/Link_recipe_ingredient.php');	
require_once(__DIR__.'/Ingredient_data.php');	
require_once(__DIR__.'/connection_data.php');	


	class Recipe
	{
	   


	    // déclaration des méthodes
	     function add_recipe($array_recipe, $savepathpicture) 
	    {
	        //récupère les différents values des inputs
			$nom=$array_recipe['name_recipe'];			
			$description=$array_recipe['recipe'];					
			$bdd = getConnectionData();

			
					//requete d'insertion du nom de la recette et de sa description
			$bdd->prepare('INSERT INTO eatlistrecette VALUES(NULL,:valeur_name_recette,:valeur_recette,:valeur_picture,:country)')->execute([
				'valeur_name_recette'	=> $nom,
				'valeur_recette' => $description,
				'valeur_picture'	=> $savepathpicture,
				'country' => 'null'
			]);

			//methode php qui permet de récupérer le dernier élément insérer
			return $idRecette = $bdd->lastInsertId();
		}

		 function add_list_ingredient($array_recipe) 
		{	
			//array_filter insère dans le tableau si la valeur n'est pas vide null ou false cela récupère que les champ qui ont étaient rempli
			$ingredients =array_filter($array_recipe['input_ingredient']);
			$ingredientsId = [];
			foreach ($ingredients as $value)
			{
				$ingredient = new Ingredient_data();
				$ingredientsId[]=$ingredient->add_ingredient($value);

			}

			return $ingredientsId;
		}

		 function link_recipe($array_recipe,$pathpicture)
		{	
			$id_ingredient =[];

			$id_recipe = $this -> add_recipe($array_recipe,$pathpicture);
			$id_ingredient =  $this -> add_list_ingredient($array_recipe); 
			$link_r = new Link_recipe_ingredient();			
			$link_r -> add_recipe_ing($id_recipe,$id_ingredient );
			$link_r ->add_quantity($id_recipe,$id_ingredient,$array_recipe);
			return (isset($link_r)&& isset($id_recipe) && isset($id_ingredient)) ? SQL_SUCCESS : formatMessagesComponent('Tous les champs obligatoires ne sont pas rempli', 'error') ;

		}



	}



?>