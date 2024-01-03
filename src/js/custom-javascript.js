// Add your JS customizations here
if(window.location.hash) {
    const hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
    if (hash == 'submit'){
        const button = document.querySelector('#subButton');
        button.setAttribute("aria-expanded", 'true');
        button.classList.remove('collapsed');
        
        const form = document.querySelector('#submitForm');
        form.classList.add('show');

    }
} 