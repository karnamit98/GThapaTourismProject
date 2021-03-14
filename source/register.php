<?php include_once 'header.php'; ?>


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
            <label for="agreeTerms" >I agree to all statements in <a href="#">Terms of service</a></label>
        </div>
    </form>


<?php include_once 'footer.php'; ?>