<?php  	
	require_once(__DIR__.'/connection_data.php');

	class Ingredient_data
	{
	    

	    // déclaration des méthodes
	     function add_ingredient($name_ingredient) 
	    {	

					$ingredientsId=NULL;
					$bdd = getConnectionData();
			
					//requête de récupération des noms d'ingrédient dans le but de voir si l'élément ex tomate exist déja s'il exite on récupère sont id sinon on l'insère
					$req = $bdd->prepare('SELECT * FROM eatlistingredient WHERE name_ingredient=:value_ingredient_name');
					$req->execute([
						'value_ingredient_name' => $name_ingredient
						]);
						//l'ingrédient exist on récupère sont id
							$rowCount = $req->rowCount();
							if($rowCount == 1)
							{
								$donnees = $req->fetch();
								//on stock les id des ingrédient dans un tableau pour pouvoir les insérer dans la table composeringredientrecette(relation n-n ->donc une table est crée)
								$ingredientsId=$donnees['id_ingredient'];
							}
							// l'ingrédient n'existe pas on l'insert dans la table eatlistingredient
							else
							{
								$req = $bdd->prepare('INSERT INTO eatlistingredient VALUES(NULL,:value_name_ingredient)');			
						
						
								$req->execute
								([
									'value_name_ingredient' => $name_ingredient						
									
								]);
								// On récupère l'id de l'élément que l'on viens d'insérer
								$req = $bdd->prepare('SELECT * FROM eatlistingredient WHERE name_ingredient=:value_ingredient_name');
								$req->execute([
									'value_ingredient_name' => $name_ingredient
								]);
								$donnees = $req->fetch();
								//on stock les id des ingrédient dans un tableau pour pouvoir les insérer dans la table composeringredientrecette(relation n-n ->donc une table est crée)
								$ingredientsId=$donnees['id_ingredient'];
							}

					return $ingredientsId;
			    
		}
	}



?>