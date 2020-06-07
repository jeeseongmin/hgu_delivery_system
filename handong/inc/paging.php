<?php
	if($cnt > 0){
		$allPage = ceil($cnt / $limit); //전체 페이지의 수
		if($page < 1 || ($allPage && $page > $allPage)) {
	?>
			<script>
				alert("존재하지 않는 페이지입니다.");
				history.back();
			</script>

<?php
			exit;
	}
	$pagesize = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
	$currentSection = ceil($page / $pagesize); //현재 섹션
	$allSection = ceil($allPage / $pagesize); //전체 섹션의 수
	$firstPage = ($currentSection * $pagesize) - ($pagesize - 1); //현재 섹션의 처음 페이지
	if($currentSection == $allSection)
		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
	else
		$lastPage = $currentSection * $pagesize; //현재 섹션의 마지막 페이지

	$prevPage = (($currentSection - 1) * $pagesize); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
	$nextPage = (($currentSection + 1) * $pagesize) - ($pagesize - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.


	$paging = '<ul class="restList">'; // 페이징을 저장할 변수
    //첫 페이지가 아니라면 처음 버튼을 생성
    if($page > 10)
      $paging .= '<li class="paging pag_start"><a class="p_arrow" href="javascript:getList(1)">&lt;&lt;</a></li>';

    //첫 섹션이 아니라면 이전 버튼을 생성
    if($currentSection != 1)
      $paging .= '<li class="paging pag_prev"><a class="p_arrow" href="javascript:getList('.(($currentSection-1)*$limit).')">&lt;</a></li>';

    for($i = $firstPage; $i <= $lastPage; $i++) {
      if($i == $page){
        $paging .= '<li class="paging current"><a class="current">'.$i.'</a></li>';
			}
      else
        $paging .= '<li class="paging"><a href="javascript:getList('.$i.')">'.$i.'</a></li>';
    }

    //마지막 섹션이 아니라면 다음 버튼을 생성
    if($currentSection != $allSection){
      $paging .= '<li class="paging pag_next"><a class="p_arrow" href="javascript:getList('.($currentSection*$limit+1).')">&gt;</a></li>';
}
    //마지막 페이지가 아니라면 끝 버튼을 생성
    if($allPage > 10 && $page != $allPage)
      $paging .= '<li class="paging page_end"><a class="p_arrow" href="javascript:getList('.$allPage.')">&gt;&gt;</a></li>';
	$paging .= '</ul>';

	echo $paging;
	}
?>
<html>
<head>
<script>
</script>
</head>
</html>
