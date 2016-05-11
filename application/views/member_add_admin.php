
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
                <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
                <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
                <li role="presentation" class="active"><a href="">新增会员</a></li>
            </ul>
        </ul>
    </div>
    <div class="row">
        <form id="addForm" method="post" action="/index.php/member_admin/save">
            <div class="form-group">住房名：<?php
                echo '<select class="form-control" name="house_id">';
                echo '<option value=""></option>';
                foreach($house_list as $key=>$value){
                    echo '<option value="'.$value['house_id'].'">'.$value['house_name'].'</option>';
                }
                echo '</select>';
                ?></div>
            <div class="form-group">用户名：<input type="text" class="form-control" name="username"></div>
            <div class="form-group">密码：<input type="text" class="form-control" name="password"></div>
            <div class="form-group">姓名：<input type="text" class="form-control" name="name"></div>
            <div class="form-group">手机号：<input type="text" class="form-control" name="mobile"></div>
            <div class="form-group">楼宇号：<?php
                echo '<select class="form-control" name="building_num">';
                echo '<option value=""></option>';
                foreach($building_list as $key=>$value){
                    echo '<option value="'.$value['building_num'].'">'.$value['building_num'].'</option>';
                }
                echo '</select>';
                ?></div>
            <div class="form-group">详细信息：<input type="text" class="form-control" name="address_detail"></div>
            <div class="form-group"><input class="form-control btn-success" id="submit" type="submit" value="增加"></div>
        </form>
    </div>
</div>
<script src="/jquery/jquery.min.js"></script>
<script src="/jquery/jquery.validation.min.js"></script>
<script type="text/javascript">
$('#submit').click(function(){
    if($('#addForm').validate({
            rules:{
                house_id:{
                    required: true
                },
                username:{
                    required: true
                },
                password:{
                    required: true,
                    minlength:6
                },
                name:{
                    required: true
                },
                mobile:{
                    required: true,
                    maxlength:11,
                    minlength:11
                },
                building_num:{
                    required: true,
                    digits:true
                }
            },
            messages:{
                house_id:{
                    required: '请输入住房名'
                },
                username:{
                    required: '请输入用户名'
                },
                password:{
                    required: '请输入密码',
                    minlength:'密码不应少于6位'
                },
                name:{
                    required: '请输入真实姓名'
                },
                mobile:{
                    required: '请输入手机号码',
                    maxlength:'手机号必须为11位',
                    minlength:'手机号必须为11位'
                },
                building_num:{
                    required: '请输入楼宇号',
                    digits:'请输入正确的楼宇号'
                }
            }
        }))
    {
        $('#addForm').submit();
    }
});
</script>

