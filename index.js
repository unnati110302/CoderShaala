function validateform(){
    var name = document.myform.name.value;
    var age = document.myform.age.value;
    var email = document.myform.email.value;
    var phone = document.myform.phone.value;

    if(name==null || name==""){
        alert("Name can't be blank");
        return false;
    }
    if(age>100){
        alert("Age should be less than or equal to 100 years");
        return false;
    }
    if(phone.length<10 || phone.length>10){
        alert("Please enter a valid phone number");
        return false;
    }
    if(email==""){
        alert("Please enter your email");
        return false;
    }
    else{
        var atposition = email.indexOf("@");
        var dotposition = email.lastIndexOf(".");
        if(atposition < 1 || dotposition+2>=email.length || dotposition<atposition+2){
            alert("Please enter a valid email address");
            return false;
        }
    }
}