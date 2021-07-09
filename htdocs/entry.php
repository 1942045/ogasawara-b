<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="sp_Tab_style.css">
    <link rel="stylesheet" media="screen and (min-width:769px)" href="pc_Tab_style.css">
    
    <title>入室の処理</title>
  </head>

  <body>
  <hr>
  <div>
    <a href="index.php" class="btn-square-pop">トップへ</a>
    <a href="list.php" class="btn-square-pop">　一覧　</a>
  </div>

  <?php
    session_start(); // セッションを開始する．
    // session を定義する
    $userid = $_SESSION['ID'];
    

    // 日付や時刻の取得
   date_default_timezone_set('Asia/Tokyo');
   $date = date('Y-m-d');
   $etime = date('G:i:s');
   $ltime = NULL;

    // DBの接続とDBへの登録
    require 'db.php'; # 接続

    //DBに一致するUserIDが存在するか
    $sql = 'select * memberlist where UserID = "'.$userid.'"';

    // すでにその日に userid が存在するかどうか確認
    $sql = 'select * from timetable where UserID = "'.$userid.'" && Date = "'.$date.'"'.' order by EntryTime DESC Limit 1';

    $prepare = $db->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

    // userid のデータが存在しない場合
    if ($result == null) {
       $sql = 'insert into timetable (UserID, Date, EntryTime, LeavingTime) values (:userid, :date, :etime, :ltime)';
       $prepare = $db->prepare($sql); # 準備

       $prepare->bindValue(':userid', $userid, PDO::PARAM_STR);   # 埋め込み1
       $prepare->bindValue(':date', $date, PDO::PARAM_STR);       # 埋め込み2
       $prepare->bindValue(':etime', $etime, PDO::PARAM_STR);     # 埋め込み3
       $prepare->bindValue(':ltime', $ltime, PDO::PARAM_STR);     # 埋め込み3
       $prepare->execute(); # 実行
       
    }
 
    // userid のデータが存在する場合
    else {
       foreach ($result as $row) {
          $e = h($row['EntryTime']);
          $l = h($row['LeavingTime']);

          //ユーザが存在しているが、入室が埋まっている場合
          if($e != NULL && $l == NULL){
            $sql = 'select timetable form mydb where EntryTime = "'.$etime.'"';
            echo "すでに入室しています。登録しません。";
          }
          // ユーザが存在しているが、入室と退室が埋まっていたら登録する
          if ($e != NULL && $l != NULL) {
              $sql = 'insert into timetable (UserID, Date, EntryTime, LeavingTime) values (:userid, :date, :etime, :ltime)';
              $prepare = $db->prepare($sql); # 準備

              $prepare->bindValue(':userid', $userid, PDO::PARAM_STR);   # 埋め込み1
              $prepare->bindValue(':date', $date, PDO::PARAM_STR);       # 埋め込み2
              $prepare->bindValue(':etime', $etime, PDO::PARAM_STR);     # 埋め込み3
              $prepare->bindValue(':ltime', $ltime, PDO::PARAM_STR);     # 埋め込み3

              $prepare->execute(); # 実行
          } elseif ($e != NULL && $l == NULL) {
              echo " ";
          }
       }
    }
    ?>




  </body>

</html>
