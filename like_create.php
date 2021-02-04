<?php
// var_dump($_GET);
// exit();
ini_set('display_errors', 1);
session_start();
include("functions.php");
check_session_id();

$player_id = $_GET['player_id'];
$user_id = $_GET['user_id'];

// DB接続
$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM u15_like_table WHERE user_id=:user_id AND player_id=:player_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':player_id', $player_id, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$status = $stmt->execute();
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $like_count = $stmt->fetch();
    // var_dump($like_count[0]);
    // exit();
    if ($like_count[0] != 0) {
        //いいねされてる条件
        $sql = 'DELETE FROM u15_like_table WHERE user_id=:user_id AND player_id=:player_id';
    } else {
        // いいねされてない条件
        $sql = 'INSERT INTO u15_like_table(id, user_id, player_id, created_at) VALUES(NULL, :user_id, :player_id, sysdate())';
    }

    // SQL準備&実行
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':player_id', $player_id, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $status = $stmt->execute();

    // データ登録処理後
    if ($status == false) {
        // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
        header("Location:todo_read.php");
        exit();
    }
}
