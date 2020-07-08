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
            btnDeleteCategory: $('.delete-category')
        }
    }

    listen() {
        this.handleDeleteBtn()
    }

    handleDeleteBtn() {
        let btnDelete = this.elements.btnDeleteCategory
        btnDelete.click(function () {
            let categoryId = $(this).data('categoryId')
            let csrfToken  = $(this).data('csrfToken')
            let url        = `category/delete/${categoryId}`

            $.ajax({
                type: 'DELETE',
                url : url,
                data: {
                    '_token': csrfToken,
                    'id'    : categoryId
                }
            }).then(function (res) {
                alert(res)

                location.reload()
            })
        })
    }
}

export default new List()
