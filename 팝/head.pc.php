<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once "{$g4['path']}/lib/latest.lib.php";

?>











<a href="#contents-wrap" id="header_skip">본문바로가기</a>

<h1 id="h1"><?=$g4['title']?></h1>

<header id="header">
    <div class="submenu-dim"></div>
	
    <nav id="gnb" class="clearfix">
		<div id="header1">
			<div class="wrapper">
				<a href="/" class="logo">
					<strong><?=$g4['title']?></strong>
				</a>
				<form name="sform" id="sform" method="get" action="/bbs/search2.php">
				<input type="text" name="sform_stx" value="<?=urldecode($_GET['sform_stx'])?>" placeholder="검색어를 입력하세요">
				<button type="submit"></button>
				</form>

				<?php echo outlogin('basic'); ?>

				<ul class="sns sns-b">
					<li><a href="https://pf.kakao.com/_JtttZ/chat" target="_blank"><img src="/img/menu/ico-kakao.png" alt=""></a></li>
					<li><a href="https://www.youtube.com/channel/UCDNOc1o7uG0aQuNPsc62orQ" target="_blank"><img src="/img/menu/ico-youtube.png" alt=""></a></li>
					<li><a href="https://www.instagram.com/popsurgery/" target="_blank"><img src="/img/menu/ico-instagram.png" alt=""></a></li>
					<li><a href="https://www.facebook.com/popsurgery/" target="_blank"><img src="/img/menu/ico-facebook.png" alt=""></a></li>
					<li><a href="https://blog.naver.com/me2pop" target="_blank"><img src="/img/menu/ico-naver.png" alt=""></a></li>
				</ul>
				<ul class="sns sns-w">
					<li><a href="https://pf.kakao.com/_JtttZ/chat" target="_blank"><img src="/img/menu/ico-kakao-w.png" alt=""></a></li>
					<li><a href="https://www.youtube.com/channel/UCDNOc1o7uG0aQuNPsc62orQ" target="_blank"><img src="/img/menu/ico-youtube-w.png" alt=""></a></li>
					<li><a href="https://www.instagram.com/popsurgery/" target="_blank"><img src="/img/menu/ico-instagram-w.png" alt=""></a></li>
					<li><a href="https://www.facebook.com/popsurgery/" target="_blank"><img src="/img/menu/ico-facebook-w.png" alt=""></a></li>
					<li><a href="https://blog.naver.com/me2pop" target="_blank"><img src="/img/menu/ico-naver-w.png" alt=""></a></li>
				</ul>
			</div>
		</div>
		
		<div id="header2" class="wrapper">
			<button type="button" class="menu-toggle"><span><i></i>Menu open</span></button>
			<ul class="menu">
				<?php
				foreach ($sitemap as $key=>$val) {
					if (substr($val[0][0], 0, 3) == '910') continue;
					if (substr($val[0][0], 0, 3) == '920') continue;
					$link = $val[1][2];
					if (substr($pageIndex,0,3) == substr($val[0][0], 0, 3)) echo "<li class=\"active\">\n";
					else echo "<li>\n";
					echo "<a href=\"{$link}\" class=\"big-menu\">{$val[0][1]}</a>\n";
					$j = 1; 
					if (is_array($val)) {
						$tmp = array();
						foreach ($val as $key2=>$val2) {
							if ($key2 == 0) continue;
							$class = '';
							$link = $val2[2];
							if ($val2[0] == $pageIndex) $tmp[] = "<li class=\"active\"><a href=\"{$link}\">{$val2[1]}</a></li>";
							else $tmp[] = "<li><a href=\"{$link}\">{$val2[1]}</a></li>";
						}
						if (substr($val[0][0], 0, 3) == '130xx') {
							$str = '';
							for ($k=0; $k<5; $k++) { if (!isset($tmp[$k])) break; $str .= $tmp[$k]; }
							if ($str != '') echo "<ul class=\"sub-drop\">{$str}</ul>";
							$str = '';
							for ($k=5; $k<9; $k++) { if (!isset($tmp[$k])) break; $str .= $tmp[$k]; }
							if ($str != '') echo "<ul class=\"sub-drop\">{$str}</ul>";
							$str = '';
							for ($k=9; $k<15; $k++) { if (!isset($tmp[$k])) break; $str .= $tmp[$k]; }
							if ($str != '') echo "<ul class=\"sub-drop\">{$str}</ul>";
						} else {
							$str = '';
							for ($k=0; $k<count($tmp); $k++) { if (!isset($tmp[$k])) break; $str .= $tmp[$k]; }
							if ($str != '') echo "<ul class=\"sub-drop\">{$str}</ul>";
						}
					}
					echo "</li>";
				}
				?>
			</ul>
		</div>
    </nav>
	<div class="line-bg"></div>
</header>
<div class="top-bg"></div>



<div id="allmenu-wrap">
	<div class="wrapper">
		<div class="inner">
			<h3>All menu</h3>
			<a href="#" id="allmenu-close">X</a>
			<div style="height:3px;background:#d87489"></div>
			<ul class="ul">
			<?php
			foreach ($sitemap as $key=>$val) {
				if ($is_member && substr($key, 0, 3) == '910') continue;
				else if (!$is_member && substr($key, 0, 3) == '920') continue;
				echo "<li><h5>{$val[0][1]}<i></i></h5><div class='allmenu-ul allmenu{$key}'><ul>";
				foreach ($val as $key2=>$val2) {
					if ($key2 == 0) continue;
					echo "<li>";
					echo "<a href='{$val2[2]}'>- {$val2[1]}</a>";
					if (isset($val2[3]) && is_array($val2[3])) {
						echo "<ul>";
						foreach ($val2[3] as $val3) {
							echo "<li>";
							echo "<a href='{$val3[2]}'>{$val3[1]}</a>";
							if (isset($val3[3]) && is_array($val3[3])) {
								echo "<ul>";
								foreach ($val3[3] as $val4) {
									echo "<li><a href='{$val4[2]}'>{$val4[1]}</a></li>";
								}
								echo "</ul>";
							}
							echo "</li>";
						}
						echo "</ul>";
					}
					echo "</li>";
				}
				echo "</ul></div></li>";
			}
			?>
			</ul>
			<i class="i1"></i>
			<i class="i2"></i>
			<i class="i3"></i>
			<i class="i4"></i>
		</div>
	</div>
