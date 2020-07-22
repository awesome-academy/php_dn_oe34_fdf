import GetProduct from "./get_products"

class List {
    constructor() {
        this.showListCart()
    }

    showListCart() {
        GetProduct.getProducts()
    }
}

export default new List();
