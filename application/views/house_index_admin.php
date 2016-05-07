<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation" class="active"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/house_admin/index">
            <div class="form-group">房间名：<input type="text" class="form-control" name="house_name"></div>
            <div class="form-group">单元号：<input type="text" class="form-control" name="unit_num"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="搜索"></div>
            <div class="form-group"><a class="form-control btn-danger" href="/index.php/house_admin/add">添加</a></div>

        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>车位名</td>
                <td>楼宇号</td>
                <td>房间名</td>
                <td>电话号码</td>
                <td>房间单元号</td>
                <td>房间状态</td>
                <td>迁入时间</td>
                <td>备注</td>
            </tr>
            <?php foreach($house_list as $value){ ?>
                <tr>
                    <td><?php echo $value['carport_name']; ?></td>
                    <td><?php echo $value['building_num']; ?></td>
                    <td><?php echo $value['house_name']; ?></td>
                    <td><?php echo $value['telephone']; ?></td>
                    <td><?php echo $value['unit_num']; ?></td>
                    <td><?php if($value['status']==20){echo '使用中';}else{echo '未使用'; }  ?></td>
                    <td><?php echo date('Y-m-d',$value['move_in_time']); ?></td>
                    <td><a href="/index.php/house_admin/showEdit?house_id=<?php echo $value['house_id']; ?>">编辑</a>丨<a href="/index.php/house_admin/delete?house_id=<?php echo $value['house_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>

        </table>
    </div>


</div>
