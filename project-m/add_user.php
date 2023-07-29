<?php session_start();
if(empty($_SESSION['id'])):
header('Location:login.php');
endif;
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
   <head>
      <meta charset="utf-8">
      <title>muhasabe</title>
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
         <style>
          nav .nav-items .artorito{
            color: #ff3d00;
          }
         </style>
         <div class="nav-items">
            <li><a href="service.php">إنشاء خدمة</a></li>
            <li><a href="facture.php">إنشاء فاتورة</a></li>
            <li><a class="artorito" href="add_user.php"> إضافة مستخدم</a></li>
            <li><a href="admin.php">إدارة الموظفين</a></li>
            <li><a href="caisse.php">كشف حساب</a></li>
            <li><a href="boite.php">صندوق</a></li>
            <li><a href="logout process.php" class="btn"> <span>تسجيل الخروج</span></a></li>
         </div>

      </nav>


      <form enctype="multipart/form-data" action="insert.php" class="form" method="POST">
        <section class="container">
          <h1>إضافة مستخدم</h1>
                <div class="input-box">
                  <label> إسم المستخدم </label>
                  <input type="text" placeholder="" name="username" required />
                </div>
        
                <div class="column">
                  <div class="input-box">
                    <label>كلمة السر</label>
                    <input type="password" placeholder="" name="password" required />
                  </div>
                </div><br><br>

                <label>دور العميل</label><br><br>
                <div class="gender-option">
                  <div class="gender">
                    <input type="radio" id="check-male" name="level" value="2" checked />
                    <label for="check-male" >موظف</label>
                  </div>
                  <div class="gender">
                    <input type="radio" id="check-female" name="level" value="1" />
                    <label for="check-female">مدير</label>
                  </div>
                </div>
                <button type="submit" name=create >إضافة</button>
        </section>
              </form>

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