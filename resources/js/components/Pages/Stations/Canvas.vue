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
    import StationDataModal from "@/Modals/StationDataModal";

    export default {
        name: "Canvas",
        components: {StationDataModal},
        data: function () {
            return {
                showModal: false,
                currentStation: null,
                currentStationCoords: [],
                stationLink: ''
            }
        },
        props:{
            stations:{}
        },
        mounted() {
            let width = 1000;
            let height = 1000;
            console.log(this.stations)
            let stage = new Konva.Stage({
                container: 'container',
                width: width,
                height: height
            });

            let layer = new Konva.Layer();

            let redLine = new Konva.Line({
                points: this.getBranchCoords(this.stations.redBranch),
                stroke: 'red',
                strokeWidth: 10,
                lineCap: 'round',
                lineJoin: 'round'
            });

            let greenLine = new Konva.Line({
                points: this.getBranchCoords(this.stations.greenBranch),
                stroke: 'green',
                strokeWidth: 10,
                lineCap: 'round',
                lineJoin: 'round'
            });

            let blueLine = new Konva.Line({
                points: this.getBranchCoords(this.stations.blueBranch),
                stroke: 'blue',
                strokeWidth: 10,
                lineCap: 'round',
                lineJoin: 'round',
            });

            layer.add(blueLine);
            layer.add(redLine);
            layer.add(greenLine);
            this.drawStations(layer, this.stations.blueBranch, this.stations.blueBranch.color);
            this.drawStations(layer, this.stations.redBranch, this.stations.redBranch.color);
            this.drawStations(layer, this.stations.greenBranch, this.stations.greenBranch.color);

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

                    group.on('click', function (e) {
                        let station = this.getChildren(function (node) {
                            return node.getClassName() === 'Circle';
                        })[0];

                        component.$inertia.visit(`/station/${station.getAttr('data').id}`, {
                            method: 'get',
                            data: {},
                            replace: false,
                            preserveScroll: false,
                            preserveState: false
                        })

                    });
                    group.on('mouseover', function () {
                        let circleData = this.getChildren(function (node) {
                            return node.getClassName() === 'Circle';
                        })[0];
                        let y = ((window.innerHeight - circleData.getAttr('y')) < 170) ? circleData.getAttr('y') - 225 : circleData.getAttr('y')
                        component.showModal = true;
                        component.currentStation = circleData.getAttr('data');
                        component.currentStationCoords = [circleData.getAttr('x'), y];
                    });

                    group.on('mouseout', function () {
                        component.showModal = false;
                    });


                    layer.add(group);
                })

            },
        }

    }
</script>

<style scoped>

</style>
