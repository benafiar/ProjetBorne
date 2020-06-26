class Store {
    products = [
      {
        id: 12,
        nom: 'Burger',
        images: require('../../public/images/Produits/burger.jpg'),
        prix: 7000,
        updatedAt: "2020-05-28T16:24:07+00:00",
        filename: "burger.jpg"
      },
      {
        id: 13,
        nom: 'Double chicken burger',
        images: require('../../public/images/Produits/burger5.png'),
        prix: 10000,
        updatedAt: "2020-05-30T09:29:00+00:00",
        filename:"burger5.png"
      },
     
    ];
    carts = [];
    currentCart = [];
    removeFromCart(id) {
      this.carts = this.carts.filter(item => {
        return item.product_id !== id;
      });
      this.getCart();
    }
    increaseQuantityInCart(id) {
      this.carts.map(item => {
        if (item.product_id === id) item.quantity += 1;
        return item;
      });
      this.getCart();
    }
    decreaseQuantityInCart(id) {
      this.carts.map(item => {
        if (item.product_id === id && item.quantity > 1) item.quantity -= 1;
        return item;
      });
      this.getCart();
    }
    addToCart(id) {
      let found = false;
      this.carts.map(item => {
        if (item.product_id === id) {
          item.quantity += 1;
          found = true;
        }
        return item;
      });
      if (!found) {
        this.carts.push({ product_id: id, quantity: 1 });
      }
      this.getCart();
    }
    getCart() {
      let carts = this.carts;
      carts.map(item => {
        for (let i in this.products) {
          if (item.product_id === this.products[i].id) {
            item.filename = this.products[i].filename;
            item.name = this.products[i].name;
            item.prix = this.products[i].prix * item.quantity;
          }
        }
        return item;
      });
      this.currentCart = carts;
    }
}
export default Store;