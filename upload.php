<?php 

if(isset($_POST['submit'])){
    $file_name = $_FILES['fileupload']['name'];
    $file_type = $_FILES['fileupload']['type'];
    $file_size = $_FILES['fileupload']['size'];
    $file_tmpname = $_FILES['fileupload']['tmp_name'];
    
    $file_store = 'upload/' .$file_name;
    move_uploaded_file($file_tmpname, $file_store);  
}

?>