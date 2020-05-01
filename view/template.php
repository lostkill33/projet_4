<!DOCTYPE html>
<html lang="fr">
    <head>
	    <meta charset="utf-8" />
		<link rel="stylesheet" href="./style.css" />
		<meta name="viewport" content="width=device-width, user-scalable=0"/>
		<title> <?php echo $title ?> </title>
		<meta name="description" content="Le blog">
        <script src="https://cdn.tiny.cloud/1/x8ug5oy3wkl0xpl4saj7cmfldvuup4xgfm2c1dn6j6bgcr1h/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({ selector:'textarea#editable' });</script>
        
	</head>
	  
	<body>
        <?php require ("./view/nav_bar.php"); ?>
        <?= $content;
        if (!empty($error_msg))
        {
            echo '<div class="error">' . $error_msg . '</div>';
        }
        
        if (!empty($succes_msg))
        {
           echo '<div class="succes">' . $succes_msg . '</div>';
        }

            ?>
	</body>
</html> 	