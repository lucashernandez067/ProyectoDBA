const form = document.getElementById('form')
const permiso = document.getElementById('permiso')

form.addEventListener('submit', event => {
    event.preventDefault()
    checkInputs()
})

function checkInputs() {
    const permisoValue = permiso.value.trim()

    let permisoPass = false

    if (permisoValue === '' || permisoValue < 1) {
        setErrorFor(permiso, "El permiso es requerido.")
    } else {
        setSuccessFor(permiso)
        permisoPass = true
    }

    if (permisoPass) {
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