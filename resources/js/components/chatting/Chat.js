import React from 'react';

class Chat extends React.Component {

    render() {
        let boldOrNot = "text-truncate m-0 text-muted font-italic ";
        boldOrNot += this.props.lastMsgIsSeen ? "font-weight-bold" : "";

        return (
            <div className="mb-2">
                <a href="#" style={{outline: "none", textDecoration: "none", color: "black"}}
                   onClick={() => {
                        this.props.handleChatClick(this.props.uID);
                   }}>
                    <div className="card shadow">
                        <div className="card-body">
                            <div className="media">
                                <img src={this.props.imageUrl} height="60"
                                     className="mr-2 mt-1 rounded-circle"
                                     width="60" alt=""/>
                                <div className="media-body pt-2">
                                    <p className="m-0 font-weight-bold">
                                        {this.props.fullName}
                                    </p>
                                    <p className={boldOrNot}
                                       style={{maxWidth: 200}}>
                                        {this.props.lastMsgContent}
                                    </p>
                                    <p className="m-0 text-muted font-italic"
                                       style={{maxWidth: 200, fontSize: 11}}>
                                        {new Date(this.props.lastMsgTimestamp).toLocaleString()}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        );
    }
}

export default Chat;