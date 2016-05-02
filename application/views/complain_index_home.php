<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_home/index">用户基本信息</a></li>
            <li role="presentation"><a href="/index.php/repair_home/index">用户报修</a></li>
            <li role="presentation"><a href="/index.php/charge_home/index">用户缴费</a></li>
            <li role="presentation" class="active"><a href="/index.php/complain_home/index">用户投诉</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
        </ul>
    </div>
    <div class="row">
        <table class="table">
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
    </div>
    <div class="row">
        <form method="post" class="form-inline" action="/index.php/complain_home/save">
            <h4 class="h4">新增投诉</h4>
            <div class="form-group">标题:<input type="text" class="form-control" name="title" value=""></div>
            <div class="form-group">内容:<input type="text" class="form-control" name="content" value=""></div>
            <div class="form-group">备注:<input type="text" class="form-control" name="remark" value=""></div>
            <input type="submit" class="form-control btn-success" value="确认提交">
        </form>
    </div>
</div>
