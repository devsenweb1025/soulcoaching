"use strict";

// Class definition
var KTSignupGeneral = function () {
    // Elements
    var form;
    var submitButton;
    var validator;
    var passwordMeter;

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'first_name': {
                        validators: {
                            notEmpty: {
                                message: 'Vorname ist erforderlich'
                            }
                        }
                    },
                    'last_name': {
                        validators: {
                            notEmpty: {
                                message: 'Name ist erforderlich'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Mailadresse ist erforderlich'
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
                                message: 'Bitte ein gültiges Passwort eingeben.',
                                callback: function (input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'confirm-password': {
                        validators: {
                            notEmpty: {
                                message: 'Bitte bestätige dein Passwort.'
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'Die Passwörter stimmen nicht überein.'
                            }
                        }
                    },
                    'toc': {
                        validators: {
                            notEmpty: {
                                message: 'Bitte akzeptiere die AGB, um fortzufahren.'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }
                    }),
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
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Du hast dich erfolgreich registriert! Bitte bestätige über das erhaltene Mail dein Konto.",
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
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: error.response.data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Weiter!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
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

        // Handle password input
        form.querySelector('input[name="password"]').addEventListener('input', function () {
            if (this.value.length > 0) {
                validator.updateFieldStatus('password', 'NotValidated');
            }
        });
    }

    // Password input validation
    var validatePassword = function () {
        return (passwordMeter.getScore() > 50);
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_sign_up_form');
            submitButton = document.querySelector('#kt_sign_up_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});
