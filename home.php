<?php

include 'components/connect.php';


session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

include 'components/background.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">



</head>
<body>
   
<?php include 'components/user_header.php'; ?>




<section class="home">





   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
      <a href="category.php?category=Cloth">
         <div class="image">
            <img src="images/home-img-1.png" alt="">
            
                  
         </div>
         
      </div>

      <div class="swiper-slide slide">
      <a href="shop.php">
         <div class="image">
            <img src="images/home-img-2.png" alt="">
         </div>
         
      </div>

      <div class="swiper-slide slide">
      <a href="shop.php">
         <div class="image">
            <img src="images/home-img-3.png" alt="">
         </div>
         
      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<section class="category">

   <h1 class="heading">
   <i class="fa-solid fa-shop" style="color: #00b850;"></i>
      shop by category
   </h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=Cloth" class="swiper-slide slide">
      <img src="images/icon-1.png" alt="">
      <h3>Cloth</h3>
   </a>

   <a href="category.php?category=Electronics" class="swiper-slide slide">
      <img src="images/icon-2.png" alt="">
      <h3>Electronics</h3>
   </a>

   <a href="category.php?category=Games" class="swiper-slide slide">
      <img src="images/icon-3.png" alt="">
      <h3>Games</h3>
   </a>

   <a href="category.php?category=Furniture" class="swiper-slide slide">
      <img src="images/icon-4.png" alt="">
      <h3>Furniture</h3>
   </a>

   <a href="category.php?category=Sports" class="swiper-slide slide">
      <img src="images/icon-5.png" alt="">
      <h3>Sports</h3>
   </a>

   <a href="category.php?category=Vegetables" class="swiper-slide slide">
      <img src="images/icon-6.png" alt="">
      <h3>Vegetables</h3>
   </a>

   <a href="category.php?category=Stationery" class="swiper-slide slide">
      <img src="images/icon-7.png" alt="">
      <h3>Stationery</h3>
   </a>

   <a href="category.php?category=Books" class="swiper-slide slide">
      <img src="images/icon-8.png" alt="">
      <h3>Books</h3>
   </a>

   <a href="category.php?category=Medicine" class="swiper-slide slide">
      <img src="images/icon-9.png" alt="">
      <h3>Medicine</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<div class="banner-container">

    <div class="banner">
        <div class="shoe">
            <img src="images/shoe.png" alt="">
        </div>
        <div class="content">
            <span>upto</span>
            <h3>50% 0ff</h3>
            <p>offer ends after 5 days</p>
            <a href="#" class="btn">view offer</a>
        </div>
        <div class="women">
            <img src="images/women.png" alt="">
        </div>
    </div>

</div>
<section class="home-products">

<h1 class="heading">
  
   <i class="fa-solid fa-fire" style="color: #ee2020;"></i>
   Popular Products
</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>


<div class="gallery">
  <figure class="card">
      <img
           src="images/img1.jpg"
           alt=""
           >
    </figure>
    <figure class="card">
      <img
           src="images/img2.png"
           alt=""
           >
    </figure>
    <figure class="card">
      <img
           src="images/game-1.jpg"
           alt=""
           >
           </figure>
    <figure class="card">
      <img
           src="images/img-4.png"
           alt=""
           >
    </figure>       
</div>


<section class="home-products">

   <h1 class="heading">
   <i class="fa-solid fa-arrow-trend-up" style="color: #FFD43B;"></i>
    Trending Now
   </h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>






<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>


<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>