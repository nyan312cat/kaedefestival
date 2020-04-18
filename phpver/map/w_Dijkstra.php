<?php
//このファイルを編集しなくても道や部屋を追加できます。
//w_edge_data.phpを編集して下さい。

//Dijkstra法を使って経路を求めています。
//最終的には$routeにそれぞれのエッジが経路であるかを格納します。
$INF=1e6;
$edge_cost;//各エッジのコストを格納
$edge_number;//各エッジの番号を格納
include('w_edge_data.php');//キー取得のため
//初期化
foreach($edge_number as $key1=>$value){//一つ目の添字 key1
  foreach($edge_number as $key2=>$value){//二つ目の添字 key2
    $edge_number[$key1][$key2]=INF;
    $edge_cost[$key1][$key2]=INF;
  }
}
include('w_edge_data.php');//値代入のため

//ここから、そろぞれのノードに行くのに必要な最小コストを求める。
$node;
//初期化
foreach($edge_number as $key=>$value){//全てのキー(ノードの名前)を取り出す。
  $node[$key]=$INF;
}
$node[$start]=0;//スタートに到達するのに必要なコストは0
for($kk=0;$kk<count($node);$kk++){//N回ぐらいすると、全ての移動が終わり、それぞれのノードに最小コストが格納される。
  //以下で全てのエッジを探す。
  foreach($edge_number as $key1=>$value){//元のノード key1
    foreach($edge_number as $key2=>$value){//先のノード key2
      if($node[$key2]>$node[$key1]+$edge_cost[$key1][$key2]){//先のノードのコストよりも元のノード＋エッジのコストが低ければその道の方が最短なので、更新
        $node[$key2]=$node[$key1]+$edge_cost[$key1][$key2];
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
for($ii=0;$ii<count($node);$ii++){//N回ぐらいで最悪の場合も道を辿れる。
  foreach($edge_number as $key=>$value){//先のノード key（元のノードはそもそもnow）
    if($node[$key]==$node[$now]-$edge_cost[$now][$key]){//一個前のノードと思われる時、
      $route[$edge_number[$now][$key]]=true;//経路になっているはずなので、trueにする。
      $now=$key;
      break;
    }
  }
  if($now==$start)break;//全てのノードを辿り、スタートに到達したら終了。
}
