<?php
    try {
        session_start();
        require_once './Function.php';

        $id = $_GET['id'];

        $dsn = 'mysql:dbname=favoritemovie;host=db-aws-and-infra.cxr2a0ryfy5t.ap-northeast-1.rds.amazonaws.com;charset=utf8';
        $dbuser = 'admin';
        $dbpassword = 'maximum48';

        $db = new PDO($dsn, $dbuser, $dbpassword);
        $sql = 'select code from movieinfo where id=:id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $db = null;

        $rec = $stmt->fetch();
        console_log($rec);
    } catch (PDOException $e) {
        print "データベース接続エラー：{$e->getMessage()}";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/movie_play.css">
    <link rel="stylesheet" href="css/style.css">
    <title>動画再生</title>
</head>
<body>

    <header>
        <nav>
           <h1><a href="index.php">ああああ</a></h1>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="to_top">
                <a href="index.php">トップに戻る</a>
            </div>
            
            <div class="movie_play">
                <?php
                    if(isset($rec)){
                        echo d($rec['code']);
                    }
                    else{
                        print '動画が見つかりませんでした。';
                    }
                ?>
            </div>
        </div>
    </main>

</body>
</html>