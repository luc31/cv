<?php

// check password hash
function isOkPasswordsComponent($data, $password) {

	return password_verify($password, $data['password']);

}

function hashPasswordsComponent($password) {

	return password_hash(trim($password), PASSWORD_DEFAULT);

}

?>