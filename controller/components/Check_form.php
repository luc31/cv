
<?php 
	// check that mandatory fields exist and are not empty /vérifie que les champs obligatoire exist et ne sont pas vide
	function isOkFormsComponent($request_data, $mandatory_fields) {
		
		// loop on mandatory fields/ boulce sur mandatory field ce sont nos champs obligatoire 
		foreach ($mandatory_fields as $key => $fieldName) {		
				
			// if field has been submitted/ si le formulaire a était soumis (regarde si field name sont les clé de request_data)
			if (!array_key_exists($fieldName, $request_data)) 
				return false;

			// if field is not empty/ c'est les champs sont vides (trim enlève l'espace avant )
			if (empty(trim($request_data[$fieldName])))
				return false;
		}

		return true;
	}

?>