<?php include "{$g4['path']}/page/footer_sub.php"; ?>
<?php
	$tmp = substr($pageIndex, 0, 3);
	?>
<footer>
	<section id="footer_gnb4">
		<div>
			<img src="/img/mobile/gnb-sub.png" alt="" class="w100" />
			<ul>
				<li><a href="/bbs/board.php?bo_table=counsel&pageIndex=720102"></a></li>
				<li><a href="/bbs/write.php?bo_table=reserve&pageIndex=720103"></a></li>
				<li><a href="https://pf.kakao.com/_JtttZ/chat" target="_blank"></a></li>
				<li><a href="/page.php?pageIndex=110104"></a></li>
			</ul>
		</div>
	</section>
	<section id="footer_gnb2">
		<div id="footer_gnb2_form" style="">
			<h4 class="text-left" style="display:none;">간편상담</h4>

			<form name="index_fwrite" id="index_fwrite" method="post" onsubmit="googleAnalyticsEvent('상담문의');return xfwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;" target="">
				<input type=hidden name="w" value="">
				<input type=hidden name="wr_id" value="">
				<input type=hidden name="sca" value="">
				<input type="hidden" name="wr_subject" value="<?=time()?>" />
				<input type="hidden" name="wr_content" value="<?=time()?>" />
				<input type="hidden" name="pagetype" value="tail">
				<input type="hidden" name="wr_3" value="1" />
				<input type="hidden" name="page_type" value="bottom" />
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
				<div class="">
					<ul>
						<li class="footer_sec_li">
							<select name="ca_name" required class="ca" itemname="진료과목">
								<option value="">문의내용선택</option>
								<?php echo get_category_option2('cost') ?>
							</select>
						</li>
						<li  class="footer_sec_li">
							<input type="text" name="wr_name" required itemname="이름" class="ed" placeholder="성함" />
						</li>
						<li  class="footer_sec_li">
							<input type="tel" name="wr_2" required itemname="연락처" class="ed" placeholder="연락처" />
						</li>
					</ul>
					<ul class="ca_section">
						<li style='color:#fff;'><input type='radio' name='type' class='call' value='전화'><p>전화<img src='/img/call.png' style='width: 9px;margin-left: 2px;'></p></li>
						<li style='color:#fff; '><input type='radio' name='type' class='kakao' value='카톡'><p>카톡<img src='/img/kakao.png' style='width: 10px; margin-left: 2px;'></p></li>
					</ul>
					<div class="agree-wrap">
						<label class="agree"><input type="checkbox" name="agree" value="1"> 개인정보동의</label>
						<a href="/page/policy.php" id="agree-view" class="agree-view">[자세히보기]</a>
					</div>
					<button type="submit" value="신청하기" onclick="">상담문의</button>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</section>





	<section id="footer_gnb3">
		<div class="inner w90">
			<a href="/page.php?pageIndex=110101">병원소개</a>
			<em></em>

			<?php
			if ($is_member) echo "<a href=\"/bbs/logout.php\">로그아웃</a>";
			else echo "<a href=\"/bbs/login.php?url={$urlencode}\">로그인</a>";
			?>

			<?php
			$pc_url = $_SERVER['REQUEST_URI'];
			if (strpos($pc_url, '?') !== false)
				$pc_url .= "&device_view=pc";
			else
				$pc_url .= "?device_view=pc";
				// <a href="$pc_url" style="">PC버전</a>
			?>
			<a href="/page.php?pageIndex=110107" onclick="googleAnalyticsEvent('오시는길');">오시는길</a>
			<em></em>

		</div>
	</section>

	<div class="footer-sns">
		<a href="https://www.youtube.com/channel/UCDNOc1o7uG0aQuNPsc62orQ" target="_blank"><img src="/img/menu/ico-youtube.png" alt=""></a>
		<a href="https://www.instagram.com/popsurgery/" target="_blank"><img src="/img/menu/ico-instagram.png" alt=""></a>
		<a href="https://www.facebook.com/popsurgery/" target="_blank"><img src="/img/menu/ico-facebook.png" alt=""></a>
		<a href="https://blog.naver.com/me2pop" target="_blank"><img src="/img/menu/ico-naver.png" alt=""></a>

	</div>

	<section id="footer_address">
		<div>
			서울 특별시 강남구 논현로 837 원방빌딩 1층 / 2층<br>
			(압구정역 4번출구 직진 200m) <br>
			사업자등록번호 : 211-09-48698 대표 : 김동걸, 김은영<br>
			의료기관명칭 : 팝성형외과<br>
			Copyright 2020 by POP PLASTIC SURGERY ALL RIGHTS RESERVED
		</div>
	</section>
