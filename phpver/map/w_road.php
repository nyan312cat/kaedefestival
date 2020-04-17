<?php
$j=0;
include('w_road_data.php');
//roadをsvgのlineで出力していく。forで必要な分出力。
for($ii=0;$ii<$road_N;$ii++){
  echo "<line x1=\"".$x1[$ii]."\" y1=\"".$y1[$ii]."\" x2=\"".$x2[$ii]."\" y2=\"".$y2[$ii]."\" ";
  road_fill($j,$route); $j++;
  echo "/>\"";
}
?>
