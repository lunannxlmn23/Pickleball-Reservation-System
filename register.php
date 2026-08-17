<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PickleReserve | Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page">
        <section class="brand-panel">
            <div class="brand-content">
                <div class="brand-mark">
                    <div class="icon-badge">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <rect x="6" y="2.5" width="10.5" height="13" rx="5.25" fill="#ffffff" />
                            <rect x="9.6" y="14.5" width="3.3" height="7" rx="1.65" fill="#ffffff" />
                            <circle cx="18.5" cy="18.5" r="3" fill="#D6E35F" />
                        </svg>
                    </div>
                    <span>PickleReserve</span>
                </div>

                <h1>PickleReserve</h1>
                <p class="tagline">Play. Reserve. Enjoy.</p>

                <p class="brand-footnote">Find your rhythm, reserve your court, and make more time for the game.</p>
            </div>
        </section>

        <section class="login-panel">
            <div class="login-form-wrap">
                <p class="form-eyebrow">Get started</p>
                <h2>Create your account</h2>
                <p class="form-subtext">Join PickleReserve and start booking your court.</p>

                <form id="registerForm" class="login-form" novalidate>
                    <div class="form-group">
                        <label for="fullname">Full name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Your full name" autocomplete="name" maxlength="200" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" autocomplete="email" maxlength="200" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" placeholder="At least 8 characters" autocomplete="new-password" minlength="8" required>
                            <button type="button" class="toggle-password" id="togglePassword" aria-label="Show password" aria-pressed="false">
                                <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm password</label>
                        <div class="password-field">
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" autocomplete="new-password" minlength="8" required>
                            <button type="button" class="toggle-password" id="toggleConfirmPassword" aria-label="Show password" aria-pressed="false">
                                <svg id="confirmEyeIcon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Create Account</button>
                    <p class="form-switch">Already have an account? <a href="login.php">Log in</a></p>
                </form>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="register.js"></script>
</body>
</html>