</footer>

<!-- <img src="/img/mobile/footer_blank.png" alt="" class="w100"> -->


<a href="#" id="goto-top"></a>


<div id="bg-wrap"></div>

<script type="text/javascript">
	$(function() {
		$('#headermenu').click(function() {
			if ($('#headergnbBlank').length > 0) {
				$('#sitemap-close').trigger('click');
				return false;
			}
			$('body').append('<div id="headergnbBlank"></div>');
			$('#headergnbBlank').show();
			var top = $(window).scrollTop();
			$('#sitemap-wrap').addClass('on').css({
				'top': top
			});
			return false;
		});
		$('#sitemap-close').click(function() {
			$('#headergnbBlank').remove();
			$('#sitemap-wrap').removeClass('on');
			return false;
		});

		$('#sitemap ul li a').on('click', function() {
			if ($(this).hasClass('on')) {
				$(this).closest('li').find('ul').removeClass('on');
				$(this).removeClass('on');
				return false;
			}

			if ($(this).closest('li').find('ul').length > 0) {
				$(this).closest('li').find('ul').addClass('on');
				$(this).addClass('on');
				return false;
			}
		});

		$('#goto-top').click(function() {
			$('html,body').animate({
				'scrollTop': 0
			});
			return false;
		});
		$('#header-arrow').on('click', function() {
			if ($(this).hasClass('on')) {
				$('#headergnbBlank').remove();
				$(this).removeClass('on');
				$('#header_titleB').removeClass('on');
			} else {
				$('#headergnbBlank').remove();
				$('body').append('<div id="headergnbBlank"></div>');
				$('#headergnbBlank').click(function() {
					$('#header-arrow').trigger('click');
				});
				$(this).addClass('on');
				$('#header_titleB').addClass('on');
			}
			return false;
		});

		/*
		$(window).on('resize', function () {
			$('#gnb a').css('height', 'auto');
			var h = $('#gnb').height();
			$('#gnb a').css('height', h);
		}).trigger('resize') ;

		$('#headercall').on('click', function () {
			$('#headertel-wrap').show();
			return false;
		});
		*/

		$('#gnb-sub-anchor').on('click', function() {
			if ($('#gnb-sub-wrap').hasClass('on')) {
				$('#gnb-sub-wrap').removeClass('on');
				//$('#gnb-sub').css({'height':0});
			} else {
				$('#gnb-sub-wrap').addClass('on');
				//$('#gnb-sub').css({'height':$('#gnb-sub-wrap img').height()});
			}
			return false;
		});

		$('#article-footer .owl-carousel').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			dots: true,
			items: 1,
			autoplay: true,
			autoplayTimeout: 4000
		});


		$('.agree-view').on('click', function() {
			$('#privacy-wrap').addClass('on');
			return false;
		});

		$('#snb>ul>li>a').on('click', function() {
			if ($(this).hasClass('on')) {
				$('#snb li.on').removeClass();
				$(this).removeClass('on');
				return false;
			}
			$('#snb li.on').removeClass();
			$('#snb a.on').removeClass();
			$(this).addClass('on');
			$(this).closest('li').addClass('on');
			return false;
		});

		$('.common-page-header .owl-carousel').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			dots: true,
			items: 1,
			autoplay: false,
			autoplayTimeout: 4000,
			dotsContainer: '.common-page-header-dotsCont'
		});


		/* 서브페이지 공통 유투브 네이버 영상 플레이어 부분 */
		if ($('#video-wrap').length > 0) {
			$('#video-wrap .video-thumb a').on('click', function() {
				$(this).closest('ul').find('a').removeClass();
				$(this).addClass('on');
				$('#video-wrap #video-view iframe').remove();
				var str = '<iframe width="1201" height="680" src="' + this.href + '" frameborder="no" scrolling="no" title="" allow="autoplay; gyroscope; accelerometer; encrypted-media" allowfullscreen></iframe>';
				$('#video-wrap #video-view').append(str);
				return false;
			}).eq(0).trigger('click');
		}

		/* 서브페이지 비만도 측정페이지 */
		$('#bmi-check-reset').on('click', function() {
			$('#bmi-check-wrap #bmi-check').show();
			$('#bmi-check-wrap .bmi-check-result').removeClass('on');
			$('#bmi-check-arrow').css({
				'left': 0
			});
			document.forms['bmi_check_form'].reset();
		});

		$('#why-laprin .owl-carousel').owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			nav: false,
			dots: true,
			autoplay: false,
			dotsContainer: '.dotsCont'
		});
	});

	function xfwrite_submit(f) {
		if (!f.elements['agree'].checked) {
			alert("개인정보취급방침에 동의하셔야 합니다.");
			f.elements['agree'].focus();
			return false;
		}
		if ($(f).find('input[name="type"]:checked').length == 0) {
			alert("연락받으실 유형을 선택 해주세요.");
			return false;
		}
		//f.elements['wr_2'].value = f.elements['hp1'].value + '-' + f.elements['hp2'].value + '-' + f.elements['hp3'].value;
		//if (f.elements['wr_3'].checked) {
		f.elements['wr_2'].value = f.elements['wr_2'].value.replace(/-/g, '');
		var tmp = f.elements['wr_2'].value.replace(/([0-9]{3})([0-9]{3,4})([0-9]{4})/, '$1-$2-$3');
		var pattern = /^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/;
		if (!pattern.test(tmp)) {
			alert("상담을 받으시려면 올바른 전화번호를 입력하세요.");
			f.elements['wr_2'].focus();
			return false;
		}
		f.elements['wr_2'].value = tmp;

		//}

		f.action = '/bbs/write_update.php';
		return true;
	}
	/*
	if (typeof user_scalable != 'undefined' && user_scalable === false) {
		document.querySelector("meta[name=viewport]").setAttribute(
			'content',
			'width=640, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5, user-scalable=yes, target-densitydpi=medium-dpi');
	}
	*/
	$(function() {
		<?php if ($pageIndex) { ?>
		$('#article-footer .owl-carousel').owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			nav: true,
			dots: false,
			autoplay: true,
			autoplayTimeout: 4000
		});
		<?php } ?>

		/* 진료과 공통 페이지 */
		$('.menu130 .m-dept-sec-1 .more a.more2').on('click', function() {
			var obj = $($(this).attr('href')).offset();
			$('html,body').animate({
				'scrollTop': obj.top
			});
			return false;
		});
		$('.menu130 .m-dept-sec-2 dl dt a, .menu160 .m-dept-sec-2 dl dt a').on('click', function() {
			if ($(this).parent().hasClass('on')) {
				$(this).parent().removeClass('on');
				$(this).parent().next().removeClass('on');
				return false;
			}
			$(this).parent().addClass('on');
			$(this).parent().next().addClass('on');
			return false;
		});
	});

	function doctor_load_view(wr_id) { // wr_id 는 의료진 게시판의 게시물 고유번호 wr_id
		popup_open('iframe', '/page/doctor_load_view_m.php?wr_id=' + wr_id);
		$('#inner_bg').on('click', function() {
			popup_close();
		});
	}

</script>



<div id="privacy-wrap">
	<div style="position:fixed;left:0;right:0;top:0;bottom:0;background:#333;opacity:.5;z-index:1001"></div>
	<div class="inner">
		<div style="background:#d87489;color:#fff;padding:15px 0;border-radius:5px 5px 0 0;text-align:center">개인정보처리방침</div>
		<div style="padding:20px;background:#fff;border-radius:0 0 5px 5px">
			<div style="overflow:scroll;height:300px">
				<?php echo nl2br($config['cf_privacy']) ?>
			</div>
			<button type="button" onclick="$('#privacy-wrap').removeClass('on')">닫기</button>
		</div>
	</div>
</div>


<?php
include_once "{$g4['path']}/tail.sub.mobile.php";
