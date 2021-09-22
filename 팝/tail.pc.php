<?php if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
<?php include "{$g4['path']}/page/footer_sub.php"; ?>
</div>
<!-- //contents -->
</div>
<!-- // contents-wrap -->
</div>
<!-- // snbMain -->

<?php if (1==2 && get_cookie('sms-popup') != '1') { ?>
<div id="sms-popup">
	<h4>
		문자상담
		<a href="#" id="sms-popup-close" class="sms-popup-close"><img src="/img/page/footer/sms-popup-close.png" alt="" /></a>
	</h4>
	<div class="inner">
		<form name="footerform" id="footerform" method="post" action="/bbs/write_update.php" onsubmit="return xfwrite_submit(this)">
			<input type="hidden" name="bo_table" value="cost" />
			<input type="hidden" name="page_type" value="tail" />
			<input type="hidden" name="wr_subject" value="문자상담신청 <?=$g4['time_ymdhis']?>" />
			<ul>
				<li>
					<label class="label">이름</label>
					<input type="text" name="wr_name" required itemname="이름" class="ed" value="<?=$member['name']?>" />
				</li>
				<li class="tel">
					<label class="label">휴대전화</label>
					<input type="hidden" name="wr_2" />
					<select name="hp1" class="ed">
						<option value="010">010</option>
						<option value="011">011</option>
						<option value="016">016</option>
						<option value="018">018</option>
						<option value="019">019</option>
					</select>
					<input type="text" name="hp2" class="ed" maxlength="4" />
					<input type="text" name="hp3" class="ed" maxlength="4" />
				</li>
				<li>
					<label class="label">진료과목</label>
					<select name="ca_name" required itemname="진료과목">
						<option value="">===========</option>
						<?php echo get_category_option2('cost') ?>
					</select>
				</li>
				<li><textarea name="wr_content" cols="30" rows="5" class="ed" placeholder="100자 글자수 제한이 있습니다."></textarea></li>
			</ul>

			<hr />

			<p>내용을 남겨주시면, 상담전화를 드립니다.</p>
			<div class="small">
				개인정보취급방침
				<a href="/page/policy.php" style="color:#fff;background:#1f1f1f;padding:0 5px">확인</a>
				<label class="checkbox"><input type="radio" name="agree" value="1" /> 동의</label>
				<label class="checkbox"><input type="radio" name="agree" value="0" /> 동의안함</label>
				<br>

				문자수신동의
				<label class="checkbox"><input type="radio" name="wr_3" value="1" /> 동의</label>
				<label class="checkbox"><input type="radio" name="wr_3" value="0" /> 동의안함</label>
			</div>

			<button type="submit">보내기</button>
		</form>

	</div>

	<a href="#" class="sms-popup-close anchor-close"><input type="checkbox" id="anchor-close-check" value="1"> 하루동안 보지 않기</a>

</div>
<?php } ?>


