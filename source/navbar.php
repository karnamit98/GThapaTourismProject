<?php $curPage = basename($_SERVER['PHP_SELF']); ?>

<div class="top-nav">
    <a href="register.php" class="<?php echo ($curPage == "register.php" ? "active" : "");?>">SignUp/SignIn</a>
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
        <a href="contact.php" class="<?php echo ($curPage == "contact.php" ? "active" : "");?>">Contact Us</a>
    </div>

    
</div>
      