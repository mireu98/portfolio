<?php
$servername = "127.0.0.1";
$username = "root";
$password = "HR1223";
$dbname = "keosung";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// 데이터베이스 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// IP 주소 업데이트 쿼리
$sql = "SELECT * FROM monitoring";
$result = $conn->query($sql);

if ($result !== false) {
    // 쿼리가 성공하면 결과를 배열로 저장
if ($result->num_rows > 0) {
    $data = array(); // 데이터를 저장할 배열 초기화

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data); // 데이터를 JSON 형식으로 반환
} else {
    echo "결과 없음.";
}
$conn->close();
?>
