function previewImage(id) {
    var file = $('#' + id).get(0).files[0]

    if (file) {
        var reader = new FileReader()

        reader.onload = function () {
            $('#' + id + '-show').attr('src', reader.result)
        }

        reader.readAsDataURL(file)
    }
}

//FUNCIONES CART
function getCart() {
    return $.cookie('cart-data')
}

function checkProductCart(id) {
    let cart = getCart()
    if (~cart.indexOf('|' + id + '|')) {
        return true
    }
    return false
}

function updateCookieCart(cart) {
    $.cookie('cart-data', cart, {
        path: '/',
        expires: 365,
    })
    updateSizeCart()
}

function getSizeCart() {
    let cart = getCart()
    cart = cart.substr(1, cart.length - 2)
    let long = 0
    if (cart != '') {
        let cartArr = cart.split('|')
        long = cartArr.length
    }
    return long
}

function updateSizeCart() {
    $('#cartSize').html(getSizeCart())
}

function addProductCart(productId) {
    let cart = getCart()
    if (!checkProductCart(productId)) {
        cart += productId + '|'
        updateCookieCart(cart)
    }
}
function removeProductCart(productId) {
    let cart = $.cookie('cart-data')
    if (checkProductCart(productId)) {
        cart = cart.replace('|' + productId + '|', '|')
        updateCookieCart(cart)
    }
}

function round2decimals(num) {
    return Math.round(num * 100) / 100
}
