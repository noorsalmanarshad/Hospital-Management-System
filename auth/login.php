<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Subhan Care | Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/login.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

    <!-- Navbar -->

    <nav>

        <div class="logo">

            <i class="fa-solid fa-hospital"></i>

            <h2>Subhan Care</h2>

        </div>
<ul>

<li><a href="../pages/home.php">Home</a></li>

<li><a href="../pages/services.php">Services</a></li>

<li><a href="../pages/doctors.php">Doctors</a></li>

<li><a href="../pages/contact.php">Contact</a></li>

<li><a href="login.php">Login</a></li>

</ul>

    </nav>

    <!-- Main Section -->

    <section class="container">

        <!-- Left -->

    <!-- <img src="../assets/images/hospital.jpg"
         alt="Hospital"
         class="hospital-image"> -->

    <div class="left">
           

            <h1>
                Welcome to <br>
                <span>Subhan Care</span>
            </h1>

            <p>

                Smart Hospital Management System

            </p>

            <div class="features">

                <div>

                    <i class="fa-solid fa-user-doctor"></i>

                    Doctors

                </div>

                <div>

                    <i class="fa-solid fa-user-nurse"></i>

                    Staff

                </div>

                <div>

                    <i class="fa-solid fa-bed"></i>

                    Patients

                </div>

                <div>

                    <i class="fa-solid fa-shield-heart"></i>

                    Secure System

                </div>

            </div>

        </div>

</div>

           
        <!-- Right -->

        <div class="right">

            <div class="login-card">

                <h2>Login</h2>

                <p>

                    Sign in to continue

                </p>

                <form action="login_process.php" method="POST">

                    <div class="input-box">

                        <i class="fa-solid fa-envelope"></i>

                        <input type="email"
                            name="email"
                            placeholder="Email"
                            required>

                    </div>

                    <div class="input-box">

                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Password"
                            required>

                        <i
                            class="fa-solid fa-eye"
                            id="togglePassword">

                        </i>

                    </div>
                    <div class="input-box">

    <i class="fa-solid fa-user-tag"></i>

    <select name="role" required>

        <option value="">Select Role</option>

        <option value="Admin">Admin</option>

        <option value="Doctor">Doctor</option>

        <option value="Receptionist">Receptionist</option>

        <option value="Pharmacist">Pharmacist</option>

        <option value="Billing">Billing</option>

    </select>

</div>

                    <div class="options">

                        <label>

                            <input type="checkbox">

                            Remember Me

                        </label>

                        <a href="forgot_password.php">

                            Forgot Password?

                        </a>

                    </div>

                    <button
                        class="login-btn">

                        Login

                    </button>

                </form>

            </div>

        </div>

    </section>

    <script src="../assets/js/login.js"></script>

</body>

</html>