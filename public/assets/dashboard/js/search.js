$(document).ready(function() {
    // Event listener for search input change
    $('#searchInput').on('keyup', function() {
        var searchValue = $(this).val();
        var categoryId = $('#categoryFilter').val();

        // Perform the AJAX request
        $.ajax({
            url: '{{ route('medicines.storePage') }}',
            method: 'GET',
            data: {
                search: searchValue,
                cat_id: categoryId
            },
            success: function(response) {
                // Update the medicine list
                $('#medicinesList').html(response.medicines); 
            }
        });
    });

    // Event listener for category filter change
    $('#categoryFilter').on('change', function() {
        var searchValue = $('#searchInput').val();
        var categoryId = $(this).val();

        // Perform the AJAX request
        $.ajax({
            url: '{{ route('medicines.storePage') }}',
            method: 'GET',
            data: {
                search: searchValue,
                cat_id: categoryId
            },
            success: function(response) {
                // Update the medicine list
                $('#medicinesList').html(response.medicines); 
            }
        });
    });
});
