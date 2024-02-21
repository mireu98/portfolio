<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="popup.js"></script>
    <link rel="stylesheet" href="popup.css">
    <title>1</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-weight: bold;
            font-size: 37px;
            
        }
        #btable > tr{
        	height:50px;
        }   
        #popupbtn{
			    width: 215px;
			    height: 60px;
			    background: none;
			    position: fixed;
			    top: 60px;
			    left: 30px;
			    cursor: pointer;
			    
				}
        
       #lt1{
            width: 240px;
            height: 59px;
            position: relative;
            top: 61px;
            left: 250px;
            background: none;
           
            
        }
        input{text-align:center; border:1px solid lightgray; }
        #lt2{
            width: 240px;
            height: 59px;
            position: relative;
            top: 125px;
            right: 2px;
            background: none;
            
        }
        #lt3{
            width: 240px;
            height: 59px;
            position: relative;
            top: 188px;
            right: 255px;
            background: none;
        }
        #lt4{
            width: 240px;
            height: 59px;
            position: relative;
            top: 252px;
            right: 507px;
            background: none;
        }

        #ct1{
            width: 193px;
            height: 59px;
            position: relative;
            top: 189px;
            right: 318px;
            background: none;
        }
        #ct2{
            width: 193px;
            height: 59px;
            position: relative;
            top: 188px;
            right: 325px;
            background: none;
        }
        #ct3{
            width: 193px;
            height: 59px;
            position: relative;
            top: 253px;
            right: 728px;
            background: none;
        }
        #ct4{
            width: 193px;
            height: 59px;
            position: relative;
            top: 252px;
            right: 737px;
            background: none;
        }
				#new1{
					width:390px;
            height: 123px;
            position: relative;
            bottom: 1px;
            left: 692px;
            background: none;	
            color:white;         
            text-align:center;
            font-size:50px;
					}
				#new2{
					width:586px;
            height: 123px;
            position: relative;
            bottom: 1px;
            left:900px;
            background: none;
            color:white;
            text-align:center;	
            font-size:50px;
					}
				
				
        #rt1{
            width: 192px;
            height: 60px;
            position: relative;
            top: 91px;
            left: 104px;
            
        }
        #rt2{
            width: 192px;
            height: 60px;
            position: relative;
            top: 91px;
            left: 97px;
            
        }
        #rt3{
            width: 192px;
            height: 60px;
            position: relative;
            top: 91px;
            left: 89px;
            
        }
        #rt4{
            width: 192px;
            height: 60px;
            position: relative;
            top: 91px;
            left: 81px;
            
        }
				#rt5{
					width: 192px;
            height: 60px;
            position: relative;
            top: 62px;
            left: 1105px;
            
				}
				#rt6{
					width: 192px;
            height: 60px;
            position: relative;
            top: 62px;
            left: 1098px;
            
				}
				#rt7{
					width: 192px;
            height: 60px;
            position: relative;
            top: 62px;
            left: 1090px;
            
				}
				#rt8{
					width: 192px;
            height: 60px;
            position: relative;
            top: 62px;
            left: 1082px;
            
				}
				
				

        #mm3{
            width: 542px;
            height: 60px;
            position: relative;
            top: 205px;
            right: 566px;
            background: none;
            font-size:50px;
        }
        #mm4{
            width: 542px;
            height: 60px;
            position: relative;
            top: 205px;
            right: 573px;
            background: none;
            font-size:50px;
        }
        #mm5{
            width: 542px;
            height: 60px;
            position: relative;
            top: 139px;
            left: 1346px;
            background: none;
            font-size:50px;
        }




        #mb1{
            width: 114px;
            height: 58px;
            position: relative;
            top: 274px;
            right: 524px;
            background: none;
        }
        #mb2{
            width: 305px;
            height: 58px;
            position: relative;
            top: 274px;
            right: 533px;
            background: none;
        }
        #mb3{
            width: 259px;
            height: 58px;
            position: relative;
            top: 274px;
            right: 541px;
            background: none;
        }
        #mb4{
            width: 259px;
            height: 58px;
            position: relative;
            top: 274px;
            right: 550px;
            background: none;
        }
        #mb5{
            width: 299px;
            height: 58px;
            position: relative;
            top: 274px;
            right: 558px;
            background: none;
        }
        #mb6{
            width: 299px;
            height: 58px;
            position: relative;
            top: 214px;
            left: 1286px;
            background: none;
        }
        #mb7{
            width: 299px;
            height: 58px;
            position: relative;
            top: 214px;
            left: 1278px;
            background: none;
        }
        #mb8{
            width: 305px;
            height: 58px;
            position: relative;
            top: 276px;
            right: 475px;
            background: none;
        }
        #mb9{
        		width: 150px;
            height: 44px;
            position: relative;
            top: 17px;
            left:1100px;
            background: none;
            border:none;
            
        	}
        #btable{
            background-color: white;
            width:100%;
            border-collapse: collapse;
        }
        
       
        
        td,th{
            border: 1px solid black;
        }
        tr {height:65px;}
        .table-container {
				   background-color: white;
            width: 1860px;
            height: 391px;
            position: relative;
            
            top: 40px;
            margin: auto;
            text-align: center;
            border: 1px solid black;
            overflow: auto;
				}
        
        #newtable{
        	background-color:white;
        	width:1785px;
        	height:145px;
        	position:relative;
        	top:180px;
        	left:107px;
        	text-align:center;
        }
        
        .progress-bar {
            background-color: #ececec;
           
            box-shadow: inset 0 0.5em 0.5em rgba(0,0,0,0.05);
            height: 60px;
            margin: 2rem 0 2rem 0;
            overflow: hidden;
            position: relative;
            transform: translateZ(0);
            top:142px;
            left:457px;
            width: 74.7%;
        }

        .progress-bar__bar {
            background-color: #09B864;
            box-shadow: inset 0 0.5em 0.5em rgba(94, 49, 49, 0.05);
            bottom: 0;
            left: 0;
            right: 0; /* 수정된 부분: right 속성 추가 */
            position: absolute;
            top: 0;
            transition: width 500ms ease-out; /* width만 트랜지션하도록 수정 */
        }

        .progress-bar__bar.active {
            width: 100%; /* active 클래스에서 바로 100%로 설정 */
        }
        
           #mm1{
        	position:fixed;
        	width:216px;
        	height:120px;
        	top:331px;
        	left:30px;
        	color:white;
        	background:none;
        	font-size:50px;
        	
        }
    </style>
  
