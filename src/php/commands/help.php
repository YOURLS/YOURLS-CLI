<?php

YOURLS_CLI::add_command( 'help', 'Help_Command' );

/**
 * Implement help command
 *
 * @package yourls-cli
 */
class Help_Command extends YOURLS_CLI_Command {

	public function __construct( $args ) {
		if ( empty( $args ) ) {
			$this->general_help();
			return;
		}

		$this->show_available_subcommands( $args[0] );
	}

	private function show_available_subcommands( $command ) {
		$class = YOURLS_CLI::load_command( $command );
		YOURLS_CLI_Command::describe_command( $class, $command );
	}

	private function general_help() {
		YOURLS_CLI::line( 'Available commands:' );
		foreach ( YOURLS_CLI::load_all_commands() as $command => $class ) {
			if ( 'help' == $command )
				continue;

			$out = "    yourls $command";

			$methods = YOURLS_CLI_Command::get_subcommands( $class );

			if ( !empty( $methods ) ) {
				$out .= ' [' . implode( '|', $methods ) . ']';
			}

			YOURLS_CLI::line( $out );
		}

		YOURLS_CLI::line(<<<EOB

See 'yourls help <command>' for more information on a specific command.

Global parameters:
    --path=<path>       set the current path to the YOURLS install
    --require=<path>    load a certain file before running the command
    --quiet             suppress informational messages
    --version           print yourls-cli version
EOB
		);
	}
}
