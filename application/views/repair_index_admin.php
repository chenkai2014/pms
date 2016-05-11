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
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/Repair_admin/index">
            <div class="form-group">住房名：<input class="form-control" type="text" name="house_name"></div>
            <div class="form-group">维修状态：<select class="form-control" name="status">
                    <option value=""></option>
                    <option value="0">未维修</option>
                    <option value="10">维修中</option>
                    <option value="20">维修完成</option>
                </select></div>
            <div class="form-group">
                报修日期：<input type="text" class="form-control" name="date_start" id="date_start" />
                ~<input type="text" class="form-control" name="date_end" id="date_end" />
            </div>
            <div class="form-group"><input class="form-control btn-success" type="submit" value="搜索"></div>
        </form>

    </div>
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
                    <td><?php echo date('Y-m-d',$value['create_time']); ?></td>
                    <td><?php if($value['repair_time']!=0){echo date('Y-m-d',$value['repair_time']);} ?></td>
                    <td><?php echo $value['repair_name']; ?></td>
                    <td><?php if($value['status']==0){echo '未维修';}elseif($value['status']==10){echo '维修中';}elseif($value['status']==20){echo '维修完成';}  ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><a href="/index.php/repair_admin/showEdit?repair_id=<?php echo $value['repair_id']; ?>">编辑</a>丨<a href="/index.php/repair_admin/delete?repair_id=<?php echo $value['repair_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<link rel="stylesheet" href="/jquery/jquery-ui-1.11.4/jquery-ui.min.css" >
<script src="/jquery/jquery.min.js"></script>
<script src="/jquery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
    $("#date_start").datepicker();
    $("#date_end").datepicker();
</script>
