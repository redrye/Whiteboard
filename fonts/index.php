	<?php
	function php4_scandir($dir, $listDir = true, $skipDots = false) {
		$dirArray = array();
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				if (($file != "." && $file != "..") || $skipDots == true) {
					if ($listDir == false) {
						if (is_dir($file)) {
							continue;
						}
					}
					array_push($dirArray, basename($file));
					}
			}
			closedir($handle);
		}
		return $dirArray;
	}
	$dir = './';
	?><html>

<table style="width:100%">
<tr>
	<td>Directory/File</td>
	<td>Date Modified</td>
	<td>Size</td>
</tr>
<?php
	$files = php4_scandir($dir);
	sort($files);
	foreach ($files as $file) {
		if($file != "index.php") {
			echo "<tr><td><a href='".$file."'>$file</a></td><td>".date("F d Y H:i:s.", filemtime($file))."</td><td>".filesize($file)."</td></tr>";
		}
	}

?>

</html>
