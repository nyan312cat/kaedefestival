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
  $goal=$_GET['goal'];
  include('w_Dijkstra.php');
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

  <!-- 1階 -->
  <div class="first_floor">
    <svg viewBox="0 0 939 1401" width="939" height="1401">
    </svg>
  </div>
  <!-- 2階 -->
  <div class="second_floor">
    <svg viewBox="0 0 939 1401" width="939" height="1401">
    </svg>
  </div>
  <!-- 3階 -->
  <div class="third_floor">
    <svg viewBox="0 0 939 1401" width="939" height="1401">
    </svg>
  </div>
  <!-- 4階 -->
  <div class="four_floor">
    <svg viewBox="0 0 939 1401" width="939" height="1401">
      <!-- ここから、部屋の出力 -->
      <?php
      //roomを押された時のURLを決める。
      function room_url($i,$start){
        echo "\"/map/$i\"";
      }
      //roomの塗りつぶし方を決める。
      function room_fill($i,$start,$goal){
        if($start==$i):
          echo "style=\"fill:blue;opacity:0.5\"";
        elseif($goal==$i):
            echo "style=\"fill:skyblue;opacity:0.5\"";
        else:
            echo "style=\"fill:white;opacity:0.0\"";
        endif;
      }
      $floor=4;
      include('w_room.php');
      ?>
      <!-- ここから、道の出力 -->
      <?php
      //roadの塗りつぶし方を決める。
      function road_fill($j,$route){
        if($route[$j]):
          echo "style=\"stroke:red;stroke-width:20\"";
        endif;
      }
      include('w_road.php');
      ?>
    </svg>
    <!-- <svg width="120" height="120">
    <polygon points="60,20 100,40 100,80 60,100 20,80 20,40" style="fill:blue;stroke:black;stroke-width:5;opacity:0.8"/>
    </svg> -->
  </div>
  <script src="/common.js"></script>
</body>
</html>
