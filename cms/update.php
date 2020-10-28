<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
require_once('funcs.php');
//1. POSTデータ取得
$name   =$_POST["name"];
$lid  =$_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg    = $_POST["kanri_flg"];
$life_flg    = $_POST["life_flg"];
$indate    = $_POST["indate"];
$id    = $_POST["id"];
//2. DB接続します
//*** function化する！  *****************
// ※returnを変数にちゃんと入れる！
$pdo = db_conn();
//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE 
                            gs_user_table
                        SET
                        name = :name,
                        lid = :lid,
                            lpw = :lpw,
                            kanri_flg = :kanri_flg,
                            life_flg = :life_flg,
                            indate = sysdate()
                        WHERE
                            id = :id;
                        ");
$stmt->bindValue(':name', h($name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', h($lid), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', h($lpw), PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', h($kanri_flg), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', h($life_flg), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} 
// else {
//     redirect('index.php');
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
    <title>ユーザー情報修正完了</title>
</head>

<body>
  <?php include('inc/header.php');?>
    <div id="main">
    
    <h1>ユーザー情報の修正が完了しました</h1>

<!-- <p class="text">次に本棚に置く本を選びましょう。</p> -->

<div class="nav_box">
<a href="select.php"><input id="submit" value="ユーザー一覧に戻る"></a>
</div>
</div>  

</div>

<?php include('inc/footer.php');?>
</body>
</html>


