document.addEventListener('DOMContentLoaded', function() {
    const emailLink = document.querySelector('a[href^="mailto:"]');
    if (emailLink) {
        emailLink.addEventListener('click', function(event) {
            alert('You are about to contact our admissions office via email.');
        });
    }
});
