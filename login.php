<!--用來接收login.html使用者所輸入的會員帳號密碼資料-->

<?php
session_start();
//啟用session
header("Content-Type: text/html; charset=utf8");
//引用connect.php，作用是和資料庫連線，並以選取到test1230此資料庫
include('connect1.php');
//將login.html使用者輸入的表單中帳號密碼用post獲得值並存入變數
$account = $_POST['account'];
$password = $_POST['password'];

//如果帳號和密碼都不為空
if ($account && $password){ 
    //檢測資料庫是否有對應的account和password的sql
    //前面的是user表內的欄位
    $sql = "SELECT * FROM user WHERE account = '$account' and password = '$password' ";
    $result = mysqli_query($con, $sql); //執行sql指令
    $rows=mysqli_num_rows($result); //返回一個數值，值應該會是1，因為對應到唯一一組account和密碼
    if($rows){ //false=0 true=1
        $_SESSION['acc'] = $account;
        $_SESSION['psw'] = $password;
        //成功登入的話，將成功的帳號密碼存到session裡可以帶到後面驗證用
        header("Location: function.html");//成功登入後跳轉到選擇功能頁
        exit;
    }else{
        echo "使用者名稱或密碼錯誤"; //接錯誤彈窗
        echo "<script> setTimeout(function(){window.location.href='Login.html';},1); </script>";
        //如果錯誤使用js 1秒後跳轉到登入頁面重試;
    } 

    //還要加一個什麼都沒填直接按登入的exception

}  
mysqli_close($con); //關閉資料庫
?>