<div class="container mx-auto mt-16">
   <h1><?=$t['create.h1']?></h1>
   <hr class="mt-4" />
   <button class="add-column">Přidat sloupec</button>
   <button class="create-table mt-8">Vytvořit</button>
</div>

<script>
const columns = [];

$(function(){

   $('.create-table').click(function(){
      console.log(columns);
   })
})
</script>

<?php include 'modal-add-column.tpl.php'; ?>