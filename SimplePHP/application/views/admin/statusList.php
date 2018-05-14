<div class="container">
    <h2>Posts</h2>
    <p>Press <a class="btn btn-warning" href="">Change</a> button to change post status!</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
            <th>CHANGE</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><? echo $post['id']; ?></td>
                <td><? echo $post['username']; ?></td>
                <td><? echo $post['email']; ?></td>
                <td><? echo $post['title']; ?></td>
                <td><? echo $post['content']; ?></td>
                <td>
                    <?php if ($post['status']):?>
                        <span class="badge badge-success">Done :)</span>
                    <?php else: ?>
                        <span class="badge badge-warning">In progress :|</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/admin/statusChange/<? echo $post['id']; ?>" class="btn btn-warning"> Change </a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>