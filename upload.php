<?php 

  $target_dir    = "uploads/";
  $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
  $allowUpload   = true;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
  if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if($check !== false)
        {
            echo "Đây là file ảnh - " . $check["mime"] . ".";
            $allowUpload = true;
        }
        else
        {
            echo "Không phải file ảnh.";
            $allowUpload = false;
        }
    }

    if (!in_array($imageFileType,$allowtypes ))
    {
        echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
        $allowUpload = false;
    }


  if ($allowUpload)
  {

      if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
      {
          echo "File ". basename( $_FILES["fileupload"]["name"]).
          " Đã upload thành công.";

          echo "File lưu tại " . $target_file;

      }
      else
      {
          echo "Có lỗi xảy ra khi upload file.";
      }
  }
  else
  {
      echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
  }
?>