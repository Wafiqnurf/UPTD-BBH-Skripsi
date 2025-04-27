<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}" />
    <title>Login - Sistem Pertanian</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <style>
    :root {
        --primary-color: #4CAF50;
        --primary-dark: #2d5a27;
        --secondary-color: #81C784;
        --text-dark: #333;
        --text-light: #666;
        --white: #fff;
        --error-color: #f44336;
        --success-color: #4CAF50;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        min-height: 100vh;
        background: linear-gradient(135deg, rgba(76, 175, 80, 0.9), rgba(45, 90, 39, 0.9)),
            url('/api/placeholder/1920/1080') center/cover;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.98);
        padding: clamp(1.5rem, 5vw, 2.5rem);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 450px;
        position: relative;
        overflow: hidden;
        transform: translateY(0);
        transition: transform 0.3s ease;
    }

    .login-container:hover {
        transform: translateY(-5px);
    }

    .login-header {
        text-align: center;
        margin-bottom: clamp(1.5rem, 4vw, 2.5rem);
    }

    .login-header h1 {
        color: var(--primary-dark);
        font-size: clamp(1.5rem, 4vw, 2rem);
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .login-header p {
        color: var(--text-light);
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .farm-icon {
        font-size: clamp(2.5rem, 6vw, 3.5rem);
        color: var(--primary-color);
        margin-bottom: 1rem;
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .farm-icon:hover {
        transform: scale(1.1) rotate(5deg);
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
        font-weight: 500;
        font-size: 0.95rem;
        transition: color 0.3s ease;
    }

    .form-group.focus label {
        color: var(--primary-color);
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-group input {
        width: 100%;
        padding: 12px 40px 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .input-group input:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 4px rgba(76, 175, 80, 0.1);
    }

    .input-group .icon {
        color: var(--text-light);
        transition: all 0.3s ease;
        cursor: pointer;
        padding: 5px;
    }

    .input-group .icon:hover {
        color: var(--primary-color);
    }

    .error-message {
        color: var(--error-color);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: none;
    }

    .form-group.error input {
        border-color: var(--error-color);
    }

    .form-group.error .error-message {
        display: block;
    }

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-light);
        cursor: pointer;
    }

    .remember-me input[type="checkbox"] {
        accent-color: var(--primary-color);
        width: 16px;
        height: 16px;
    }

    .forgot-password {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .forgot-password:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .login-button {
        width: 100%;
        padding: 14px;
        background: var(--primary-color);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .login-button:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .login-button:active {
        transform: translateY(0);
    }

    .login-button .spinner {
        display: none;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .login-button.loading {
        color: transparent;
    }

    .login-button.loading .spinner {
        display: block;
    }

    .register-link {
        text-align: center;
        margin-top: 1.5rem;
        color: var(--text-light);
        font-size: 0.95rem;
    }

    .register-link a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .register-link a:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .success-message {
        display: none;
        text-align: center;
        color: var(--success-color);
        margin-top: 1rem;
        font-weight: 500;
    }

    /* Mobile optimizations */
    @media (max-width: 480px) {
        body {
            padding: 15px;
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.95), rgba(45, 90, 39, 0.95));
        }

        .login-container {
            padding: 1.5rem;
            border-radius: 15px;
        }

        .remember-forgot {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.8rem;
        }

        .input-group input {
            font-size: 16px;
            /* Prevents zoom on mobile */
            padding: 10px 35px 10px 12px;
        }
    }

    /* Tablet optimizations */
    @media (min-width: 481px) and (max-width: 768px) {
        .login-container {
            max-width: 400px;
        }
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        .login-container {
            background: rgba(255, 255, 255, 0.95);
        }
    }

    /* Reduced motion preferences */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation: none !important;
            transition: none !important;
        }
    }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fas fa-seedling farm-icon"></i>
            <h1>Selamat Datang</h1>
            <p>Masuk ke Sistem Manajemen Pertanian</p>
        </div>

        <form id="login-form" onsubmit="handleLogin(event)">
            <div class="form-group">
                <label for="username">Username atau Email</label>
                <div class="input-group">
                    <input type="text" id="username" name="username" required autocomplete="username"
                        placeholder="Masukkan username atau email">
                    <i class="icon fas fa-user"></i>
                </div>
                <div class="error-message">Username tidak valid</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        placeholder="Masukkan password" minlength="8">
                    <i class="icon fas fa-eye password-toggle"></i>
                </div>
                <div class="error-message">Password minimal 8 karakter</div>
            </div>
            <button type="submit" class="login-button">
                <span class="button-text">Masuk</span>
                <span class="spinner">
                    <i class="fas fa-circle-notch fa-spin"></i>
                </span>
            </button>

            <div class="success-message">
                Login berhasil! Mengalihkan...
            </div>

        </form>
    </div>

    <script>
    // Focus effects
    document.querySelectorAll('.form-group input').forEach(input => {
        input.addEventListener('focus', () => {
            input.closest('.form-group').classList.add('focus');
        });

        input.addEventListener('blur', () => {
            input.closest('.form-group').classList.remove('focus');
        });
    });

    // Password visibility toggle
    const passwordToggle = document.querySelector('.password-toggle');
    const passwordInput = document.getElementById('password');

    passwordToggle.addEventListener('click', () => {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        passwordToggle.classList.toggle('fa-eye');
        passwordToggle.classList.toggle('fa-eye-slash');
    });

    // Form validation and submission
    function handleLogin(event) {
        event.preventDefault();

        const form = event.target;
        const username = form.username.value;
        const password = form.password.value;
        let isValid = true;

        // Reset previous errors
        document.querySelectorAll('.form-group').forEach(group => {
            group.classList.remove('error');
        });

        // Validate username
        if (username.length < 3) {
            document.querySelector('#username').closest('.form-group').classList.add('error');
            isValid = false;
        }

        // Validate password
        if (password.length < 8) {
            document.querySelector('#password').closest('.form-group').classList.add('error');
            isValid = false;
        }

        if (isValid) {
            const button = form.querySelector('.login-button');
            const successMessage = document.querySelector('.success-message');

            // Show loading state
            button.classList.add('loading');
        }

        // Prevent zoom on mobile when focusing inputs
        const viewport = document.querySelector('meta[name=viewport]');
        const originalContent = viewport.content;

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', () => {
                viewport.content = originalContent + ', maximum-scale=1';
            });

            input.addEventListener('blur', () => {
                viewport.content = originalContent;
            });
        });
    </script>
</body>

</html>
