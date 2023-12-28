document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', function(event) {
        let json;
        event.preventDefault();
        let formData = new FormData(this);
        let xhr = new XMLHttpRequest();
            xhr.open(this.method, this.action);
        xhr.onload = function() {
            if (xhr.status === 200) {
                json = JSON.parse(xhr.responseText);
                if (json.url) {
                    window.location.href = json.url;
                } else {
                    alert(json.status + ' - ' + json.message);
                }
            } else {
                alert('Error: ' + xhr.status);
            }
        };
        xhr.onerror = function() {
            alert('Request failed');
        };
        xhr.send(formData);
    });
});