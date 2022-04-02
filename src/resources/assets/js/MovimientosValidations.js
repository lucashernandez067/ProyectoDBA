const form = document.getElementById('form')
const producto = document.getElementById('producto')
const movimiento = document.getElementById('movimiento') ? document.getElementById('movimiento') : 'except' 
const cantidad = document.getElementById('cantidad')
const descripcion = document.getElementById('descripcion')


form.addEventListener('submit', event => {
    console.log('pasa')

    event.preventDefault()

    checkInputs()
})

function checkInputs() {
    const productoValue = producto.value.trim()
    const cantidadValue = cantidad.value.trim()
    const descripcionValue = descripcion.value.trim()

    console.log(productoValue);

    let productoPass = false
    let movimientoPass = false
    let cantidadPass = false
    let descripcionPass = false

    if (productoValue === '' || productoValue < 1) {
        setErrorFor(producto, "El producto es requerido.")
    } else {
        setSuccessFor(producto)
        productoPass = true
    }

    

    if (cantidadValue === '') {
        setErrorFor(cantidad, "La cantidad es requerida.")
    } else if (!validateCantidad(cantidadValue)) {
        setErrorFor(cantidad, "La cantidad debe ser mayor que cero.")
    } else {
        setSuccessFor(cantidad)
        cantidadPass = true
    }

    if (descripcionValue === '') {
        setErrorFor(descripcion, "La descripción es requerida.")
    } else {
        setSuccessFor(descripcion)
        descripcionPass = true
    }

    if (movimiento === 'except') {
        movimientoPass = true;
    } else {
        const movimientoValue = movimiento.value.trim()
        if (movimientoValue === '' || movimientoValue < 1) {
            setErrorFor(movimiento, "El movimiento es requerido.")
        } else {
            setSuccessFor(movimiento)
            movimientoPass = true
        }
    }
    
    if (
        productoPass &&
        movimientoPass &&
        cantidadPass &&
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
function validateCantidad(cantidad) {
    return /^[1-9][0-9]*$/.test(cantidad)
}