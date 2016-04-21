<?php ?>
<div>
    <form method="get" action="/index.php/Member_admin/index">
     <table>
         <tr>
             <td>用户名：<input type="text" name="username"></td>
             <td>姓名：<input type="text" name="name"></td>
             <td><input type="submit" value="搜索"></td>
             <td><a href="/index.php/Member_admin/add">增加用户</a></td>
         </tr>
     </table>
    </form>
<table>
    <tr>
        <td>用户ID</td>
        <td>住房ID</td>
        <td>用户名</td>
        <td>密码</td>
        <td>姓名</td>
        <td>手机号</td>
        <td>楼宇号</td>
        <td>详细地址</td>
        <td>权限</td>
        <td>操作</td>
    </tr>
<?php foreach($member_list as $value){ ?>
    <tr>
        <td><?php echo $value['member_id']; ?></td>
        <td><?php echo $value['house_name']; ?></td>
        <td><?php echo $value['username']; ?></td>
        <td><?php echo $value['password']; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['mobile']; ?></td>
        <td><?php echo $value['building_num']; ?></td>
        <td><?php echo $value['address_detail']; ?></td>
        <td><?php echo $value['is_super']; ?></td>
        <td><a href="/index.php/Member_admin/showEdit?member_id=<?php echo $value['member_id']; ?>">编辑</a>丨<a href="/index.php/Member_admin/delete?member_id=<?php echo $value['member_id']; ?>">删除</a></td>
    </tr>
<?php } ?>

</table>
</div>
