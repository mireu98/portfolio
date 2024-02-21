<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>3</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-weight: bold;
            font-size: 37px;
        }
    	tr{
        	height:40px;
        }
        input{text-align:center; border:1px solid lightgray;}
				#popupbtn{
				    width: 216px;
				    height: 60px;
				    background: none;
				    position: fixed;
				    top: 30px;
				    left: 30px;
				    cursor: pointer;
				}
        
        #rt1{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 27px;
            right: 508px;
            background:none;
            text-align: center;
        }
        #rt2{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 27px;
            right: 349px;
           background:none;
            text-align: center;
        }
        #rt3{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 27px;
            right: 190px;
           background:none;
            text-align: center;
        }
        #rt4{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 27px;
            right: 31px;
        background:none;
            text-align: center;
        }
				#rt5{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 91px;
            right: 508px;
        background:none;
            text-align: center;
        }
        #rt6{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 91px;
            right: 349px;
          background:none;
            text-align: center;
        }
        #rt7{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 91px;
            right: 190px;
          background:none;
            text-align: center;
        }
        #rt8{
            width: 155px;
            height: 59px;
            position: absolute;
            top: 91px;
            left: 1732px;
						 background:none;
            text-align: center;
        }
        
         #div1{
        	width:1920px;
        	height:155px;
        }
        
        #new1{
        		width: 238px;
            height: 124px;
            position: absolute;
            top: 26px;
            left: 649px;
            background: none;
            text-align: center;
        }
        #new2{
        		width: 238px;
            height: 124px;
            position: absolute;
            top: 27px;
            left: 1013px;
            background: none;
            text-align: center;
           
        }
        #new1,#new2{color:white; font-size:50px;}
        
        
        
        
        
        #m1{
            width: 237px;
            height: 58px;
            position: relative;
            top: 11px;
            left: 538px;
            background: none;
            text-align: center; 
        }
        #m2{
            width: 237px;
            height: 58px;
            position: relative;
            top: 74px;
            left: 286px;
            background: none;
            text-align: center; 
        }
        #m3{
            width: 366px;
            height: 59px;
            position: relative;
            top: 74px;
            left: 277px;
            background: none;
            text-align: center;  
        }
        #m4{
            width: 366px;
            height: 59px;
            position: relative;
            top: 74px;
            left: 267px;
            background: none;
            text-align: center;  
        }
        #m5{
            width: 366px;
            height: 59px;
            position: relative;
            top: 74px;
            left: 256px;
            background: none;
            text-align: center; 
        }

        #mr1{
            width: 114px;
            height: 57px;
            position: relative;
            top: 201px;
           	right: 1617px;
            background: none;
            text-align: center;
        }
        #mr2{
            width: 305px;
            height: 57px;
            position: relative;
            top: 141px;
            left: 148px;
            background: none;
            text-align: center;
        }
        #mr3{
            width: 259px;
            height: 57px;
            position: relative;
            top: 141px;
            left: 137px;
            background: none;
            text-align: center;
        }
        #mr4{
            width: 259px;
            height: 57px;
            position: relative;
            top: 141px;
            left: 126px;
            background: none;
            text-align: center;
        }
        #mr5{
            width: 299px;
            height: 57px;
            position: relative;
            top: 141px;
            left: 115px;
            background: none;
            text-align: center;
        }
        #mr6{
            width: 299px;
            height: 57px;
            position: relative;
            top: 141px;
            left:104px;
            background: none;
            text-align: center;
        }
        #mr7{
            width: 299px;
            height: 57px;
            position: relative;
            top: 141px;
            left: 93px;
            background: none;
            text-align: center;
        }
        #mr8{
            width: 305px;
            height: 34px;
            position: relative;
            top: 212px;
            left: 148px;
            background: none;
            text-align: center;
        }
        #mr9{
            width: 62px;
            height: 32px;
            position: relative;
            top: 311px;
            left: 888px;
            border: none;
            background: none;
            text-align: center;
        }
