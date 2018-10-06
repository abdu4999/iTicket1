<?php
	ob_start();
	session_start();
	$pageTitle = 'التسجيل';
  $nonavbar = "";
	if (isset($_SESSION['User'])) {
		header('Location: index.php');
		exit();
	}

	include "init.php";

		// Check If User Coming Form HTTP Post Request

		?>

		<img src="" alt="">

		<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST['login'])) {
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$hashdePass = sha1($pass);

			// echo $username . ' ' . $hashdePass;
			// Check if The User Exist In My DB

			$stmt = $con->prepare("SELECT userId, userName, password
									FROM users
									WHERE userName = ?
									AND password = ?
									");

			$stmt->execute(array($user, $hashdePass));

			$get = $stmt->fetch();

			$count = $stmt->rowCount();
			//echo $count;

			// IF Count > 0 This Mean The DB contain Record About This Username
			if ($count > 0) {

				$_SESSION['User'] = $user; // Register session name
				$_SESSION['userId'] = $get['userId']; // Register session id
				header('Location: index.php'); // Redirect to dashboard page
				exit();

			}

		} else {

			$formsErrors = array();

			$username 	= $_POST['username'];
			$password 	= $_POST['password'];
			// $password2 	= $_POST['password2'];
			// $email 		= $_POST['email'];

			if (isset($username)) {

				$filterdUser = filter_var($username, FILTER_SANITIZE_STRING);

				// if (strlen($filterdUser) < 4 ) {
				// 	$formsErrors[] = 'Username Can\'t Be Less Than <b>4 Characters</b>';
				// }

			}

			if (isset($password) && isset($password2)) {

				if (empty($password)) {
					$formsErrors[] = 'Password Is <b>/Empty</b>';
				}

				if (sha1($password) !== sha1($password2) ) {
					$formsErrors[] = 'Password Does\'t <b>Matched</b>';
				}

			}

			// Check If There Is No Error
			if (empty($formsErrors)) {

				// Check if User Exist in DB
				$check = checkItem("Username", "users", $username);

				if ($check == 1) {

					$formsErrors[] = "Sorry This Username Is <b>Exist</b>";

				} else {

					// Insert User Info In The DB
					$stmt = $con->prepare("INSERT INTO
										 users(userName, password, Date)
										VALUES(:muser, :mpass, now() )");

					$stmt->execute(array(

					'muser' => $username,
					'mpass' => sha1($password),


					));

					// Echo Success Message
					header('Location: index.php';
					// $succesMsg = 'Cong You Are Register Now';
}
			}

		}

	}

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
						<span style="font-size: 36px;" class="selected" data-class="clients"><i class="fa fa-user selected"></i>  الأفراد   </span>
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
					<form class="loginclient" action="login.php" method="POST">
						<div class="input-container">
								<input type="text"
								name="username"
								class="form-control"
								placeholder=" الاسم  "
								autocomplete="on"
								>
						</div>
						<div class="input-container">
								<input type="password"
								name="password"
								class="form-control"
								placeholder=" كلمة المرور "
								autocomplete="off">
						</div>
						<div class="logbtn">
							<button type="submit" name="login_client">دخول</button>
						</div>
					</form>
		<!-- End Client Login Form -->

		<!-- Start Client SignUp Form -->
					<form action="index.php?Me=Login" class="signupclient" method="POST">
						<div class="input-container">
								<input type="text"
								name="username"
								class="form-control"
								placeholder=" الاسم  "
								>
						</div>
						<div class="input-container">
								<input type="password"
								name="passwordR"
								class="form-control"
								placeholder="أدخل كلمة المرور"
								autocomplete="off">
								<input type="password"
								name="CpasswordR"
								class="form-control"
								placeholder="أعد إدخال كلمة المرور"
								autocomplete="off">
						</div>


						<div class="input-container">
								<div class="client_companyInput half">
									<input type="text"
									name="NameR"
									class="form-control"
									placeholder="اسم المستخدم (يظهر في الموقع)"
									autocomplete="off"
									value="<?php if(isset($NameR)){
									echo $NameR;
									} ?>">
									<input type="text"
									name="PhoneR"
									class="form-control"
									placeholder="أدخل رقم الجوال بالصيغة 05XXXXXXXX"
									autocomplete="off"
									value="<?php if(isset($PhoneR)){
									echo $PhoneR;
									} ?>">
								</div>
						</div>

						<div class="logbtn">
							<button type="submit" name="signup_client">  تسجيل  </button>
						</div>
					</form>
		<!-- End Client SignUp Form -->

		<!-- Start Company Login Form -->
					<form class="logincompany" action="index.php?Me=Login" method="POST">
						<div class="input-container">
								<input type="email"
								name="company_email"
								class="form-control"
								placeholder="أدخل البريد الإلكتروني"
								autocomplete="off"
								value="<?php if(isset($company_email)){
								echo $company_email;
								} ?>">
						</div>

						<div class="input-container">
								<input type="password"
								name="company_password"
								class="form-control"
								placeholder="أدخل كلمة المرور"
								autocomplete="off">
						</div>
						<div class="logbtn">
							<button type="submit" name="login_company">  دخول  </button>
						</div>
					</form>
		<!-- End Company Login Form -->

		<!-- Start Company SignUp Form -->
					<form action="" class="signupcompany" method="POST" enctype="multipart/form-data">
						<div class="input-container">
								<input type="text"
								name="CNameR"
								class="form-control"
								placeholder=" الاسم )"
								autocomplete="off"
								value="<?php if(isset($CNameR)){
								echo $CNameR;
								} ?>">
						</div>

						<div class="input-container">
								<input type="email"
								name="CemailR"
								class="form-control"
								placeholder="أدخل البريد الإلكتروني"
								autocomplete="off"
								value="<?php if(isset($CemailR)){
								echo $CemailR;
								} ?>">
						</div>

						<div class="input-container">
							<div class="client_companyInput">
								<input type="password"
								name="passwordCR"
								class="form-control"
								placeholder="أدخل كلمة المرور"
								autocomplete="off">
								<input type="password"
								name="CpasswordCR"
								class="form-control"
								placeholder="أعد إدخال كلمة المرور"
								autocomplete="off">
							</div>
							<div class="client_companyInput half">
								<input type="text"
								name="CAddressR"
								class="form-control"
								placeholder="  ادخل العنوان  "
								autocomplete="off"
								value="<?php if(isset($CAddressR)){
								echo $CAddressR;
								} ?>">
								<input type="text"
								name="CPhoneR"
								class="form-control"
								placeholder="أدخل رقم الجوال بالصيغة 05XXXXXXXX"
								autocomplete="off"
								>
							</div>
						</div>

						<div class="logbtn">
							<button type="submit" name="signup_company"> تسجيل  </button>
						</div>
					</form>
		<!-- End Company SignUp Form -->
					</div>
				</div>
			</div>
		</div>
