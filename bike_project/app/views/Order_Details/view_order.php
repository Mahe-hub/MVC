<?php
// add header 
require  APP_ROOT."/views/Common/Header.php";
?>

  <h1 class="fw-bold"> Order detail</h1><br>
  <table class="table table-dark table-hover">
    <thead>
      <th>Product ID </th>
      <th>Product number </th>
      <th>Brand</th>
      <th>price</th>
      <th>wheels</th>
      <th>Brakes</th>
      <th>Category</th>
    </thead>
    <tbody>
      <?php
      if(!empty($firstParmeter))
      {
       echo"<tr>
            <td>".$firstParmeter->id."</td>
            <td>".$firstParmeter->product_number."</td>
            <td>".$firstParmeter->brand."</td>
            <td>".$firstParmeter->price."</td>
            <td>".$firstParmeter->wheels."</td>
            <td>".$firstParmeter->brakes."</td>
            <td>".$firstParmeter->category."</td>
          </tr>
        ";
      }else{
        echo"<tr>
             <td colspan=8> No record found</td>
           </tr>";
      }
      ?>
    </tbody>
  </table>
  <div class="list-group">
    <?php
      if(!empty($secondParmeter))
      {
        echo "<a href=Orders/deleteOrder?deleteid=".$secondParmeter->id." class=list-group-item list-group-item-action>Delete order</a>
              <a href=Home class=list-group-item list-group-item-action>Place Order</a>
              <a href=Products class=list-group-item list-group-item-action>Back to products</a>
        ";
      }else{
        echo " <a href=Home class=list-group-item list-group-item-action>Place Order</a>
               <a href=Products class=list-group-item list-group-item-action>Back to products</a>";
      }
      ?>
    <!-- <a href="Orders/deleteOrder?deleteid=  class="list-group-item list-group-item-action">Delete order</a>
    <a href="Home" class="list-group-item list-group-item-action">Place Order</a>
    <a href="Products" class="list-group-item list-group-item-action">Back to products</a> -->
  </div>
  

<?php
// add Footer
require  APP_ROOT."/views/Common/Footer.php";
?>
 