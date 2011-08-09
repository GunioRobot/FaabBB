<?php
if (!defined('FaabBB')) 
	exit();
	
/**
 * The {@link CoreErrorHandler} will handle any php errors/exceptions during the runtime.
 * But... The {@link CoreErrorHandler} doesn't expect a error in the core itself.
 * The {@link CoreErrorHandler} will report the error to the core log file and at shutdown errors, it will show 
 * 	a error page.
 * When implementing your application with the {@link CoreErrorListener} in your application class,
 *  you will be able to manage the error page, report handling, etc.
 * 
 * @category Core error handling
 * @version Version 3.007 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class CoreErrorHandler {
	
	
	/**
	 * Initializes the CoreErrorHandler. 
	 */
	public static function init() {  
		CoreLogger::info("Setting error handler to " . ERROR_HANDLING_METHOD); 
		set_error_handler( ERROR_HANDLING_METHOD);
		CoreLogger::info("Setting error handler to " . EXCEPTION_HANDLING_METHOD); 
		set_exception_handler(EXCEPTION_HANDLING_METHOD);
		CoreLogger::info("Registering shutdown function " . SHUTDOWN_HANDLING_METHOD); 
		register_shutdown_function(SHUTDOWN_HANDLING_METHOD);
		CoreLogger::info("CoreErrorHandler initialized."); 
	}
	
	/**
	 * This method is invoked when an error is found.
	 */
	public static function onError($errno, $errstr, $errfile, $errline) {
		$traces = debug_backtrace();
		$err = "Error in thread \"main\"\n";
		foreach($traces as $trace) {
			$err .= "	at " . $trace['class'] . '::' . $trace['function'];
		}
		CoreLogger::severe($err);
		return true;
	}
	
	/**
	 * This method is invoked when an exception is thrown.
	 */
	public static function onException($exception) {
		$traces = debug_backtrace();
		$err = "Uncaught exception in thread \"main\"\n";
		foreach($traces as $trace) {
			$err .= "	at " . $trace['class'] . '::' . $trace['function'];
		}
		CoreLogger::severe($err);
	}
	
	/**
	 * This method is invoked when the runtime shutdown unexpectedly.
	 */
	public static function onShutdown() {
		if (Core::$STATE == CoreState::SUCCESS)
			return;
		$traces = debug_backtrace();
		$err = "Runtime error in thread \"main\"\n";
		foreach($traces as $trace) {
			$err .= "	at " . $trace['class'] . '::' . $trace['function'];
		}
		CoreLogger::severe("Runtime shutdown unexpectedly.\n" . $err);
	
	}
	

	
}
 



?>