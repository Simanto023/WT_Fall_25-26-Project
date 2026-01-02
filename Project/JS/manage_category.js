function toggleForm() {
    const form = document.getElementById("categoryForm");
    form.style.display = (form.style.display === "block") ? "none" : "block";
}

function deleteCategory(id) {
    if (confirm("Delete this category?")) {
        window.location.href = "PHP/delete_category.php?id=" + id;
    }
}
function archiveCategory(id) {
    if (confirm("Archive this category?")) {
        window.location.href = "PHP/archive_category.php?id=" + id;
    }
}