<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>ユーザー登録</title>
      <style>

      </style>
  </head>
  <body>
<?php include('inc/header.php');?>

    <div id="main">

      <h1>ユーザー登録</h1>
      <form action="insert.php" method="post">
        <table>
         <tr>
            <td class="td"><label for="name">氏名</label></td>
            <td><input type="text" placeholder="(例)山田 太郎" class="width" id="name" name="name" required></td>
        </tr>
        <tr>
            <td class="td"><label for="lid">ユーザー名</label></td>
            <td><input type="text" placeholder="半角英数3文字以上" pattern="^([a-zA-Z0-9]{3,})$" title="半角英数字3文字以上で入力して下さい" class="width" id="lid" name="lid" required></td>
        </tr>
        <tr>
            <td class="td"><label for="lpw">パスワード</label></td>
            <td><input type="password" placeholder="半角英数6文字以上" class="width" id="lpw" name="lpw" pattern="^([a-zA-Z0-9]{6,})$" title="半角英数6文字以上で入力" required></td>
        </tr>
          <tr>
            <td class="td"><label for="kanri_flg">管理者権限</label></td>
            <td><input type="radio" name="kanri_flg" value="0" required>一般社員
            <input type="radio" name="kanri_flg" value="1">管理者</td>    
        </tr>
        </table>
                <div class="nav_box"><input id="submit" type="submit" value="確認"></div>
      </form>

      </div>

      <?php include('inc/footer.php');?>


  </body>
</html>

