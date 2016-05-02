<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation" class="active"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/Building_admin/index">
            <div class="form-group">楼宇号：<input type="text" class="form-control" name="building_num"></div>
            <div class="form-group"><input class="form-control btn-success" type="submit" value="搜索"></div>
            <div class="form-group"><a class="form-control btn-danger" href="/index.php/Building_admin/add">添加</a></div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>楼宇号</td>
                <td>楼宇层数</td>
                <td>朝向</td>
                <td>备注</td>
                <td>操作</td>
            </tr>
            <?php foreach($building_list as $value){ ?>
                <tr>
                    <td><?php echo $value['building_num']; ?></td>
                    <td><?php echo $value['building_floor']; ?></td>
                    <td><?php echo $value['orientation']; ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><a href="/index.php/Building_admin/showEdit?building_id=<?php echo $value['building_id']; ?>">编辑</a>丨<a href="/index.php/Building_admin/delete?building_id=<?php echo $value['building_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>
