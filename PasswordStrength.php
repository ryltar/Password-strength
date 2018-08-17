<?php
  /** PasswordStrength Plugin declaration
   */
class PasswordStrengthPlugin extends MantisPlugin
 {
   function register()
    {
      $this->name = 'PasswordStrength';
      $this->description = 'A plugin to force users to use a strong password';
      $this->page = '';
      $this->version = '0.0.1';
      $this->requires = array(
        "MantisCore" => "2.0.0",
      );
      $this->author = 'Guillaume Martin';
      $this->contact = 'guillaumemartin.dev@gmail.com';
      $this->url = 'https://github.com/ryltar/PasswordStrength';
    }
    function hooks()
      {
        return array(
          "EVENT_LAYOUT_RESOURCES" => 'scripts',
        );
      }
    function scripts()
      {
        echo '<script type="text/javascript" src="' . plugin_file( 'PasswordStrength.js' ) . '"></script>';
      }
 }
?>
