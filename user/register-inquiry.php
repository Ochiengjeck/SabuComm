
<?php
session_start();
include('include/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$category=$_POST['category'];
$subcat=$_POST['subcategory'];
$inquiryype=$_POST['inquiryype'];
$noc=$_POST['noc'];
$inquirydetials=$_POST['complaindetails'];

$query=mysqli_query($con,"insert into tblinquiries(userId,category,subcategory,inquiryType,noc,inquiryDetails) values('$uid','$category','$subcat','$inquiryype','$noc','$inquirydetials')");
// code for show inquiry number
$sql=mysqli_query($con,"select inquiryNumber from tblinquiries  order by inquiryNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['inquiryNumber'];
}
$complainno=$cmpn;
echo '<script> alert("Your complain has been successfully filled and your inquiryno is  "+"'.$complainno.'")</script>';
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS||Register Inquiry</title>
   

    <!-- vendor css -->
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    
   <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
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
                            <h5 class="m-b-10">Register Inquiry</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="register-inquiry.php">Register Inquiry</a></li>
                            
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
                    <div class="card-header">
                        <h5>Register Inquiry</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                            	
                                    <br />
                                <form method="post" name="inquiry" enctype="multipart/form-data">
                                	
                                  
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
<option value="">Select Category</option>
<?php $sql=mysqli_query($con,"select id,categoryName from category ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
<?php
}
?>
</select>
                                        
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Sub Category</label>
                                        <select name="subcategory" id="subcategory" class="form-control" >
<option value="">Select Subcategory</option>
</select>
                                        
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Inquiry Type</label>
                                        <select name="inquiryype" class="form-control" required="">
                <option value=" inquiry"> inquiry</option>
                  <option value="General Query">General Query</option>
                </select> 
                                        
                                    </div>
                                     
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Nature of Inquiry</label>
                                       <input type="text" name="noc" required="required" value="" required="" class="form-control">
                                        
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Inquiry Details (max 2000 words)</label>
                                        <textarea  name="complaindetails" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                                        
                                    </div>
                                     
                                  
                                    <button type="submit" class="btn  btn-primary" name="submit">Submit</button>
                                </form>
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




</body>

</html>
<?php  ?>