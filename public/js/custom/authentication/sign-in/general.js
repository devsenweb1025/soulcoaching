"use strict";

// Class definition
var KTSigninGeneral = function () {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'Dies ist keine gültige Mailadresse'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The Passwort ist erforderlich'
                            },
                            callback: {
                                message: 'Please enter valid password',
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Simulate ajax request
                    axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            console.log(response.data);
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "You have successfully logged in!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Weiter!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    form.querySelector('[name="email"]').value = "";
                                    form.querySelector('[name="password"]').value = "";
                                    window.location.reload();
                                }
                            });
                        })
                        .catch(function (error) {
                            let errorMessage = '';

                            if (error.response) {
                                if (error.response.status === 403 && error.response.data.status === 'error') {
                                    // Handle unverified email case
                                    errorMessage = error.response.data.message;

                                    // Show resend verification email button
                                    Swal.fire({
                                        text: errorMessage,
                                        icon: "error",
                                        buttonsStyling: false,
                                        showCancelButton: true,
                                        confirmButtonText: "Resend Verification Email",
                                        cancelButtonText: "Cancel",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                            cancelButton: "btn btn-light"
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Show loading state
                                            Swal.fire({
                                                title: "Sending...",
                                                text: "Please wait while we send the verification email",
                                                icon: "info",
                                                showConfirmButton: false,
                                                allowOutsideClick: false
                                            });

                                            // Send resend verification request
                                            axios.post('/email/verification-notification', {
                                                email: form.querySelector('[name="email"]').value
                                            })
                                            .then(function(response) {
                                                Swal.fire({
                                                    text: "Verification email has been sent! Please check your inbox.",
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "Weiter!",
                                                    customClass: {
                                                        confirmButton: "btn btn-primary"
                                                    }
                                                });
                                            })
                                            .catch(function(error) {
                                                let resendErrorMessage = 'Failed to send verification email. Please try again.';
                                                if (error.response && error.response.data.message) {
                                                    resendErrorMessage = error.response.data.message;
                                                }
                                                Swal.fire({
                                                    text: resendErrorMessage,
                                                    icon: "error",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "Weiter!",
                                                    customClass: {
                                                        confirmButton: "btn btn-primary"
                                                    }
                                                });
                                            });
                                        }
                                    });
                                    return; // Return early to prevent showing the default error message
                                } else if (error.response.data.errors) {
                                    // Handle validation errors
                                    const errors = error.response.data.errors;
                                    for (const field in errors) {
                                        errorMessage += errors[field].join('\n') + '\n';
                                    }
                                } else if (error.response.data.message) {
                                    errorMessage = error.response.data.message;
                                }
                            } else {
                                errorMessage = 'An unexpected error occurred. Please try again.';
                            }

                            Swal.fire({
                                text: errorMessage,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Weiter!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Es sind Fehler aufgetreten, bitte versuche es erneut.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Weiter!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
