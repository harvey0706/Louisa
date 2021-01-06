<?php

include_once('connect1.php');

// 取得Customer表的資料，並存在data裡
$sql = "SELECT * FROM customer";
$data = mysqli_query($con, $sql);

?>

<html>
	<head>
		<title>會員管理系統-顧客個人分析</title>
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
    			background-color: #FFBB77;color: black;
    		}			
            
        #title{
          text-align: center;
          background-color: #D26900;
          color:white;
          width: 100%;
          height: 40px;
          margin-top: 0;
          line-height: 40px;
          font-weight: bold;
          font-size: 20px;
          margin-bottom: 0px;
        }
            
        .leftSideBar {
          float: left;
          background-color:#FFBB77 ;
          margin-top: 0px;
          width: 20%;
          height: 490px;
          color:white;
          text-align: center;
          font-weight: bold;
          padding: 20;
        }

        .dropdown {
            position: absolute;
            display: inline-block;
		    align-items:center;
			justify-content:center
        }

        .dropdown-content {
          display: none;
          text-align: center;
          position: absolute;
          background-color: #f1f1f1;
          min-width:100px;
          overflow:visible;
          z-index: 1;
        }

        .dropdown-content button {
          color: black;
        padding:12 30px;
          text-decoration: none;
          display: block;
          background-color:white;
        }

      	.dropdown button:hover {
			background-color: #ddd;
		}

        .show {
			display: block;
        }
        
        .type{
          width: 150px;
          height: 30px;
          text-align: center;
        }

        p{
          font-size: 15px;
        }

        .submitBtn{
            cursor: pointer;
            border-radius: 4px;
            color: white;
            background-color: #D26900;
            width: 150px;
            height: 30px;
            text-align: center;
            border: 0;
            margin-top: 20px;
        }

        .chartContent{
        float: right;
        margin-top: 0;
        width: 1139px;
        height: 490px;
      }

      #chart{
        width: 1139px;
        height: 490px;
      }


    	</style>
	</head>
	<body>
		<div class="header">
			<h1>會員關係管理</h1>
			<button class="button" onclick="window.location.href='顧客資料.php'">顧客資料</button>
			<button class="button" onclick="window.location.href='消費行為.php'">消費行為</button>
			<div class="dropdown">
			<button class="button" onclick="myFunction()">圖表分析</button>         
        <div id="myDropdown" class="dropdown-content">
          <button onclick="window.location.href='顧客個人分析.php'">顧客個人分析</button>
          <button onclick="window.location.href='數據圖表分析.php'">數據圖表分析</button>
          、
				</div>
			</div>
			<button class="button" onclick="window.location.href='function.html';"style="float: right;padding: 12px 28px;font-size: 14px">回首頁</button>
		</div>
    <div class="content">
      <p id="title">數據圖表分析</p>
    </div>
    <div class="leftSideBar">
        <p>分析類型</p>
        <form>
        <select class="type" name="type">
　        <option value="fst">留存率</option>
　        <option value="sec">流失率</option>
　        <option value="trd">存活率</option>
        </select>
        </form>
        <p>開始時間</p>
        <form>
          <input class="type" type="Date" name="sDate">
        </form> 
        <p>結束時間</p>
        <form>
          <input class="type" type="Date" name="sDate">
        </form> 
        <p>時間分段</p>
        <form>
        <select class="type" name="period">
　        <option value="year">年</option>
　        <option value="month">月</option>
　        <option value="week">週</option>
          <option value="day">天</option>
        </select>
        </form>
        <button class="submitBtn" onclick="createImg()" ondblclick="createImg2()">產生圖表</button>
    </div>
    <div class="chartContent">
      <img id="chart";>
    </div>
    <script type="text/javascript">
    
			function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      function createImg(){
        document.getElementById("chart").src="one.png";
      }

      function createImg2(){
        document.getElementById("chart").src="tw.png";
      }
    </script>
	</body>
</html>