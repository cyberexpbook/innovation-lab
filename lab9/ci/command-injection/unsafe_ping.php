<html>
	<body>
		
		<h1>Unsafe PING</h1>			
		<h4>Ping Utilities</h4>
		
		<p>Enter IP or URL:</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input type="text" name="ip_url" />
			<input type="submit" />
		</form>
		
		<?php 
            if( isset( $_POST[ 'ip_url' ]  ) ) {
                // Get input
                $target = $_POST[ 'ip_url' ];

                // Determine OS and execute the ping command.
                if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
                    // Windows
                    $cmd = shell_exec( 'ping  ' . $target );
                }
                else {
                    // *nix
                    $cmd = shell_exec( 'ping  -c 4 ' . $target );
                }

                // Feedback for the end user
                echo '<pre>'.$cmd.'</pre>';
            }
		?>
	</body>
</html>

<?php



?>