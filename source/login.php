<?php include_once 'header.php'; ?>

    <div class="registerContainer">

        <form name="registerForm" class="registerForm" action="#" method="POST" enctype="multipart/form-data">
            <h2>Sign In</h2>

            <div>
                <label for="name"><i class="fas fa-user"></i></label>
                <input type="text" name="name" value="" placeholder="Email or Username" />
            </div>

            <div>
                <label for="password"><i class="fas fa-lock"></i></label>
                <input type="password" name="password" value="" placeholder="Password" />
            </div>
            

            <div style="margin-bottom:2rem;">
                <button type="submit" name="btnSubmit" > Sign In </button>
            </div>
            OR
            <div class="socialSignIn">
                <button name="fbSignin" class="btnFb"><i class="fab fa-facebook"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Facebook</button>
                <button name="twitterSignin" class="btnTwitter"><i class="fab fa-twitter"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Twitter</button>
                <button name="twitterSignin" class="btnGoogle"><i class="fab fa-google-plus-g"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In With Google+</button>
            </div>

        </form>

        <div class="loginImage">
  
            <span class="loginLink">Not a member? <a href="register.php">Sign Up</a></span>
        </div>

    </div>


<?php include_once 'footer.php'; ?>