<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/user.php";
if ((isset($_POST['dangnhap'])) && (isset($_POST['dangnhap']))) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $role = checkuser($user, $pass);
    $_SESSION['role'] = $role;
    if ($role == 1)
        header("location:index.php");
    else
        header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Container -->
    <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Banner -->
        <div class="relative h-40 bg-cover bg-center" style="background-image: url('../img/5.png');">
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
            <h1 class="absolute bottom-4 left-4 text-white text-xl font-bold">Welcome Back!</h1>
        </div>

        <!-- Login Form -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="p-6">
            <h1 class="text-2xl font-semibold text-center mb-4 text-gray-700">Login</h1>
            
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-1" for="user">Username</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="bx bxs-user text-gray-400"></i>
                    </span>
                    <input type="text" id="user" name="user" placeholder="Username" required
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-1" for="pass">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="bx bxs-lock-alt text-gray-400"></i>
                    </span>
                    <input type="password" id="pass" name="pass" placeholder="Password" required
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>
            </div>

            <button type="submit" name="dangnhap"
                class="w-full bg-blue-500 text-white font-medium py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                Login
            </button>
        </form>
    </div>
</body>

</html>
