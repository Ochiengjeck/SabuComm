<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['id'])==0)
{
    header('location:index.php');
}
else{
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS || FAQs</title>
    <!-- vendor css -->
    <link rel="stylesheet" href="../admin/assets/css/style.css">
</head>
<body class="">
    <?php include('include/sidebar.php');?>
    <!-- [ Header ] start -->
    <?php include('include/header.php');?>
    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Frequently Asked Questions</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ form-element ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Frequently Asked Questions (FAQs)</h5>
                            <hr>
                            <?php
                            $query=mysqli_query($con,"
                                SELECT tblinquiries.inquiryDetails, inquiryremark.remark, inquiryremark.status, inquiryremark.remarkDate 
                                FROM tblinquiries 
                                JOIN inquiryremark ON tblinquiries.inquiryNumber=inquiryremark.inquiryNumber
                            ");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                            <div class="faq-item">
                                <!-- <h6 ><?php echo htmlentities($row['inquiryDetails']);?></h6> -->
                                <h6 style="font-weight: bold;"><?php echo htmlentities($row['inquiryDetails']);?></h6>

                                <p><?php echo htmlentities($row['remark']);?></p>
                                <!-- <small class="text-muted">Status: <?php echo htmlentities($row['status']);?> | Remark Date: <?php echo htmlentities($row['remarkDate']);?></small> -->
                                <br>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- [ form-element ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
    <!-- Required Js -->
    <script src="../admin/assets/js/vendor-all.min.js"></script>
    <script src="../admin/assets/js/plugins/bootstrap.min.js"></script>
    <script src="../admin/assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>
