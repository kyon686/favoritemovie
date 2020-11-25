<?php
    try {
        require_once './Function.php';
        $username = e($_POST['username']); //チェックする文字列

        $dsn = 'mysql:dbname=favoritemovie;host=db-aws-and-infra.cxr2a0ryfy5t.ap-northeast-1.rds.amazonaws.com;charset=utf8';
        $dbuser = 'admin';
        $dbpassword = 'maximum48';
        $db = new PDO($dsn, $dbuser, $dbpassword);
        $sql = 'select id from members where username=:username';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);

        $stmt->execute();

        $db = null;

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $flag = ( empty($rec['id']) ) ? 0:1;
        echo json_encode( $flag );

    } catch (PDOException $e) {
        print "データベース接続エラー：{$e->getMessage()}";
    }
?>