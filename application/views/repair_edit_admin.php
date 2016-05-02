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
                <li role="presentation" class="active"><a href="">报修编辑</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="get" action="/index.php/repair_admin/edit">
            <input type="hidden" name="repair_id" value="<?php echo $repair_info['repair_id']; ?>">
            <input type="hidden" name="status" value="<?php echo $repair_info['status']; ?>" >

            <div class="form-group">维修人员:<input class="form-control" type="text" name="repair_name" value="<?php echo $repair_info['repair_name']; ?>"></div>

            <?php if($repair_info['status']!=20){ ?>
                <div class="form-group">
                    <input class="form-control btn-success" type="submit" value="<?php if($repair_info['status']==0){echo '开始维修';}elseif($repair_info['status']==10){echo '维修完成';} ?>">
                </div>
            <?php } ?>
        </form>
    </div>
</div>
