<?php
$servername = "127.0.0.1";
//$servername = "192.168.0.5";
$username = "root";
$password = "HR1223";
$dbname = "keosung";
// �����ͺ��̽� ����
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// �����ͺ��̽� ���� Ȯ��
if ($conn->connect_error) {
    die("�����ͺ��̽� ���� ����: " . $conn->connect_error);
}

// IP �ּ� ������Ʈ ����
$sql = "SELECT * FROM monitoring";
$result = $conn->query($sql);

$data = [];

if ($result !== false) {
    // ������ �����ϸ� ����� ������ ó��
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = [
                'cname' => $row["cname"],
                'cline' => $row["cline"],
                'ctime' => $row["ctime"],
                'cspeed' => $row["cspeed"],
                'cs1' => $row["cs1"],
                'cs2' => $row["cs2"],
                'ch1' => $row["ch1"],
                'ch2' => $row["ch2"],
                'k48' => $row["k48"],
                'k64' => $row["k64"],
                'cnomal' => $row["cnomal"],
                'cny' => $row["cny"],
                'pt250' => $row["pt250"],
                'pt220' => $row["pt220"],
                'pt200' => $row["pt200"],
                'pt180' => $row["pt180"],
                'pt175' => $row["pt175"],
                'pt150' => $row["pt150"],
                'pt125' => $row["pt125"],
                'pt100' => $row["pt100"],
                'pt75' => $row["pt75"],
                'pt50' => $row["pt50"],
               	'ptspace1' => $row["ptspace1"],
               	'ptspace2' => $row["ptspace2"],
               	'ptspace3' => $row["ptspace3"],
                'ptotal' => $row["ptotal"],
                'mt250' => $row["mt250"],
                'mt220' => $row["mt220"],
                'mt200' => $row["mt200"],
                'mt180' => $row["mt180"],
                'mt175' => $row["mt175"],
                'mt150' => $row["mt150"],
                'mt125' => $row["mt125"],
                'mt100' => $row["mt100"],
                'mt75' => $row["mt75"],
                'mt50' => $row["mt50"],
               	'mtspace1' => $row["mtspace1"],
               	'mtspace2' => $row["mtspace2"],
               	'mtspace3' => $row["mtspace3"],
                'mtotal' => $row["mtotal"],
                'mrun' => $row["mrun"],
                'mend' => $row["mend"],
                'tml' => $row["tml"],
                'nml' => $row["nml"],
                'lml' => $row["lml"],
                'nwno' => $row["nwno"],
                'nwcname' => $row["nwcname"],
                'nwcode' => $row["nwcode"],
                'nwt' => $row["nwt"],
                'nwsl' => $row["nwsl"],
                'nwsc' => $row["nwsc"],
                'nwc' => $row["nwc"],
                'nwl' => $row["nwl"],			
                'jpjr' => $row["jpjr"],
               	'njjr' => $row["njjr"]
            ];
        }
    } else {
        echo "��� ����.";
    }
} else {
    echo "���� ���� ����: " . $conn->error;
}

// �����ͺ��̽� ���� ����
$conn->close();

// JSON �������� ������ ���
echo json_encode($data);
?>