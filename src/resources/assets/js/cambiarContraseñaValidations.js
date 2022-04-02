const form = document.getElementById('form')
const password = document.getElementById('UserPass')
const password1 = document.getElementById('userPass1')

form.addEventListener('submit', event => {
    event.preventDefault()

    checkInputs()
})

function checkInputs() {
    const passwordValue = password.value.trim()
    const password1Value = password1.value.trim()

    let passwordPass = false
    let password1Pass = false

    if (passwordValue === '') {
        setErrorFor(password, "La contraseña es requerida.")
    } else if (!validatePassword(passwordValue)) {
        setErrorFor(password, 'La contraseña no cumple con el formato requerido.')
    } else {
        setSuccessFor(password)
        passwordPass = true
    }

    if (password1Value === '') {
        setErrorFor(password1, "La contraseña es requerida.")
    } else if (password1Value !== passwordValue) {
        setErrorFor(password1, "Las contraseñas no coinciden.")
    } else {
        setSuccessFor(password1)
        password1Pass = true
    }

    if (passwordPass && password1Pass) {
        form.submit()
    }
}

function setErrorFor(input, message) {
    const formGroup = input.parentElement // form-group
    const span = formGroup.querySelector('div')

    // añadir el mensaje de error
    span.innerText = message
    input.className = 'form-control is-invalid'
    span.className = 'alert alert-danger mt-1'
}

function setSuccessFor(input) {
    const formGroup = input.parentElement // form-group
    const span = formGroup.querySelector('div')
    // añadir el mensaje de error
    span.innerText = null
    input.className = 'form-control' // is-valid
    span.className = null
}

// validaciones con expresiones regulares
function validatePassword(password) {
    return /^[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~-]*$/.test(password)
}
