
function toggleForm() {
    const form = document.getElementById("carForm");
    form.style.display = (form.style.display === "block") ? "none" : "block";
}

function editCar(id) {
    window.location.href = "manage_cars.php?edit=" + id ;
}