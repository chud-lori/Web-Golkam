<?php
session_start();

// Destroy session
$_SESSION = [];
session_unset();

// Destroy cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	unset($_COOKIE['id']);
	unset($_COOKIE['key']);
	setcookie('id', '', time() - 3600, '/');
	setcookie('key', '', time() - 3600, '/');
	// Destroy session
	session_destroy();
	// Redirect to home
	header("Location: ../");
}

if (session_destroy()) {
	// Redirect to home
	header("Location: ../");
}

?>