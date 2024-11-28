<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link to custom app.css -->
    @vite('resources/css/app.css')
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
</body>
</html>
