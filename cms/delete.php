<?php
require_once("funcs.php");
$id = $_GET['id'];
$pdo = db_conn();
//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_user_table WHERE id=:id');
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} 
// else {
//     redirect('select.php');
//     header('Location: select.php');
// }
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>削除完了</title>
</head>

<body>
  <?php include('inc/header.php');?>
    <div id="main">
    
    <h1>ユーザーの削除が完了しました</h1>

<!-- <p class="text">次に本棚に置く本を選びましょう。</p> -->

<div class="nav_box">
<a href="select.php"><input id="submit" value="ユーザー一覧に戻る"></a>
</div>
</div>  

</div>

<?php include('inc/footer.php');?>
</body>
</html>


