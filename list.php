<?php
/*
2  * 프로그램명 : 기초php 게시판 만들기 페이지네이션
3  * 학교 : 영진전문대 컴퓨터정보계열 1201061 '김용범(キムヨンボム)'
4  * 만든이 : 김용범
5  * 2015.10.09
6  * www.superb_lr.blog.me
7  */

include 'db_CN.php';
    $user_id=isset($_POST['user_id'])? $_POST['user_id'] : false;
    $user_name=isset($_POST['user_name'])? $_POST['user_name'] : false;
    $subject=isset($_POST['subject'])? $_POST['subject'] : false;
    $contents=isset($_POST['contents'])? $_POST['contents'] : false;
    $mode=isset($_POST['mode'])? $_POST['mode'] : false;

    if($mode=="write"){
        $rscID = MYSQL_CN();
        $date = date("y-m-d h:i:s");
        $query="INSERT INTO ycj_first_board(user_id,user_name,subject,contents,reg_date) VALUES ";
        $query.= "('{$user_id}', '{$user_name}', '{$subject}', '{$contents}', '{$date}') ";

        mysql_query($query,$rscID);
        mysql_close($rscID);
    }

    else if($mode=="modify"){
        $rscID = MYSQL_CN();
        $query="update ycj_first_board set user_id='{$_POST['user_id']}',user_name='{$_POST['user_name']}',subject='{$_POST['subject']}',contents='{$_POST['contents']}' where board_id='{$_POST['board_id']}'";
        mysql_query($query, $rscID);
        mysql_close($rscID);
    }

    else if($mode=="delete"){
        $rscID = MYSQL_CN();
        $query = "delete from ycj_first_board where board_id={$_POST['board_id']}";
        mysql_query($query, $rscID);
        mysql_close($rscID);
    }

    function table_make()
    {
        $getValue['page'] = isset($_GET['page']) ? $_GET['page'] : 1;

        $sql="select * from ycj_first_board";

        //myDB.php의 MYSQL_CN()메소드를 불러온다.
        $rscID = MYSQL_CN();

        //위의 sql을 쿼리실행
        $rsc = mysql_query($sql, $rscID);

//        if($pageall=mysql_num_rows($rsc)){
//
//            echo "쿼리성공";
//            echo (mysql_error($rscID));
//        }
        $pagelimit=5;
        $page_num=ceil(mysql_num_rows($rsc)/$pagelimit);

        $start=($getValue['page']-1)*5;
        //페이지의 레코드를 배열로
        $sql="select * from ycj_first_board order by board_id desc limit {$start}, {$pagelimit}";
        //전체 테이블 출력 sql실행
        $rsc = mysql_query($sql, $rscID);

            while ($result = mysql_fetch_row($rsc)) {
                echo "<tr>";
                echo "<td>{$result[0]}</td>"; //글번호
                echo "<td><a href='view.php?board_id={$result[0]}'>{$result[3]}</td>"; //작성자
                echo "<td>{$result[4]}</td>"; //제목
                echo "<td>{$result[6]}</td>"; //조회수
                echo "<td>{$result[7]}</td>"; //작성일
                echo "</tr>";
            }

        echo "<tr><td colspan='5'>";


        //테스트
        //   if($)
        //테스트끝


        for($i=1;$i<=$page_num;$i++) {
            echo "<a href=list.php?page={$i}>{$i}</a>";
        }

        echo "</td></tr>";

        mysql_close($rscID);

    }

?>


<html>
    <head>
        <style>
            tr{ text-align: center;
                width: 800px;
                height: 50px;
                background-color: #FFFFFF;
                align=center width=750 bgcolor='#FFFFFF' height=50
            }
        </style>
    </head>
    <body>
    <table border="0" width=400 class=hope01 cellspacing=1 cellpadding=2 bgcolor="#666666">
        <tr><td>번호</td><td>작성자</td><td>제목</td><td>조회수</td><td>작성일</td></tr>
        <?php
            table_make();
        ?>
        <tr>
            <td colspan="5">
                <form action="write.php">
                    <input type="submit" value="글쓰기">
                </form>
            </td>
        </tr>
    </table>


    </body>
</html>