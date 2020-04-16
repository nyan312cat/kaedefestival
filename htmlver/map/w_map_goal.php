<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>map</title>
  <link rel="stylesheet" href="/map/w_styles.css">
  <?php
  $start=$_GET['start'];
  $goal=0;
  ?>
</head>
<body>
  <div class="four_floor">
    <svg width="1300" height="1300">
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=0"><!-- node0 -->
        <rect x="40" y="287" rx="0" ry="0" width="75" height="114"  style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=1"><!-- node1 -->
        <rect x="40" y="401" rx="0" ry="0" width="75" height="114" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=2"><!-- node2 -->
        <rect x="40" y="515" rx="0" ry="0" width="75" height="114" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=3"><!-- node3 -->
        <rect x="40" y="629" rx="0" ry="0" width="75" height="114" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=4"><!-- node4 -->
        <rect x="40" y="743" rx="0" ry="0" width="75" height="114" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=5"><!-- node5 -->
        <rect x="40" y="857" rx="0" ry="0" width="75" height="114" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=6"><!-- node6 -->
        <rect x="40" y="971" rx="0" ry="0" width="75" height="114" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=7"><!-- node7 -->
        <rect x="40" y="1085" rx="0" ry="0" width="75" height="114" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <rect x="193" y="441" rx="0" ry="0" width="75" height="37" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      <rect x="193" y="478" rx="0" ry="0" width="75" height="37" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=10"><!-- node10 -->
        <rect x="193" y="515" rx="0" ry="0" width="75" height="37" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
      <a href="/map/w_map_result.php/?start=<?php echo $start;?>&goal=11"><!-- node11 -->
        <rect x="193" y="937" rx="0" ry="0" width="75" height="72" style="fill:blue;stroke:black;stroke-width:5;opacity:0.0" />
      </a>
    </svg>
  </svg>
</div>
<script type="text/javascript">
  alert('ゴール位置を押してください。');
</script>
</body>
</html>
