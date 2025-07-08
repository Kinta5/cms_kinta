<div class="container mx-auto mt-16">
   <h1><?=$t['create.h1']?></h1>
   <hr class="my-4" />
   <form method="POST" action="">
      <div class="grid grid-cols-3 gap-8">
         <?=Template::getInput('text', 'name', 'Název', '', true)?>
         <?=Template::getInput('text', 'label', 'Label', '', true)?>
         <?=Template::getSelect('type', 'Typ', ['page' => 'Stránka', 'table' => 'Tabulka'], '', true)?>
      </div>
      <button type="button" class="add-column my-4">Přidat sloupec</button>
      <div class="columns">
         
      </div>
      <button type="submit" class="create-table mt-4">Vytvořit</button>
   </form>
</div>

<script>


$(function(){

   
})
</script>

<?php include 'modal-add-column.tpl.php'; ?>