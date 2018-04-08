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
		<title>Admin-Blog-Writing</title>
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
                <h1 class="main-admin-heading">Admin Blog</h1>
            
            </div>
            
            
            <div class="col-md-1">
                <div class="go-back">
                    <a href="http://localhost/cec-Website/admin/index.php" class="btn btn-info">Back</a>
                </div>
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
                                <label for="" class="control-label">Topic Title</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  name="title" placeholder="Enter Your Title" required value="<?php echo $rowblog['Topic'];?>">
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="" class="">Please Select An Image For Your Topic Featured Image. </label>
                            </div>
                            <div class="col-md-4">
                                <input type="file" class=""  name="image" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="" class="">Please Select An Category For Your Topic. </label>
                            </div>
                            <div class="col-md-4">
                                <select name="department">
                                    <option value="structure">Structure</option>
                                    <option value="geomatics">Geomatics</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Description" class="control-label">Description/ Content</label>
                        <div class="col-lg-12 nopadding">
                            <textarea id="txtEditor" name="texteditor22">
                                <?php echo $rowblog['Texteditor']; ?><?php if($_POST['action'] == 'edit'){echo $post_content;}?>
                            </textarea>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Please Enter Your Topic Descriptions. </small>
                    </div>
                   <?php
                    if(isset($_POST['edit']))
                    {?>
                       <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                       <input id="blogSubmit" name="edit_submit" type="submit" class="btn btn-primary submit_data" value="Update">
                    <?php
                    }else{
                    ?>
                    <input id="blogSubmit" name="edit_submit" type="submit" class="btn btn-primary submit_data" value="Submit">
                    <input id="blogSave" name="edit_submit" type="submit" class="btn btn-primary submit_data" value="Save">
                    <?php }?>
                    </div>
                </form>
            </div>
        </div>
        
        
        <?php
            $image_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = '../img/blog/';
            move_uploaded_file($tmp_name,$location.$image_name);
                    
        if(isset($_POST['edit_submit']))
        {                      
            $Topic = $_POST['title'];
            $Texteditor = htmlspecialchars($_POST['texteditor22']);
            $imagename = $image_name;
            $category = $_POST['department'];
            $edit_id = $_POST['edit_id'];
            $sqlcond = "SELECT * FROM `cec-blog` where Category = '$Category'";
            $resultcond = mysqli_query($conn, $sqlcond);
            $rowcond = mysqli_fetch_assoc($resultcond);
            
            if($_POST['edit_submit'] == 'Update')
            {
                $status = 1;
                $sql = "update cec-blog set Topic = '$Topic', Texteditor = '$Texteditor', imagename = '$imagename', status = '$status', modified_time=now() where id = '$edit_id' ";
                $message = "Successfully Update !! ";
            }
            else
            {
                if($_POST['edit_submit'] == 'Submit')
                {
                    $status = 1;
                    print $sql = "INSERT INTO `cec-blog` (Topic,Texteditor,imagename,status, modified_time) VALUES ('$Topic','$Texteditor','$imagename','$status', NOW())";
                    if (mysqli_query($conn,$sql) === TRUE) 
                    {
                        print $sql = "INSERT INTO `cec-blog` (Topic,Texteditor,imagename,status, modified_time,Category) VALUES ('$Topic','$Texteditor','$imagename','$status', NOW(),'$category')";
                        $message = "New record created successfully ";
                        echo $message; 
                        echo $status;
                        $url_re =  "http://localhost/cec-Website/admin/index.php";
                        echo "<script>location.href = '".$url_re."'</script>";
                    }
                    else {echo "Error1: ";}
                }
                
                elseif($_POST['edit_submit'] == 'Save')
                {
                    $status = 2;
                    print $sql = "INSERT INTO `cec-blog` (Topic,Texteditor,imagename,status, modified_time) VALUES ('$Topic','$Texteditor','$imagename','$status', NOW())";
                    if (mysqli_query($conn,$sql) === TRUE) 
                    {
                        print $sql = "INSERT INTO `cec-blog` (Topic,Texteditor,imagename,status, modified_time,Category) VALUES ('$Topic','$Texteditor','$imagename','$status', NOW(),'$category')";
                        $message = "New record created successfully ";
                        echo $message; 
                        echo $status;
                        $url_re =  "http://localhost/cec-Website/admin/index.php";
                        echo "<script>location.href = '".$url_re."'</script>";
                    }
                    else {echo "Error1: ";}                } 
            }
        }      
        ?>
        </div>
            </div></div>
    </body>
</html>
