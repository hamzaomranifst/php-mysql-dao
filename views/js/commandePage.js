$(document).ready(function() {

  var myTable = $('#mytable').DataTable( {
      "aoColumnDefs" : [
        {
            "bSortable" : false,
            "aTargets" : [ "no-sort" ]
        }
      ]
  });

  $('#myformRow').hide();
  $('#myHidenFormDelete').hide();


  $("#cancelButton").click( function () {
    $('#myHidenFormDelete').hide();
    $('#c_del_id').val("");
  });

  $("#add").click( function () {
    $('#myformRow').show();
    $('#myHidenFormDelete').hide();
  });

  // Buttun DeleteItem Listner
  $(document).on('click',"#mytable button.del",function(){
    $('#myHidenFormDelete').show();
    $('#myformRow').hide();
    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#c_del_id').val($.trim(rowData[0]));
    $('#idCDel').text("#" + $.trim(rowData[0]));
  });


});
