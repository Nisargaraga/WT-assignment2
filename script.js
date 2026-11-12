$(document).ready(function() {

    $("#registrationForm").submit(function(event) {

        let name = $("input[name='name']").val().trim();
        let phone = $("input[name='phone']").val().trim();
        let dob = $("input[name='dob']").val();

        if (name.length < 3) {
            alert("Please enter a valid name.");
            event.preventDefault();
            return;
        }

        if (!/^[0-9]{10}$/.test(phone)) {
            alert("Phone number must contain exactly 10 digits.");
            event.preventDefault();
            return;
        }

        if (new Date(dob + "T00:00:00") > new Date()) {
            alert("Date of birth cannot be in the future.");
            event.preventDefault();
            return;
        }

    });

});