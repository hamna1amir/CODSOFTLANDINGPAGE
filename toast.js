// JavaScript function to show toast message
function showToast(message) {
    // Get the toast element
    var toast = document.getElementById("toast");
  
    // Set the message content
    toast.innerHTML = message;
  
    // Show the toast
    toast.style.display = "block";
  
    // Hide the toast after 2 minutes (120000 milliseconds)
    setTimeout(function() {
      toast.style.display = "none";
    }, 120000); // 2 minutes
  }
  