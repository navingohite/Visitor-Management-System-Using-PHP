<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['navingohite'] == 0)) {
    header('location:logout.php');
} else {

    if ($_GET['action'] = 'del') {
        $dele = intval($_GET['pid']);
        $query = mysqli_query($con, "delete from tblvisitor where ID='$dele'");
        if ($query) {
            $msg = "";
        } else {
            $error = "Something went wrong . Please try again.";
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
            <meta name="author" content="Coderthemes">

            <!-- App favicon -->
            <link rel="shortcut icon" href="assets/images/favicon.ico">
            <!-- App title -->
            <title>Visitor Management System</title>

            <!--Morris Chart CSS -->
            <link rel="stylesheet" href="../plugins/morris/morris.css">

            <!-- jvectormap -->
            <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

            <!-- App css -->
            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

            <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

            <script src="assets/js/modernizr.min.js"></script>

        </head>


        <body class="fixed-left">

            <!-- Begin page -->
            <div id="wrapper">

                <!-- Top Bar Start -->
                <?php include('includes/topheader.php'); ?>

                <!-- ========== Left Sidebar Start ========== -->
                <?php include('includes/leftsidebar.php'); ?>


                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <div class="container">


                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Manage Visitor </h4>
                                        <ol class="breadcrumb p-0 m-0">

                                            <li>
                                                <a href="#">Manage Visitor</a>
                                            </li>
                                            <li class="active">
                                                Manage Visitor
                                            </li>
                                        </ol>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Find</strong> Between Dates
                                        </div>
                                        <div class="card-body card-block">
                                            <form method="post" enctype="multipart/form-data" class="form-horizontal" name="bwdatesreport" action="bwdates-reports-details.php">


                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">From Date</label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <input type="date" id="fromdate" name="fromdate" value="" class="form-control" required="">

                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="email-input" class=" form-control-label">To Date</label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <input type="date" id="todate" name="todate" value="" class="form-control" required="">

                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Submit
                                                        </button></p>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card-box">


                                        <div class="table-responsive">
                                            <table class="table table-colored table-centered table-inverse m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($con, "select * from tblvisitor");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) {

                                                    ?>
                                                        <tr>
                                                            <td><b><?php echo ($row['FullName']); ?></b></td>
                                                            <td><?php echo ($row['Email']) ?></td>
                                                            <td><?php echo ($row['MobileNumber']) ?></td>
                                                            <td><a href="visitor-detail.php?editid=<?php echo $row['ID']; ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a> &nbsp;<a href="manage-visitor.php?pid=<?php echo $row['ID']; ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- container -->
                    </div> <!-- content -->
                    <?php include('includes/footer.php'); ?>
                </div>


            </div>
            <!-- END wrapper -->



            <script>
                var resizefunc = [];
            </script>

            <!-- jQuery  -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/waves.js"></script>
            <script src="assets/js/jquery.slimscroll.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>
            <script src="../plugins/switchery/switchery.min.js"></script>

            <!-- CounterUp  -->
            <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
            <script src="../plugins/counterup/jquery.counterup.min.js"></script>

            <!--Morris Chart-->
            <script src="../plugins/morris/morris.min.js"></script>
            <script src="../plugins/raphael/raphael-min.js"></script>

            <!-- Load page level scripts-->
            <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
            <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="../plugins/jvectormap/gdp-data.js"></script>
            <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


            <!-- Dashboard Init js -->
            <script src="assets/pages/jquery.blog-dashboard.js"></script>

            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

        </body>

        </html>
<?php }
} ?>