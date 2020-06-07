$(document).ready(function(){
  //alert("start");
  getList();
});

function getList(page){
  window.scrollTo(0,0);
  //alert("getList");
  var isSearch = 'N';

  if(!page) {
    page = '<?=$page?>';
  }
  else if (page == -1){
    isSearch = 'Y';
    page = 1;
  }
  //alert("<?=$list_url?>");
  $.ajax({
    url: '<?=$list_url?>',
    method: "POST",
    data: {
       page: page,
       search_ok : isSearch,
       category_select: $('#category_select').val(),
       //search_category : $('#search_category').val(),
       search_select: $('#search_select').val(),
       search_input: $('#search_input').val(),
      // search_semester: $('#search_semester').val(),
      // search_visible: $('#search_visible').val(),
      // sortitem: sortCol
    },
    success: function(data) {
      $("#table_responsive").html(data);
    }
  });
  return false;
}
