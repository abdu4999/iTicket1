<!DOCTYPE html>

<div class="upper-bar">
  <div class="container">
   <?php

    if (isset($_SESSION['User'])) {?>

      <a href="profile.php" style="text-decoration: none;">
        <img class="my-image img-thumbnail img-circle" src="logo.jpeg" alt"" />
      </a>
      <div class="btn-group my-info pull">
        <span class="btn btn-info dropdown-toggle" data-toggle="dropdown">
          <?php echo $sessionUser; ?>
          <span class="caret"></span>
        </span>
        <ul class="dropdown-menu">
          <li><a href="profile.php">My Profile</a></li>
          <li><a href="newad.php">New Item</a></li>
          <li><a href="profile.php#ads">My Items</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>

      <?php

      $St = checkUserStatus($sessionUser);
      if ($St == 1 ) {
        echo ' <b style="text-decoration:underline;color:#8e0000">Your Member Ship Need To Ativate</b>';
      }

    } else {
  ?>
      <a href="login.php">
        <span class="pull-right">Login | Signup</span>
      </a>

  <?php } ?>
  </div>
</div>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target = '#app-nav' aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Homepage</a>
    </div>
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav navbar-right e_eplainingsa ">
        <li id="about"><a href='ent.php?id=about'>من نحن</a></li>
        <li class="notactive" id="enter"><a href="ent.php?id=enter"> الترفيه </a></li>
        <li class="notactive" id="sport"><a href="ent.php?id=sport"> الرياضة </a></li>
        <li class="notactive" id="trans"><a href="ent.php?id=trafic"> النقل العام </a></li>
      </ul>
    </div>
  </div>
</nav>
