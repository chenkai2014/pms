<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/Member_admin/index">
            <div class="form-group">用户名：<input type="text" class="form-control" name="username"></div>
            <div class="form-group">姓名：<input type="text" class="form-control" name="name"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="搜索"></div>
            <div class="form-group"><a class="form-control btn-danger" href="/index.php/Member_admin/add">增加用户</a></div>




        </form>
    </div>
    <div class="row">
        <table class="table">
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
                    <td><?php echo $value['house_id']; ?></td>
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
</div>
