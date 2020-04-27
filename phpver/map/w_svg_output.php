<svg viewBox="0 0 939 1401" width="939" height="1401">
  <!-- ここから、部屋の出力 -->
  <?php
  //roomをsvgのrectで出力していく。forで必要な分出力。
  foreach($position[$floor] as $key=>$value){//部屋の名前を$keyに入れる。
    echo '<a href=';
    room_url($key,$start,$goal,$floor);
    echo '><rect x="'.$position[$floor][$key]["left"].'" y="'.$position[$floor][$key]["top"].'" rx="0" ry="0" width="'.$position[$floor][$key]["width"].'" height="'.$position[$floor][$key]["height"].'"';
    room_fill($key,$start,$goal,$floor);
    echo '/></a>';
  }
  ?>
  <!-- ここから、道の出力 -->
  <?php
  if($start!=null && $goal!=null){
    //roadをsvgのlineで出力していく。forで必要な分出力。
    foreach($position_road[$floor] as $key=>$value){//道の名前を$keyへ
      echo '<line x1="'.$position_road[$floor][$key]["x1"].'" y1="'.$position_road[$floor][$key]["y1"].'" x2="'.$position_road[$floor][$key]["x2"].'" y2="'.$position_road[$floor][$key]["y2"].'" ';
      if($route[$floor][$key])echo "style=\"stroke:red;stroke-width:20;stroke-linecap:round\"";
      echo '/>';
    }
  }
  ?>
</svg>
