<?php ?>
<div>

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
            <td>操作</td>
        </tr>
            <tr>
                <td><?php echo $value['member_id']; ?></td>
                <td><?php echo $value['house_name']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['password']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['mobile']; ?></td>
                <td><?php echo $value['building_num']; ?></td>
                <td><?php echo $value['address_detail']; ?></td>
                <td><a href="/index.php/Member_admin/showEdit?member_id=<?php echo $value['member_id']; ?>">编辑</a></td>
            </tr>
    </table>
</div>
