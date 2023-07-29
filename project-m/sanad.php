<?php
    include 'includes/db.php';
    $id = $_GET['id'];

    $sql="SELECT * FROM caisse WHERE `ID` = '$id' ";
    $res= mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($res);

    $type= $row['Type'];
    $customer= $row['Customer'];
    $amount= $row['Amount'];
    $notes= $row['Notes'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<style>
*{
    font-size:1.1em;
}
table {
	border-collapse: collapse;
	width: 100%;
	margin-bottom: 20px;
    height:100%;
}

th, td {
	padding: 10px;
	text-align: center;
	border-bottom: 1px solid #ddd;
}

th {
	background-color: #f2f2f2;
    text-align:center;
}

header {
	margin-bottom: 40px;
}
#company{
text-align:right;
font-size:1.9em;
}
#dates{
    position:absolute;
    left:2%;
    top:5%;
}
button{
    border-style:none;
    width:80px;
}
#header{width:30%;height:20;font-size:20px;margin-left:65%;}
</style>
</head>
<?php 
if(isset($_POST['back'])){
    header('location:boite_affiche.php');
}
?>
<body>
	<header>
    <div id="company">    
    <table id="header"><tr><td>تولين تكنولوجي</td><td>إسم الشركة</td></tr>
        <tr><td>+90 501 244 48 88</td><td>الهاتف</td></tr>
        <tr><td>info@tuline.tech</td><td>البريد الإلكتروني</td></tr>
</table>	
     
            


        </div>
        <span id="dates"> <span id="date"></span> :في</span>

	</header>
	<main>
		<table>
			
				<th colspan="2"><?php if($type=="1"){ echo "سند قبض";} else if($type=="2"){ echo "سند صرف";} ?></th>
			
			<tr>

				<td><?php echo $customer; ?></td>
				<th>إسم العميل</th>
            </tr>
			<tr>

				<td><?php echo $amount; ?></td>
				<th>المبلغ</th>
            </tr>
			<tr>

				<td><?php echo $notes; ?></td>
				<th>ملاحظات</th>
            </tr>
		</table>
	</main>
    <form method="post">
     <button onclick=print()>طباعة</button>
     <button name="back">رجوع</button>
    </form>
</body>
</html>
<script>
    function getDate() {
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth() + 1;
    var year = today.getFullYear();


    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }

    var date = day + "/" + month + "/" + year;

    return date;
}
</script>
<script>
    var dateSpan = document.getElementById("date");
    dateSpan.innerHTML = getDate();
</script>


