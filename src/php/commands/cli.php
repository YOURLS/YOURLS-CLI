<?php

/**
 * Get information about YOURLS-CLI itself.
 */

YOURLS_CLI::add_command( 'cli', 'CLI_Command' );

class CLI_Command extends YOURLS_CLI_Command {

	/**
	 * Print YOURLS-CLI version.
	 */
	function version() {
		YOURLS_CLI::line( 'YOURLS-CLI ' . YOURLS_CLI_VERSION );
	}

	/**
	 * Print various data about the CLI environment.
	 *
	 */
	function info() {
		$php_bin = defined( 'PHP_BINARY' ) ? PHP_BINARY : getenv( 'YOURLS_CLI_PHP_USED' );

        YOURLS_CLI::line( "PHP binary:\t" . $php_bin );
        YOURLS_CLI::line( "PHP version:\t" . PHP_VERSION );
        YOURLS_CLI::line( "php.ini used:\t" . get_cfg_var( 'cfg_file_path' ) );
        YOURLS_CLI::line( "YOURLS-CLI root dir:\t" . YOURLS_CLI_ROOT );
        YOURLS_CLI::line( "YOURLS-CLI version:\t" . YOURLS_CLI_VERSION );
	}

}
