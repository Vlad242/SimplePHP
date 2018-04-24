<p> GENERAL </p>

<div class="card-deck">
    <?php foreach ($posts as $post): ?>
    <div class="card">
        <img class="card-img-top" src="<? echo $post['image'] ?>" alt="Image">
        <div class="card-body">
            <h5 class="card-title"><? echo $post['title'] ?></h5>
            <p class="card-text"><? echo $post['content'] ?></p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Created by <? echo $post['username'] ?>(<? echo $post['email'] ?>)</small>
        </div>
    </div>
    <?php endforeach;?>
</div>
