<?php

// Program to display URL of current page.
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";
  
// Here append the common URL characters.
$link .= "://";
  
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
  
// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];
      

// repertoires  gnorer dans les projets
$projectsListIgnore = array ('.','..','usage','logs','_old','tmp','phpmyadmin','PHP-Myadmin');



// recuperation des projets
$handle=opendir(".");
$projectContents = '';
while ($file = readdir($handle)) 
{
	if (is_dir($file) && !in_array($file,$projectsListIgnore)) 
	{	
		$projectContents .= '<div class="col">';
		
		
		$projectContents .= '<a href="'.$file.'" title="'.$file.'">';	
		
		$projectContents .= '<div class="card beschreibung shadow-sm" >';
		$filename = $file.'/thumbnail.jpg';

if (file_exists($filename)) {
    //echo "The file $filename exists";
$projectContents .= '<img class="card-img-top w-auto" src="'.$file.'/thumbnail.jpg" >';	
} else {
    //echo "The file $filename does not exist";
$projectContents .= '<img class="card-img-top w-auto" src="http://cdn.vineatech.de/maintenance/NoPic.png" >';	
}

		$projectContents .= '<span>'.$file.'</span>';
		$projectContents .= '</div></a></div>';
		$projectContents .= '';
		$projectContents .= '';
	}
}

closedir($handle);
if (!isset($projectContents))
	$projectContents = $langues[$langue]['txtNoProjet'];





$pageContents = <<< EOPAGE
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.vineatech.de/bootstrap/5.0.0-beta2/spacelab/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.vineatech.de/bootstrap/5.0.0-beta2/Restaurantly/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <style>
		body {
  padding-top: 5rem;
}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
			
.beschreibung {
    /*width: 320px;*/
    position: relative;
    
  
}

.beschreibung span {
color:White;
background-color: rgba(0, 0, 0, 0.6); 
    position: absolute;
    bottom: 0;
    width: 100%;
    line-height: 2em;
    text-align: center;
}
.beschreibung img {
    display: block;
}
</style>
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand">DEV.VineaTech.de</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        
		
      

      </ul>

    </div>
  </div>
</nav>

<main class="container">
	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
		$projectContents
	</div>
</main>
	<script src="https://cdn.vineatech.de/bootstrap/5.0.0-beta2/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.vineatech.de/bootstrap/5.0.0-beta2/Restaurantly/assets/vendor/glightbox/js/glightbox.min.js"></script>		      
</body>
</html>



	
	
EOPAGE;

echo $pageContents;
?>
