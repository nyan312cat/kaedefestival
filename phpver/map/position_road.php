<?php
// 例
// 4=>[//階
//   "1"=>[//エッジ名
//     x1=>115,//始点のx座標
//     y1=>344,//始点のy座標
//     x2=>150,//終点のx座標
//     y2=>344,//終点のy座標
//     from=>"5A",//始点の場所
//     to=>"1",//終点の場所
//     cost=>1,//この道のコスト
//     crowd=>1//混雑度(コストに掛け算する。)
//   ],

$position_road=[
  1=>[

  ],
  2=>[

  ],
  3=>[
    "22"=>[
      x1=>140,
      y1=>400,
      x2=>213,
      y2=>343,
      from=>"11",
      to=>"13",
      cost=>3,
      crowd=>1
    ],
    "23"=>[
      x1=>107,
      y1=>400,
      x2=>140,
      y2=>400,
      from=>"13",
      to=>"6A",
      cost=>1,
      crowd=>1
    ],
  ],
  4=>[//階
    "1"=>[//エッジ名
      x1=>115,//始点のx座標
      y1=>344,//始点のy座標
      x2=>150,//終点のx座標
      y2=>344,//終点のy座標
      from=>"5A",//始点の場所
      to=>"1",//終点の場所
      cost=>1,//この道のコスト
      crowd=>1//混雑度(コストに掛け算する。)
    ],
    "2"=>[
      x1=>115,
      y1=>458,
      x2=>150,
      y2=>458,
      from=>"5B",
      to=>"2",
      cost=>1,
      crowd=>1
    ],
    "3"=>[
      x1=>115,
      y1=>572,
      x2=>150,
      y2=>572,
      from=>"5C",
      to=>"4",
      cost=>1,
      crowd=>1
    ],
    "4"=>[
      x1=>115,
      y1=>686,
      x2=>150,
      y2=>686,
      from=>"5D",
      to=>"5",
      cost=>1,
      crowd=>1
    ],
    "5"=>[
      x1=>115,
      y1=>800,
      x2=>150,
      y2=>800,
      from=>"4A",
      to=>"6",
      cost=>1,
      crowd=>1
    ],
    "6"=>[
      x1=>115,
      y1=>914,
      x2=>150,
      y2=>914,
      from=>"4B",
      to=>"7",
      cost=>1,
      crowd=>1
    ],
    "7"=>[
      x1=>115,
      y1=>1028,
      x2=>150,
      y2=>1028,
      from=>"4C",
      to=>"9",
      cost=>1,
      crowd=>1
    ],
    "8"=>[
      x1=>115,
      y1=>1142,
      x2=>150,
      y2=>1142,
      from=>"4D",
      to=>"10",
      cost=>1,
      crowd=>1
    ],
    "9"=>[
      x1=>158,
      y1=>533,
      x2=>193,
      y2=>533,
      from=>"3",
      to=>"WC1",
      cost=>1,
      crowd=>1
    ],
    "10"=>[
      x1=>158,
      y1=>973,
      x2=>193,
      y2=>973,
      from=>"8",
      to=>"WC2",
      cost=>1,
      crowd=>1
    ],
    "11"=>[
      x1=>155,
      y1=>344,
      x2=>155,
      y2=>458,
      from=>"1",
      to=>"2",
      cost=>3,
      crowd=>1
    ],
    "12"=>[
      x1=>155,
      y1=>458,
      x2=>155,
      y2=>533,
      from=>"2",
      to=>"3",
      cost=>2,
      crowd=>1
    ],
    "13"=>[
      x1=>155,
      y1=>532,
      x2=>155,
      y2=>572,
      from=>"3",
      to=>"4",
      cost=>1,
      crowd=>1
    ],
    "14"=>[
      x1=>155,
      y1=>572,
      x2=>155,
      y2=>686,
      from=>"4",
      to=>"5",
      cost=>3,
      crowd=>1
    ],
    "15"=>[
      x1=>155,
      y1=>686,
      x2=>155,
      y2=>800,
      from=>"5",
      to=>"6",
      cost=>3,
      crowd=>1
    ],
    "16"=>[
      x1=>155,
      y1=>800,
      x2=>155,
      y2=>914,
      from=>"6",
      to=>"7",
      cost=>3,
      crowd=>1
    ],
    "17"=>[
      x1=>155,
      y1=>914,
      x2=>155,
      y2=>973,
      from=>"7",
      to=>"8",
      cost=>2,
      crowd=>1
    ],
    "18"=>[
      x1=>155,
      y1=>972,
      x2=>155,
      y2=>1028,
      from=>"8",
      to=>"9",
      cost=>1,
      crowd=>1
    ],
    "19"=>[
      x1=>155,
      y1=>1028,
      x2=>155,
      y2=>1142,
      from=>"9",
      to=>"10",
      cost=>3,
      crowd=>1
    ],
    "20"=>[
      x1=>155,
      y1=>914,
      x2=>193,
      y2=>895,
      from=>"7",
      to=>"12",
      cost=>9,
      crowd=>1
    ],
    "21"=>[
      x1=>150,
      y1=>344,
      x2=>230,
      y2=>287,
      from=>"1",
      to=>"11",
      cost=>12,
      crowd=>1
    ],
  ],
];