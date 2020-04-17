<?php
$i=0;
include('w_room_data.php');
//roomをsvgのrectで出力していく。forで必要な分出力。
for($ii=0;$ii<$room_N;$ii++){
  echo "<a href=";
  room_url($i,$start);
  echo "><rect x=\"".$x[$ii]."\" y=\"".$y[$ii]."\" rx=\"".$rx[$ii]."\" ry=\"".$ry[$ii]."\" width=\"".$width[$ii]."\" height=\"".$height[$ii]."\"";
  room_fill($i,$start,$goal);$i++;
  echo "/></a>";
}
?>
