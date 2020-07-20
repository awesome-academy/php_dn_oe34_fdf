class List {
    constructor() {
        let thisClass = this
        $(document).ready(function () {
            thisClass.config()
            thisClass.listen()
        })
    }

    config() {
        this.elements = {
            btnDeleteProduct: $('.delete-product')
        }
    }

    listen() {
        this.handleDeleteBtn()
    }

    handleDeleteBtn() {
        let btnDelete = this.elements.btnDeleteProduct
        btnDelete.click(function () {
            let productId = $(this).data('productId')
            let csrfToken  = $(this).data('csrfToken')
            let url        = `product/delete/${productId}`

            $.ajax({
                type: 'DELETE',
                url : url,
                data: {
                    '_token': csrfToken,
                    'id'    : productId
                }
            }).then(function (res) {
                alert(res)

                location.reload()
            })
        })
    }
}

export default new List()
