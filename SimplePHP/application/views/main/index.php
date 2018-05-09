<div class="card-deck">
    <?php foreach ($posts as $post): ?>
        <div class="card">
            <img class="card-img-top" src="<? echo $post['image'] ?>" alt="Image" height="320" width="240">
            <div class="card-body">
                <div class="card-title"><b><? echo $post['title'] ?> </b>
                    <?php if ($post['status']):?>
                        <span class="badge badge-success">Done :)</span>
                    <?php else: ?>
                        <span class="badge badge-warning">In progress :|</span>
                    <?php endif; ?>
                </div>
                <hr/>
                <p class="card-text"><? echo $post['content'] ?></p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Created by <? echo $post['username'] ?>(<? echo $post['email'] ?>)</small>
            </div>
        </div>
    <?php endforeach;?>
</div>
<br/>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align="center">
                <?php echo $links; ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<hr>
<br/>