<?php
?>

<style>
    .container {
        max-width: 900px;
        margin: 2rem auto;
        background: var(--white);
        border-radius: 1.25rem;
        box-shadow: var(--shadow);
        overflow: hidden;
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Form Header */
    .form-header {
        background: var(--header-gradient);
        color: var(--white);
        padding: 1.875rem;
        text-align: center;
    }

    .form-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.625rem;
        animation: fadeIn 0.8s ease-out 0.2s both;
    }

    .form-header p {
        font-size: 1.1rem;
        opacity: 0.9;
        animation: fadeIn 0.8s ease-out 0.4s both;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Form Styles */
    .student-form {
        padding: 2.5rem;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 2.5rem;
        animation: fadeInUp 0.6s ease-out;
    }

.section-title {
    color: var(--secondary-color);
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5625rem;
    padding-bottom: 0.75rem;
    border-bottom: 0.125rem solid var(--primary-color);
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -0.125rem;
    left: 0;
    width: 3.125rem;
    height: 0.125rem;
    background: var(--secondary-color);
    animation: expandWidth 0.8s ease-out;
}

@keyframes expandWidth {
    from { width: 0; }
    to { width: 50px; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Form Rows and Groups */
.form-row {
    display: flex;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
}

.form-group {
    flex: 1;
    position: relative;
}

.form-group.full-width {
    flex: 100%;
}

/* Labels */
label {
    display: block;
    color: var(--text-color);
    font-weight: 500;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

/* Input Styles */
input, select, textarea {
    width: 100%;
    padding: 0.75rem 0.9375rem;
    border: 0.125rem solid var(--border-color);
    border-radius: 0.625rem;
    font-size: 1rem;
    font-family: var(--primary-font);
    background: var(--white);
    transition: var(--transition);
    outline: none;
}

input:focus, select:focus, textarea:focus {
    border-color: var(--secondary-color);
    background: var(--white);
    box-shadow: var(--shadow-focus);
    transform: translateY(-0.125rem);
}

input:valid, select:valid, textarea:valid {
    border-color: var(--success-color);
}

/* Textarea */
textarea {
    resize: vertical;
    min-height: 5rem;
    max-height: 9.375rem;
}

/* File Input */
input[type="file"] {
    padding: 0.5rem;
    background: var(--white);
    border: 0.125rem dashed var(--secondary-color);
    cursor: pointer;
    transition: var(--transition);
}

input[type="file"]:hover {
    background: var(--primary-color);
    border-color: var(--secondary-color);
}

/* Select Dropdown */
select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23036ce2' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.75rem center;
    background-repeat: no-repeat;
    background-size: 1rem;
    padding-right: 2.5rem;
}

/* Error Styles */
.error {
    border-color: var(--error-color) !important;
    background: #fff5f5 !important;
    animation: shake 0.3s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-0.3125rem); }
    75% { transform: translateX(0.3125rem); }
}

.error-message {
    color: var(--error-color);
    font-size: 0.85rem;
    margin-top: 0.3125rem;
    display: none;
    font-weight: 500;
}

/* Buttons */
.form-buttons {
    display: flex;
    gap: 0.9375rem;
    justify-content: center;
    margin-top: 2.5rem;
    padding-top: 1.875rem;
    border-top: 0.0625rem solid var(--border-color);
}

.btn {
    padding: 0.75rem 1.875rem;
    border: none;
    border-radius: 0.625rem;
    font-size: 1rem;
    font-weight: 600;
    font-family: var(--primary-font);
    cursor: pointer;
    transition: var(--transition);
    min-width: 9.375rem;
}

.btn-primary {
    background: var(--button-gradient);
    color: var(--white);
    box-shadow: var(--shadow);
}

.btn-primary:hover {
    background: var(--header-gradient);
    transform: translateY(-0.125rem);
    box-shadow: var(--shadow-focus);
}

.btn-secondary {
    background: var(--white);
    color: var(--text-color);
    border: 0.125rem solid var(--border-color);
}

.btn-secondary:hover {
    background: var(--primary-color);
    border-color: var(--secondary-color);
    color: var(--secondary-color);
    transform: translateY(-0.125rem);
}

.btn:active {
    transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        margin: 1rem;
        border-radius: 1rem;
    }

    .form-header {
        padding: 1.5rem;
    }

    .form-header h1 {
        font-size: 2rem;
    }

    .student-form {
        padding: 1.5rem;
    }

    .form-row {
        flex-direction: column;
        gap: 1rem;
    }

    .form-buttons {
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }

    .btn {
        width: 100%;
        max-width: 250px;
    }
}

