<?php
	require_once('filebrowser.php');

	/*
	 * Add your filebrowser definition code here
	 */

    if($_GET['path']){
        $currentDirPath = $_GET['path'];
    }

    $filebrowser = new FileBrowser('/home/raj/', $currentDirPath, array('md','php'));
    if(isset($_GET['up']) && $_GET['up']==1 ){
        $filebrowser->Up();
    }
    $contents = $filebrowser->get();



?>
<!doctype html>
<html lang="en">
 <head>
  <title>File browser</title>
     <style>
         .typeofdir{
             background: url("dir.gif") top left no-repeat;
             padding-left: 16px;

         }
         .typeoffile {
             background: url("file.png") top left no-repeat;
             padding-left: 16px;
         }
     </style>
 </head>
 <body>
  <!-- Output file list HTML here -->
 <ul>
    <li><a href="/?up=1">Up</a></li>
     <?php  foreach($contents['dirs'] as $dir):      ?>
     <li class="typeofdir"><a href="/?path=<?= $dir['path'] ?>"><?=$dir['name']?></a></li>
     <?php endforeach;?>
     <?php  foreach($contents['files']  as $file):      ?>
     <li class="typeoffile"><?=$file['name']?></li>
     <?php endforeach;?>

 </ul>
 </body>
</html>