import React from 'react';
import {NavLink} from 'react-router-dom';
import axios from 'axios';
import {withRouter} from 'react-router';

class NavBar extends React.Component {
    constructor() {
        super();
        this.state = {
            fullName: "",
            imageUrl: "",
            apiToken: "",
        };
    }

    componentDidMount() {
        let info = localStorage.getItem('info');
        if (info) {
            info = JSON.parse(info);
            if (info.apiToken){
                this.setState({fullName: info.fullName});
                this.setState({imageUrl: info.imageUrl});
                this.setState({apiToken: info.apiToken});
            } else {
                this.props.history.push("/react-version/login");
            }
        } else {
            this.props.history.push("/react-version/login");
        }
    }

    _handleLogoutClick() {
        axios.post('http://localhost/api/logout', {
            api_token: this.state.apiToken
        });

        localStorage.removeItem('info');
        this.props.history.push("/react-version/login");
    }

    render() {
        return (<nav className="navbar navbar-expand-lg navbar-light bg-light">
            <a className="navbar-brand" href="#">Navbar</a>
            <button className="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>

            <div className="collapse navbar-collapse"
                 id="navbarSupportedContent">
                <ul className="navbar-nav mr-auto">
                    <li className="nav-item">
                        <a className="nav-link" href="#">Home</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="#">Recommendations</a>
                    </li>
                    <li className="nav-item dropdown">
                        <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a className="dropdown-item" href="#">Action</a>
                            <a className="dropdown-item" href="#">Another action</a>
                            <div className="dropdown-divider"></div>
                            <a className="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>

                <ul className="navbar-nav ml-auto">
                    {
                        this.state.fullName.length > 0 ? (
                            <li className="nav-item dropdown">
                                <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src={this.state.imageUrl}
                                         className="rounded-circle mr-1" height={30} width={30}
                                         alt=""/>
                                    {this.state.fullName}
                                </a>
                                <div className="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a className="dropdown-item" href="#">Profile</a>
                                    <div className="dropdown-divider"></div>
                                    <button className="dropdown-item" onClick={()=>{
                                        this._handleLogoutClick();
                                    }}>Logout</button>
                                </div>
                            </li>
                        ) : (
                            <li className="nav-item">
                                <NavLink className="nav-link" to="/react-version/login">Login</NavLink>
                            </li>
                        )
                    }

                </ul>
            </div>
        </nav>);
    }
}

export default withRouter(NavBar);