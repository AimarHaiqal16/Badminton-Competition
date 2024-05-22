<html>
<body>
<?php

	session_start();
	if(session_destroy()){
		header("location: index.html");
	}

?>
</body>
</html>



