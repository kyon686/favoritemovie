<?php
    session_start();

    if(!empty($_POST)){
        if($_POST['title'] == ''){
            $error['title'] = 'blank';
        }
        if($_POST['url'] == ''){
            $error['url'] = 'blank';
        }
        if($_POST['code'] == ''){
            $error['code'] = 'blank';
        }
        if($_POST['summary'] == ''){
            $error['summary'] = 'blank';
        }
        
        if(empty($error)){
            $_SESSION['movieinfo'] = $_POST;
            header('Location: movie_add_done.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/movie_add.css">
    <link rel="stylesheet" href="css/style.css">
    <title>動画追加</title>
</head>
<body>

    <header>
        <nav>
            <h1><a href="index.php">ああああ</a></h1>
        </nav>
    </header>

    <main>
        <div class="result_message">
            <?php if(isset($_SESSION['ret_movie_add']) && $_SESSION['ret_movie_add'] == 'success') : ?>
                <p class="success">動画の追加に成功しました。</p>
            <?php elseif(isset($_SESSION['ret_movie_add']) && $_SESSION['ret_movie_add'] == 'failed') : ?>
                <p class="failed">動画の追加に失敗しました。</p>
            <?php endif; ?>
            <?php $_SESSION['ret_movie_add'] = ''; ?>
        </div>

        <div class="container">
            <p>動画の追加</p>
            <form action="movie_add.php" method="post">
                <p>タイトル名</p>
                <?php if(isset($error['title']) && $error['title'] == 'blank') : ?>
                    <p style="color: red;">※タイトルを入力してください</p>
                <?php endif; ?>
                <input type="text" name="title" size="30" maxlength="300" placeholder="タイトルを入力してください">

                <p>動画のURL</p>
                <?php if(isset($error['url']) && $error['url'] == 'blank') : ?>
                    <p style="color: red;">※動画のURLを入力してください</p>
                <?php endif; ?>
                <input type="text" name="url" size="30" maxlength="300" placeholder="動画のURLを入力してください">

                <p>埋め込みコード</p>
                <p style="color: blue;">(1.グッドボタンの横にある「共有」を押下する)</p>
                <p style="color: blue;">(2.一番左の「埋め込む」を押下して表示されたコードをコピーして貼り付け)</p>
                <?php if(isset($error['code']) && $error['code'] == 'blank') : ?>
                    <p style="color: red;">※埋め込みコードを入力してください</p>
                <?php endif; ?>
                <input type="text" name="code" size="30" maxlength="300" placeholder="埋め込みコードを入力してください">

                <p>動画の概要</p>
                <?php if(isset($error['summary']) && $error['summary'] == 'blank') : ?>
                    <p style="color: red;">※動画の概要を入力してください</p>
                <?php endif; ?>
                <textarea name="summary" id="" cols="50" rows="8" placeholder="動画の概要を入力してください"></textarea>

                <p></p>

                <a href="index.php"><input type="button" value="戻る"></a>
                <input type="submit" value="動画を追加">
            </form>
        </div>
    </main>

</body>
</html>