

<?php
$result = $_DATA['sql_result'];


?>

<table>
    <th>id</th><th>name</th><th>passwd</th>
    <?php while($rs = $result->fetch(PDO::FETCH_ASSOC)):?>
    <tr>
        <td><?php echo $rs['id'] ?></td><td><?php echo $rs['name'] ?></td><td><?php echo $rs['passwd'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<hr>
<!-- <?php echo "getv : ".$_GET['getv'] ?><br> -->
<!-- <?php echo "id-Get值 : ".$_GET['id'] ?><br> -->
<?php echo "username-Get值 : ".$_GET['username'] ?><br>
<?php echo "userpasswd-Get值 : ".$_GET['userpasswd'] ?><br>
<!-- <a href="index.php/user/Insert_user?getv=SKV-957">SKV-957</a> -->


<!--
    action="index.php/user/Insert_user"  讓這張form會執行 [userController] 底下的 [Insert_user action]
-->
<form id="testform" action="index.php/user/Insert_user" method="get">
        <!-- i d : <input name="id" type="text"><br> -->
        name: <input name="username" type="text"><br>
        pawd: <input name="userpasswd" type="text"><br>
</form>

<button type="submit" form="testform">新增使用者</button>

<style>
    hr,table *,form *,button{
        border: 1px solid #000;
    }
</style>