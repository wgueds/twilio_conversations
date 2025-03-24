document.addEventListener('DOMContentLoaded', function() {
    function setupAjaxHeaders() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }

    function ajaxErrors(xHR, status, exception) {
        let msg = '';
        if (xHR.status === 0) {
            msg = 'Not connect. Verify Network.';
        } else if (xHR.status === 404) {
            msg = 'Requested page not found. [404]';
        } else if (xHR.status === 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + xHR.responseText;
        }
        alert(msg);
    }

    function fetchAccessToken() {
        setupAjaxHeaders();
        $.ajax({
            url: '/conversations/fetch-access-token',
            type: 'POST',
            data: {
                email: $('meta[name="auth-email"]').attr('content')
            },
            success: function(response){
                console.log(response);
            },
            error: function(xHR, status, error){
                ajaxErrors(xHR, status, error);
            }
        });
    }

    // Only run on conversations page
    if (window.location.pathname.includes('/conversations')) {
        fetchAccessToken();
    }
});
