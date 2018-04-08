<?php
    include("config.php"); 
    $sql = "SELECT * FROM tweet1";
    $resultcat = mysqli_query($conn, $sql );
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
		<title>TWEET 1</title>
            <link href="../admin/sidebar.css" rel="stylesheet" type="text/css">

        <style>
            .txtarea
            {
                width: 70%;
                height: 20vh;
            }
    
            .main-admin-heading
            {
                margin-left: 1vh
            }
            
            .go-back
            {
                padding-top: 2em;
                
            }
        </style>
	</head>
	<body>
        <script>
            var category_index;
        </script> 
        <div class="row">
    <div class="col-md-2">
        <div class="sidenav">
    <center>
    <h1 class="sidebar_header"> ADMIN PANEL
    </h1></center><div class="white"></div>
  <a href="../admin/tweet2">Tweet 1</a>
  <a href="../admin/tweet1">Tweet 2</a>
</div>
</div>
    <div class="col-md-10">
        <div class="main">

        <div class="row">
            <div class="col-md-11">
                <h1 class="main-admin-heading">TWEETS</h1>
            
            </div>
            </div>
            
        <div class="row">
            <div class="col-md-12">
                <?php 
                $rowtest['id'];
                $edit_id = $_POST['id'];
                if(isset($_POST['edit']))
                {
                    $sqlblog = "SELECT * FROM `cec-blog` where id='$edit_id'"; 
                    $resultblog = mysqli_query($conn, $sqlblog );
                    $rowblog = mysqli_fetch_assoc($resultblog);
                }
                
                ?>
                <form method="POST" action="" enctype="multipart/form-data" data-toggle="validator" role="form" id="fileForm">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="" class="control-label">Tweet URL</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  name="title" placeholder="Enter Your Title" required value="<?php echo $row['url'];?>">
                            </div>
                        </div>
                    <input id="blogSubmit" name="edit_submit" type="submit" class="btn btn-primary submit_data" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        
        
        <?php          
            $url = $_POST['url'];
            
                if($_POST['edit_submit'] == 'Submit')
                {
                    print $sql = "INSERT INTO `tweet1` (url) VALUES ('$url')";
                    if (mysqli_query($conn,$sql) === TRUE) 
                    {
                     $sql = "INSERT INTO `tweet1` (url) VALUES ('$url')";
                    }
                    else {echo "Error1: ";}
                }
                
              
        ?>
        </div>
            </div></div>
    </body>
</html>
