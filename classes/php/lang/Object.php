<?php
if (!defined('FaabBB'))
	exit();

/**
 * Class Object is the root of the class hierarchy. 
 * Every class has Object as a superclass. 
 * All objects implement the methods of this class.
 * 
 * @version Version 3.008 ALPHA
 * @copyright Copyright &copy; 2011, Oracle
 * @author Fabian M. 
 */
class Object {
	
	/**
	 * Constructs a new Object.
	 */
	public function __construct() {
		$this->construct();
	}
	
	/**
	 * Constructs a new Object.
	 */
	public function construct() {
		
	}
	
	
	/**
	 * Indicates whether some other object is "equal to" this one.
	 * 
	 * @param $obj the reference object with which to compare.
	 * @return <code>true</code> if this object is the same as the obj argument; 
	 * 	<code>false</code> otherwise.
	 */
	public function equals(Object $obj) {
		return $this == $obj;
	}
	
	/**
	 * Returns a string representation of the object. 
	 * 
	 * @return a string representation of the object.
	 */
	public function toString() {
		return $this->__toString();
	}
	
	/**
	 * Returns a hash code value for the object. 
	 * 
	 * @return a hash code value for this object.
	 */
	public function hashCode() {
		return spl_object_hash($this);
	}
	
	/**
	 * Returns the runtime class of an object.
	 * 
	 * @return The php.lang.Class object that represents the runtime class of the object.
	 */
	public final function getClass() {
		// TODO: FINISH this
	}
	
	/**
	 * Creates and returns a copy of this object.
	 * 
	 * @return a clone of this instance.
	 */
	public function clone_() {
		// TODO: FINISH this
	}
}

?>