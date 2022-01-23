<link href="CSS/viewPlatform.css" rel="stylesheet">
<h1>Plataformas</h1>
<?php
require('../controller/dbConnectionPlatform.php');
$listE = listPlatform();
foreach ($listE as $listItem) {
?>

<table>
<thead>
<th>ID</th>
<th>NAME</th>
<th>ACTION</th>
</thead>
    <tbody>
    <td><?php echo $listItem->getId() ?></td>
    <td><?php echo $listItem->getName() ?></td>
    <td><button class="button1">Borrar</button><button CLASS="button2">Editar</button></td>
    </tbody>
</table>

    <?php
    }
        ?>