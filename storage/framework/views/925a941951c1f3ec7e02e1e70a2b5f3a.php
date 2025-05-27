<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
<div class="w-75 mx-auto mt-5 my-auto">

    <?php if(auth()->guard()->check()): ?>
       <div> Hey <?php echo e(auth()->user()->name); ?>! Begin reading everyone's blogposts.</div> 
         <form class="text-center mt-3" action="./logout" method="post">
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger">Log Out</button>
         </form>
         

         <div style="margin-top: 1cm;">
            <h2>Create a new post</h2>
            <form action="./create-post" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-floating mb-3 mx-auto w-50">
                    <input type="text" class="form-control" name="title" placeholder="Post Title" required>
                    <label for="title">Title</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50">
                    <textarea class="form-control" name="content" placeholder="Post Content" required></textarea>
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

        <div>
            <h2>Everyone's Blog Posts</h2>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($post->title); ?>  (<?php echo e($post->category); ?>)</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By <?php echo e($post->user->name); ?></h6>
                        <div style="font-size: 0.8rem; color: gray;">
                        <?php if(auth()->id() === $post->user_id): ?>
                            <form action="./delete-post/<?php echo e($post->id); ?>" method="post" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            <form action="./edit-post/<?php echo e($post->id); ?>" method="get" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-link btn-sm">Edit</button>
                            </form>
                        <?php endif; ?>
                            <p class="card-text"><?php echo e($post->content); ?></p>   
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


    <?php else: ?>
    <h2 class="text-center text-primary fw-bold mb-4">Log In</h2>
        <form action="./login" method="post">
            <?php echo csrf_field(); ?>

            <!-- Email Address -->
            <div class="form-floating mb-3 mx-auto w-50">
                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                <label for="email">Email</label>
            </div>
            <!-- Password -->
            <div class="form-floating mb-3 mx-auto w-50">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                <button type="button" class="btn btn-link btn-sm position-absolute top-50 end-0 translate-middle-y me-2" id="togglePassword">
                    Show
                </button>
            </div>
            <!-- Login Button -->
            <div class="d-grid w-25 mx-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <!-- Signup Link -->
        <div class="text-center mt-3">
            <p>Don't have an account? <a href="./signup" class="text-primary">Sign Up</a></p>
        </div>
    </div>
    <?php endif; ?>



    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle button text
            togglePassword.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\blogcrud\resources\views/home.blade.php ENDPATH**/ ?>