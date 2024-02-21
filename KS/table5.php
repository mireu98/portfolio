<?php
// 데이터베이스 연결 설정
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

// Prepared Statements를 사용하여 SQL 쿼리 작성
$sql = "select je_dug,EPS,GLASS from jepum_dug where num >0 and num<16";

// Prepared Statements를 초기화하고 바인딩
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// 데이터베이스 연결 종료
$conn->close();

// 데이터를 JSON으로 반환
echo json_encode($data);
?>
