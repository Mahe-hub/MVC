<?php
// add header 
require  APP_ROOT."/views/Common/Header.php";
?>
 <nav>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Cutomers/update" style="color:red;">
                <i class="fa-solid fa-pen-nib">
                </i>
                update
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Customers/delete" style="color:red;">
                <i class="fa-solid fa-user-xmark">
                </i>
                delete
           </a>
        </li>
    </ul>
</nav>
<section class="container">
    <table class="table table-striped-columns">
        <thead>
            <th>first name</th>
            <th>last name </th>
            <th>date of birth</th>
            <th>province</th>
            <th>city</th>
            <th>street</th>
            <th>zipcode</th>
            <th>country</th>
            <th>phone number</th>
        </thead>
        <tbody>
            <!-- 
             <?php
            //   foreach($data['customer_details'] as $customer)
            //   {
            //    echo "<tr>
            //           <td>".$customer->first_name."</td>
            //           <td>".$customer->last_name."</td>
            //           <td>".$customer->date_Of_Birth."</td>
            //           <td>".$customer->province."</td>
            //           <td>".$customer->city."</td>
            //           <td>".$customer->street."</td>
            //           <td>".$customer->zipcode."</td>
            //           <td>".$customer->country."</td>
            //           <td>".$customer->Phone_number."</td>
            //          </tr>";
            //   }
             ?>
              -->
        </tbody>
    </table>
</section>

<?php
// add Footer
require  APP_ROOT."/views/Common/Footer.php";
?>
            


              
            