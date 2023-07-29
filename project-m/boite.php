<?php session_start();
if(empty($_SESSION['id'])):
header('Location:login.php');
endif;
include 'includes/db.php';
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
            <li><a href="add_user.php"> إضافة مستخدم</a></li>
            <li><a href="admin.php">إدارة الموظفين</a></li>
            <li><a href="caisse.php">كشف حساب</a></li>
            <li><a class="artorito" href="boite.php">صندوق</a></li>
            <li><a href="logout process.php" class="btn"> <span>تسجيل الخروج</span></a></li>
         </div>

      </nav>


      <form enctype="multipart/form-data" action="insert_boite.php" class="form" method="POST">
        <section class="container">
          <h1>إنشاء سند</h1>
          <div class="custom-select" >
                    <label> إسم العميل </label><br>
                    <select name="Customer">
                                <?php
                                  $sql = "SELECT * FROM accounting";
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["Customer"] . "'>" . $row["Customer"] . "</option>";
                                  }
                                }
                                $conn->close();
                                ?>
                    </select>
                </div>
      
                <div class="custom-select" >
                  <label>نوع السند</label>
                  <select name="type">
                    <option value="1">سند قبض</option>
                    <option value="2">سند صرف</option>
                  </select>
                </div>
                <div class="column">
                <div class="column">
                  <div class="input-box">
                    <label> المبلغ </label>
                    <input type="number" placeholder="" name="prix" required />
                  </div>
                </div>&ensp;&ensp;

                  <div class="column">
                  <div class="input-box">
                    <label> ملاحظة </label>
                    <input type="text" placeholder="" name="Obser" required />
                  </div>
                </div>
                </div>
                <button type="submit" name=create>إضافة</button><br><br>
                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <a href="boite_affiche.php" class="btn4"> <span>رؤية جميع الأسناد</span></a>
              </form>
             <!-- <button type="submit" name=affiche>  </button>-->

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