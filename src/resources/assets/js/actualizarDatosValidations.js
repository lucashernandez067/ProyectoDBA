const form = document.getElementById('form')
const nombre = document.getElementById('nombre')
const tipoDocumento = document.getElementById('userTypeDoc')
const correo = document.getElementById('userEmail')

form.addEventListener('submit', event => {
    event.preventDefault()
    checkInputs()
})

function checkInputs() {
    const nombreValue = nombre.value.trim()
    const tipoDocumentoValue = tipoDocumento.value.trim()
    const correoValue = correo.value.trim()

    let nombrePass = false
    let tipoDocumentoPass = false
    let correoPass = false

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

    if (
        nombrePass &&
        tipoDocumentoPass &&
        correoPass
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
