

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
				foreach(glob("songs/*.mp3") as $file) 
				{	
					if(isset($_REQUEST["playlist"])){
						$tracks=file("songs/".$_REQUEST["playlist"]);
						foreach ($tracks as $value) {
							
							// $filepath="songs/".$value;	
							// print($filepath);	
			?>
							<li class="mp3item">
							<a href="songs/<?= $value?>"><?= $value /*."  " . formatSizeUnits(filesize($filepath))*/ ?></a>
					    	</li>
			<?php
						}
						break; 
					}
					else{
						// print($file);
			?>	
						<li class="mp3item">
						<a href="songs/<?= basename($file)?>"><?= basename($file) ."  " . formatSizeUnits(filesize($file)) ?></a>
						</li>
			<?php 
					} 
				}

			?>

			<?php
				foreach(glob("songs/*.txt") as $file) 
				{
			?>
					<li class="playlistitem">
					<a href="music.php?playlist=<?= basename($file)?>"><?= basename($file) ."  " . formatSizeUnits(filesize($file)) ?></a>
			    	</li>
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
