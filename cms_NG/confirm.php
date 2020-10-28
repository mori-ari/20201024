<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['name']) && isset($_POST['lid'])&& isset($_POST['lpw'])&& isset($_POST['kanri_flg'])&& isset($_POST['life_flg'])) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['lid'] = $_POST['lid'];
        $_SESSION['lpw'] = $_POST['lpw'];
        $_SESSION['kanri_flg'] = $_POST['kanri_flg'];
    }
}
$name =$_SESSION['name'];
$lid =$_SESSION['lid'];
$lpw =$_SESSION['lpw'];
$kanri_flg =$_SESSION['kanri_flg'];

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

$kanri = "";
if ($kanri_flg==1){
    $kanri = "管理者";
  }else{
    $kanri = "一般社員";
}


?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>ユーザー登録（確認）</title>
  </head>
  <body>
  <?php include('inc/header.php');?>
    <div id="main">
    
      <h1>ユーザー登録（確認）</h1>

      <p class="text">以下の内容で登録します。</p>

      <form action="insert.php" method="post">
   
        <table>
          <tr>
            <td class="td"><label for="name">氏名</label></td>
            <td ><?= h($name) ?></td>
        </tr>
          <tr>
            <td class="td"><label for="lid">ユーザー名</label></td>
            <td ><?= h($lid) ?></td>
        </tr>
        <tr>
        <tr>
            <td class="td"><label for="kanri_flg">管理者権限</label></td>
            <td ><?= h($kanri) ?></td>
        </tr>
        </table>


      <div class="nav_box">
      <a href="index.php"><div id="bt_return">修正</div></a>
      <div><input id="submit" type="submit" value="登録"></div>
    </div>  
    </form>
      </div>
      <?php include('inc/footer.php');?>
</body>
</html>
