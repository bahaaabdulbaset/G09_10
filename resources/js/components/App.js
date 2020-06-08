import React from 'react';
import './App.css';
import Chatting from "./chatting/Chatting";
import Login from "./auth/Login";
import {Route} from 'react-router';
import {BrowserRouter} from 'react-router-dom';

class App extends React.Component {
    constructor() {
        super();

        this.state = {

        };
    }

    render() {
        return (
            <div>
                <BrowserRouter>
                    <Route path="/react-version" exact component={Chatting}/>
                    <Route path="/react-version/login" exact component={Login}/>
                </BrowserRouter>
            </div>
        );
    }
}

export default App;
