document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            let valid = true;
            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = '';
                }
            });
            if (!valid) {
                event.preventDefault();
                alert('Please fill out all required fields.');
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const updateStatusLinks = document.querySelectorAll('.update-status');
    
    updateStatusLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            
            const orderId = this.dataset.id;
            const linkElement = this;
            
            fetch('update_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    'order_id': orderId
                })
            })
            .then(response => response.text())
            .then(data => {
                if (data === "Status updated successfully!") {
                    linkElement.textContent = "Done";
                } else {
                    alert(data);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
