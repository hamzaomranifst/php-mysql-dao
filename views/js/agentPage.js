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
    $('#ag_del_id').val("");
  });

  $("#add").click( function () {
    $('#myformRow').show();
    $('#updateButton').hide();
    $('#addButton').show();
    $('#myHidenFormDelete').hide();
    $('#ag_id').val("");
    $('#ag_fn').val("");
    $('#ag_ln').val("");
    $('#ag_add').val("");
    $('#ag_email').val("");
    $('#ag_contact').val("");
  });


  // Buttun DeleteItem Listner
  $(document).on('click',"#mytable button.del",function(){
    $('#myHidenFormDelete').show();
    $('#myformRow').hide();
    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#ag_del_id').val($.trim(rowData[0]));
    $('#idAgDel').text("#" + $.trim(rowData[0]));
  });

  // Buttun EditItem Listner
  $(document).on('click',"#mytable button.edt",function(){
    $('#myformRow').show();
    $('#updateButton').show();
    $('#addButton').hide();
    $('#myHidenFormDelete').hide();
    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#ag_id').val($.trim(rowData[0]));
    $('#ag_fn').val($.trim(rowData[1]));
    $('#ag_ln').val($.trim(rowData[2]));
    $('#ag_add').val($.trim(rowData[3]));
    $('#ag_email').val($.trim(rowData[4]));
    $('#ag_contact').val($.trim(rowData[5]));
  });

});
