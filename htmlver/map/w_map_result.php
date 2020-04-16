<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>map</title>
  <link rel="stylesheet" href="/map/w_styles.css">
  <?php
  $start=$_GET['start'];
  $goal=$_GET['goal'];
  include('w_Dijkstra.php');
  // for($ii=0;$ii<$edge_N;$ii++){
  //   $route[$ii]=true;
  // }
  $i=0;
  $j=0;
  ?>
</head>
<body>
  <div class="four_floor">
    <svg width="1300" height="1300">
      <!-- ここから、部屋の出力 -->
      <?php
      echo <<<HTML
      <a href="5A"><!-- node0 -->
        <rect x="40" y="287" rx="0" ry="0" width="75" height="114"  style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
      <!-- <text x="60" y="350" style="font-size:30px;">5A</text> -->
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="5B"><!-- node1 -->
        <rect x="40" y="401" rx="0" ry="0" width="75" height="114" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="5C"><!-- node2 -->
        <rect x="40" y="515" rx="0" ry="0" width="75" height="114" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="5D"><!-- node3 -->
        <rect x="40" y="629" rx="0" ry="0" width="75" height="114" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="4A"><!-- node4 -->
        <rect x="40" y="743" rx="0" ry="0" width="75" height="114" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="4B"><!-- node5 -->
        <rect x="40" y="857" rx="0" ry="0" width="75" height="114" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="4C"><!-- node6 -->
        <rect x="40" y="971" rx="0" ry="0" width="75" height="114" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="4D"><!-- node7 -->
        <rect x="40" y="1085" rx="0" ry="0" width="75" height="114" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="locker_ronodeom"><!-- 8 -->
        <rect x="193" y="441" rx="0" ry="0" width="75" height="37" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="warehousenode"><!-- 9 -->
        <rect x="193" y="478" rx="0" ry="0" width="75" height="37" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="WC"><!-- node10 -->
        <rect x="193" y="515" rx="0" ry="0" width="75" height="37" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <?php
      echo <<<HTML
      <a href="WC"><!-- node11 -->
        <rect x="193" y="937" rx="0" ry="0" width="75" height="72" style="fill:
HTML;
        if($start==$j):
        echo "blue";
        elseif($goal==$j):
        echo "skyblue";
        else:
        echo "white";
        endif;
        echo <<<HTML
        ;opacity:0.5" />
      </a>
HTML;
      $j++;
      ?>
      <!-- ここから、道の出力 -->
      <?php
      if($route[$i])://経路だったら、出力
        echo <<<HTML
        <line x1="115" y1="344" x2="150" y2="344" style="stroke:red;stroke-width:20" /><!-- edge0 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="115" y1="458" x2="150" y2="458" style="stroke:red;stroke-width:20" /><!-- edge1 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="115" y1="572" x2="150" y2="572" style="stroke:red;stroke-width:20" /><!-- edge2 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="115" y1="686" x2="150" y2="686" style="stroke:red;stroke-width:20" /><!-- edge3 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="115" y1="800" x2="150" y2="800" style="stroke:red;stroke-width:20" /><!-- edge4 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="115" y1="914" x2="150" y2="914" style="stroke:red;stroke-width:20" /><!-- edge5 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="115" y1="1028" x2="150" y2="1028" style="stroke:red;stroke-width:20" /><!-- edge6 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="115" y1="1142" x2="150" y2="1142" style="stroke:red;stroke-width:20" /><!-- edge7 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="158" y1="533" x2="193" y2="533" style="stroke:red;stroke-width:20" /><!-- edge8 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="158" y1="973" x2="193" y2="973" style="stroke:red;stroke-width:20" /><!-- edge9 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="344" x2="155" y2="458" style="stroke:red;stroke-width:20" /><!-- edge10 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="458" x2="155" y2="533" style="stroke:red;stroke-width:20" /><!-- edge11 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="532" x2="155" y2="572" style="stroke:red;stroke-width:20" /><!-- edge12 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="572" x2="155" y2="686" style="stroke:red;stroke-width:20" /><!-- edge13 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="686" x2="155" y2="800" style="stroke:red;stroke-width:20" /><!-- edge14 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="800" x2="155" y2="914" style="stroke:red;stroke-width:20" /><!-- edge15 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="914" x2="155" y2="973" style="stroke:red;stroke-width:20" /><!-- edge16 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="972" x2="155" y2="1028" style="stroke:red;stroke-width:20" /><!-- edge17 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="1028" x2="155" y2="1142" style="stroke:red;stroke-width:20" /><!-- edge18 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="155" y1="914" x2="193" y2="895" style="stroke:red;stroke-width:20" /><!-- edge19 -->
HTML;
      endif;
      $i++;
      ?>
      <?php
      if($route[$i]):
        echo <<<HTML
        <line x1="150" y1="344" x2="230" y2="287" style="stroke:red;stroke-width:20" /><!-- edge20 -->
HTML;
      endif;
      $i++;
      ?>
    </svg>
  </svg>
  <!-- <svg width="120" height="120">
  <polygon points="60,20 100,40 100,80 60,100 20,80 20,40" style="fill:blue;stroke:black;stroke-width:5;opacity:0.8"/>
</svg> -->
</div>
</body>
</html>
