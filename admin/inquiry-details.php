<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid'])==0)
{   
    header('location:index.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS || Inquiry Details</title>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;
        function popUpWindow(URLStr, left, top, width, height) {
            if(popUpWin) {
                if(!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+',top='+top+',screenX='+left+',screenY='+top+'');
        }
    </script>
</head>
<body class="">
    <?php include('include/sidebar.php');?>
    <?php include('include/header.php');?>
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Inquiries Details</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="all-inquiry.php">Inquiries Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>View Inquiries Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <?php 
                                                        $cid = $_GET['cid'];
                                                        $query = mysqli_query($con, "SELECT tblinquiries.*, users.fullName AS name, category.categoryName AS catname FROM tblinquiries JOIN users ON users.id = tblinquiries.userId JOIN category ON category.id = tblinquiries.category WHERE tblinquiries.inquiryNumber='$cid'");
                                                        while($row = mysqli_fetch_array($query)) { 
                                                        ?>
                                                        <tr>
                                                            <td><b>Inquiry Number</b></td>
                                                            <td><?php echo htmlentities($row['inquiryNumber']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Student Name</b></td>
                                                            <td><?php echo htmlentities($row['name']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Reg Date</b></td>
                                                            <td><?php echo htmlentities($row['regDate']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Category</b></td>
                                                            <td><?php echo htmlentities($row['catname']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>SubCategory</b></td>
                                                            <td><?php echo htmlentities($row['subcategory']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Inquiry Type</b></td>
                                                            <td><?php echo htmlentities($row['inquiryType']);?></td>
                                                        </tr>
                                                      
                                                        <tr>
                                                            <td><b>Nature of Inquiry</b></td>
                                                            <td><?php echo htmlentities($row['noc']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Inquiry Details</b></td>
                                                            <td><?php echo htmlentities($row['inquiryDetails']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>File (if any)</b></td>
                                                            <td>
                                                                <?php 
                                                                $cfile = $row['inquiryFile'];
                                                                if($cfile == "" || $cfile == "NULL") {
                                                                    echo "File NA";
                                                                } else { ?>
                                                                    <a href="../users/inquirydocs/<?php echo htmlentities($row['inquiryFile']);?>" target="_blank">View File</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Final Status</b></td>
                                                            <td>
                                                                <?php 
                                                                $status = $row['status'];
                                                                if($status == '') { ?>
                                                                    <span class="badge badge-danger">Not Processed Yet</span>
                                                                <?php } elseif($status == 'in process') { ?>
                                                                    <span class="badge badge-warning">In Process</span>
                                                                <?php } elseif($status == 'processed') { ?>
                                                                    <span class="badge badge-success">Processed</span>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                        $ret = mysqli_query($con, "SELECT inquiryremark.remark AS remark, inquiryremark.status AS sstatus, inquiryremark.remarkDate AS rdate FROM inquiryremark JOIN tblinquiries ON tblinquiries.inquiryNumber = inquiryremark.inquiryNumber WHERE inquiryremark.inquiryNumber = '$cid'");
                                                        $cnt = 1;
                                                        $count = mysqli_num_rows($ret);
                                                        if($count) { ?>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Remark</th>
                                                                <th>Status</th>
                                                                <th>Updation Date</th>
                                                            </tr>
                                                            <?php 
                                                            while($rw = mysqli_fetch_array($ret)) { ?>
                                                                <tr>
                                                                    <td><?php echo htmlentities($cnt);?></td>
                                                                    <td><?php echo htmlentities($rw['remark']);?></td>
                                                                    <td><?php echo htmlentities($rw['sstatus']);?></td>
                                                                    <td><?php echo htmlentities($rw['rdate']);?></td>
                                                                </tr>
                                                            <?php $cnt = $cnt + 1; } 
                                                        } ?>
                                                        <tr>
                                                            <td colspan="2">
                                                                <?php if($row['status'] != "processed") { ?>
                                                                    <a href="javascript:void(0);" onClick="popUpWindow('updateinquiry.php?cid=<?php echo htmlentities($row['inquiryNumber']);?>');" title="Update order">
                                                                        <button type="button" class="btn btn-primary">Take Action</button>
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');" title="View User Details">
                                                                    <button type="button" class="btn btn-primary">View User Details</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
</body>
</html>
<?php } ?>
