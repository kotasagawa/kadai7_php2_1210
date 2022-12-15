<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="index_1.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav>
            <h1>サウナキロクシタイ</h1>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert2.php">
        <div class="register">
            <fieldset>
                <label>施設名：<input type="text" name="name"></label><br>
                <label>内容：<textArea name="content" rows="4" cols="40"></textArea></label><br>
                <label>セット数：<input type="text" name="sets"></label><br>
                <label>点数：<input type="text" name="eval" value="10点満点で評価"></label><br>
                <label>URL：<input type="text" name="url"></label><br>
                <label>場所：<input type="text" name="tag"></label><br>
                <div id="btn-outer">
                    <input id="btn" type="submit" value="送信" onclick="clk()">
                </div>
                
            </fieldset>
        </div>
    </form>
    <div id="btn-reg">
        <a href="select3.php"><p>サウナ履歴を見る</p></a>
    </div>
    <!-- Main[End] -->

<script>
 
 function clk() {
           alert("あなたのサ活を登録しました。");
       }
</script>
</body>

</html>