td,th{
            border: 1px solid black;
        }
        
         #btable{
            background-color: white;
            width:100%;
            border-collapse: collapse;
        }
        
        .table-container {
				     margin: auto;
            position: relative;
            background-color: white;
            width: 1860px;
            height: 191px;
            top: 148px;
            border: 1px solid black;
            text-align: center;
            overflow: auto;
				}
				#newtable{
        	background-color:white;
        	width:1864px;
        	height:270px;
        	position:relative;
        	top:2px;
        	left:28px;
        	text-align:center;
        }
        #newtable>thead>tr>th {
        	height:70px;
        	 font-size:20px;
        }
        
        #newtable1{
        	background-color:white;
        	width:1864px;
        	height:186px;
        	position:relative;
        	top:2px;
        	left:28px;
        	text-align:center;
        }
        
        #mb9{
        		width: 150px;
            height: 44px;
            position: relative;
            top: 105px;
            left:1150px;
            background: none;
            border:none;
            
        	}
        
        .progress-bar {
            background-color: #ececec;
           
            box-shadow: inset 0 0.5em 0.5em rgba(0,0,0,0.05);
            height: 36px;
            margin: 2rem 0 2rem 0;
            overflow: hidden;
            position: relative;
            transform: translateZ(0);
            width: 74.8%;
            top:139px;
            left:457px;
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
       	#lt3{
            width: 273px;
            height: 59px;
            position: absolute;
            top: 27px;
            left: 250px;
            background: none;
        }
        #lt4{
            width: 273px;
            height: 59px;
            position: absolute;
            top: 91px;
            left: 250px;
            background: none;
        }
       	
       	
       	#mm1{
        	position:fixed;
        	width:249px;
        	height:121px;
        	top:622Px;
        	left:30px;
        	color:white;
        	background:none;
        	font-size:50px;
        	
        }
    </style>    
  
    <script src="popup.js"></script>

    <link rel="stylesheet" href="popup.css">
