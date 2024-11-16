const fullname = document.getElementById("fullname");
const father = document.getElementById("father");
const mother = document.getElementById("mother");
const enrollment = document.getElementById("enrollment");
const email = document.getElementById("email");
const mobile = document.getElementById("mobile");
const password1 = document.getElementById("password1");
const password2 = document.getElementById("password2");
const pic = document.getElementById("pic");

function checkfun() {
    return validation();
}

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorMess = inputControl.querySelector('.error');
    errorMess.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorMess = inputControl.querySelector('.error');
    errorMess.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

const isValidName = name => {
    const re = /^[a-zA-Z\s]+$/;
    return re.test(name);
};

const isValidEmail = email => {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
};

const validation = () => {
    const fullnameValue = fullname.value.trim();
    const fatherValue = father.value.trim();
    const motherValue = mother.value.trim();
    const enrollmentValue = enrollment.value.trim();
    const emailValue = email.value.trim();
    const mobileValue = mobile.value.trim();
    const password1Value = password1.value.trim();
    const password2Value = password2.value.trim();
    
    let isValid = true;

    if (fullnameValue === "") {
        setError(fullname, "Name is required");
        isValid = false;
    } else if (!isValidName(fullnameValue)) {
        setError(fullname, "Invalid name");
        isValid = false;
    } else {
        setSuccess(fullname);
    }

    if (fatherValue === "") {
        setError(father, "Father name is required");
        isValid = false;
    } else if (!isValidName(fatherValue)) {
        setError(father, "Invalid father name");
        isValid = false;
    } else {
        setSuccess(father);
    }

    if (motherValue === "") {
        setError(mother, "Mother name is required");
        isValid = false;
    } else if (!isValidName(motherValue)) {
        setError(mother, "Invalid mother name");
        isValid = false;
    } else {
        setSuccess(mother);
    }

    if (enrollmentValue === "") {
        setError(enrollment, "Enrollment number is required");
        isValid = false;
    } else {
        setSuccess(enrollment);
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

    if (mobileValue === "") {
        setError(mobile, "Mobile number is required");
        isValid = false;
    } else if (mobileValue.length !== 10 || isNaN(mobileValue)) {
        setError(mobile, "Invalid mobile number");
        isValid = false;
    } else {
        setSuccess(mobile);
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

    if (!pic.value) {
        setError(pic, "Profile photo is required");
        isValid = false;
    } else {
        setSuccess(pic);
    }

    return isValid;
}
