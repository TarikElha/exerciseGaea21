import React, { useState, useEffect } from 'react'; 
import { useParams } from "react-router-dom";
import axios from 'axios';
import clientAge from '../service/UserService';

function ClientShow () {
    const { id } = useParams()
    const [client, setClient] = useState([])
    let poss = [];

    (client.possessions) ? poss=client.possessions : poss=[];

    useEffect(()=>{
            axios.get(`http://localhost:8000/api/client/${id}`)
                .then(res => {
                    setClient(JSON.parse(res.data))
                    poss = res.data.possessions
                })
    },[]);

    return (
            <div>
                <h1>Client et ses possessions</h1>
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
                        <tr>
                            <td>{ client.lastname }</td>
                            <td>{ client.firstname }</td>
                            <td>{ client.email }</td>
                            <td>{ client.adress }</td>
                            <td>{ client.tel }</td>
                            <td>{ clientAge(client.birthDate) }</td>
                        </tr>
                    </tbody>
                </table>
                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Valeur (Prix de revente de l'objet)</th>
                            <th>Type (Type d'objet)</th>
                        </tr>
                    </thead>
                    <tbody>
                        {poss.map((element, index) =>
                                                    <tr key={index}>
                                                        <td>{ element.name }</td>
                                                        <td>{ element.price }</td>
                                                        <td>{ element.type }</td>
                                                    </tr>
                                                )
                        }
                    </tbody>
                </table>
            </div>
    )
}

export default ClientShow;