<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #e0f7fa, #f0f9ff);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-in-out;
        }

        .login-card h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #2563eb;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-card label {
            font-weight: bold;
            color: #4b5563;
        }

        .login-card input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            transition: border-color 0.3s ease;
        }

        .login-card input:focus {
            border-color: #2563eb;
            outline: none;
            box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
        }

        .login-card button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: #ffffff;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .login-card button:hover {
            background: #1d4ed8;
            transform: scale(1.05);
        }

        .login-card .register-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #2563eb;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-card .register-link:hover {
            color: #1d4ed8;
        }

        .toggle-password {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }

        .toggle-password:hover {
            color: #2563eb;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Login</h1>
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="mb-3 position-relative">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <i id="toggle-icon" class="fas fa-eye"></i>
                </span>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
    <script src="https://use.fontawesome.com/4c4e4140eb.js"></script>
</body>
</html>
