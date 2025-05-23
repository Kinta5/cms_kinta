<div class="flex w-full h-screen justify-center items-center">
   <div>
      <h1 class="text-center"><?=$t['install.h1']?></h1>
      
      <form method="post" action="">
      <div class="grid grid-cols-1 gap-2">
         <div>
            <label for="name"><?=$t['form.name']?></label>
            <input id="name" type="text" name="name" placeholder="" />
         </div>
         <div>
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" placeholder="" required />
         </div>
         <div>
            <label for="username"><?=$t['form.username']?></label>
            <input id="username" type="text" name="username" placeholder="" required />
         </div>
         <div>
            <label for="password"><?=$t['form.password']?></label>
            <input id="password" type="password" name="password" placeholder="" required />
         </div>
         <button type="submit" class="mt-2"><?=$t['form.register']?></button>
      </div>
      </form>
      
   </div>
</div>