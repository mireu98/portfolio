<?php
// �����ͺ��̽� ���� ����
$servername ="127.0.0.1";
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
$sql = "SELECT * FROM comp_excel WHERE CAST(num_ta AS SIGNED) >= ? ORDER BY CAST(num_ta AS SIGNED) ASC LIMIT 5";

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

    // ���� 5������ ���� ���� �˻��Ǹ� ������ ���� �� ������ ä��
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

    // JSON ���·� ���
    echo json_encode($data);
} else {
    echo "���� ���� ����: " . $stmt->error;
}

// Prepared Statements�� ���� ����
$stmt->close();
$conn->close();
?>
