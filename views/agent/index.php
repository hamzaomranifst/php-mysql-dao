<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="views/css/shop-item.css" rel="stylesheet">
    <!-- DataTable Bootstrap CSS -->
    <link href="views/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Stock</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="?controller=Article&action=index">Article</a>
                  </li>
                  <li>
                      <a href="?controller=Fournisseur&action=index">Furnisher</a>
                  </li>
                  <li>
                      <a href="?controller=Command&action=index">Command</a>
                  </li>
                  <li>
                      <a href="?controller=Agent&action=index">Agent</a>
                  </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
<div class="container">
	<div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-2">
          <h4><b>List of Agent</b></h4>
        </div>
        <div class="col-md-2">
          <button type="submit" formaction="?controller=Agent&action=insert" id="add" name="action" value="add" formmethod="post" class="btn btn-success btn-xs form-control input-md" data-title="Add" data-toggle="modal" data-target="#Add"><span class="glyphicon glyphicon-plus"></span><b> Add</b></button>
        </div>
      </div>
        <br>
        <div class="table-responsive">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Address</th>
              <th>Email</th>
              <th>Contact</th>
              <th class="no-sort">Edit</th>
              <th class="no-sort">Delete</th>
            </thead>
            <tbody>
              <?php
                foreach ($agentList as $agentItem) {
                  # code...
                  ?>
                  <tr>
                    <td> <?php echo $agentItem->getId(); ?> </td>
                    <td> <?php echo $agentItem->getFirstName(); ?> </td>
                    <td> <?php echo $agentItem->getLastName(); ?> </td>
                    <td> <?php echo $agentItem->getAddress(); ?> </td>
                    <td> <?php echo $agentItem->getEmail(); ?> </td>
                    <td> <?php echo $agentItem->getContact(); ?> </td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs edt" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs del" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                  </tr>
                  <?php
                }
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row" id="myformRow">
      <div class="col-md-12">
        <form class="form-horizontal" >
          <fieldset>
          <!-- Form Name -->
          <legend>Agent Form</legend>
          <!-- hiden input-->
          <input id="ag_id" name="ag_id" type="hidden" class="form-control input-md">
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_url">First Name</label>
            <div class="col-md-4">
            <input id="ag_fn" name="ag_fn" type="text" placeholder="First Name" class="form-control input-md">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_title">Last Name</label>
            <div class="col-md-4">
            <input id="ag_ln" name="ag_ln" type="text" placeholder="Last Name" class="form-control input-md">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_snippet">Address</label>
            <div class="col-md-4">
            <input id="ag_add" name="ag_add" type="text" placeholder="Address" class="form-control input-md">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_date">Email</label>
            <div class="col-md-4">
            <input id="ag_email" name="ag_email" type="text" placeholder="Email" class="form-control input-md">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_authors">Contact</label>
            <div class="col-md-4">
            <input id="ag_contact" name="ag_contact" type="text" placeholder="Contact" class="form-control input-md">
            </div>
          </div>
          <!-- Submit input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_authors"></label>
            <div class="col-md-4">
              <button type="submit" formaction="?controller=Agent&action=update" id="updateButton" name="action" value="update" formmethod="post" class="btn btn-primary btn-xs form-control input-md" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span><b> Update</b></button>
              <button type="submit" formaction="?controller=Agent&action=insert" id="addButton" name="action" value="add" formmethod="post" class="btn btn-success btn-xs form-control input-md" data-title="Add" data-toggle="modal" data-target="#Add"><span class="glyphicon glyphicon-pencil"></span><b> Add</b></button>
            </div>
          </div>
          </fieldset>
        </form>
      </div>
    </div>

    <div class="row" id="myHidenFormDelete">
      <div class="col-md-12">
        <form class="form-horizontal" >
          <fieldset>
          <!-- Form Name -->
          <legend>Deletion Confirmation</legend>
          <!-- hiden input-->
          <input id="ag_del_id" name="ag_del_id" type="hidden" class="form-control input-md">
          <!-- Text Message -->
          <p> Do you really want to remove the agent <b id="idAgDel"></b></p>
          <!-- Submit input-->
          <div class="form-group">
            <div class="col-md-2">
              <button type="submit" formaction="?controller=Agent&action=delete" id="deleteButton" name="action" value="update" formmethod="post" class="btn btn-danger btn-xs form-control input-md" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span><b> Delete</b></button>
            </div>
            <div class="col-md-2">
              <button type="reset"  id="cancelButton" name="action" value="update" class="btn btn-info btn-xs form-control input-md" data-title="Cancel" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-off"></span><b> Cancel</b></button>
            </div>
          </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="views/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/jquery.dataTables.min.js"></script>
    <script src="views/js/dataTables.bootstrap.min.js"></script>
    <script src="views/js/agentPage.js"></script>

</body>

</html>
