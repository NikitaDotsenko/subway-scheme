<template>
    <div>
        <div id="container"></div>
    </div>
</template>

<script>

    export default {
        name: "Canvas",
        inject: ['page'],
        mounted() {
            var width = window.innerWidth;
            var height = window.innerHeight;

            var stage = new Konva.Stage({
                container: 'container',
                width: width,
                height: height
            });

            var layer = new Konva.Layer();

            // var redLine = new Konva.Line({
            //     points: [5, 70, 140, 23, 250, 60, 300, 20],
            //     stroke: 'red',
            //     strokeWidth: 15,
            //     lineCap: 'round',
            //     lineJoin: 'round'
            // });
            //
            // // dashed line
            // var greenLine = new Konva.Line({
            //     points: [5, 70, 140, 23, 250, 60, 300, 20],
            //     stroke: 'green',
            //     strokeWidth: 2,
            //     lineJoin: 'round',
            //     /*
            //      * line segments with a length of 33px
            //      * with a gap of 10px
            //      */
            //     dash: [33, 10]
            // });

            // complex dashed and dotted line
            var blueLine = new Konva.Line({
                points: this.getBranchCoords(this.page.props.blueBranch),
                stroke: 'blue',
                strokeWidth: 10,
                lineCap: 'round',
                lineJoin: 'round',
                /*
                 * line segments with a length of 29px with a gap
                 * of 20px followed by a line segment of 0.001px (a dot)
                 * followed by a gap of 20px
                 */
                // dash: [29, 20, 0.001, 20]
            });

            /*
             * since each line has the same point array, we can
             * adjust the position of each one using the
             * move() method
             */


            // layer.add(redLine);
            // layer.add(greenLine);
            layer.add(blueLine);
            this.drawStations(layer, this.page.props.blueBranch);

            // add the layer to the stage
            stage.add(layer);
        },
        methods: {
            getBranchCoords(branch) {
                return branch.stations.map(function (station, index) {
                    return [station.x_axis, station.y_axis]
                }).flat()
            },

            drawStations(layer, branch) {
                branch.stations.forEach(function (station, index) {
                    var simpleText = new Konva.Text({
                        x: station.x_axis - 5,
                        y: station.y_axis - 7,
                        text: station.name.charAt(0),
                        fontSize: 15,
                        fontFamily: 'Calibri',
                        fill: 'black'
                    });
                    var circle = new Konva.Circle({
                        x: station.x_axis,
                        y: station.y_axis,
                        radius: 10,
                        fill: 'white',
                        stroke: 'blue',
                        strokeWidth: 4,
                    });
                    layer.add(circle)
                    layer.add(simpleText)
                })

            }
        }
    }
</script>

<style scoped>
    body {
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #f0f0f0;
    }
</style>
