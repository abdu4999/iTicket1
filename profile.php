<?php

	session_start();

	$pageTitle = 'Profile';

	include 'init.php';

  if (isset($_SESSION['User'])) {

    $getUser = $con->prepare("SELECT * FROM users WHERE userName = ? ");

    $getUser->execute(array($_SESSION['User']));

    $info = $getUser->fetch();

		$userid = $info['userId'];

?>
    <h1 class="text-center">  حسابي  </h1>
    <div class="information block">
      <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">  معلوماتي  </div>
          <div class="panel-body">
						<ul class="list-unstyled">
							<li>
								<i class="fa fa-unlock-alt fa-fw"></i>
								<span>  الاسم  </span> : <?php echo $info['userName']; ?>
							</li>
	            <li>
								<i class="fa fa-envelope fa-fw"></i>
								<span> الايميل  </span> : <?php echo $info['userEmail']; ?>
							</li>

							<li>
								<i class="fa fa-envelope fa-fw"></i>
								<span>  اهتماتي   </span> : <?php 	$alltags = getAllFrom("*", "users", "", "", "usersId");

								 ?>
							</li>

						</ul>
						<a href="#" class="btn btn-default my-button">Edit Information</a href="#">
					</div>
        </div>
      </div>
    </div>


<?php

  }else {

    header('Location: login.php');

    exsit();

  }

  	include $tpl . 'footer.php';

?>






















//