</head>
<body>
    <div id="monitorPage" style="background:url(monitor.jpg); width: 1920px; height: 1080px;">
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
                    <option value="3">보드투입</option>
                    <option value="4">스테커</option>
                </select>
                <br>
                <br>
                <button type="button" id="ok" style="font-size:20px;">OK</button>
            </div>
        </div>
        <!--사업장~생산속도-->
            <input type="text" id="lt1" readonly>
            <input type="text" id="lt2" readonly>
            <input type="text" id="lt3" readonly>  
            <input type="text" id="lt4" readonly>
            <!--제품종류-->
            <input type="text" id="ct1"  readonly> 
            <input type="text" id="ct2"  readonly>  
            <input type="text" id="ct3" readonly> 
            <input type="text" id="ct4" readonly> 
            
            <input type="text" id="new1"  readonly>
            <input type="text" id="new2"  readonly>
            <!--내장재종류-->
            <input type="text" id="rt1" readonly>
            <input type="text" id="rt2"  readonly>
            <input type="text" id="rt3"  readonly>
            <input type="text" id="rt4"  readonly>
            <input type="text" id="rt5" readonly>
            <input type="text" id="rt6"  readonly>
            <input type="text" id="rt7"  readonly>
            <input type="text" id="rt8"  readonly>
            <!--두께별 계획량-->
            <input type="text" id="mm1" readonly>
            <input type="text" id="mm3"  readonly>
            <input type="text" id="mm4"  readonly> 
            <input type="text" id="mm5"  readonly>
            <!--현재작업번호~현재길이-->
            <input type="text" id="mb1"  readonly>
            <input type="text" id="mb2"  readonly>
            <input type="text" id="mb3"  readonly>
            <input type="text" id="mb4"  readonly>
            <input type="text" id="mb5"readonly>
            <input type="text" id="mb6"  readonly>
            <input type="text" id="mb7"  readonly>
            <input type="text" id="mb8"  readonly>
            
            <div class="progress-bar">
				        <div class="progress-bar__bar"></div>
				    </div>
            
            <input type="text" id="mb9" readonly>
            <!--아래 테이블-->   
            <div class="table-container">
            <table class="table" id="btable">
                <colgroup>
                    <col width="6.25%">
                    <col width="16.7%">
                    <col width="8.1%">
                    <col width="8.1%">
                    <col width="8.1%">
                    <col width="8.1%">
                    <col width="12%">
                    <col width="9.75%">
                    <col width="9.7%">
                    <col width="12%">
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
                	</tr>
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
          </div>
