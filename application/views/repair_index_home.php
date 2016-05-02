<?php ?>
<div class="container">
    <div class="row">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="/index.php/member_home/index">用户基本信息</a></li>
                <li role="presentation" class="active"><a href="/index.php/repair_home/index">用户报修</a></li>
                <li role="presentation"><a href="/index.php/charge_home/index">用户缴费</a></li>
                <li role="presentation"><a href="/index.php/complain_home/index">用户投诉</a></li>
                <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
            </ul>
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
                    <td><?php echo $value['create_time']; ?></td>
                    <td><?php echo $value['repair_time']; ?></td>
                    <td><?php echo $value['repair_name']; ?></td>
                    <td><?php if($value['status']==0){echo '未维修';}elseif($value['status']==10){echo '维修中';}elseif($value['status']==20){echo '维修完成';}  ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><?php if($value['status']!=20){ ?><a href="/index.php/repair_home/finish?repair_id=<?php echo $value['repair_id']; ?>">确认完成</a>丨<?php }else{echo "";} ?><a href="/index.php/repair_home/delete?repair_id=<?php echo $value['repair_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="row">
        <form class="form-inline" method="post" action="/index.php/repair_home/save">
            <h4 class="h4">新增保修</h4>
            <div class="form-group">标题:<input class="form-control" type="text" name="title" value=""></div>
            <div class="form-group">内容:<input class="form-control" type="text" name="content" value=""></div>
            <div class="form-group">备注:<input class="form-control" type="text" name="remark" value=""></div>
            <input type="submit" class="form-control btn-success" value="确认提交">
        </form>
    </div>
</div>
