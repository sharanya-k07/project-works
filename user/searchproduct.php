<?php
session_start();
if(isset($_POST['search']))
{
	$name=$_POST['name'];
	$_SESSION['searchname']=$name;
}
?>
<!doctype html>
<html class="no-js" lang="en">

<!--   03:20:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User-Petcareproduct</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
<?php include("header.php"); ?>
    
    <!--Tranding product-->
    <section class="pt-60 pb-30 " style="background-color:#fafafa;">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2 style="font-family:georgia;font-size:30px;color:green;">SEARCH RESULT</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
				<?php
								include 'config.php';
								$sql1 = "select * from products where name='".$_SESSION['searchname']."'";
								$result1 = mysqli_query($con,$sql1);
								$num1=mysqlI_num_rows($result1);
								$sl=0;
								if($num1 > 0)
								{ 
								while($row1 = mysqli_fetch_array($result1))
								{ 
								$sl+=1;
								$id=$row1[0];
								$name=$row1['name'];
								$pprice=$row1['pprice'];
								$image=$row1['image'];
								?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding">
                        
                            <div class="tranding-pro-img">
                                <img src="../petshop/image/<?php echo $image; ?>" alt="<?php echo $image; ?>" style="height:500px; width:500px;" >
                            </div>
                            <div class="tranding-pro-title">
                                <h3 style="font-family:georgia;"><?php echo $name; ?></h3>
								<p style="font-family:times;">Rs. <?php echo $pprice; ?></p>
                                <form action="" method="post">
								<input type="text" name="id[]" value="<?php echo $id; ?>" hidden="true">
                                <input type="submit" value="View Details" name="view" style="background-color:#0d1745;font-family:times;border:none;border-radius:3px;padding:10px;color:white;height: 42px;width: 200px;text-align: center;"/>
								</form>
                            </div>
							
							<?php
								if(isset($_POST['view']))
								{
									foreach ($_POST['id'] as $key => $value) 
									{	
										$id=$value;	
									}
									$_SESSION['item']=$id;
									echo "<script> location.href='singleproductdetails.php'; </script>";
								}
								?>
								</tr>
							
                          
                    </div>
                </div>
				<?php
				}
				}
				else
				{
				?>
				<h2 style="font-family:georgia;font-size:30px;color:#458c8b;">No results found</h2>
				<?php 
				}?>
               
				
            </div>
        </div>
    </section><!--Tranding product-->

    <?php include("footer.php"); ?>
<!-- JS
============================================ -->



<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>



</body>

<!--   03:22:07 GMT -->
</html>