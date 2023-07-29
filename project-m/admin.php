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
            <li><a href="add_user.php"> إضافة مستخدم</a></li>
            <li><a  class="artorito" href="admin.php">إدارة الموظفين</a></li>
            <li><a href="caisse.php">كشف حساب</a></li>
            <li><a href="boite.php">صندوق</a></li>
            <li><a href="logout process.php" class="btn"> <span>تسجيل الخروج</span></a></li>
         </div>

      </nav>

      <form enctype="multipart/form-data" action="modif.php" class="form" method="POST">
      <?php
	    include 'connexion.php';
		$sql = "SELECT * FROM `users`;";
		$resultat = $conn->query($sql);
		if ($resultat->num_rows > 0) {
		?>
      <table >
				<tr class="title">
               <TD><h6>الرقم التسلسلي</h6></TD>
               <TD><h6>إسم الموظف</h6></TD>
               <TD><h6>كلمة السر</h6></TD>
               <TD><h6>دور العميل</h6></TD>
               <TD><h6></h6></TD>
               <TD><h6></h6></TD>
				</tr>
		<?php
			while($row = $resultat->fetch_assoc()) {	
		?>	
			 <tr >
       <td class="table-active"><?php echo($row["ID"]); ?></td>
       <td class="table-active"><?php echo($row["Username"]); ?></td>
		 <td class="table-active"><?php echo($row["Password"]); ?></td >
       <td class="table-active"><?php
         if($row["Level"]==1){
            echo("مدير"); 
         }else{
            echo("موظف"); 
         }
         
         ?></td >
				<td class="table-active">  <?php echo" <a class='btn1' href='modif.php?id=".$row['ID']." '><span>تبديل الدور</span></a> "?></td>
				<td class="table-active"><?php echo" <a class='btn2' href='delete.php?id=".$row['ID']." '><span>حذف</span></a> "?></td >
			 </tr>	
          <?php
          
			}
		}
		?>		 
			</table>
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