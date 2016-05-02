
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
                <li role="presentation" class="active"><a href="">新增停车位</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="post" action="/index.php/carport_admin/save">
            <div class="form-group">停车位名：<input type="text" class="form-control" name="carport_name"></div>
            <div class="form-group">面积：<input type="text" class="form-control" name="area"></div>
            <div class="form-group">车牌：<input type="text" class="form-control" name="license"></div>
            <div class="form-group">备注：<input type="text" class="form-control" name="remark"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="添加"></div>
        </form>
    </div>

</div>
