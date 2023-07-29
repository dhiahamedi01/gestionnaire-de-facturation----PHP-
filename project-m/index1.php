<?php session_start();
if(empty($_SESSION['id'])):
header('Location:login.php');
endif;
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
   <head>
      <meta charset="utf-8">
      <title>muhasaba</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            muha<span>sabe</span>
         </div>
         <div class="nav-items">
            <li><a href="facture1.php">إنشاء فاتورة</a></li>
            <li><a href="caisse1.php">كشف حساب</a></li>
            <li><a href="logout process.php" class="btn"> <span>تسجيل الخروج</span></a></li>
         </div>

      </nav>
      <div class="content">
         <header class="space"> منصة محاسبة</header>
         <div class="space text">
        أكبر برنامج محاسبة  نقدم برنامج محاسبي  بالإضافة إلى خدمات  مالية واستشارية متكاملة
         </div>
      </div>
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
   </body>
</html>