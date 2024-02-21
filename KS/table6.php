<?php
// �����ͺ��̽� ���� ����
$servername = "127.0.0.1";
$username = "root";
$password = "HR1223";
$dbname = "keosung";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// �����ͺ��̽� ���� Ȯ��
if ($conn->connect_error) {
    die("�����ͺ��̽� ���� ����: " . $conn->connect_error);
}

// �����ͺ��̽����� ������ ��������
$nwno = $_GET['nwno'];

// Prepared Statements�� ����Ͽ� SQL ���� �ۼ�
$sql = "SELECT * FROM load_monitor WHERE CAST(load_num AS SIGNED) >= ? ORDER BY CAST(load_num AS SIGNED) ASC LIMIT 5";

// Prepared Statements�� �ʱ�ȭ�ϰ� ���ε�
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $nwno);

// ���� ����
$stmt->execute();

// ��� ��������
$result = $stmt->get_result();

if ($result !== false) {
    $data = array();

    // ���� ����� �迭�� ����
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // ���� ����� 5�� �̸��� ��� ������ ���� �� ������ ä��
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

    // JSONP ��û�� ��� �ݹ� �Լ��� �Բ� ����
    $callback = isset($_GET['callback']) ? $_GET['callback'] : null;
    if ($callback) {
        header('Content-Type: application/javascript');
        echo $callback . '(' . json_encode($data) . ')';
    } else {
        // �Ϲ����� JSON ����
        header('Content-Type: application/json');
        echo json_encode($data);
    }
} else {
    echo "���� ���� ����: " . $stmt->error;
}

// Prepared Statements�� ���� ����
$stmt->close();
$conn->close();
?>
