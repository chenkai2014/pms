
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
                <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
                <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
                <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
                <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
                <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
                <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
                <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
                <li role="presentation" class="active"><a href="">新增会员</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="post" action="/index.php/member_admin/save">
            <div class="form-group">住房名：<input type="text" class="form-control" name="house_name"></div>
            <div class="form-group">用户名：<input type="text" class="form-control" name="username"></div>
            <div class="form-group">密码：<input type="text" class="form-control" name="password"></div>
            <div class="form-group">姓名：<input type="text" class="form-control" name="name"></div>
            <div class="form-group">手机号：<input type="text" class="form-control" name="mobile"></div>
            <div class="form-group">楼宇号：<input type="text" class="form-control" name="building_num"></div>
            <div class="form-group">详细信息：<input type="text" class="form-control" name="address_detail"></div>
            <div class="form-group"><input class="form-control btn-success" type="submit" value="增加"></div>
        </form>
    </div>
</div>
