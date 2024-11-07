function setDeleteFormAction(action) {
    document.getElementById('deleteForm').action = action;
}
    
document.addEventListener('DOMContentLoaded', function() {
    if (typeof $.fn.DataTable !== 'undefined') {
        $('#datatablesSimple').DataTable();
    }
});

