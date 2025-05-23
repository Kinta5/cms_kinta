<div class="flex w-full h-screen justify-center items-center">
   <div class="relative">
      <div class="absolute bottom-full w-full mb-8 flex justify-center space-x-2">
         <img class="ml-[-2rem]" src='<?=BASE_PATH?>/assets/images/logo_creaf.svg' width="50">
         <h1 class="text-center">CMS</h1>
      </div>
      
      <form method="post" action="">
      <div class="grid grid-cols-1 gap-2">
         <div>
            <?= Template::getInput('text', 'username', $t['form.username'], '', true); ?>
         </div>   
        
         <div>
            <?= Template::getInput('password', 'password', $t['form.password'], '', true); ?>
         </div>
         <button type="submit" class="mt-2"><?=$t['form.login']?></button>
      </div>
      </form>
      
   </div>
</div>