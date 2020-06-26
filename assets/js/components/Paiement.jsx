import React from 'react';
import {Card, CardBody,CardTitle, CardDeck} from 'reactstrap';
import { FaCreditCard, FaCcDinersClub, FaRegMoneyBillAlt } from "react-icons/fa";
import { IconContext } from "react-icons";
import { Link } from 'react-router-dom';


const Example = (props) => {
  return ( 
   <div class="container"  style={{  margin: "10em" }}>
   <h3 className="text-center">Choisissier votre moyen de paiement</h3>
   <br/>
    <CardDeck>
      <Card  >
        <CardBody >
          <CardTitle className="text-center">JE PAYE AVEC CARTE BANCAIRE</CardTitle>
        </CardBody>
        <center><IconContext.Provider value={{ size: "10em", style: { className: 'react-icons ' } , verticalAlign: 'middle'  }}>
         <FaCreditCard />
        </IconContext.Provider></center>
        <CardBody>
          <center> <Link className="btn btn-info" to={"/"}> Card Link </Link></center>
        </CardBody>
      </Card>
      <Card>
        <CardBody>
          <CardTitle className="text-center">JE PAYE A LA CAISSE</CardTitle>
        </CardBody>
       <center><IconContext.Provider value={{ size: "10em",style: { verticalAlign: 'middle' } }}>
         <FaRegMoneyBillAlt />
        </IconContext.Provider></center>
        <CardBody>
         <center> <Link className="btn btn-info" to={"/"}> Card Link </Link></center>
        </CardBody>
      </Card>
      <Card>
        <CardBody>
           <CardTitle className="text-center">JE PAYE AVEC TICKET RESTAURANT</CardTitle>
        </CardBody>
      <center><IconContext.Provider value={{ size: "10em",style: { verticalAlign: 'middle' } }}>
         <FaCcDinersClub />
        </IconContext.Provider></center>
        <CardBody>
          <center><Link className="btn btn-info" to={"/"}>Card Link</Link></center>
        </CardBody>
      </Card>
    </CardDeck>
    </div>
   
  );
};

export default Example;