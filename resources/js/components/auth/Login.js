import React from 'react';
import axios from 'axios';
import {withRouter} from 'react-router';

class Login extends React.Component {

    constructor() {
        super();
        this.state = {
            errors: [],
            isDisabled: false,
        };
    }

    componentDidMount() {
        let info = localStorage.getItem('info');
        if (info) {
            info = JSON.parse(info);
            if (info.apiToken){
                this.props.history.push("/react-version/");
            }
        }
    }

    _handleLoginSubmission(ev) {
        ev.preventDefault();
        this.setState({isDisabled: true});

        let username = ev.target.username.value.trim();
        let password = ev.target.password.value.trim();

        let errors = [];

        if (username.length <= 3) {
            errors.push("Username must be more than 3 characters");
        } else if (username.length > 100) {
            errors.push("Username must be less than or equal 100 characters");
        }

        if (password.length <= 3) {
            errors.push("Password must be more than 3 characters");
        } else if (password.length > 125) {
            errors.push("Password must be less than or equal 125 characters");
        }

        if (errors.length > 0) {
            this.setState({errors: errors});
            this.setState({isDisabled: false});
            return;
        }

        axios.post('http://localhost/api/login', {
            username: username,
            password: password,
        }).then((response) => {
            let data = response.data;
            if (data.failed) {
                let loginErrors = data.errors;
                this.setState({errors: loginErrors});
            } else {
                this.setState({errors: []});
                let d = data.data;
                console.log(d);
                localStorage.setItem('info', JSON.stringify(d));
                //console.log(this.props.history);
                this.props.history.push("/react-version/");
            }
        }).catch((error) => {

        }).finally(() => {
            this.setState({isDisabled: false});
        });
    }

    render() {

        let errorsJSX = this.state.errors.map((item, index) => {
            return (<li key={index} className="text-danger">
                <span className="fa fa-exclamation mr-1"></span>
                {item}
            </li>);
        });
        return (
            <div className="container">
                <div className="row">
                    <div className="col-12 col-md-6 mx-auto mt-5">
                        <div className="card shadow">
                            <div className="card-body">
                                {
                                    this.state.errors.length > 0 ? (
                                        <ul className="list-unstyled">
                                            {errorsJSX}
                                        </ul>
                                    ) : null
                                }

                                <form onSubmit={(ev) => {
                                    this._handleLoginSubmission(ev);
                                }}>
                                    <div className="form-group row">
                                        <label htmlFor="username"
                                               className="col-form-label col-12 col-md-3">Username</label>
                                        <div className="col-12 col-md-9">
                                            <input type="text"
                                                   disabled={this.state.isDisabled}
                                                   className="form-control" id="username"
                                                   name="username"/>
                                        </div>
                                    </div>
                                    <div className="form-group row">
                                        <label htmlFor="password"
                                               className="col-form-label col-12 col-md-3">Password</label>
                                        <div className="col-12 col-md-9">
                                            <input type="password"
                                                   disabled={this.state.isDisabled}
                                                   className="form-control"
                                                   id="password" name="password"/>
                                        </div>
                                    </div>
                                    <div className="text-center mb-2">
                                        <button className="btn btn-info"
                                                disabled={this.state.isDisabled}
                                                type="submit">
                                            <i hidden={!this.state.isDisabled}
                                               className="fa fa-spin fa-spinner mr-1"></i>
                                            Login
                                        </button>
                                    </div>
                                    <p className="m-0">
                                        <span className="text-muted mr-1">Does not have an account ?!</span>
                                        <a href="/register">Register</a>
                                    </p>
                                    <p className="m-0">
                                        <span className="text-muted mr-1">Return</span>
                                        <a href="/">Home</a>
                                    </p>
                                    <p className="text-muted">All fields are required</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default withRouter(Login);