<?php
session_start();

// Destroy session
$_SESSION = [];
session_unset();
session_destroy()

if (session_destroy()) {
	// Destroy cookie
	if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
		unset($_COOKIE['id']);
		unset($_COOKIE['key']);
		setcookie('id', '', time() - 3600);
		setcookie('key', '', time() - 3600);
		// Redirect to home
		header("Location: ../");
	}

	// Redirect to home
	header("Location: ../");
}

?>
