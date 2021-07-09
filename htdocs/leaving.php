<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="sp_Tab_style.css">
    <link rel="stylesheet" media="screen and (min-width:769px)" href="pc_Tab_style.css">
    <title>退室の処理</title>
  </head>

  <body>

  <hr>
  <div>
  <a href="index.php" class="btn-square-pop">トップへ</a>
  <a href="list.php" class="btn-square-pop">　一覧　</a>
</div>

  <?php
    session_start(); // セッションを開始する．
    $userid = $_SESSION['ID'];
    
    
    // 日付や時刻の取得
    date_default_timezone_set('Asia/Tokyo');
    // $date = $now->format('Y-m-d');
    // $etime = $now->format('H:i:s');
    $date = date('Y-m-d');
    $etime = null;
    $ltime = date('H:i:s');

  
    // DBの接続とDBへの登録
    require 'db.php'; # 接続

    

   // すでにその日に userid が存在するかどうか確認
   $sql = 'select * from timetable where UserID = "'.$userid.'" && Date = "'.$date.'"'.' order by LeavingTime DESC Limit 1';
   $prepare = $db->prepare($sql); # 準備
   $prepare->execute();
   $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

  // userid のデータが存在する場合
  
    $sql = 'update timetable set LeavingTime ="'.$ltime.'"  where UserID = "'.$userid.'"';
    $prepare = $db->prepare($sql); # 準備
   $prepare->execute();
  
  
    // userid のデータが存在しない場合
    if ($result == null) {
     $sql = 'select timetable form mydb where UserID = "'.$userid.'"';
     echo "入室がありません。登録しません。";
    }
    
      
      
    
    
  ?>
<script type="text/javascript" src="index2.js"></script>
  </body>

</html>

