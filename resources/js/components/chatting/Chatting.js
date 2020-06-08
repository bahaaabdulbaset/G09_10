import React from 'react';
import axios from 'axios';
import {withRouter} from 'react-router';
import NavBar from "../common/NavBar";
import Footer from "../common/Footer";
import Chat from "./Chat";
import {CHATS} from "../../shared/chats";
import ChatMessages from "./ChatMessages";

class Chatting extends React.Component {
    constructor() {
        super();
        this.state = {
            chats: [],
            selectedChat: null,
            selectedChatInfo: null,
            isFailed: false,
            isChatLoaded: false,
            fullName: "",
            imageUrl: "",
            apiToken: "",
        };
    }

    componentDidMount() {
        let info = localStorage.getItem('info');
        if (info) {
            info = JSON.parse(info);
            if (info.apiToken) {
                this.setState({fullName: info.fullName});
                this.setState({imageUrl: info.imageUrl});
                this.setState({apiToken: info.apiToken}, () => {
                    axios.get('http://localhost/api/chatting', {
                        params: {
                            api_token: this.state.apiToken
                        }
                    })
                        .then((response) => {
                            let data = response.data;
                            if (data.failed) {
                                this.setState({isFailed: true});
                            } else {
                                this.setState({chats: data.data});
                            }
                        })
                        .catch((error) => {
                        });
                });

            } else {
                this.props.history.push("/react-version/login");
            }
        } else {
            this.props.history.push("/react-version/login");
        }
    }

    handleSendMessageSubmission(ev) {
        ev.preventDefault();
        let content = ev.target.content.value.trim();

        if (content.length <= 0) {
            return;
        }

        let uID = this.state.selectedChatInfo.uID;

        axios.post('http://localhost/api/chatting/' + uID + '/send', {
            api_token: this.state.apiToken,
            message: content,
        })
            .then((response) => {
                let data = response.data;
                if (data.failed) {
                    //
                } else {
                    let newMessage = data.data;
                    let messages = [...this.state.selectedChat, newMessage];
                    this.setState({selectedChat: messages});
                }
            })
            .catch((error) => {
            });
    }

    handleChatClick(id) {
        this.setState({isChatLoaded: false});

        let chats = this.state.chats;
        let chat = chats.find((item) => {
            return item.uID == id;
        });
        this.setState({selectedChatInfo: chat});

        axios.get('http://localhost/api/chatting/' + id + "/messages", {
            params: {
                api_token: this.state.apiToken
            }
        })
            .then((response) => {
                let data = response.data;
                if (data.failed) {
                    this.setState({isFailed: true});
                } else {
                    this.setState({selectedChat: data.data});
                    this.setState({isChatLoaded: true});
                }
            })
            .catch((error) => {
            });
    }

    render() {
        let chatsJSX = this.state.chats.map((item, index) => {
            return (
                <Chat key={index}
                      uID={item.uID}
                      handleChatClick={(id) => {
                          this.handleChatClick(id);
                      }}
                      {...item}
                />);
        });

        let chatsWithLoaderJSX = this.state.chats.length <= 0 ? (
            <div className="text-center">
                <p className="m-0 text-center mt-3">
                    <i className="fa fa-spin fa-spinner fa-2x"></i>
                </p>
            </div>
        ) : chatsJSX;

        return (
            <div>
                <NavBar/>

                <div className="container">
                    <div className="row my-3">
                        <div className="col-12 col-md-4">
                            <div style={{
                                maxHeight: 500,
                                minHeight: 500,
                                overflowY: "scroll"
                            }}
                                 className="px-2 pt-1">
                                {chatsWithLoaderJSX}
                            </div>
                        </div>

                        <div className="col-12 col-md-8">
                            {
                                this.state.selectedChat == null ? (null) : (
                                    <ChatMessages formHandler={(ev) => {
                                        this.handleSendMessageSubmission(ev);
                                    }}
                                                  isChatLoaded={this.state.isChatLoaded}
                                                  {...this.state.selectedChatInfo}
                                                  chat={JSON.stringify(this.state.selectedChat)}/>
                                )
                            }
                        </div>
                    </div>
                </div>

                <Footer/>
            </div>
        );
    }
}

export default withRouter(Chatting);