<!-- End Login-SignUp Page -->
		<!-- Start Login Form
		<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="input-container">
				<input
				pattern=".{4,}"
				title="Username Must Be More Than 4 Characters"
				class="form-control"
				type="text"
				name="username"
				autocomplete="off"
				placeholder="Type Your Username"
				required>
			</div>

			<div class="input-container">
				<input class="form-control"
				type="password"
				name="password"
				autocomplete="new-password"
				placeholder="Type A Complex Password"
				required>
			</div>

			<input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
		</form>
		<! End Login Form -->

		<!-- Start Signup Form -->
		<!--form class="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

			<div class="input-container">
				<input
				pattern= ".{4,}"
				title="Username Must Be More Than 4 Characters"
				class="form-control"
				type="text"
				name="username"
				autocomplete="off"
				placeholder="Type Your Username"
				required>
			</div>

			<div class="input-container">
				<input
				minlength="4"
				class="form-control"
				type="password"
				name="password"
				autocomplete="new-password"
				placeholder="Type A Complex Password"
				required>
			</div>

			<div class="input-container">
				<input
				minlength="4"
				class="form-control"
				type="password"
				name="password2"
				autocomplete="new-password"
				placeholder="Type A Password Again"
				required>
			</div>

			<div class="input-container">
				<input
				class="form-control"
				type="email"
				name="email"
				autocomplete="off"
				placeholder="Type A Valid Email"
				required>
			</div>

			<input class="btn btn-success btn-block" type="submit" name="signup" value="Signup">
		</form>
		<! End Signup Form -->

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
