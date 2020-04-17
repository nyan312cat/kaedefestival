・htmlver/phpverについて
　phpが使える場合はphpver推奨
　phpが使えない場合はhtmlverに

・position.js・・・画像上の部屋の座標（px単位）と、画像のサイズに対する割合のデータ

・server.js・・・Node.jsでローカルサーバーを立てる用
　node server.jsまでのパス（./server.jsなど）
　
　phpをダウンロードして、
　php -S 127.0.0.1:ポート番号（8080など） -t “サーバーのルート”
　でも可（推奨）

・firebaseAdmin.js・・・firebase Authのユーザーを追加する・非公開
　Node.js必須
　firebaseで、メニュー/プロジェクトを設定->サービスアカウント->Firebase Admin SDK->新しい秘密鍵の生成->キーを生成
　jsonファイルをダウンロードする
　node.jsをインストール後、cmdで、
　npm install firebase-admin
　cd （firebaseAdmin.jsのあるフォルダまでのパス）
　node ./firebaseAdmin.js
　を行う
　このファイル（firebaseAdmin.js）と、jsonは同じ階層に置く
　jsonは、絶対に外部に流出させない


①htmlver
共通の注意事項
・scriptは、firebase、各ページのjs、common.jsの順で、bodyの最下部に置く
・linkは、common.css、各ページのcssの順headの最下部に置く
・jsはstrictモード推奨
・doc=documentはほぼ共通
・jsのfirestoreの参照先の名前を変える
・imgは、ファイル構造が同じになるようにする

・common.js・・・メニューの各年度へのリンク作成+loadEndを発火
　4行目のoldest,newestを更新する
　oldest:データがある最古の年度
　newest:データがある最新の年度
　loadEndは、各ページ用のjs内でグローバル変数として定義する
　loadEndの発火タイミングは、メニューのリンク作成終了または、メニューがないとき
　loadEndの引数：第一引数がnewest、第二引数がoldest

・common.css
　ヘッダー、メニュー、aタグ、mainのmargin-top、noneIfpcを設定している
　
・index.html・・・各イベント、企画へのリンク
　headerはここにまとめて、最後に全ページにコピペする

・index.js・・・現在のイベントを取得
　firestoreから、現在時刻（現在の時間帯）のイベントをすべて取得し、liとして追加

・index.css・・・各リンクのcss

・QR.html・・・QRコード探し用のページ

・QR.js

・QR.css


・schedule/schedule.html・・・二日目のスケジュールを表示するページ（8～15時）
　時間の範囲を変更するとき
　　#schedule>div>divの数を変える

・schedule/schedule.js・・・firestoreからスケジュールを取得する
　firestoreのkaedefestival/kaede+年度/scheduleTest/datasのデータを取得し、htmlに追加する

・schedule/schedule.css・・・スケジュールの表を設定する


・map/map.html・・・校内地図
　main内のaタグ（link）は削除する

・map/map.js・・・指定された部屋までスクロールする
　urlパラメータのfloor(first/second/third/fourth+floor)と、room(encodeURIされた部屋名)から、その部屋までスクロールする
　画像をクリックすると、部屋を取得する

・map/map.css・・・画像と、ハイライトの設定

・map/map_wata・・・地図で部屋をクリックされたときに出し物のページへ遷移する
　レスポンシブ対応していない


・eachYear/index.html・・・過年度のページへのリンク

・eachYear/index.js・・・リンクを生成

・eachYear/index.css


・firestore/・・・firestoreの更新用、編集中


・contents/各出し物のページ・・・各出し物の紹介をする、編集中


・local/updateSchedule・・・スケジュールの初期設定用ページ
　firebaseのconsoleでやれ
　アップロードはしないこと

②phpver
共通の注意事項
・基本的にhtmlverと同じ
・phpを使用する際は、拡張子を.html->.phpに
・jsが古い場合あり
・ファイルアップロードを行い、自動でデータ更新できるようにしたかった
　・img,txtをアップロードはできる
　・txtから文章を読み込み、表示する（構想）

・header.php・・・ヘッダー部分
　各ページから読み込む
　<?php
　　$head="";
　　ob_start();
　　include($_SERVER["DOCUMENT_ROOT"]."/header.php");
　　$head=ob_get_contents();
　　ob_end_clean();
　　echo $head;
　?>
　読み込み処理

・アップロード関連
・upload/upload.php
・localhost/index・・・アップロードはしない

・localhostを立てる（phpver/loaclhostをルートに）
　index.phpを開き、確認にチェックしてから、ボタンをクリックする
　ファイル構造
　
　│
　├img
　│└もろもろ
　└index.php・js・css