<footer>
	<div id="footer-1">
		<div class="wrapper">
			<div class="sec sec-1">
				<img src="/img/page/footer/footer-tel.png" alt="">
			</div>
			<div class="sec sec-2">
				<!-- * 카카오맵 - 지도퍼가기 -->
				<!-- 1. 지도 노드 -->
				<div id="daumRoughmapContainer1594596957544" class="root_daum_roughmap root_daum_roughmap_landing"></div>

				<!--
					2. 설치 스크립트
					* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
				-->
				<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

				<!-- 3. 실행 스크립트 -->
				<script charset="UTF-8">
					new daum.roughmap.Lander({
						"timestamp": "1594596957544",
						"key": "2z88r",
						"mapWidth": "410",
						"mapHeight": "237"
					}).render();

				</script>
			</div>

		</div>
	</div>
	<div id="footer2">
		<div class="wrapper">
			<div class="">
				<ul>
					<li><a href="/page.php?pageIndex=110101">병원소개</a></li>
					<li><a href="/page.php?pageIndex=110105" onclick="googleAnalyticsEvent('오시는길')">오시는길</a></li>
					<li><a href="/page/provision.php">회원약관</a></li>
					<li><a href="/page/policy.php">개인정보취급방침</a></li>
					<li><a href="/page/no_email_robot.php" id="no_email_robot">이메일주소 무단수집 거부<i></i></a></li>
					<?php
					if ($_SESSION['is_mobile'] == 'phone') {
						$tmp = $_SERVER['REQUEST_URI'];
						if (strpos($tmp, '?') !== false) $tmp .= "&device_view=mobile";
						else $tmp .= "?device_view=mobile";
						$tmp = str_replace('&&', '&', $tmp);
						#echo "<li><a href=\"{$tmp}\">모바일버전</a></li>";
					}
					?>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="footer4">
		<div class="wrapper">
			<?php
			/*
			<ul id="footermenu">
				<li><a href="/page.php?pageIndex=210102">병원소개<i></i></a></li>
				<li><a href="/page/provision.php">이용약관<i></i></a></li>
				<li><a href="/page/policy.php">개인정보취급방침<i></i></a></li>
				<li><a href="/page/no_email_robot.php" id="no_email_robot">이메일주소 무단수집 거부<i></i></a></li>
                <li><a href="#" onclick="window.open('http://www.bmscenter.com/widget/bmsMapComplexPopup2.aspx?bmsNumber=', 'bmsMap', 'toolbar=0,scrollbars=0,menubar=0,resizable=0,width=550,height=540'); return false;" style=" color:#ff5c89;"> 약도 문자 전송</a></li>
				<!-- <li><a href="/bbs/board.php?bo_table=news&sca=공지사항">공지사항</a></li>
				<li><a href="/page.php?pageIndex=910160">비급여진료비</a></li> -->
<!-- 				<li>
					<?php
					$tmp = $_SERVER['REQUEST_URI'];
					if (strpos($tmp, '?') !== false) $tmp .= "&device_view=mobile";
					else $tmp .= "?device_view=mobile";
					$tmp = str_replace('&&', '&', $tmp);
					?>
			<a href="<?=$tmp?>">모바일버전</a>
			</li> -->
			</ul>
			*/ ?>
			<div class="text-center">
				<div style="margin:30px 0"><img src="/img/page/footer/logo.png" alt=""></div>

				<div class="address">
					서울 특별시 강남구 논현로 837 원방빌딩 1층 / 2층 (압구정역 4번출구 직진 200m) 사업자등록번호 : 211-09-48698 대표 : 김동걸, 김은영<br>
					의료기관명칭 : 팝성형외과 | Copyright 2020 by POP PLASTIC SURGERY ALL RIGHTS RESERVED
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="sec sec-3">
		<div id="footer-cost">
			<form name="footerform" id="footerform" method="post" action="/bbs/write_update.php" onsubmit="googleAnalyticsEvent('상담문의');return xfwrite_submit2(this)">

				<input type="hidden" name="page_type" value="bottom" />
				<input type="hidden" name="wr_subject" value="빠른상담 <?=$g4['time_ymdhis']?>" />
				<input type="hidden" name="wr_2" value="">
				<?php

				if(isset($_GET['utm_source']) ){
					$utm_source = $_GET['utm_source'];
					echo "<input type='hidden' name='utm_source' value='".$utm_source."'>";
					session_start();
					$_SESSION["utm_source"]=$utm_source;

					if($utm_source == "kakao"){
						echo "<input type='hidden' name='bo_table' value='kakaodb' />";
					}

				}
				else if(isset($_SESSION["utm_source"])){
					$utm_source = $_SESSION['utm_source'];
					echo "<input type='hidden' name='utm_source' value='".$utm_source."'>";
					if($utm_source == "kakao"){
						echo "<input type='hidden' name='bo_table' value='kakaodb' />";
					}
				}
				else{
					echo "<input type='hidden' name='bo_table' value='cost' />";
				}

			 ?>
				<label>
					<span>간편상담</span>
					<select name="ca_name" required itemname="상담분야">
						<option value="">상담분야를 선택하세요</option>
						<!--?php echo get_category_option2('cost') ?-->
						<option value="눈성형">눈성형</option>
						<option value="코성형">코성형</option>
						<option value="피부/쁘띠">피부/쁘띠</option>
						<option value="지방이식">지방이식</option>
						<option value="동안리프팅">동안리프팅</option>
						<option value="기타">기타</option>
					</select>
				</label>
				<label>
					<input type="text" name="wr_name" class="ed" value="" placeholder="이름">
				</label>
				<label class="tel">
					<select name="wr_2_1">
						<option value="010">010</option>
						<option value="011">011</option>
						<option value="016">016</option>
						<option value="017">017</option>
						<option value="018">018</option>
						<option value="019">019</option>
					</select>
					<input type="text" name="wr_2_2" class="ed" value="" placeholder="연락처">
					<input type="text" name="wr_2_3" class="ed" value="" placeholder="연락처">
				</label>
				<label class='type'>
					<ul>
						<li><input type='radio' name='type' class='call' value='전화'>전화<img src='/img/call.png' style='width: 10px;margin-left: 5px;'></li>
						<li><input type='radio' name='type' class='kakao' value='카톡'>카톡<img src='/img/kakao.png' style='width: 12px;margin-left: 5px;'></li>
					</ul>
				</label>
				<button type="submit" value="신청하기" style='right: -15px;'>상담문의</button>
				<span class="label-wrap">
					<label style="font-size:13px"><input type="checkbox" name="agree" value="1">개인정보취급동의</label>
				</span>
			</form>
		</div>
	</div>


</footer>



<?php
/*
if ($_SESSION['is_mobile'] != 'computer') {
	$tmp = $_SERVER['REQUEST_URI'];
	if (strpos($tmp, '?') !== false)
		$tmp .= "&device_view=mobile";
	else
		$tmp .= "?device_view=mobile";
	$tmp = str_replace('&&', '&', $tmp);
	echo '<div style="height:100px"></div><a href="'.$tmp.'" style="display: block; position: fixed; left: 0; bottom: 0; width: 100%; z-index: 1001; font-size: 60px; color: #fff; background: #333; padding: 100px 0; text-align: center; font-weight: bold">모바일 버전 보기</a>';
}
*/
?>

<?php
$load_js[] = "{$g4['path']}/js/page/tail.php";

include_once("$g4[path]/tail.sub.php");

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
<?php include "{$g4['path']}/page/footer_sub.php"; ?>
</div>
<!-- //contents -->
</div>
<!-- // contents-wrap -->
</div>
<!-- // snbMain -->
