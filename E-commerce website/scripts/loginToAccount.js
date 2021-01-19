// this file is used to validate user input on the login page
// validation function
function validate()
{
    errorMessage = "";
    var emailError = validateEmail();
    var passwordError = validatePassword();
   
    // if there are no errors
    if(emailError && passwordError)
    {
         // go to next page when the login button is pressed
        document.loginForm.submit();

    }
     // display any errors
    else
    {
        alert(errorMessage);
    }
}
// ------------------------------------------------------------------------------------------------------------

// this function validates the email address entered
function validateEmail()
{
    var emailAddress = loginForm.emailL.value;
    var emailFormat = /^\S+@\S+\.\S+$/;
    var eValid = emailAddress.search(emailFormat);
    
     // if the email is not valid
    if(eValid!=0)
    {
        // change colour of empty field
        document.getElementById("emailL").style.backgroundColor="pink";
        // display error
        errorMessage+="Please enter a valid email address. \n";
        return false;
    }
    else
    {
        document.getElementById("emailL").style.backgroundColor="";
        return true;
    }
}



// ------------------------------------------------------------------------------------------------------------

// this function validates the password entered
function validatePassword()
{
     // if the password field is empty
    if(document.getElementById("passwordL").value=="")
    {
         // change colour of the field
        document.getElementById("passwordL").style.backgroundColor="pink";
         // display error
        errorMessage+="Please enter your password. \n";
        return false;
    }
    else
    {
        document.getElementById("passwordL").style.backgroundColor="";
        return true;
    }
}


// ------------------------------------------------------------------------------------------------------------

