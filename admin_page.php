<?php

@include 'model/tconfig.php';

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO producttb(product_name, product_price, product_image) VALUES('$product_name', '$product_price', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new center added successfully';
      }else{
         $message[] = 'could not add the center';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM producttb WHERE id = '$id'");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="email.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

<div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter center name" name="product_name" class="box">
         <input type="number" placeholder="enter center price" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>
   <?php
   $result = mysqli_query($conn, "SELECT * FROM producttb");
   echo "<table border='1' width='100%' >"; 
         while($rows = $result->fetch_assoc()) { 
            echo<<<HTML
               <tr>
                  <td>{$rows['id']}</td>
                  <td>{$rows['product_name']}</td>
                  <td>{$rows['product_price']}</td>
                  <td>
                     <a href="admin_update.php?edit={$rows['id']}" class="btn"> <i class="fas fa-edit"></i> edit </a>
                  </td>
                  <td>
                     <a href="admin_page.php?delete={$rows['id']}" class="btn"> <i class="fas fa-trash"></i> delete </a>
                  </td>
               </tr>
            HTML;
         }
                  
      //       echo "<tr>";
      //       echo "<td>" . $row['product_name'] . "</td>"; 
      //       echo "<td>" . $row['product_price'] . "</td>";
      //       echo "<td><img src='./".$row['product_image']."'></td>";
      //       // echo "<td><a href=\"admin_update.php?edit=" .$rows['id']. "\">edit</a></td>";
      //       echo "<td><a href=\"admin_page.php?delete=" .$rows['id']. "class="btn"\">delete</a></td>";
      //       echo "</tr>"; 
      //    }
      // echo "</table>";
   ?>
   
   </div>

</div>
<p class="login-register-text"><a href="adminwelcome.php"><h4>Get Back</h4></a>.</p>

</body>
</ht

