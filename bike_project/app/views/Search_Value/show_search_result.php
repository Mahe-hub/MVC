<?php
// add header 
require  APP_ROOT."/views/Common/Header.php";
?>
<section>
        <div class="card-body">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Number</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Wheels</th>
                    <th>Brakes</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(!empty($data['values']))
                {
                        foreach($data['values'] as $value)
                        {    
                        echo
                            "<tr>
                            <td>". $value->id."</td>
                            <td>". $value->product_number."</td>
                            <td>". $value->brand."</td>
                            <td>". $value->price."</td>
                            <td>". $value->wheels."</td>
                            <td>". $value->brakes."</td>
                            <td>". $value->category."</td> 
                        </tr>";
                        }
                 }else{
                        echo
                            "<tr> 
                            <td colspan='8' > No Record Found </td>
                            </tr>"; 
                }
               ?>
            </tbody>
        </table>  
        </div>
</section>
 <?php
// add Footer
require  APP_ROOT."/views/Common/Footer.php";
?>