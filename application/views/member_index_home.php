
<div class="container">
    <div class="row">
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="/index.php/member_home/index">用户基本信息</a></li>
                <li role="presentation"><a href="/index.php/repair_home/index">用户报修</a></li>
                <li role="presentation"><a href="/index.php/charge_home/index">用户缴费</a></li>
                <li role="presentation"><a href="/index.php/complain_home/index">用户投诉</a></li>
                <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
            </ul>
    </div>
    <div class="row">
            <table class="table">
                <tr class="active">
                    <td>用户名:<?php echo $member_info['username']; ?></td>
                    <td>姓名:<?php echo $member_info['name']; ?></td>
                    <td>手机号:<?php echo $member_info['mobile']; ?></td>
                </tr>
                <tr class="success">
                    <td>住房名:<?php echo $member_info['extend_house']['house_name']; ?></td>
                    <td>房间单元号:<?php echo $member_info['extend_house']['unit_num']; ?></td>
                    <td>房间状态:<?php if($member_info['extend_house']['status']==20){ echo '已入住';}else{ echo '未入住'; }  ?></td>
                </tr>
                <tr class="warning">
                    <td>车位编号名:<?php echo $member_info['extend_carport']['carport_name']; ?></td>
                    <td>车位面积:<?php echo $member_info['extend_carport']['area']; ?></td>
                    <td>车牌号:<?php echo $member_info['extend_carport']['license']; ?></td>
                </tr>
                <tr class="danger">
                    <td>楼宇号:<?php echo $member_info['extend_building']['building_num']; ?></td>
                    <td>楼宇层数:<?php echo $member_info['extend_building']['building_floor']; ?></td>
                    <td>朝向:<?php echo $member_info['extend_building']['orientation']; ?></td>
                </tr>
            </table>
    </div>

</div>
