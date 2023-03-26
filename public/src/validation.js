$().ready(function() {
    $("#validation").validate({
        rules: {
            fullname: "required",
            account: "required",
            password: "required",
            same_password: "required",
            sdt: "required",
            city: "required",
            district: "required",
            agree: "required",
        },
        messages: {
            fullname:  "Please enter your name",
            account:  "Please enter your account",
            password: "Please enter your password",
            same_password: "Please enter your same password",
            sdt: "Please enter your phone",
            city: "Please enter your city",
            district: "Please enter your district",
            agree: "Please enter your agree"
        }
        ,
        submitHandler: function(form) {
          form.submit();
        }
    });
    $("#formlogin").validate({
        rules: {
            account: "required",
            password: "required",
        },
        messages: {
            account: "Please enter your account",
            password: "Please enter your password",
        }
        ,
        submitHandler: function(form) {
          form.submit();
        }
    });
})

