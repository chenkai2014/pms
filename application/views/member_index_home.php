<?php ?>
<div>
    <table>
        <tr>
            <td>用户名</td>
            <td>密码</td>
            <td>姓名</td>
            <td>手机号</td>
            <td>楼宇号</td>
            <td>详细地址</td>
            <!--<td>操作</td>-->
        </tr>
            <tr>
                <td><?php echo $member_info['username']; ?></td>
                <td><?php echo $member_info['password']; ?></td>
                <td><?php echo $member_info['name']; ?></td>
                <td><?php echo $member_info['mobile']; ?></td>
                <td><?php echo $member_info['building_num']; ?></td>
                <td><?php echo $member_info['address_detail']; ?></td>
                <!--<td><a href="/index.php/Member_admin/showEdit?member_id=<?php /*echo $value['member_id']; */?>">编辑</a></td>-->
            </tr>
        <tr>
            <td>住房名</td>
            <td>手机号</td>
            <td>房间单元号</td>
            <td>房间状态</td>
        </tr>
        <tr>
            <td><?php echo $member_info['extend_house']['house_name']; ?></td>
            <td><?php echo $member_info['extend_house']['telephone']; ?></td>
            <td><?php echo $member_info['extend_house']['unit_num']; ?></td>
            <td><?php echo $member_info['extend_house']['status']; ?></td>
        </tr>
        <tr>
            <td>车位编号名</td>
            <td>车位面积</td>
            <td>车牌号</td>
            <td>备注</td>
        </tr>
        <tr>
            <td><?php echo $member_info['extend_carport']['carport_name']; ?></td>
            <td><?php echo $member_info['extend_carport']['area']; ?></td>
            <td><?php echo $member_info['extend_carport']['license']; ?></td>
            <td><?php echo $member_info['extend_carport']['remark']; ?></td>
        </tr>
        <tr>
            <td>楼宇号</td>
            <td>楼宇层数</td>
            <td>朝向</td>
            <td>备注</td>
        </tr>
        <tr>
            <td><?php echo $member_info['extend_building']['building_num']; ?></td>
            <td><?php echo $member_info['extend_building']['building_floor']; ?></td>
            <td><?php echo $member_info['extend_building']['orientation']; ?></td>
            <td><?php echo $member_info['extend_building']['remark']; ?></td>
        </tr>
    </table>
</div>
