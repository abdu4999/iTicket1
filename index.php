<?php
	ob_start();
	session_start();
	$pageTitle = 'التسجيل';

	// if (isset($_SESSION['User'])) {
	// 	header('Location: profile.php');
	// 	exit();
	// }

	include "init.php";

		// Check If User Coming Form HTTP Post Request


?>

<?php
	include $tpl.'footer.php';
	ob_end_flush();
?>
