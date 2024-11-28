<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<<<<<<< HEAD
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
=======
    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link to custom app.css -->
    @vite('resources/css/app.css')
    <!-- Google Font Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Global Font Styling */
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-teal-200 to-indigo-300">
    <form action="{{ route('login.process') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        @csrf
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h1>
        
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
        <div class="relative mb-4">
            <input type="email" name="email" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-300 focus:border-teal-300 outline-none text-gray-800">
        </div>
        
        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password:</label>
        <div class="relative mb-6">
            <input type="password" name="password" id="password" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-300 focus:border-teal-300 outline-none text-gray-800">
            <i class="fas fa-eye absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-teal-500" id="togglePassword"></i>
        </div>
        
        <button type="submit"
            class="w-full py-2 bg-gradient-to-r from-teal-400 to-indigo-400 text-white rounded-md font-semibold hover:from-indigo-400 hover:to-teal-400 focus:ring-4 focus:ring-indigo-200 transition duration-300">
            Login
        </button>
    </form>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // Toggle the icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
</body>
</html>
