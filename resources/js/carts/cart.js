import '../bootstrap'
import GetProduct from './get_products'

class Cart {
    constructor() {
        let thisClass = this
        $(document).ready(function () {
            thisClass.config()
            thisClass.listen()
        })
    }

    config() {
        this.elements = {
            btnAddCart    : $('.btn-cart'),
            btnDeleteCart : $('.btn-cart-delete'),
            customQuantity: $('.cart-custom-quantity'),
            cartCount     : $('.cart-count')
        }
    }

    listen() {
        this.handleDeleteCart()
        this.handleAddCart()
        this.handleCustomQuantity()
        this.handleShowNumberOfCart()
    }

    handleShowNumberOfCart() {
        let cart  = JSON.parse(localStorage.getItem('cart'))
        let count = 0

        if (cart !== null) {
            _.forEach(cart.products, function (value, key) {
                count++
            })
        }

        this.elements.cartCount.text(count)
    }

    handleDeleteCart() {
        let btnDeleteCart = this.elements.btnDeleteCart
        btnDeleteCart.click(function () {
            let currentCart = JSON.parse(localStorage.getItem('cart')) //Parse string to object
            let productId   = $(this).data('productId')
            let newCart     = {
                products: []
            }

            _.forEach(currentCart.products, function (value, key) {
                if (value.product_id === productId) {
                    newCart.products = _.filter(currentCart.products, function (filterValue, filterKey) {
                        return filterKey !== key
                    })
                }
            })

            localStorage.setItem('cart', JSON.stringify(newCart)) //Convert object to string back

            $('.table-body').html("")

            GetProduct.getProducts()
        })
    }

    handleAddCart() {
        let btnAddCart = this.elements.btnAddCart
        btnAddCart.click(function () {
            let cart          = localStorage.getItem('cart')
            let productId     = $(this).data('productId')
            let message       = $(this).data('message')
            let productExists = false

            if (cart == null) {
                cart = {
                    'products': []
                }
            } else {
                cart = JSON.parse(cart)
            }

            _.forEach(cart.products, function (value) {
                if (value.product_id === productId) {
                    value.quantity = value.quantity + 1
                    productExists  = true
                }
            })

            if (!productExists) {
                let product = {
                    product_id: productId,
                    quantity  : 1
                }

                cart.products.push(product)
            }

            localStorage.setItem('cart', JSON.stringify(cart))

            alert(message)
            location.reload()
        })
    }

    handleCustomQuantity() {
        let customQuantity = this.elements.customQuantity
        customQuantity.on('focusout', function (btn) {
            let cart            = JSON.parse(localStorage.getItem('cart'))
            let productId       = $(this).data('productId')
            let currentQuantity = $(this).val()

            if (currentQuantity < 1) {
                currentQuantity = 1
            }

            _.forEach(cart.products, function (value) {
                if (value.product_id === productId) {
                    value.quantity = currentQuantity
                }
            })

            localStorage.setItem('cart', JSON.stringify(cart))

            $('.table-body').html("")

            GetProduct.getProducts()
        })
    }
}

export default new Cart()
