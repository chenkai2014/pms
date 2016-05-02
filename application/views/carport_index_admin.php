<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation" class="active"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/Carport_admin/index">
            <div class="form-group">车牌号：<input type="text" class="form-control" name="license"></div>
            <div class="form-group">车位名：<input type="text" class="form-control" name="carport_name"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="搜索"></td></div>
            <div class="form-group"><a class="form-control btn-danger" href="/index.php/Carport_admin/add">增加车位</a></div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>车位名</td>
                <td>车位面积</td>
                <td>车牌号</td>
                <td>备注</td>
                <td>操作</td>
            </tr>
            <?php foreach($carport_list as $value){ ?>
                <tr>
                    <td><?php echo $value['carport_name']; ?></td>
                    <td><?php echo $value['area']; ?></td>
                    <td><?php echo $value['license']; ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><a href="/index.php/Carport_admin/showEdit?carport_id=<?php echo $value['carport_id']; ?>">编辑</a>丨<a href="/index.php/Carport_admin/delete?carport_id=<?php echo $value['carport_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
