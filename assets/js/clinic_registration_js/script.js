$(document).ready(function () {
    $("#clinic").validate({
        rules: {
            clinic_name: {
                required: true,
                minlength: 3
            },
            clinic_address: {
                required: true
            },
            clinic_phone: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            pet_type: {
                required: true
            },
            opening_time: {
                required: true
            },
            closing_time: {
                required: true
            },
            open_day: {
                required: true
            },
            close_day: {
                required: true
            },
            fees: {
                required: true
            },
            email:{
                required: true,
                email: true,
                
            },
            rating:{
                required: true,
            }
        },
        messages: {
            clinic_name: {
                required: "Please enter Clinic Name",
                minlength: "Clinic Name should be at least 3 characters"
            },
            clinic_address: {
                required: "Please enter Clinic Address"
            },
            clinic_phone: {
                required: "Please enter Clinic Phone",
                minlength: "Clinic Phone should be at least 10 digits",
                maxlength: "Clinic Phone should not be more than 10 digits"
            },
            pet_type: {
                required: "Please enter Pet Type"
            },
            opening_time: {
                required: "Please enter Opening Time"
            },
            closing_time: {
                required: "Please enter Closing Time"
            },
            open_day: {
                required: "Please enter Days Open"
            },
            close_day: {
                required: "Please enter Days Closed"
            },
            fees: {
                required: "Please enter Fees"
            }
        }
    });
});