<?php
// �����ͺ��̽� ���� ����
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "127.0.0.1";
$username = "root";
$password = "HR1223";
$dbname = "keosung";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// �����ͺ��̽� ���� Ȯ��
if ($conn->connect_error) {
    echo json_encode(["error" => "�����ͺ��̽� ���� ����: " . $conn->connect_error]);
    exit;
}

// �����ͺ��̽����� ������ ��������
$nwno = $_GET['nwno'];

// Prepared Statements�� ����Ͽ� SQL ���� �ۼ�
$sql = "SELECT * FROM load_monitor WHERE load_num = ?";

// Prepared Statements�� �ʱ�ȭ�ϰ� ���ε�
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $nwno);

// ���� ����
$stmt->execute();

// ��� ��������
$result = $stmt->get_result();

if ($result !== false) {
    // ���� ����� ��������
    $row = $result->fetch_assoc();

    if ($row !== null) {
        // $row �״�� ���
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "��ġ�ϴ� �����Ͱ� �����ϴ�."]);
    }
} else {
    echo json_encode(["error" => "���� ���� ����: " . $stmt->error]);
}

// Prepared Statements�� ���� ����
$stmt->close();
$conn->close();
?>
