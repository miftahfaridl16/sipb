<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rush | Registrasi</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  </head>

  <body style="background-color:#dbd7d7;">
    <div class="container">
        <div class="page-header">
          <h1>Registrasi Member</h1>
        </div>
        
        <form action="<?php echo site_url('home/simpanmember'); ?>" method="post">
        <?php 
            echo validation_errors('<div class="alert alert-danger">
            <button class="close" data-dismiss="alert" type="button">×</button>','</div>');
        ?>
        <div class="row"> 
          <div class="col-md-6">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="nama lengkap..">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="alamat..">
              </div>
              <div class="form-group">
                <label>Kota</label>
                <select name="kota" class="form-control">
                  <option value="" selected>- Pilih Kota -</option>
                  <option value="Surabaya">Surabaya</option>
                  <option value="Sidoarjo">Sidoarjo</option>
                  <option value="Gresik">Gresik</option>
                </select>
              </div>
              <div class="form-group">
                <label>No. Telp</label>
                <input type="text" name="notlp" class="form-control" placeholder="no telp..">
              </div>
          </div>

          <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="email..">
              </div>
              <div class="form-group">
                <label>User ID</label>
                <input type="text" name="user" class="form-control" placeholder="user..">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" placeholder="password..">
              </div>
          </div>
        </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Simpan">
          </div>
        </form>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
