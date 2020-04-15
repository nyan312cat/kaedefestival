<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>map</title>
  <link rel="stylesheet" href="styles_wata.css">
  <?php
  //calcuate the route
  $INF=1e6;
  $start=11;//スタートする場所 0~7,10,11
  $goal=0;//ゴールする場所 0~7,10,11
  $node_N=24;//ノードの数 番号が0から始まっていることに気をつける。
  $edge_N=21;//エッジの数 番号が0から始まっていることに気をつける。
  $edge_cost;//各エッジのコストを格納
  $edge_number;//各エッジの番号を格納
  //初期化
  for($ii=0;$ii<$node_N;$ii++){
    for($jj=0;$jj<$node_N;$jj++){
      $edge_cost[$ii][$jj]=$INF;
      $edge_number[$ii][$jj]=$INF;
    }
  }
  //ノードとエッジの関係
  $edge_number[0][12]=0;//エッジの番号
  $edge_cost[0][12]=1;//エッジのコスト
  $edge_number[1][13]=1;
  $edge_cost[1][13]=1;
  $edge_number[2][15]=2;
  $edge_cost[2][15]=1;
  $edge_number[3][16]=3;
  $edge_cost[3][16]=1;
  $edge_number[4][17]=4;
  $edge_cost[4][17]=1;
  $edge_number[5][18]=5;
  $edge_cost[5][18]=1;
  $edge_number[6][20]=6;
  $edge_cost[6][20]=1;
  $edge_number[7][21]=7;
  $edge_cost[7][21]=1;
  $edge_number[14][10]=8;
  $edge_cost[14][10]=1;
  $edge_number[19][11]=9;
  $edge_cost[19][11]=1;
  $edge_number[12][13]=10;
  $edge_cost[12][13]=3;
  $edge_number[13][14]=11;
  $edge_cost[13][14]=2;
  $edge_number[14][15]=12;
  $edge_cost[14][15]=1;
  $edge_number[15][16]=13;
  $edge_cost[15][16]=3;
  $edge_number[16][17]=14;
  $edge_cost[16][17]=3;
  $edge_number[17][18]=15;
  $edge_cost[17][18]=3;
  $edge_number[18][19]=16;
  $edge_cost[18][19]=2;
  $edge_number[19][20]=17;
  $edge_cost[19][20]=1;
  $edge_number[20][21]=18;
  $edge_cost[20][21]=3;
  $edge_number[18][23]=19;
  $edge_cost[18][23]=9;
  $edge_number[12][22]=20;
  $edge_cost[12][22]=12;
  //上記を反転したものも追加
  for($ii=0;$ii<$node_N;$ii++){
    for($jj=0;$jj<$node_N;$jj++){
      if($edge_cost[$ii][$jj]!=$INF){
        $edge_cost[$jj][$ii]=$edge_cost[$ii][$jj];
        $edge_number[$jj][$ii]=$edge_number[$ii][$jj];
      }
    }
  }

  //ここから、そろぞれのノードに行くのに必要な最小コストを求める。
  $node;
  for($ii=0;$ii<$node_N;$ii++){//初期化
    $node[$ii]=$INF;
  }
  $node[$start]=0;//スタートに到達するのに必要なコストは0
  for($kk=0;$kk<$edge_N;$kk++){//N回ぐらいすると、全ての移動が終わり、それぞれのノードに最小コストが格納される。
    //以下で全てのエッジを探す。
    for($ii=0;$ii<$node_N;$ii++){//元のノード
      for($jj=0;$jj<$node_N;$jj++){//先のノード
        if($node[$jj]>$node[$ii]+$edge_cost[$ii][$jj]){//先のノードのコストよりも元のノード＋エッジのコストが低ければその道の方が最短なので、更新
          $node[$jj]=$node[$ii]+$edge_cost[$ii][$jj];
        }
      }
    }
  }

  //ここから、経路を探す。
  $route;//経路になっていれば、trueにする。
  for($ii=0;$ii<$edge_N;$ii++){//初期化
    $route[$ii]=false;
  }
  $now=$goal;//ゴールから辿っていく。
  for($ii=0;$ii<$edge_N;$ii++){//N回ぐらいで最悪の場合も道を辿れる。
    for($jj=0;$jj<$node_N;$jj++){//先のノード（元のノードはそもそもnow）
      if($node[$jj]==$node[$now]-$edge_cost[$now][$jj]){//一個前のノードと思われる時、
        $route[$edge_number[$now][$jj]]=true;//経路になっているはずなので、trueにする。
        $now=$jj;
        break;
      }
    }
    if($now==$start)break;//全てのノードを辿り、スタートに到達したら終了。
  }
  //calcuate finish
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
