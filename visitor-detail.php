<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['navingohite'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $eid = $_GET['editid'];

        $remark = $_POST['remark'];
        $query = mysqli_query($con, "update tblvisitor set remark='$remark' where  ID='$eid'");


        if ($query) {
            $msg = "Visitors Remark has been Updated.";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }
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

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
        <script>
            function getSubCat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcategory.php",
                    data: 'catid=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }
        </script>
    </head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->



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
                                    <h4 class="page-title">Visitor Detail </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Good Job!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Opps!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="card-body card-block">

                    
                                    <?php
                                    $eid = $_GET['editid'];
                                    $ret = mysqli_query($con, "select * from  tblvisitor where ID='$eid'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {

                                    ?><table border="1" class="table table-bordered mg-b-0">
                                            <tr>
                                                <th>Full Name</th>
                                                <td><?php echo $row['FullName']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $row['Email']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Mobile Number</th>
                                                <td><?php echo $row['MobileNumber']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td><?php echo $row['Address']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Whom to Meet</th>
                                                <td><?php echo $row['WhomtoMeet']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Deptartment</th>
                                                <td><?php echo $row['Deptartment']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Reason to Meet</th>
                                                <td><?php echo $row['ReasontoMeet']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Vistor Entring Time</th>
                                                <td><?php echo $row['EnterDate']; ?></td>
                                            </tr>


                                            <?php if ($row['remark'] == "") { ?>
                                                <form method="post">
                                                    <tr>
                                                        <th>Outing Remark :</th>
                                                        <td>
                                                            <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button></td>
                                                    </tr>
                                                </form>
                                            <?php } else { ?>

                                                <tr>
                                                    <th>Outing Remark </th>
                                                    <td><?php echo $row['remark']; ?></td>
                                                </tr>


                                                <tr>
                                                    <th>Out Time</th>
                                                    <td><?php echo $row['outtime']; ?> </td>
                                                <?php } ?>
                                                </tr>
                                        </table>
                                </div <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


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

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            jQuery(document).ready(function() {

                $('.summernote').summernote({
                    height: 240, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
        <script src="../plugins/switchery/switchery.min.js"></script>
    </body>

    </html>
<?php }
                                } ?>