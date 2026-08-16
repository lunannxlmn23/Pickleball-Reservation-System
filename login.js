document.addEventListener("DOMContentLoaded", function () {

    const toggleButton = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (!toggleButton || !passwordInput || !eyeIcon) {
        return;
    }

    const eyeOpen = `
        <path
            d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linejoin="round"
        />
        <circle
            cx="12"
            cy="12"
            r="3"
            stroke="currentColor"
            stroke-width="1.6"
        />
    `;

    const eyeClosed = `
        <path
            d="M3 3L21 21"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
        />
        <path
            d="M10.6 5.2C11.05 5.1 11.51 5 12 5c7 0 10.5 7 10.5 7-0.6 1.2-1.6 2.7-3 4.1"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
        />
        <path
            d="M6.3 6.8C3.7 8.5 1.5 12 1.5 12s3.5 7 10.5 7c1.5 0 2.8-.3 4-.8"
            stroke="currentColor"
            stroke-width="1.6"
            stroke-linecap="round"
        />
    `;

    toggleButton.addEventListener("click", function () {

        const passwordIsHidden = passwordInput.type === "password";

        if (passwordIsHidden) {
            passwordInput.type = "text";
            eyeIcon.innerHTML = eyeClosed;
            toggleButton.setAttribute("aria-label", "Hide password");
            toggleButton.setAttribute("aria-pressed", "true");
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = eyeOpen;
            toggleButton.setAttribute("aria-label", "Show password");
            toggleButton.setAttribute("aria-pressed", "false");
        }

    });

});

const loginForm = document.getElementById('loginForm');

loginForm.addEventListener("submit", async function(e){
    e.preventDefault();

    const formData = new FormData(this);

    try{
        const response = await fetch("login_process.php",{
            method: "POST",
            body:formData
        });

        const result = await response.json();

        if(result.success){
            Swal.fire({
                icon: "success",
                title: "Login Successfully",
                text: result.message,
                showConfirmButton:false,
                timer: 1500,
            }).then(() => {
                if(result.role === "admin"){
                    window.location.href = "/admin/dashboard.php";
                }
                if(result.role === "player"){
                    window.location.href = "/player/dashboard.php";
                }
            });
        }else{
            Swal.fire({
                icon: "error",
                title: "Login Failed",
                text: result.message,
                showConfirmButton:true,
                timer: 1500,
            });
        }
    }catch(error){
          Swal.fire({
                icon: "error",
                title: "Login Failed",
                text: error.message,
                showConfirmButton:true,
                timer: 1500,
            });

            console.error("Error:", error);
    }

    
});