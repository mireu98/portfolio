<?php
$servername = "127.0.0.1";
$username = "root";
$password = "HR1223";
$dbname = "keosung";

// �����ͺ��̽� ����
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// �����ͺ��̽� ���� Ȯ��
if ($conn->connect_error) {
    die("�����ͺ��̽� ���� ����: " . $conn->connect_error);
}

// IP �ּ� ������Ʈ ����
$sql = "SELECT * FROM monitoring";
$result = $conn->query($sql);

if ($result !== false) {
    // ������ �����ϸ� ����� �迭�� ����
if ($result->num_rows > 0) {
    $data = array(); // �����͸� ������ �迭 �ʱ�ȭ

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data); // �����͸� JSON �������� ��ȯ
} else {
    echo "��� ����.";
}
$conn->close();
?>
