<?php 

	function lang($phrase) {
		static $lang = array(
			
			// Dashborad Pages
			'HOME_ADMIN' => 'الرئسية',
			'CATEGORIES' => 'المنتجات',
			'EDIT_PROFILE' => 'تحرير الملف الشخصي',
			'SETTINGS' => 'الإعدادات',
			'LOGOUT' => 'خروج'
			
		);

		return $lang[$phrase];
	}