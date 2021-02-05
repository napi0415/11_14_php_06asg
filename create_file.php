<?php
session_start();
include("functions.php");
check_session_id();

if (
    !isset($_POST['player_name']) || $_POST['player_name'] == '' ||
    !isset($_POST['name_kana']) || $_POST['name_kana'] == '' ||
    !isset($_POST['player_position']) || $_POST['player_position'] == '' ||
    !isset($_POST['uni_number']) || $_POST['uni_number'] == '' ||
    !isset($_POST['height']) || $_POST['height'] == '' ||
    !isset($_POST['p_weight']) || $_POST['p_weight'] == '' ||
    !isset($_POST['league']) || $_POST['league'] == '' ||
    !isset($_POST['team']) || $_POST['team'] == '' ||
    !isset($_POST['area']) || $_POST['area'] == '' ||
    !isset($_POST['throws']) || $_POST['throws'] == '' ||
    !isset($_POST['bats']) || $_POST['bats'] == '' ||
    !isset($_POST['run_1']) || $_POST['run_1'] == '' ||
    !isset($_POST['run_2']) || $_POST['run_2'] == '' ||
    !isset($_POST['ball_speed_1']) || $_POST['ball_speed_1'] == '' ||
    !isset($_POST['ball_speed_2']) || $_POST['ball_speed_2'] == '' ||
    !isset($_POST['ball_speed_set_1']) || $_POST['ball_speed_set_1'] == '' ||
    !isset($_POST['ball_speed_set_2']) || $_POST['ball_speed_set_2'] == '' ||
    !isset($_POST['second_throw_1']) || $_POST['second_throw_1'] == '' ||
    !isset($_POST['second_throw_2']) || $_POST['second_throw_2'] == '' ||
    !isset($_POST['second_throw_3']) || $_POST['second_throw_3'] == '' ||
    !isset($_POST['note']) || $_POST['note'] == ''
) {
    // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

// 受け取ったデータを変数に入れる
$player_name = $_POST['player_name'];
$name_kana = $_POST['name_kana'];
$player_position = $_POST['player_position'];
$uni_number = $_POST['uni_number'];
$height = $_POST['height'];
$p_weight = $_POST['p_weight'];
$league = $_POST['league'];
$team = $_POST['team'];
$area = $_POST['area'];
$throws = $_POST['throws'];
$bats = $_POST['bats'];
$run_1 = $_POST['run_1'];
$run_2 = $_POST['run_2'];
$ball_speed_1 = $_POST['ball_speed_1'];
$ball_speed_2 = $_POST['ball_speed_2'];
$ball_speed_set_1 = $_POST['ball_speed_set_1'];
$ball_speed_set_2 = $_POST['ball_speed_set_2'];
$second_throw_1 = $_POST['second_throw_1'];
$second_throw_2 = $_POST['second_throw_2'];
$second_throw_3 = $_POST['second_throw_3'];
$note = $_POST['note'];


// ここからファイルアップロード&DB登録の処理を追加しよう！！！

if (!isset($_FILES['upfile']) && $_FILES['upfile']['error'] != 0) {
    // 送られていない，エラーが発生，などの場合
    exit('Error:画像が送信されていません');
} else {
    // 送信が正常に行われたときの処理(この後記述) ...
    $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得 
    $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所 
    $directory_path = 'upload/'; //アップロード先フォルダ

    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;
    // var_dump($unique_name);
    // var_dump($filename_to_save);
    // exit();
    $img = '';
    if (!is_uploaded_file($temp_path)) {
        exit('Error:画像がありません'); // tmpフォルダにデータがない
    } else { // ↓ここでtmpファイルを移動する
        if (!move_uploaded_file($temp_path, $filename_to_save)) {
            exit('Error:アップロードできませんでした');
        } else {
            chmod(
                $filename_to_save,
                0644
            );   // 今回は権限を変更するところまで 
            // var_dump($filename_to_save);
            // exit();
            // $img = '<img src="' . $filename_to_save . '">';
        }
    }

    $pdo = connect_to_db();

    //データ登録SQL作成
    $sql = 'INSERT INTO
wbc2018_u15_table(id, image, player_name, name_kana, player_position, uni_number, height, p_weight, league, team, area, throws, bats, run_1, run_2, ball_speed_1, ball_speed_2, ball_speed_set_1, ball_speed_set_2, second_throw_1, second_throw_2, second_throw_3, note)
VALUES(NULL, :image, :player_name, :name_kana, :player_position, :uni_number, :height, :p_weight, :league, :team, :area, :throws, :bats, :run_1, :run_2, :ball_speed_1, :ball_speed_2, :ball_speed_set_1, :ball_speed_set_2, :second_throw_1, :second_throw_2, :second_throw_3, :note)';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);
    $stmt->bindValue(':player_name', $player_name, PDO::PARAM_STR);
    $stmt->bindValue(':name_kana', $name_kana, PDO::PARAM_STR);
    $stmt->bindValue(':player_position', $player_position, PDO::PARAM_STR);
    $stmt->bindValue(':uni_number', $uni_number, PDO::PARAM_STR);
    $stmt->bindValue(':height', $height, PDO::PARAM_STR);
    $stmt->bindValue(':p_weight', $p_weight, PDO::PARAM_STR);
    $stmt->bindValue(':league', $league, PDO::PARAM_STR);
    $stmt->bindValue(':team', $team, PDO::PARAM_STR);
    $stmt->bindValue(':area', $area, PDO::PARAM_STR);
    $stmt->bindValue(':throws', $throws, PDO::PARAM_STR);
    $stmt->bindValue(':bats', $bats, PDO::PARAM_STR);
    $stmt->bindValue(':run_1', $run_1, PDO::PARAM_STR);
    $stmt->bindValue(':run_2', $run_2, PDO::PARAM_STR);
    $stmt->bindValue(':ball_speed_1', $ball_speed_1, PDO::PARAM_STR);
    $stmt->bindValue(':ball_speed_2', $ball_speed_2, PDO::PARAM_STR);
    $stmt->bindValue(':ball_speed_set_1', $ball_speed_set_1, PDO::PARAM_STR);
    $stmt->bindValue(':ball_speed_set_2', $ball_speed_set_2, PDO::PARAM_STR);
    $stmt->bindValue(':second_throw_1', $second_throw_1, PDO::PARAM_STR);
    $stmt->bindValue(':second_throw_2', $second_throw_2, PDO::PARAM_STR);
    $stmt->bindValue(':second_throw_3', $second_throw_3, PDO::PARAM_STR);
    $stmt->bindValue(':note', $note, PDO::PARAM_STR);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
    } else {
        //index.phpへリダイレクト
        header('Location: todo_read.php');
        exit();
    }
}
