<?php
    date_default_timezone_set('Asia/Shanghai'); //设置时间

    include 'dbku.php';

    $db = new db('127.0.0.1', 'root', '', 'vanstt');
    $db->connect_errno();
    $db->query("set names UTF8");
    
    $sql = "SELECT * FROM messages order by id desc"; 
    $mysqli_result = $db->query($sql);

    $rows = array();
     while ($row = $mysqli_result->fetch_array()) {
         $rows[] = $row;
     }
?>
<html>
    <head>
        <meta charset="utf-8";>
        <link rel="stylesheet" type="text/css" href="http://127.0.0.1/Message-Board/thrasher.css">
        <title>留言板</title>
    </head>
    <body>
        <div class="wrap">
            <div class="write"> <!--一个提交的框架，用于提交内容和用户名和时间-->
                <form action="http://127.0.0.1/Message-Board/houtaichuli.php" method="POST">
                    <textarea name="content">请输入留言内容</textarea>
                    <input type="text" value="请输入用户名" class="user" name="user" />
                    <input type="submit" value="发表留言" class="submit" />
                    <br />
                </form>
            </div>
            <div class="messages"> <!--主要是用于显示发表的内容-->
<?php
                // while ($row = $mysqli_result->fetch_array())
                //换了一个新的方法遍历foreach
                foreach($rows as $row) { 
                    $intime = $row['intime'];
                    $datetime = date("Y-m-d H:i:s",$intime); //dare是php内置函数格式在相关手册可以查看
?>
                <div class="message"> <!--这是留言内容每一个留言都是一个框div-->
                    <div class="info">
                        <span class="user">
<?php
                         echo $row['nick'];
                         echo '---'.'ID:'.$row['id']; 
?>
                        </span>
                        <span class="time"><?php echo $datetime; ?></span>
                    </div>
                    <div class="content">
                        <?php echo $row['content']; ?>
                    </div>
                </div>
<?php    
                }
?>
            </div>
            <div class="page">
                <a href="http://127.0.0.1/Message-Board/liuyanban.php">1</a>
                <a href="http://127.0.0.1/Message-Board/liuyanban.php">2</a>
                <a href="http://127.0.0.1/Message-Board/liuyanban.php">3</a>
                <a href="http://127.0.0.1/Message-Board/liuyanban.php">4</a>
            </div>
        </div>
    </body>
</html>