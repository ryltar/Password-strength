<?php
  /** PasswordStrength Plugin declaration
   */
class PasswordStrengthPlugin extends MantisPlugin
 {
   # Declare your plugin here
   # Properties will be used by Mantis plugin's system
   function register()
    {
      $this->name = 'PasswordStrength';
      $this->description = 'A plugin to enhance password security';
      $this->page = '';
      $this->version = '0.0.1';
      $this->requires = array(
        "MantisCore" => "2.0.0",
      );
      $this->author = 'Guillaume Martin';
      $this->contact = 'guillaumemartin.dev@gmail.com';
      $this->url = 'https://github.com/ryltar/PasswordStrength';
    }
    # Hooked functions runs when the event is triggered
    # Here we need to display a '<scrit>' link into Footer
    # So we trigger the EVENT_LAYOUT_PAGE_FOOTER so Jquery can run after page is fully loaded
    function hooks()
      {
        return array(
          "EVENT_LAYOUT_RESOURCES" => 'scripts',
        );
      }
    # This method will echo our '<script>' link to Jquery
    function scripts()
      {
        # Implement the Jquery files
        echo '<script type="text/javascript" src="' . plugin_file( 'PasswordEnhancement.js' ) . '"></script>';
      }
 }
?>
