<?php
//このファイルを編集しなくても道や部屋を追加できます。
//position_road.jsonを編集して下さい。

//Dijkstra法を使って経路を求めています。
//最終的には$routeにそれぞれのエッジが経路であるかを格納します。
$INF=1e6;
//position_road.jsonの読み込み
$json=file_get_contents('./position_road.json');
$position_road=json_decode($json,true);
//ここから、そろぞれのノードに行くのに必要な最小コストを求める。
$node;
//初期化
//全てのキー(ノードの名前)を取り出す。
foreach($position_road as $key1=>$value){//1,2,3,4階
  foreach($position_road[$key1] as $key2=>$value){//roadの名前を$keyへ
    $node[$position_road[$key1][$key2]["from"]]=$INF;//キー(ノードの名前)をエッジのfromから取り出す。
  }
}
foreach($position_road as $key1=>$value){//1,2,3,4階
  foreach($position_road[$key1] as $key2=>$value){//roadの名前を$keyへ
    $node[$position_road[$key1][$key2]["to"]]=$INF;//キー(ノードの名前)をエッジのtoから取り出す。
  }
}
$node[$start]=0;//スタートに到達するのに必要なコストは0
for($kk=0;$kk<count($node);$kk++){//N回ぐらいすると、全ての移動が終わり、それぞれのノードに最小コストが格納される。
  //以下で全てのエッジを探索する。
  foreach($position_road as $key1=>$value){//1,2,3,4階
    foreach($position_road[$key1] as $key2=>$value){//roadの名前を$keyへ
      //to>from+costの時、
      if($node[$position_road[$key1][$key2]["to"]]>$node[$position_road[$key1][$key2]["from"]]+$position_road[$key1][$key2]["cost"]*$position_road[$key1][$key2]["crowd"]){//先(to)のノードのコストよりも元(from)のノード＋エッジのコストが低ければその道の方が最短なので、更新
        $node[$position_road[$key1][$key2]["to"]]=$node[$position_road[$key1][$key2]["from"]]+$position_road[$key1][$key2]["cost"]*$position_road[$key1][$key2]["crowd"];
      }
      //from>to+costの時、
      if($node[$position_road[$key1][$key2]["from"]]>$node[$position_road[$key1][$key2]["to"]]+$position_road[$key1][$key2]["cost"]*$position_road[$key1][$key2]["crowd"]){//先(to)のノードのコストよりも元(from)のノード＋エッジのコストが低ければその道の方が最短なので、更新
        $node[$position_road[$key1][$key2]["from"]]=$node[$position_road[$key1][$key2]["to"]]+$position_road[$key1][$key2]["cost"]*$position_road[$key1][$key2]["crowd"];
      }
    }
  }
}

//ここから、経路を探す。
$route;//経路になっていれば、trueにする。
//初期化
foreach($position_road as $key1=>$value){//1,2,3,4階
  foreach($position_road[$key1] as $key2=>$value){//roadの名前を$keyへ
    $route[$key1][$key2]=false;
  }
}

$now=$goal;//ゴールから辿っていく。
for($ii=0;$ii<count($node);$ii++){//N回ぐらいで最悪の場合も道を辿れる。
  foreach($position_road as $key1=>$value){//1,2,3,4階
    foreach($position_road[$key1] as $key2=>$value){//roadの名前を$keyへ
      if($position_road[$key1][$key2]["from"]==$now){//先(to)のノードがnowだった時、
        //from=to-costの時、
        if($node[$position_road[$key1][$key2]["to"]]==$node[$now]-$position_road[$key1][$key2]["cost"]*$position_road[$key1][$key2]["crowd"]){//一個前のノードと思われる時、
          $route[$key1][$key2]=true;//経路になっているはずなので、trueにする。
          $now=$position_road[$key1][$key2]["to"];//nowの更新
          break;
        }
      }
      if($position_road[$key1][$key2]["to"]==$now){//先(to)のノードがnowだった時、
        //from=to-costの時、
        if($node[$position_road[$key1][$key2]["from"]]==$node[$now]-$position_road[$key1][$key2]["cost"]*$position_road[$key1][$key2]["crowd"]){//一個前のノードと思われる時、
          $route[$key1][$key2]=true;//経路になっているはずなので、trueにする。
          $now=$position_road[$key1][$key2]["from"];//nowの更新
          break;
        }
      }
    }
  }
  if($now==$start)break;//全てのノードを辿り、スタートに到達したら終了。
}
