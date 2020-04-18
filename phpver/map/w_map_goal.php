<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>かえで祭　校内図</title>
  <link rel="stylesheet" href="/common.css">
  <link rel="stylesheet" href="/map/w_styles.css">
  <?php
  //URLパラメーター
  $start=$_GET['start'];
  $goal=0;
  ?>
</head>
<body>
  <?php
  $head="";
  ob_start();
  include($_SERVER["DOCUMENT_ROOT"]."/header.php");
  $head=ob_get_contents();
  ob_end_clean();
  echo $head;
  ?>

  <div class="four_floor">
    <svg viewBox="0 0 939 1401" width="939" height="1401">
      <!-- ここから、部屋の出力 -->
      <?php
      //roomを押された時のURLを決める。
      function room_url($i,$start){
        echo "\"/map/w_map_result.php/?start=$start&goal=$i\"";
      }
      //roomの塗りつぶし方を決める。
      function room_fill($i,$start,$goal){
        echo "style=\"fill:blue;stroke:black;stroke-width:5;opacity:0.0\"";
      }
      $floor=4;
      include('w_room.php');
      ?>
    </svg>
  </div>
  <script type="text/javascript">
  alert('ゴール位置を押してください。');
  </script>
  <script src="/common.js"></script>
</body>
</html>
