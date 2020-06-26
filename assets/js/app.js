import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import '../css/app.css';
import Home from './components/Home';
//import Bienvenu from "./components/pages/Bienvenue.jsx";
    
ReactDOM.render(<Router><Home /></Router>, document.getElementById('root'));