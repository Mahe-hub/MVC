<?php
// add header 
require  APP_ROOT."/views/Common/Header.php";
?>

  <main>
      <br/>
        <!-- Section: Design Block -->
      <section class=" text-center text-lg-start">
       
       <style>
          .rounded-t-5 {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
          }

          @media (min-width: 992px) {
            .rounded-tr-lg-0 {
              border-top-right-radius: 0;
            }

            .rounded-bl-lg-5 {
              border-bottom-left-radius: 0.5rem;
            }
          }
        </style>

      <div class="card mb-3">
          <div class="row g-0 d-flex align-items-center">
              <div class="col-lg-4 d-none d-lg-flex">
                <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                  class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
              </div>
               <div class="col-lg-8">
                  <div class="card-body py-5 px-md-5">

                    <form method="post" action="">
                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <input type="email" id="username" class="form-control" name ='username' />
                        <label class="form-label" for="username">Email address</label>
                      </div>

                      <!-- Password input -->
                      <div class="form-outline mb-4">
                        <input type="password" id="userpassword" class="form-control"  name ='userpassword'/>
                        <label class="form-label" for="userpassword">Password</label>
                      </div>
                            <span>
                                <?php 
                                if($data != [])
                                {
                                    echo $data['message'];
                                }
                                ?>
                            </span>
                            <br>

                      <!-- Submit button -->
                      <button type="submit" class="btn btn-primary btn-block mb-4" style="background-color:red">Sign in</button>

                     </form>

                  </div>
                </div>
            </div>
        </div>
    </main>
  <!-- Section: Design Block -->

<?php
// add Footer
require  APP_ROOT."/views/Common/Footer.php";
?>