</head>
<body>
    <div id="boardPage" style="background:url(board.jpg); width: 1920px; height: 1080px;">
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
        <div id="div1">
        	<input type="text" id="lt3" readonly>  
          <input type="text" id="lt4" readonly>
	    
	        <input type="text" id="new1"  readonly>
        	<input type="text" id="new2"  readonly>
	        
	        <input type="text" id="rt1"  readonly>
	        <input type="text" id="rt2"  readonly>
	        <input type="text" id="rt3"  readonly>
	        <input type="text" id="rt4"  readonly>
	        <input type="text" id="rt5"  readonly>
	        <input type="text" id="rt6"  readonly>
	        <input type="text" id="rt7"  readonly>
	        <input type="text" id="rt8"  readonly>
     		</div>
        
        
        <!--두께별계획량-->
        <table id="newtable">
           	<colgroup>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="10%"/>
           	</colgroup>
    <thead>
        <tr style="background-color:#156693; color:white;">
        		<th id="ep0" style="font-size:28px;">두께</th>
            <th id="ep1"></th>
            <th id="ep2"></th>
            <th id="ep3"></th>
            <th id="ep4"></th>
            <th id="ep5"></th>
            <th id="ep6"></th>
            <th id="ep7"></th>
            <th id="ep8"></th>
            <th id="ep9"></th>
            <th id="ep10"></th>
            <th id="ep11"></th>
            <th id="ep12"></th>
            <th id="ep13"></th>
            <th id="ep14" style="font-size:28px;">합계</th>
        </tr>
    </thead>
    <tbody>
        <tr style="font-size:28px;">
        		<td id="eps0" style="background-color:gray; color:white; font-size:28px;">계획량</td>
            <td id="eps1" style="font-size:25px;"></td>
            <td id="eps2" style="font-size:25px;"></td>
            <td id="eps3" style="font-size:25px;"></td>
            <td id="eps4" style="font-size:25px;"></td>
            <td id="eps5" style="font-size:25px;"></td>
            <td id="eps6" style="font-size:25px;"></td>
            <td id="eps7" style="font-size:25px;"></td>
            <td id="eps8" style="font-size:25px;"></td>
            <td id="eps9" style="font-size:25px;"></td>
            <td id="eps10" style="font-size:25px;"></td>
            <td id="eps11" style="font-size:25px;"></td>
            <td id="eps12" style="font-size:25px;"></td>
            <td id="eps13" style="font-size:25px;"></td>
            <td id="eps14" style="font-size:25px;"></td>
        </tr>
        <tr >
        		<td id="gra0" style="background-color:gray; color:white; font-size:28px;">생산량</td>
            <td id="gra1" style="font-size:25px;"></td>
            <td id="gra2" style="font-size:25px;"></td>
            <td id="gra3" style="font-size:25px;"></td>
            <td id="gra4" style="font-size:25px;"></td>
            <td id="gra5" style="font-size:25px;"></td>
            <td id="gra6" style="font-size:25px;"></td>
            <td id="gra7" style="font-size:25px;"></td>
            <td id="gra8" style="font-size:25px;"></td>
            <td id="gra9" style="font-size:25px;"></td>
            <td id="gra10" style="font-size:25px;"></td>
            <td id="gra11" style="font-size:25px;"></td>
            <td id="gra12" style="font-size:25px;"></td>
            <td id="gra13" style="font-size:25px;"></td>
            <td id="gra14" style="font-size:25px;"></td>
        </tr>
    </tbody>
  </table>
  
    <table id="newtable1">
           	<colgroup>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="6%"/>
           		<col width="10%"/>
           	</colgroup>
    <tbody>
        <tr>
        		<td id="k0" style="background-color:gray; color:white; font-size:28px;">보드수량</td>
            <td id="k1" style="font-size:25px;"></td>
            <td id="k2" style="font-size:25px;"></td>
            <td id="k3" style="font-size:25px;"></td>
            <td id="k4" style="font-size:25px;"></td>
            <td id="k5" style="font-size:25px;"></td>
            <td id="k6" style="font-size:25px;"></td>
            <td id="k7" style="font-size:25px;"></td>
            <td id="k8" style="font-size:25px;"></td>
            <td id="k9" style="font-size:25px;"></td>
            <td id="k10" style="font-size:25px;"></td>
            <td id="k11" style="font-size:25px;"></td>
            <td id="k12" style="font-size:25px;"></td>
            <td id="k13" style="font-size:25px;"></td>
            <td id="k14" style="font-size:25px;"></td>
        </tr>
        <tr>
        		<td id="kk0" style="background-color:gray; color:white; font-size:28px;">투입수량</td>
            <td id="kk1" style="font-size:25px;"></td>
            <td id="kk2" style="font-size:25px;"></td>
            <td id="kk3" style="font-size:25px;"></td>
            <td id="kk4" style="font-size:25px;"></td>
            <td id="kk5" style="font-size:25px;"></td>
            <td id="kk6" style="font-size:25px;"></td>
            <td id="kk7" style="font-size:25px;"></td>
            <td id="kk8" style="font-size:25px;"></td>
            <td id="kk9" style="font-size:25px;"></td>
            <td id="kk10" style="font-size:25px;"></td>
            <td id="kk11" style="font-size:25px;"></td>
            <td id="kk12" style="font-size:25px;"></td>
            <td id="kk13" style="font-size:25px;"></td>
            <td id="kk14" style="font-size:25px;"></td>
        </tr>
    </tbody>
  </table>
        <!--48K--><input type="text" id="mm1" readonly>
        <!--생산현황-->
        <input type="text" id="m1" readonly>
        <input type="text" id="m2" readonly>
        <input type="text" id="m3" readonly>
        <input type="text" id="m4" readonly>
        <input type="text" id="m5" readonly>
        <!--현재 작업번호~ 현재길이-->
        <input type="text" id="mr1" readonly>
        <input type="text" id="mr2"readonly>
        <input type="text" id="mr3" readonly>
        <input type="text" id="mr4" readonly>
        <input type="text" id="mr5" readonly>
        <input type="text" id="mr6" readonly>
        <input type="text" id="mr7" readonly>
        
        <!--테이블-->
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
                    <col width="7%">
                    <col width="7%">
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
         	 const progressBarElem = document.querySelector('.progress-bar__bar');
         	 
        function getdata2(no) {
				    // 이전에 적용한 색상 초기화
				    $('#rt1, #rt2, #rt3, #rt4').css('background-color', '');
				
				    $.ajax({
				        url: 'table2.php?_=' + new Date().getTime(),
				        type: 'GET',
				        data: { nwno: no },
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
                });
                console.log(previousMb1Value);
            }
        });
    }

    function getdata() {
        $.ajax({
            url: 'startData.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
            	$('#lt4').val(data.cspeed);
            $('#eps1').text(data.pt250);
            $('#eps2').text(data.pt220);
            $('#eps3').text(data.pt200);
            $('#eps4').text(data.pt180);
            $('#eps5').text(data.pt175);
            $('#eps6').text(data.pt150);
            $('#eps7').text(data.pt125);
            $('#eps8').text(data.pt100);
            $('#eps9').text(data.pt75);
            $('#eps10').text(data.pt50);
            $('#eps11').text(data.ptspace1);
            $('#eps12').text(data.ptspace2);
            $('#eps13').text(data.ptspace3);
            $('#eps14').text(data.ptotal);
            
            $('#gra1').text(data.mt250);
            $('#gra2').text(data.mt220);
            $('#gra3').text(data.mt200);
            $('#gra4').text(data.mt180);
            $('#gra5').text(data.mt175 );
            $('#gra6').text(data.mt150);
            $('#gra7').text(data.mt125);
            $('#gra8').text(data.mt100);
            $('#gra9').text(data.mt75);
            $('#gra10').text(data.mt50);
            $('#gra11').text(data.mtspace1);
            $('#gra12').text(data.mtspace2);
            $('#gra13').text(data.mtspace3);
            $('#gra14').text(data.mtotal);
            //DB값 수정필요
            
            	if (data.mrun == 0) {
								    $('#mm1').val("대기중");
								} else {
								    $('#mm1').val("작업중");
								    
								    // 작업중일 때 깜빡거림 효과
								   blinkEffect(); // 500ms 간격으로 깜빡거림
								}
            
            $('#m1').val(data.mstart);
            $('#m2').val(data.mend);
            $('#m3').val(data.tml);
            $('#m4').val(data.nml);
            $('#m5').val(data.lml);
            
            $('#mr1').val(data.nwno);
            $('#mr2').val(data.nwcname);
            $('#mr3').val(data.nwcode);
            $('#mr4').val(data.nwt);
            $('#mr5').val(data.nwsl);
            $('#mr6').val(data.nwsc);
            $('#mr7').val(data.nwc);
            $('#mr8').val(data.nwl);	
            $('#new1').val(data.jpjr);
						$('#new2').val(data.njjr);

						 $.ajax({
										url:'table4.php',
										type:'GET',
										dataType:'json',
										success:function(res){	
												for(var i=0; i<=res.length; i++){
														$(`#rt${i+1}`).val(res[i].je_dug);
												}	

											},
											error:function(err){console.log(err);}
									});
						
						
						
						$.ajax({
										url:'table5.php',
										type:'GET',
										dataType:'json',
										success:function(res){
												for (let i = 0; i < 13; i++) {
												    const value = res[i].je_dug !== "0" ? res[i].je_dug + "T" : "-";
												    $(`#ep${i + 1}`).text(value);
												}
				                
				                $('#k1').text(res[0].EPS);
						            $('#k2').text(res[1].EPS);
						            $('#k3').text(res[2].EPS);
						            $('#k4').text(res[3].EPS);
						            $('#k5').text(res[4].EPS );
						            $('#k6').text(res[5].EPS);
						            $('#k7').text(res[6].EPS);
						            $('#k8').text(res[7].EPS);
						            $('#k9').text(res[8].EPS);
						            $('#k10').text(res[9].EPS);
						            $('#k11').text(res[10].EPS);
						            $('#k12').text(res[11].EPS);
						            $('#k13').text(res[12].EPS);
						            $('#k14').text(res[13].EPS);
						            
						            $('#kk1').text(res[0].GLASS);
						            $('#kk2').text(res[1].GLASS);
						            $('#kk3').text(res[2].GLASS);
						            $('#kk4').text(res[3].GLASS);
						            $('#kk5').text(res[4].GLASS );
						            $('#kk6').text(res[5].GLASS);
						            $('#kk7').text(res[6].GLASS);
						            $('#kk8').text(res[7].GLASS);
						            $('#kk9').text(res[8].GLASS);
						            $('#kk10').text(res[9].GLASS);
						            $('#kk11').text(res[10].GLASS);
						            $('#kk12').text(res[11].GLASS);
						            $('#kk13').text(res[12].GLASS);
						            $('#kk14').text(res[13].GLASS);
											},
											error:function(err){console.log(err);}
									});
    
               
                	if (previousMb1Value !== data.nwno) {
		                // 처음에는 previousMb1Value가 초기값이므로 getdata2 실행
						             	if (previousMb1Value !== null) {
						                    getdata2(data.nwno);     
		               			 }
		         				   }

            			    previousMb1Value = data.nwno;
            },
            error: function(err) {
                console.log(err);
            }

        });
      	  
									
									
	 		   }
		
		let seconds = 0;
    let minutes = 0;
    let timerInterval; // 타이머 간격을 저장하기 위한 변수
		
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

		    $(document).ready(function() {
		        // 페이지 로드 시 한 번 실행
		        loadTableData(previousMb1Value);
					
						startTimer(); // 타이머 시
		        // 페이지 로드 시 데이터 업데이트 시작
		        getdata();
		        setInterval(getdata, 1000);
		        
		    });
		</script>
    </div>
</body>
</html>