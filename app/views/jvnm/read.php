<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">
    VIDEO GAMES
    <small class="glyphicon glyphicon-book"></small>
</h1>
<hr/>
<?php include __DIR__ . "./../ui/counter.php"; ?>
<?php include __DIR__ . "./../ui/alert-box.php"; ?>

<section>
    <table> 
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>possesseur</th>
            <th>console</th>
            <th>prix</th>
            <th>nbre_joueurs_max</th>
            <th>commentaires</th>
        </tr>   
        <?php if (isset($model->results)): ?>
        <?php foreach ($model->results as $object): ?>
        <tr>
            <td><?= $object->ID ?></td>
            <td><?= $object->nom ?></td>
            <td><?= $object->possesseur ?></td>
            <td><?= $object->console ?></td>
            <td><?= $object->prix ?></td>
            <td><?= $object->nbre_joueurs_max ?></td>
            <td><?= $object->commentaires ?></td>
        </tr>
    <?php endforeach ?>
    <?php endif ?>
    </table>
    </section>       

<?php include __DIR__ . "./../footer.php"; ?>