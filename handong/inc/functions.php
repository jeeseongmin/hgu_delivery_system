<?php
//	define('__ROOT__', dirname(dirname(__FILE__)));

	//search functions

  function SearchSemesterList($search, $default){
    global $mileage_semester;
    $selist = explode("|","2018-01|2018-02|2019-01|2019-02|2020-01|2020-02|2021-01|2021-02");

    $str = '<select class="itemListSearchInput ListSearchInput ListSearchInputMiddle" name="semester" id="search_semester" style="padding:3px">';

    for($i = 0; $i < count($selist); $i++){
      $str .= "<option value='".$selist[$i]."'";
      if(($search && $default == $selist[$i]) || ($mileage_semester == $selist[$i]))
        $str .= " selected";
      $str .= ">".$selist[$i]."</option>\n";
    }
    $str .= "</select>";
    echo $str;
  }

	function SearchSemesterList($search, $default){

		global $mileage_semester;

		$selist = explode("|","2018-01|2018-02|2019-01|2019-02|2020-01|2020-02|2021-01|2021-02");

		$str = '<select class="itemListSearchInput ListSearchInput ListSearchInputMiddle" name="semester" id="search_semester" style="padding:3px">';

		for($i = 0; $i < count($selist); $i++){
			$str .= "<option value='".$selist[$i]."'";
			if(($search && $default == $selist[$i]) || ($mileage_semester == $selist[$i]))
				$str .= " selected";
			$str .= ">".$selist[$i]."</option>\n";
		}
		$str .= "</select>";
		echo $str;
	}

	//search functions student view
	function StudentSearchSemesterList($search, $default){
		global $mileage_semester;
		$selist = explode("|","2018-01|2018-02|2019-01|2019-02|2020-01|2020-02|2021-01|2021-02");
		$str = '<select class="itemListSearchInput ListSearchInput" name="semester" id="search_semester" style="padding:3px">';
		for($i = 0; $i < count($selist); $i++){
			$str .= "<option value='" . $selist[$i] . "'";
			if(($search && $default == $selist[$i]) || ($mileage_semester == $selist[$i]))
				$str .= " selected";
			$str .= ">" . $selist[$i] . "</option>\n";
		}
		$str .= "</select>";
		echo $str;
	}

	function SearchCategoryList($search, $default){
		global $conn;

		$str = "<select class='itemListSearchInput ListSearchInput' name='search_category' id='search_category'>";
		$str .= "<option value='' selected>카테고리</option>";

		$sql = "SELECT * FROM _sw_mileage_category";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$str .= '<option value="'.$row['id'].'"';
				if($search && $default == $row['id'])
					$str .= " selected";
				$str .= ">".$row['cname']."</option>\n";
			}//while
		}//if
		$str .= "</select>";
		echo $str;
	}

	// edit or add SemesterList
	function SemesterList($search, $default){
		global $semester;
		$selist = explode("|","2018-01|2018-02|2019-01|2019-02|2020-01|2020-02|2021-01|2021-02");
		$str = '<select class="newInput" name="semester">';
		for($i = 0; $i < count($selist); $i++){
			$str .= "<option value='".$selist[$i]."'";
			if(($search && $default == $selist[$i]) || ($semester == $selist[$i]))
				$str .= " selected";
			$str .= ">".$selist[$i]."</option>\n";
		}
		$str .= "</select>";
		echo $str;
	}

?>
