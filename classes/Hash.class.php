<?php
 
/**
 * Hash class
 *
 * PHP version 5.5
 */
class Hash
{
  
  private function __construct() {}  // disallow creating a new object of the class with new Hash()

  private function __clone() {}  // disallow cloning the class


  /**
   * Get a hash of the text
   *
   * @param string $text  The cleartext
   * @return string       The hash
   */
  public static function make($text)
  {
    return password_hash($text, PASSWORD_DEFAULT);
  }


  /**
   * Compare text to its hash
   *
   * @param string $text  The cleartext
   * @param string $hash  The hash
   * @return boolean
   */
  public static function check($text, $hash)
  {
    return password_verify($text, $hash);
  }

}
