<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015-10-08
 * Time: 오후 8:02
 */
include 'db_CN.php';

    $connect_id=MYSQL_CN();
    $board_id=isset($_POST['mode'])? $_POST['mode'] : false;
    $sql = "select * from ycj_first_board where board_id='{$board_id}'";
    $rsc=mysql_fetch_row(mysql_query($sql,$connect_id));
?>

<html>
    <head>

    </head>
    <body>
        <table border="1">
            <form action="list.php" method="post">
                <tr>
                    <td>아이디</td>
                    <td><input type="text" name="user_id" value="<?php echo"$rsc[2]";?>"</td>
                </tr>
                <tr>
                    <td>닉네임</td>
                    <td><input type="text" name="user_id" value="<?php echo"$rsc[3]";?>"</td>
                </tr>
                <tr>
                    <td>제목</td>
                    <td><input type="text" name="user_id" value="<?php echo"$rsc[4]";?>"</td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td><input type="text" name="user_id" value="<?php echo"$rsc[5]";?>"</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="수정">
                        <input type="hidden" name="mode" value="modify">
                        <input type="hidden" name="board_id" value="<?php echo"$board_id";?>">
                    </td>
                    <td><input type="text" name="user_id" value="<?php echo"$rsc[2]";?>"</td>
                </tr>
            </form>
        </table>
    </body>
</html>
