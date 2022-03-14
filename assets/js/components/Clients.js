import React, {Component} from 'react';
import { Link } from "react-router-dom";
import axios from 'axios';
import clientAge from '../service/UserService';

class Clients extends Component {

    constructor(props) {
        super(props);
        this.state = {
          clients: [],
        };
    }

    componentDidMount() {
        this.getClients();
    }
    

    getClients() {
        return axios.get(`http://localhost:8000/api/tab`)
            .then(clients => {
                this.setState({clients : JSON.parse(clients.data)})
            })
    }

    //event pour pouvoir prendre en compte le click
    deleteClient(id, event) {
        axios.delete(`http://localhost:8000/api/delete/${id}`)
            .then(res => {
                //Nouveau tableau de client sans celui que l'on supprime
                const newClients = this.state.clients.filter(client => client.id !== id);
                this.setState({clients: newClients});
            })
            .catch((error) => {
                // here you will have access to error.response
                console.log(error.response)
            });
    }

    render() {
        
        return (
            <div>
                <h1>Liste des clients</h1>
                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Âge</th>
                        </tr>
                    </thead>
                    <tbody>
                        { this.state.clients.map((element, index) => 
                                                    <tr key={index} >
                                                        <td>
                                                            <Link to={`/client/${element.id}`}>{ element.lastname }</Link>
                                                        </td>
                                                        <td>{ element.firstname }</td>
                                                        <td>{ element.email }</td>
                                                        <td>{ element.adress }</td>
                                                        <td>{ element.tel }</td>
                                                        <td>{ clientAge(element.birthDate) }</td>
                                                        <td>
                                                            <button onClick={(event) => this.deleteClient(element.id, event)}>Effacer</button>
                                                        </td>
                                                    </tr>
                                                )
                        }
                    </tbody>
                </table>
                <button>Ajouter un client</button>
            </div>
        )
    }
}

export default Clients;
