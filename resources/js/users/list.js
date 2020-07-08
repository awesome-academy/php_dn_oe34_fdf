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
            btnDeleteUser: $('.delete-user')
        }
    }

    listen() {
        this.handleDeleteBtn()
    }

    handleDeleteBtn() {
        let btnDelete = this.elements.btnDeleteUser
        btnDelete.click(function () {
            let userId    = $(this).data('userId')
            let csrfToken = $(this).data('csrfToken')
            let url       = `user/delete/${userId}`

            $.ajax({
                type: 'DELETE',
                url : url,
                data: {
                    '_token': csrfToken,
                    'id'    : userId
                }
            }).then(function (res) {
                alert(res)

                location.reload()
            })
        })
    }
}

export default new List()
