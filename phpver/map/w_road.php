<?php
include('position_road.php');
//roadをsvgのlineで出力していく。forで必要な分出力。
foreach($position_road as $key=>$value){
  echo '<line x1="'.$position_road[$key]["x1"].'" y1="'.$position_road[$key]["y1"].'" x2="'.$position_road[$key]["x2"].'" y2="'.$position_road[$key]["y2"].'" ';
  road_fill($key,$route);
  echo '/>';
}
?>
