<?php 
	function savePicture($picture)
	{	
		$reponse = [
					 'sendok' => 'success',
				  'sendnotok' => 'error',
				'sendnotsize' => 'errorsize', 			
		   'sendnotextension' => 'errorextension',
				  'sendempty' => 'picturereplace'
			];


		//$nomfichier="fichier_du_".date("YmdHis").".txt";
		define('MAX_SIZE',300000); 
		$tabExt = array('jpg','png','jpeg');    // Extensions autorisees
		$infosImg = array();
		// Variables
		$extension = '';
		$message = [];
		$nomImage = '';
		
		
		
		    // On verifie si le champ est rempli

		  if( !empty($picture['picture_recipe']['name']) )
		  {
		          // On
		     // On recupere les dimensions du fichier
			$infosImg = getimagesize($picture['picture_recipe']['tmp_name']);
		      // Recuperation de l'extension du fichier
		    $extension  = pathinfo($picture['picture_recipe']['name'], PATHINFO_EXTENSION);
		      
		        // On verifie l'extension du fichier
		    if(in_array(strtolower($extension),$tabExt))
		    { 
		        if( (filesize($picture['picture_recipe']['tmp_name']) <= MAX_SIZE))
		        {		            
					$dossier ='c:wamp64\www\eatlist_projet_fin_etude_vs3_mvc\vue\images_recettes\\';
		            $fichier = basename($picture['picture_recipe']['name']);
		          	    
		   			
		        	if(move_uploaded_file($picture['picture_recipe']['tmp_name'],$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		            {
		               return $message=[$reponse['sendok'] , $dossier.$fichier];
		            }
                    else //Sinon (la fonction renvoie FALSE).
                    {
                        return $message[] = $reponse['sendnotok'];
                    }		     	
				}
				else
		        {
		          // Sinon erreur sur les dimensions et taille de l'image
		          return $message[] = $reponse['sendnotsize'];
		        }
		    }
		    else
			{
			      // Sinon on affiche une erreur pour l'extension
				 return $message[] = $reponse['sendnotextension'];
			}
		  }
		  else
		  {
			    // Sinon on affiche une erreur pour le champ vide
			    return $message = $reponse['sendempty'];
		  }
		    
		    echo $message;
		
		   //$uploads_dir = 'E:\PHP\TP\photo';
		   // if ($error == UPLOAD_ERR_OK) {
		    //    $tmp_name = $picture["fichier"]["tmp_name"];
		    //    $name = $picture["fichier"]["name"];
		    //    move_uploaded_file($tmp_name, "$uploads_dir/$name");
	}
?>