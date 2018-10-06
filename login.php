<?php
	ob_start();
	session_start();
	$pageTitle = 'التسجيل';
  $nonavbar = "";
	if (isset($_SESSION['userName'])) {
		header('Location: omar.php');
		exit();
	}

	include "init.php";

		// Check If User Coming Form HTTP Post Request

		?>

		<img src="" alt="">

		<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST['login_client'])) {
			$user = $_POST['user'];
			$pass = $_POST['password'];
			$hashdePass = sha1($pass);

			$formsErrors = array();

			if (empty($user)) {
				$formsErrors[] = 'No';
			}
			if (empty($pass)) {
				$formsErrors[] = 'No';
			}

			if (empty($formsErrors)) {

				// echo $username . ' ' . $hashdePass;
				// Check if The User Exist In My DB

				$stmt = $con->prepare("SELECT userId, userName, userPassword
										FROM users
										WHERE userName = ?
										AND userPassword = ?
										");

				$stmt->execute(array($user, $hashdePass));

				$get = $stmt->fetch();

				$count = $stmt->rowCount();
				//echo $count;

				// IF Count > 0 This Mean The DB contain Record About This Username
				if ($count > 0) {
					echo 'Good';
					$_SESSION['User'] = $user; // register session name
					$_SESSION['uid'] = $get['UserID']; // register user id in session
					header('Location: index.php');

					//$_SESSION['userName'] = $user; // Register session name
					//$_SESSION['userId'] = $get['userId']; // Register session id
					//header('Location: omar.php'); // Redirect to dashboard page
					//exit();

				} else {
					echo 'Wrong';
				}
			}

		} elseif (isset($_POST['signup_client'])) {

			$formsErrors = array();

			$username 	= $_POST['user'];
			$password 	= $_POST['password'];
			$password2 	= $_POST['password2'];
			$email 			= $_POST['email'];

			if (isset($username)) {

				$filterdUser = filter_var($username, FILTER_SANITIZE_STRING);

				if (strlen($filterdUser) < 4 ) {
					$formsErrors[] = 'Username Can\'t Be Less Than <b>4 Characters</b>';
				}

			}

			if (isset($password) && isset($password2)) {

				if (empty($password)) {
					$formsErrors[] = 'Password Is Not <b>Match</b>';
				}

				if (sha1($password) !== sha1($password2) ) {
					$formsErrors[] = 'Password Does\'t <b>Matched</b>';
				}

			}

			// Check If There Is No Error
			if (empty($formsErrors)) {

				// Check if User Exist in DB
				$check = checkItem("userName", "users", $username);

				if ($check == 1) {

					$formsErrors[] = "Sorry This Username Is <b>Exist</b>";

				} else {

					// Insert User Info In The DB
					$stmt = $con->prepare("INSERT INTO
										 users(userName, userPassword, userEmail)
										VALUES(:muser, :mpass, :memail )");

					$stmt->execute(array(

					'muser' => $username,
					'mpass' => sha1($password),
					'memail' => $email

					));

					// Echo Success Message
					$succesMsg = 'Cong You Are Register Now';
				}
			}

		} elseif (isset($_POST['login_company'])) {

			$user = $_POST['user'];
			$pass = $_POST['password'];
			$hashdePass = sha1($pass);

			$formsErrors = array();

			if (empty($user)) {
				$formsErrors[] = 'No';
			}
			if (empty($pass)) {
				$formsErrors[] = 'No';
			}

			if (empty($formsErrors)) {

				// echo $username . ' ' . $hashdePass;
				// Check if The User Exist In My DB

				$stmt = $con->prepare("SELECT entrId, entrName, entrPassword
										FROM entrepreneur
										WHERE entrName = ?
										AND entrPassword = ?
										");

				$stmt->execute(array($user, $hashdePass));

				$get = $stmt->fetch();

				$count = $stmt->rowCount();
				//echo $count;

				// IF Count > 0 This Mean The DB contain Record About This Username
				if ($count > 0) {
					echo 'Good';

					//$_SESSION['userName'] = $user; // Register session name
					//$_SESSION['userId'] = $get['userId']; // Register session id
					//header('Location: omar.php'); // Redirect to dashboard page
					//exit();

				} else {
					echo 'Wrong';
				}
			}

		} elseif (isset($_POST['signup_company'])) {

			$formsErrors = array();

			$usernameC 	= $_POST['user'];
			$passwordC 	= $_POST['password'];
			$password2C	= $_POST['password2'];
			$emailC 			= $_POST['email'];

			if (isset($usernameC)) {

				$filterdUser = filter_var($usernameC, FILTER_SANITIZE_STRING);

				if (strlen($filterdUser) < 4 ) {
					$formsErrors[] = 'Username Can\'t Be Less Than <b>4 Characters</b>';
				}

			}

			if (isset($passwordC) && isset($password2C)) {

				if (empty($passwordC)) {
					$formsErrors[] = 'Password Is Not <b>Match</b>';
				}

				if (sha1($passwordC) !== sha1($password2C) ) {
					$formsErrors[] = 'Password Does\'t <b>Matched</b>';
				}

			}

			// Check If There Is No Error
			if (empty($formsErrors)) {

				// Check if User Exist in DB
				$check = checkItem("entrName", "entrepreneur", $usernameC);

				if ($check == 1) {

					$formsErrors[] = "Sorry This Username Is <b>Exist</b>";

				} else {

					// Insert User Info In The DB
					$stmt = $con->prepare("INSERT INTO
										 entrepreneur(entrName, entrPassword, entrEmail)
										VALUES(:zuser, :zpass, :zemail )");

					$stmt->execute(array(

					'zuser' => $usernameC,
					'zpass' => sha1($passwordC),
					'zemail' => $emailC

					));

					// Echo Success Message
					$succesMsg = 'Cong You Are Register Now';
				}
			}

		}

	}
	 /*else {
		header("Location: index.php");
		exit();
	}*/

?>

	<div class="container login-page">
		<!--h1 class="text-center">
			<span class="selected" data-class="login">Login</span> |
			<span data-class="signup">Signup</span>
		</h1-->

		<!-- Start Login-SignUp Page -->
		<div class="row">
			<div class="col-md-12 e_slideclient text-center">
				<div class="e_slideclientCC">
					<div class="e_slideclientC">
					<h1>
						<span style="font-size: 36px;" class="selected" data-class="clients"><i class="fa fa-user selected"></i >  الأفراد   </span>
						<span class="breakLine">|</span>
						<span style="font-size: 36px;" data-class="companies"><i class="fa fa-users"></i>  صانعي الحدث   </span>
					</h1>
					<h2>
						<span class="clients" data-class="loginclient">تسجيل الدخول</span>
						<span class="clients">|</span>
						<span class="clients" data-class="signupclient">  إنشاء حساب  </span>
					</h2>
					<h2>
						<span class="companies" data-class="logincompany">تسجيل الدخول</span>
						<span class="companies">|</span>
						<span class="companies" data-class="signupcompany"> إنشاء حساب  </span>
					</h2>

		<!-- Start Client Login Form -->
					<form action="login.php" class="loginclient" method="POST">
						<div class="input-container">
								<input type="text"
								name="user"
								class="form-control"
								placeholder="أدخل اسم المستخدم"
								required
								autocomplete="off"
								value="<?php if(isset($user)){
								echo $user;
							} ?> ">
						</div>
						<div class="input-container">
								<input type="password"
								name="password"
								class="form-control"
								required
								placeholder="أدخل كلمة المرور"
								autocomplete="off">
						</div>
						<div class="logbtn">
							<button type="submit" name="login_client">دخول</button>
						</div>
					</form>
		<!-- End Client Login Form -->

		<!-- Start Client SignUp Form -->
					<form action="login.php" class="signupclient" method="POST">
						<div class="input-container">
								<input type="email"
								name="email"
								class="form-control"
								placeholder=" الإيميل  "
								>
						</div>
						<div class="input-container">
								<input type="password"
								name="password"
								class="form-control"
								placeholder="أدخل كلمة المرور"
								autocomplete="off">
								<input type="password"
								name="password2"
								class="form-control"
								placeholder="أعد إدخال كلمة المرور"
								autocomplete="off">
						</div>

						<div class="input-container">
									<input type="text"
									name="user"
									class="form-control"
									placeholder="اسم المستخدم (يظهر في الموقع)"
									autocomplete="off"
									value="<?php if(isset($username)){
									echo $username;
									} ?>">
						</div>

						<div class="logbtn">
							<button type="submit" name="signup_client">  تسجيل  </button>
						</div>
					</form>
		<!-- End Client SignUp Form -->

		<!-- Start Company Login Form -->
					<form action="login.php" class="logincompany" method="POST">
						<div class="input-container">
								<input type="text"
								name="user"
								class="form-control"
								placeholder="أدخل اسم المستخدم"
								required
								autocomplete="off"
								value="<?php if(isset($user)){
								echo $user;
							} ?> ">
						</div>
						<div class="input-container">
								<input type="password"
								name="password"
								class="form-control"
								required
								placeholder="أدخل كلمة المرور"
								autocomplete="off">
						</div>
						<div class="logbtn">
							<button type="submit" name="login_company">  دخول  </button>
						</div>
					</form>
		<!-- End Company Login Form -->

		<!-- Start Company SignUp Form -->
					<form action="login.php" class="signupcompany" method="POST" enctype="multipart/form-data">
						<div class="input-container">
								<input type="email"
								name="email"
								class="form-control"
								placeholder=" الإيميل  "
								>
						</div>
						<div class="input-container">
								<input type="password"
								name="password"
								class="form-control"
								placeholder="أدخل كلمة المرور"
								autocomplete="off">
								<input type="password"
								name="password2"
								class="form-control"
								placeholder="أعد إدخال كلمة المرور"
								autocomplete="off">
						</div>

						<div class="input-container">
									<input type="text"
									name="user"
									class="form-control"
									placeholder="اسم المستخدم (يظهر في الموقع)"
									autocomplete="off"
									value="<?php if(isset($username)){
									echo $username;
									} ?>">
						</div>

						<div class="logbtn">
							<button type="submit" name="signup_company">  تسجيل  </button>
						</div>
					</form>
		<!-- End Company SignUp Form -->
					</div>
				</div>
			</div>
		</div>
<!-- End Login-SignUp Page -->

		<div class="the-errors text-center">
			<?php
				if (! empty($formsErrors)) {
					foreach ($formsErrors as $error) {
						echo '<p class="msg error">'.$error.'</p>';
					}
				}

				if (isset($succesMsg)) {
					echo '<div class="msg success">'.$succesMsg.'</div>';
				}
			?>
		</div>
	</div>

<?php
	include $tpl.'footer.php';
	ob_end_flush();
?>
