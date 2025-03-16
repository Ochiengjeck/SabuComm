
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['id'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS|| Inquiry Details</title>
   

    <!-- vendor css -->
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    
 <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>   

</head>
<body class="">
	<?php include('include/sidebar.php');?>
	<!-- [ navigation menu ] end -->
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
                            <h5 class="m-b-10">Inquiry Details</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="inquiry-history.php">Inquiry Details</a></li>
                            
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
                        <h5>View Inquiry Details</h5>
                        <hr>
                       
                      <div class="row">
                            <div class="col-xl-12">
                <div class="card">
                   
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                      
                                </thead>
                                <tbody>
                                   <?php $cid=$_GET['cid'];
                                   $st='processed';
$query=mysqli_query($con,"select tblinquiries.*,users.fullName as name,category.categoryName as catname from tblinquiries join users on users.id=tblinquiries.userId join category on category.id=tblinquiries.category where tblinquiries.inquiryNumber='$cid'");
while($row=mysqli_fetch_array($query))
{

?>                                  
                                        <tr>
                                            <td><b>Inquiry Number</b></td>
                                            <td><?php echo htmlentities($row['inquiryNumber']);?></td>
                                            <td><b>Inquiry Name</b></td>
                                            <td> <?php echo htmlentities($row['name']);?></td>
                                            <td><b>Reg Date</b></td>
                                            <td><?php echo htmlentities($row['regDate']);?>
                                            </td>
                                        </tr>

<tr>
                                            <td><b>Category </b></td>
                                            <td><?php echo htmlentities($row['catname']);?></td>
                                            <td><b>SubCategory</b></td>
                                            <td> <?php echo htmlentities($row['subcategory']);?></td>
                                            <td><b>Inquiry Type</b></td>
                                            <td><?php echo htmlentities($row['inquiryType']);?>
                                            </td>
                                        </tr>
<!-- <tr>
                                            <td><b>State </b></td>
                                            <td><?php echo htmlentities($row['state']);?></td>
                                            <td ><b>Nature of Inquiry</b></td>
                                            <td colspan="3"> <?php echo htmlentities($row['noc']);?></td>
                                            
                                        </tr>
<tr> -->
                                            <td><b>Inquiry Details </b></td>
                                            
                                            <td colspan="5"> <?php echo htmlentities($row['inquiryDetails']);?></td>
                                            
                                        </tr>

                                            </tr>
<tr>
                                            <td><b>File(if any) </b></td>
                                            
                                            <td colspan="5"> <?php $cfile=$row['inquiryFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
<a href="../user/inquirydocs/<?php echo htmlentities($row['inquiryFile']);?>" target="_blank"/> View File</a>
<?php } ?></td>
</tr>

<tr>
<td><b>Final Status</b></td>
                                            
                                            <td colspan="5"> <?php $status=$row['status'];
                                                if($status==''): ?>
                                                <span class="badge badge-danger">Not Processed Yet</span>
                                            <?php elseif($status=='in process'):?>
                                             <span class="badge badge-warning">In Process</span>
                                         <?php elseif($status=='processed'):?>
                                             <span class="badge badge-success">processed</span>
                                         <?php endif;?></td>
                                            
                                        </tr>

 <hr>

<!---- inquiry History--->

<?php $ret=mysqli_query($con,"select inquiryremark.remark as remark,inquiryremark.status as sstatus,inquiryremark.remarkDate as rdate from inquiryremark join tblinquiries on tblinquiries.inquiryNumber=inquiryremark.inquiryNumber where inquiryremark.inquiryNumber='$cid'");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count):
 ?>


<tr>
                                            <th colspan="4">Remark</th>
                                            <th>Status</th>
                                         <th>Updation Date</th></tr>
<?php while($rw=mysqli_fetch_array($ret))
{
?>
                                         <tr>
                                       
                                            <td colspan="4"><?php echo  htmlentities($rw['remark']); ?></td>
                                            <td><?php echo  htmlentities($rw['sstatus']); ?></td>
                                            <td><?php echo  htmlentities($rw['rdate']); ?></td></tr><?php $cnt=$cnt+1; } ?>




                                        <?php endif; } ?>
                                   
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