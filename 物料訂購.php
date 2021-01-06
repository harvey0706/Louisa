<?php
	
	

	require_once('connect.php');

	//新增產品
	if(!empty($_POST["mOrderID"])){
		
		$mOrderID = $_POST["mOrderID"];
		$materialID = $_POST["materialID"];
		$materialName = $_POST["materialName"];
    $amount = (int)$_POST["amount"];	
    $unitPrice = $_POST["unitPrice"];
    $totalCost = $_POST["totalCost"];
    $amountNow = $mysqli->query("SELECT amount FROM Material WHERE MaterialID= $materialID");
    $amountNowIndex = mysqli_fetch_array($amountNow)[0];
    $update = $mysqli->query("UPDATE `Material` SET `amount`= $amount+$amountNowIndex WHERE `MaterialID`= $materialID");
		$res = $mysqli->query("INSERT INTO `materialOrder`(`mOrderID`, `materialID`, `materialName`, `amount`, `unitPrice`,`totalCost`) 
                               VALUES ('$mOrderID','$materialID','$materialName','$amount','$unitPrice','$totalCost')");
        echo '<script language="JavaScript">;alert("已完成訂購");location.href="物料訂購.php";</script>;';	
    }
    	?>


<html>
	<head>
		<title>庫存管理系統-物料訂購</title>
    	<meta charset="UTF-8" />
    	<style>
    		*{
    			box-sizing: border-box;
    		}
    		
    	.sidebar_left{
         background-color:#FFECC9;
         width:400px;
         height:500px;
         line-height:400px;
         float:left;
        }
        .sidebar_right{
         background-color:#FFECC9;
         width:400px;
         height:500px;
         line-height:400px;
         float:right;
        }
        .content{
         margin-left:120px;
         margin-right:120px;
         height:500px;
         background-color:#F8F8FF;
         text-align: center;
        }
        .content h1{
          position: absolute;
          width: 144px;
          height: 42px;
          left: 640px;
          top:0px;
          color:black;
          font-weight:bold;
    		}
        .content form{
          font-weight:bold;
          font-size: 24px;
        }
        
        .submitButton{
          position: absolute;
          left: 950px;
          background-color:#D26900;border: none;color: white;text-align: center;text-decoration: none;display:inline-block;
          font-size: 16px;margin: 2px 2px;cursor: pointer;border-radius: 4px;
        }

        .submitbutton:hover {
    			background-color: #ddd;color: black;
    		}
    	</style>
	</head>
	<body>
		
		<div class="sidebar_left"></div>
    <div class="sidebar_right"></div>
    <div class="content">  
    <br><h1>訂購單</h1></br>
    <form style="margin:0 auto" align=center action="物料訂購.php" method="POST" enctype="multipart/form-data" id="form1">
    <input type="button" class="submitButton" name="insertButton" onclick="insert()" value="代入" />
    <br>訂單編號: <input type="text" id="mOrderID" name="mOrderID" placeholder="Auto"/></br>
    <br>物料編號: <input type="text" id="materialID" name="materialID" placeholder="Auto"/></br>
    <br>物料名稱: <input type="text" id="materialName" name="materialName" placeholder="Input"/></br>
    <br>數量: <input type="text" id="amount" name="amount" placeholder="Auto or Input"/></br>
    <br>單價: <input type="text" id="unitPrice" name="unitPrice" placeholder="Auto"/></br>
    <br>總成本: <input type="text" id="totalCost" name="totalCost" placeholder="Auto"/></br>
    <br>
    <input style="background-color:#D26900" type="submit" value="送出" form="form1">
    </br>
    </form>
    
    </div>
    <script>
      function insert(){
        var materialName = document.getElementById("materialName").value
        var materialID = "" ;
        var amount = 0 ;
        var unitPrice = 0 ;
        var totalCost = 0 ;

        if(materialName=="豬肉"){
          materialID="0001";
          amount=100;
          unitPrice=15;
          totalCost=amount*unitPrice;
        }else if(materialName=="起司"){
          materialID="0002";
          amount=50;
          unitPrice=60;
          totalCost=amount*unitPrice;
        }else if(materialName=="瑪芬堡皮"){
          materialID="0003";
          amount=300;
          unitPrice=10;
          totalCost=amount*unitPrice;
        }else if(materialName=="火腿"){
          materialID="0004";
          amount=200;
          unitPrice=5;
          totalCost=amount*unitPrice;
        }else if(materialName=="漢堡皮"){
          materialID="0005";
          amount=300;
          unitPrice=5;
          totalCost=amount*unitPrice;
        }else if(materialName=="莊園咖啡豆"){
          materialID="0006";
          amount=100;
          unitPrice=180;
          totalCost=amount*unitPrice;
        }else if(materialName=="美式咖啡豆"){
          materialID="0007";
          amount=100;
          unitPrice=160;
          totalCost=amount*unitPrice;
        }else if(materialName=="牛奶"){
          materialID="0008";
          amount=80;
          unitPrice=100;
          totalCost=amount*unitPrice;
        }else if(materialName=="綠茶包"){
          materialID="0009";
          amount=120;
          unitPrice=60;
          totalCost=amount*unitPrice;
        }else if(materialName=="柳橙"){
          materialID="0010";
          amount=80;
          unitPrice=10;
          totalCost=amount*unitPrice;
        }else if(materialName=="紅茶包"){
          materialID="0011";
          amount=120;
          unitPrice=60;
          totalCost=amount*unitPrice;
        }else if(materialName=="黑糖粉"){
          materialID="0012";
          amount=60;
          unitPrice=40;
          totalCost=amount*unitPrice;
        }else if(materialName=="蛋糕"){
          materialID="0013";
          amount=60;
          unitPrice=25;
          totalCost=amount*unitPrice;
        }else if(materialName=="免洗餐具"){
          materialID="0014";
          amount=200;
          unitPrice=3;
          totalCost=amount*unitPrice;
        }else if(materialName=="調味料"){
          materialID="0015";
          amount=80;
          unitPrice=40;
          totalCost=amount*unitPrice;
        }else if(materialName=="蛋"){
          materialID="0016";
          amount=300;
          unitPrice=5;
          totalCost=amount*unitPrice;
        }else{
          materialID="NULL";
          amount=0;
          unitPrice=0;
          totalCost=amount*unitPrice;
        }
        
        
        document.getElementById("mOrderID").placeholder = Math.floor(Math.random()*100000);
        document.getElementById("materialID").placeholder = materialID;
        document.getElementById("amount").placeholder = amount;
        document.getElementById("unitPrice").placeholder = unitPrice;
        document.getElementById("totalCost").placeholder = totalCost;
      }
      
    </script>
    
	</body>
</html>