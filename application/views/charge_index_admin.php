<?php ?>
<div>
    <form method="get" action="/index.php/Charge_admin/index">
        <table>
            <tr>
                <td>住房名：<input type="text" name="house_name"></td>
                <td><input type="submit" value="搜索"></td>
                <td><a href="/index.php/Charge_admin/add">添加</a></td>
            </tr>
        </table>
    </form>
    <table>
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
                <td><?php echo $value['createTime']; ?></td>
                <td><?php echo $value['paymentTime']; ?></td>
                <td><?php echo $value['handleName']; ?></td>
                <td><?php echo $value['chargeName']; ?></td>
                <td><?php echo $value['paymentMoney']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['remark']; ?></td>
                <td><a href="/index.php/Charge_admin/showEdit?charge_id=<?php echo $value['charge_id']; ?>">编辑</a>丨<a href="/index.php/Charge_admin/delete?charge_id=<?php echo $value['charge_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
