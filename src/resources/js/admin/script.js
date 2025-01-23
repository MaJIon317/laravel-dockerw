import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

import './unlayer'

window.tooltip = function(_this = null) {
    let tooltipTriggerList;

    if (_this) {
        tooltipTriggerList = _this.querySelectorAll('[data-bs-toggle="tooltip"]')
    } else {
        tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    }
     
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
}

tooltip()

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');

    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.onclick = function (event) {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        }
    }

    imageUpload()
    imagePopup()
});

window.imagePopup = function() {
    const images = document.querySelectorAll('[data-image-original]')

    images.forEach(image => {
        image.onclick = function (event) {

            console.log('imagePopup')
        }
    });
}

window.imageUpload = function() {
    const uploads = document.querySelectorAll('[data-image-upload]')

    uploads.forEach(upload => {
        var buttons = upload.querySelectorAll('button'),
            buttonUpload = buttons[0] ?? null,
            buttonClear = buttons[1] ?? null,
            uploadInput = upload.querySelector('input[type="hidden"]'),
            uploadImage = upload.querySelector('img'),
            timer = null;

        if (buttonUpload) {
            buttonUpload.onclick = function (event) {
                event.preventDefault();

                var formUpload = document.getElementById('form-upload')

                if (formUpload) {
                    formUpload.remove();
                }

                document.body.insertAdjacentHTML('beforeend', '<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file[]" value="" multiple="multiple" /></form>');

                document.getElementById('form-upload').querySelector('input[name=\'file[]\']').click()

                if (typeof timer != 'undefined') {
                    clearInterval(timer);
                }

                timer = setInterval(function() {
                    if (document.getElementById('form-upload').querySelector('input[name=\'file[]\']').value != '') {
                        clearInterval(timer);

                        // Create a FormData object to store the file data
                        const formData = new FormData();

                        formData.append('file', document.getElementById('form-upload').querySelector('input[name=\'file[]\']').files[0])
                  
                        formData.append('path', uploadInput.getAttribute('data-path', 'demo'))

                        fetch(document.querySelector('base').href + '/image/upload', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => {
                            return response.json();
                        })
                        .then(data => {
                            if (data.error) {
                                toast(data.error, 'error')
                            }
                            
                            if (data.success) {
                                uploadInput.setAttribute('value', data.success.path)
                                uploadImage.setAttribute('src', data.success.image)
                                uploadImage.setAttribute('data-image-original', data.success.thumb)
                            }
                        })
                        .catch(function(error) {
                            toast(error, 'error')
                            console.log('Error:', error);
                        });
            
                    }
                }, 500)
            }
        }
        
        if (buttonClear) {
            buttonClear.onclick = function (event) {
                uploadInput.value = '';
                uploadInput.setAttribute('value', '');

                uploadImage.setAttribute('src', uploadImage.getAttribute('data-placeholder'))
            }
        }
    });
}



window.toast = function(message = '', type = 'success', autoClose = 5000) {
    if (message === '') { return }

    let toastContainer = document.getElementById('toast');

    if (!toastContainer) {
        toastContainer = document.createElement('div'), toastContainer.setAttribute('id', 'toast'), toastContainer.classList.add('toast'), document.body.appendChild(toastContainer);
    }

    let alert = `<div class="toast__alert toast__alert--${type}">
                    <div class="toast__alert-message">${message}</div>
                    <span class="toast__alert-close"></span>
                </div>`

    toastContainer.insertAdjacentHTML('afterbegin', alert)

    setTimeout(() => {
        var isAlert = document.querySelector('.toast__alert')
        if (typeof (isAlert) != 'undefined' && isAlert != null) isAlert.classList.add('toast__alert--in')
    }, 100)

    setTimeout(() => {
        var isAlert = document.querySelector('.toast__alert')
        if (typeof (isAlert) != 'undefined' && isAlert != null) isAlert.classList.remove('toast__alert--in')
        setTimeout(() => {
            document.querySelector('.toast__alert').remove()
        }, 100)
    }, autoClose)

    let closeBtn = document.querySelector('.toast__alert-close')
    closeBtn.onclick = function (event) {
        document.querySelector('.toast__alert').classList.remove('toast__alert--in')
        setTimeout(() => {
            document.querySelector('.toast__alert').remove()
        }, 100)
    }
}

let debounce = function(func, delay) {
    let inDebounce;
    return function() {
        clearTimeout(inDebounce);
        inDebounce = setTimeout(() => func.apply(this, arguments), delay);
    };
};

/* Filters */
let filterElementItem = document.getElementById('filter');

if (filterElementItem) {
    filterElementItem.addEventListener('input', debounce(function(event) {
        
       filterElement(this)

    }, 500));
}

window.filterElement = function(_this)
{
    var table = _this.closest('table');

    var url = _this.getAttribute('data-route');

    var inputs = _this.querySelectorAll('input[type="text"],input[type="email"],input[type="date"],input[type="number"],input[type="checkbox"]:checked,select');

    var inputData = [];

    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];

        if (input.value) {
            inputData.push(input.name + '=' + encodeURIComponent(input.value));
        }
    }

    if (inputData.length) {
        url += (url.indexOf('?') == -1 ? '?' : '&') + inputData.join('&');
    }

    filterRequest(table, url)

}

window.filterSort = function(_this, url)
{
    var table = _this.closest('table');

    filterRequest(table, url)
}

window.filterRequest = function(table, url)
{
    url = url.replace(/\?$/, '')

    history.pushState({}, null, url);

    fetch(url, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            return response.text();
        })
        .then(function(html) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(html, "text/html");
    
            var thead = table.querySelector('thead').firstElementChild;

            var tbody = table.querySelector('tbody');
            var docArticle = doc.getElementById(table.getAttribute('id'));

            thead.replaceWith(docArticle.querySelector('thead').firstElementChild)
            tbody.replaceWith(docArticle.querySelector('tbody'))

            document.querySelector('.paginationp').replaceWith(doc.querySelector('.paginationp'))
        })
        .catch(function(error) {
            console.log('Failed to fetch page: ', error);  
        });
}