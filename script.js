document.addEventListener("DOMContentLoaded", function () {
    // Add event listener to the form submit
    document.getElementById("login-form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the username, password, and role values from the form
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let role = document.getElementById("role").value;
        console.log('hehre', username, password, role)

        // Regular expression to check if the username is not just a combination of generic words
        let genericWordsRegex = /^(asd|bsd|wer|bla|test)$/i;

        // Validate username
        if (genericWordsRegex.test(username)) {
            alert("Please enter a valid username."); // Display an alert message
            return;
        }

        // Validate password length and alphanumeric characters
        if (password.length < 7 || !password.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$/)) {
            alert("Password should be at least 7 characters long and contain both letters and numbers."); // Display an alert message
            return;
        }

        // // Send the form data to the server using fetch API
        fetch("login.php", {
            method: "POST",
            body: JSON.stringify({ username: username, password: password, role: role }),
            headers: {
                "Content-Type": "application/json"
            }
        })
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                console.log('data', data)
                document.getElementById("login-message").textContent = data.message;
                // Assume login success when "Success" message is received
                if (data.success) {
                    setTimeout(() => {
                        
                        onLoginSuccess();
                    }, 1000); 
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });

    function onLoginSuccess() {
       
        console.log('success')
        window.location.href = "membership.html"; // Redirect to the membership page

    }

})