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
                <li role="presentation" class="active"><a href="">编辑住户</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="get" action="/index.php/house_admin/edit">
            <input type="hidden" name="house_id" value="<?php echo $house_info['house_id']; ?>">
            <div class="form-group">停车位ID：<input type="text" class="form-control" name="carport_id" value="<?php echo $house_info['carport_id']; ?>"></div>
            <div class="form-group">楼宇ID：<input type="text" class="form-control" name="building_id" value="<?php echo $house_info['building_id']; ?>"></div>
            <div class="form-group">房间ID：<input type="text" class="form-control" name="house_id" value="<?php echo $house_info['house_id']; ?>"></div>
            <div class="form-group">电话：<input type="text" class="form-control" name="telephone" value="<?php echo $house_info['telephone']; ?>"></div>
            <div class="form-group">单元名：<input type="text" class="form-control" name="unit_num" value="<?php echo $house_info['unit_num']; ?>"></div>
            <div class="form-group">房间状态：<input type="text" class="form-control" name="status" value="<?php echo $house_info['status']; ?>"></div>
            <div class="form-group">迁入时间：<input type="text" class="form-control" name="move_in_time" value="<?php echo $house_info['move_in_time']; ?>"></div>
            <div class="form-group">迁出时间：<input type="text" class="form-control" name="move_out_time" value="<?php echo $house_info['move_out_time']; ?>"></div>
            <div class="form-group">备注：<input type="text" class="form-control" name="remark" value="<?php echo $house_info['remark']; ?>"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="更新"></div>
        </form>
    </div>
</div>
