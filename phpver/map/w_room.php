<?php
$i=0;
include('position.php');
//roomをsvgのrectで出力していく。forで必要な分出力。
foreach ($position[$floor] as $key => $value) {
  echo '<a href=';
  room_url($i,$start);
  echo '><rect x="'.$position[$floor][$key][left].'" y="'.$position[$floor][$key][top].'" rx="0" ry="0" width="'.$position[$floor][$key][width].'" height="'.$position[$floor][$key][height].'"';
  room_fill($i,$start,$goal);$i++;
  echo '/></a>';
}
?>
