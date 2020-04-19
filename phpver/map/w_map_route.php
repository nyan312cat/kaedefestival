<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>かえで祭　校内図</title>
  <link rel="stylesheet" href="/common.css">
  <link rel="stylesheet" href="/map/w_styles.css">
  <!-- URLパラメーター -->
  <script type="text/javascript">
  let params=(new URL(document.location)).searchParams;
  let start=params.get('start');
  let goal=params.get('goal');
  </script>
  <!-- URLパラメーター -->
  <?php
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

  <div class="start">
    <div class="explanation">
      出発地:
    </div>
    <div class="position">
      <script type="text/javascript">
      if(start==null)document.write('<div class="null">出発地を選択して下さい。</div>');
      else document.write(start);
      </script>
    </div>
  </div>
  <div class="goal">
    <div class="explanation">
      目的地:
    </div>
    <div class="position">
      <script type="text/javascript">
      if(start!=null && goal==null)document.write('<div class="null">目的地を選択して下さい。</div>');
      else if(goal!=null)document.write(goal);
      </script>
    </div>
  </div>

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
      $floor=4;
      include('position.php');
      //roomを押された時のURLを決める。
      function room_url($key,$start,$goal){
        if($start==null && $goal==null)echo "\"/map/w_map_route.php/?start=$key\"";
        else if($start==null && $goal!=null)echo "\"/map/w_map_route.php/?start=$key&goal=$goal\"";
        else if($start!=null && $goal==null)echo "\"/map/w_map_route.php/?start=$start&goal=$key\"";
        else echo "\"/map/$key\"";
      }
      //roomの塗りつぶし方を決める。
      function room_fill($key,$start,$goal){
        if($start!=null && $goal!=null){
          if($start==$key):
            echo "style=\"fill:blue;opacity:0.5\"";
            elseif($goal==$key):
              echo "style=\"fill:skyblue;opacity:0.5\"";
            else:
              echo "style=\"fill:white;opacity:0.0\"";
            endif;
        }
        else echo 'style="fill:blue;stroke:black;stroke-width:5;opacity:0.0"';
      }
      //roomをsvgのrectで出力していく。forで必要な分出力。
      foreach($position[$floor] as $key=>$value){
        echo '<a href=';
        room_url($key,$start,$goal);
        echo '><rect x="'.$position[$floor][$key][left].'" y="'.$position[$floor][$key][top].'" rx="0" ry="0" width="'.$position[$floor][$key][width].'" height="'.$position[$floor][$key][height].'"';
        room_fill($key,$start,$goal);
        echo '/></a>';
      }
      ?>
      <!-- ここから、道の出力 -->
      <?php
      include('position_road.php');
      if($start!=null && $goal!=null){
        //roadの塗りつぶし方を決める。
        function road_fill($key,$route){
          if($route[$key]):
            echo "style=\"stroke:red;stroke-width:20\"";
          endif;
        }
        //roadをsvgのlineで出力していく。forで必要な分出力。
        foreach($position_road as $key=>$value){
          echo '<line x1="'.$position_road[$key]["x1"].'" y1="'.$position_road[$key]["y1"].'" x2="'.$position_road[$key]["x2"].'" y2="'.$position_road[$key]["y2"].'" ';
          road_fill($key,$route);
          echo '/>';
        }
      }
      ?>
    </svg>
    <!-- <svg width="120" height="120">
    <polygon points="60,20 100,40 100,80 60,100 20,80 20,40" style="fill:blue;stroke:black;stroke-width:5;opacity:0.8"/>
    </svg> -->
  </div>
  <script type="text/javascript">
  if(start==null)alert('スタート位置を押してください。');
  else if(goal==null) alert('ゴール位置を押してください。');
  </script>
  <script src="/common.js"></script>
</body>
</html>
