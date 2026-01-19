function toggleForm() {
    const form = document.getElementById("categoryForm");
    form.style.display = (form.style.display === "block") ? "none" : "block";
}

function deleteCategory(id) {
    if (confirm("Delete this category?")) {
        window.location.href = "../Controller/delete_category.php?id=" + id;
    }
}
function archiveCategory(id) {
    if (confirm("Archive this category?")) {
        window.location.href = "../Controller/archive_category.php?id=" + id;
    }
}

function activateCategory(id) {
    if (confirm("Activate this category?")) {
        window.location.href = "../Controller/activate_category.php?id=" + id;
    }
}
