<!DOCTYPE html>
<html lang='ja'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="sp_style.css">
    <link rel="stylesheet" media="screen and (min-width:769px)" href="pc_style.css">
    <title>在席状況管理システム</title>
  </head>

  <body>
    <hr>
    <div><h2>ラボ在席管理システム</h2></div><br/>
    <div class="button">
      <form action="submit.php" method="post">
        <p>
    <div>      
        ID：<input type="text" name="userid" class="hoge">
    </div>
        </p>
        <p>
          <button class="decorated-btn click-down" type="submit" name="select" value="in">入室</button>
          <button class="decorated-btn click-down" type="submit" name="select" value="out">退室</button><br/>
          <!--<button class="btn" type="submit" name="select" value="list">在席一覧</button>-->
          <button class="decorated-btn click-down" type="submit" name="select" value="list">在席一覧</button>
        </p>
      </form>
    </div>
  </body>

</html>
