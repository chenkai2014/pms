<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation" class="active"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <!--<form method="get" action="/index.php/Building_admin/index">
        <table>
            <tr>
                <td>楼宇号：<input type="text" name="building_num"></td>
                <td><input type="submit" value="搜索"></td>
                <td><a href="/index.php/Building_admin/add">添加</a></td>
            </tr>
        </table>
    </form>-->
    <div class="row">
        <table class="table">
            <tr>
                <td>住房名</td>
                <td>标题</td>
                <td>内容</td>
                <td>报修时间</td>
                <td>修理时间</td>
                <td>修理人员名字</td>
                <td>修理状态</td>
                <td>备注</td>
                <td>操作</td>
            </tr>
            <?php foreach($repair_list as $value){ ?>
                <tr>
                    <td><?php echo $value['house_name']; ?></td>
                    <td><?php echo $value['title']; ?></td>
                    <td><?php echo $value['content']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$value['create_time']); ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$value['repair_time']); ?></td>
                    <td><?php echo $value['repair_name']; ?></td>
                    <td><?php if($value['status']==0){echo '未维修';}elseif($value['status']==10){echo '维修中';}elseif($value['status']==20){echo '维修完成';}  ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><a href="/index.php/repair_admin/showEdit?repair_id=<?php echo $value['repair_id']; ?>">编辑</a>丨<a href="/index.php/repair_admin/delete?repair_id=<?php echo $value['repair_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
