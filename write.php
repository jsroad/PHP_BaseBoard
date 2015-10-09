<html>
    <head>

    </head>
    <body>
        <table>
            <form action = "list.php" method="POST">
                <tr>
                    <td>아이디:</td>
                    <td><input type="text" name="user_id"></td>
                </tr>
                <tr>
                    <td>이름:</td>
                    <td><input type="text" name="user_name"></td>
                </tr>
                <tr>
                    <td>제목:</td>
                    <td><input type="text" name="subject"></td>
                </tr>
                <tr>
                    <td>내용:</td>
                    <td><textarea name="contents" name="user_id"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="등록">
                        <input type="hidden" name="mode" value="write">
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>