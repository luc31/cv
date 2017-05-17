<?php 
	require_once(__DIR__.'/connection_data.php');	

	class Link_recipe_ingredient
	{

		 function add_recipe_ing($id_recette,$id_ingredient)
		{	
			$bdd = getConnectionData();
			//Requete d'insertion des id ingrédient et id recette pour savoir quelles ingrédients est liée à tel recette
			$req = $bdd->prepare('INSERT INTO composeringredientrecette VALUES(:valeur_id_recette,:valeur_id_ingredient,:valeur_quantity)');
			foreach ($id_ingredient as $value)
			{
				$req->execute([
					'valeur_id_recette' => $id_recette,
					'valeur_id_ingredient' => $value,
					'valeur_quantity'		=>  0
				]);
			}
		}


		function add_quantity($id_recette,$id_ingredient,$array_recipe)
		{
			$bdd = getConnectionData();
			//Requete d'insertion des id ingrédient et id recette pour savoir quelles ingrédients est liée à tel recette
			$req = $bdd->prepare('UPDATE  composeringredientrecette SET quantity=:valeur_quantity WHERE(id_ingredient= :valeur_id_ingredient AND id_recette = :valeur_id_recette)');
			foreach ($id_ingredient as $value)
			{
				$req->execute([
					// $array_recipe['quantity'],
					'valeur_id_recette'		=> $id_recette,
					'valeur_id_ingredient'	=> $value,
					'valeur_quantity'		=>  8
				]);
			}

		}
	}


?>