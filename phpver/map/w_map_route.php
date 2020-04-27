<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>かえで祭　校内図</title>
  <link rel="stylesheet" href="/common.css">
  <link rel="stylesheet" href="/map/map.css">
  <link rel="stylesheet" href="/map/w_styles.css">
  <!-- URLパラメーター JavaScript -->
  <script type="text/javascript">
  let params=(new URL(document.location)).searchParams;
  let start=params.get('start');
  let goal=params.get('goal');
  </script>
  <!-- URLパラメーター PHP -->
  <?php
  $start=$_GET['start'];
  $goal=$_GET['goal'];
  ?>
</head>
<body>
  <!-- ヘッダーの読み込み -->
  <?php
  $head="";
  ob_start();
  include($_SERVER["DOCUMENT_ROOT"]."/header.php");
  $head=ob_get_contents();
  ob_end_clean();
  echo $head;
  ?>
  <!-- KAEDE FESTIVALのロゴのための余白 -->
  <div class="none">
  </div>

  <!-- メニュー -->
  <div class="menu">
    <div class="switch">
      <a href="/map/w_map_route.php/?start=<?php echo $goal;?>&goal=<?php echo $start;?>"><!-- 反転させる。 -->
        <div class="switch">
          ↑↓
        </div>
      </a>
    </div>
    <div class="place">
      <div class="start">
        <div class="explanation">
          出発地:
        </div>
        <div class="position">
          <script type="text/javascript">
          if(start==null)document.write('<div class="null">出発地を地図から選択して下さい。</div>');
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
          if(start!=null && goal==null)document.write('<div class="null">目的地を地図から選択して下さい。</div>');
          else if(goal!=null)document.write(goal);
          </script>
        </div>
      </div>
    </div>
  </div>

  <!-- room,road もろもろの設定 -->
  <?php
  // roomの設定
  //position.jsonの読み込み
  $json=file_get_contents('./position.json');
  $position=json_decode($json,true);
  //roomを押された時のURLを決める。
  function room_url($key,$start,$goal,$floor){
    $key=$floor."F:".$key;
    if($start==null && $goal==null)echo "\"/map/w_map_route.php/?start=$key\"";//$start,$goalが決まっていない時、
    else if($start==null && $goal!=null)echo "\"/map/w_map_route.php/?start=$key&goal=$goal\"";//$startが決まっていない時、
    else if($start!=null && $goal==null)echo "\"/map/w_map_route.php/?start=$start&goal=$key\"";//$goalが決まっていない時、
    else echo "\"/map/$key\"";//$start,$goalが決まっている時、
  }
  //roomの塗りつぶし方を決める。
  function room_fill($key,$start,$goal,$floor){
    $key=$floor."F:".$key;
    if($start!=null && $goal!=null){//$start,$goalが決まっている時、
      if($start==$key)echo "style=\"fill:skyblue;opacity:0.5\"";//$startの部屋に色を着ける。
      elseif($goal==$key)echo "style=\"fill:pink;opacity:0.5\"";//$goalの部屋に色を着ける。
      else echo "style=\"fill:white;opacity:0.0\"";//他の部屋は色を着けない。
    }
    else echo 'style="fill:blue;stroke:black;stroke-width:5;opacity:0.0"';//他の部屋は色を着けない。
  }
  // roadの設定
  include('w_Dijkstra.php');
  // //roadを全て表示する。(road追加する時のため startとgoalが設定されていないと表示されない。)
  // foreach($position_road as $key1=>$value){//1,2,3,4階
  //   foreach($position_road[$key1] as $key2=>$value){//roadの名前を$keyへ
  //     $route[$key1][$key2]=true;
  //   }
  // }
  ?>
  <!-- 1階 -->
  <div class="mapImg">
    <picture>
      <source srcset="/img/map/1.jpg" media="print">
      <source srcset="/img/map/1_dark.jpg" media="(prefers-color-scheme:dark)"><!-- ダークテーマ -->
      <img src="/img/map/1.jpg" alt="firstFloor" id="firstFloor">
    </picture>
    <?php
    $floor=1;
    $floor_name="first";
    include('w_svg_output.php');
    ?>
  </div>
  <!-- 2階 -->
  <div class="mapImg">
    <picture>
      <source srcset="/img/map/2.jpg" media="print">
      <source srcset="/img/map/2_dark.jpg" media="(prefers-color-scheme:dark)"><!-- ダークテーマ -->
      <img src="/img/map/2.jpg" alt="secondFloor" id="secondFloor">
    </picture>
    <?php
    $floor=2;
    $floor_name="second";
    include('w_svg_output.php');
    ?>
  </div>
  <!-- 3階 -->
  <div class="mapImg">
    <picture>
      <source srcset="/img/map/3.jpg" media="print">
      <source srcset="/img/map/3_dark.jpg" media="(prefers-color-scheme:dark)"><!-- ダークテーマ -->
      <img src="/img/map/3.jpg" alt="thirdFloor" id="thirdFloor">
    </picture>
    <?php
    $floor=3;
    $floor_name="third";
    include('w_svg_output.php');
    ?>
  </div>
  <!-- 4階 -->
  <div class="mapImg">
    <picture>
      <source srcset="/img/map/4.jpg" media="print">
      <source srcset="/img/map/4_dark.jpg" media="(prefers-color-scheme:dark)"><!-- ダークテーマ -->
      <img src="/img/map/4.jpg" alt="fourthFloor" id="fourthFloor">
    </picture>
    <?php
    $floor=4;
    $floor_name="four";
    include('w_svg_output.php');
    ?>
  </div>
  <!-- <script type="text/javascript">
  if(start==null)alert('スタート位置を押してください。');
  else if(goal==null) alert('ゴール位置を押してください。');
  </script> -->
  <script src="/common.js"></script>
</body>
</html>
