<?php
session_start();

//1. SESSIONデータ取得
$name =$_SESSION['name'];
$lid =$_SESSION['lid'];
$lpw =$_SESSION['lpw'];
$kanri_flg =$_SESSION['kanri_flg'];



//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
//2. DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}
//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw,kanri_flg,indate)VALUES(NULL, :name, :lid, :lpw,:kanri_flg, sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:" . $error[2]);
} else {
  //５．index.phpへリダイレクト 
  // header('Location: select.php');

}
?>



<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>ユーザー登録完了</title>
</head>

<body>
  <?php include('inc/header.php');?>
    <div id="main">
    
    <h1>ユーザー登録が完了しました</h1>

<!-- <p class="text">次に本棚に置く本を選びましょう。</p>


<img class="bg_tana" src="./img/1512.jpg"> -->






<form action="select.php" method="post">
<div class="nav_box">
<a href="index.php"><div id="bt_return">別のユーザーを登録</div></a>
<div><input id="submit" type="submit" value="ユーザー一覧へ"></div>
</div>
</form>
</div>  








</div>

<?php include('inc/footer.php');?>
</body>
</html>


