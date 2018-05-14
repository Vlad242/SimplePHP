<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="/admin/edit/<?php echo $data['id'];?>" method="post" id="uploadForm">
                            <div class="form-group">
                                <label>User name</label>
                                <input class="form-control" type="text" name="username" value="<?php echo  htmlspecialchars($data['username'],ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="<?php echo  htmlspecialchars($data['email'],ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="<?php echo  htmlspecialchars($data['title'],ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="content"><?php echo htmlspecialchars($data['content'],ENT_QUOTES); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>