import React, { Component } from 'react';
import logo from './assets/logo.svg';
import './assets/App.css';
import Bubble from './containers/Bubble/Bubble';
import Combo from './containers/ComboChart/Combo';

class App extends Component {
  render() {
    return <div className="App">
        <header className="App-header">
          <div>
            <p className="App-title">
              Welcome to Pathfinder
              <img src={logo} className="App-logo" alt="logo" />
            </p>
          </div>
        </header>
        <div className="BubbleChartContainer">
          <Bubble />
        </div>
        <div className="ComboChartContainer">
          <Combo />
        </div>
      </div>;
  }
}

export default App;