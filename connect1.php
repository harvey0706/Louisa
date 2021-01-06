<?php

//此檔用來建置資料庫連線
// 定義資料庫資訊
$DB_NAME = "TG09"; // 資料庫名稱
$DB_USER = "TG09"; // 資料庫管理帳號
$DB_PASS = "u73e9x"; // 資料庫管理密碼
$DB_HOST = "140.119.19.73:9306"; // 資料庫位址

// 連接 MySQL 資料庫伺服器
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
if (empty($con)) {
    print mysqli_error($con);
    die("資料庫連接失敗！");
    exit;
}

//選擇資料庫(TG09)
mysqli_select_db($con, $DB_NAME);

// 設定連線編碼
mysqli_query($con, "SET NAMES 'UTF-8'");
mysqli_set_charset($con,"utf8");


// 取得資料
//$sql = "SELECT * FROM user";
//$result = mysqli_query($con, $sql);

//以下參考用

// 獲得資料筆數
//if ($result) {
//    $num = mysqli_num_rows($result);
//    echo "user 資料表有 " . $num . " 筆資料<br>";
//}

// --- 顯示資料 --- //

//echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

//$result = mysqli_query($con, $sql);
//while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
//    printf("account : %s<br> password: %s", $row[0], $row[1]);
//}

?>