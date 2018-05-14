<h2>Posts</h2>
<p>Press <a class="btn btn-info" href="">View</a> button to view current post!</p>
<table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Title</th>
            <th>Content</th>
            <th>VIEW</th>
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
                    <a href="/admin/view/<? echo $post['id']; ?>" class="btn btn-info"> View </a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>