//require('./bootstrap');
const Swal = require('sweetalert2');

document.querySelectorAll('.delete-button').forEach((obj) => {

    obj.addEventListener('click', (event) => {
        event.preventDefault();
        Swal.fire({
            title: event.target.dataset.title || 'Delete?',
            showCancelButton: true,
            confirmButtonText: `Yes`,
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {

                let xhr = new XMLHttpRequest();
                xhr.open("DELETE", event.target.getAttribute('href'), true);
                xhr.setRequestHeader('X-CSRF-TOKEN',document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                xhr.onload = () => {
                    //let result = JSON.parse(xhr.responseText);
                    if (Number(xhr.readyState) === 4 && Number(xhr.status) === 200) {
                        Swal.fire('Done!', '', 'success').then(() => {
                            let to = event.target.getAttribute('to');
                            if (to) {
                                window.location = to;
                            }
                        })
                    }
                }
                xhr.send(null);
            }
        })
    });
});
