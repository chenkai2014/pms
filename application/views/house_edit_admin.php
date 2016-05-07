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
            <div class="form-group">停车位：<?php
                echo '<select class="form-control" name="carport_id">';
                foreach($carport_list as $key=>$value){
                    if($value['carport_id']!=$house_info['carport_id']){
                        echo '<option value="'.$value['carport_id'].'">'.$value['carport_name'].'</option>';
                    }
                    else{
                        echo '<option selected="selected" value="'.$value['carport_id'].'">'.$value['carport_name'].'</option>';
                    }
                }
                echo '</select>';
                ?>
            </div>
            <div class="form-group">电话：<input type="text" class="form-control" name="telephone" value="<?php echo $house_info['telephone']; ?>"></div>
            <div class="form-group">房间状态：<?php
            echo '<select class="form-control" name="status">';
            echo '<option value="20">使用中</option>';
            echo '<option value="10">未使用</option>';
            echo '</select>'; ?>
            </div>
            <div class="form-group">备注：<input type="text" class="form-control" name="remark" value="<?php echo $house_info['remark']; ?>"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="更新"></div>
        </form>
    </div>
</div>
