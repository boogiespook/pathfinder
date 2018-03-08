import React, { Component } from "react";

class returnRandNum extends Component {
    render () {
        function randNum(){
            return (Math.floor(Math.random() * 4) + 1)
        }
    }

}

export default returnRandNum;