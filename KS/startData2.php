<?php
// 데이터베이스 연결 설정
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "127.0.0.1";
$username = "root";
$password = "HR1223";
$dbname = "keosung";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// 데이터베이스 연결 확인
if ($conn->connect_error) {
    echo json_encode(["error" => "데이터베이스 연결 실패: " . $conn->connect_error]);
    exit;
}

// 데이터베이스에서 데이터 가져오기
$nwno = $_GET['nwno'];

// Prepared Statements를 사용하여 SQL 쿼리 작성
$sql = "SELECT * FROM load_monitor WHERE load_num = ?";

// Prepared Statements를 초기화하고 바인딩
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $nwno);

// 쿼리 실행
$stmt->execute();

// 결과 가져오기
$result = $stmt->get_result();

if ($result !== false) {
    // 쿼리 결과를 가져오기
    $row = $result->fetch_assoc();

    if ($row !== null) {
        // $row 그대로 출력
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "일치하는 데이터가 없습니다."]);
    }
} else {
    echo json_encode(["error" => "쿼리 실행 오류: " . $stmt->error]);
}

// Prepared Statements와 연결 종료
$stmt->close();
$conn->close();
?>