@media (max-width: 480px) {
    .container {
        margin: 0.5rem auto;
        width: 90vw;
    }

    .form-header h1 {
        font-size: 1.8rem;
    }

    .form-header p {
        font-size: 1rem;
    }

    .student-form {
        padding: 1rem;
    }

    .form-section {
        margin-bottom: 1.5rem;
    }

    input, select, textarea {
        padding: 0.625rem;
        font-size: 16px; /* Prevent zoom on iOS */
    }
}

/* Loading Animation */
.loading {
    opacity: 0.7;
    pointer-events: none;
}

.loading .btn-primary::after {
    content: '';
    width: 16px;
    height: 16px;
    margin-left: 10px;
    border: 2px solid transparent;
    border-top: 2px solid white;
    border-radius: 50%;
    display: inline-block;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Success Animation */
.success {
    border-color: var(--success-color) !important;
    background: #f0fff4 !important;
}

/* Hover Effects */
.form-group:hover input,
.form-group:hover select,
.form-group:hover textarea {
    border-color: var(--secondary-color);
}

/* Focus Within Effect */
.form-group:focus-within label {
    color: var(--secondary-color);
    transform: translateY(-2px);
    transition: var(--transition);
}

/* Labels */
label {
    transition: var(--transition);
}
</style>

<div class="container">
        <div class="form-header">
            <h1>Add New Student</h1>
            <p>Fill in the student details below</p>
        </div>

        <form class="student-form" id="studentForm" novalidate enctype='multipart/form-data'>
            <!-- Personal Information Section -->
            <div class="form-section">
                <h2 class="section-title">Personal Information</h2>

                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name *</label>
                        <input type="text" id="firstName" name="firstName" required pattern="[A-Za-z]{2,30}"
                            title="First name should contain only letters (2-30 characters)">
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name *</label>
                        <input type="text" id="lastName" name="lastName" required pattern="[A-Za-z]{2,30}"
                            title="Last name should contain only letters (2-30 characters)">
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="dob">Date of Birth *</label>
                        <input type="date" id="dob" name="dob" required min="1990-01-01" max="2010-12-31">
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender *</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="address">Address *</label>
                        <textarea id="address" name="address" required pattern=".{10,200}"
                            title="Address should be 10-200 characters long"
                            placeholder="Enter complete address"></textarea>
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City *</label>
                        <select id="city" name="city" required>
                            <option value="">Select City</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="delhi">Delhi</option>
                            <option value="bangalore">Bangalore</option>
                            <option value="hyderabad">Hyderabad</option>
                            <option value="ahmedabad">Ahmedabad</option>
                            <option value="chennai">Chennai</option>
                            <option value="kolkata">Kolkata</option>
                            <option value="pune">Pune</option>
                            <option value="jaipur">Jaipur</option>
                            <option value="lucknow">Lucknow</option>
                            <option value="kanpur">Kanpur</option>
                            <option value="nagpur">Nagpur</option>
                            <option value="indore">Indore</option>
                            <option value="thane">Thane</option>
                            <option value="bhopal">Bhopal</option>
                            <option value="visakhapatnam">Visakhapatnam</option>
                            <option value="pimpri">Pimpri-Chinchwad</option>
                            <option value="patna">Patna</option>
                            <option value="vadodara">Vadodara</option>
                            <option value="ghaziabad">Ghaziabad</option>
                        </select>
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number *</label>
                        <input type="tel" id="mobile" name="mobile" required pattern="[6-9][0-9]{9}"
                            title="Mobile number should be 10 digits starting with 6-9"
                            placeholder="Enter 10-digit mobile number">
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address"
                            placeholder="student@example.com">
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="photo">Student Photo</label>
                        <input type="file" id="photo" name="photo" accept="image/jpeg,image/jpg,image/png"
                            title="Please select a JPG or PNG image">
                        <span class="error-message"></span>
                    </div>
                </div>
            </div>

            <!-- Academic Information Section -->
            <div class="form-section">
                <h2 class="section-title">Academic Information</h2>

                <div class="form-row">
                    <div class="form-group">
                        <label for="qualification">Qualification *</label>
                        <select id="qualification" name="qualification" required>
                            <option value="">Select Qualification</option>
                            <option value="10th">10th Pass</option>
                            <option value="12th">12th Pass</option>
                            <option value="diploma">Diploma</option>
                            <option value="graduate">Graduate</option>
                            <option value="postgraduate">Post Graduate</option>
                        </select>
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="department">Department *</label>
                        <select id="department" name="department" required>
                            <option value="">Select Department</option>
                            <option value="1">Computer Science Engineering</option>
                            <option value="2">Information Technology</option>
                            <option value="3">Electronics & Communication</option>
                            <option value="4">Mechanical Engineering</option>
                            <option value="5">Civil Engineering</option>
                            <option value="6">Electrical Engineering</option>
                        </select>
                        <span class="error-message"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="admissionDate">Admission Date *</label>
                        <input type="date" id="admissionDate" name="admissionDate" required min="2020-01-01"
                            max="2030-12-31">
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="graduated">Graduated</option>
                            <option value="suspended">Suspended</option>
                        </select>
                        <span class="error-message"></span>
                    </div>
                </div>
            </div>

            <!-- Form Buttons -->
            <div class="form-buttons">
                <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset Form</button>
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
        </form>
    </div>

      <script>
        // Simple form validation
        const form = document.getElementById('studentForm');
        const inputs = form.querySelectorAll('input, select, textarea');

        // Add event listeners for real-time validation
        inputs.forEach(input => {
            input.addEventListener('blur', validateField);
            input.addEventListener('input', clearError);
        });

        function validateField(e) {
            const field = e.target;
            const errorSpan = field.nextElementSibling;

            if (field.hasAttribute('required') && !field.value.trim()) {
                showError(field, errorSpan, 'This field is required');
                return false;
            }

            if (field.hasAttribute('pattern') && field.value && !field.checkValidity()) {
                showError(field, errorSpan, field.getAttribute('title'));
                return false;
            }

            if (field.type === 'email' && field.value && !field.checkValidity()) {
                showError(field, errorSpan, 'Please enter a valid email address');
                return false;
            }

            clearError(e);
            return true;
        }

        function showError(field, errorSpan, message) {
            field.classList.add('error');
            errorSpan.textContent = message;
            errorSpan.style.display = 'block';
        }

        function clearError(e) {
            const field = e.target;
            const errorSpan = field.nextElementSibling;
            field.classList.remove('error');
            errorSpan.style.display = 'none';
        }

        // Form submission
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            let isValid = true;
            inputs.forEach(input => {
                if (!validateField({ target: input })) {
                    isValid = false;
                }
            });

            if (isValid) {
                alert('Form is valid! Ready to submit to database.');
                // Here you would normally send data to server
                console.log('Form data ready for submission');
            } else {
                alert('Please fix the errors in the form');
            }
        });

        // Reset form function
        function resetForm() {
            if (confirm('Are you sure you want to reset the form? All data will be lost.')) {
                form.reset();
                inputs.forEach(input => {
                    input.classList.remove('error');
                    const errorSpan = input.nextElementSibling;
                    if (errorSpan) errorSpan.style.display = 'none';
                });
            }
        }

        // Set today's date as default for admission date
        document.getElementById('admissionDate').valueAsDate = new Date();
    </script>