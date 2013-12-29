<!DOCTYPE html>
<html>
<head>
    <title>MyMVC - Application</title>
    
    <link href="ressource/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="container">
    <h1><?= $title ?></h1>
    <div id="pageInfo"></div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <? foreach($xmlData as $person): ?>
            <? if ($person->getId() < 10): ?>
            <tr>
                <td><?= $person->getId() ?></td>
                <td><?= $person->getName() ?></td>
                <td><?= $person->getEmail() ?></td>
                <td><?= $person->getCompany() ?></td>
                <td><?= $person->getCity() ?></td>
            </tr>
            <? else :?>
                <? //for performance test ?>
                <? $person->getId() ?>
                <? $person->getName() ?>
                <? $person->getEmail() ?>
                <? $person->getCompany() ?>
                <? $person->getCity() ?>
            <? endif; ?>
            <? endforeach; ?>
        </tbody>
    </table>

    <div id="pageRes">
        Total Records: <strong><?= count($xmlData) ?></strong> <br>
        Memory Peak-Usage: <strong><?= round(memory_get_peak_usage() / (1024*1024),2) ?>MB</strong><br>
        Page generated in: <strong><?= number_format(round((microtime(true) - START_TIME),3),3) ?>s</strong><br>
    </div>
</div>

<script src="lib/jquery-1.10.2.js" type="text/javascript"></script>
<script src="ressource/js/MyMVC.js" type="text/javascript"></script>

</body>
</html>