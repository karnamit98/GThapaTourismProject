<?php $curPage = basename($_SERVER['PHP_SELF']); ?>

<div class="top-nav">
    <!-- <p class="" style="color:white;font-size:.8rem;"><i class="fas fa-phone-alt"></i> 9844723612 </p> -->
    <a href="register.php" class="<?php echo ($curPage == "register.php" ? "active" : "");?>"><i class="fas fa-user-plus"></i> SignUp/SignIn</a>
</div>

<div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div class="nav-title">
        RIP & ROAR
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
      