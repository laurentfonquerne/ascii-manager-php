<?php include __DIR__ . "./../header.php"; ?>

<h1 class="text-center">
    SIGN IN 
    <small class="glyphicon glyphicon-book"></small>
</h1>

<hr/>

<?php include __DIR__ . "./../ui/counter.php"; ?>
<?php include __DIR__ . "./../ui/alert-box.php"; ?>

<?php if (!$user): ?>
    <section class="container-fluid col-xs-12">
        <form action="" method="post">
            <div class="container-fluid col-xs-3">
                <input name="user_mail" class="form-control" placeholder="Email">
            </div>
            <div class="container-fluid col-xs-3">
            <input name="user_pswd" "type="password" class="form-control" placeholder="pswd">
            </div>
            <div class="container-fluid col-xs-1">
            <input name="token" value="<?= $token ?>" type="hidden" class="form-control" placeholder="">
            <button type="submit" class="btn btn-info glyphicon glyphicon-ok"></button>
            </div>
        </form>
    </section>
<?php endif; ?>

<?php include __DIR__ . "./../footer.php"; ?>