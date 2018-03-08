import React , { Component } from 'react';
import MuiThemeProvider from "material-ui/styles/MuiThemeProvider";
import {  IconButton } from 'material-ui';
import Button from "material-ui/Button";
import { Chart } from 'react-google-charts';
import Array2D from 'array2d';

// import { withStyles } from 'material-ui/styles';

class Bubble extends Component{
  constructor(props) {
    super(props);
    this.state = {
      name: 'Jeremy',
      // axis: 'x axis',
      xaxis: 'Importance',
      yaxis: 'Effort',
      color: 'Complexity',
      size : 'Certainty',
      data: [
            ["ID", "Importance", "Effort", "Complex", "Certainty"],
            // ['Filler', 0, 0, 0, 0]
          ]
    }
  }
    
  rNum = () => {
    return (Math.floor(Math.random() * 100) + 1)
  }
    
    // transposeMatrix = (unsortedDataMatrix) => {
    //   DEPRECATED IN FAVOUR OR ARRAY2D NPM MODULE. MUCH MORE EFFICIENT. PROBABLY.
    //   console.log('unsortedDataMatrix is : ')
    //   console.log(unsortedDataMatrix)
    //   let sortedDataMatrix = [[]];
    //   let col0 = [];
    //   let col1 = [];
    //   let col2 = [];
    //   let col3 = [];
    //   let col4 = [];
    //   unsortedDataMatrix.forEach(function(rowElement) {
        
    //     console.log('rowElement is : ')
    //     console.log(rowElement)
    //     col0.push(rowElement[0])
    //     col1.push(rowElement[1])
    //     col2.push(rowElement[2])
    //     col3.push(rowElement[3])
    //     col4.push(rowElement[4])
    //   })
    //   sortedDataMatrix = [col0,col1,col2,col3,col4]
    //   return sortedDataMatrix;
    // }

  swapRows = (unswappedRows, rowLayout) => {
    // rowLayout is the final column order required. e.g. [0,4,3,2,1]
    rowLayout = [0,4,3,2,1]
    let swappedRows = [[],[],[],[],[]]
    rowLayout.forEach((Element, i) => {
      swappedRows[Element] = unswappedRows[i]
    })
    return swappedRows;
  }

  magicColumnSwap = (inputDataState, orderOfColumns) => {
    // takes current Data State, transposes (flips rows and columns), changes the order of the rows according to orderOfColumns, transposes it back again. Returns nice result 
    let dataCurrent = Array2D.transpose(inputDataState)
    let dataSwapped = this.swapRows(dataCurrent, orderOfColumns)
    let dataReTransposed = Array2D.transpose(dataSwapped)
    this.setState({ data: dataReTransposed });
    // console.log(inputDataState)
    // console.log('dataCurrent is now: ')
    // console.log(dataCurrent)
    // console.log('dataSwapped is now: ')
    // console.log(dataSwapped)
    // console.log('dataReTransposed is now: ')
    // console.log(dataReTransposed)
  }

  addData = (previousState, dataSet) => {
    // console.log('previous state is :')
    // console.log(previousState)
    // console.log((previousState).concat([dataSet]));
    this.setState({
      data: (previousState).concat([dataSet]),
    });
  }


  clearButton = (previousState) => {
    // console.log('previous state is :')
    // console.log(previousState)
    // console.log((previousState).concat([dataSet]));
    this.setState({
      data: [
        ["ID", "Importance", "Effort", "Complex", "Certainty"],
        ["Filler", 0, 0, 0, 0]
      ]
    });
  }

  AppData = () => {
    return (["Fake App #" + this.rNum(), this.rNum(), this.rNum(), this.rNum(), this.rNum()]);
  }
  
  RealAppData = () => {
    var randomWords = require('random-words');
    var randomAppName = randomWords()
    var randomWord = randomAppName.charAt(0).toUpperCase() + randomAppName.slice(1);
    return (["App " + randomWord + " " , this.rNum(), this.rNum(), this.rNum(), this.rNum()]);
  }

  render() {

    function changeName(reserved){
      // console.log("hitting this function, this is : " + this + " reserved is: " + reserved)
      return reserved.setState({name: 'Not Jeremy'})
      // if (rNum() > 50) {
      // }
    }

    // function blah() {
    //   console.log("blah")
    //   return null
    // }

    let AppName = 'My Very Big App';
    // this.state.name = 'Ronald';
    // let axis5 = 'Group';

    return (
      <div className={'my-pretty-chart-container'}>
        {/* {console.log("my name is ", this.state.name)} */}
        {/* <Button onClick={() => this.handleClick(['App #'+ this.rNum(),this.rNum(), this.rNum(), this.rNum(),this.rNum()])}>{this.state.name}</Button> */}
        <Button onClick={() => this.addData(this.state.data,this.AppData())}>Add App #</Button>
        <Button onClick={() => this.addData(this.state.data,this.RealAppData())}>Add App Word</Button>
        <Button onClick={() => this.clearButton(this.state.data)}>Clear the Chart</Button>
        <Button onClick={() => this.magicColumnSwap(this.state.data,[0,4,3,2,1])}>Reorder Axes</Button>
        <p></p>
        <Button>Coming soon, radio buttons to assign Axes</Button>

        {/* {this.rNum()} */}
        {/* {this.setState({data: [['ID',  'axis1', 'axis2', 'axis3', 'axis4'],
            ['Hi', 1,2,3,4]]})} */}
        {/*
        ['ID',  'axis1', 'axis2', 'axis3', 'axis4'],
            ['Hi', rNum(),rNum(),rNum(),rNum()],
            ['PSA', rNum(),rNum(),rNum(),rNum()],
            ['Navigate',rNum(),rNum(),rNum(),rNum()],
            ['Geccon', rNum(),rNum(),rNum(),rNum()],
            ['React Makes Aidan Sad Sometimes', rNum(),rNum(),rNum(),rNum()],
            ['Ready To Innovate', rNum(),rNum(),rNum(),rNum()],
            ['PT',            rNum(),rNum(),rNum(),rNum()],
            ['Donal',         rNum(),rNum(),rNum(),rNum()],
            ['Tom Pooge',     rNum(),rNum(),rNum(),rNum()]
           */}
        <Chart
          chartType="BubbleChart"
          data={this.state.data}
          options={{
            hAxis: {title: this.state.xaxis},
            vAxis: {title: this.state.yaxis},
            colorAxis: {
              colors: ['red','yellow','green'],
            },
            animation:{
              duration: 1000,
              easing: 'inAndOut',
              startup: 'true'
            }
          }}
          graph_id="BubbleChart"
          width="100%"
          height="500px"
          // legend_toggle="true"
        />
      </div>
    );
  }
}

export default Bubble;
