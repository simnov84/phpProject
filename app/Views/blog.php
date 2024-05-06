<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel">
                    <div class="card-content">

                        <span class="card-title activator grey-text text-darken-4">Blog <a
                                class="right waves-effect waves-light btn-small modal-trigger" href="#modal1">Create
                                Blog</a>
                            <div id="modal1" class="modal">
                                <div class="modal-content">
                                    <div class="row">
                                        <form class="col s12" action="<?php echo base_url('createBlog'); ?>"
                                            method="post">
                                            <div class="row">
                                                <h4>Create Post</h4>
                                                <div class="input-field col s12">
                                                    <input id="first_name2" type="text" class="validate" name="title">
                                                    <label class="active" for="first_name2">Title</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <textarea id="textarea2" class="materialize-textarea"
                                                        data-length="120" name="description"></textarea>
                                                    <label for="textarea2">Description</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <a href="<?php echo base_url('createBlog'); ?>"
                                                    class="modal-close waves-effect waves-green btn">Create Post</a> -->
                                                <button type="submit"
                                                    class=" modal-close waves-effect waves-green btn">Create
                                                    Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </span>

                        <table>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <?php $c=1; ?>
                            <?php foreach($blogs as $blog): ?>
                            <tr>
                                <td><?php echo $c++; ?></td>
                                <td><?php echo $blog['title']; ?></td>
                                <td><?php echo $blog['description']; ?></td>
                                <td>
                                    <button data-target=" viewModal <?php echo $blog['id']; ?>"
                                        class="btn indigo modal-trigger">View</button>

                                    <div id="viewModal <?php echo $blog['id']; ?>" class="modal">
                                        <div class="modal-content">
                                            <div class="row">
                                                <form class="col s12" method="get"
                                                    action="<?php echo base_url('/viewBlog/(:num)'); ?>">
                                                    <div class="row">
                                                        <h4>View Post</h4>
                                                        <div class="input-field col s12">
                                                            <input id="first_name2" type="text" class="validate"
                                                                name="title" readonly
                                                                value="<?php echo $blog['title']; ?>">
                                                            <label class="active" for="first_name2">Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <textarea id="textarea2" class="materialize-textarea"
                                                                data-length="120" name="description" readonly
                                                                value="<?php echo $blog['description']; ?>"></textarea>
                                                            <label for="textarea2">Description</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="<?php echo base_url('viewBlog/'.$blog['id']); ?>"
                                                            class="modal-close
                                                            waves-effect waves-green btn">View
                                                            Data</a>
                                                        <!-- <button type="submit" class="modal-close
                                                            waves-effect waves-green btn">View
                                                            Data</button> -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <button data-target="editModal <?php echo $blog['id']; ?>"
                                        class="btn orange modal-trigger">Edit</button>

                                    <div id="editModal <?php echo $blog['id']; ?>" class="modal">
                                        <div class="modal-content">
                                            <div class="row">
                                                <form class="col s12" method="post"
                                                    action="<?php echo base_url('updateBlog'); ?>">
                                                    <div class=" row">
                                                        <h4>Edit Post</h4>
                                                        <div class="input-field col s12">
                                                            <input id="first_name2" type="text" class="validate"
                                                                name="title" value="<?php echo $blog['title']; ?>">
                                                            <label class="active" for="first_name2">Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <textarea id="textarea2" class="materialize-textarea"
                                                                data-length="120" name="description"
                                                                value="<?php echo $blog['description']; ?>"></textarea>
                                                            <label for="textarea2">Description</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                                                    <div class="modal-footer">
                                                        <!-- <a href="updateBlog"
                                                            class="modal-close waves-effect waves-green btn">Update
                                                            Post</a> -->
                                                        <button class="modal-close waves-effect waves-green btn"
                                                            type="submit">Update
                                                            Post</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn red modal-trigger"
                                        data-target="deleteModal <?php echo $blog['id']; ?>">Delete</button>

                                    <div id="deleteModal <?php echo $blog['id']; ?>" class="modal">
                                        <div class="modal-content">
                                            <div class="row">
                                                <form class="col s12" method="post"
                                                    action="<?php echo base_url('deleteBlog');?>">
                                                    <!-- <div class=" row"> -->
                                                    <h4>Delete Post</h4>
                                                    <!-- </div> -->
                                                    <div class="row">
                                                        <div class="col s12">Are you sure to delete?</div>
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $blog['id']; ?>">
                                                        <div class="modal-footer">
                                                            <!-- <a href="<?php echo base_url('deleteBlog'); ?>"
                                                                class="modal-close waves-effect waves-green btn">Delete</a> -->
                                                            <!-- <a href="<?php echo base_url('deleteBlog'); ?>"
                                                                class="modal-close waves-effect waves-green btn">No</a> -->
                                                            <button type="submit"
                                                                class="modal-close waves-effect waves-green btn">
                                                                Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>
    <script>
    $(document).ready(function() {
        $('.modal').modal();
    });
    </script>
</body>

</html>