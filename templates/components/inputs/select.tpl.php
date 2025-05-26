<div>
   <label for="<?=$name?>"><?=$label?></label>
   <select class="min-h-[42px]" id="<?=$name?>" name="<?=$name?>" <?=($required) ? "required" : ""?>>
      <?php if($placeholder){ ?>
         <option value='' style='display: none'><?=$placeholder?></option>
      <?php } ?>
      <?php foreach($values as $val => $text){ ?>
         <option value='<?=$val?>'><?=$text?></option>
      <?php } ?>
   </select>
</div>