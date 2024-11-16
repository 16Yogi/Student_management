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
    return validation();
}

// --------------------------------------------
// function checkfun() {
//     if (!validation()) return false;

//     const formData = new FormData(); 
//     formData.append('username', fname.value.trim());
//     formData.append('userpic', pic.files[0]);
//     formData.append('useremail', email.value.trim());
//     formData.append('usermobile', mobile.value.trim());
//     formData.append('userdepartment', department.value.trim());
//     formData.append('usergender', gender ? gender.value.trim() : ''); 
//     formData.append('useraddress', address.value.trim());
//     formData.append('userpassword1', password1.value.trim());
//     formData.append('userpassword2', password2.value.trim());

//     console.log(formData.get('username')); // Use get method for FormData

//     // Uncomment and use fetch to send data
//     fetch('../database/insert.php', {
//         method: 'POST',
//         body: JSON.stringify(formData)
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.message === "Admin created") {
//             showPopupBtn.click(); // Make sure showPopupBtn is defined
//         }
//     })
//     .catch(error => console.error('Error:', error));

//     return true; // Return true if validation is successful
// }

// ------------------------------------
// chat gpt
// function checkfun() {
//     if (!validation()) return false;

//     const formData = new FormData();
//     formData.append('username', document.getElementById('fullname').value.trim());
//     formData.append('userpic', document.getElementById('pic').files[0]);
//     formData.append('useremail', document.getElementById('email').value.trim());
//     formData.append('usermobile', document.getElementById('mobile').value.trim());
//     formData.append('userdepartment', document.getElementById('department').value.trim());
//     formData.append('usergender', document.querySelector('input[name="gender"]:checked').value.trim());
//     formData.append('useraddress', document.getElementById('address').value.trim());
//     formData.append('userpassword1', document.getElementById('password1').value.trim());
//     formData.append('userpassword2', document.getElementById('password2').value.trim());
    
//     fetch('insert.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.message === "Admin created") {
//             showPopupBtn.click(); // Display popup or perform other actions
//         } else {
//             alert(data.message);
//         }
//     })
//     .catch(error => console.error('Error:', error));

//     return true;
// }
// --------------------

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
    const re = /^[a-zA-Z\s]+$/; // Allow spaces in names
    return re.test(name);
};

const isValidEmail = email => {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
};

// const validation = () => {
//     const nameValue = fname.value.trim();
//     const picValue = pic.value.trim();
//     const mobileValue = mobile.value.trim();
//     const emailValue = email.value.trim();
//     const departmentValue = department.value.trim();
//     const genderValue = gender.value.trim();
//     const addressValue = address.value.trim();
//     const password1Value = password1.value.trim();
//     const password2Value = password2.value.trim();

//     let isValid = true;

//     if (nameValue === "") {
//         setError(fname, "Full name is required");
//         isValid = false;
//     } else if (!isValidName(nameValue)) {
//         setError(fname, "Full name should contain only letters and spaces");
//         isValid = false;
//     } else {
//         setSuccess(fname);
//     }

//     if (mobileValue === "") {
//         setError(mobile, "Mobile number is required");
//         isValid = false;
//     } else if (mobileValue.length !== 10 || isNaN(mobileValue)) {
//         setError(mobile, "Invalid mobile number");
//         isValid = false;
//     } else {
//         setSuccess(mobile);
//     }

//     if (emailValue === "") {
//         setError(email, "Email is required");
//         isValid = false;
//     } else if (!isValidEmail(emailValue)) {
//         setError(email, "Invalid email");
//         isValid = false;
//     } else {
//         setSuccess(email);
//     }
   

//     if (password1Value === "" || password2Value === "") {
//         setError(password1, "Password is required");
//         setError(password2, "Password is required");
//         isValid = false;
//     } else if (password1Value !== password2Value) {
//         setError(password2, "Passwords do not match");
//         isValid = false;
//     } else {
//         setSuccess(password1);
//         setSuccess(password2);
//     }
    
//     // ---------------------------
//     // if (isValid) {
//     //     fetch('admin_reg.php', {
//     //         headers: {
//     //             'Content-Type': 'application/json'
//     //         },
//     //         method: 'POST',
//     //         body: JSON.stringify({
//     //             username: nameValue,
//     //             userpic: pic.files[0], // For file uploads, you'll need FormData
//     //             usermobile: mobileValue,
//     //             useremail: emailValue,
//     //             userdepartment: departmentValue,
//     //             usergender: genderValue,
//     //             useraddress: addressValue,
//     //             userpassword1: password1Value,
//     //             userpassword2: password2Value
//     //         })
//     //     })
//     //     .then(response => response.json())
//     //     .then(data => {
//     //         if (data.message === "Admin created") {
//     //             // Handle successful registration
//     //             showPopupBtn.click(); // Make sure showPopupBtn is defined
//     //         }
//     //     })
//     //     .catch(error => console.error('Error:', error));
//     // }
//     // ----------------------
//     return isValid;
// }



const validation = () => {
    const nameValue = fname.value.trim();
    const mobileValue = mobile.value.trim();
    const emailValue = email.value.trim();
    const addressValue = address.value.trim();
    const password1Value = password1.value.trim();
    const password2Value = password2.value.trim();
     
    cons
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
}








