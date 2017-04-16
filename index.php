<?php
    include 'dbku.class.php'; //db库文件
    include 'config.php'; //配置文件
    include 'page.class.php';
    include 'inputpp.class.php';
    
    $input = new PG;
    $pagedanye = 6; //每页显示条留言
    $page = new page;//创建一个分页对象
    $db = new db($host,$username,$password,$dbname);
    $sql = "SELECT * FROM messages";
    $mysqli_result = $db->query($sql);
    $pagezhoshu = $mysqli_result->num_rows;//留言总数
    $pageshu = $pagezhoshu/$pagedanye; //页数
    $maxpages = ceil($pageshu);//页数

    $sql = "SELECT * FROM messages order by id desc limit $pagedanye"; 
    $mysqli_result = $db->query($sql);
    
    $rows = array();
     while ($row = $mysqli_result->fetch_array()) { //迭代
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
                    <input type="submit" value="请输入留言" class="submit" />
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
            <?php
                for ($i=1;$i<=$maxpages;$i++) {
            ?>       
            <div class="page">
                <a href="index.php?p=<?php echo $i;?>">[<?php echo $i;?>]</a>
            </div>
            <?php        
                }
            ?>
             
        </div>
    </body>
</html>