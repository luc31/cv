<?php

function isOkUrlsComponent($requestUrl, $mandatoryParameters) {

	foreach ($mandatoryParameters as $key => $parameterName) {
		
		if (!array_key_exists($parameterName, $requestUrl))
			return false;

	}

	return true;

}

function redirectUrlsComponent($url) {
		
	header('Location: '.$url);
	exit();

}

?>