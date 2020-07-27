class List {
    constructor() {
        this.showList()
    }

    showList() {
        let cart = JSON.parse(localStorage.getItem('cart'))
        let url  = '/order-product'

        $.ajax({
            type: 'GET',
            url : url,
            data: cart
        }).then(function (res) {
            $('.table-body').append(res)
        })
    }
}

export default new List();
