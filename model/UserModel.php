<?php

class UserModel extends BaseModel {

   public function createUser($values) {
      dibi::query("INSERT INTO `cms_users`", [
         'name' => $values['name'],
         'email' => $values['email'],
         'username' => $values['username'],
         'password' => password_hash($values['password'], PASSWORD_DEFAULT),
         'created_at' => new Dibi\DateTime()
      ]);

      $id = dibi::getInsertId();
      if($id==1) dibi::query("UPDATE `cms_users` SET is_super=1 WHERE id=1");
   }

   public function login($username, $password) {
      $user = dibi::fetch("SELECT * FROM `cms_users` WHERE username = %s", $username);

      if ($user && password_verify($password, $user['password'])) {
         $_SESSION['user_id'] = $user['id'];
         return true;
      }
      return false;
   }

   public function getUsers() {
      return dibi::fetchAll("SELECT * FROM `cms_users`");
   }
}
