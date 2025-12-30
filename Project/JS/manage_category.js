function toggleForm() {
    const form = document.getElementById("categoryForm");
    form.style.display = (form.style.display === "block") ? "none" : "block";
}

function cannotDelete() {
    alert("Cannot delete category. Cars are still assigned to this category.");
    return false;
}