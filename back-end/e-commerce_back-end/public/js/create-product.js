// create product
const createProductModal = document.querySelector('div.create-product button')
createProductModal.addEventListener('click', () => openModal('modal-create-product'))

function openModal (idModal) {
    const modal = document.getElementById(idModal)
    modal.classList.add('show')

    modal.addEventListener('click', (event) => {
        if ( event.target.id == idModal || event.target.className == "close" || event.target.className == "fas fa-times")
        {
            modal.classList.remove('show')
        }
    })
}

function validationFields( formClass ) {
    const inputs = document.querySelectorAll(
    `form.modal-${formClass}-product input[type='text'], 
    form.modal-${formClass}-product input[type='number']`)

    for ( let index = 0; index < inputs.length; index += 1 ){
        inputs[index].addEventListener( 'blur', () => {
            let span = inputs[index].parentElement.parentElement.querySelector('span')
            let divSpan = span.parentElement

            if ( (inputs[index].type === 'text' && inputs[index].value.length < 4) || (inputs[index].type === 'number' && inputs[index].value <= 0) ) {
                divSpan.classList.add('show')
            }
            else {
                divSpan.classList.remove('show')
            }
        })
    }
}

// CHANGE PRODUCT
const changeProductModal = document.querySelectorAll('div.change-product button')
for ( let index = 0; index < changeProductModal.length; index += 1 ) {
    changeProductModal[index].addEventListener('click', () => {
        const form = document.querySelector('form.modal-change-product')
        form.action = `http://127.0.0.1:8000/products/${changeProductModal[index].value}`
    })
}

// submit buttons and change product form
const buttons = document.querySelectorAll('button.interact-buttons')
for ( let index = 0; index < buttons.length; index += 1 ) {
    buttons[index].addEventListener('click', () => {
        const form = buttons[index].parentElement.parentElement
        let inputs = form.querySelectorAll(`
            input[type='text'],
            input[type='radio']:checked,
            input[type='number']
        `)
        
        for ( let index = 0; index < inputs.length; index += 1 ) {
            if ( (inputs[index].type === 'text' && inputs[index].value.length <= 4) || (inputs[index].type === 'number' && inputs[index].value <= 0) ) {
                return
            }
        }
        form.submit()
    })
}

// change product modal
for( let index = 0; index < changeProductModal.length; index += 1 ){
    changeProductModal[index].addEventListener('click', () => getProduct( changeProductModal[index].value ))
}

async function getProduct( productID ) {
    const options = {
        method: 'GET',
        mode: 'cors',
        headers: {
            'Accept': 'applcation/json'
        }
    }

    const requisition = await fetch(`http://127.0.0.1:8000/api/products/${productID}`, options)
    const response = await requisition.json()

    fillFields( response.product )
}

function fillFields( content ) {
    for ( let index in content ) {
        if ( document.getElementById(index) ) {
            document.getElementById(index).value = content[index]
        }
    }

    let category = document.querySelectorAll('input.category')

    for( let index = 0; index < category.length; index += 1 ) {
        if ( category[index].value === content.category ) {
            category[index].checked = true
            return openModal( 'modal-change-product' )
        }
    }
}

// DELETE PRODUCT
const deleteProduct = document.querySelectorAll('div.delete-product button')

for( let index = 0; index < deleteProduct.length; index += 1 ){
    deleteProduct[index].addEventListener('click', () => {
        openModal('modal-delete-product')

        const deleteButton = document.getElementById('delete')
        deleteButton.addEventListener('click', () => {
            deleteProduct[index].parentElement.parentElement.submit()
        })

        const cancelButton = document.getElementById('cancel')
        cancelButton.addEventListener('click', () => {
            const modal = document.getElementById('modal-delete-product')
            modal.classList.remove('show')
        })
    })
}
