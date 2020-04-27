これは、markdown記法で書いてあります。

- position.json

  position.js=>position.json

  position.jsからの変更点
  - キーをダブルクォーテーションで囲った。
  - WCの書式を変えた。

- position_road.json

  道のデータを書いてある。追加したい道はここに追記するだけでよい。

  ノード名、エッジ名は処理に無関係 区別できれば良い。
 ```
 // 例
 // "4":{//階
 //   "1":{//エッジ名
 //     "x1":115,//始点のx座標
 //     "y1":344,//始点のy座標
 //     "x2":150,//終点のx座標
 //     "y2":344,//終点のy座標
 //     "from":"5A",//始点のノード名
 //     "to":"1",//終点のノード名
 //     "cost":1,//このエッジのコスト
 //     :crowd":1//混雑度(コストに掛け算する。)
 //   },
 ```
  ノード名の数字の連番はエッジが交差するところ。

  同じ部屋に複数のエッジが繋がると、道が部屋の中を通ってしまうので、下記のように始点と終点の座標を同じにして、入口に1つノードを作って、crowdを大きくして回避する。
  ```
  //例
  "231":{
    "x1":411,
    "y1":353,
    "x2":411,
    "y2":353,
    "from":"107",
    "to":"1F:社会科室",
    "cost":1,
    "crowd":30
  },
  ````

- w_Dijkstra.php

  position_road.jsonを読み込み最短経路を解析する。

  道の追加はposition_road.jsonで

  [Dijkstra法](https://ja.wikipedia.org/wiki/%E3%83%80%E3%82%A4%E3%82%AF%E3%82%B9%E3%83%88%E3%83%A9%E6%B3%95)を使って経路を求めている。最終的には`$route`にそれぞれのエッジが経路であるかを格納する。
- w_map_route.php

  メイン

  最後のページには各〻の場所へのリンクを貼ってある。(現在は存在していないパス)
- w_styles.css

  w_map_route.phpのcss
- w_svg_output.php

  w_map_route.phpのそれぞれの階での[SVG](https://developer.mozilla.org/ja/docs/Web/SVG)の処理が複数回呼び出されるため、別ファイルにした。

  roomの出力は[rect](https://developer.mozilla.org/ja/docs/Web/SVG/Element/rect)、roadの出力は[line](https://developer.mozilla.org/ja/docs/Web/SVG/Element/line)
