<?php

class StructureModel extends BaseModel {

   private $types = [
      'text' => 'varchar(255)',
      'textarea' => 'text',
      'int' => 'int',
      'decimal' => 'decimal',
      'float' => 'float',
      'double' => 'double',
      'select' => 'varchar(255)',
      'select' => 'varchar(255)',
      'radio' => 'varchar(255)',
      'checkbox' => 'varchar(255)'
   ];

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
               length VARCHAR(50) NOT NULL,
               `values` TEXT NULL,
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

      /*dibi::query("
         CREATE TABLE IF NOT EXISTS cms_pages (
               id INT AUTO_INCREMENT PRIMARY KEY,
               table_id INT NOT NULL,
               content TEXT NULL,
               created_by VARCHAR(255) NULL,
               created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
               updated_by VARCHAR(255) NULL,
               updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
               FOREIGN KEY (table_id) REFERENCES cms_tables(id) ON DELETE CASCADE
         )
      ");*/
   }

   /* Add to cms_tables */
   public function addTable($name, $label, $type) {
      dibi::query("INSERT INTO cms_tables SET type=%s, name=%s, label=%s, created_at=now()", $type, $name, $label);
      return dibi::getInsertId();
   }

   /* add to cms_columns */
   public function addColumns($table_id, $columns) {
      foreach($columns as $column) {
         $data = json_decode($column);
         dibi::query("INSERT INTO cms_columns SET `table_id`=?, `name`=%s, `label`=%s, `type`=%s, `length`=%s, `values`=%s",
            $table_id,
            $data->name,
            $data->label,
            $data->type,
            isset($data->length) ? $data->length : '',
            isset($data->values) ? $data->values : ''
         );
      }
   }

   public function createTable($table_id) {

      $table = dibi::fetch("SELECT * FROM cms_tables WHERE id=?", $table_id);
      $columns = dibi::fetchAll("SELECT * FROM cms_columns WHERE table_id=?", $table_id);

      $sql = "CREATE TABLE `{$table->name}` ( `id` int(11) NOT NULL,";
      foreach($columns as $column) {
         $length = '';
         if($column->length) $length = "({$column->length})";
         $sql .= " `{$column->name}` {$this->types[$column->type]}{$length} NOT NULL,";
      }
      $sql = rtrim($sql, ',');
      $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
      echo $sql;
      echo "<br><br>";

      dibi::query($sql);
      dibi::query("ALTER TABLE `{$table->name}` ADD PRIMARY KEY (`id`);");
      dibi::query("ALTER TABLE `{$table->name}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");
   } 
}
