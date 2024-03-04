function confirmDelete() {
    return confirm('Are you sure you want to delete this order?');
}





// not working 

function updateOrder() {
    // Hide the add order form container
    var addOrderContainer = document.getElementById('add-order-container');
    addOrderContainer.style.display = 'none';

    // Show the update order form container
    var updateOrderContainer = document.getElementById('update-order-container');
    updateOrderContainer.style.display = 'block';
}




        // function printTable() {
        //     // Hide non-printable elements
        //     document.querySelector('.btn-print').style.display = 'none';
        //     // Trigger print dialog
        //     window.print();
        //     // Show elements again after printing
        //     document.querySelector('.btn-print').style.display = 'block';
        // }

        


function printTable() {
    // Hide all columns except the ones you want to print
    var table = document.querySelector('.table-container table');
    var headersToHide = table.querySelectorAll('th:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)):not(:nth-child(4)):not(:nth-child(5)):not(:nth-child(6))'); // Select all th elements except for the first six
    headersToHide.forEach(function(header) {
        header.style.display = 'none';
    });

    // Hide non-printable elements
    document.querySelector('.btn-print').style.display = 'none';
    // Trigger print dialog
    window.print();
    // Show elements again after printing
    document.querySelector('.btn-print').style.display = 'block';

    // Show the hidden columns after printing
    headersToHide.forEach(function(header) {
        header.style.display = '';
    });
}














