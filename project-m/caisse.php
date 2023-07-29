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
            <li><a   href="admin.php">إدارة الموظفين</a></li>
            <li><a class="artorito" href="caisse.php">كشف حساب</a></li>
            <li><a href="boite.php">صندوق</a></li>
            <li><a href="logout process.php" class="btn"> <span>تسجيل الخروج</span></a></li>
         </div>

      </nav>
      <form  enctype="multipart/form-data" class="filter" method="POST" action="caisse_filter.php">
       <label for="">فلترة بحسب المورّد</label>
       <input type="text" placeholder="" name="mouared" />&ensp;&ensp;&ensp;
       <label for="">فلترة بحسب العميل </label>
       <input type="text" placeholder="" name="client" />&ensp;&ensp;&ensp;
       <label for="">فلترة بحسب التاريخ</label>
       <input type="date" placeholder="" name="date" />&ensp;&ensp;&ensp;
       <button class="btn" name="filter" type="submit"> <span>البحث </span></button>
      </form>

      <form enctype="multipart/form-data" action="insert.php" class="form" method="POST">
      <?php
	    include 'connexion.php';
       $total_price=0;
       $total_suppliera=0;
       $total_DB =0;
       $tota_net=0;
      $sql = "SELECT * FROM `accounting`;";
		$resultat = $conn->query($sql);
		if ($resultat->num_rows > 0) {
		?>
      <table >
				<tr class="title">
          <TD><h4> متسلسل</h4></TD>
          <TD><h4> العميل</h4></TD>
			 <TD><h4> التاريخ</h4></TD>
          <TD><h4> الخدمة</h4></TD>
          <TD><h4> المورد</h4></TD>
          <TD><h4> المبيع</h4></TD>
			 <TD><h4> التكلفة</h4></TD>
          <TD><h4> صافي</h4></TD>
          <TD><h4> ح المورد</h4></TD>
          <TD><h4> عمولة</h4></TD>
			 <TD><h4> ح العميل</h4></TD>
          <TD><h4> حساب الشركة</h4></TD>
          <TD><h4> التحصيل</h4></TD>
          <TD></TD>
				</tr>
			 <?php
			while($row = $resultat->fetch_assoc()) {	
		   ?>
			 <tr >
       <td class="table-active"><?php echo($row["ID"]); ?></td>
       <td class="table-active"><?php echo($row["Customer"]); ?></td>
		 <td class="table-active"><?php echo($row["Date"]); ?></td >
       <td class="table-active"><?php echo($row["Service"]); ?></td >
       <td class="table-active"><?php echo($row["Supplier"]); ?></td>
       <td class="table-active"><?php echo($row["Price"]); ?></td>
		 <td class="table-active"><?php echo($row["Cost"]); ?></td >
       <td class="table-active"><?php echo($row["Net"]); ?></td >
       <td class="table-active"><?php echo($row["Suppliera"]); ?></td>
       <td class="table-active"><?php echo($row["Commission"]); ?></td>
		 <td class="table-active"><?php echo($row["Customera"]); ?></td >
       <td class="table-active"><?php echo($row["DB"]); ?></td >
       <td class="table-active"><?php
       if($row["Collector"]==1){
         echo("العميل"); 
       }else if($row["Collector"]==2){
         echo("المورد"); 
       }else{
         echo("الشركة"); 
       }
       ?></td >
       <td><td class="table-active"><?php echo" <a class='btn2' href='delete_facture.php?id=".$row['ID']." '><span>حذف</span></a> "?></td ></td>
			 </tr>		
          <?php
          $total_price =$total_price+ $row['Price'];
          $total_suppliera = $total_suppliera +$row['Suppliera'];
          $total_DB = $total_DB+$row['DB'];
          $tota_net =$tota_net+ $row['Net'];
			}
		}
		?>		 
			</table>
    </section>
  </form>
  <section id="totals">
        <table>
            <tr>
               <td ><h3> قيمة المبيعات</h3></td>
                <td ><h3><?php echo ($total_price); ?> </h3></td>
            </tr>
            <tr>
                <td ><h3>إجمالي حساب المورد </h3></td>
                <td ><h3><?php echo ($total_suppliera); ?></h3></td>
            </tr>
            <tr>
                <td ><h3>إجمالي قيمة الأرباح </h3></td>
                <td ><h3><?php echo ($total_DB); ?></h3></td>
            </tr>
            


        </table>
    </section>
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