<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>2</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-weight: bold;
            font-size: 37px;
        }
        tr{
        	height:50px;
        }   
        #topbar1{
            width: 311px;
            height: 47px;
            position: relative;
            top: 105px;
            left: 164px;
            background: none;
        }
        #topbar2{
            width: 311px;
            height: 47px;
            position: relative;
            top: 105px;
            left: 310px;
            background: none;
        }
        #topbar3{
            width: 311px;
            height: 47px;
            position: relative;
            top: 105px;
            left: 456px;
            background: none;
        }
        #topbar4{
            width: 311px;
            height: 47px;
            position: relative;
            top: 105px;
            left: 601px;
            background: none;
        }
        input{
        	text-align:center;
        }
        
        #btable{
            background-color: white;
            width:100%;
            border-collapse: collapse;
        }
        td,th
        {
            border: 1px solid black;
        }
        .table-container {
				    text-align: center;
            position: relative;
            top: 130px;
            width: 1860px;
            height: 850px;
            background-color: white;
            margin: auto;
            text-align: center;
            border: 1px solid black;
            overflow: auto;
				}
    </style>
    <script src="popup.js"></script>

    <link rel="stylesheet" href="popup.css">
</head>
<body>
    <div id="makenowPage" style="background:url(makenow.jpg); width: 1920px; height: 1080px;">
        <!--팝업창-->
        <div id="popupbtn"></div>
        <div id="popup" style="display: none;">
            <span id="x">X</span>
            <br>
            <br>
            <div id="popinput">
                <label for="ip" style="font-size:20px;">I&nbsp;&nbsp;&nbsp;&nbsp;P :</label>
                <input type="text" id="ip" style="font-size:20px;">
                <br>
           		  <br>
                <label for="pgselect" style="font-size:20px;">PAGE :</label>
                <select id="pgselect" style="font-size:20px;">
                    <option value="1">생산모니터링</option>
                    <option value="2">생산현황</option>
                    <option value="3">보드투입</option>
                    <option value="4">스테커</option>
                </select>
                <br>
                <br>
                <button type="button" id="ok" style="font-size:20px;">OK</button>
            </div>
        </div>
        <!--사업장~생산속도-->
        <input type="text" id="topbar1"  readonly>
        <input type="text" id="topbar2"  readonly>
        <input type="text" id="topbar3" readonly>  
        <input type="text" id="topbar4"  readonly>
				<div class="table-container">
        <table class="table" id="btable">
                <colgroup>
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                    <col width="6%">
                </colgroup>
                <thead id="bthead">
                	<tr height=45px;>
                		<th style="font-size:28px;">번호</th>
                		<th style="font-size:28px;">업체명</th>
                		<th style="font-size:28px;">업체코드</th>
                		<th style="font-size:28px;">내장재 종류</th>
                		<th style="font-size:28px;">골 종류</th>
                		<th style="font-size:28px;">두께</th>
                		<th style="font-size:28px;">길이</th>
                		<th style="font-size:28px;">계획수량</th>
                		<th style="font-size:28px;">생산수량</th>
                		<th style="font-size:28px;">생산량</th>
                		<th style="font-size:28px;">비고</th>
                	</tr>
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
      </div>
  <script>
    

    function loadTableData() {
        const $tbody = $('#tbody');
        $tbody.empty();
        $.ajax({
            url: 'table3.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, item) {
                    var row = `
                        <tr>
                            <td>${item.num_ta}</td>
                            <td>${item.comp_name}</td>
                            <td>${item.comp_code}</td>
                            <td>${item.inser_num}</td>
                            <td>${item.col_num}</td>
                            <td>${item.jepum_dug}</td>
                            <td>${item.jepum_len}</td>
                            <td>${item.jepum_num}</td>
                            <td>${item.seang_num}</td>
                            <td>${item.seang_len}</td>
                            <td>${item.snote !== undefined ? item.snote : ""}</td>
                        </tr>
                    `;
                    $tbody.append(row);
                });
            }
        });
    }

    function getdata() {
        $.ajax({
            url: 'startData.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#topbar1').val(data.cname);
                $('#topbar2').val(data.cline);
                $('#topbar3').val(data.ctime);
                $('#topbar4').val(data.cspeed);  
                    
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
function loadUrlFromFile() {
    // Android에서 JavaScript 함수 호출하여 값 가져오기
    var urlValue = AndroidBridge.getUrlValue();
    console.log("Received URL Value from Android: " + urlValue);

    // 가져온 값을 $('#ip') 엘리먼트의 값으로 설정
    $('#ip').val(urlValue);

    // 여기에서 필요한 작업 수행
}
    $(document).ready(function() {
        loadTableData();
        loadUrlFromFile();
        getdata();
        setInterval(getdata, 1000);

    });
</script>


    </div>
</body>
</html>