<?php ?>
<div>
    <form method="get" action="/index.php/member_admin/edit">
        <input type="hidden" name="member_id" value="<?php echo $member_info['member_id'] ?>">
        住房名：<input type="text" name="house_name" value="<?php echo $member_info['house_name'] ?>">
        用户名：<input type="text" name="username" value="<?php echo $member_info['username'] ?>">
        密码：<input type="text" name="password" value="<?php echo $member_info['password'] ?>">
        姓名：<input type="text" name="name" value="<?php echo $member_info['name'] ?>">
        手机号：<input type="text" name="mobile" value="<?php echo $member_info['mobile'] ?>">
        楼宇号：<input type="text" name="building_num" value="<?php echo $member_info['building_num'] ?>">
        详细信息：<input type="text" name="address_detail" value="<?php echo $member_info['address_detail'] ?>">
        <input type="submit" value="确定修改">
    </form>
</div>
