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
    $('#fur_del_id').val("");
  });

  $("#add").click( function () {
    $('#myformRow').show();
    $('#updateButton').hide();
    $('#addButton').show();
    $('#myHidenFormDelete').hide();
    $('#fur_id').val("");
    $('#fur_fn').val("");
    $('#fur_ln').val("");
    $('#fur_add').val("");
    $('#fur_email').val("");
    $('#fur_contact').val("");
  });


  // Buttun DeleteItem Listner
  $(document).on('click',"#mytable button.del",function(){
    $('#myHidenFormDelete').show();
    $('#myformRow').hide();
    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#fur_del_id').val($.trim(rowData[0]));
    $('#idFurDel').text("#" + $.trim(rowData[0]));
  });

  // Buttun EditItem Listner
  $(document).on('click',"#mytable button.edt",function(){
    $('#myformRow').show();
    $('#updateButton').show();
    $('#addButton').hide();
    $('#myHidenFormDelete').hide();
    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#fur_id').val($.trim(rowData[0]));
    $('#fur_fn').val($.trim(rowData[1]));
    $('#fur_ln').val($.trim(rowData[2]));
    $('#fur_add').val($.trim(rowData[3]));
    $('#fur_email').val($.trim(rowData[4]));
    $('#fur_contact').val($.trim(rowData[5]));
  });

});
