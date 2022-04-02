const form = document.getElementById('form')
const nombre = document.getElementById('userNombre')
const tipoDocumento = document.getElementById('userTypeDoc')
const correo = document.getElementById('userEmail')
const password = document.getElementById('UserPass')
const password1 = document.getElementById('userPass1')
const check = document.getElementById('checkAuthTerms')

form.addEventListener('submit', event => {
    console.log('pasa')

    event.preventDefault()

    checkInputs()
})

function checkInputs() {
    const nombreValue = nombre.value.trim()
    const tipoDocumentoValue = tipoDocumento.value.trim()
    const correoValue = correo.value.trim()
    const passwordValue = password.value.trim()
    const password1Value = password1.value.trim()

    let nombrePass = false
    let tipoDocumentoPass = false
    let correoPass = false
    let passwordPass = false
    let password1Pass = false
    let checkPass = false

    if (nombreValue === '') {
        setErrorFor(nombre, "El nombre es requerido.")
    } else if (!validateNombre(nombreValue)) {
        setErrorFor(nombre, 'El nombre debe ser únicamente compuesto por caracteres del alfabeto.')
    } else {
        setSuccessFor(nombre)
        nombrePass = true
    }

    if (tipoDocumentoValue === '' || tipoDocumentoValue < 1) {
        setErrorFor(tipoDocumento, "El tipo de documento es requerido.")
    } else {
        setSuccessFor(tipoDocumento)
        tipoDocumentoPass = true
    }

    if (correoValue === '') {
        setErrorFor(correo, "El correo es requerido.")
    } else if (!validateCorreo(correoValue)) {
        setErrorFor(correo, 'El formato de correo electrónico es incorrecto.')
    } else {
        setSuccessFor(correo)
        correoPass = true
    }

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

    if (check.checked !== true) {
        setErrorCheck(check, "Es necesario aceptar los terminos y condiciones.")
    } else {
        setSuccessCheck(check)
        checkPass = true
    }

    if (
        nombrePass &&
        tipoDocumentoPass &&
        correoPass &&
        passwordPass &&
        password1Pass &&
        checkPass
    ) {
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

function setErrorCheck(input, message) {
    const formGroup = input.parentElement // custom-control
    const span = formGroup.querySelector('div')

    // añadir el mensaje de error
    span.innerText = message
    span.className = 'alert alert-danger mt-1'
}

function setSuccessCheck(input) {
    const formGroup = input.parentElement // custom-control
    const span = formGroup.querySelector('div')
    // añadir el mensaje de error
    span.innerText = null
    span.className = null
}

// validaciones con expresiones regulares
function validateNombre(nombre) {
    return /^([A-Z a-zÑñÁÉÍÓÚáéíóú])*$/.test(nombre)
}

function validateCorreo(correo) {
    return /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo)
}

function validatePassword(password) {
    return /^[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~-]*$/.test(password)
}
