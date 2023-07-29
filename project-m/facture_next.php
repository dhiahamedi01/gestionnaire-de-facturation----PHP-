<?php session_start();
if(empty($_SESSION['id'])):
header('Location:login.php');
endif;
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
   <head>
      <meta charset="utf-8">
      <title>Responsive Navbar with Search Box | CodingNepal</title>
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
            <li><a class="artorito" href="facture.php">إنشاء فاتورة</a></li>
            <li><a href="add_user.php"> إضافة مستخدم</a></li>
            <li><a href="admin.php">إدارة الموظفين</a></li>
            <li><a href="caisse.php">كشف حساب</a></li>
            <li><a href="boite.php">صندوق</a></li>
            <li><a href="logout process.php" class="btn"> <span>تسجيل الخروج</span></a></li>
         </div>

      </nav>


      <form enctype="multipart/form-data" action="" class="form" method="POST">
        <section class="container"><br>
            <div class="custom-select" >
                        <label> الخدمة </label><br>
                        <select name="sname">
                                    <?php
                                    session_start();
                                    include 'connexion.php';
                                      
                                       $sprovider= $_SESSION['sprovider'];
                                       $Client=    $_SESSION['Client'];
                                       $gender=    $_SESSION['gender'];
                            
                                       $sql = "SELECT  * FROM services  WHERE `sprovider`='$sprovider'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()) {

                                        echo "<option value='" . $row["sname"] . "'>" . $row["sname"] . "</option>";
                                        $cost= $row['sprice'];  
                                      }
                                    } $_SESSION['cost']=$cost;
                                      $sname= $_POST['sname'];
                                      $price= $_POST['price'];
                                      $commission   = $_POST['comis'];
                                      $_SESSION['price']=$price;
                                      $_SESSION['sname']=$sname;
                                      $_SESSION['comis']=$commission;
                                      if($gender == 1){
                                        $net= $price - $cost;
                                        $suppliera= $price - $net;
                                        $customera= $commission - $price;
                                        $DB=$net - $commission;
                                        $_SESSION['net']=$net;
                                        $_SESSION['suppliera']=$suppliera;
                                        $_SESSION['customera']=$customera;
                                        $_SESSION['DB']=$DB;
                                      }
                                      else if($gender == 2){
                                        $net= $price - $cost;
                                        $suppliera= $cost - $price;
                                        $DB= $net - $commission;
                                        $customera= $net - $DB;
                                        $_SESSION['net']=$net;
                                        $_SESSION['suppliera']=$suppliera;
                                        $_SESSION['customera']=$customera;
                                        $_SESSION['DB']=$DB;
                                    }
                                    else if($gender == 3){
                                        $net= $price - $cost;
                                        $suppliera = $price - $net;
                                        $DB = $net - $commission;
                                        $customera = $net - $DB;
                                        $_SESSION['net']=$net;
                                        $_SESSION['suppliera']=$suppliera;
                                        $_SESSION['customera']=$customera;
                                        $_SESSION['DB']=$DB;
                                    }
                                    if(isset($_POST['save'])){
                                      $req="INSERT INTO `accounting` (`ID`, `Customer`, `Date`, `Service`, `Supplier`, `Price`, `Cost`, `Net`, `Suppliera`, `Commission`, `Customera`, `DB`, `Collector`) VALUES (NULL, '$Client', CURDATE(), '$sname', '$sprovider', '$price', '$cost', '$net', '$suppliera', '$commission', '$customera', '$DB', '$gender');";
                                      $result= mysqli_query($conn,$req);
                                      header('location:facture.php');
                                    }else if(isset($_POST['imprime'])){
                                      $req="INSERT INTO `accounting` (`ID`, `Customer`, `Date`, `Service`, `Supplier`, `Price`, `Cost`, `Net`, `Suppliera`, `Commission`, `Customera`, `DB`, `Collector`) VALUES (NULL, '$Client', CURDATE(), '$sname', '$sprovider', '$price', '$cost', '$net', '$suppliera', '$commission', '$customera', '$DB', '$gender');";
                                      $result= mysqli_query($conn,$req);
                                      header('location:fetura.php');
                                    }
                                    ?>
                        </select>
                    </div>
            
                <div class="column">
                  <div class="input-box">
                    <label> المبيع </label>
                    <input type="number" placeholder="" name="price" required />
                  </div>
                </div>
                <div class="column">
                  <div class="input-box">
                    <label> عمولة </label>
                    <input type="number" placeholder="" name="comis" required />
                  </div>
                </div>
                <button type="submit" name="save">إنشاء</button>
                <button type="submit" name="imprime">إنشاء و طباعة</button>
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