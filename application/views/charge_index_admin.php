<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation" class="active"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>

    <div class="row">
        <form method="get" class="form-inline" action="/index.php/Charge_admin/index">
            <div class="form-group">住房名：<input type="text" class="form-control" name="house_name"></div>
            <div class="form-group"><input type="submit" class="form-control btn-success" value="搜索"></div>
            <div class="form-group"><a class="form-control btn-danger" href="/index.php/Charge_admin/add">添加</a></div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>缴费类型</td>
                <td>住房名</td>
                <td>单据编号</td>
                <td>单据生成日期</td>
                <td>缴费日期</td>
                <td>单据填写人员</td>
                <td>收费人员</td>
                <td>缴费金额</td>
                <td>缴费状态</td>
                <td>备注</td>
                <td>操作</td>
            </tr>
            <?php foreach($charge_list as $value){ ?>
                <tr>
                    <td><?php echo $value['type_name']; ?></td>
                    <td><?php echo $value['house_name']; ?></td>
                    <td><?php echo $value['invoiceNum']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$value['createTime']); ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$value['paymentTime']); ?></td>
                    <td><?php echo $value['handleName']; ?></td>
                    <td><?php echo $value['chargeName']; ?></td>
                    <td><?php echo $value['paymentMoney']; ?></td>
                    <td><?php if($value['status']==10){echo '未缴费';}elseif($value['status']==20){echo '已缴费';}  ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><?php if($value['status']==10){ ?><a href="/index.php/Charge_admin/showEdit?charge_id=<?php echo $value['charge_id']; ?>">缴费</a>丨<?php } ?><a href="/index.php/Charge_admin/delete?charge_id=<?php echo $value['charge_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
