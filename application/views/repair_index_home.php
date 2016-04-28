<?php ?>
<div>
    <table>
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
                <td><?php echo $value['create_time']; ?></td>
                <td><?php echo $value['repair_time']; ?></td>
                <td><?php echo $value['repair_name']; ?></td>
                <td><?php if($value['status']==0){echo '未维修';}elseif($value['status']==10){echo '维修中';}elseif($value['status']==20){echo '维修完成';}  ?></td>
                <td><?php echo $value['remark']; ?></td>
                <td><?php if($value['status']!=20){ ?><a href="/index.php/repair_home/finish?repair_id=<?php echo $value['repair_id']; ?>">确认完成</a>丨<?php }else{echo "";} ?><a href="/index.php/repair_home/delete?repair_id=<?php echo $value['repair_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>
    </table>

    <form method="post" action="/index.php/repair_home/save">
        <table>
            <tr>
                <td>新增保修表</td>
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
