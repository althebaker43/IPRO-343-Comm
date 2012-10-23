<html>
	<head>
		<script>
		function displayDate()
		{
			document.getElementById("demo").innerHTML=Date();
		}
		
		</script>
		

		<title> <?=$title?></title>
	</head>

	<body>
		<h1> <?=$heading?></h1>
		<p id="demo">This is a paragraph.</p>
		<button type="button" onclick="displayDate()">Display Date</button>
		<ol>
			<?php foreach ($todo as $item ):?> 
				
			<li><?=$item?></li>
		<?php endforeach;?>
		</ol>
	</body>
</html>