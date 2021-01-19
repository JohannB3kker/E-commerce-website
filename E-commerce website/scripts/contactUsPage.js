// this file is used to validate the user's inputs on the Contact Us Page
// validation function
function validate()
{

    errorMessage = "";
    var nameError = validateName();
    var lastNameError = validateLastName();
    var emailError = validateEmail();
    var mobileNumberError = validateMobileNumber();
    var messageboxError = validateMessageBox();
   
    // if there are no errors
    if(nameError && lastNameError && emailError && mobileNumberError && messageboxError)
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
    if(document.getElementById("nameCUS").value=="")
    {
         // change colour of empty field
        document.getElementById("nameCUS").style.backgroundColor="pink";
         // display error
        errorMessage+="Please enter your name. \n";
        return false;
    }
    else
    {
        document.getElementById("nameCUS").style.backgroundColor="";
        return true;
    }
}
// ------------------------------------------------------------------------------------------------------------

// this function validates the last name entered
function validateLastName()
{
     // if the last name field is empty
    if(document.getElementById("lastNameCUS").value=="")
    {
         // change colour of empty field
        document.getElementById("lastNameCUS").style.backgroundColor="pink";
         // display error
        errorMessage+="Please enter your last name. \n";
        return false;
    }
    else
    {
        document.getElementById("lastNameCUS").style.backgroundColor="";
        return true;
    }
}
// ------------------------------------------------------------------------------------------------------------

// this function validates the email address entered
function validateEmail()
{
    var emailAddress = contactForm.email.value;
    var emailFormat = /^\S+@\S+\.\S+$/;
    var eValid = emailAddress.search(emailFormat);
    
     // if the email is invalid
    if(eValid!=0)
    {
        // change colour of empty field
        document.getElementById("emailCUS").style.backgroundColor="pink";
        // display error
        errorMessage+="Please enter a valid email address. \n";
        return false;
    }
    else
    {
        document.getElementById("emailCUS").style.backgroundColor="";
        return true;
    }
}
// ------------------------------------------------------------------------------------------------------------

// this function validates the mobile number entered
function validateMobileNumber()
{
    var mobileNumber = contactForm.number.value;
 
    // ensures that only 10 digits can be entered
    // first digit of the number must start at 0
    var numberFormat = /^0\d{9}$/;
    var validNumber = mobileNumber.search(numberFormat);
    
    // if the mobile number is not valid
    if(validNumber!=0)
    {
        // change colour of empty field
        document.getElementById("numberCUS").style.backgroundColor="pink";
        // display error
        errorMessage+="Please enter a valid mobile number. \n";
        return false;
    }
    else
    {
        document.getElementById("numberCUS").style.backgroundColor="";
        return true;
    }
}

// ------------------------------------------------------------------------------------------------------------

// this function validates the message entered
function validateMessageBox()
{
    // if message box is empty
    if(document.getElementById("textAreaCUS").value=="")
    {
        // change colour of empty message box
        document.getElementById("textAreaCUS").style.backgroundColor="pink";
        // display error 
        errorMessage+="Please enter a message. \n";
        return false;
    }
    else
    {
        document.getElementById("textAreaCUS").style.backgroundColor="";
        return true;
    }
}
// ------------------------------------------------------------------------------------------------------------
