<html>
	<head>
		<title>庫存管理系統</title>
    	<meta charset="UTF-8" />
    	<style>
    		*{
    			box-sizing: border-box;
    		}
    		.header{
    			overflow: hidden;
    			background-color: #000000;
    			padding: 20px 10px;
    		}
    		.header h1{
    			padding:10px;color:white;
    		}
    		.header a{
    			float: left;
    			color: white;
    			text-align: center;
    			padding: 12px;
    			text-decoration: none;
    			font-size: 18px;
    			line-height: 25px;
    			border-radius: 4px;
    		}
    		.header button{
    			background-color:#D26900;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;border-radius: 4px;
    		}
    		.header button:hover {
    			background-color: #ddd;color: black;
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
        }
        .content h1{
          position: absolute;
          width: 144px;
          height: 42px;
          left: 600px;
          top:200px;
          color:black;
          font-weight:bold;
    		}
        .content form{
          font-weight:bold;
          font-size: 24px;
        }
        
        .submitButton{
          background-color:#D26900;border: none;color: white;text-align: center;text-decoration: none;display:inline-block;
          font-size: 16px;margin: 2px 2px;cursor: pointer;border-radius: 4px;
        }
        
    	</style>
	</head>
	<body>
		<div class="header">
			<h1>庫存管理系統</h1>
			<button class="button" onclick="openpage1()">庫存狀態</button>
			<button class="button" onclick="openpage2()">物料訂購</button>
			<button class="button" onclick="openpage3()">訂單管理</button>
			<button class="button" onclick="window.location.href='首頁.php';"style="float: right;padding: 12px 28px;font-size: 14px">回首頁</button>
		</div>
		<div class="sidebar_left"></div>
    <div class="sidebar_right"></div>
    <div class="content">
      
    <br><h1>訂購單</h1></br>
    <form style="margin:0 auto" align=center action="PHP_Form.php" method="POST">
    <br>訂單編號: <input type="text" name="mOrderID" placeholder="Auto"></br>
    <br>物料編號: <input type="text" name="materialID" placeholder="Auto"></br>
    <br>物料名稱: <input type="text" name="materialName" placeholder="Auto"></br>
    <br>數量: <input type="text" name=amount placeholder="Auto"></br>
    <br>單價: <input type="text" name="unitPrice" placeholder="Auto"></br>
    <br>總成本: <input type="text" name="totalCost" placeholder="Auto"></br>
    <br ><input style="background-color:#D26900" type="submit" value="送出"></br>
    </form>

    </div>
		<script>
			function openpage1()
			{
        		document.getElementById("welc").setAttribute("src", "庫存狀態.php");
			}
		</script>
		<script>
			function openpage2()
			{
				document.getElementById("welc").setAttribute("src", "物料訂購.php");
			}
		</script>
		<script>
			function openpage3()
			{
				document.getElementById("welc").setAttribute("src", "訂單管理.php");
			}
		</script>
		
	</body>
</html>