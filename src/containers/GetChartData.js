import React , { Component } from 'react';

class GetChartData extends Component{
    render(){

        function getApiData(){
            var xhttp = new XMLHttpRequest();
            var response = '';
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    response = JSON.parse(this.responseText);
                }
            };
            xhttp.open("GET", "http://pathfinderapp-pathfinder.6923.rh-us-east-1.openshiftapps.com/api/pathfinder/customers/", true);
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.send();
            console.log("Response is:", response);
            return response
        }

        return(
            <div className='getData'>
                <h1>{getApiData()}</h1>
            </div>

        )
    }
}

export default GetChartData;
