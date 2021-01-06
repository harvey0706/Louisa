<?php

include_once('connect1.php');

//如果搜尋欄有輸入值，用搜尋的條件查，沒有的話查詢所有的資料
if(isset($_REQUEST['condition'])){
	$sql = "SELECT * FROM materialOrder WHERE mOrderID LIKE '%".$_REQUEST['condition']."%' OR materialID LIKE '%".$_REQUEST['condition']."%' OR materialName LIKE '%".$_REQUEST['condition']."%' OR amount LIKE '%".$_REQUEST['condition']."%' OR unitPrice LIKE '%".$_REQUEST['condition']."%' OR totalCost LIKE '%".$_REQUEST['condition']."%' ";
}else{
	$sql = "SELECT * FROM materialOrder";
}

$data = mysqli_query($con, $sql);

//分頁變數
$dataCount=mysqli_num_rows($data); //共有幾筆資料
$per = 6; //每頁顯示目標數量
$pageCount = ceil($dataCount/$per); //取得不小於值的下一個整數，總共要分的頁數
if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
	$page=1; //則在此設定起始頁數
} else {
	$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
}
$start = ($page-1)*$per; //每一頁開始的資料序號
$result = mysqli_query($con, $sql.' LIMIT '.$start.', '.$per) or die("Error"); //從$start序號開始，一次取$per筆
?>


<html>
	<head>
		<title>訂單管理</title>
    	<meta charset="UTF-8" />
    	<style>
    		*{
    			box-sizing: border-box;
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

				th { 
  				background-color: #FFBB77;
  				padding:15px;
  				border:1px solid grey;
  				color: white;
					text-align: center;
				}
				
				.userInfoList td{ 
  				border:1px solid grey;
  				padding:10px;
					text-align: center;
				} 
			
				.btn button{
					background-color: white;
					color: orange;
					display: inline;
					font-weight: bold;
					margin-left: -4px;
				}

				tr:nth-child(even){
  				background: #F0F0F0;
				}

				.footer{
					text-align: center;
				}

    	</style>
	</head>
	<body>
		
		<div class="search">
			<form action='訂單管理.php' method='POST'>
			<!-- 關鍵字搜尋 -->
			<p>關鍵字：<input id="searchBar" type="text" name="condition" placeholder="Anything"><input id="searchBtn" type="submit" value="查詢"></p>
			</form>
		</div>
		<div>
			<table class="btn">
				<td><button onclick="window.location.href='?page=1'">首頁</button></td>
				<?php
    			for( $i=1 ; $i<=$pageCount ; $i++ ) {
        			if ( $page-3 < $i && $i < $page+3 ) {?>
						<td><button style="height:25px;" onclick="window.location.href='?page=<?php echo $i ?>'"><?php echo $i ?></button></td>
					<?php
					}
				}
				?> 
    			<td><button onclick="window.location.href='?page=<?php echo $pageCount ?>'">末頁</button></td>
		</div>
		<div class="tableContent">
			<table border="1" width=100% class="userInfoList">
				<tr>
					<th>orderID</th>
					<th>materialID</th>
					<th>materialName</th>
					<th>amount</th>
					<th>unitPrice</th>
					<th>totalCost</th>				
				</tr>
				<?php 
					// 用fetch_row讀取陣列的資料(上面已經把customer的資料都撈出來並放在$data裡)，row是一列一列讀，並把它存在&命名為rs，資料型態為array
					// 當使用rs[0]的時候，表示我們要取得這一列的第一個值；當輸入rs[1]的時候，表示要取得這一列的第二個值，以此類推。
					// 如果我們想要呈現第二列的資料，只需要在複製一次這短語法就可以了，當它第二次讀到mysql_fetch_row時，就會回傳第二列的資料，以此類推。
					// 可以用回圈的方式，告訴它我們要執行幾次，如果有三列，我們就讓它到$i<=3就可以了，
					// 而更簡單的作法，是直接請程式抓我們有幾列，透過mysqli_num_rows() -> 此data共有幾列資料，就可以達到
					// 將已經下了limit取分頁指定資料數量的sql傳入
					for($i=0; $i <= mysqli_num_rows($result) ; $i++){
							$rs = mysqli_fetch_row($result);
				?>
				<tr>
				<!-- 如果超出範圍的話會變null，因此要設限制式查看array抓出來的東西是否是null -->
				<?php if(isset($rs[0]) && isset($rs[1]) && isset($rs[2]) && isset($rs[3]) && isset($rs[4]) && isset($rs[5]) ){?>
					<?php $orderID = $rs[0];?>
					<td><a href="個別消費行為.php?MemberID=<?php echo $rs[0];?>"><?php echo $rs[0];?></a></td>
					<td><?php echo $rs[1];?></td>
					<td><?php echo $rs[2];?></td>
					<td><?php echo $rs[3];?></td>
					<td><?php echo $rs[4];?></td>
					<td><?php echo $rs[5];?></td>
				<?php
				}
				?>				
				</tr>
				<?php
				}
				?>
			</table>
			<div class="footer">
			< <?php echo '第'.$page.'頁，共有'.$pageCount.'頁'; ?> >
			</div>
		</div>
	</body>
</html>