<?php 

	error_reporting(E_ALL);

	$url = $_POST['url'];
	$title = $_POST['title'];
	$type = $_POST['type'];
	$image = $_POST['image'];
	$description = $_POST['description'];
	
	if(empty($image)) {
	
		$image = "http://opengraphprotocol.org/open_graph_protocol_logo.png";
	
	}
	
	$fileName = md5($url) . ".html";
	
	$nodeUrl =  "http://" . $_SERVER['HTTP_HOST'] . "/" . $fileName;
	
	$nodeUrl = urlencode($nodeUrl);
	
	$likePage = '<html xmlns:og="http://ogp.me/ns#">
	<head>
		<title>' . $title . '</title>
		<meta property="fb:app_id" content="141684015857776" />
		<meta property="og:title" content="' . $title . '" />
		<meta property="og:type" content="' . $type . '" />
		<meta property="og:url" content="' . $url . '" />
		<meta property="og:image" content="' . $image . '" />
		<meta property="og:description" content="' . $description . '" />
		<meta property="og:site_name" content="add2graph.com" />
		
	</head>
	<body>
			<div id="fb-root"></div>
		<script src="http://connect.facebook.net/en_US/all.js"></script>
	<script>
	  FB.init({appId: "141684015857776", status: true, cookie: true, xfbml: true});
	</script>
		<h1>Node Created</h1>
		<table>
			<tr>
				<td>
					og:title
				</td>
				<td>
					' . $title . '
				</td>
			</tr>
						<tr>
				<td>
					og:type
				</td>
				<td>
					' . $type . '
				</td>
			</tr>
						</tr>
						<tr>
				<td>
					og:url
				</td>
				<td>
					' . $url . '
				</td>
			</tr>
						</tr>
						<tr>
				<td>
					og:image
				</td>
				<td>
					' . $image . '
				</td>
			</tr>
						</tr>
						<tr>
				<td>
					og:description
				</td>
				<td>
					' . $description . '
				</td>
			</tr>
		</table>
	<p>
	<fb:like href='. $nodeUrl .'></fb:like>
	</p>
	</body>
</html>';

	$fileHandle = fopen($fileName, 'w');
	fwrite($fileHandle, $likePage);
	fclose($fileHandle);
	
	header('Location:' . $fileName);
	
	exit;
?>