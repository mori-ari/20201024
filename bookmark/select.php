<?php
//1.  DB接続します
require_once("funcs.php");
$pdo = db_conn();
//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_list");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { 
    $view .= '<div class="book_flex">';
    $view .= '<img class="book_size" src="'.$result['img_url'].'">';
    $view .= '<div class="balloon_off" id="'.$result['id'].'">';
    $view .= '<div class="close"><span class="batsu"></span></div>';
    $view .= '<a href="'.$result['book_url'].'" target="_blank"><p class="balloon_p">'.$result['bookname'].'</p></a>';
    $view .= '<p>レビュー：'.$result['review'].'</p>';
    $view .= '<a href="detail.php?id='. $result["id"].'"><button class="btn">修正</button></a>';
    $view .= '<a href="delete.php?id='. $result["id"].'"><button class="btn">削除</button></a>';
    $view .= '</div>';
    $view .= '</div> ';  

   }
}




?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-2.1.3.min.js"></script>
    <title>本棚</title>
</head>

<body>
  <?php include('inc/header.php');?>
    <div id="main">
    
      <h1>本棚</h1>

      <p class="text">本をクリックしてレビューをチェック</p>


<div class="nav_box">
<a href="index.php"><div id="bt_return">次の本を登録</div></a>
</div>


      <div id="bg_book">
    <div id="bg_book_inbox">
    <?= $view ?>


   <!-- <div class="book_flex" id="balloonoya" onclick="showBalloon()">
  <img class="book_size"  src="●●●">
  <span class="balloon_off" id="makeImg">
      <p>タイトル：●●●</p>
      <p>レビュー：●●●</p>
    <button><a href="●●●" target="_blank">詳細へ</a></button>

  <button>閉じる</button>
</span>
</div>  -->



</div>
</div>









</div>



<?php include('inc/footer.php');?>



<script>

$('.book_flex').click(function(){
    $('.balloon').addClass('balloon_off').removeClass('balloon');
    $('.balloon_off',this).addClass('balloon').removeClass('balloon_off');
  });
   $('.close').click(function(){
    event.stopPropagation();
    $(this).parent().addClass('balloon_off').removeClass('balloon');
  });

</script>

</body>
</html>
