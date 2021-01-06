<!DOCTYPE html>
<html>
<head>
	<title>顧客個人分析</title>
	<style type="text/css">
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
    			background-color: #FFBB77;
					color: black;
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
		.top{
			background-color: #FF9224;
			text-align: center;
		}
		.name{
			padding: 20px
		}
		.left{
			width:50%;
			height:500px;
          	background:white;
          	float: left;
          	display:flex;align-items:center;justify-content:center;
		}
		.right{
			width:50%;
			height:500px;
			background:	#FFF3EE;
			float: left;
			display:flex;align-items:center;justify-content:center;
		}
		#searchBar{
			padding:5px 15px;
			width: 16%;
			border:2px black solid;
			cursor:pointer;
			-webkit-border-radius: 5px;
			border-radius: 5px;
		}

		#searchBtn{
			margin-left: 5px;
			padding:8px 15px;
			background:#ccc;
			border:0 none;
			cursor:pointer;
			-webkit-border-radius: 5px;
			border-radius: 5px; 
			background-color:#D26900;
			color: white;
		}
		.pic{
			width: 60%
		}
		.tb{
			width: 80%;
			height: 60%
		}
    </style>
    <div class="header">
			<h1>會員關係管理</h1>
			<button class="button" onclick="window.location.href='顧客資料.php'">顧客資料</button>
			<button class="button" onclick="window.location.href='消費行為.php'">消費行為</button>
			<div class="dropdown">
			<button class="button" onclick="myFunction()">圖表分析</button>         
        <div id="myDropdown" class="dropdown-content">
          <button onclick="window.location.href='顧客個人分析.php'">顧客個人分析</button>
          <button onclick="window.location.href='數據圖表分析.php'">數據圖表分析</button>
				</div>
			</div>
			<button class="button" onclick="window.location.href='function.html';"style="float: right;padding: 12px 28px;font-size: 14px">回首頁</button>
		</div>
	<script type="text/javascript">
		function Method(){
			var val=document.getElementById("searchBar").value;
			if (val==="test1"||val==="test2"||val==="test3"||val==="test4"||val==="test5"||val==="上下錞"||val==="連恩柔"||val==="江仲偉"||val==="張皓鈞") {
				document.getElementById("name").innerHTML="<b style='font-size:20px;'>"+val+" 的個人分析</b>"
				createImg();
				createTable();
			}
			else{
				alert("此顧客不存在!");
			}
		}
		function createImg(){
             var rdmNum = Math.floor(Math.random()*5);
             if (rdmNum===0) {
             	document.getElementById("chart").src="chart1.png";
             }
             else if(rdmNum===1){
             	document.getElementById("chart").src="chart2.png";
             }
             else if(rdmNum===2){
             	document.getElementById("chart").src="chart3.png";
             }
             else if(rdmNum===3){
             	document.getElementById("chart").src="chart4.png";
             }
 			else{
 				document.getElementById("chart").src="chart5.png";
 			}
      	}
      	function createTable(){
      		var Num1 = Math.floor(Math.random()*100000);
      		document.getElementById("tr1").innerHTML=Num1;
      		var Num2 = Math.floor(Math.random()*2);
      		if (Num2===0) {
      			var txt="蛋糕"
      		}
      		if (Num2===1) {
      			var txt="莊園拿鐵"
      		}
      		document.getElementById("tr2").innerHTML=txt;
      		var Num3=Math.floor(Math.random()*30);
      		document.getElementById("tr3").innerHTML=Num3;
      		var Num4=Math.floor(Math.random()*2);
      		if (Num4===0) {
      			var txt="台中大甲店"
      		}
      		if (Num4===1) {
      			var txt="木柵政大店"
      		}
      		document.getElementById("tr4").innerHTML=txt;
      		var Num5=Math.floor(Math.random()*200000);
      		document.getElementById("tr5").innerHTML=Num5;
      	}
          function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
		</script>
<body>
	<div class="top">
		顧客個人分析	
	</div>
	<div class="name">
		<p id="name">請輸入顧客名稱</p>
		<div class="search">	
			<p>關鍵字：<input id="searchBar" type="text" name="condition" placeholder="顧客名稱"><button id="searchBtn" onclick="Method()" >查詢</button></p>
		</div>
    </div>
	</div>
	<div class="left">
		<img id="chart" src="" class="pic">
	</div>
	<div class="right">
		<table class="tb" border=1>
			<tr id="row">
				<td>個別錢包大小</td>
				<td id="tr1"></td>
			</tr>
			<tr id="row2">
				<td>最近購賣品項</td>
				<td id="tr2"></td>
			</tr>
			<tr id="row3">
				<td>30天內購買筆數</td>
				<td id="tr3"></td>
			</tr>
			<tr>
				<td>最常出現店家</td>
				<td id="tr4"></td>
			</tr>
			<tr>
				<td>總購買金額</td>
				<td id="tr5"></td>
			</tr>
		</table>
	</div>
</body>
</html>