<?php

	/*
	** Get Records Function v2.0
	** Function To Get getAll From Any Table In The DB
	*/

	function getAllFrom
	($field, $table, $where = NULL, $and = NULL, $orderfield, $ordering = 'DESC') {

		global $con;

		// No Need To Use, It's Already Null
		$sql = $where == NULL ? '' : $where;

		$getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER bY $orderfield $ordering");

		$getAll->execute();

		$all = $getAll->fetchALl();

		return $all;

	}


	/*
	** Check if user is not activated
	** function to check the regstatus of the user
	*/

	function checkUserStatus($user) {

		global $con;

		$stmtx = $con->prepare("SELECT Username, RegStatus 
								FROM users 
								WHERE Username = ? 
								AND RegStatus = 0");

		$stmtx->execute(array($user));

		$status = $stmtx->rowCount();

		return $status;

	}



	/*
	** Title Function v1.0
	** Echo The Page Title (if isset) else print Default
	*/

	function getTitle() {

		global $pageTitle;

		if (isset($pageTitle)) {
		
			echo $pageTitle;
		
		} else {
		
			echo 'Default';
		
		}
	}


	/*
	** Redirect Function  v2.0
	** This Function Accept Param 
	** $theMsg = Echo The Error Message [error , success , warning]
	** $url = the link you want to redirect to
	** $seconds = Seconds Before Redirecting
	*/

	function redirectHome($theMsg, $url=null, $seconds = 3) {

		if ($url === null) {

			$url = 'index.php';
			$link = 'Homepage';

		} else {

			if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
			
				$url = $_SERVER['HTTP_REFERER'];
				$link = 'Previous Page';

			} else {

				$url = 'index.php';
				$link = 'Homepage';
			}

		}

		echo $theMsg;
		echo "<div class = 'alert alert-info'>You Will Be Redirected To $link After<strong> $seconds Seconds.</strong></div>";
		header("refresh:$seconds;url=$url");

		exit();

	}


	/*
	** Function To Check Items v1.0
	** Function to check item in DB [ function accept param ]
	** $select = the item to select [ ex: user, item, category ]
	** $from = the table to select from [ ex: user, items, category ]
	** $value = the value of select [ ex: osama, box, electornics ]
	*/

	function checkItem($select, $from, $value) {

		global $con;

		$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

		$statement->execute(array($value));

		$count = $statement->rowCount();

		return $count;

	}


	/*
	** Count Number Of Items Function v1.0
	** Function To Count Number Of Itmes Rows
	** $item = The Item To Count
	** $table = The Table To Choose From
	*/

	function countItems($item, $table) {

		global $con;

		$stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");
		
		$stmt2->execute();
		
		return $stmt2->fetchColumn();

	}


	/*
	** Get Latest Records Function v1.0
	** Function To Get Latest From DB [Users, Items, Comments]
	** $select = Fiedl To Select
	** $table = The Table To Choose From
	** $limit = Number Of Record To Get
	** $order = 
	*/

	function getLatest($select, $table, $order, $limit = 5) {

		global $con;

		$getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

		$getStmt->execute();

		$rows = $getStmt->fetchALl();

		return $rows;

	}