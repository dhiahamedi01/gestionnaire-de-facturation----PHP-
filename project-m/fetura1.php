<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>فاتورة</title>
  <style>

    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      color: #333;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 30px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    td:last-child, th:last-child {
      text-align: right;
    }
    .total {
      font-weight: bold;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }
    .logo {
      width: 150px;
    }
    .company-info {
      text-align: right;
    }
    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      text-align: center;
      font-size: 12px;
      color: #666;
      padding: 10px;
      background-color: #f2f2f2;
    }
    .back{
      text-decoration:none;
      color: black;
      background-color:White;
      border:2px solid black;
      border-radius:30%;
      width:70px;
      height:35px;
      text-align:center;
      font-weight:bold;
    }
    .back :hover{
      background-color:black;
      color:white;
    }
    .back :visited{
      color:black;

    }
    .Print{
      text-decoration:none;
      color:black;
      background-color:White;
      border:2px solid black;
      border-radius:30%;
      width:70px;
      height:35px;
      text-align:center;
      font-weight:bold;      
    }
    nav{
      position:fixed;
      top:1%;
    }
    img{height:150px;}
    @media print{
      nav{
        display:none;
      }
    }
    #header{font-size:20px;}
  </style>
</head>

<?php
session_start();
$tehsil     = $_SESSION['gender'];
$customer   = $_SESSION['Client'];
$date       =date("d/m/Y");
$service    = $_SESSION['sname'];
$supplier   = $_SESSION['sprovider'];
$price      = $_SESSION['price'];
$cost       = $_SESSION['cost'];
$commission = $_SESSION['comis'];
$DB	    =     $_SESSION['DB'];
$customera  = $_SESSION['customera'];
$suppliera  = $_SESSION['suppliera'];
$net	      = $_SESSION['net'];?>
<?php
  if(isset($_POST["back"])){
    header('location:facture1.php');
  }
  ?>
<body>
  <header>
    <div class="logo">
      <img src="orgina-logo.jpeg" alt="Company Logo">
    </div>
    <div class="company-info">
    <table id="header"><tr><td>تولين تكنولوجي</td><td>إسم الشركة</td></tr>
        <tr><td>+90 501 244 48 88</td><td>الهاتف</td></tr>
        <tr><td>info@tuline.tech</td><td>البريد الإلكتروني</td></tr>
</table>	
    </div>
  </header>
  <nav>
    <form method="post" action="">
<button class="back" name="back"> < رجوع </Button>
<button onclick="window.print()" class="Print">Print</button>
  </nav>
  <h1>فاتورة</h1>
  
  <table>
    <tr>
        <td> <?php echo "$customer";?> </td>
        <th>إسم العميل</th>
    </tr>
    <tr>
        <td><?php echo "$date";?></td>
        <th>التاريخ</th>
    </tr>
    <tr>
        <td><?php echo "$service";?></td>
        <th>الخدمة</th>
    </tr>
    <tr>
        <td><?php echo "$supplier";?></td>
        <th>إسم المورد</th>
    </tr>
    <tr>
        <td><?php echo "$price";?></td>
        <th>المبيع</th>
    </tr>

    <tr>      
        <td><?php echo "$net";?></td>
        <th>الصافي</th>
    </tr>
    <tr>
        <td><?php echo "$suppliera";?></td>
        <th>حساب المورد</th>
    </tr>
    <tr>
        <td><?php echo "$commission";?></td>
        <th>العمولة</th>
    </tr>
    <tr>
        <td><?php echo "$customera";?></td>
        <th>حساب العميل</th>
    </tr>
    <tr>
        <td><?php echo "$DB";?></td>
        <th>حساب الشركة</th>
    </tr>
    <tr>
        <td><?php echo "$tehsil";?></td>
        <th>جهة التحصيل</th>
    </tr>
  </table>

  <footer>

  </footer>
</body>
</html>

