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
  $('#myHidenStorePullForm').hide();


  $("#cancelButton").click( function () {
    $('#myHidenFormDelete').hide();
    $('#a_del_id').val("");
  });

  $("#add").click( function () {
    $('#myformRow').show();
    $('#updateButton').hide();
    $('#addButton').show();
    $('#myHidenFormDelete').hide();
    $('#myHidenStorePullForm').hide();
    $('#a_id').val("");
    $('#a_code').val("");
    $('#a_name').val("");
    $('#a_price').val("");
    $('#a_quant').val("");
  });

  $("#show").click( function () {
    $(location).attr('href', '?controller=Article&action=showArticleSeuil')
  });

  // Buttun StoreItem Listner
  $(document).on('click',"#mytable button.store",function(){
    $('#myHidenFormDelete').hide();
    $('#myformRow').hide();
    $('#myHidenStorePullForm').show();
    $('#storeButton').show();
    $('#pullButton').hide();

    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#a_sp_id').val($.trim(rowData[0]));
    $('#legenStorePullTitle').text("Store Article Form");
    $('#msg_sp').html("You are going to add a quantity to article <b>"+ "#" + $.trim(rowData[0]) + "</b>");
  });

  // Buttun PullItem Listner
  $(document).on('click',"#mytable button.pull",function(){
    $('#myHidenFormDelete').hide();
    $('#myformRow').hide();
    $('#myHidenStorePullForm').show();
    $('#storeButton').hide();
    $('#pullButton').show();

    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#a_sp_id').val($.trim(rowData[0]));
    $('#legenStorePullTitle').text("Pull Article Form");
    $('#msg_sp').html("You are going to remove a quantity to article <b>"+ "#" + $.trim(rowData[0]) + "</b>");
  });

  // Buttun DeleteItem Listner
  $(document).on('click',"#mytable button.del",function(){
    $('#myHidenFormDelete').show();
    $('#myformRow').hide();
    $('#myHidenStorePullForm').hide();
    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#a_del_id').val($.trim(rowData[0]));
    $('#idArtDel').text("#" + $.trim(rowData[0]));
  });

  // Buttun EditItem Listner
  $(document).on('click',"#mytable button.edt",function(){
    $('#myformRow').show();
    $('#updateButton').show();
    $('#addButton').hide();
    $('#myHidenFormDelete').hide();
    $('#myHidenStorePullForm').hide();
    // $(this) it's the button that we will click on
    var rowData = myTable.row( $(this).parents('tr') ).data();
    $('#a_id').val($.trim(rowData[0]));
    $('#a_code').val($.trim(rowData[1]));
    $('#a_name').val($.trim(rowData[2]));
    $('#a_price').val($.trim(rowData[3]));
    $('#a_quant').val($.trim(rowData[4]));
  });

});
