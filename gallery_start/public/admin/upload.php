<?php require_once('../../includes/boot.php'); ?>
<?php include_layout_template("admin_header.php") ?>
<?php

if (isset($_POST['submit'])) {
  die(var_dump($_FILES));
  // création d'un objet photo avec passage de paramètres
  $photo = new Photo([
      'title' => $_POST['title'],
    ]);

  // enregistre fichier sur serveur
  $photo->setFile($_POST['file_upload']);

  // sauvegarde en base de données
  $photo->save();


}

?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <?php include_layout_template("admin_top_nav.php") ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include_layout_template("admin_side_nav.php") ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
          <div class="container-fluid">
              <!-- Page Heading -->
              <div class="row">
                  <div class="col-sm-6">
                      <h1 class="page-header">Upload</h1>

                      <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="file" name="file_upload" class="form-control">
                        </div>
                        <input type="submit" name="submit">
                      </form>

                      <ol class="breadcrumb">
                          <li>
                              <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                          </li>
                          <li class="active">
                              <i class="fa fa-file"></i> Blank Page
                          </li>
                      </ol>
                  </div>
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
  <?php include_layout_template("admin_footer.php") ?>
