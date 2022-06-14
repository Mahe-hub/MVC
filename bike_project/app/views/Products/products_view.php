<?php
// add header 
require  APP_ROOT."/views/Common/Header.php";
?>

<section>

        <?php
            foreach($data['getproduct'] as $product)
            {
                echo "<div class='container mt-5 mb-5'>
                       <div class='d-flex justify-content-center row'>
                        <div class='col-md-10'>
                            <div class='row p-2 bg-white border rounded'>
                                <div class='col-md-3 mt-1'>
                                  </div>
                                    <div class='col-md-6 mt-1'>
                                      <h5>".$product->brand
                                        ."</h5>
                            
                                        <div class='mt-1 mb-1 spec-1'>
        
                                        
                                            <span class='dot'>
                                            </span>
                                            <span> 
                                             Wheels :". $product->wheels .",
                                            </span>
                                            <span class='dot'>
                                            </span>
                                            <span>
                                             Brakes : ".$product->brakes. 
                                            "</span>
                                            <br>
                                            <span class='dot'>
                                            </span>
                                            <span>
                                             Category : ". $product->category." 
                                            <br>
                                            </span>
                                        </div>
                                                <div class='mt-1 mb-1 spec-1'>
                                                <p class='text-justify text-truncate para mb-0'>
                                                    
                                                    <br><br>
                                                </p>
                                                </div>
                                                    <div class='align-items-center align-content-center col-md-3 border-left mt-1'>
                                                        <div class='d-flex flex-row align-items-center'>
                                                                <h4 class='mr-1'>
                                                                 Price : ". $product->price."
                                                                </h4>
                                                        </div>
                                                            <h6 class='text-success'>
                                                            Free shipping
                                                            
                                                            </h6>
                                                            <div class='d-flex flex-column mt-4'>
                                                            <a  href=Orders?productid='$product->id'>click</a>
                                                            
                                                             
                                                            
                                                        </div>
                                                    </div>
                                     </div>
                               </div>
                         </div>";
              }
            ?>

                 
    <!-- <table class="table table-striped table-hover">
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Wheels</th>
            <th>Brakes</th>
            <th>Order</th>
        </thead>
        <tbody>
            
        </tbody>
    </table> -->

</section>

<?php
// add Footer
require  APP_ROOT."/views/Common/Footer.php";
?>