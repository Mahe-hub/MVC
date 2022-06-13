<?php
    //add header view 
    require APP_ROOT."/views/Common/Header.php"; 
    ?>

<br>
<section class="container">

 <h1 class="fw-bold"> Create new user</h1>
   
   <br>

    <form class="row g-3" action="Register/registerUser" method="post">

      <div class="col-md-6">
         <label for="firstname" class="form-label" style="color:red">First Name</label>
         <input type="text"  placeholder ="your first name" class="form-control" id="firstname" name="firstname" required>
      </div>

      <div class="col-md-6">
         <label for="lastname" class="form-label" style="color:red">Last Name</label>
         <input type="text"   placeholder ="your last name"class="form-control" id="lastname" name="lastname" required>
      </div>

      <div class="col-md-6">
         <label for="dateofbirth" class="form-label" style="color:red">Date of Birth</label>
         <input type="date"   placeholder ="your birth of date "class="form-control" id="dateofbirth" name="dateofbirth" required>
      </div>

      <div class="col-md-6">
         <label for="phonenumber" class="form-label" style="color:red">Phone Number</label>
         <input type="tel"  placeholder ="your phone number" class="form-control" id="phonenumber" name="phonenumber" required>
      </div>

      <div class="col-md-6">
         <label for="email"  class="form-label" style="color:red">Email</label>
         <input type="email"   placeholder ="your email" class="form-control" id="email" name="email" required>
      </div>

      <div class="col-md-6">
         <label for="password" class="form-label"style="color:red">Password</label>
         <input type="password"  placeholder ="your password" class="form-control" id="password" name="password" required>
      </div>

      <div class="col-12">
         <label for="address" class="form-label" style="color:red">Address</label>
         <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address">
      </div>

      <div class="col-md-2">
         <label for="city" class="form-label" style="color:red">City</label>
         <input type="text"   placeholder ="your city" class="form-control" id="city" name="city" required>
      </div>

      <div class="col-md-2">
         <label for="state" class="form-label" style="color:red">State</label>
         <input type="text" class="form-control" id="state" placeholder="your province" name="state" required>
      </div>

      <div class="col-md-2">
         <label for="zipcode" class="form-label" style="color:red">Zip</label>
         <input type="text"  placeholder ="your postal code" class="form-control" id="zipcode" name="zipcode" required>
      </div>
      
      <div class="col-md-2">
         <label for="country" class="form-label" style="color:red">Country</label>
         <input type="text"  placeholder ="your country" class="form-control" id="country" name="country" required>
      </div>

      <div class="col-12">
         <button type="submit" class="btn btn-primary" style="background-color:red" name="signup">Register</button>
         <button type="reset" class="btn btn-primary" style="background-color:red">Reset</button>
      </div>

    </form>

</section>


<?php
//add footer view 
require APP_ROOT."/views/Common/Footer.php"; 
?>