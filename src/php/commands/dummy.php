<?php

YOURLS_CLI::add_command( 'dummy', 'Dummy_Command');

/**
 * Implement dummy command (example)
 *
 * @package yourls-cli
 */
class Dummy_Command extends YOURLS_CLI_Command {

    /**
     * Dummy function with 2 required parameters, 'ozh' and 'leo'
     *
     * Example: yourls dummy required --ozh=1337 --leo="hello world"
     */
    public function required( $args, $assoc_args ) {
        YOURLS_CLI::check_required_args( array( 'ozh', 'leo' ), $assoc_args );
        
        YOURLS_CLI::success( sprintf( 'Ozh is "%s" and Leo is "%s"', $assoc_args['ozh'], $assoc_args['leo'] ) );
    }
    
    /**
     * Dummy function with 1 required numeric arg
     *
     * Example: yourls dummy numeric 1337
     */
    public function numeric( $args, $assoc_args ) {
        $check = YOURLS_CLI::get_numeric_arg( $args, 0, "Dummy ID" );
        
        YOURLS_CLI::success( sprintf( '%d is a numeric argument', $check ) );
    }
    
    /**
     * Dummy function with a progress bar
     *
     * Example: yourls dummy progress
     */
    public function progress( $args, $assoc_args ) {
        $progress = YOURLS_CLI::progress_bar( 'Doing something', 100 );
        for ( $i = 0; $i < 100; $i++ ) {
            $progress->tick();
            usleep( 50000 );
        }
        $progress->finish();
        
        YOURLS_CLI::success( 'Something done' );
    }
 
}