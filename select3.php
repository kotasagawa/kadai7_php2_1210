<?php

//XSS対応
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}



//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_kadai1;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table;");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

  //elseの中は、SQL実行成功した場合
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  //1行とってきたらresultに格納,中身がなくなったら終了
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $results = h($result['url']);

    $view .=
    '<div class="contents">' . 
        '<p>' . '番号：' . $result['id'] . '</p>' .  
        '<p>' . '施設名：' . h($result['name']) . '</p>' .
        '<p>' . 'コメント：' . h($result['content']) . '</p>' .
        '<p>' . 'セット回数：' . h($result['sets']) . '</p>' .
        '<p>' . '評価：' . h($result['eval']) . '</p>' .
        '<p>' . 'URL：' . '<a href="' . $result['url'] . '">店舗HP</a>' . '</p>' .
        '<p>' . '場所：' . h($result['tag']) . '</p>' .
        '<p>' . '日時：' . $result['date'] . '</p>' .
    '</div>' ;
  }

}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
<title>My Sauna History</title>
<link rel="stylesheet" href="select_3.css">

</head>
<body id="main">
    <!-- Head[Start] -->
    <header>
          <div class="hdr">
          <a href="index_1.php">サ活キロク</a>
          </div>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container"><?= $view ?></div>
    </div>
    <!-- Main[End] -->
    <div id="back-outer">
      <a id="back" href="index1.php">登録画面へ戻る</a>
    </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  // $color = "";
  // if($url === "test") {
  //   $color = 'green';
  // }

//   $(function(){
// $('.contents').css('background-color','orange');
// });
</script>
</body>
</html>
