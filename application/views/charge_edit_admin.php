<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
            <li role="presentation" class="active"><a href="">缴费</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" action="/index.php/charge_admin/edit">
            <input type="hidden" name="charge_id" value="<?php echo $charge_id ?>">
            <div class="form-group">收费人员：<input class="form-control" type="text" name="chargeName" ></div>
            <div class="form-group"><input class="form-control btn-success" type="submit" name="确定缴费" ></div>
        </form>
    </div>
</div>