<?php
include 'upload.php';
$gioitinh = array(0 => 'Nam', 1 => 'Nữ');
$khoa = array("" => "", "MAT" => "Khoa học máy tính", "KDL" => "Khoa học vật liệu");
$msg = array();
$msg["name"] = "<label class='empty'></label><br>";
$msg["gender"] = "<label class='empty'></label><br>";
$msg["day"] = "<label class='empty'></label><br>";
$msg["department"] = "<label class='empty'></label><br>";

if (isset($_POST['submit'])) {
    session_start();
    $_SESSION["name"] = "";
    $_SESSION["gender"] = "";
    $_SESSION["day"] = "";
    $_SESSION["address"] = "";
    $_SESSION["department"] = $khoa[$_POST["department"]];


    if (empty($_POST["name"]))
        $msg["name"] = "<label class='error'>Hãy nhập tên.</label><br>";
    else
        $_SESSION["name"] = $_POST["name"];

    if (empty($_POST["gender"]))
        $msg["gender"] = "<label class='error'>Hãy chọn giới tính.</label><br>";
    else
        $_SESSION["gender"] =  $_POST["gender"];
    
    if (empty($_POST["day"]))
        $msg["day"] = "<label class='error'>Hãy nhập ngày sinh.</label><br>";
    else
        $_SESSION["day"] = $_POST["day"];

    if (!empty($_POST["address"]))
        $_SESSION["address"] = $_POST["address"];
        
    if ($_SESSION["department"] === "")
        $msg["department"] = "<label class='error'>Hãy chọn phân khoa.</label><br>";
    else if ($_SESSION["name"] != "" && $_SESSION["gender"] != "" && $_SESSION["day"] != "")
        header('Location: submit.php');
}

echo
"<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style1.css'>
    <title>Register</title>
    <link rel='stylesheet'
	    href='http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' />
    <script src='http://code.jquery.com/jquery-3.6.0.js'></script>
    <script src='http://code.jquery.com/ui/1.13.2/jquery-ui.js'></script>
    <script>
        $( function() {
            $( '#datepicker' ).datepicker();
        } );
    </script>
</head>

<body>
    
    <fieldset>
        <form method='post' action='register.php' enctype='multipart/form-data'>";
        echo $msg["name"];
        echo $msg["gender"];
        echo $msg["department"];
        echo $msg["day"];
        echo "
            <table>
                <tr>
                    <td class='td'><label>Họ và tên <span>*</span></label></td>
                    <td><input type='text' id='input' class='blue-box' name='name' value='";
                    echo isset($_POST['name']) ? $_POST['name'] : '';
                    echo "'></td>
                </tr>
                <tr>
                    <td class='td'><label>Giới tính <span>*</span></label></td>
                    <td>";
                        for ($i = 0; $i < count($gioitinh); $i++) {
                            echo
                                "<input type='radio' name='gender' class='gender' value='" . $gioitinh[$i] . "'";
                            echo (isset($_POST['gender']) && $_POST['gender'] == $gioitinh[$i]) ? " checked " : "";
                            echo "/>" . $gioitinh[$i];
                        }
                        echo
                    "</td>
                </tr>
                <tr>
                    <td class='td'><label>Phân khoa <span>*</span></label></td>
                    <td><select class='blue-box' name='department'>";
                        foreach ($khoa as $key => $value) {
                            echo "
                            <option";
                            echo (isset($_POST['department']) && $_POST['department'] == $key) ? " selected " : "";
                            echo " value='" . $key . "'>" . $value . "</option>";
                        }
                        echo "
                        </select></td>
                </tr>
                <tr>
                    <td class='td'><label>Ngày sinh <span>*</span></label></td>
                    <td><input type='text' id='datepicker' class='blue-box' name='day' placeholder='dd/mm/yyy' value='";
                    echo isset($_POST['day']) ? $_POST['day'] : '';
                    echo "'></td>
                </tr>
                <tr>
                    <td class='td'><label>Địa chỉ</label></td>
                    <td><input type='text' class='blue-box' name='address' value='";
                    echo isset($_POST['address']) ? $_POST['address'] : '';
                    echo "'></td>
                </tr>
                <tr>
                    <td class='td'><label>Hình ảnh</label></td>
                    <td><input type='file' name='fileupload' id='fileupload'></td>
                </td>
            </table>
            <button name='submit' type='submit'>Đăng ký</button>
        </form>
    </fieldset>

</body>";

?>


