<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 24px;
        }

        .login-container {
            width: 350px;
            background-color: rgba(225, 255, 255, 0.1);
            /* Form background color */
            padding: 5;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(225, 255, 255, 0.4);
        }

        .login-container .card-header {
            border-bottom: none;
            text-align: center;
        }
    </style>
</head>

<body>
    <video id="video-background" autoplay loop muted>
        <source src="{{ asset('backend/images/background.mp4') }}" type="video/mp4">
    </video>

    <div class="content">
        <div class="login-container">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('backend/images/logo-color.png') }}" alt=""
                        class="rounded mx-auto d-block mb-3" width="250" height="150">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="togglePassword('loginPassword')">
                                    <i id="eyeIcon" class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script>
        // Function to toggle password visibility
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const eyeIcon = document.getElementById("eyeIcon");
            if (input.type === "password") {
                input.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
    <script>
        // Resize the video to maintain aspect ratio
        window.addEventListener('resize', function() {
            const video = document.getElementById('video-background');
            const videoWidth = video.videoWidth;
            const videoHeight = video.videoHeight;
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;
            const windowAspectRatio = windowWidth / windowHeight;
            const videoAspectRatio = videoWidth / videoHeight;
            if (windowAspectRatio > videoAspectRatio) {
                video.style.width = '100%';
                video.style.height = 'auto';
            } else {
                video.style.width = 'auto';
                video.style.height = '100%';
            }
        });
    </script>
</body>

</html>
