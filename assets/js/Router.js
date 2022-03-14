//Creer un fichier à la source router.js qui appellera les routes correspondantes. L'appeler dans app.js
import React, {Component} from 'react';
import { Routes, Route } from "react-router-dom";
import Clients from './components/Clients';
import ClientShow from './components/ClientShow';

class Router extends Component {
    render() {
            return(
                <Routes>
                    <Route path="/" element={<Clients />} />
                    <Route path="/client/:id" element={<ClientShow />} />
                </Routes>
            )
    }
}

export default Router;