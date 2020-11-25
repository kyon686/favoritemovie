<?php
    try{
        session_start();
        require_once './Function.php';

        $id = $_GET['id'];

        $dsn = 'mysql:dbname=favoritemovie;host=db-aws-and-infra.cxr2a0ryfy5t.ap-northeast-1.rds.amazonaws.com;charset=utf8';
        $dbuser = 'admin';
        $dbpassword = 'maximum48';

        $db = new PDO($dsn, $dbuser, $dbpassword);
        $sql = 'delete from movieinfo where id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $db = null;

        $rec = $stmt->fetchAll();

        if(isset($rec)){
            $_SESSION['ret_movie_delete'] = 'success';
            header('Location: index.php');
            exit();
        }
        else{
            $_SESSION['ret_movie_delete'] = 'failed';
            header('Location: index.php');
            exit();
        }
    } catch (PDOException $e) {
        print "データベース接続エラー : {$e->getMessage()}";
    }
?>