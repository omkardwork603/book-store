<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style type="text/css">
   

   </style>

</head>
<body>
   
<?php include 'header.php'; ?>





<div class="heading">
   <h3>About Us</h3>
   <p> <a href="home.php">home</a> / About us </p>
</div>


<section class="abouts">
   <h3 class="title">about us</h3>
   <div class="flex">
      <div class="image">
         <img src="images/book-about.jpg" alt="">
      </div>
      <div class="contents">
         <p>Based on the search results, here are some insights on writing a book:
            Book Ideas: When looking for book ideas, consider your challenges, what you are learning, and your day-to-day life experiences.

            Book Description Importance: The book description is crucial for marketing your book effectively as it influences readers' buying decisions significantly.

            Writing a Good Book Description: A good book description should be descriptive, engaging, and consumer-friendly, providing enough information to entice potential readers.
         </p>
         <a href="about.php" class="btn">read more</a>
      </div>
   </div>
</section>








<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>