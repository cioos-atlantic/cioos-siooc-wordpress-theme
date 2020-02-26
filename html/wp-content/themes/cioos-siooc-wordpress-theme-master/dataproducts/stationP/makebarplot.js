function chart(summaryData) {

    const onelayer = summaryData.filter(d => d.Depth === "0-10 dbar").map(d => d.temp);

    const scaleAnomaly = d3
        .scaleDiverging(t => d3.interpolateRdBu(1 - t))
        .domain([d3.min(onelayer), d3.mean(onelayer), d3.max(onelayer)]);

    const margin = {
        top: 20,
        right: 20,
        bottom: 30,
        left: 40
    };

    // const width = 960,
    // height = 300

    // const svg = d3.select("svg");
    const svg = d3.select(".bars")
    .append("svg")
    .attr("viewBox", `0 0 ${width} ${height}`)
    .attr("preserveAspectRatio", "xMinYMin meet");
    

    const width = +svg.attr("width") - margin.left - margin.right,
        height = +svg.attr("height") - margin.top - margin.bottom;

    const g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    var bars = g.selectAll(".bars")
        .data(onelayer);

    bars.enter().append("rect")
        .attr("class", "bars")
        .attr("y", 0)
        .attr("height", height)
        .attr("x", function (d, i) {
            return i * ((width) / onelayer.length);
        })
        .attr("width", width / onelayer.length)
        .style("fill", function (d) {
            return scaleAnomaly(d);
        });

    const x = d3
        .scaleBand()
        .domain(summaryData.map(d => d.Year))
        // .nice()
        .range([0, width]);

    const xAxis = g =>
        g
        .attr("transform", `translate(0,${height})`)
        .call(d3.axisBottom().scale(x) .tickValues(x.domain().filter((d, i) => !(i % 10))))
        //.tickFormat(d3.format(".0f")))
      .call(g => g.select(".domain").remove());

    g.append("g").call(xAxis);

}