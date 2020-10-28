<?php
//1.  DB接続します
require_once("funcs.php");
$pdo = db_conn();
//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {       
    $kanri = "";
    $kanri_flg = $result['kanri_flg'];
    if ($kanri_flg==1){
        $kanri = "管理者";
      }else{
        $kanri = "一般社員";
    }
    $life = "";
    $life_flg = $result['life_flg'];
    if ($life_flg==1){
        $life = "退職";
      }



    $view .= '<tr>';
    $view .= '<td class="table_border">'.$result['id'].'</td>';
    $view .= '<td class="table_border">'.$result['name'].'</td>';
    $view .= '<td class="table_border">'.$result['lid'].'</td>';
    $view .= '<td class="table_border">'.$kanri.'</td>';
    $view .= '<td class="table_border">'.$life.'</td>';
    $view .= '<td class="table_border">'.$result['indate'].'</td>';
    $view .= '<td class="table_border"><a href="detail.php?id='. $result["id"].'"><button>修正</button></a>
    <a href="delete.php?id='. $result["id"].'"><button>削除</button></a></td>';
    $view .= '</tr>'; 

   }
}

// function kanri_flg(){
//   if ($result['kanri_flg']==="1");{
//     echo "管理者";
//   }else{
//     echo "一般社員";
//   }
// }


// function life_flg(){
//   if ($result['life_flg']==="1");{
//     echo "退職者";
//   }else{
//     echo "一般社員";
//   }
// }

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-2.1.3.min.js"></script>
    <title>ユーザー一覧</title>
</head>

<body>
  <?php include('inc/header.php');?>
    <div id="main">
    
      <h1>ユーザー一覧</h1>

      <table class="table">
        <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>ユーザー名</th>
            <th>管理者権限</th>
            <th>退職フラグ</th>
            <th>最終更新日時</th>
            <th>修正／削除</th>
        </tr>

        <?= $view ?>

</table> 
</div>



<?php include('inc/footer.php');?>


</body>
</html>
