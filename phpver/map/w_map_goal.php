<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>map</title>
  <link rel="stylesheet" href="/map/w_styles.css">
  <?php
  $start=$_GET['start'];
  $goal=0;
  ?>
</head>
<body>
  <div class="four_floor">
    <svg width="1300" height="1300">
      <?php
      function room_url($i,$start){
        echo "\"/map/w_map_result.php/?start=$start&goal=$i\"";
      }
      function room_fill($i,$start,$goal){
        echo "style=\"fill:blue;stroke:black;stroke-width:5;opacity:0.0\"";
      }
      include('w_room.php')
      ?>
    </svg>
  </svg>
</div>
<script type="text/javascript">
  alert('ゴール位置を押してください。');
</script>
</body>
</html>
