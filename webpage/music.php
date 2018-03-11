

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>

		<div id="listarea">

			



			<ul id="musiclist">
			<?php
				include("function.php");
				$list = glob("songs/*.mp3");
				if(isset($_REQUEST["shuffle"])){
					if($_REQUEST["shuffle"]=="on"){
						shuffle($list);	
					}
				}
				// if(isset($_REQUEST["bysize"])){
				// 	if($_REQUEST["bysize"]=="on"){
				// 		$list_size;
				// 		$list_sorted;
				// 		for ($i=0; $i < count($list); $i++) {
				// 			$list_sorted[$i] = $list[$i]; 
				// 			$list_size[$i]=filesize($list[$i]);
				// 		}
				// 		for ($i=0; $i < count($list); $i++) {
				// 			for ($j=0; $j < count($list); $j++) { 
				// 				if ($list_size[$i]== filesize($list_sorted[$j]) && $list_sorted[$j]!= "E") {
				// 					$list[$i]=$list_sorted[$j];
				// 					$list_sorted[$j]="E";
				// 				}
				// 			}
				// 		}	
				// 	}
				// }
				foreach($list as $file) 
				{	
					if(isset($_REQUEST["playlist"])){
						$tracks=file("songs/".$_REQUEST["playlist"]);
						$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						if(isset($_REQUEST["shuffle"])){
							if($_REQUEST["shuffle"]=="on"){
								shuffle($tracks);	
							}
						}
						foreach ($tracks as $value) {
							
							$filepath="songs/".trim($value);
							// print($filepath);
								
			?>				
							<li class="mp3item">
							<a href="songs/<?= $value?>" download><?= $value ."  " . formatSizeUnits(filesize($filepath)) ?></a>
					    	</li>
			<?php
						}
			?>
						<li class="back-label">
							<a href="music.php">Back</a>
						</li>
			<?php			
						break; 
					}
					else{
						// print($file);
			?>	
						<li class="mp3item">
						<a href="songs/<?= basename($file)?>" download><?= basename($file) ."  " . formatSizeUnits(filesize($file)) ?></a>
						</li>
			<?php 
					} 
				}
			?>


			<?php
				if(!isset($_REQUEST["playlist"])){
					foreach(glob("songs/*.txt") as $file) 
					{			
			?>
						<li class="playlistitem">
						<a href="music.php?playlist=<?= basename($file)?>"><?= basename($file) ."  " . formatSizeUnits(filesize($file)) ?></a>
				    	</li>
			<?php	
					}
			?>
					<li><a href="music.php?shuffle=on">SHUFFLE</a></li>
					<li><a href="music.php?bysize=on">SORT BY SIZE</a></li>
			<?php
				}
			?>	
						
			</ul>




<!-- 			<ul id="musiclist">
				<li class="mp3item">
					<a href="songs/Be More.mp3">Be More.mp3</a>
					(5438375 b)
				</li>

				<li class="mp3item">
					<a href="songs/Drift Away.mp3">Drift Away.mp3</a>
					(5724612 b)
				</li>

				<li class="mp3item">
					<a href="songs/Hello.mp3">Hello.mp3</a>
					(1871110 b)
				</li>

				<li class="mp3item">
					<a href="songs/Panda Sneeze.mp3">Panda Sneeze.mp3</a>
					(58 b)
				</li>

				<li class="playlistitem">
					<a href="music.php?playlist=mypicks.txt">mypicks.txt</a>
				</li>

				<li class="playlistitem">
					<a href="music.php?playlist=playlist.txt">playlist.txt</a>
				</li>
			</ul> -->
		</div>
	</body>
</html>
