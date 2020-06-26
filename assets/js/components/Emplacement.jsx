import React from 'react';
import { Card, CardBody,  CardDeck} from 'reactstrap';
import { FaHamburger, FaShoppingBag } from "react-icons/fa";
import { IconContext } from "react-icons";
import { Link } from 'react-router-dom';



const Example = (props) => {
  return (
    
   <div class="container"  style={{  margin: "10em" }}>
   <h1 className="text-center">Vous allez manger</h1>
   <br/>
    <CardDeck>
      <Card  >
        <center><IconContext.Provider value={{ size: "10em", style: { className: 'react-icons ' } , verticalAlign: 'middle'  }}>
         <FaHamburger />
        </IconContext.Provider></center>
        <CardBody>
         <center><Link className="btn btn-warning" to={"/paiement"}>SUR PLACE</Link></center>
        </CardBody>
      </Card>
      <Card>
       <center><IconContext.Provider value={{ size: "10em",style: { verticalAlign: 'middle' } }}>
         <FaShoppingBag />
        </IconContext.Provider></center>
        <CardBody>
          <center><Link className="btn btn-warning" to={"/paiement"}>A EMPORTER</Link></center>
        </CardBody>
      </Card>
    </CardDeck>
    </div>    
  );
};

export default Example;