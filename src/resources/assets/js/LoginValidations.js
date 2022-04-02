const form = document.getElementById('form')
const documento = document.getElementById('UserDoc')
const password = document.getElementById('UserPass')

form.addEventListener('submit', event => {
    console.log('pasa')

    event.preventDefault()

    checkInputs()
})


function checkInputs() {
    const documentoValue = documento.value.trim()
    const passwordValue = password.value.trim()
    let documentoPass = false
    let passwordPass = false

    if (documentoValue === '') {
        setErrorFor(documento, "El documento es requerido.")
    } else if (!validateDocumento(documentoValue)) {
        setErrorFor(documento, 'El documento debe ser númerico y sin puntos.')
    } else {
        setSuccessFor(documento)
        documentoPass = true
    }

    if (passwordValue === '') {
        setErrorFor(password, "La contraseña es requerida.")
    } else {
        setSuccessFor(password)
        passwordPass = true
    }

    if (documentoPass && passwordPass) {
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
function validateDocumento(documento) {
    return /^\d+$/.test(documento);
}

