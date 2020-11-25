<?php
    session_start();
    try {
        require_once './Function.php';

        $title = e($_SESSION['movieinfo']['title']);
        $url = e($_SESSION['movieinfo']['url']);
        $code = e($_SESSION['movieinfo']['code']);
        $summary = e($_SESSION['movieinfo']['summary']);
        $user_id = $_SESSION['id'];

        $dsn = 'mysql:dbname=favoritemovie;host=db-aws-and-infra.cxr2a0ryfy5t.ap-northeast-1.rds.amazonaws.com;charset=utf8';
        $dbuser = 'admin';
        $dbpassword = 'maximum48';

        $db = new PDO($dsn, $dbuser, $dbpassword);
        $sql = 'insert into movieinfo(title,url,code,summary,user_id) value(:title, :url, :code, :summary, :userid)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':summary', $summary);
        $stmt->bindParam(':userid', $user_id);

        $stmt->execute();

        $db = null;

        $rec = $stmt->fetchAll();

        if(isset($rec)){
            $_SESSION['ret_movie_add'] = 'success';
            header('Location: movie_add.php');
            exit();
        }
        else{
            $_SESSION['ret_movie_add'] = 'failed';
            header('Location: movie_add.php');
            exit();
        }
    } catch (PDOException $e) {
        print "データベース接続エラー : {$e->getMessage()}";
    }
    
?>