<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="/post/create" method="post" id="uploadForm">
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
                                <input class="form-control" type="file" name="image" id="file" accept="image/png,image/gif,image/jpeg" onchange="getImage(this);" >
                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                                <div id="accordion" onclick="getData();">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne" >Preview</a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="card-deck">
                                                    <div class="card">
                                                        <img class="center" id="image" src="" alt="" align="middle">
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <b id="title"></b>
                                                                <span class="badge badge-warning">In progress :|</span>
                                                            </div>
                                                            <hr/>
                                                            <p class="card-text" id="content"></p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">Created by <b id="username"></b> (<b id="email"></b>)</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>