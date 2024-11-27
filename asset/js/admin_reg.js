const fname = document.getElementById("fullname");
const pic = document.getElementById("pic");
const email = document.getElementById("email");
const mobile = document.getElementById("mobile");
const department = document.getElementById("department");
const gender = document.getElementById("gender")
const address = document.getElementById("address");
const password1 = document.getElementById("password1");
const password2 = document.getElementById("password2");

function checkfun() {
    if (!validation()) {
        return false; 
    }
    return true;
}

const setError = (element, message) => {
    const inputControl = element.closest('.form-group');
    const errorMessage = inputControl.querySelector('.error');
    
    errorMessage.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess = (element) => {
    const inputControl = element.closest('.form-group');
    const errorMessage = inputControl.querySelector('.error');
    
    errorMessage.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};



const isValidName = name => {
    const re = /^[a-zA-Z\s]+$/; // Allow spaces in names
    return re.test(name);
};

const isValidEmail = email => {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
};

const validation = () => {
    const nameValue = fname.value.trim();
    const mobileValue = mobile.value.trim();
    const emailValue = email.value.trim();
    const departmentValue = department.value.trim();
    const genderValue = document.querySelector('input[name="gender"]:checked');
    const addressValue = address.value.trim();
    const password1Value = password1.value.trim();
    const password2Value = password2.value.trim();
    
    let isValid = true;

    if (nameValue === "") {
        setError(fname, "Full name is required");
        isValid = false;
    } else if (!isValidName(nameValue)) {
        setError(fname, "Full name should contain only letters and spaces");
        isValid = false;
    } else {
        setSuccess(fname);
    }

    if (mobileValue === "") {
        setError(mobile, "Mobile number is required");
        isValid = false;
    } else if (mobileValue.length !== 10 || isNaN(mobileValue)) {
        setError(mobile, "Invalid mobile number");
        isValid = false;
    } else {
        setSuccess(mobile);
    }

    if (emailValue === "") {
        setError(email, "Email is required");
        isValid = false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, "Invalid email");
        isValid = false;
    } else {
        setSuccess(email);
    }

    if (departmentValue === "") {
        setError(department, "Please select a department");
        isValid = false;
    } else {
        setSuccess(department);
    }

    if (!genderValue) {
        setError(gender, "Please select a gender");
        isValid = false;
    } else {
        setSuccess(gender);
    }

    if (addressValue === "") {
        setError(address, "Address is required");
        isValid = false;
    } else {
        setSuccess(address);
    }

    if (password1Value === "" || password2Value === "") {
        setError(password1, "Password is required");
        setError(password2, "Password is required");
        isValid = false;
    } else if (password1Value !== password2Value) {
        setError(password2, "Passwords do not match");
        isValid = false;
    } else {
        setSuccess(password1);
        setSuccess(password2);
    }

    return isValid; 
};