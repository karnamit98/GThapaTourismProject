<?php $curPage = basename($_SERVER['PHP_SELF']); ?>

<div class="top-nav">
    <!-- <p class="" style="color:white;font-size:.8rem;"><i class="fas fa-phone-alt"></i> 9844723612 </p> -->
    <?php if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){ ?>
    <a href="register.php" class="logout <?php echo ($curPage == "register.php" ? "active" : "");?>"><i class="fas fa-user-plus"></i> SignUp/SignIn</a>
    <?php } else {
        include_once('user.php');
         
        $user = new User();
         
        //fetch user data
        $userDetailsSql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
        $userDetailsRow = $user->details($userDetailsSql);
        ?>
        <a href="#" class="<?php echo ($curPage == "account.php" ? "active" : "");?>" style="position:absolute;left:100px;top:10px;"><i class="fas fa-user-circle"></i> <?php echo ucfirst($userDetailsRow['name']); ?></a>
        <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <?php }?>
</div>

<div class="nav " >
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div class="nav-title">
        <!-- RIP & ROAR -->
        <img src="assets/logo.PNG" alt="Logo" style="width:100px;height:100px;position:relative;top:-40px;z-index:9999;
         ">
        </div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
        </label>
</div>
    
  

    <div class="nav-links">
        <a href="index.php" class="<?php echo ($curPage == "index.php" ? "active" : "");?>" >Home</a>
        <a href="about.php" class="<?php echo ($curPage == "about.php" ? "active" : "");?>">About Us</a>
        <a href="contact.php" class="<?php echo ($curPage == "contact.php" ? "active" : "");?>"> Contact Us</a>
    </div>

    
</div>
      