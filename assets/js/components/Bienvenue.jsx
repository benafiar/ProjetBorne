import React from "react";
//import {Card, CardImg} from 'reactstrap';
import { Link } from "react-router-dom";

//import { toast } from "react-toastify";

const Home = (props) => {
  return (
    <div style={{ margin: "10em" }}>
      <h1 className="text-center">Bienvenu</h1>
      <center>
        <Link className={"navbar-brand"} to={"/emplacement"}>
          {" "}
          Cliquez pour commencer{" "}
        </Link>
      </center>
    </div>
  );
};

export default Home;
