<?php 

	function lang($phrase) {
		static $lang = array(

			// Navbar Pages
			'HOME_ADMIN' 	=> 'Home',
			'CATEGORIES' 	=> 'Categories',
			'ITEMS' 		=> 'Items',
			'MEMBERS' 		=> 'Members',
			'COMMENT' 		=> 'Comment',
			'STATISTICS' 	=> 'Statistics',
			'LOGS' 			=> 'Logs',
			'EDIT_PROFILE' 	=> 'Edit Profile',
			'SETTINGS' 		=> 'Settings',
			'LOGOUT' 		=> 'Logout'
			
		);

		return $lang[$phrase];
	}