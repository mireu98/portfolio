<?php
// 데이터베이스 연결 설정
$servername ="127.0.0.1";
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
$sql = "SELECT * FROM comp_excel WHERE CAST(num_ta AS SIGNED) >= ? ORDER BY CAST(num_ta AS SIGNED) ASC LIMIT 5";

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

    // 만약 5개보다 적은 행이 검색되면 나머지 행은 빈 값으로 채움
    $rowCount = count($data);
    for ($i = $rowCount; $i < 5; $i++) {
        $data[] = array(
            'num_ta' => '',
            'comp_name' => '',
            'comp_code' => '',
            'inser_num' => '',
            'col_num' => '',
            'jepum_dug' => '',
            'jepum_len' => '',
            'jepum_num' => '',
            'seang_num' => '',
            'seang_len' => ''
        );
    }

    // JSON 형태로 출력
    echo json_encode($data);
} else {
    echo "쿼리 실행 오류: " . $stmt->error;
}

// Prepared Statements와 연결 종료
$stmt->close();
$conn->close();
?>
