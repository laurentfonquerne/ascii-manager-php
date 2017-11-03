<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">
    SYMBOLS
    <small class="glyphicon glyphicon-book"></small>
</h1>
<hr/>
<?php include __DIR__ . "./../ui/counter.php"; ?>
<?php include __DIR__ . "./../ui/alert-box.php"; ?>

<?php if (array_key_exists("user", $_SESSION )) : ?>
<?php     $level = $_SESSION["user"]["level"];    ?>
<?php endif                                       ?>

<section>
    
    <?php if (isset($model->results)): ?>
    <?php foreach ($model->results as $object): ?>
    <ul>
        <li class="list-inline">
            <a class="btn btn-primary"
            href="./admin/symbols?action=manage">
            <?= $object->symbols_name ?></a>
            <a class="btn btn-primary"
            href="./admin/symbols?action=manage">
            <?= $object->symbols_type ?></a>
            <a class="btn btn-primary"
            href="./admin/symbols?action=manage">
            <?= $object->symbols_value ?></a>
            <?php if ($level === "superAdmin") : ?>
                <a class="btn btn-info glyphicon glyphicon-minus" 
                href="./admin/symbols?action=manage&symbols_value=<?= urlencode($object->symbols_value) ?>">
                </a>
            <?php endif ?>        
            <br/>
        </li>
    </ul>
    <?php endforeach ?>
    <?php endif ?>
    
</section>       

<?php if ($level === "superAdmin") : ?>
    <section class="container-fluid col-xs-12">
        <form action="" method="post">
            <div class="container-fluid col-xs-3">
                
                <input type="symbols_name" 
                name="symbols_name" class="form-control" placeholder="symbols name">
            </div>
            <div class="container-fluid col-xs-1">
                
                <input type="symbols_type" 
                name="symbols_type" class="form-control" placeholder="A">
            </div>
            <div class="container-fluid col-xs-1">
                
                <input type="symbols_value" 
                name="symbols_value" class="form-control" placeholder="A">
            </div>
            <div class="container-fluid col-xs-1"><label></label>
                <button type="submit" class="btn btn-info glyphicon glyphicon-plus"></button>
            </div>
        </form>
    </section>    
<?php endif ?>       
<?php include __DIR__ . "./../footer.php"; ?>