<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">
    FONTS
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
            href="./admin/fonts/<?= $object->font_name ?>?action=manage">
            <?= $object->font_name ?></a>
            <?php if ($level === "superAdmin") : ?>
                <a class="btn btn-info glyphicon glyphicon-minus" 
                href="./admin/fonts?action=manage&font_name=<?= $object->font_name ?>">
                </a>
            <?php endif ?>
        </li>
      
    </ul>
    <?php endforeach ?>
    <?php endif ?>
    
</section>       

<?php if ($level === "superAdmin") : ?>
    <section class="container-fluid col-xs-12">
        <form action="" method="post">
            <div class="container-fluid col-xs-3">
                
                <input type="font_name" 
                name="font_name" class="form-control" placeholder="font name">
            </div>
            <div class="container-fluid col-xs-1">
                
                <input type="font_line_height" 
                name="font_line_height" class="form-control" placeholder="A">
            </div>
            <div class="container-fluid col-xs-1"><label></label>
                <button type="submit" class="btn btn-info glyphicon glyphicon-plus"></button>
            </div>
        </form>
    </section>       
<?php endif ?>           
<?php include __DIR__ . "./../footer.php"; ?>