<?php

// get formatted messages
function formatMessagesComponent($message, $type = 'normal') {
	
	switch ($type) {
		case 'success':
			$color = 'green';
			break;
		case 'warning':
			$color = 'orange';
			break;
		case 'error':
			$color = 'red';
			break;
		default:
			$color = 'black';
			break;
	}

	return '<font color="'.$color.'">'.$message.'</font><br /><br />';

}

?>