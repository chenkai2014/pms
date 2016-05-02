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
                <li role="presentation" class="active"><a href="">楼宇编辑</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="get" action="/index.php/building_admin/edit">
            <input type="hidden" name="building_id" value="<?php echo $building_info['building_id']; ?>">
            <div class="form-group">楼宇号：<input type="text" class="form-control" name="building_num" value="<?php echo $building_info['building_num']; ?>"></div>
            <div class="form-group">楼宇层数：<input type="text" class="form-control" name="building_floor" value="<?php echo $building_info['building_floor']; ?>"></div>
            <div class="form-group">朝向：<input type="text" class="form-control" name="orientation" value="<?php echo $building_info['orientation']; ?>"></div>
            <div class="form-group">备注：<input type="text" class="form-control" name="remark" value="<?php echo $building_info['remark']; ?>"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="确定修改"></div>
        </form>
    </div>
</div>
