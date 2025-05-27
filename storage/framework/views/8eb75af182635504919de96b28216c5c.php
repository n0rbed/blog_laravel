<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
         <div style="margin-top: 1cm;">
            <h2>Edit post</h2>
            <form action="/blogcrud/public/edit-post/<?php echo e($post->id); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-floating mb-3 mx-auto w-50">
                    <input type="text" class="form-control" name="title" value="<?php echo e($post->title); ?>" required>
                    <label for="title">Title</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50">
                    <textarea class="form-control" name="content" required><?php echo e($post->content); ?></textarea>
                    <label for="content">Content</label>
                </div>
                <label for="category">Select a category:</label>

                <select name="category" id="category">
                    <option value="">-- Please choose --</option>
                    <option value="Technology">Technology</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Education">Education</option>
                </select>
                <div class="d-grid w-25 mx-auto">
                    <button type="submit" class="btn btn-primary">Publish Post</button>
                </div>
            </form>
        </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\blogcrud\resources\views/edit-post.blade.php ENDPATH**/ ?>