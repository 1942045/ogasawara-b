<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="sp_lis_style.css">
    <link rel="stylesheet" media="screen and (min-width:769px)" href="pc_lis_style.css">
    <title>全データ表示（その1）</title>
  </head>
  <body>
  <hr>
  
<table border="1" class="sample"><br/><br/><br/>
<div class="size_test">
在席状況一覧
    </div>

<div class="txt2">
<tr>
<th>名前</th>
<th>日付</th>
<th>入室時刻</th>
<th>退室時刻</th>
</tr>
</div>
<?php
// 日付の取得
date_default_timezone_set('Asia/Tokyo');
$date=date('Y-m-d');
require 'db.php';                                # 接続
$sql = 'SELECT
memberlist.Name,
timetable.Date,
timetable.EntryTime,
timetable.LeavingTime
FROM
memberlist INNER JOIN timetable
ON
memberlist.UserID = timetable.UserID
where Date='.'"'.$date.'"'.'Order by Name ASC';


$prepare = $db->prepare($sql);                   # 準備
$prepare->execute();                             # 実行
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);  # 結果の取得

foreach ($result as $row) {
  $id = h($row['Name']);
  $date = h($row['Date']);
  $p = h($row['EntryTime']);
  $s = h($row['LeavingTime']);

  echo  "<tr>
  <td>{$id}</td>
  <td>{$date}</td>
  <td>{$p}</td>
  <td>{$s}</td>
  </tr>";
 

}
?>
</table>
<div id="child_flame">
<a href="index.php">トップへ</a>
</div>
  </body>
</html>
