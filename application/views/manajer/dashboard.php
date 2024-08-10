<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | Koperasi</title>

  <?php $this->load->view("manajer/_includes/head.php") ?>


<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php $this->load->view("manajer/_includes/header.php") ?>
    <?php $this->load->view("manajer/_includes/sidebar.php") ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Alert -->
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <!-- Alert -->
      <!-- Content Header (Page header) -->
      <section class="content-header">

        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <div id="date"></div>
          <script>
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear()

            document.getElementById("date").innerHTML = " " + day + " " + months[month] + " " + year;
          </script>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
              <!-- Tabs within a box -->


              <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>

                  <h3 class="box-title">Quick Email</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                  <!-- /. tools -->
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </form>
                </div>
                <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                    <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Calendar -->
            <div class="box box-solid bg-green-gradient">
              <div class="box-header">
                <i class="fa fa-calendar"></i>

                <h3 class="box-title">Calendar</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="#">Add new event</a></li>
                      <li><a href="#">Clear events</a></li>
                      <li class="divider"></li>
                      <li><a href="#">View calendar</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-black">
                <div class="row">
                  <div class="col-sm-6">
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.box -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view("manajer/_includes/footer.php") ?>
    <?php $this->load->view("manajer/_includes/control_sidebar.php") ?>
    <?php $this->load->view("manajer/_includes/bottom_script.php") ?>
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->


</body>

</html>