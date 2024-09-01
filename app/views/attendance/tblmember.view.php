<?php if(!empty($members)): ?>
    <?php $i=0; foreach($members as $user){$i++; ?>
  <tr>
    <td><label><?=$i?></label></td>
    <td><label><?=$user['MemberId']?></label></td>
      <?php 
      $getministry = get_title_by_id($user['TitleId']);
      if (empty($getministry)) {
        $title = "N/A";
      }
      else{
      $title = $getministry["Title"];
    }
     ?>
    <td><input type="text" name="titleid" value="<?=$user["TitleId"]?>" hidden><label><?=$title.'. '.$user['Fullname']?></label></td>
    <?php 
      $ministries = get_ministry_by_id($user['MinistryId']);
      if (empty($ministries)) {
        $ministry = "N/A";
      }
      else{
      $ministry = $ministries["MinistryName"];
    }
     ?>
    <td>
      <input type="text" name="ministryid" value="<?=$user["MinistryId"]?>" hidden><label><?=$ministry?></label>
    </td>
    <!-- <td><?=$ministry?></td> -->
  </tr>
 <?php } ?>
 <?php endif; ?>