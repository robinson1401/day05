<?php
$gioitinh = array(0 => 'Nam', 1 => 'Nữ');
$khoa = array("" => "", "MAT" => "Khoa học máy tính", "KDL" => "Khoa học vật liệu");
$msg = array();
$msg["name"] = "<label class='empty'></label><br>";
$msg["gender"] = "<label class='empty'></label><br>";
$msg["department"] = "<label class='empty'></label><br>";
if (isset($_POST['submit'])) {
    session_start();
    $_SESSION["name"] = "";
    $_SESSION["gender"] = "";
    $_SESSION["department"] = $khoa[$_POST["department"]];
    $_SESSION["age"] = -1;


    if (empty($_POST["name"]))
        $msg["name"] = "<label class='error'>Hãy nhập tên.</label><br>";
    else
        $_SESSION["name"] = $_POST["name"];

    if (empty($_POST["gender"]))
        $msg["gender"] = "<label class='error'>Hãy chọn giới tính.</label><br>";
    else
        $_SESSION["gender"] =  $_POST["gender"];
    
    if (!empty($_POST["year"]) && $_POST["year"] <= date("Y"))
        $_SESSION["age"] = date("Y") - $_POST["year"];

    if ($_SESSION["department"] === "")
        $msg["department"] = "<label class='error'>Hãy chọn phân khoa.</label>";
    else if ($_SESSION["name"] != "" && $_SESSION["gender"] != "" && $_SESSION["age"] != -1)
        header('Location: do_regist.php');
}

echo
"<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='registStyle.css'>
    <title>regist</title>
</head>

<body>
    <fieldset>
        <form method='post' action='regist.php'>";
echo $msg["name"];
echo $msg["gender"];
echo $msg["department"];
echo "
            <table>
                <tr>
                    <td class='td'><label>Họ và tên</label></td>
                    <td><input type='text' id='input' class='blue-box' name='name' value='";
                    echo isset($_POST['name']) ? $_POST['name'] : '';
                    echo "'></td>
                </tr>
                <tr>
                    <td class='td'><label>Giới tính</label></td>
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
                    <td class='td'><label>Phân khoa</label></td>
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
                    <td class='td'><label>Năm sinh</label></td>
                    <td><input type='text' class='blue-box' name='year' value='";
                    echo isset($_POST['year']) ? $_POST['year'] : '';
                    echo "'></td>
                </tr>
            </table>
            <button name='submit' type='submit'>Đăng ký</button>
        </form>
    </fieldset>

</body>";
