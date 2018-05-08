<div class="card-deck">
    <?php foreach ($posts as $post): ?>
        <div class="card">
            <img class="card-img-top" src="<? echo $post['image'] ?>" alt="Image" height="320" width="240">
            <div class="card-body">
                <div class="card-title"><b><? echo $post['title'] ?></b></div>
                <hr/>
                <p class="card-text"><? echo $post['content'] ?></p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Created by <? echo $post['username'] ?>(<? echo $post['email'] ?>)</small>
            </div>
        </div>
    <?php endforeach;?>
</div>
<div class="col-md-4">
    <?php echo $links; ?>
</div>
