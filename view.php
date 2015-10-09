<?php
include 'db_CN.php';
    $rscID=MYSQL_CN();

    $board_id=isset($_GET['board_id']) ? $_GET['board_id'] : "false";

    $sql="select * from ycj_first_board where board_id={$board_id}";

    $rsc=mysql_fetch_row(mysql_query($sql,$rscID));


?>
    <html>
    <head>
    </head>
    <body>
        <table border='1'>
            <tr>
                <td>아이디:</td>
                <td><?php echo "$rsc[2]"; ?></td>
                <td>이름:</td>
                <td><?php echo "$rsc[3]"; ?></td>
            </tr>
            <tr>
                <td>제목</td>
                <td colspan='3'><?php echo "$rsc[4]"; ?></td>
            </tr>
            <tr>
                <td colspan='4'>내용</td>
            </tr>
            <tr>
                <td colspan='4'><?php echo "$rsc[5]"; ?></td>
            </tr>
            <tr>
                <td colspan='4'>
                    <form action="modify.php" method="POST">
                        <input type="submit" value="수정">
                        <input type="hidden" name="mode" value="<?php echo($board_id);?>">
                    </form>
                    <form action="list.php" method="POST">
                        <input type="submit" value="삭제">
                        <input type="hidden" name="mode" value="delete">
                        <input type="hidden" name="board_id" value="<?php echo"$board_id"; ?>">
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>