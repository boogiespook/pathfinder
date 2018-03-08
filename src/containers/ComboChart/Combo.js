import React, { Component } from "react";
import { Chart } from "react-google-charts";

class Combo extends Component {
  render() {

    function randNum(){
        return (Math.floor(Math.random() * 4) + 1)
    }

    return (
      <div className={"my-pretty-chart-container"}>
        <Chart
          chartType="ComboChart"
          data={[
            ["QuestionNumber", "Score", "Min"],
            ["Q 1",      randNum(),       randNum() ],
            ["Q 2",      randNum(),       randNum() ],
            ["Q 3",      randNum(),       randNum() ],
            ["Q 4",      randNum(),       randNum() ],
            ["Q 5",      randNum(),       randNum() ],
            ["Q 6",      randNum(),       randNum() ],
            ["Q 7",      randNum(),       randNum() ],
            ["Q 8",      randNum(),       randNum() ],
            ["Q 9",      randNum(),       randNum() ],
            ["Q 10",      randNum(),       randNum() ],
            ["Q 11",      randNum(),       randNum() ],
            ["Q 12",      randNum(),       randNum() ],
            ["Q 13",      randNum(),       randNum() ],
            ["Q 14",      randNum(),       randNum() ],
            ["Q 15",      randNum(),       randNum() ],
            ["Q 16",      randNum(),       randNum() ],
            ["Q 17",      randNum(),       randNum() ],
            ["Q 18",      randNum(),       randNum() ],
            ["Q 19",      randNum(),       randNum() ],
            ["Q 20",      randNum(),       randNum() ],
            ["Q 21",      randNum(),       randNum() ],
            ["Q 22",      randNum(),       randNum() ],
            ["Q 23",      randNum(),       randNum() ],
            ["Q 24",      randNum(),       randNum() ],
            ["Q 25",      randNum(),       randNum() ],
          ]}
          options={{
            hAxis: { title: "Question number" },
            vAxis: { title: "Priority" },
            seriesType: 'bars',
            series: {
                1: {
                    type: 'steppedArea'
                }
            },
            animation:{
              duration: 1000,
              easing: 'inAndOut',
              startup: 'true'
            }

          }}
          graph_id="ComboChart"
          width="100%"
          height="500px"
        />
      </div>
    );
  }
}
export default Combo;
