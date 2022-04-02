const form = document.getElementById('form')
const nombre = document.getElementById('nombre')
const codigo = document.getElementById('codigo')
const categoria = document.getElementById('categoria')
const proveedor = document.getElementById('proveedor')
const descripcion = document.getElementById('descripcion')
const cantidad = document.getElementById('cantidad') ? document.getElementById('cantidad') : undefined


form.addEventListener('submit', event => {
    console.log('pasa')

    event.preventDefault()

    checkInputs()
})

function checkInputs() {
    const nombreValue = nombre.value.trim()
    const codigoValue = codigo.value.trim()
    const categoriaValue = categoria.value.trim()
    const proveedorValue = proveedor.value.trim()
    const descripcionValue = descripcion.value.trim()
    const cantidadValue = cantidad ? cantidad.value.trim() : undefined

    let nombrePass = false
    let codigoPass = false
    let categoriaPass = false
    let proveedorPass = false
    let descripcionPass = false
    let cantidadPass = cantidad ? false : true

    if (nombreValue === '') {
        setErrorFor(nombre, "El nombre es requerido.")
    } else if (!validateNombre(nombreValue)) {
        setErrorFor(nombre, 'El nombre debe ser únicamente compuesto por caracteres del alfabeto.')
    } else {
        setSuccessFor(nombre)
        nombrePass = true
    }

    if (codigoValue === '') {
        setErrorFor(codigo, "El código es requerido.")
    } else {
        setSuccessFor(codigo)
        codigoPass = true
    }

    if (categoriaValue === '' || categoriaValue < 1) {
        setErrorFor(categoria, "La categoría es requerida.")
    } else {
        setSuccessFor(categoria)
        categoriaPass = true
    }

    if (proveedorValue === '' || proveedorValue < 1) {
        setErrorFor(proveedor, "El proveedor es requerido.")
    } else {
        setSuccessFor(proveedor)
        proveedorPass = true
    }

    if (descripcionValue === '') {
        setErrorFor(descripcion, "La descripción es requerida.")
    } else {
        setSuccessFor(descripcion)
        descripcionPass = true
    }

    if (cantidad) {
        if (cantidadValue === '') {
            setErrorFor(cantidad, "La cantidad inicial es requerida.")
        } else if (!validateCantidad(cantidadValue)) {
            setErrorFor(cantidad, "La cantidad inicial debe ser mayor que cero.")
        } else {
            setSuccessFor(cantidad)
            cantidadPass = true
        }
    }

    if (
        nombrePass &&
        codigoPass &&
        categoriaPass &&
        proveedorPass &&
        descripcionPass &&
        cantidadPass
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

function validateCantidad(cantidad) {
    return /^[1-9][0-9]*$/.test(cantidad)
}