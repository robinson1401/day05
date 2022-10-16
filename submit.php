<?php
include 'upload.php';
session_start();
echo
"<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style2.css'>
    <title>Submit</title>
</head>

<body>
    <fieldset>
        <form>
            <table>
                <tr>
                    <td class='td'><label>Họ và tên</label></td>
                    <td><label>".$_SESSION["name"]."</label></td>
                </tr>
                <tr>
                    <td class='td'><label>Giới tính</label></td>
                    <td><label>" . $_SESSION["gender"] . "</label></td>
                </tr>
                <tr>
                    <td class='td'><label>Phân khoa</label></td>
                    <td><label>" . $_SESSION["department"] . "</label></td>
                </tr>
                <tr>
                    <td class='td'><label>Ngày sinh</label></td>
                    <td><label>" . $_SESSION["day"] . "</label></td>
                </tr>
                <tr>
                    <td class='td'><label>Địa chỉ</label></td>
                    <td><label>" . $_SESSION["address"] . "</label></td>
                </tr>
                <tr>
                    <td class='td'><label>Hình ảnh</label></td>
                    <td>
                    <img src='./upload/anh1_20221011122200.png'></td>
                </tr>
            </table>
        </form>
    </fieldset>

</body>";

?> 


