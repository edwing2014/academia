				
<script type="text/javascript">
            $(function () {
                var data1 = GenerateSeries(0);
                var data2 = GenerateSeries(100);
                var data3 = GenerateSeries(200);
                var dataset = [data1, data2, data3];
                function GenerateSeries(added) {
                    var data = [];
                    var start = 100 + added;
                    var end = 200 + added;
                    for (i = 1; i <= 100; i++) {
                        var d = Math.floor(Math.random() * (end - start + 1) + start);
                        data.push([i, d]);
                        start++;
                        end++;
                    }
                    return data;
                }
                var options = {
                    series: {
                        lines: {
                            show: true,
                            fill: true
                        },
                        points: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: "#ffffff",
                            symbol: "circle",
                            radius: 2,
                        },
                        shadowSize: 0,
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#f9f9f9",
                        borderWidth: 1
                    },
                    colors: ["#b086c3", "#ea701b"],
                    tooltip: true,
                    tooltipOpts: {
                        defaultTheme: false
                    },
                    legend: {
                        position: 'nw',
                        labelBoxBorderColor: "#000000",
                        container: $("#area-chart #legendPlaceholderArea"),
                        noColumns: 0
                    }
                };
                function ToggleSeries() {
                    var d = [];
                    $("#area-chart input").each(function () {
                        if ($(this).is(":checked")) {
                            var seqence = $(this).attr("id").replace("cbdata", "");
                            d.push({
                                label: "data" + seqence,
                                data: dataset[seqence - 1]
                            });
                        }
                    });
                    $.plot($("#area-chart #area-chartContainer"), d, options);
                }
                $("#area-chart input").change(function () {
                    ToggleSeries();
                });
                ToggleSeries();
            });
        </script>
<script type="text/javascript">
            var data7_1 = [
                [1354586000000, 153],
                [1354587000000, 658],
                [1354588000000, 198],
                [1354589000000, 663],
                [1354590000000, 801],
                [1354591000000, 1080],
                [1354592000000, 353],
                [1354593000000, 749],
                [1354594000000, 523],
                [1354595000000, 258],
                [1354596000000, 688],
                [1354597000000, 364]
            ];
            var data7_2 = [
                [1354586000000, 53],
                [1354587000000, 65],
                [1354588000000, 98],
                [1354589000000, 83],
                [1354590000000, 80],
                [1354591000000, 108],
                [1354592000000, 120],
                [1354593000000, 74],
                [1354594000000, 23],
                [1354595000000, 79],
                [1354596000000, 88],
                [1354597000000, 36]
            ];
            $(function () {
                $.plot($("#visitors-chart #visitors-container"), [{
                    data: data7_1,
                    label: "Page View",
                    lines: {
                        fill: true
                    }
                }, {
                    data: data7_2,
                    label: "Online User",
                    points: {
                        show: true
                    },
                    lines: {
                        show: true
                    },
                    yaxis: 2
                }
                ],
                {
                    series: {
                        lines: {
                            show: true,
                            fill: false
                        },
                        points: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: "#ffffff",
                            symbol: "circle",
                            radius: 5,
                        },
                        shadowSize: 0,
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#f9f9f9",
                        borderWidth: 1
                    },
                    colors: ["#b086c3", "#ea701b"],
                    tooltip: true,
                    tooltipOpts: {
                        defaultTheme: false
                    },
                    xaxis: {
                        mode: "time",
                        timeformat: "%0m/%0d %0H:%0M"
                    },
                    yaxes: [{
                        /* First y axis */
                    }, {
                        /* Second y axis */
                        position: "right" /* left or right */
                    }]
                }
                );
            });
        </script>
<script type="text/javascript">
            $(function () {
                var data1 = [];
                var totalPoints = 300;
                function GetData() {
                    data1.shift();
                    while (data1.length < totalPoints) {
                        var prev = data1.length > 0 ? data1[data1.length - 1] : 50;
                        var y = prev + Math.random() * 10 - 5;
                        y = y < 0 ? 0 : (y > 100 ? 100 : y);
                        data1.push(y);
                    }
                    var result = [];
                    for (var i = 0; i < data1.length; ++i) {
                        result.push([i, data1[i]])
                    }
                    return result;
                }
                var updateInterval = 100;
                var plot = $.plot($("#reatltime-chart #reatltime-chartContainer"), [
                GetData()], {
                    series: {
                        lines: {
                            show: true,
                            fill: true
                        },
                        shadowSize: 0
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        ticks: 10
                    },
                    xaxis: {
                        show: false
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#f9f9f9",
                        borderWidth: 1
                    },
                    colors: ["#b086c3"],
                    tooltip: true,
                    tooltipOpts: {
                        defaultTheme: false
                    }
                });
                function update() {
                    plot.setData([GetData()]);
                    plot.draw();
                    setTimeout(update, updateInterval);
                }
                update();
            });
        </script>
