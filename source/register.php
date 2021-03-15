<?php include_once 'header.php'; ?>

    <div class="registerContainer" style="margin-top:3rem;">

        <form name="registerForm" class="registerForm" action="#" method="POST" enctype="multipart/form-data">
            <h2>Sign Up</h2>

            <div>
                <label for="name"><i class="fas fa-user"></i></label>
                <input type="text" name="name" value="" placeholder="Your Name" />
            </div>

            <div>
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" name="email" value="" placeholder="Your Email"/>
            </div>

      
            
            <div>
                <label for="password"><i class="fas fa-lock"></i></label>
                <input type="password" name="password" value="" placeholder="Password" />
            </div>
            
            <div>
                <label for="password"><i class="fas fa-lock" style="color:#6e7c7c"></i></label>
                <input type="password" name="confirmPassword" value="" placeholder="Repeat your password" />
            </div>

            <div>
                <input type="checkbox" id="agreeTerms" name="agreeTerms" value="" /> 
                <label for="agreeTerms" >I agree to all <a href="#">Terms of service</a></label>
            </div>

            <div style="margin-bottom:2rem;">
                <button type="submit" name="btnSubmit" > Sign Up </button>
            </div>
            OR
            <div class="socialSignIn">
                <button name="fbSignup" class="btnFb"><i class="fab fa-facebook"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Facebook</button>
                <button name="twitterSignup" class="btnTwitter"><i class="fab fa-twitter"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Twitter</button>
                <button name="twitterSignup" class="btnGoogle"><i class="fab fa-google-plus-g"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up With Google+</button>
            
            </div>

        </form>

        <div class="registerImage" style="position:relative;top:-4rem;">
  
            <span class="loginLink">Already member? <a href="login.php">Sign In</a></span>
        </div>
       

    </div>


<?php include_once 'footer.php'; ?>