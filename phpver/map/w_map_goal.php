<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>map</title>
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
    <svg width="1300" height="1300">
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
