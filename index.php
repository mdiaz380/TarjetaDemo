<?php

require 'includes/config.php';
require 'includes/aboutPage.class.php';
require 'includes/vcard.class.php';

$profile = new AboutPage($info);

if(array_key_exists('json',$_GET)){
	$profile->generateJSON();
	exit;
}
else if(array_key_exists('vcard',$_GET)){
	$profile->downloadVcard();
	exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Online info page of <?php echo $profile->fullName()?>. Learn more about me and download a vCard." />

        <title>PHP Example  | Demo</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>

		<section id="infoPage">
	
    		<img src="<?php echo $profile->photoURL()?>" alt="<?php echo $profile->fullName()?>" width="164" height="164" />

            <header>
                <h1><?php echo $profile->fullName()?></h1>
                <h2>POD: <?php echo file_get_contents('/etc/hostname', true) ?></h2>
            </header>
            
            <p class="description"><?php echo nl2br($profile->description())?></p>
            
            <ul class="vcard">
                <li class="fn"><?php echo $profile->fullName()?></li>
                <li class="org"><?php echo $profile->company()?></li>
                <li class="tel"><?php echo $profile->cellphone()?></li>
                <li><a class="url" href="<?php echo $profile->website()?>"><?php echo $profile->website()?></a></li>
            </ul>
            
		</section>
        
        <footer>
	        <h2>POD: <?php echo file_get_contents('/etc/hostname', true) ?> </h2>
            <a class="tzine" href="https://www.openshift.com/">Info, links &amp; more: </a>
        </footer>
          
    </body>
</html>
