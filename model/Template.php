<?php

class Template extends BaseModel {

   public static function getInput($type, $name, $label, $placeholder='', $required=false) {
      include './templates/components/inputs/input.tpl.php';
   }
}
