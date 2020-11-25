<?php
    require_once './Function.php';

    session_start();
    if(isset($_SESSION['login']) == false){
        header('Location: login.php');
        exit();
    }
    else{
        try {
            $dsn = 'mysql:dbname=favoritemovie;host=db-aws-and-infra.cxr2a0ryfy5t.ap-northeast-1.rds.amazonaws.com;charset=utf8';
            $dbuser = 'admin';
            $dbpassword = 'maximum48';

            $db = new PDO($dsn, $dbuser, $dbpassword);
            $sql = 'select * from movieinfo where user_id=:userid';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':userid', $_SESSION['id']);

            $stmt->execute();

            $db = null;

            $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "データベース接続エラー：{$e->getMessage()}";
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>トップ画面</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function(){
            $('.movie_list ul li').hide();
            $('.movie_list ul li').each(function(i){
                $(this).delay(300 * i).fadeIn(1000);
            });

            $('.nav-button').on('click', function(){
                if($(this).hasClass('active')){
                    $(this).removeClass('active');
                    $('html').removeClass('scroll-prevent');
                    $('nav ul').addClass('close').removeClass('open');
                }
                else{
                    $(this).addClass('active');
                    $('html').addClass('scroll-prevent');
                    $('nav ul').addClass('open').removeClass('close');
                }
            });
        });
    </script>
</head>
<body>

    <header>
        <nav>
            <h1><a href="index.php">ああああ</a></h1>
            <div class="nav-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li><a href="movie_add.php">動画を追加</a></li>
                <li><a href="logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <h2><?php echo $_SESSION['user']; ?>さんがログイン中です</h2>

        <div class="result_message">
            <?php if(isset($_SESSION['ret_movie_delete']) && $_SESSION['ret_movie_delete'] == 'success') : ?>
                <p class="success">動画の削除に成功しました。</p>
            <?php elseif(isset($_SESSION['ret_movie_delete']) && $_SESSION['ret_movie_delete'] == 'failed') : ?>
                <p class="failed">動画の削除に失敗しました。</p>
            <?php endif; ?>
            <?php $_SESSION['ret_movie_delete'] = ''; ?>
        </div>

        <div class="movie_list">
            <ul>
                <?php foreach ($rec as $row) : ?>
                    <li>
                        <div class="side_left">
                            <div class="thumbnail">
                                <a href="movie_play.php?id=<?php echo $row['id']; ?>">
                                    <img src="http://img.youtube.com/vi/<?php echo mb_substr($row['url'], 32);?>/mqdefault.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    
                        <div class="side_right">
                            <div class="title">
                                <p>
                                    <a href="movie_play.php?id=<?php echo $row['id'];?>">
                                        <p><?php echo $row['title']; ?></p>
                                    </a>
                                </p>
                            </div>
                            <div class="summary">
                                <p><?php echo $row['summary']; ?></p>
                            </div>
                            <div class="deletelink">
                                <a href="movie_delete.php?id=<?php echo $row['id']; ?>">この動画を削除する</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>


    </main>

    <footer>
    
    </footer>
    
</body>
</html>