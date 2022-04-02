const form = document.getElementById('form')
const nombre = document.getElementById('nombre')
const telefono = document.getElementById('telefono')
const direccion = document.getElementById('direccion')

form.addEventListener('submit', event => {
    event.preventDefault()
    checkInputs()
})

function checkInputs() {
    const nombreValue = nombre.value.trim()
    const telefonoValue = telefono.value.trim()
    const direccionValue = direccion.value.trim()

    let nombrePass = false
    let telefonoPass = false
    let direccionPass = false

    if (nombreValue === '') {
        setErrorFor(nombre, "El nombre es requerido.")
    } else if (!validateNombre(nombreValue)) {
        setErrorFor(nombre, 'El nombre debe ser únicamente compuesto por caracteres del alfabeto.')
    } else {
        setSuccessFor(nombre)
        nombrePass = true
    }

    if (telefonoValue === '') {
        setErrorFor(telefono, "El teléfono es requerido.")
    } else if (!validateTelefono(telefonoValue)) {
        setErrorFor(telefono, 'El teléfono debe ser únicamente compuesto por caracteres númericos.')
    } else {
        setSuccessFor(telefono)
        telefonoPass = true
    }

    if (direccionValue === '') {
        setErrorFor(direccion, "La dirección es requerida.")
    } else {
        setSuccessFor(direccion)
        direccionPass = true
    }

    if (
        nombrePass &&
        telefonoPass  &&
        direccionPass    
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
    return /^([A-Z a-zÑñÁÉÍÓÚáéíóú-])*$/.test(nombre)
}

function validateTelefono(telefono) {
    return /^([0-9 -])*$/.test(telefono)
}