<script type="text/javascript">
            $(function () {
                var data = [{
                    label: "Paid Signup",
                    data: 60
                }, {
                    label: "Free Signup",
                    data: 30
                }, {
                    label: "Guest Signup",
                    data: 10
                }];
                var options = {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    legend: {
                        show: true
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    tooltipOpts: {
                        defaultTheme: false
                    }
                };
                $.plot($("#pie-chart #pie-chartContainer"), data, options);
            });
        </script>
<script type="text/javascript">
            $(function () {
                var data = [{
                    label: "Premium Member",
                    data: 40
                }, {
                    label: "Gold Member",
                    data: 20
                }, {
                    label: "Platinum Member",
                    data: 10
                }, {
                    label: "Silver Member",
                    data: 30
                }];
                var options = {
                    series: {
                        pie: {
                            show: true,
                            innerRadius: 0.5,
                            show: true
                        }
                    },
                    legend: {
                        show: true
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    tooltip: true,
                    tooltipOpts: {
                        defaultTheme: false
                    }
                };
                $.plot($("#pie-chart-donut #pie-donutContainer"), data, options);
            });
        </script>
<script type="text/javascript">
            $(function () {
                var data24Hours = [
                    [0, 601],
                    [1, 520],
                    [2, 337],
                    [3, 261],
                    [4, 157],
                    [5, 78],
                    [6, 58],
                    [7, 48],
                    [8, 54],
                    [9, 38],
                    [10, 88],
                    [11, 214],
                    [12, 364],
                    [13, 449],
                    [14, 558],
                    [15, 282],
                    [16, 379],
                    [17, 429],
                    [18, 518],
                    [19, 470],
                    [20, 330],
                    [21, 245],
                    [22, 358],
                    [23, 74]
                ];
                var data48Hours = [
                    [0, 445],
                    [1, 592],
                    [2, 738],
                    [3, 532],
                    [4, 234],
                    [5, 143],
                    [6, 147],
                    [7, 63],
                    [8, 64],
                    [9, 43],
                    [10, 86],
                    [11, 201],
                    [12, 315],
                    [13, 397],
                    [14, 512],
                    [15, 281],
                    [16, 360],
                    [17, 479],
                    [18, 425],
                    [19, 453],
                    [20, 422],
                    [21, 355],
                    [22, 340],
                    [23, 801]
                ];
                var dataDifference = [
                    [23, -727],
                    [22, 18],
                    [21, -110],
                    [20, -92],
                    [19, 17],
                    [18, 93],
                    [17, -50],
                    [16, 19],
                    [15, 1],
                    [14, 46],
                    [13, 52],
                    [12, 49],
                    [11, 13],
                    [10, 2],
                    [9, -5],
                    [8, -10],
                    [7, -15],
                    [6, -89],
                    [5, -65],
                    [4, -77],
                    [3, -271],
                    [2, -401],
                    [1, -72],
                    [0, 156]
                ];
                var ticks = [
                    [0, "22h"],
                    [1, ""],
                    [2, "00h"],
                    [3, ""],
                    [4, "02h"],
                    [5, ""],
                    [6, "04h"],
                    [7, ""],
                    [8, "06h"],
                    [9, ""],
                    [10, "08h"],
                    [11, ""],
                    [12, "10h"],
                    [13, ""],
                    [14, "12h"],
                    [15, ""],
                    [16, "14h"],
                    [17, ""],
                    [18, "16h"],
                    [19, ""],
                    [20, "18h"],
                    [21, ""],
                    [22, "20h"],
                    [23, ""]
                ];
                var data = [{
                    label: "Last 24 Hours",
                    data: data24Hours,
                    lines: {
                        show: true,
                        fill: true
                    },
                    points: {
                        show: true
                    }
                }, {
                    label: "Last 48 Hours",
                    data: data48Hours,
                    lines: {
                        show: true
                    },
                    points: {
                        show: true
                    }
                }, {
                    label: "Difference",
                    data: dataDifference,
                    bars: {
                        show: true
                    }
                }];
                var options = {
                    xaxis: {
                        ticks: ticks
                    },
                    series: {
                        shadowSize: 0
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#f9f9f9",
                        borderWidth: 1
                    },
                    colors: ["#b086c3", "#ea701b"],
                    tooltip: true,
                    tooltipOpts: {
                        defaultTheme: false
                    },
                    legend: {
                        labelBoxBorderColor: "#000000",
                        container: $("#legendcontainer26"),
                        noColumns: 0
                    },
                };
                var plot = $.plot($("#combine-chart #combine-chartContainer"),
                data, options);
            });
        </script>
<script type="text/javascript">
            $(function () {
                var data1 = GenerateSeries(0);
                var data2 = GenerateSeries(100);
                var data3 = GenerateSeries(200);
                var dataset = [data1, data2, data3];
                function GenerateSeries(added) {
                    var data = [];
                    var start = 100 + added;
                    var end = 200 + added;
                    for (i = 1; i <= 100; i++) {
                        var d = Math.floor(Math.random() * (end - start + 1) + start);
                        data.push([i, d]);
                        start++;
                        end++;
                    }
                    return data;
                }
                var options = {
                    series: {
                        stack: true,
                        shadowSize: 0
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#f9f9f9",
                        borderWidth: 1
                    },
                    legend: {
                        position: 'nw',
                        labelBoxBorderColor: "#000000",
                        container: $("#bar-chart #legendPlaceholder20"),
                        noColumns: 0
                    }
                };
                var plot;
                function ToggleSeries() {
                    var d = [];
                    $("#toggle-chart input[type='checkbox']").each(function () {
                        if ($(this).is(":checked")) {
                            var seqence = $(this).attr("id").replace("cbdata", "");
                            d.push({
                                label: "data" + seqence,
                                data: dataset[seqence - 1]
                            });
                        }
                    });
                    options.series.lines = {};
                    options.series.bars = {};
                    $("#toggle-chart input[type='radio']").each(function () {
                        if ($(this).is(":checked")) {
                            if ($(this).val() == "line") {
                                options.series.lines = {
                                    fill: true
                                };
                            } else {
                                options.series.bars = {
                                    show: true
                                };
                            }
                        }
                    });
                    $.plot($("#toggle-chart #toggle-chartContainer"), d, options);
                }
                $("#toggle-chart input").change(function () {
                    ToggleSeries();
                });
                ToggleSeries();
            });
        </script>


<div class="board-widgets gray">
						<div class="board-widgets-head clearfix">
							<h4 class="pull-left">Site Stat</h4>
							<a href="#" class="widget-settings"><i class="icon-group"></i></a>
						</div>
						<div class="board-widgets-content">
							<div class="row-fluid">
								<div class="span8">
									<div class="widget-container">
										<div id="visitors-chart">
											<div id="visitors-container" style="width: 100%; height: 300px; text-align: center; margin: 0px auto; padding: 0px; position: relative;">
												<canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 646px; height: 300px;" width="646" height="300"></canvas><div class="flot-text flot-y-axis flot-y2-axis yAxis y2Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 264px; left: 627px;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 220px; left: 627px;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 176px; left: 627px;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 133px; left: 627px;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 89px; left: 627px;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 45px; left: 627px;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 2px; left: 627px;">140</div></div><div class="flot-text flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 264px; left: 19px;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 220px; left: 7px;">200</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 176px; left: 7px;">400</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 133px; left: 7px;">600</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 89px; left: 7px;">800</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 45px; left: 1px;">1000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 2px; left: 1px;">1200</div></div><div class="flot-text flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 279px; left: 497px;">0m/0d 0H:0M</div></div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 646px; height: 300px;" width="646" height="300"></canvas><div class="legend"><div style="position: absolute; width: 87px; height: 44px; top: 17px; right: 37px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:17px;right:37px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(176,134,195);overflow:hidden"></div></div></td><td class="legendLabel">Page View</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(234,112,27);overflow:hidden"></div></div></td><td class="legendLabel">Online User</td></tr></tbody></table></div></div>
										</div>
									</div>
								</div>
								<div class="span4">
									<div class="widget-container">
										<div id="pie-chart-donut" class="pie-chart">
											<div id="legendPlaceholder">
											</div>
											<div id="pie-donutContainer" style="width: 100%; height: 280px; text-align: left; padding: 0px; position: relative;">
												<canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 290px; height: 280px;" width="290" height="280"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 290px; height: 280px;" width="290" height="280"></canvas><div class="legend"><div style="position: absolute; width: 87px; height: 44px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(176,134,195);overflow:hidden"></div></div></td><td class="legendLabel">Page View</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(234,112,27);overflow:hidden"></div></div></td><td class="legendLabel">Online User</td></tr></tbody></table></div></div>
										</div>
									</div>
								</div>
							</div>
							<div class="stat-text">
								 26458 <i class="up icon-sort-up"></i> 5%
							</div>
						</div>
					</div>
	