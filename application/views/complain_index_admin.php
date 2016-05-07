<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
                <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
                <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
                <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
                <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
                <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
                <li role="presentation" class="active"><a href="/index.php/complain_admin/index">投诉管理</a></li>
                <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form method="get" class="form-inline" action="/index.php/complain_admin/index">
            <div class="form-group">会员名：<input class="form-control" type="text" name="username" value=""></div>
            <div class="form-group">投诉状态：
            <select class="form-control" name="status">
                <option value=""></option>
                <option value="10">未处理</option>
                <option value="20">处理中</option>
                <option value="30">处理完成</option>
            </select>
            </div>
            <div class="form-group"><input class="form-control btn-success" type="submit" value="搜索"></div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <tr>
                <td>标题</td>
                <td>投诉人</td>
                <td>审核人员</td>
                <td>提交时间</td>
                <td>完成时间</td>
                <td>投诉内容</td>
                <td>处理人员</td>
                <td>处理情况</td>
                <td>处理状态</td>
                <td>备注</td>
                <td>操作</td>
            </tr>
            <?php foreach($complain_list as $value){ ?>
                <tr>
                    <td><?php echo $value['title']; ?></td>
                    <td><?php echo $value['username']; ?></td>
                    <td><?php echo $value['audit_name']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$value['create_time']); ?></td>
                    <td><?php if($value['finish_time']==0){echo '未完成';}else{echo date('Y-m-d H:i:s',$value['finish_time']);} ?></td>
                    <td><?php echo $value['content']; ?></td>
                    <td><?php echo $value['handle_name']; ?></td>
                    <td><?php echo $value['handle_info']; ?></td>
                    <td><?php if($value['status']==10){echo '未处理';}elseif($value['status']==20){echo '正在处理';}elseif($value['status']==30){echo '完成';} ?></td>
                    <td><?php echo $value['remark']; ?></td>
                    <td><?php if($value['status']==10){ ?><a href="/index.php/complain_admin/showEdit?complain_id=<?php echo $value['complain_id']; ?>">开始处理</a><?php }elseif($value['status']==20){ ?><a href="/index.php/complain_admin/showEdit?complain_id=<?php echo $value['complain_id']; ?>">处理完成</a><?php } ?>丨<a href="/index.php/complain_admin/delete?complain_id=<?php echo $value['complain_id']; ?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
