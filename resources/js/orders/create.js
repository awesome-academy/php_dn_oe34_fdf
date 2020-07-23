class Create {
    constructor() {
        let thisClass = this
        $(document).ready(function () {
            thisClass.config()
            thisClass.listen()
        })
    }

    config() {
        this.elements = {
            btnCreateOrder    : $('.btn-create-order'),
            fieldTotalPrice   : $('#total-price-input'),
            fieldTotalQuantity: $('#total-quantity-input')
        }
    }

    listen() {
        this.handleBtnCreateOrder()
    }

    handleBtnCreateOrder() {
        let btnCreateOrder = this.elements.btnCreateOrder
        let totalPrice     = this.elements.fieldTotalPrice.val()
        let totalQuantity  = this.elements.fieldTotalQuantity.val()

        btnCreateOrder.click(function () {
            let cart      = JSON.parse(localStorage.getItem('cart'))
            let url       = '/create-order'
            let csrfToken = $(this).data('csrfToken')

            $.ajax({
                type: 'POST',
                url : url,
                data: {
                    '_token'        : csrfToken,
                    'products'      : cart.products,
                    'total_price'   : totalPrice,
                    'total_quantity': totalQuantity
                }
            }).then(function (res) {
                if (!res[0]){
                    alert(res[1])
                }

                alert(res[1])
                localStorage.removeItem('cart')
                location.href="/"
            })
        })
    }
}

export default new Create()
