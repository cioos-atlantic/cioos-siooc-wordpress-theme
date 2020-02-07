// start date of plot. Last 7 days.
const today = new Date(new Date().setDate(new Date().getDate()));
const st = new Date(today.setDate(today.getDate() - 7));

async function loadDataandPlot() {

    const berkData = await d3.json(
        "https://catalogue.hakai.org/erddap/tabledap/HakaiBaynesSoundBoL5min.json?time%2Clatitude%2Clongitude%2CpCO2_uatm_Avg%2CTSG_T_Avg%2CTSG_S_Avg%2CAlkS_Avg%2CcalcOmegaCalcite_Avg%2CcalcpH_Avg&time%3E=" +
        st.toLocaleDateString("en-GB", {
            year: "numeric"
        }) +
        "-" +
        st.toLocaleDateString("en-GB", {
            month: "2-digit"
        }) +
        "-" +
        st.toLocaleDateString("en-GB", {
            day: "2-digit"
        }) +
        "T00%3A00%3A00Z",
        d3.autoType
    );

    const climatology =
        await d3.csv("/wp-content/themes/cioos-siooc-wordpress-theme-master/dataproducts/OACioos/Data/ChromeIsland_climatological_SST_90th_10th_percentile@4.csv",
            d3.autoType);

    // get date from DOY
    function dateFromDay(year, day) {
        var date = new Date(year, 0); // initialize a date in `year-01-01`
        return new Date(date.setDate(day)); // add the number of days
    }

    var climTemp = climatology.map(({
        ...row
    }) => {
        row.date = dateFromDay(2019, row.doy);
        return row;
    })

    // restructure to plot
    const colNames = berkData.table.columnNames;
    berkData.table.rows.forEach(function (d, i) {
        colNames.forEach(function (dd, ii) {
            d[colNames[ii]] = d[ii];
        });
        d.splice(0, 12);
    });

    const cleanedData = berkData.table.rows;

    const combined = cleanedData.map(({
        ...row
    }) => {
        let testdate = new Date(row.time);
        let t2 =
            testdate.getMonth() +
            1 +
            '-' +
            testdate.getDate() +
            '-' +
            testdate.getFullYear();

        let result = climTemp.filter(
            d => d.date.getTime() === new Date(t2).getTime()
        );

        row.mean = result[0]['mean'];
        row.per90 = result[0]['90thper'];
        row.ph10 = result[0]['ph'];
        row.omega_calc_10p = result[0]['omega_calc_10p'];
        return row;
    })

    console.log(combined[0].calcpH_Avg === null)
    // update with last reading. Color based on thresholds
    d3.select("#temperature")
        .html(() => combined[0].TSG_T_Avg !== null ? combined[0].TSG_T_Avg.toFixed(2) : "N/A")
        .style("background", () =>
            combined[0].TSG_T_Avg === null ? "red" : combined[0].TSG_T_Avg > combined[0].per90 ? "#b9f6ca" : 'rgba(255, 200, 200, 0.5)'
        );

    d3.select("#pH")
        .html(() => combined[0].calcpH_Avg !== null ? combined[0].calcpH_Avg.toFixed(2) : "N/A")
        .style("background", () =>
            combined[0].calcpH_Avg === null ? "red" : combined[0].calcpH_Avg < 7.69 ? "#b9f6ca" : 'rgba(255, 200, 200, 0.5)'
        );

    d3.select("#calciteSat")
        .html(() => combined[0].calcOmegaCalcite_Avg !== null ? combined[0].calcOmegaCalcite_Avg.toFixed(2) : "N/A")
        .style("background", () =>
            combined[0].calcOmegaCalcite_Avg === null ? "red" : combined[0].calcOmegaCalcite_Avg > 1 ? "#b9f6ca" : 'rgba(255, 200, 200, 0.5)'
        );


    // time series chart creation
    var chart2 = function (vars) {

        const width = 960;
        const n = vars.length;
        const height = 800;
        const margin2 = {
            top: 720,
            right: 20,
            bottom: 30,
            left: 40
        }; //context box
        //Calculate margins to use
        const h_each_plot = (height - 20 - 100) / n;
        const bh_top_chart = h_each_plot * (n - 1) + 100;
        const margin1 = {
            top: 30,
            right: 20,
            bottom: bh_top_chart,
            left: 40
        }; //adjust bottom
        const chart_width = width - margin1.left - margin1.right;
        const chart_height = height - margin1.top - margin1.bottom;
        const context_height = height - margin2.top - margin2.bottom;
        let margin_others;

        const zoom2 = d3
            .zoom()
            .scaleExtent([1, Infinity])
            .translateExtent([
                [0, 0],
                [chart_width, chart_height]
            ])
            .extent([
                [0, 0],
                [chart_width, chart_height]
            ])
            .on("zoom", zoomed2);

        const svg = d3
            .select(".timeseries").append("svg")
            .attr("width", width)
            .attr("height", height)
            // .property("value", [])
            // .on("mousemove touchmove", moved)
            .attr("pointer-events", "none")
            .call(zoom2);

        const tempColors = d3
            .scaleOrdinal()
            .domain(["1", "2", "3", "4"])
            .range(["steelblue", "#fc4e2a", "#e31a1c", "#b10026"]);

        // const series = 

        // temperature legend
        const legend = svg
            .append("g")
            .attr("transform", "translate(0,40)")
            .attr("font-family", "sans-serif")
            .attr("font-size", 10)
            .attr("text-anchor", "end")
            .selectAll("g")
            .data([{
                    key: "Temperature"
                },
                {
                    key: "Category 1"
                },
                {
                    key: "Category 2"
                },
                {
                    key: "Category 3"
                }
            ])
            .enter()
            .append("g")
            .attr("transform", function (d, i) {
                return "translate(" + (width - 100) + "," + i * 12 + ")";
            });

        //append legend colour blocks
        legend
            .append("rect")
            .attr("x", 10)
            .attr("width", 18)
            .attr("height", 8)
            .attr("fill", function (d) {
                return tempColors(d.key);
            });

        //append legend texts
        legend
            .append("text")
            .attr("x", 35)
            .attr("y", 4)
            .attr("dy", "0.32em")
            .attr("text-anchor", "start")
            .text(function (d) {
                return d.key;
            });

        // if (p[0].calcOmegaCalcite_Avg === 1) {
        //     return "gray";
        // } else if (p[0].calcOmegaCalcite_Avg < 0.4) {
        //     return "red";
        // } else if (p[0].calcOmegaCalcite_Avg > 1 && p[0].calcOmegaCalcite_Avg < p[0].omega_calc_10p) {
        //     return "#fee08b"; //yellow
        // } else if (p[0].calcOmegaCalcite_Avg > p[0].omega_calc_10p) {
        //     return "#33a02c"; //green
        // }

        // // Calcite Saturation legend

        const CalSatColors = d3
            .scaleOrdinal()
            .domain(["1", "2", "3", "4"])
            .range(["gray", "#fc4e2a", "#feb24c", "#33a02c"]);

        const legend3 = svg
            .append("g")
            .attr("transform", "translate(0,480)")
            .attr("font-family", "sans-serif")
            .attr("font-size", 10)
            .attr("text-anchor", "end")
            .selectAll("g")
            .data([{
                    key: "= 1"
                },
                {
                    key: "< .4"
                },
                {
                    key: ">1 < 10th percentile"
                },
                {
                    key: "> 10 percentile "
                }
            ])
            .enter()
            .append("g")
            .attr("transform", function (d, i) {
                return "translate(" + (width - 100) + "," + i * 12 + ")";
            });

        //append legend colour blocks
        legend3
            .append("rect")
            .attr("x", 10)
            .attr("width", 18)
            .attr("height", 8)
            .attr("fill", function (d) {
                return CalSatColors(d.key);
            });

        //append legend texts
        legend3
            .append("text")
            .attr("x", 35)
            .attr("y", 4)
            .attr("dy", "0.32em")
            .attr("text-anchor", "start")
            .text(function (d) {
                return d.key;
            });


        const today = new Date();
        const startExt = new Date();
        const endExt = new Date();
        startExt.setDate(today.getDate() - 1);
        endExt.setDate(today.getDate() + 1);

        const brush = d3
            .brushX()
            .extent([
                [0, 0],
                [chart_width, context_height]
            ])
            .on("brush end", brushed);

        //CREATE A CHART (FOCUS) FOR EACH VARIABLE.
        let myVariables = {};
        let myLines = {};
        let myYs = {};
        // let myXs = {};

        const x = d3.scaleTime().range([0, chart_width]);
        const x2 = d3.scaleTime().range([0, chart_width]);
        const y2 = d3.scaleLinear().range([context_height, 0]);
        const xAxis = d3.axisBottom(x).tickFormat("");
        const xAxisLast = d3.axisBottom(x);
        const xAxis2 = d3.axisBottom(x2);

        const labels = {
            "TSG_T_Avg": "Temperature (°C)",
            "calcpH_Avg": "pH",
            "calcOmegaCalcite_Avg": "Calcite Saturation"
        };

        vars.forEach((vari, i) => {
            // console.log(labels[vars[i]])
            let yside = "y" + i;
            myYs[yside];
            myYs[yside] = d3.scaleLinear().range([chart_height, 0]);

            const yAxis = g =>
                g
                .call(d3.axisLeft(myYs["y" + i]).ticks(6))
                .call(g => g.select(".domain").remove())
                .call(g =>
                    g
                    .select(".tick:last-of-type text")
                    .clone()
                    .attr("x", 3)
                    // .attr("y", 10)
                    .attr("text-anchor", "start")
                    .attr("font-weight", "bold")
                    .text(labels[vars[i]])
                );

            // for each plot the top margin moves down height of previous chart(s)
            margin_others = {
                top: h_each_plot * i + 20,
                right: 20,
                left: 40
            }; //adjust top

            var lineName = "line" + i;

            myLines[lineName] = d3
                .line()
                .x(function (d) {
                    return x(d3.isoParse(d.time));
                })
                .y(function (d) {
                    return myYs["y" + i](d[vari]);
                });

            let variableName = "focus" + i;

            myVariables[variableName] = svg
                .append("g")
                .attr("class", "focus" + i)
                .attr(
                    "transform",
                    `translate(${margin_others.left},${margin_others.top})`
                );

            x.domain(
                d3.extent(combined, function (d) {
                    return d3.isoParse(d.time);
                })
            );

            // add spacing to y extent
            let ymin = d3.min(combined, function (d) {
                return d[vari];
            });
            let ymax = d3.max(combined, function (d) {
                return d[vari];
            });


            myYs["y" + i].domain([
                ymin - (ymax - ymin) * 0.1,
                ymax + (ymax - ymin) * 0.1
            ]);
            // console.log("y", ymax + (ymax - ymin) * 0.1);

            y2.domain(myYs["y" + i].domain());

            let newdata;
            newdata = combined.map((p, index) =>
                index === combined.length - 1 ? [p] : [p, combined[index + 1]]
            );
            if (vari === "TSG_T_Avg") {
                myLines[lineName] = d3
                    .line()
                    .defined(d => !(d.TSG_T_Avg < 6)) // arbitratry value to filter out drop outs
                    .x(d => x(new Date(d.time)))
                    .y(d => myYs["y" + i](d.TSG_T_Avg));

                let gradientColor = p => {
                    if (
                        p[0].TSG_T_Avg > p[0].per90 &&
                        p[0].TSG_T_Avg < (p[0].per90 - p[0].mean) * 2 + p[0].mean
                    ) {
                        return "#fc4e2a";
                    } else if (
                        p[0].TSG_T_Avg > (p[0].per90 - p[0].mean) * 2 + p[0].mean &&
                        p[0].TSG_T_Avg < (p[0].per90 - p[0].mean) * 3 + p[0].mean
                    ) {
                        return "#800026";
                    } else {
                        return "steelblue";
                    }
                };

                myVariables[variableName]
                    .selectAll('path')
                    .data(newdata)
                    .enter()
                    .append('path')
                    .attr("class", "line" + i)
                    .attr('d', p => myLines[lineName](p))
                    .attr("clip-path", "url(#clip)")
                    // .style("opacity", d => makeOpacity(d))
                    .attr('stroke', p => gradientColor(p)).style("stroke-width", "1.5px");

            } else if (vari === "calcpH_Avg") {
                myLines[lineName] = d3
                    .line()
                    .defined(d => !(d.calcpH_Avg < 7)) // arbitratry value to filter out drop outs
                    .x(d => x(new Date(d.time)))
                    .y(d => myYs["y" + i](d.calcpH_Avg));

                let gradientColor = p => {
                    if (p[0].calcpH_Avg > 7.69 && p[0].calcpH_Avg < p[0].ph10) {
                        return "#fee08b"; //yellow
                    } else if (p[0].calcpH_Avg < 7.69) {
                        return "red";
                    } else if (p[0].calcpH_Avg > p[0].ph10) {
                        return "steelblue";
                    }
                };


                myVariables[variableName]
                    .selectAll('path')
                    .data(newdata)
                    .enter()
                    .append('path')
                    .attr("class", "line" + i)
                    .attr('d', p => myLines[lineName](p))
                    .attr("clip-path", "url(#clip)")
                    // .style("opacity", d => makeOpacity(d))
                    .attr('stroke', p => gradientColor(p)).style("stroke-width", "1.5px");

            } else if (vari === "calcOmegaCalcite_Avg") {
                myLines[lineName] = d3
                    .line()
                    .defined(d => !(d.calcOmegaCalcite_Avg > 2)) // arbitratry value to filter out drop outs
                    .x(d => x(new Date(d.time)))
                    .y(d => myYs["y" + i](d.calcOmegaCalcite_Avg));

                // ["gray", "#fc4e2a", "#fee08b", "#33a02c"]
                let gradientColor = p => {
                    if (p[0].calcOmegaCalcite_Avg === 1) {
                        return "gray";
                    } else if (p[0].calcOmegaCalcite_Avg < 0.4) {
                        return "#fc4e2a";
                    } else if (p[0].calcOmegaCalcite_Avg > 1 && p[0].calcOmegaCalcite_Avg < p[0].omega_calc_10p) {
                        return "#feb24c"; //yellow
                    } else if (p[0].calcOmegaCalcite_Avg > p[0].omega_calc_10p) {
                        return "#33a02c"; //green
                    }
                };


                myVariables[variableName]
                    .selectAll('path')
                    .data(newdata)
                    .enter()
                    .append('path')
                    .attr("class", "line" + i)
                    .attr('d', p => myLines[lineName](p))
                    .attr("clip-path", "url(#clip)")
                    // .style("opacity", d => makeOpacity(d))
                    .attr('stroke', p => gradientColor(p)).style("stroke-width", "1.5px");
            }

            // hide x ticks for most plots
            i === vars.length - 1 ?
                myVariables[variableName]
                .append("g")
                .attr("class", "axis axis--xLast")
                .attr("transform", "translate(0," + chart_height + ")")
                .call(xAxisLast) :
                myVariables[variableName]
                .append("g")
                .attr("class", "axis axis--x")
                .attr("transform", "translate(0," + chart_height + ")")
                .call(xAxis);

            myVariables[variableName]
                .append("g")
                .attr("class", "axis axis--y")
                .call(yAxis);

            svg
                .append("rect")
                .attr("class", "zoom2" + i)
                .attr("id", "zoom2" + i)
                .attr("width", chart_width)
                .attr("height", chart_height)
                .attr("cursor", "move")
                .attr("fill", "none")
                .attr("pointer-events", "all")
                .attr(
                    "transform",
                    "translate(" + margin_others.left + "," + margin_others.top + ")"
                );
        });

        x2.domain(x.domain());

        svg
            .append("defs")
            .append("clipPath")
            .attr("id", "clip")
            .append("rect")
            .attr("width", chart_width)
            .attr("height", chart_height);

        // context line
        const line2 = d3
            .line()
            .defined(d => !(d.calcOmegaCalcite_Avg > 2 || d.calcOmegaCalcite_Avg < .2))
            .x(function (d) {
                return x(d3.isoParse(d.time));
            })
            .y(function (d) {
                // console.log(vars.slice(-1)[0])
                return y2(d[vars.slice(-1)[0]]);
            });

        const context = svg
            .append("g")
            .attr("class", "context")
            .attr("transform", `translate(${margin2.left},${margin2.top})`);

        context
            .append("path")
            .datum(combined)
            .attr("class", "line2")
            .attr("d", line2)
            .attr("fill", "none")
            .style("stroke", "steelblue")
            .style("stroke-width", "1.5px");

        context
            .append("g")
            .attr("class", "axis axis--x2")
            .attr("transform", "translate(0," + context_height + ")")
            .call(xAxis2);

        context
            .append("g")
            .attr("class", "brush")
            .call(brush)
            .call(brush.move, x.range());

        function brushed() {
            if (d3.event.sourceEvent && d3.event.sourceEvent.type === "zoom") return; // ignore brush-by-zoom
            let s = d3.event.selection || x2.range();
            x.domain(s.map(x2.invert), x2);
            // update each plot
            svg.call(
                zoom2.transform,
                d3.zoomIdentity.scale(chart_width / (s[1] - s[0])).translate(-s[0], 0)
            );
        }

        function zoomed2() {
            vars.forEach((d, i) => {
                d3.select(".focus" + i)
                    .selectAll(".line" + i)
                    .attr("d", myLines["line" + i]);
                i === vars.length - 1 ?
                    d3.selectAll(".axis--xLast").call(xAxisLast) :
                    d3.selectAll(".axis--x").call(xAxis);
            });

            if (d3.event.sourceEvent && d3.event.sourceEvent.type === "brush") return; // ignore zoom-by-brush
            let value = [];

            let t = d3.event.transform;

            x.domain(t.rescaleX(x2).domain());

            value = x.domain();

            svg.property("value", value).dispatch("input");

            context.select(".brush").call(brush.move, x.range().map(t.invertX, t));
        }

        return svg.node();
    }


    chart2(["TSG_T_Avg", "calcpH_Avg", "calcOmegaCalcite_Avg"]);
    leafletmap()

    // topomap()
}

loadDataandPlot();