// this file is used to validate the user inputs on the register page
// main validation function
function validate()
{
    errorMessage = "";
    var nameError = validateName();
    var lastNameError = validateLastName();
    var emailError = validateEmail();
    var addressError = validateAddress();
    var mobileNumberError = validateMobileNumber();
    var passwordError = validatePassword();
   
    // if there are no errors
    if(nameError && lastNameError && emailError && addressError && mobileNumberError && passwordError)
    {
        return true;
    }
     // if there is an error
    else
    {
        alert(errorMessage);
        return false;
    }
}

// ------------------------------------------------------------------------------------------------------------

// this function validates the first name entered
function validateName()
{
     // if the name field is empty
    if(document.getElementById("nameR").value=="")
    {
         // change colour of empty field
        document.getElementById("nameR").style.backgroundColor="pink";
         // display error
        errorMessage+="Please enter your first name. \n";
        return false;
    }
    else
    {
        document.getElementById("nameR").style.backgroundColor="";
        return true;
    }
}

// ------------------------------------------------------------------------------------------------------------

// this function validates the last name entered
function validateLastName()
{
     // if the last name field is empty
    if(document.getElementById("lastNameR").value=="")
    {
         // change colour of empty field
        document.getElementById("lastNameR").style.backgroundColor="pink";
         // display error
        errorMessage+="Please enter your last name. \n";
        return false;
    }
    else
    {
        document.getElementById("lastNameR").style.backgroundColor="";
        return true;
    }
}

// ------------------------------------------------------------------------------------------------------------

// this function validates the email address entered
function validateEmail()
{
    var emailAddress = registerForm.emailR.value;
    var emailFormat = /^\S+@\S+\.\S+$/;
    var eValid = emailAddress.search(emailFormat);
    
     // if the email is not valid
    if(eValid!=0)
    {
        // change colour of empty field
        document.getElementById("emailR").style.backgroundColor="pink";
        // display error
        errorMessage+="Please enter a valid email address. \n";
        return false;
    }
    else
    {
        document.getElementById("emailR").style.backgroundColor="";
        return true;
    }
}

// ------------------------------------------------------------------------------------------------------------

function validateAddress()
{
     // if the address field is empty
    if(document.getElementById("addressR").value=="")
    {
         // change colour of empty field
        document.getElementById("addressR").style.backgroundColor="pink";
         // display error
        errorMessage+="Please enter your address. \n";
        return false;
    }
    else
    {
        document.getElementById("addressR").style.backgroundColor="";
        return true;
    }
}

// ------------------------------------------------------------------------------------------------------------

// this function validates the mobile number entered
function validateMobileNumber()
{
    var mobileNumber = registerForm.numberR.value;

    // ensures that only 10 digits can be entered
    // first digit of the number must start at 0
    var numberFormat = /^0\d{9}$/;
    var validNumber = mobileNumber.search(numberFormat);
    
    // if the mobile number is invalid
    if(validNumber!=0)
    {
        // change colour of empty field
        document.getElementById("numberR").style.backgroundColor="pink";
        // display error
        errorMessage+="Please enter a valid mobile number. \n";
        return false;
    }
    else
    {
        document.getElementById("numberR").style.backgroundColor="";
        return true;
    }
}

// ------------------------------------------------------------------------------------------------------------

// this function validdates the password fields
function validatePassword()
{
   
    if(document.getElementById("passwordR").value=="")
    {
        // change colour of empty field
        document.getElementById("passwordR").style.backgroundColor="pink";
        document.getElementById("confirmPasswordR").style.backgroundColor="pink";
        // display error 
        errorMessage+="Please enter a password. \n";
        return false;
    }

    else if(document.getElementById("confirmPasswordR").value=="")
    {
        // change colour of empty field
        document.getElementById("passwordR").style.backgroundColor="";
        document.getElementById("confirmPasswordR").style.backgroundColor="pink";
        // display error 
        errorMessage+="Please re-enter password. \n";
        return false;
    }

    else if(document.getElementById("passwordR").value!=document.getElementById("confirmPasswordR").value)
    {
        // change colour of empty field
        document.getElementById("passwordR").style.backgroundColor="pink";
        document.getElementById("confirmPasswordR").style.backgroundColor="pink";
        // display error 
        errorMessage+="Passwords do not match. \n";
        return false;
    }

    // ensures that the password entered is at least 6 characters long
    else if((document.getElementById("passwordR").value.length < 6)){
        // change colour of empty field
        document.getElementById("passwordR").style.backgroundColor="pink";
        document.getElementById("confirmPasswordR").style.backgroundColor="pink";
        // display error 
        errorMessage+="Your password must be at least 6 characters long. \n";
        return false;
    }

    else
    {
        document.getElementById("passwordR").style.backgroundColor="";
        document.getElementById("confirmPasswordR").style.backgroundColor="";
        return true;
    }
}
// ------------------------------------------------------------------------------------------------------------















