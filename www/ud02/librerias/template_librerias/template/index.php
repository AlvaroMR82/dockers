<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="header" class="container">

	<div id="logo">
	<?php
   include("logo.php"); 
   logo();
      ?> 
		
	</div>
	
	<div id="menu">
	<?php
   include("menu.php"); 
   menu();
      ?> 
		
	</div>
	
</div>

<div id="pictures">
<?php
   include("pictures.php"); 
   pictures();
      ?> 

	
</div>

<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
			
				<div id="content">
				<?php
   				include("content.php"); 
   				content();
   				   ?> 
				</div>
				
				<div id="sidebar">
				<?php
   				include("sidebar.php"); 
   				sidebar();
   				   ?> 
					
				</div>
				
			</div>
		</div>
	</div>
</div>

<div id="footer">
				<?php
   				include("footer.php"); 
   				footer();
   				   ?> 

	
</div>

</body>
</html>
