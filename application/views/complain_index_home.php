<?php ?>
<div>
    <table>
        <tr>
            <td>标题</td>
            <td>审核人员</td>
            <td>投诉时间</td>
            <td>修改时间</td>
            <td>投诉内容</td>
            <td>处理人员</td>
            <td>处理情况</td>
            <td>审核状态</td>
            <td>备注</td>
            <td>操作</td>
        </tr>
        <?php foreach($complain_list as $value){ ?>
            <tr>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['audit_name']; ?></td>
                <td><?php echo $value['create_time']; ?></td>
                <td><?php echo $value['modify_time']; ?></td>
                <td><?php echo $value['finish_time']; ?></td>
                <td><?php echo $value['content']; ?></td>
                <td><?php echo $value['handle_name']; ?></td>
                <td><?php echo $value['handle_info']; ?></td>
                <td><?php if($value['status']==10){echo '未通过';}elseif($value['status']==20){echo '已通过';} ?></td>
                <td><?php echo $value['remark']; ?></td>
                <td><a href="/index.php/complain_home/delete?complain_id=<?php echo $value['complain_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>
    </table>

    <form method="post" action="/index.php/complain_home/save">
        <table>
            <tr>
                <td>新增投诉</td>
            </tr>
            <tr>
                <td>标题:<input type="text" name="title" value=""></td>
                <td>内容:<input type="text" name="content" value=""></td>
                <td>备注:<input type="text" name="remark" value=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="确认提交"></td>
            </tr>
        </table>
    </form>


</div>
