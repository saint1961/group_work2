function validateRegistrationNumber(regNumber) {
    // Regular expression to match the desired format
    const regex = /^BCSE \d{2} \d{4} \d{4}$/;

    return regex.test(regNumber);
}

// Example usage:
const validRegNumber = "BCSE 12 3456 7890"; // This is a valid registration number
const invalidRegNumber = "BCSE 123 4567 8901"; // This is invalid due to the extra digit in the second group

console.log(validateRegistrationNumber(validRegNumber));    // Outputs: true
console.log(validateRegistrationNumber(invalidRegNumber));  // Outputs: false

  document.getElementById("email").addEventListener("input", function(event) {
    var email = event.target.value;
    var emailError = document.getElementById("emailError");

    // Regular expression pattern for validating email addresses
    var pattern = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,4}$/;

    // Test the input against the pattern
    if (pattern.test(email)) {
        emailError.innerText = ""; // Clear any previous error message
    } else {
        emailError.innerText = "Invalid email address format.";
    }
});

document.getElementById("emailForm").addEventListener("submit", function(event) {
    var email = document.getElementById("email").value;

    // Regular expression pattern for validating email addresses
    var pattern = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,4}$/;

    // Prevent form submission if email is invalid
    if (!pattern.test(email)) {
        event.preventDefault(); // Prevent the form from submitting
        document.getElementById("emailError").innerText = "Invalid email address format.";
    }
});
