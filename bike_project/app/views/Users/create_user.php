<?php
    //add header view 
    require APP_ROOT."/views/Common/Header.php"; 
    ?>

<br>

<section>
    <h1 class="fw-bold"> Create new user</h1>
    <br>
    <form class="row g-3" action="" method="post">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label" style="color:red">First Name</label>
        <input type="text"  placeholder ="your first name" class="form-control" id="inputfname" name="inputFname" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label" style="color:red">Last Name</label>
        <input type="text"   placeholder ="your last name"class="form-control" id="inputlname" name="inputLname" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label" style="color:red">Date of Birth</label>
        <input type="date"   placeholder ="your last name"class="form-control" id="inputlname" name="inputDOB" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label" style="color:red">Phone Number</label>
        <input type="tel"  placeholder ="your phone number" class="form-control" id="inputpnumber" name="inputPnumber" required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4"  class="form-label" style="color:red">Email</label>
        <input type="email"   placeholder ="your email" class="form-control" id="inputEmail4" name="inputEmail" required>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label"style="color:red">Password</label>
        <input type="password"  placeholder ="your password" class="form-control" id="inputPassword4" name="inputPassword" required>
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label" style="color:red">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputStreet">
    </div>

    <div class="col-md-2">
        <label for="inputCity" class="form-label" style="color:red">City</label>
        <input type="text"   placeholder ="your city" class="form-control" id="inputCity" name="inputCity" required>
    </div>
    <div class="col-md-2">
        <label for="inputState" class="form-label" style="color:red">State</label>
        <input type="text" class="form-control" id="inputState" placeholder="your province" name="inputState" required>
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label" style="color:red">Zip</label>
        <input type="text"  placeholder ="your postal code" class="form-control" id="inputZip" name="inputZip" required>
    </div>
    
    <div class="col-md-2">
        <label for="inputZip" class="form-label" style="color:red">Country</label>
        <input type="text"  placeholder ="your country" class="form-control" id="inputZip" name="inputCountry" required>
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