let input = document.getElementById('user-password');
let newdiv = document.createElement('div');
newdiv.classList = 'text-danger';
input.parentElement.appendChild(newdiv);


input.addEventListener('input', (elem) => {
    input.classList.remove("border-success", "border-danger", "border-warning")

    if (/(?=.*[!$#%])(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]/.test(input.value) && input.value.length >= 6) {
        newdiv.classList.remove('d-none');
        newdiv.textContent = 'Надёжный пароль';
    } else if (/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]/.test(input.value) && input.value.length >= 6) {
        newdiv.textContent = 'хороший пароль, чтобы улучшить добавьте спец символы';
        input.classList.add('border-warning');
    } else if (/(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]/.test(input.value) && input.value.length >= 6) {
        newdiv.textContent = 'средний пароль, чтобы улучшить добавьте спец символы и буквы двух регистров';
        input.classList.add('border-warning');
    } else {
        newdiv.textContent = ''
    }
})