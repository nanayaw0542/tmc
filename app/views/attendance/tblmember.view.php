<?php if(!empty($members)): ?>
    <?php $i=0; foreach($members as $user){$i++; ?>
  <tr>
    <td><?=$i?></td>
    <td><?=$user['MemberId']?></td>
      <?php 
      $getministry = get_title_by_id($user['TitleId']);
      if (empty($getministry)) {
        $title = "N/A";
      }
      else{
      $title = $getministry["Title"];
    }
     ?>
    <td><?=$title.'. '.$user['Fullname']?></td>
    <?php 
      $ministries = get_ministry_by_id($user['MinistryId']);
      if (empty($ministries)) {
        $ministry = "N/A";
      }
      else{
      $ministry = $ministries["MinistryName"];
    }
     ?>
    <td><?=$ministry?></td>
  </tr>
 <?php } ?>
 <?php endif; ?>