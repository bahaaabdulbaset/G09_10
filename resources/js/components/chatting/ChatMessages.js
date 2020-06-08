import React from 'react';

class ChatMessages extends React.Component {
/*

created_at: "2019-11-05 13:55:54"
​​
first_user_id: 1
​​
id: 902
​​
is_forward: 1
​​
is_seen: 0
​​
message: "Aut et officia et cupiditate at aliquid aut labore ipsa est et quas sunt eos praesentium neque fugiat optio recusandae qui quod soluta est possimus voluptatum doloribus cupiditate."
​​
second_user_id: 5
​​
updated_at: "2019-11-05 13:55:54"

* */
    render() {
        let chat = JSON.parse(this.props.chat);
        let messagesJSX = chat.map((item, index) => {
            return item.is_forward == true ? (
                <p key={item.id} className="w-75 float-right text-right bg-primary text-white p-1 m-0 mb-1 rounded clearfix">
                    {item.message}
                </p>
            ) : (
                <p key={item.id} className="w-75 float-left bg-info text-white p-1 m-0 mb-1 rounded clearfix">
                    {item.message}
                </p>
            );
        });

        let messagesWithLoaderJSX = !this.props.isChatLoaded ? (
            <div className="text-center">
                <p className="m-0 text-center mt-3">
                    <i className="fa fa-spin fa-spinner fa-2x"></i>
                </p>
            </div>
        ) : messagesJSX;

        return (
            <div className="">
                <div className="card shadow">
                    <div className="card-body">
                        <p className="card-title h4 m-0 text-center font-weight-bold">
                            {this.props.fullName}
                        </p>
                        <hr/>
                        <div style={{
                            maxHeight: 400,
                            minHeight: 400,
                            overflowY: "scroll"
                        }} className="px-2 pt-1">
                        {messagesWithLoaderJSX}
                        </div>

                        <form className="mt-3" onSubmit={(ev) => {
                            this.props.formHandler(ev);
                            ev.target.content.value = "";
                        }}>
                            <div className="form-group">
                                <textarea id="content" className="form-control"
                                          cols="30" rows="3"></textarea>
                            </div>
                            <div className="text-center">
                                <button className="btn btn-success">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

export default ChatMessages;