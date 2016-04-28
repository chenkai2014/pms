<?php ?>
<div>
    <form method="get" action="/index.php/repair_admin/edit">
        <input type="hidden" name="repair_id" value="<?php echo $repair_info['repair_id']; ?>">
        <input type="hidden" name="status" value="<?php echo $repair_info['status']; ?>" >
        <table>
            <tr>
                <td>住房名</td>
                <td><?php echo $repair_info['house_name']; ?></td>
            </tr>
            <tr>
                <td>标题</td>
                <td><?php echo $repair_info['title']; ?></td>
            </tr>
            <tr>
                <td>维修内容</td>
                <td><?php echo $repair_info['content']; ?></td>
            </tr>
            <tr>
                <td>报修时间</td>
                <td><?php echo date("Y-m-d H:i:s",$repair_info['create_time']); ?></td>
            </tr>
            <tr>
                <td>修理时间</td>
                <td><?php echo date("Y-m-d H:i:s",$repair_info['repair_time']);  ?></td>
            </tr>
            <tr>
                <td>维修人员</td>
                <td><input type="text" name="repair_name" value="<?php echo $repair_info['repair_name']; ?>"></td>
            </tr>
            <tr>
                <td>维修状态</td>
                <td><?php if($repair_info['status']==0){echo '未维修';}elseif($repair_info['status']==10){echo '维修中';}elseif($repair_info['status']==20){echo '维修完成';}  ?></td>
            </tr>
            <tr>
                <td>备注</td>
                <td><?php echo $repair_info['remark']; ?></td>
            </tr>
        </table>
        <?php if($repair_info['status']!=20){ ?>
        <input type="submit" value="<?php if($repair_info['status']==0){echo '开始维修';}elseif($repair_info['status']==10){echo '维修完成';} ?>">
        <?php } ?>
    </form>
</div>
