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
    echo json_encode(["error" => "�����ͺ��̽� ���� ����: " . $conn->connect_error]);
    exit;
}

// �����ͺ��̽����� ������ ��������

// Prepared Statements�� ����Ͽ� SQL ���� �ۼ�
$sql = "select je_dug,EPS,GLASS from jepum_dug where num >0 and num<16";

// Prepared Statements�� �ʱ�ȭ�ϰ� ���ε�
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
