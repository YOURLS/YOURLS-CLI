<?php

if ( 'cli' !== PHP_SAPI ) {
    echo "This is CLI only.\n";
    die(-1);
}

if ( version_compare( PHP_VERSION, '5.3.0', '<' ) ) {
    printf( "Error: requires PHP %s or newer. You are running version %s.\n", '5.3.0', PHP_VERSION );
    die(-1);
}

define( 'YOURLS_CLI_ROOT', __DIR__ );

define( 'YOURLS_CLI_VERSION', '0.1-alpha' );

// Constant that can be used to check if we are running yourls-cli or not
define( 'YOURLS_CLI', true );

// Include the yourls-cli classes
require_once YOURLS_CLI_ROOT . '/YOURLS-CLI/class-yourls-cli.php';
require_once YOURLS_CLI_ROOT . '/YOURLS-CLI/class-yourls-cli-command.php';

// Load dependencies
YOURLS_CLI::load_dependencies();

// Get the cli arguments
list( $arguments, $assoc_args ) = YOURLS_CLI::parse_args( array_slice( $GLOBALS['argv'], 1 ) );

// Global parameter : --quiet/--silent
define( 'YOURLS_CLI_QUIET', isset( $assoc_args['quiet'] ) || isset( $assoc_args['silent'] ) );

// Global parameter : --version (with no more arguments)
if ( isset( $assoc_args['version'] ) && empty( $arguments ) ) {
    $arguments = array( 'cli', 'version' );
    unset( $assoc_args['version'] );
}

// Global parameter :  --require
if ( isset( $assoc_args['require'] ) ) {
    require $assoc_args['require'];
    unset( $assoc_args['require'] );
}

// Global parameter :  --path
if ( !empty( $assoc_args['path'] ) ) {
	define( 'YOURLS_ROOT', rtrim( $assoc_args['path'], '/' ) );
    unset( $assoc_args['path'] );
} else {
    // Assume YOURLS root is current directory
	define( 'YOURLS_ROOT', $_SERVER['PWD'] );
}

YOURLS_CLI::run_command( $arguments, $assoc_args );
