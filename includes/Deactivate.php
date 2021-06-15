<?php
/**
 *  * Plugin Name:     Feyd2Blue Directory
 * 
 *  */ 
namespace Inc;

class Deactivate 
{
   public static function deactivate() {
       flush_rewrite_rules();
   }
}