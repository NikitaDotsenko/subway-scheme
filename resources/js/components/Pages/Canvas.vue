<template>
    <div>
        <div id="container">

        </div>
        <StationDataModal v-if="showModal" @close="showModal = false" :station="currentStation"
                          :coords="currentStationCoords">
        </StationDataModal>
    </div>
</template>

<script>
    import StationDataModal from "../Modals/StationDataModal";

    export default {
        name: "Canvas",
        components: {StationDataModal},
        inject: ['page'],
        data: function () {
            return {
                showModal: false,
                currentStation: null,
                currentStationCoords: []
            }
        },
        mounted() {
            var width = 1000;
            var height = 1000;

            var stage = new Konva.Stage({
                container: 'container',
                width: width,
                height: height
            });

            var layer = new Konva.Layer();

            var redLine = new Konva.Line({
                points: this.getBranchCoords(this.page.props.redBranch),
                stroke: 'red',
                strokeWidth: 10,
                lineCap: 'round',
                lineJoin: 'round'
            });

            var greenLine = new Konva.Line({
                points: this.getBranchCoords(this.page.props.greenBranch),
                stroke: 'green',
                strokeWidth: 10,
                lineCap: 'round',
                lineJoin: 'round'
            });

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


            // layer.add(greenLine);
            layer.add(blueLine);
            layer.add(redLine);
            layer.add(greenLine);
            this.drawStations(layer, this.page.props.blueBranch, this.page.props.blueBranch.color);
            this.drawStations(layer, this.page.props.redBranch, this.page.props.redBranch.color);
            this.drawStations(layer, this.page.props.greenBranch, this.page.props.greenBranch.color);

            // add the layer to the stage
            stage.add(layer);
        },
        methods: {
            getBranchCoords(branch) {
                return branch.stations.map(function (station, index) {
                    return [station.x_axis, station.y_axis]
                }).flat()
            },

            drawStations(layer, branch, color) {
                let component = this;
                branch.stations.forEach(function (station, index) {
                    let simpleText = new Konva.Text({
                        x: station.x_axis - 5,
                        y: station.y_axis - 7,
                        text: station.name.charAt(0),
                        fontSize: 15,
                        fontFamily: 'Calibri',
                        fill: 'black',
                    });

                    let circle = new Konva.Circle({
                        x: station.x_axis,
                        y: station.y_axis,
                        radius: 10,
                        fill: 'white',
                        stroke: color,
                        strokeWidth: 4,
                        data: station,
                        value: station.name.charAt(0)
                    });
                    let group = new Konva.Group();

                    group.add(circle);
                    group.add(simpleText);
                    group.on('mouseover', function () {
                        let circleData = this.getChildren(function(node){
                            return node.getClassName() === 'Circle';
                        })[0];
                        component.showModal = true;
                        component.currentStation = circleData.getAttr('data');
                        component.currentStationCoords = [circleData.getAttr('x'), circleData.getAttr('y')];
                    });
                    group.on('mouseout', function () {
                        component.showModal = false;
                    })

                    layer.add(group);
                    // layer.add(simpleText)
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
