document.addEventListener('DOMContentLoaded', () => {
    const eyeOpen = `
        <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6" />`;
    const eyeClosed = `
        <path d="M3 3L21 21" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
        <path d="M10.6 5.2C11.05 5.1 11.51 5 12 5c7 0 10.5 7 10.5 7-0.6 1.2-1.6 2.7-3 4.1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
        <path d="M6.3 6.8C3.7 8.5 1.5 12 1.5 12s3.5 7 10.5 7c1.5 0 2.8-.3 4-.8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />`;

    [['togglePassword', 'password', 'eyeIcon'], ['toggleConfirmPassword', 'confirm_password', 'confirmEyeIcon']].forEach(([buttonId, inputId, iconId]) => {
        const button = document.getElementById(buttonId);
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        button.addEventListener('click', () => {
            const hidden = input.type === 'password';
            input.type = hidden ? 'text' : 'password';
            icon.innerHTML = hidden ? eyeClosed : eyeOpen;
            button.setAttribute('aria-label', hidden ? 'Hide password' : 'Show password');
            button.setAttribute('aria-pressed', String(hidden));
        });
    });

    const form = document.getElementById('registerForm');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        if (password !== confirmPassword) {
            Swal.fire({ icon: 'error', title: 'Passwords do not match', text: 'Please make sure both passwords are the same.' });
            return;
        }

        try {
            const response = await fetch('register_process.php', { method: 'POST', body: new FormData(form) });
            const result = await response.json();
            if (!result.success) {
                Swal.fire({ icon: 'error', title: 'Registration failed', text: result.message });
                return;
            }

            Swal.fire({ icon: 'success', title: 'Account created', text: result.message, showConfirmButton: false, timer: 1500 })
                .then(() => { window.location.href = 'player/dashboard.php'; });
        } catch (error) {
            console.error('Registration error:', error);
            Swal.fire({ icon: 'error', title: 'Registration failed', text: 'Please try again in a moment.' });
        }
    });
});
