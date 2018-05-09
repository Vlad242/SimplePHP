<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="/post/create" method="post">
                            <div class="form-group">
                                <label>User name</label>
                                <input class="form-control" type="text" name="username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                            <br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>