import React, { Component } from 'react';
import { observer, inject } from 'mobx-react';
import { Link } from 'react-router-dom';
@inject('store')
@observer

class Cart extends Component {
  render() {
    return (
      <div className='card'>
          <div>
            <p>Ma Commande</p>
          </div>
          <div className={'row'}>
              {this.props.store.currentCart.map((data, index) => (
                  <div key={index} className='cart col-md-3'>
                      <img height={30} src={data.filename}  />
                      <div className='product-cart-name'>{data.name}</div>
                      <div className='control'>
                          <span
                              onClick={() => this.props.store.removeFromCart(data.product_id)}
                              className='btn btn-danger btn-xs cancel'
                          >
                          <i className={'fa fa-times'} />
                      </span>
                          <span
                              onClick={() =>
                                  this.props.store.increaseQuantityInCart(data.product_id)
                              }
                              className='btn btn-success btn-xs'
                          >
                              <i className={'fa fa-plus'} />
                          </span>
                          <span
                              onClick={() =>
                                  this.props.store.decreaseQuantityInCart(data.product_id)
                              }
                              className='btn btn-warning btn-xs'
                          >
                              <i className={'fa fa-minus'} />
                          </span>
                      </div>
                      <div className='quantity'>{data.quantity}</div>
                      <div className='quantity'>{data.prix} DT</div>
                  </div>
              ))}
          </div>
         <center><Link className="btn btn-secondary" to={"/cart"}>Valider la commande</Link></center>  
      </div>
    );
  }
}
export default observer(Cart);