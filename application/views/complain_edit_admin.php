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
                <li role="presentation" class="active"><a href="">投诉编辑</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <?php if($complain_info['status']==10){ ?>
            <form method="get" action="/index.php/complain_admin/edit">
                <input type="hidden" name="complain_id" value="<?php echo $complain_info['complain_id']; ?>">
                <input type="hidden" name="status" value="<?php echo $complain_info['status']; ?>">
                <div class="form-group">审核人员：<input type="text" class="form-control" name="audit_name" value="<?php echo $complain_info['audit_name'] ?>"></div>
                <div class="form-group">处理人员：<input type="text" class="form-control" name="handle_name" value="<?php echo $complain_info['handle_name'] ?>"></div>
                <div class="form-group"><input class="form-control btn-success" type="submit" value="开始处理"></div>
            </form>
        <?php }elseif($complain_info['status']==20){ ?>
            <form method="get" action="/index.php/complain_admin/edit">
                <input type="hidden" name="complain_id" value="<?php echo $complain_info['complain_id']; ?>">
                <input type="hidden" name="status" value="<?php echo $complain_info['status']; ?>">
                <div class="form-group">处理情况：<input type="text" class="form-control" name="handle_info" value="<?php echo $complain_info['handle_info'] ?>"></div>
                <div class="form-group"><input class="form-control btn-success" type="submit" value="确认完成"></div>
            </form>
        <?php } ?>

    </div>
</div>
