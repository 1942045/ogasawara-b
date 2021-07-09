<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <title>入退室と一覧表示の処理</title>
  </head>

  <body>

  <?php
    // session を定義する
    session_start(); // セッションを開始する．

    $userid = $_POST["userid"];
    $_SESSION['ID'] = $userid; // ユーザIDを記憶する．

    $sbtn = $_POST["select"];

    // 押されたボタンの確認
    switch ($sbtn) {
    case "in":
        // 入室が押された時の処理
        header('Location: entry.php');
        break;
    case "out":
        // 退室が押された時の処理
        header('Location: leaving.php');
        break;
    case "list":
        // 在席一覧が押された時の処理
        header('Location: list.php');
        break;
    }
  ?>

  </body>

</html>