<script>
    var previousMb1Value = 1;
    let seconds = 0;
    let minutes = 0;
    let timerInterval; // 타이머 간격을 저장하기 위한 변수
		const progressBarElem = document.querySelector('.progress-bar__bar');
		
    function startTimer() {
        timerInterval = setInterval(updateTimer, 1000);
    }

    function updateTimer() {
        seconds++;
        if (seconds == 60) {
            seconds = 0;
            minutes++;
        }

        const displayMinutes = minutes < 10 ? "0" + minutes : minutes;
        const displaySeconds = seconds < 10 ? "0" + seconds : seconds;

     $("#lt3").val(displayMinutes + ":" + displaySeconds);
    }

  function loadTableData(mb1Value) {
    const $tbody = $('#tbody');
    $tbody.empty();
    $.ajax({
        url: 'table.php',
        type: 'GET',
        dataType: 'json',
        data: { nwno: mb1Value },
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
                    </tr>
                `;
                $tbody.append(row);
    						
            }); // 여기서 중괄호가 닫혀야 합니다.
            
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}

		
function getdata2(no) {
    // 이전에 적용한 색상 초기화
    $('#rt1, #rt2, #rt3, #rt4').css('background-color', '');

    $.ajax({
        url: 'table2.php?_=' + new Date().getTime(),
        type: 'GET',
        data: { nwno: no},
        success: function(response) {
            console.log('Data received from table2.php:', response);

            // 추가된 디버깅
            try {
                var jsonData = JSON.parse(response);
                console.log('Parsed JSON data:', jsonData);
            } catch (e) {
                console.error('Error parsing JSON data:', e);
            }

            if (jsonData && jsonData.inser_num) {
                if (jsonData.inser_num == '48K ') {
                    $('#rt1').css('background-color', 'red');
                } else if (jsonData.inser_num == '64K ') {
                    $('#rt2').css('background-color', 'red');
                } else if (jsonData.inser_num == '일반 ') {
                    $('#rt3').css('background-color', 'red');
                } else if (jsonData.inser_num == '난연 ') {
                    $('#rt4').css('background-color', 'red');
                } else {
                    console.error('Invalid inser_num value:', jsonData.inser_num);
                }
            } else {
                console.error('Invalid JSON format or missing "inser_num" property.');
            }
        },
        error: function(error) {
            console.error('AJAX Error:', error);
        }
    });
}


var isBlinking = false; 
function blinkEffect() {
    var mm1 = $('#mm1');
    
    if (isBlinking) {
        mm1.css('color', 'white');
    } else {
        mm1.css('color', 'yellow');
    }
    
    isBlinking = !isBlinking; // 상태를 반전
}

    function getdata() {
        $.ajax({
            url: 'startData.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // PHP에서 가져온 데이터를 사용하여 웹 페이지 업데이트
                $('#lt1').val(data.cname);
                $('#lt2').val(data.cline);
								//$('#lt3').val(data.ctime);
                $('#lt4').val(data.cspeed);
                $('#ct1').val(data.cs1);
                $('#ct2').val(data.cs2);
                $('#ct3').val(data.ch1);
                $('#ct4').val(data.ch2);
                

                $('#mtt1').text(data.pt250);
                $('#mtt2').text(data.pt220);
                $('#mtt3').text(data.pt200);
                $('#mtt4').text(data.pt180);
                $('#mtt5').text(data.pt175);
                $('#mtt6').text(data.pt150);
                $('#mtt7').text(data.pt125);
                $('#mtt8').text(data.pt100);
                $('#mtt9').text(data.pt75);
                $('#mtt10').text(data.pt50);
                $('#mtt11').text(data.ptspace1);
                $('#mtt12').text(data.ptspace2);
                $('#mtt13').text(data.ptspace3);
                $('#mtt14').text(data.ptotal);

                $('#mtb1').text(data.mt250);
                $('#mtb2').text(data.mt220);
                $('#mtb3').text(data.mt200);
                $('#mtb4').text(data.mt180);
                $('#mtb5').text(data.mt175);
                $('#mtb6').text(data.mt150);
                $('#mtb7').text(data.mt125);
                $('#mtb8').text(data.mt100);
                $('#mtb9').text(data.mt75);
                $('#mtb10').text(data.mt50);
                $('#mtb11').text(data.mtspace1);
                $('#mtb12').text(data.mtspace2);
                $('#mtb13').text(data.mtspace3);
                $('#mtb14').text(data.mtotal);
								if (data.mrun == 0) {
								    $('#mm1').val("대기중");
								} else {
								    $('#mm1').val("작업중");
								    
								    // 작업중일 때 깜빡거림 효과
								   blinkEffect(); // 500ms 간격으로 깜빡거림
								}
                $('#mm3').val(data.tml);
                $('#mm4').val(data.nml);
                $('#mm5').val(data.lml);

                $('#mb1').val(data.nwno);
                $('#mb2').val(data.nwcname);
                $('#mb3').val(data.nwcode);
                $('#mb4').val(data.nwt);
                $('#mb5').val(data.nwsl);
                $('#mb6').val(data.nwsc);
                $('#mb7').val(data.nwc);
                $('#mb8').val(data.nwl);
								$('#new1').val(data.jpjr);
								$('#new2').val(data.njjr);
								
						const targetLength = data.nwsl; // 설정 길이
            const currentLength = data.nwl; // 현재 길이

            const percentage = (currentLength / targetLength) * 100;

            	if (isNaN(percentage)) {
						    $('#mb9').val('0%');
						} else {
						    $('#mb9').val(Math.floor(percentage) + '%');
						}
								$.ajax({
										url:'table5.php',
										type:'GET',
										dataType:'json',
										success:function(res){
												for (let i = 0; i < 13; i++) {
												    const value = res[i].je_dug !== "0" ? res[i].je_dug + "T" : "-";
												    $(`#t${i + 1}`).text(value);
												}
											},
											error:function(err){console.log(err);}
									});
								
								
								$.ajax({
										url:'table4.php',
										type:'GET',		
										dataType:'json',
										success:function(res){
												$('#rt1').val(res[0].je_dug);
												$('#rt2').val(res[1].je_dug);
												$('#rt3').val(res[2].je_dug);
												$('#rt4').val(res[3].je_dug);
												$('#rt5').val(res[4].je_dug);
												$('#rt6').val(res[5].je_dug);
												$('#rt7').val(res[6].je_dug);
												$('#rt8').val(res[7].je_dug);
												
											},
											error:function(err){console.log(err);}
									});
								
								
		               if (previousMb1Value !== data.nwno) {
		                // 처음에는 previousMb1Value가 초기값이므로 getdata2 실행
		                if (previousMb1Value !== null) {
		                    getdata2(data.nwno);
		                }
		
		                loadTableData(data.nwno);
		            }
		
		            previousMb1Value = data.nwno;
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
        // 페이지 로드 시 한 번 실행
       
        loadTableData(previousMb1Value);
       
        startTimer(); // 타이머 시작
				 loadUrlFromFile();
        // 페이지 로드 시 데이터 업데이트 시작
        getdata();
        setInterval(getdata, 1000);
    });
</script>



        </div>
</body>
</html>