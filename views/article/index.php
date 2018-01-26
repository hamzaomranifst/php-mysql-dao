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
          <h4><b>List of Article</b></h4>
        </div>
        <div class="col-md-2">
          <button type="submit" id="add" name="action" value="add" formmethod="post" class="btn btn-success btn-xs form-control input-md" data-title="Add" data-toggle="modal" data-target="#Add"><span class="glyphicon glyphicon-plus"></span><b> Add</b></button>
        </div>
        <div class="col-md-2">
          <button type="submit" id="show" name="action" value="show" formmethod="post" class="btn btn-warning btn-xs form-control input-md" data-title="Show" data-toggle="modal" data-target="#Show"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span><b> Show</b></button>
        </div>
      </div>
        <br>
        <div class="table-responsive">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>#</th>
              <th>Code</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th class="no-sort">Edit&nbsp;&nbsp;</th>
              <th class="no-sort">Delete</th>
              <th class="no-sort">Store</th>
              <th class="no-sort">Pull</th>
            </thead>
            <tbody>
              <?php
                foreach ($articleList as $articleItem) {
                  # code...
                  ?>
                  <tr>
                    <td> <?php echo $articleItem->getId(); ?> </td>
                    <td> <?php echo $articleItem->getCode(); ?> </td>
                    <td> <?php echo $articleItem->getNom(); ?> </td>
                    <td> <?php echo $articleItem->getPrix(); ?> </td>
                    <td> <?php echo $articleItem->getQuantite(); ?> </td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs edt" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs del" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Store"><button class="btn btn-success btn-xs store" data-title="Store" data-toggle="modal" data-target="#store" ><span class="glyphicon glyphicon-download"></span></button></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Pull"><button class="btn btn-warning btn-xs pull" data-title="Pull" data-toggle="modal" data-target="#pull" ><span class="glyphicon glyphicon-upload"></span></button></p></td>
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
          <legend>Article Form</legend>
          <!-- hiden input-->
          <input id="a_id" name="a_id" type="hidden" class="form-control input-md">
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_url">Code</label>
            <div class="col-md-4">
            <input id="a_code" name="a_code" type="text" placeholder="Code" class="form-control input-md">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_title">Name</label>
            <div class="col-md-4">
            <input id="a_name" name="a_name" type="text" placeholder="Name" class="form-control input-md">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_snippet">Price</label>
            <div class="col-md-4">
            <input id="a_price" name="a_price" type="number" placeholder="Price" class="form-control input-md">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_date">Quantity</label>
            <div class="col-md-4">
            <input id="a_quant" name="a_quant" type="number" placeholder="Quantity" class="form-control input-md">
            </div>
          </div>
          <!-- Select input -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_date">Furnisher</label>
            <div class="col-md-4">
              <select class="form-control input-md" id="a_fur_id" name="a_fur_id">
                <?php
                  foreach ($fournisseurList as $fournisseurItem) {
                    ?>
                    <option value=<?php echo $fournisseurItem->getId() ; ?> > <?php echo $fournisseurItem->getFirstName()." ".$fournisseurItem->getLastName() ; ?> </option>
                    <?php
                  }
                 ?>
              </select>
            </div>
          </div>
          <!-- Submit input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_authors"></label>
            <div class="col-md-4">
              <button type="submit" formaction="?controller=Article&action=update" id="updateButton" name="action" value="update" formmethod="post" class="btn btn-primary btn-xs form-control input-md" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span><b> Update</b></button>
              <button type="submit" formaction="?controller=Article&action=insert" id="addButton" name="action" value="add" formmethod="post" class="btn btn-success btn-xs form-control input-md" data-title="Add" data-toggle="modal" data-target="#Add"><span class="glyphicon glyphicon-plus"></span><b> Add</b></button>
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
          <input id="a_del_id" name="a_del_id" type="hidden" class="form-control input-md">
          <!-- Text Message -->
          <p> Do you really want to remove the article <b id="idArtDel"></b></p>
          <!-- Submit input-->
          <div class="form-group">
            <div class="col-md-2">
              <button type="submit" formaction="?controller=Article&action=delete" id="deleteButton" name="action" value="update" formmethod="post" class="btn btn-danger btn-xs form-control input-md" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span><b> Delete</b></button>
            </div>
            <div class="col-md-2">
              <button type="reset"  id="cancelButton" name="action" value="cancel" class="btn btn-info btn-xs form-control input-md" data-title="Cancel" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-off"></span><b> Cancel</b></button>
            </div>
          </div>
          </fieldset>
        </form>
      </div>
    </div>

    <div class="row" id="myHidenStorePullForm">
      <div class="col-md-12">
        <form class="form-horizontal" >
          <fieldset>
          <!-- Form Name -->
          <legend id="legenStorePullTitle"></legend>
          <!-- hiden input-->
          <input id="a_sp_id" name="a_sp_id" type="hidden" class="form-control input-md">
          <!-- Text Message -->
          <center> <p id="msg_sp"></p> <center>
          <!-- Text input -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_date">Quantity</label>
            <div class="col-md-4">
            <input id="a_quant_sp" name="a_quant_sp" type="number" placeholder="Quantity" class="form-control input-md">
            </div>
          </div>
          <!-- Submit input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="article_authors"></label>
            <div class="col-md-4">
              <button type="submit" formaction="?controller=Article&action=store" id="storeButton" name="action" value="update" formmethod="post" class="btn btn-success btn-xs form-control input-md" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-download"></span><b> Store</b></button>
              <button type="submit" formaction="?controller=Article&action=pull" id="pullButton" name="action" value="add" formmethod="post" class="btn btn-warning btn-xs form-control input-md" data-title="Add" data-toggle="modal" data-target="#Add"><span class="glyphicon glyphicon-upload"></span><b> Pull</b></button>
            </div>
          </div>
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
    <script src="views/js/articlePage.js"></script>

</body>

</html>
