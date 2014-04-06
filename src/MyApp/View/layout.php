<? 
use TinyMVC\Model\Cache;

?>

<!DOCTYPE html>
<html>
<head>
    <title>TinyMVC - Application</title>
    
    <link href="/ressource/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="container">
    <div>
        Page of Markus
    </div>
    <?= $content ?>
</div>

<script src="/lib/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/ressource/js/MyMVC.js" type="text/javascript"></script>

<script src="<?= Cache::getJSPath() ?>" type="text/javascript"></script>

</body>
</html>