</div>

<div id="top-blank"></div>

<!-- snbMain -->
<div id="snbMain" class="menu<?=substr($pageIndex, 0, 3)?> menu<?=$pageIndex?>">
	<div id="asideRight" class="">
		<aside>
			<ul>
				<li><a href="https://www.youtube.com/channel/UCDNOc1o7uG0aQuNPsc62orQ" target="_blank">팝 TV</a></li>
				<li><a href="https://accounts.kakao.com/login?continue=http%3A%2F%2Fpf.kakao.com%2F_rHcxds%2Ffriend" target="_blank">챗봇상담</a></li>
				<li><a href="/bbs/board.php?bo_table=counsel&pageIndex=720101" onclick="$('#kakao-popup').addClass('on');return false">카카오 상담</a></li>
				<li><a href="/bbs/write.php?bo_table=reserve&pageIndex=720103">온라인 예약</a></li>
				<li><a href="https://booking.naver.com/booking/13/bizes/333631?area=ple"  target="_blank" onclick="googleAnalyticsEvent('네이버예약');">네이버 예약</a></li>
				<li><a href="/bbs/board.php?bo_table=counsel&pageIndex=720102">온라인상담</a></li>
				<li><a href="#" id="pageTop">상단으로</a></li>
			</ul>
		</aside>
	</div>
	<div id="kakao-popup">
		<div class="pRelative">
			<form name="footerform" id="footerform" method="post" action="/bbs/write_update.php" onsubmit="googleAnalyticsEvent('카카오톡상담');return xfwrite_submit(this)">
				<input type="hidden" name="bo_table" value="kakao" />
				<input type="hidden" name="page_type" value="popup" />
				<input type="hidden" name="wr_subject" value="카카오상담신청 <?=$g4['time_ymdhis']?>" />
				<ul>
					<li>
						<label class="label sr-only">이름</label>
						<input type="text" name="wr_name" required itemname="이름" class="ed" value="<?=$member['name']?>" />
					</li>
					<li class="tel">
						<label class="label sr-only">휴대전화</label>
						<input type="hidden" name="wr_2" />
						<select name="wr_2_1" class="ed">
							<option value="010">010</option>
							<option value="011">011</option>
							<option value="016">016</option>
							<option value="018">018</option>
							<option value="019">019</option>
						</select>
						<input type="text" name="wr_2_2" class="ed" maxlength="4" />
						<input type="text" name="wr_2_3" class="ed" maxlength="4" />
					</li>
					<li>
						<label class="label sr-only">상담과목</label>
						<select name="ca_name" required itemname="진료과목">
							<option value="">===========</option>
							<?php echo get_category_option2('kakao') ?>
						</select>
					</li>
					<li>
						<label><input type="checkbox" name="agree"> 개인정보 취급방침 동의</label>
					</li>
				</ul>

				<button type="submit">보내기</button>
				<a href="#" class="close" onclick="$('#kakao-popup').removeClass('on');return false"></a>
			</form>
		</div>
	</div>
	<?php
	if (1==2&&$pageIndex) { 
        $prev_link = $next_link = $prev_link_title = $next_link_title = '';
        $tmp = false;
		$tmp_pageIndex = substr($pageIndex, 0, 6);
        foreach ($sitemap as $key=>$val) {
            foreach ($val as $key2=>$val2) {
                if ($tmp && isset($val2[2])) {
					$next_link_title = $val2[1];
                    $next_link = $val2[2];
                    break 2;
                }
                if ($val2[0] == $tmp_pageIndex) {
                    $tmp = true;
                    continue;
                }
                if (isset($val2[2])) {
					$prev_link = $val2[2];
					$prev_link_title = $val2[1];
				}
            }
        }
	?>
	<?php /*
	<div class="page-arrow">
		<div class="cont-img-wrap">
			<div class="cont-img">
				<img src="/img/page/topimg/<?=substr($pageIndex, 0, 3)?>.jpg" alt="">
			</div>
		</div>
		<div class="wrapper">
			<div id="fixed_menu">
				<?php 
				if ($prev_link) echo "<a href=\"{$prev_link}\" class=\"arrow prev\"></a>";
				echo "<ul class=\"menu_count_{$fixed_menu_count}\">{$fixed_menu}</ul>";
				if ($next_link) echo "<a href=\"{$next_link}\" class=\"arrow next\"></a>";
				?>
			</div>

		</div>
	</div>
	*/ ?>
	<?php } ?>
	<!-- contents -->
	<div id="contents-wrap">
		<a name="contents-wrap"></a>
		<?php
		// if ($pageIndex) { include "{$g4['path']}/page/snbLeft.php"; }
		?>
		<div id="contents">
			<div class="topimg"></div>
			<?php # if ($pageIndex) include "{$g4['path']}/page/current_title.php"; ?>





<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
<script type="text/javascript">
if(!wcs_add) var wcs_add = {};
wcs_add["wa"] = "744127356a83a0";
if(window.wcs) {
  wcs_do();
}
</script>


