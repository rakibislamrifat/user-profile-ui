<?php
/*
Template Name: User Dashboard
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Profile</title>

    <style>
    body {
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;

        min-height: 100vh;
        padding: 40px;

    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .form-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 20px;

    }

    .form-row .form-group {
        flex: 1 1 48%;

    }



    .container {
        max-width: 800px;
        width: 100%;
        margin: 0 auto;
        padding: 30px;
        border-radius: 8px;
        border: 1px solid #333;
        box-shadow: 0 8px 30px rgba(231, 76, 60, 0.4);
        color: #fff;
    }



    .profile-header {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
        position: relative;
    }

    .profile-image-container {
        position: relative;
        display: inline-block;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #e0e0e0;
        background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"%3E%3Ccircle cx="50" cy="35" r="15" fill="%23999"/%3E%3Cpath d="M50 55c-15 0-25 10-25 20v5h50v-5c0-10-10-20-25-20z" fill="%23999"/%3E%3C/svg%3E');
        background-size: cover;
        background-position: center;
        cursor: pointer;
        transition: opacity 0.3s ease;
        object-fit: cover;
    }

    .profile-image:hover {
        opacity: 0.8;
    }

    .upload-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        cursor: pointer;
    }

    .profile-image-container:hover .upload-overlay {
        opacity: 1;
    }

    .upload-icon {
        color: red;
        font-size: 24px;
        font-weight: bold;
    }

    .file-input {
        display: none;
    }

    .upload-btn {
        background-color: #4285f4;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .upload-btn:hover {
        background-color: #e74c3c;
    }

    .profile-info h3 {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 2px;
    }

    .profile-info p {
        font-size: 14px;
        color: #666;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        color: #333;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        background-color: #fafafa;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus {
        outline: none;
        border-color: #4285f4;
        background-color: white;
    }

    .form-group input::placeholder {
        color: #999;
    }

    .form-group p {
        padding: 12px;
        background-color: #fafafa;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        color: #333;
        margin: 0;
    }

    .save-btn {
        background-color: #4285f4;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .save-btn:hover {
        background-color: #e74c3c;
    }

    .save-btn:active {
        background-color: #e74c3c;
    }

    .remove-btn {
        background-color: rgb(146, 7, 21);
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        margin-top: 10px;
        margin-left: 10px;
        transition: background-color 0.3s ease;
    }

    .remove-btn:hover {
        background-color: #c82333;
    }

    .image-actions {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 5px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-header">
            <div class="profile-image-container">
                <img id="profileImage" class="profile-image"
                    src="data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='35' r='15' fill='%23999'/%3E%3Cpath d='M50 55c-15 0-25 10-25 20v5h50v-5c0-10-10-20-25-20z' fill='%23999'/%3E%3C/svg%3E"
                    alt="Profile Image">
                <div class="upload-overlay" onclick="document.getElementById('fileInput').click()">
                    <div class="upload-icon">📷</div>
                </div>
                <input type="file" id="fileInput" class="file-input" accept="image/*">
            </div>
        </div>

        <div class="image-actions">
            <button type="button" class="upload-btn" onclick="document.getElementById('fileInput').click()">
                Upload Photo
            </button>
            <button type="button" class="remove-btn" id="removeBtn" onclick="removeImage()" style="display: none;">
                Remove Photo
            </button>
        </div>

        <div style="margin-top: 30px;">


            <div class="form-row">
                <div class="form-group" data-key="first_name">
                    <label>First Name</label>
                    <p>Rakib</p>
                </div>

                <div class="form-group" data-key="last_name">
                    <label>Last Name</label>
                    <p>Islam</p>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group" data-key="dob">
                    <label>Date of Birth</label>
                    <p>1999-12-31</p>
                </div>

                <div class="form-group" data-key="username">
                    <label>Username</label>
                    <p>Chaitu2025</p>
                </div>




            </div>


            <div class="form-row">
                <div class="form-group" data-key="email">
                    <label>Email Address</label>
                    <p>your.email@example.com</p>
                </div>

                <div class="form-group" data-key="phone">
                    <label>Phone Number</label>
                    <p>+1 (555) 123-4567</p>
                </div>

            </div>



            <div class="form-row">
                <div class="form-group" data-key="address">
                    <label>Address</label>
                    <p>123 Main Street</p>
                </div>

                <div class="form-group" data-key="region">
                    <label>Region</label>
                    <p>United States</p>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group" data-key="street_address">
                    <label>Street Address</label>
                    <p>Suite 10</p>
                </div>

                <div class="form-group" data-key="zip">
                    <label>ZIP Code</label>
                    <p>12345</p>
                </div>
            </div>



            <div class="form-row">
                <div class="form-group" data-key="password">
                    <label>Password</label>
                    <p>********</p>
                </div>

                <div class="form-group" data-key="confirm_password">
                    <label>Confirm Password</label>
                    <p>********</p>
                </div>
            </div>
        </div>



        <button type="submit" class="save-btn">Edit Your Profile</button>
    </div>

    <script>
    const fileInput = document.getElementById('fileInput');
    const profileImage = document.getElementById('profileImage');
    const removeBtn = document.getElementById('removeBtn');
    const defaultImageSrc =
        "data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='35' r='15' fill='%23999'/%3E%3Cpath d='M50 55c-15 0-25 10-25 20v5h50v-5c0-10-10-20-25-20z' fill='%23999'/%3E%3C/svg%3E";

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Check if file is an image
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file.');
                return;
            }

            // Check file size (limit to 5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
                removeBtn.style.display = 'inline-block';
            };
            reader.readAsDataURL(file);
        }
    });

    function removeImage() {
        profileImage.src = defaultImageSrc;
        removeBtn.style.display = 'none';
        fileInput.value = '';
    }

    // Handle drag and drop
    const imageContainer = document.querySelector('.profile-image-container');

    imageContainer.addEventListener('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        imageContainer.style.opacity = '0.8';
    });

    imageContainer.addEventListener('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        imageContainer.style.opacity = '1';
    });

    imageContainer.addEventListener('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        imageContainer.style.opacity = '1';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            if (file.type.startsWith('image/')) {
                if (file.size <= 5 * 1024 * 1024) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                        removeBtn.style.display = 'inline-block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('File size must be less than 5MB.');
                }
            } else {
                alert('Please select an image file.');
            }
        }
    });
    </script>

    <script>
    let isEditing = false;

    document.querySelector('.save-btn').addEventListener('click', function() {
        const groups = document.querySelectorAll('.form-group');

        if (!isEditing) {
            // Convert <p> to <input> fields
            groups.forEach(group => {
                const key = group.getAttribute('data-key');
                const value = group.querySelector('p')?.innerText || '';
                let inputType = 'text';

                if (key === 'dob') inputType = 'date';
                if (key === 'email') inputType = 'email';
                if (key === 'phone') inputType = 'tel';
                if (key === 'password' || key === 'confirm_password') inputType = 'password';

                group.innerHTML = `
                <label>${group.querySelector('label').innerText}</label>
                <input type="${inputType}" name="${key}" value="${value}">
            `;
            });

            this.textContent = 'Save Changes';
            isEditing = true;
        } else {
            // Convert <input> back to <p>
            groups.forEach(group => {
                const input = group.querySelector('input');
                const label = group.querySelector('label').innerText;
                const value = input.value;

                group.innerHTML = `
                <label>${label}</label>
                <p>${value}</p>
            `;
            });

            this.textContent = 'Edit Your Profile';
            isEditing = false;
        }
    });
    </script>



</body>

</html>