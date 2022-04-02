const form = document.getElementById('form')
const nombre = document.getElementById('nombre')
const descripcion = document.getElementById('descripcion')

form.addEventListener('submit', event => {
    console.log('pasa')

    event.preventDefault()

    checkInputs()
})

function checkInputs() {
    const nombreValue = nombre.value.trim()
    const descripcionValue = descripcion.value.trim()

    let nombrePass = false
    let descripcionPass = false

    if (nombreValue === '') {
        setErrorFor(nombre, "El nombre es requerido.")
    } else if (!validateNombre(nombreValue)) {
        setErrorFor(nombre, 'El nombre debe ser únicamente compuesto por caracteres del alfabeto.')
    } else {
        setSuccessFor(nombre)
        nombrePass = true
    }

    if (descripcionValue === '') {
        setErrorFor(descripcion, "La descripción es requerida.")
    } else {
        setSuccessFor(descripcion)
        descripcionPass = true
    }

    if (
        nombrePass &&
        descripcionPass      
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

// validaciones con expresiones regulares
function validateNombre(nombre) {
    return /^([A-Z a-zÑñÁÉÍÓÚáéíóú])*$/.test(nombre)
}