 <option selected disabled>-select-</option>
<?php foreach ($members  as $row){?>
    <label class="p-1">Select a member</label>               
   
  <option value="<?=$row["MemberId"]?>"><?=$row["Fullname"]?></option>
<?php  }?>

    ?>