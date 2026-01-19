document.addEventListener("DOMContentLoaded", function () {

    const btn = document.getElementById("show_phone_btn");
    const phone = document.getElementById("phone_number");

    if (btn && phone) {
        btn.addEventListener("click", function () {
            phone.style.display = "block";
            btn.style.display = "none";
        });
    }

});
