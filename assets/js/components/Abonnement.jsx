import React from 'react';
import { Link } from 'react-router-dom';


const Example = (props) => {
  return (
   <div class="container"  style={{  margin: "10em" }}>
    <h1 className="text-center"> Vous êtes sûre d'abandonner</h1>
     <center><Link className="btn btn-success" to={"/abandement"}>OUI</Link></center>
     <center><Link className="btn btn-success" to={"/abandement"}>NON</Link></center>
   </div>
  );
};
export default Example;