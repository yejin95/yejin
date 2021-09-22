<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$write_href = $reply_href = $update_href = '';
?>

<div>
    <!-- 링크 버튼 -->
    <div style="text-align: right; padding-bottom: 5px">
    <?
    ob_start();
    ?>
    <? if ($copy_href) { echo "<span class='button'><a href=\"$copy_href\">복사</a></span> "; } ?>
    <? if ($move_href) { echo "<span class='button'><a href=\"$move_href\">이동</a></span> "; } ?>

    <? if ($search_href) { echo "<span class='button'><a href=\"$search_href\">검색목록</a></span> "; } ?>
    <? if ($update_href) { echo "<span class='button'><a href=\"$update_href\">수정</a></span> "; } ?>
    <? if ($delete_href) { echo "<span class='button'><a href=\"$delete_href\">삭제</a></span> "; } ?>
    <? if ($reply_href) { echo "<span class='button'><a href=\"$reply_href\">답변</a></span> "; } ?>
    <? if ($write_href) { echo "<span class='button'><a href=\"$write_href\">글쓰기</a></span> "; } ?>
    <? echo "<span class='button'><a href=\"$list_href\">목록</a></span> "; ?>
    <?
    $link_buttons = ob_get_contents();
    ob_end_flush();
    ?>
    </div>
</div>
<table class="board_view">
<colgroup>
<col width="110px" />
<col width="" />
<col width="110px" />
<col width="170px" />
<col width="110px" />
<col width="130px" />
</colgroup>
<? if ($is_category) { ?>
<tr>
	<th>상담분류</th>
	<td colspan="3" class="bold">
		<?= $view['ca_name'] ?>
    <?php
    if($_GET['bo_table']=="kakaodb"){
      echo "(카카오)";
    }
     ?>
	</td>
	<th>작성경로</th>
	<td>
		<?
		if ($view['wr_10'] == '1') echo '모바일';
		else echo 'PC';
		?>
	</td>
</tr>
<? } ?>
<tr>
	<th>전화번호</th>
	<td colspan="5"><?=$view['wr_2']?></td>
	<?php /*
	<th>성별</th>
	<td><?=$view['wr_6']?></td>
	<th>카카오 아이디</th>
	<td><?=$view['wr_5']?></td>
	*/ ?>
</tr>
<tr>
	<th>작성자</th>
	<td><?=$view[wr_name]?><? if ($is_ip_view) { echo "&nbsp;($ip)"; }  ?></td>
	<th>작성일</th>
	<td><?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></td>
	<th>조회</th>
	<td><?=$view['wr_hit']?></td>
</tr>
<tr>
	<?php
	if( $view['wr_11'] != ""){
		$style="style = 'display: inline-block;
				height: 18px;
				line-height:18px;
				border-radius: 8px;
				border: solid 0.5px #d1cff5;
				background-color: #f5f4fc;
				font-size: 12px;
				font-weight: normal;
				color: red;
				padding: 0 2px; margin-left:10px;'";

		$t = "<b $style>{$view['wr_11']}  요청</b>";

	}else{
		$t = null;
	}

	?>
	<th>휴대전화</th>
	<td colspan="3"><?=$view['wr_2']?> <?=$t?>
	</td>
	<?php /*
	<th>EMAIL</th>
	<td colspan="3"><?=$view['wr_email']?></td>
	*/ ?>
</tr>
<?php if ($bo_table == 'counsel_foreign') { ?>
<tr>
	<th>NATIONALITY</th>
	<td><?=$view['wr_4']?></td>
	<th>GENDER</th>
	<td><?=$view['wr_5']?></td>
	<th></th>
	<td></td>
</tr>
<?php } ?>
<tr>
	<th>상담상태</th>
	<td class="bold">
		<?
		if ($view['wr_8'] == '1') echo "<span style='color:#f00'>상담완료</span>";
		else echo "<span style='color:#00f'>상담대기</span>";
		?>
	</td>
	<th>상태변경</th>
	<td colspan="3">
		<?
		$tmp = array();
		if ($view['wr_8'] == '1') {
			$tmp['act'] = 'no';
			$tmp['str'] = '상담대기로 변경';
			$tmp['str1'] = '상담대기 SMS 전송';
			$tmp['str2'] = '상담대기 이메일 전송';
		}
		else {
			$tmp['act'] = 'yes';
			$tmp['str'] = '상담완료로 변경';
			$tmp['str1'] = '상담완료 SMS 전송';
			$tmp['str2'] = '상담완료 이메일 전송';
		}
		?>
		<form name="pform" id="pform" method="post" action="<?= $board_skin_path ?>/wr_change.php" target="hiddenframe">
			<input type="hidden" name="bo_table" value="<?=$bo_table?>" />
			<input type="hidden" name="wr_id" value="<?=$wr_id?>" />
			<input type="hidden" name="act"   value="<?=$tmp['act']?>" />
			<span class="button <?= $tmp['act'] == 'yes' ? 'red' : 'blue' ?>"><button type="submit" value="<?=$tmp['str']?>"><?=$tmp['str']?></button></span>
		</form>
	</td>
</tr>


<?
// 가변 파일
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source]) {
        $cnt++;
        echo "<tr><th>첨부파일</th><td colspan='5'>";
        echo "&nbsp;&nbsp;<img src='{$basic_skin_path}/img/icon_file.gif' align=absmiddle border='0'>";
        echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '".urlencode($view[file][$i][source])."');\" title='{$view[file][$i][content]}'>";
        echo "&nbsp;<span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
        echo "</a>";
		if ($view[file][$i][view]) {
			echo "&nbsp;&nbsp;<a href='{$view['file'][$i]['path']}/{$view['file'][$i]['file']}' style='font-size:11px' target='_blank'>(미리보기)</a>";
		}
		echo "</td></tr>";
    }
}

// 링크
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><th>링크</th><td colspan='5'>";
        echo "&nbsp;&nbsp;<img src='{$basic_skin_path}/img/icon_link.gif' align=absmiddle border='0'>";
        echo "<a href='{$view[link_href][$i]}' target=_blank>";
        echo "&nbsp;<span style=\"color:#888;\">{$link}</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
        echo "</a></td></tr>";
    }
}
?>
<tr>
	<td colspan="6" style="word-break:break-all; padding:20px 10px 30px 10px;border-bottom:0">
    <?php if ($bo_table == 'dbpage') {
      echo "1. 성별<br>";
      echo $view['wr_1']."<br><br>";
      echo $view['wr_3']."<br>";
      echo $view['wr_4']."<br>";
      echo $view['wr_5']."<br>";
      echo $view['wr_6']."<br>";
      echo $view['wr_7'];

    } ?>
        <!-- 내용 출력 -->
        <span id="writeContents"><?=$view[content];?></span>

        <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
        <!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>
	</td>
</tr>
</table>

<?
// 코멘트 입출력
include_once("./view_comment.php");
?>




<div class="board_button">
	<div class="fLeft">
	    <? if ($prev_href) { echo "<span class='button'><a href=\"$prev_href\">이 전</a></span> "; } ?>
		<? if ($next_href) { echo "<span class='button'><a href=\"$next_href\">다 음</a></span> "; } ?>
	</div>
	<div class="fRight">
		<?= $link_buttons ?>
	</div>
</div>

<div class="view_bottom_spacer"></div>



<script type="text/javascript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+decodeURIComponent(file)+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>
<!-- 게시글 보기 끝 -->
