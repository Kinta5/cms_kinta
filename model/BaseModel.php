<?php

abstract class BaseModel {
	
   protected static array $dict = [];
   protected static string $lang = 'cs';

	public function __construct() {
     
   }

   public function isLoggedIn() {
      return isset($_SESSION['user_id']);
   }

   public function requireLogin() {
      if (!$this->isLoggedIn()) {
         header("Location: login");
         exit;
      }
   }

   public static function getDict() {
      if (empty(self::$dict)) {
         $file = __DIR__ . '/../dict/' . self::$lang . '.json';
         if (file_exists($file)) {
            $json = file_get_contents($file);
            self::$dict = json_decode($json, true) ?? [];
         }
      }

      return self::$dict;
   }

   public static function getTranslation(string $key, array $replacements = []): string {
      
      if (empty(self::$dict)) {
         $file = __DIR__ . '/../dict/' . self::$lang . '.json';
         if (file_exists($file)) {
            $json = file_get_contents($file);
            self::$dict = json_decode($json, true) ?? [];
         }
      }

      $text = self::$dict[$key] ?? $key;

      // Replacements
      foreach ($replacements as $k => $v) {
         $text = str_replace("{{$k}}", $v, $text);
      }

      return $text;
   }
}