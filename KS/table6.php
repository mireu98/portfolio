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
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 데이터베이스에서 데이터 가져오기
$nwno = $_GET['nwno'];

// Prepared Statements를 사용하여 SQL 쿼리 작성
$sql = "SELECT * FROM load_monitor WHERE CAST(load_num AS SIGNED) >= ? ORDER BY CAST(load_num AS SIGNED) ASC LIMIT 5";

// Prepared Statements를 초기화하고 바인딩
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $nwno);

// 쿼리 실행
$stmt->execute();

// 결과 가져오기
$result = $stmt->get_result();

if ($result !== false) {
    $data = array();

    // 쿼리 결과를 배열에 저장
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // 쿼리 결과가 5개 미만인 경우 나머지 행은 빈 값으로 채움
    $rowCount = count($data);
    for ($i = $rowCount; $i < 5; $i++) {
        $data[] = array(
            'load_num' => '',
            'load_num1' => '',
            'load_num2' => '',
            'load_num3' => '',
            'load_num4' => ''
        );
    }

    // JSONP 요청인 경우 콜백 함수와 함께 응답
    $callback = isset($_GET['callback']) ? $_GET['callback'] : null;
    if ($callback) {
        header('Content-Type: application/javascript');
        echo $callback . '(' . json_encode($data) . ')';
    } else {
        // 일반적인 JSON 응답
        header('Content-Type: application/json');
        echo json_encode($data);
    }
} else {
    echo "쿼리 실행 오류: " . $stmt->error;
}

// Prepared Statements와 연결 종료
$stmt->close();
$conn->close();
?>
