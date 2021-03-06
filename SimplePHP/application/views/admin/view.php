<div class="center">
    <div>
        <h2><?php echo $title; echo $post['id'];?></h2>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card-deck">
            <div class="card">
                <img class="center" src="<? echo $post['image']; ?>" alt="Image" height="320" width="240">
                <div class="card-body">
                    <div class="card-title"><b><? echo $post['title']; ?> </b>
                        <?php if ($post['status']):?>
                            <span class="badge badge-success">Done :)</span>
                        <?php else: ?>
                            <span class="badge badge-warning">In progress :|</span>
                        <?php endif; ?>
                    </div>
                    <hr/>
                    <p class="card-text"><? echo $post['content']; ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Created by <? echo $post['username']; ?>(<? echo $post['email']; ?>)</small>
                </div>
            </div>
        </div>
    </div>
</div>