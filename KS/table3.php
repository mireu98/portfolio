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
$sql = "SELECT * FROM comp_excel";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// �����ͺ��̽� ���� ����
$conn->close();

// �����͸� JSON���� ��ȯ
echo json_encode($data);
?>