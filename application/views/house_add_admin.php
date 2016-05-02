<?php ?>
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
                <li role="presentation" class="active"><a href="">添加住户</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="post" action="/index.php/house_admin/save">
            <div class="form-group">停车位ID：<input class="form-control" type="text" name="carport_id" value=""></div>
            <div class="form-group">楼宇ID：<input class="form-control" type="text" name="building_id" value=""></div>
            <div class="form-group">房间ID：<input class="form-control" type="text" name="house_id" value=""></div>
            <div class="form-group">电话：<input class="form-control" type="text" name="telephone" value=""></div>
            <div class="form-group">住房单元号：<input class="form-control" type="text" name="unit_num" value=""></div>
            <div class="form-group">住房状态：<input class="form-control" type="text" name="status" value=""></div>
            <div class="form-group">迁入时间：<input class="form-control" type="text" name="move_in_time" value=""></div>
            <div class="form-group">备注：<input class="form-control" type="text" name="remark" value=""></div>
            <div class="form-group"><input class="form-control btn-success" type="submit" value="添加"></div>
        </form>
    </div>
</div>
