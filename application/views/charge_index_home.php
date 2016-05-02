<?php ?>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_home/index">用户基本信息</a></li>
            <li role="presentation"><a href="/index.php/repair_home/index">用户报修</a></li>
            <li role="presentation" class="active"><a href="/index.php/charge_home/index">用户缴费</a></li>
            <li role="presentation"><a href="/index.php/complain_home/index">用户投诉</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>

        </ul>
    </div>
    <div class="row">
            <form method="get" class="form-inline" action="/index.php/Charge_home/index">
                <div class="form-group">
                    缴费类型：<?php
                    echo '<select class="form-control" name="type_id">';
                    foreach($charge_type_list as $value){
                        echo '<option value='.$value['type_id'].'>'.$value['type_name'].'</option>';
                    }
                    echo '</select>';
                    ?>
                </div>
                <div class="form-group"><input type="submit" class="form-control btn-success"  value="搜索"></div>
            </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>缴费类型</td>
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
                    <td><?php echo $value['invoiceNum']; ?></td>
                    <td><?php echo $value['createTime']; ?></td>
                    <td><?php echo $value['paymentTime']; ?></td>
                    <td><?php echo $value['handleName']; ?></td>
                    <td><?php echo $value['chargeName']; ?></td>
                    <td><?php echo $value['paymentMoney']; ?></td>
                    <td><?php echo $value['status']; ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><a href="/index.php/Charge_home/delete?charge_id=<?php echo $value['charge_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
