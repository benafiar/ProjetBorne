import React, {Component} from 'react';
import Product from './Product';
import Cart from './Cart';
import { Provider } from 'mobx-react';
import { withRouter } from 'react-router';
import { Route,Link,Switch,Redirect } from 'react-router-dom';
import Store from '../Store';
import { decorate, observable, action } from 'mobx';
import Bienvenu from "./Bienvenue.jsx";
import Emplacement from "./Emplacement.jsx";
import Paiement from "./Paiement.jsx";
import Abonnement from "./Abonnement.jsx";


decorate(Store, {
    products: observable,
    addToCart: action,
    increaseQuantityInCart: action,
    decreaseQuantityInCart: action,
    removeFromCart: action,
    currentCart: observable
});

const shoppingStore = new Store();
    
class Home extends Component {
    render() {
        return (
 
        <Provider store={shoppingStore}>
           <div>
                <Bienvenu />
               <Switch>
                   <Route exact path='/' render={() => <Product />} />
                   <Route path='/cart' render={() => <Cart />} />
                   <Route path='/emplacement' render={() => <Emplacement />} />
                   <Route path='/paiement' render={() => <Paiement />} />
                   <Route path='/abonnement' render={() => <Abonnement />} />
               </Switch>
           </div>
           </Provider>
           
        )
    }
}
    
export default withRouter(Home);