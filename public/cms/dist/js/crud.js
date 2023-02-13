function store(url, data) {
    axios.post(url, data)
        .then(function(response) {
            console.log(response);
            if (document.getElementById('create_form') != undefined)
                document.getElementById('create_form').reset();
            showToaster(response.data.message, true);
        })
        .catch(function(error) {
            console.log("ERROR RESPONSE");
            console.log(error.response);
            showToaster(error.response.data.message, false);
        });
}

function storepart(url, data) {

    axios.post(url, data)

    .then(function(response) {
        showMessage(response.data);
        clearForm();
        clearAndHideErrors();

    })

    .catch(function(error) {

        if (error.response.data.errors !== undefined) {
            showErrorMessages(error.response.data.errors);
        } else {

            showMessage(error.response.data);
        }
    });

}

function storeRoute(url, data) {
    axios.post(url, data, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            window.location = response.data.redirect;
            // showMessage(response.data);
            // clearForm();
            // clearAndHideErrors();

        })
        .catch(function(error) {

            if (error.response.data.errors !== undefined) {
                showErrorMessages(error.response.data.errors);
            } else {

                showMessage(error.response.data);
            }
        });
}

function storeRedirect(url, data, redirectUrl) {
    axios.post(url, data)
        .then(function(response) {
            console.log(response);
            if (redirectUrl != null)
                window.location.href = redirectUrl;
        })
        .catch(function(error) {
            console.log(error.response);
        });
}

function update(url, data, redirectUrl) {
    axios.put(url, data)
        .then(function(response) {
            console.log(response);
            if (redirectUrl != null)
                window.location.href = redirectUrl;
        })
        .catch(function(error) {
            console.log(error.response);
            showToaster(error.response.data.message, false);
        });
}

function confirmDestroy(url, td) {
    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: "لا يمكن التراجع عن عملية الحذف",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'إلغاء',
    }).then((result) => {
        if (result.isConfirmed) {
            destroy(url, td);
        }
    });
}

function destroy(url, td) {
    axios.delete(url)
        .then(function(response) {
            // handle success
            console.log(response.data);
            td.closest('tr').remove();
            showToaster(response.data.message, true);
        })
        .catch(function(error) {
            // handle error
            console.log(error.response);
            showToaster(error.response.data.message, false);
        })
        .then(function() {
            // always executed
        });
}

function showToaster(message, status) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    if (status) {
        console.log("SUCCESS");
        toastr.success(message);
    } else {
        console.log("ERROR");
        toastr.error(message);
    }
}

function showAlert(data) {
    Swal.fire({
        title: data.title,
        text: data.message,
        icon: data.icon,
        timer: 2000,
        showConfirmButton: false,
        timerProgressBar: false,
        willOpen: () => {
            // Swal.showLoading()
        },
        willClose: () => {

        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
    });
}

function showErrorMessages(errors) {

    document.getElementById('error_alert').hidden = false
    var errorMessagesUl = document.getElementById("error_messages_ul");
    errorMessagesUl.innerHTML = '';

    for (var key of Object.keys(errors)) {
        var newLI = document.createElement('li');
        newLI.appendChild(document.createTextNode(errors[key]));
        errorMessagesUl.appendChild(newLI);
    }
}

function clearAndHideErrors() {
    document.getElementById('error_alert').hidden = true
    var errorMessagesUl = document.getElementById("error_messages_ul");
    errorMessagesUl.innerHTML = '';
}

function clearForm() {
    document.getElementById("create_form").reset();
}

function showMessage(data) {
    console.log(data);
    Swal.fire({
        position: 'center',
        icon: data.icon,
        title: data.title,
        showConfirmButton: false,
        timer: 1500
    })
}