import React, { Component } from 'react';
import { observer, inject } from 'mobx-react';
import Cart from './Cart';

@inject('store')
class Product extends Component {
  addToCart(id) {
    this.props.store.addToCart(id);
  }

  list(data, index) {
    return (
      <div key={index} className='col-md-3 top-space'>
        <div className='card'>
          <img
            className='card-img-top'
            height={200}
            src={data.filename}
          />
          <div className='card-body'>
            <h4 className='card-title text-center'>{data.nom}</h4>
            <div className='detail'>
              <div className='price text-center'>Prix: {data.prix} DT</div>
              <center><button
                onClick={() => this.addToCart(data.id)}
                className='btn btn-primary btn-sm '
              >
                COMMANDER
              </button></center>
            </div>
          </div>
        </div>
      </div>
    );
  }
  render() {
    return (
      <div className='row'>
        <div className='col-md-12'>
          <div className='row'>
            {this.props.store.products.map((data, index) =>
              this.list(data, index)
            )}
          </div>
        </div>
        <div className='col-md-12 text-center m-t-10'>
          <div className='top-space'>
            <Cart />
          </div>
        </div>
      </div>
    
    );
  }
}
export default observer(Product);