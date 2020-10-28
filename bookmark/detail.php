<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id'];
// echo ($id);
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_list
                       WHERE id=".$id);
$status = $stmt->execute();
//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>本を修正</title>
  </head>
  <body>
<?php include('inc/header.php');?>

    <div id="main">

      <h1>おすすめの本を修正</h1>
      <form action="update.php" method="post">
        <table>
         <tr>
            <td class="td"><label for="bookname">本のタイトル</label></td>
            <td><input type="text" placeholder="本のタイトルを入力してください" class="width" id="bookname" name="bookname" value="<?= $result['bookname']?>" required></td>
        </tr>
        <tr>
            <td class="td"><label for="img_url">画像URL</label></td>
            <td><input type="url" placeholder="(例)http://www/gsbooks.com/img.jpg" class="width" id="img_url" name="img_url" value="<?= $result['img_url']?>" required></td>
        </tr>
        <tr>
            <td class="td"><label for="book_url">詳細URL</label></td>
            <td><input type="url" placeholder="(例)http://www/gsbooks.com/book.html" class="width" id="book_url" name="book_url" value="<?= $result['book_url'] ?>" required></td>
        </tr>
          <tr>
            <td class="td"><label for="review">一言レビュー</label></td>
            <td><textarea rows="3" cols="40" id="review" placeholder="(例)今年一番面白かった！" name="review"><?= $result['review'] ?></textarea></td>            
        </tr>
        </table>
        <input type="hidden" name="id" value=<?= $result['id'] ?>>
        <input type="hidden" name="indate" value=<?= $result['indate'] ?>>

        <div class="nav_box">
          <a href="select.php"><div id="bt_return">戻る</div></a>
          <div class="nav_box"><input id="submit" type="submit" value="修正"></div>
        </div> 

      </form>

      </div>

      <?php include('inc/footer.php');?>


  </body>
</html>
