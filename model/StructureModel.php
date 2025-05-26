<?php

class StructureModel extends BaseModel {

   public static function checkInstall() {
      try {
         dibi::query("SELECT 1 FROM cms_tables LIMIT 1");
         return true;
      } catch (\Dibi\Exception $e) {
         return false;
      }
   }

   /* Initial structure */
   public static function install() {
      dibi::query("
         CREATE TABLE IF NOT EXISTS cms_tables (
               id INT AUTO_INCREMENT PRIMARY KEY,
               type VARCHAR(255) NOT NULL,
               name VARCHAR(255) NOT NULL,
               label VARCHAR(255) NOT NULL,
               created_at DATETIME DEFAULT CURRENT_TIMESTAMP
         )
      ");

      dibi::query("
         CREATE TABLE IF NOT EXISTS cms_columns (
               id INT AUTO_INCREMENT PRIMARY KEY,
               table_id INT NOT NULL,
               name VARCHAR(255) NOT NULL,
               label VARCHAR(255) NOT NULL,
               type VARCHAR(50) NOT NULL,
               options TEXT NULL,
               FOREIGN KEY (table_id) REFERENCES cms_tables(id) ON DELETE CASCADE
         )
      ");

      dibi::query("
         CREATE TABLE IF NOT EXISTS cms_users (
               id INT AUTO_INCREMENT PRIMARY KEY,
               name VARCHAR(255) NOT NULL,
               email VARCHAR(255) NOT NULL,
               username VARCHAR(50) NOT NULL UNIQUE,
               password VARCHAR(255) NOT NULL,
               is_super BOOLEAN DEFAULT 0,
               created_at DATETIME DEFAULT CURRENT_TIMESTAMP
         )
      ");

      dibi::query("
         CREATE TABLE IF NOT EXISTS cms_tables (
               id INT AUTO_INCREMENT PRIMARY KEY,
               table_id INT NOT NULL,
               content TEXT NULL,
               created_by VARCHAR(255) NULL,
               created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
               updated_by VARCHAR(255) NULL,
               updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
               FOREIGN KEY (table_id) REFERENCES cms_tables(id) ON DELETE CASCADE
         )
      ");
   }
}
