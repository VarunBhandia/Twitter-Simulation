<?php
    include("config.php"); 
    $sql = "SELECT * FROM tweet2";
    $result = mysqli_query($conn, $sql );
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE HTML>
<html>
	<head>
<!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
-->
        <title>TWEET 1</title>
        <link href="../admin/sidebar.css" rel="stylesheet" type="text/css">
        <style>
    
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
        <div class="row">
<!--
            <div class="col-md-3">
        <div class="sidenav">
    <center>
    <h1 class="sidebar_header"> ADMIN PANEL
    </h1></center><div class="white"></div>
  <a href="../admin/tweet2">Tweet 1</a>
  <a href="../admin/tweet2">Tweet 2</a>
</div>
</div>        
-->
            <div class="col-md-8">
        <div class="main">

        <div class="row">
            <div class="col-md-11">
                <h1 class="main-admin-heading">TWEETS</h1>
            
            </div>
            </div>
            
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="" enctype="multipart/form-data" data-toggle="validator" role="form" id="fileForm">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="" class="control-label">Tweet URL</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  name="url" placeholder="Enter Tweet url" required value="<?php echo $row['url']; ?>">
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
                    print $sql = "INSERT INTO `tweet2` (urls) VALUES ('$url')";
                    if (mysqli_query($conn,$sql) === TRUE) 
                    {
                     $sql = "INSERT INTO `tweet2` (url) VALUES ('$url')";
                    }
                    else {echo "Error1: ";}
                }
                
              
        ?>
        </div>
            </div>
        </div>
    </body>
</html>
