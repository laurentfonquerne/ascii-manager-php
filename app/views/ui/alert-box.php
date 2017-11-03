<?php if (isset($model->success) || isset($model->error) ): ?> 
    <section class="alert alert-<?= isset($model->success) ? "success" : "danger" ?> container_fluid>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= isset($model->success) ? $model->success : $model->error ?></strong>
    </section>
<?php endif ?>