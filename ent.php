<?php
	ob_start();
	session_start();
	$pageTitle = '';

	if (isset($_SESSION['User'])) {
		header('Location: index.php');
		exit();
	}

	include "init.php";

		// Check If User Coming Form HTTP Post Request

?>

<div class="container text-center">
	<div class="e_aboutC">
		<?php
		if (isset($_GET['id'])) {
				if ($_GET['id'] == "about") {
					?>
					<div id="about-content" class="col-md-12">
							<h2>about</h2>
							<img class='img-circle myImg' src='https://placehold.it/150/200' style="cursor:pointer"/>
							<div class="showDet">
								<p class="exit">
									<i class="fa fa-close fa-5x"></i>
								</p>
								<section class="ticketShow">
									<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
									<a href="#" class="btn btn-primary btn-lg myTicket">حجز جديد</a>
								</section>
								<section style="display:none" class="ticketMsg">
									<p class="btn btn-primary btn-lg">شكراً لك على حجز التذكرة</p>
									<?php
										$msg = 'Are you sure About our win...? iTicket..!';
										echo '<p><a target="_blank" href="https://wa.me/?text='.$msg.'"> Share';
											echo '<i class="fa fa-whattsapp"></i>';
										echo '</a></p>';
									?>
								</section>
							</div>
					</div>
					<?php
				}
				if ($_GET['id'] == "enter") {
		 ?>
		<div id="enter-content" class="col-md-12">
				<h2>enter</h2>
				<img class='img-circle myImg' src='https://placehold.it/150/200' style="cursor:pointer"/>
				<div class="showDet">
					<p class="exit">
						<i class="fa fa-close fa-5x"></i>
					</p>
					<section class="ticketShow">
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="#" class="btn btn-primary btn-lg myTicket">حجز جديد</a>
					</section>
					<section style="display:none" class="ticketMsg">
						<p class="btn btn-primary btn-lg">شكراً لك على حجز التذكرة</p>
						<?php
							$msg = 'Are you sure About our win...? iTicket..!';
							echo '<p><a target="_blank" href="https://wa.me/?text='.$msg.'"> Share';
								echo '<i class="fa fa-whattsapp"></i>';
							echo '</a></p>';
						?>
					</section>
				</div>
		</div>
	<?php }
	if ($_GET['id'] == "sport") {
	?>
		<div id="sport-content" class="col-md-12">
				<h2>sport</h2>
				<img class='img-circle myImg' src='https://placehold.it/150/200' style="cursor:pointer"/>
				<div class="showDet">
					<p class="exit">
						<i class="fa fa-close fa-5x"></i>
					</p>
					<section class="ticketShow">
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="#" class="btn btn-primary btn-lg myTicket">حجز جديد</a>
					</section>
					<section style="display:none" class="ticketMsg">
						<p class="btn btn-primary btn-lg">شكراً لك على حجز التذكرة</p>
						<?php
							$msg = 'Are you sure About our win...? iTicket..!';
							echo '<p><a target="_blank" href="https://wa.me/?text='.$msg.'"> Share';
								echo '<i class="fa fa-whattsapp"></i>';
							echo '</a></p>';
						?>
					</section>
				</div>
		</div>
	<?php }
	if ($_GET['id'] == "trafic") {
	?>
		<div id="trans-content" class="col-md-12">
				<h2>trafic</h2>
				<img class='img-circle myImg' src='https://placehold.it/150/200' style="cursor:pointer"/>
				<div class="showDet">
					<p class="exit">
						<i class="fa fa-close fa-5x"></i>
					</p>
					<section class="ticketShow">
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="#" class="btn btn-primary btn-lg myTicket">حجز جديد</a>
					</section>
					<section style="display:none" class="ticketMsg">
						<p class="btn btn-primary btn-lg">شكراً لك على حجز التذكرة</p>
						<?php
							$msg = 'Are you sure About our win...? iTicket..!';
							echo '<p><a target="_blank" href="https://wa.me/?text='.$msg.'"> Share';
								echo '<i class="fa fa-whattsapp"></i>';
							echo '</a></p>';
						?>
					</section>
				</div>
			</div>
		<?php }
			} ?>
	</div>
</div>


<?php


	include $tpl.'footer.php';
	ob_end_flush();
?>
