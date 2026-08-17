<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PickleReserve | Court Reservation System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="page">

        <!-- LEFT — BRAND PANEL -->
        <section class="brand-panel">
            <div class="brand-content">

                <div class="brand-mark">
                    <div class="icon-badge">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Paddle face (filled, flush handle — reads clearly at small size) -->
                            <rect x="6" y="2.5" width="10.5" height="13" rx="5.25" fill="#ffffff" />
                            <rect x="9.6" y="14.5" width="3.3" height="7" rx="1.65" fill="#ffffff" />
                            <!-- Ball -->
                            <circle cx="18.5" cy="18.5" r="3" fill="#D6E35F" />
                        </svg>
                    </div>
                    <span>PickleReserve</span>
                </div>

                <h1>PickleReserve</h1>
                <p class="tagline">Play. Reserve. Enjoy.</p>

                <p class="brand-footnote">
                    Your easy place to plan a game, reserve a court, and get back to playing.
                </p>

            </div>
        </section>

        <!-- RIGHT — LOGIN FORM -->
        <section class="login-panel">
            <div class="login-form-wrap">

                <p class="form-eyebrow">Welcome back</p>
                <h2>Sign in to PickleReserve</h2>
                <p class="form-subtext">Access your court reservations and schedules.</p>

                <form id = "loginForm" class="login-form">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="you@example.com"
                            autocomplete="username"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                            >
                            <button
                                type="button"
                                class="toggle-password"
                                id="togglePassword"
                                aria-label="Show password"
                                aria-pressed="false"
                            >
                                <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"
                                        stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Log In</button>
                    <p class="form-switch">New to PickleReserve? <a href="register.php">Create an account</a></p>

                </form>

                <?php if (!empty($message)): ?>
                    <div class="message" role="alert">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="login.js"></script>

</body>

</html>
