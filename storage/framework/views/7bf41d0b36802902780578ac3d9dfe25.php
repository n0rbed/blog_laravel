<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
<div class="w-75 mx-auto mt-5 my-auto">
    <h2 class="text-center text-primary fw-bold mb-4">Sign Up</h2>

    <form action="./signup" method="post">
        <?php echo csrf_field(); ?>
        <!-- Name -->
        <div class="form-floating mb-3 mx-auto w-50">
            <input type="text" class="form-control" name="name" placeholder="Yassin Ahmed..." required>
            <label for="name">Name</label>
        </div>

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
        <p>Already have an account? <a href="./login" class="text-primary">LogIn</a></p>
    </div>
</div>

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
</html><?php /**PATH C:\xampp\htdocs\blogcrud\resources\views/signup.blade.php ENDPATH**/ ?>